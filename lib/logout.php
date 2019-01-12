<?php
session_start();
$_SESSION["ulogin"]=false;
session_unset(); 
header('location:../index.php');
$conn->close();
?>