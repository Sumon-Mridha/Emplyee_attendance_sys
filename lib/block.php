<?php
include'tlinecon.php';
$uid=$_SESSION["uid"];
//checking block
$sql1 = "SELECT * FROM Block_tb WHERE UserId='$uid'";
$result1 = $conn->query($sql1);

// if(isset($_SESSION["logoutdate"]) && isset($_SESSION["logindate"]))
// {


 	if ($result1->num_rows > 0) 
 	{   
 		$row1 = $result1->fetch_assoc();
 		$n=$row1["Status"];
 		if($n=='yes')
 		{
 	 		$_SESSION['block']=true;
 		}
 		else if(empty($_SESSION["logoutdate"]) && $n=='no')
 		{
 			//if not blocked then checking and block the user
				date_default_timezone_set("Asia/Dhaka");
				$z=$_SESSION["logindate"];
				$date1=date_create($z);
				$date2=date_create(date("Y-m-d"));
				$diff=date_diff($date1,$date2);
				$w= $diff->format("%a");
				$_SESSION["dm"]=$w;

				if($w>0)
				{
					$isql = "UPDATE Block_tb SET Status='yes' WHERE UserID='$uid' AND Status= 'no'";

					if ($conn->query($isql) === TRUE) 
					{
						$_SESSION['block']=true;
					} 
					else 
					{
						$_SESSION['block']=false;
					}
				}
				else
					$_SESSION['block']=false;
		}
			else if(!empty($_SESSION["logoutdate"]) && $n=='no')
			$_SESSION['block']=false;

 	}
 // }
 // else
 // 	$_SESSION0["block"]=false;


$conn->close();

?>