<?php
		session_start();
		require_once('inc.php');
		print $_SESSION['id'];
		$sql = "SELECT *,NOW() FROM `customers` WHERE `customerID`='".$_SESSION['id']."'";
		
		$row = mysqli_fetch_row(mysqli_query($db,$sql));
		
		
		$rsql = "SELECT (SELECT `productName` 
		FROM product WHERE `productID`= `product_id`),qty,price,qty*price 
		FROM `cart_info` WHERE `sesID` = '".$_SESSION['k']."'";
		$rres = mysqli_query($db,$rsql);
		
		

?>
<!doctype html>
<html>

<head>
<link href="mystyle.css" type=""text/css"" rel="stylesheet"/>
</head>
<body class="invoice">
<h1 align = "center"> mobile Mela</h1>
<h5 align = "center">Importer And Supplier of mobile</h5>
<h5 align = "center">18/2,Genex road,khilkhet,Dhaka</h5>
<p>Sales invoic Bill</p>
<table >
<tr>
<td colspan = "2">
		Invoice No.:<?php $i = 1;$i++;print $i;?>
		Date:<?php print $row[4]?>
		
</td>
</tr>
<tr>
<td colspan = "2">
		Name:<?php print $row[1] ?>
		Time:<?php print $row[4]  ?>
		
</td>
</tr>
<tr>
<td colspan = "2">
		Address:<?php print $row[2] ?>
		sold by:Sonet	
</td>
</tr>
<tr>
<td colspan = "2">
		Phone:<?php print $row[3] ?>
		Print:	<?php print $row[4] ?>
</td>
</tr>
</table>

<?php
$ret = "<table align = center><tr><th>Sr.NO</th><th>ProductDescription</th><th>Qty</th>
	<th>U.price</th><th>Total</th></tr>";
	$i = 0;
	$sum = 0;
	while($rrow = mysqli_fetch_row($rres))
	{
		
		$sum += $rrow[3];
		$ret.="<tr>";
		$ret .="<td>".++$i."</td>";
		$ret .= "<td>".$rrow[0]."</td>";
		$ret .= "<td>".$rrow[1]."</td>";
		$ret .= "<td>".$rrow[2]."</td>";
		
		
		$ret .= "<td align = 'right'>".number_format($rrow[3],2)."</td>";
		
	
		
		
		$ret .= "<tr>";
		
	
	}
	$ret .= "<tr>
	<td colspan = '4'>Total</td>
	<td align = 'right'>".number_format($sum,2)."</td>
	</tr>";
		print $ret .= "</table>";

?>
<?php
	if(isset($_REQUEST['Order']))
	{
		
		$dsql  = "SELECT MAX(`orderID`) FROM `orders`";
		$dres = mysqli_query($db,$dsql);
		$drow = mysqli_fetch_row($dres);
		$orderid = $drow[0];
		$orderid = OderId('ORD-',10,$orderid);
		
		
		 $insql = "INSERT INTO `orders` VALUES('".$_SESSION['id']."','".$orderid."',CURDATE())";
		 
		$inorder = mysqli_query($db,$insql);
		$msg = ($inorder)?"order confirmed,please collect authorised shop":"Order not confirmed";
		$gsl = "SELECT `product_id`,`qty`,`price` FROM `cart_info` WHERE sesID = '".$_SESSION['k']."'";
		$gres = mysqli_query($db,$gsl);
		while($grow = mysqli_fetch_row($gres))
		{
		$fsql = "INSERT INTO `orderdetails` VALUES('".$orderid."','".$grow[0]."','".$grow[1]."','".$grow[2]."')";
		$fres = mysqli_query($db,$fsql);
		
		}


	}
?>
<form>
<input type="submit" name="Order" value="Confirm Order" />
</form>


<p> <?php print $msg = isset($msg)? $msg: "" ;  ?></p>
</body>
</html>