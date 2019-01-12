<?php  
session_start();
if(isset($_SESSION["ulogin"]) && $_SESSION["ulogin"]==true){
	if (isset($_SESSION["utype"]))
	{
		if ($_SESSION["utype"]==0)
		 {
			header("location:../AdminDashboard.php ");
		}
		else
			header("location:../Dashboard.php ");
		
	}

}
else
	header("location:../index.php ");


include'tlinecon.php';

$le= $_POST['loge'];
$lp= $_POST['logp'];


//getting user info
$sql = "SELECT uid,pass,utype FROM log_tb WHERE uname='$le'";
$result = $conn->query($sql);

	if ($result->num_rows == 1) {
		// output data of each row
	
		$row = $result->fetch_assoc();

		if($lp == $row["pass"]){ 
			$_SESSION["wp"]=false;
			$_SESSION["ulogin"]=true;
			$_SESSION["uid"]=$row["uid"];
			$_SESSION["utype"]=$row["utype"];
			if ($_SESSION["utype"]==0) {
				header("location:../AdminDashboard.php ");
			}
			else
				header("location:../Dashboard.php ");	
		}
		else{
			$_SESSION["wp"]=true;
			header('location:../index.php');
		}
	} 
	else {
		
		$_SESSION["wp"]=true;
			header('location:../index.php');
}

$conn->close();

?>