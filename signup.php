<?php
	session_start();
	require_once('inc.php');
	if(isset($_REQUEST['signup']))
		
	{
		$SQL="SELECT MAX(`customerID`) FROM `customers`";
		$res = mysqli_query($db,$SQL);
		$row = mysqli_fetch_row($res);
		$lastID = $row[0];
		$myId = $_REQUEST['cust_id'];
		
		$myId = CustId('CUS-',10,$lastID);
		$sql = "INSERT INTO `customers` 
		VALUES('".$myId."',
		'".$_REQUEST['cust_name']."',
		'".$_REQUEST['cust_add']."',
		'".$_REQUEST['cust_phone']."')";
		$rs = mysqli_query($db,$sql);
		//$num = mysqli_num_rows($rs);
		if(($rs) == 1)
		{
			header("Location:checkout.php?msg='Welcome to our website'");
		}
		else
		{
			header("Location:checkout.php?msg='signup unsuccessfull'");
		}
	}
		
		
	
	
	$return = "<form method = 'post' action = '".$_SERVER['PHP_SELF']."'  />";
	$return .= "Id:<input type = 'text' name = 'cust_id' value = '' readonly /><br>";
	$return .= "Name:<input type = 'text' name = 'cust_name' value = '' /><br>";
	$return .= "Address:<input type = 'text' name = 'cust_add' value = '' /><br>";
	$return .= "Phone:<input type = 'text' name = 'cust_phone' value = '' /><br>";
	$return .= "<input type = 'submit' name = 'signup' value = 'signup'/>";
	$return .= "</form>";
	print $return;


?>