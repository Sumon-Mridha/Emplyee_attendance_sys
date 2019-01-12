<?php
//connection
include'lib/tlinecon.php';
$uid=$_SESSION["uid"];

//checking active mode of the user

$sql = "SELECT * FROM office_login_tb WHERE UserId='$uid' ORDER BY LogId DESC LIMIT 1";
$result = $conn->query($sql);


 if ($result->num_rows > 0) 
 {
    
 $row = $result->fetch_assoc();
 $x=$row["ActiveMode"];
 // echo $row["ActiveMode"];
  echo "<script>alert('".$x."');</script>";
 // echo $row["LogId"];
 } 
?>