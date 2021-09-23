<?php
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'legazpidamageassessment'); 
define('DB_USER', 'root'); 
define('DB_PASSWORD',''); 
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error()); 
//echo "aa".$_POST['barangay'];
$sql = mysqli_query($con, "SELECT * FROM barangay WHERE brgy = '".$_POST['barangay']."'");
$row = mysqli_fetch_array($sql);
?>
<input type='text' name='brgy' readonly value='<?php echo $row['brgy'];?>' class='form-control'>