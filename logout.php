<?php
session_start();
session_destroy();
session_commit();
echo "<script>alert('Successfully Logout')</script>";
echo "<meta http-equiv='refresh'content='0;url=page-login.php'>";
?>