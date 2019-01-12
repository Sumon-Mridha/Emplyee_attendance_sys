<?php  
session_start();
if(isset($_SESSION["ulogin"]) && $_SESSION["ulogin"]==true){
	if (isset($_SESSION["utype"]))
	{
		if ($_SESSION["utype"]==1)
		 {
			header("location:../Dashboard.php ");
		}
		
	}

}
else
	header("location:../index.php ");

include'tlinecon.php';

$fname= $_POST['fname'];
$email= $_POST['email'];
$password= $_POST['password'];
$address= $_POST['address'];
$contact= $_POST['contact'];
$designation= $_POST['designation'];
if($designation=='Admin')
	$type=0;
else
	$type=1;

// echo $fname.'<br>'.$email.'<br>'.$password.'<br>'.$address.'<br>'.$contact.'<br>'.$designation.'<br>';

	$uilsql = "INSERT INTO log_tb (Fullname,Designation,Address,Contact,uname,pass,utype)
	VALUES ('$fname','$designation','$address','$contact','$email','$password','$type')";

	if($conn->query($uilsql))
	{
		$slsql = "SELECT * FROM log_tb WHERE uname='$email'";
		$result2 = $conn->query($slsql);

		echo '1 <br>';
		if ($result2->num_rows >0) 
		{	
		// output data of each row
			$row = $result2->fetch_assoc();
			$userid = $row["uid"];
			var_dump($userid);
			echo "2<br>";
		}


		if($conn->query($slsql))
		{
			$uibsql = "INSERT INTO block_tb (UserId,Status) VALUES ('$userid','no')";
			if($conn->query($uibsql))
			{
				echo '3done';

			}
		}
	}

/*

	if ($conn->query($uilsql) === TRUE && $conn->query($slsql) === TRUE && $conn->query($uibsql) === TRUE) 
	{
		echo $userid.'<br>';
		echo 'done';
		// header('location:../forms.php');
	} 
	else 
	{
		echo $userid.'<br>';
		echo 'not done';

    	// header('location:../forms.php');
	}


*/


$conn->close();

?>