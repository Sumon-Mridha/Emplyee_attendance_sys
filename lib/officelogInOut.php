
<?php
session_start();
$oflog=$_GET['oflog'];
$uid=$_SESSION["uid"];
if(isset($_SESSION["logid"])){
$logid=$_SESSION["logid"];
}

//setting timezone
date_default_timezone_set("Asia/Dhaka");
$date=date("Y-m-d");
$time=strftime("%H:%M:%S");

//connection
include'tlinecon.php';


//login user
if(!isset($_SESSION["block"]) OR ($oflog=='login' && $_SESSION["block"]===false))
{
	$isql = "INSERT INTO office_login_tb (LoginDate,LoginTime,UserId,ActiveMode)
	VALUES ('$date','$time','$uid',1)";

	if ($conn->query($isql) === TRUE) 
	{
		header('location:../Dashboard.php');
	} 
	else 
	{
		$_SESSION["lufail"]=true;
    	header('location:../Dashboard.php');
	}

	$oflog=null;

}
if($oflog=='login'&& isset($_SESSION["block"]) && $_SESSION["block"]===true)
{
	$_SESSION["lufail"]=true;
	header('location:../Dashboard.php');
	$oflog=null;
}

//logout user
if($oflog=='logout' && isset($_SESSION["block"]) && $_SESSION["block"]===false)
{

	$usql = "UPDATE office_login_tb SET LogoutDate = '$date', logoutTime= '$time' , ActiveMode=0 WHERE UserID='$uid' AND ActiveMode= '1' AND LogId='$logid'";

	if ($conn->query($usql) === TRUE) 
	{
		$_SESSION["lofail"]=false;
		header('location:../Dashboard.php');
	} 
	else 
	{
		$_SESSION["lofail"]=true;
    	header('location:../Dashboard.php');
	}
	$oflog=null;

}
if($oflog=='logout' && isset($_SESSION["block"]) && $_SESSION["block"]===true)
{
	$_SESSION["lofail"]=true;
    header('location:../Dashboard.php');
    $oflog=null;
}

$conn->close();
?>