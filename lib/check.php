<?php
//connection
include'tlinecon.php';
$uid=$_SESSION["uid"];

//checking active mode of the user
$sql = "SELECT * FROM office_login_tb WHERE UserId='$uid' ORDER BY LogId DESC LIMIT 1";
$result = $conn->query($sql);


 if ($result->num_rows > 0) 
 {
    
 $row = $result->fetch_assoc();
 $x=$row["ActiveMode"];
 $y=$row["LogId"];
 $_SESSION["logindate"]=$row["LoginDate"];
 $_SESSION["logoutdate"]=$row["LogoutDate"];
 // echo $row["ActiveMode"];
 $_SESSION["I_AM_IN"] = $x;
 $_SESSION["logid"] = $y;

  // echo "<script>alert('".$x."');</script>";
 // echo $row["LogId"];
 } 
$conn->close();

?>