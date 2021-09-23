<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "legazpidamageassessment";
$conn = mysqli_connect($servername, $username, $password, $dbname);
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}
// Select all the rows in the markers table
$query = mysqli_query($conn, "SELECT * FROM locations, barangay WHERE locations.`b_id` = barangay.`b_id`"); 

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = mysqli_fetch_assoc($query)){
  // ADD TO XML DOCUMENT NODE
								
                         
		echo '<marker ';
		echo 'id="' . parseToXML($row['b_id']) . '" ';
		echo 'municipality="' . parseToXML($row['municipality']) . '" ';
		echo 'barangay="' . parseToXML($row['brgy']) . '" ';
		echo 'lat="' . $row['latt'] . '" ';
		echo 'lng="' . $row['long'] . '" ';
		
		$b_id=$row['b_id'];
								$sql1 = mysqli_query($conn, "SELECT *, SUM(estimated_cost) AS total_damage FROM damage_report, barangay WHERE damage_report.brgy_id = '$b_id' AND YEAR(`date_added`) = YEAR(CURDATE()) AND damage_report.brgy_id = barangay.b_id  GROUP BY barangay.b_id");
									
									if (mysqli_num_rows($sql1)  > 0) {
										while($row1 = mysqli_fetch_assoc($sql1)) {
											$tacc=$row1['total_damage'];
											//echo 'tdamage="' . $tacc . '" ';
										}
									}
									else{
										$tacc=0;
										//echo 'tdamage="0"';
									}

  echo '/>';
}

// End XML file
echo '</markers>';

?>