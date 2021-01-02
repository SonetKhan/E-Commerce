<?php
		session_start();
		require_once('inc.php');
		
		$id=isset($_REQUEST['id'])?$_REQUEST['id']:0;
		$sql="SELECT * FROM product WHERE productShow='Yes'";
		$sql=isset($_REQUEST['id']) ? "SELECT * FROM product WHERE categoryID='".$id."'" : $sql;
		$rs = mysqli_query($db,$sql);
		if(isset($_REQUEST['Add']))
		{
			$insql = "INSERT INTO `cart_info` 
			VALUES('".$_SESSION['k']."',
			'".$_REQUEST['pid']."',
			'".$_REQUEST['qnty']."',
			'".$_REQUEST['price']."',NOW())";
			$res = mysqli_query($db,$insql);
			$query ="SELECT `qty` FROM `cart_info` WHERE 
			`sesID`='".$_SESSION['k']."' AND `product_id`='".$_REQUEST['pid']."'";
			$update = mysqli_query($db,$query);
			$value = mysqli_fetch_row($update);
			$inval = $value[0];
			
			$msg = ($res) ? "" : mysqli_query($db,"UPDATE `cart_info` SET 
			`qty` = '".$_REQUEST['qnty']."' + ".$inval."
			WHERE `sesID` ='".$_SESSION['k']."' AND `product_id`='".$_REQUEST['pid']."'");
			
		}
		
		$ret = "<table border = '1' width = '100%'>";
		while ($row = mysqli_fetch_row($rs))
			
		{
			$ret .= "<form method = 'post' action = '".$_SERVER['PHP_SELF']."'>
			<input type = 'hidden' name = 'pid' value = '".$row[0]."'/>
			<input type = 'hidden' name = 'price' value = '".$row[4]."'/>";
			$ret .="<tr>";
			$ret .="<td colspan='5'>
			<img src='./image/product/".$row[0].".jpg' height='100px' weidth='100px' /></td>";
			$ret.="</tr>";
			$ret .= "<tr>";
			
			$ret .="<td>Name:".$row[1]."</td>";
			$ret .= "<td>Description:".$row[3]."</td>";
			$ret .= "<td>Price:".$row[4]."</td>";
			$sql = "SELECT `qty` FROM `cartinfo` 
			WHERE `productId`='".$row[0]."' AND `sessionID` = '".$_SESSION['k']."'";
			$prs = mysqli_query($db,$sql);
			$prow = mysqli_fetch_row($prs);
			$ret .= "<td><input type = 'text' name ='qnty' size = '3' value='".$prow[0]."'</td>";
			$ret .= "<td><input type = 'submit' name = 'Add' value = 'Add to cart' /></td>";
			$ret .= "</tr>";
			//$ret .="<tr>";
			//$ret .="<td colspan='3'><$$img src='./image/product/".$row[0].".jpg' height='100px' weidth='100px' /></td>";
			//$ret.="</tr>";
			
			
			$ret .= "</form>";
		}
		print $ret .= "</table>";
		


?>