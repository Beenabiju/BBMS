<?php
session_start();
$_SESSION['username']=null;
 $_SESSION['password']=null;
 
header("Location: adminlogin.php");
?>