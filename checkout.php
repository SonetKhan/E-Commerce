
<?php
	session_start();
	require_once('inc.php');
	$sql = "select (select productName from product where productID = product_id), price,qty,qty*price,
	product_id from cart_info where sesID = '".$_SESSION['k']."'";
	
	if(isset ($_REQUEST['butDelete']))
	{
		$dsql = "DELETE FROM `cart_info` WHERE 
		`product_id` = '".$_REQUEST['pid']."' AND sesID = '".$_SESSION['k']."'";
		
		 mysqli_query($db,$dsql);
	}
	if(isset($_REQUEST['butupadte']))
	{
		$upsql = "UPDATE  `cart_info` 
		SET `qty` = '".$_REQUEST['qty']."' 
		WHERE `sesID` = '".$_SESSION['k']."' AND `product_id` = '".$_REQUEST['pid']."'";
		mysqli_query($db,$upsql);
	}
		
	$rs = mysqli_query($db,$sql);
	
	$ret = "<table align = center><tr><th>Sr.NO</th><th>ProductName</th><th>Unit price</th>
	<th>Quantity</th><th>Amount</th></tr>";
	$i = 0;
	$sum = 0;
	while($row=$rs->fetch_row())
	{
		$ret .= "<form method = 'post' action ='".$_SERVER['PHP_SELF']."'";
		$sum += $row[3];
		$ret.="<tr>";
		$ret .="<td>".++$i."</td>";
		$ret .= "<td>".$row[0]."</td>";
		$ret .= "<td>".$row[1]."</td>";
		
		$ret .= "<td><input type = 'text' size = '3' name = 'qty' value = '".$row[2]."'</td>";
		$ret .= "<td align = 'right'>".number_format($row[3],2)."</td>";
		$ret .= "<td><input type = 'submit' name = 'butupadte' value = 'Update'/></td>";
		$ret .= "<td><input type = 'submit' name = 'butDelete' value = 'Delete' /></td>";
		$ret .= "<input type = 'hidden' name = 'pid' value = '".$row[4]."'/>";
		
		$ret .= "<tr>";
		$ret .= "</form>";
	
	}
	$ret .= "<tr>
	<td colspan = '4'>Total</td>
	<td align = 'right'>".number_format($sum,2)."</td>
	</tr>";
		print $ret .= "</table>";
	
	if(isset($_REQUEST['singin']))
	{
		$name = $_REQUEST['Cust_name'];
		
		$num = $_REQUEST['Cust_num'];
		$id = $_REQUEST['CustId'];
		$sql="SELECT * FROM `customers`
		WHERE `customerName`='".$name."' AND `customerPhone`='".$num."'";	

		
		$rs = mysqli_query($db,$sql);
		$row = mysqli_fetch_row($rs);
		$id = $row[0];
		$nm = mysqli_num_rows($rs);
		if(($nm) == 1)
		{
			 $_SESSION['id'] = $id;
			header("Location:invoice.php");
		}
		
		else
		{
			 
			header("Location: checkout.php");
			
		}
		
	}
	
	 $return ="are you a member?";
	$return .= "<form method = 'post' action = '".$_SERVER['PHP_SELF']."'>";
	$return .= "Name:<input type = 'text' name = 'Cust_name' /><br>";
	$return .= "Mobile Number:<input type = 'text' name = 'Cust_num' /><br>";
	$return .= "Customer ID: <input type = 'hidden' name = 'CustId'/><br>";
	$return .= "<input type = 'submit' name = 'singin' value = 'signin' />";
	
	$return .= "</form>";
	$return .="if you are not <a href = 'signup.php'>signup</a>";
	
	print $return;
	print $msg =isset($_REQUEST['msg'])? $_REQUEST['msg']:"";
	//print $mssg = isset($_REQUEST['text'])? $_REQUEST['text'] : "";
?>