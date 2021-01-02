<?php
        

		session_start();
		require_once('inc.php');
		$msg = "";
		$userid = $_REQUEST['username'];
		$email = $_REQUEST['email'];
		$num = $_REQUEST['number'];
		$password = $_REQUEST['password'];
		print $sql = "SELECT * FROM `admin` WHERE
		`userID` = '".$userid."' && 
		`email` = '".$email."' 
		&& `mobileNumber` = '".$num."' && 
		`userPassword`= '".$password."'";
		
		
		$rs = mysqli_query($db,$sql);
		$num = mysqli_num_rows($rs);
		if($num == 1)
		{
			$_SESSION['username'] = $userid;
			header("Location:home.php");
		}
		else
		{
			$_SESSION['username']= "You enter wrong password";
			
			header("Location:index.php?");
		}

		
?>
