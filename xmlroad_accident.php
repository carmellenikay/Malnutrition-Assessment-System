<?php
require_once('Connections/Mapconnection.php');
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
$query = mysqli_query($conn, "SELECT * FROM road_location, barangay WHERE road_location.`b_id` = barangay.`b_id`"); 

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
		echo 'lat="' . $row['lat'] . '" ';
		echo 'lng="' . $row['lng'] . '" ';
		
		$b_id=$row['b_id'];
								$sql1 = mysqli_query($conn, "SELECT *, COUNT(b_id) as total_acc FROM road_accident_location WHERE b_id = $b_id AND YEAR(`date_incident`) = YEAR(CURDATE())");
									
									if (mysqli_num_rows($sql1)  > 0) {
										while($row1 = mysqli_fetch_assoc($sql1)) {
											$tacc=$row1['total_acc'];
											echo 'taccident="' . $tacc . '" ';
										}
									}
									else{
										echo 'taccident="0"';
									}

  echo '/>';
}

// End XML file
echo '</markers>';

?>