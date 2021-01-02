<?php
	$db=mysqli_connect("localhost","root","","ali-mobile-mela");
	require_once('inc.php');
	
	$tblName = "`product`";
	$msg = "Welcome to product information";
	$k = isset($_REQUEST['a']) ? $_REQUEST['a'] : 0 ;
	$sql = "SELECT COUNT(*) FROM $tblName ";
	$rs = mysqli_query($db,$sql);
	$row = mysqli_fetch_row($rs);
	$totalrow = $row[0] - 1;
	if(isset($_REQUEST['show']))
	{
		$sql = "SELECT * FROM $tblName";
		$msg = ShowData($sql,$cls="tbl");
	}
	if(isset($_REQUEST['butUpdate']))
	{
		$sql = "UPDATE `product` 
		SET `productName` = '".$_REQUEST['pname']."',
		
		`Description` = '".$_REQUEST['des']."',
		`unitPrice` = '".$_REQUEST['price']."' ,
		`productShow` = '".$_REQUEST['show']."' 
		WHERE `productID` = '".$_REQUEST['pid']."'";
		$res = mysqli_query($db,$sql);
		$msg = ($res)? "Data update succesfull": "Data update not succesfull";
		move_uploaded_file($_FILES['pImage']['tmp_name'],"../image/product/".$_REQUEST['pid'].".jpg");
	}
	if(isset($_REQUEST['butDelete']))
	{
		$sql = "DELETE FROM `product` WHERE `productID`= '".$_REQUEST['pid']."';";
		$res = mysqli_query($db,$sql);
		$msg = ($res) ? "Data delete successfull":"Data delete not succesfull";
	}
	if(isset($_REQUEST['butAdd']))
	{
			$combo = $_REQUEST['combo']."-PRD-";
			$myPid = MakeProductID($combo,15,'product','productID');
			$insql = "INSERT INTO `product` 
		VALUES('".$myPid."','".$_REQUEST['pname']."',
		'".$_REQUEST['combo']."','".$_REQUEST['des']."',".$_REQUEST['price'].",'".$_REQUEST['show']."')";
		
		$res = mysqli_query($db,$insql);
		$msg = ($res)? "Product insert successful":"Product insert not successful";
		move_uploaded_file($_FILES['pImage']['tmp_name'],"../image/product/".$myPid.".jpg");
	}
	
	if(isset($_REQUEST['butFirst']))
	{
		$k = 0;
		$msg = "First data showing (".($totalrow+1)." / ".($k + 1).")";
	}
	
	if(isset($_REQUEST['butLast']))
	{
		$k = $totalrow;
		$msg = "Last data showing (".($totalrow+1)." / ".($k + 1).")";
	}
	if(isset($_REQUEST['butPrevious']))
	{
		if(--$k <= 0) $k = 0;
		$msg = "Privious data showing (".($totalrow+1)." / ".($k + 1).")";
		
	}
	if(isset($_REQUEST['butNext']))
	{
		if(++$k >= $totalrow) $k = $totalrow;
		$msg = "Next data showing (".($totalrow+1)." / ".($k + 1).")";
		//$msg = $_REQUEST['combo'];
		
	}
	
	$sql = "SELECT * FROM $tblName LIMIT $k,1";
	$rs = mysqli_query($db,$sql);
	$row = mysqli_fetch_row($rs);
	

?>
<!doctype html>
<html>
<head>
Welcome to product information.
<link rel = "stylesheet" type = "text/css" href = "productstyle.css" />
</head>
<body>


<form method = "post" action = "<?php print $_SERVER['PHP_SELF']; ?>" enctype= 'multipart/form-data' >
<table class = "tbl">
<tr>
<td>Category Id</td>
<!--<td> <input type = "text" id = "cat_id" name = "cat_id" value = "<?php print $row[0] ?>" </td>-->
<td>
<?php
 $sql = "SELECT * FROM `categories`";
 $rs = mysqli_query($GLOBALS['db'],$sql);
 
 $ret ="<select name ='combo' >";
 
 while($sonet = mysqli_fetch_row($rs))
 {
	 
		if( $row[2]==$sonet[0])
		$ret .= "<option value = ".$sonet[0]." selected >".$sonet[1]."</option>";
		else
			$ret .= "<option value = ".$sonet[0].">".$sonet[1]."</option>";
		
		
 }
	$ret .= "</select>";	
	print $ret;
?>
</td>

</tr>

<tr>
<td>Product ID:</td>
<td> <input type = "text" id = "pid" name = "pid" 
value = "<?php print $row[0] ?>"  readonly /></td>
<td></td>
</tr>
<tr>
<td>Product Name:</td>
<td> <input type = "text" id = "pname" name = "pname" value = "<?php print $row[1] ?>" </td>
</tr>
<tr>
<td>Description: </td>
<td> <input type = "text" id = "des" name = "des" value = "<?php print $row[3] ?>" </td>
</tr>
<td>Unit price:</td>
<td> <input type = "text" id = "price" name = "price" value = "<?php print $row[4] ?>" </td>
</tr>
<td>Product Show: </td>
<td> <input type = "text" id = "show" name = "show" value = "<?php print $row[5] ?>" </td>
</tr>
</tr>
<td>Product Image: </td>
<td> <input type = "file" id = "file" name = "pImage" /> </td>
</tr>
<tr>
<td colspan = "2">
<input type = "submit" id = "butAdd" name = "butAdd" value = "ADD data" >
<input type = "submit" id = "butUpdate" name = "butUpdate" value = "Update data" />
<input type = "submit" id = "butShow" name = "butShow" value = "Show data" />
<input type = "submit" id = "butDelete" name = "butDelete" value = "Delete data" />

</td>
</tr>
<tr>
<td colspan = "2">
<input type = "submit" id = "butFirst" name = "butFirst" value = "First data" />
<input type = "submit" id = "butLast" name = "butLast" value = "Last data" />
<input type = "submit" id = "butPrevious" name = "butPrevious" value = "Previous data" />
<input type = "submit" id = "butNext" name = "butNext" value = "Next data" />
</td>
</tr>
<tr><td colspan="2" align="center"><?php print $msg ?></td></tr>

<tr><td><img src="../image/product/<?php print $row[0] ?>.jpg?a=<?php print rand() ?>" height="100px" weidth="100px"/></td></tr>
</table>
<input type="hidden" id="a" name="a" value="<?php print $k ?>" >
</form>



</body>
</html> 
