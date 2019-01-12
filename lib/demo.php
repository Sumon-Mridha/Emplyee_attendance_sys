<?php

session_start();

// $uid=$_SESSION["uid"];
// include 'tlinecon.php';
// $sql = "SELECT * FROM Block_tb WHERE UserId='$uid'";
// $result1 = $conn->query($sql);


//  		if ($result1->num_rows > 0) 
//  	{   
//  		$row1 = $result1->fetch_assoc();
//  		$n=$row1["Status"];
//  		echo $n.'<br>';
//  		if($n=='yes')
//  		{
//  	 		$_SESSION['block']=true;
//  		}
//  		else
//  			$_SESSION['block']=false;
//  	}

// if($_SESSION["lofail"]===false) 
// 	echo "hi";
// echo $_SESSION["dm"];
// echo $_SESSION["logindate"];

				// date_default_timezone_set("Asia/Dhaka");
				// $z=$_SESSION["logindate"];
				// $date1=date_create($z);
				// $date2=date_create(date("Y-m-d"));
				// $diff=date_diff($date1,$date2);
				// $w= $diff->format("%a");
				
				// echo $z.'<br>'.$w.'<br>'.date("Y-m-d");
	// echo $_SESSION["act"].'<br>';
	// echo $_SESSION["id"];
$_SESSION["block"]=false;
if(isset($_SESSION["block"]))
{
	echo "hji";

}
// var_dump($_SESSION["block"]);

?>