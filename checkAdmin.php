<?php
if($_SESSION['access_level']!="Admin" or !$_SESSION['username']){
	header("Location:page-login.php");
	//echo "<meta http-equiv='refresh'content='0;url=page-login.php'>";
	}
?>