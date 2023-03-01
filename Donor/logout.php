<?php
session_start();
$_SESSION['dusername']=null;
 $_SESSION['email']=null;
 
header("Location: donor_login.php");
?>