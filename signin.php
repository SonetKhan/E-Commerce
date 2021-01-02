<?php
	session_start();
	require_once('inc.php');
	if(isset($_REQUEST['singin']))
	{
		$name = $_REQUEST['Cust_name'];
		$num = $_REQUEST['Cust_num'];
		$sql="SELECT * FROM `customers`
		WHERE `customerName`='".$name."' AND `customerPhone`='".$num."'";	

		
		$rs = mysqli_query($db,$sql);
		$nm = mysqli_num_rows($rs);
		if(($nm) == 1)
		{
			header("Location:checkout.php?text='<br>.'signin successfull'");
		}
		
		else
		{
			header("Location: checkout.php?text='<br>.'signin unsuccessfull'");
		}
		
	}
		
	
	$return = "<form method = 'post' action = '".$_SERVER['PHP_SELF']."'>";
	$return .= "Name:<input type = 'text' name = 'Cust_name' /><br>";
	$return .= "Mobile Number:<input type = 'text' name = 'Cust_num' /><br>";
	$return .= "<input type = 'submit' name = 'singin' value = 'signin' />";
	$return .= "</form>";
	print $return;



?>
