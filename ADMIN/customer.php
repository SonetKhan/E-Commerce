<?php
	
	require_once('inc.php');
	$tblName = "`customers`";
	$msg = "Welcome to Category information information";
	$k = isset($_REQUEST['a']) ? $_REQUEST['a'] : 0 ;
	$sql = "SELECT COUNT(*) FROM $tblName ";
	$rs = mysqli_query($db,$sql);
	$row = mysqli_fetch_row($rs);
	$totalrow = $row[0] - 1;
	if(isset($_REQUEST['butShow']))
	{
		$sql = "SELECT * FROM $tblName";
		
		$msg = ShowData($sql,$cls="tbl");
	}
	if(isset($_REQUEST['butUpdate']))
	{
		$sql ="UPDATE `customers` SET 
		 
		`customerName` = '".$_REQUEST['custName']."', 
		`customerAddress` = '".$_REQUEST['custadrs']."',
		`customerPhone` = '".$_REQUEST['custphone']."' 
		WHERE `customerID` = '".$_REQUEST['custId']."'";
		
		$res = mysqli_query($db,$sql);
		$msg = ($res)? "Data update succesfull": "Data update not succesfull";
	}
	if(isset($_REQUEST['butDelete']))
	{
		$sql = "DELETE FROM `customers` WHERE `customerID` = '".$_REQUEST['custId']."'";
		$res = mysqli_query($db,$sql);
		$msg = ($res) ? "Data delete successfull":"Data delete not succesfull";
	}
	if(isset($_REQUEST['butAdd']))
	{
		
		$insql = "INSERT INTO `customers` 
		VALUES('".$_REQUEST['custId']."',
		'".$_REQUEST['custName']."',
		'".$_REQUEST['custadrs']."',
		'".$_REQUEST['custphone']."')";
		$res = mysqli_query($db,$insql);
		$msg = ($res)? "Product insert successful":"Product insert not successful";
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

</head>

<body>
<form method = "post" action = "<?php print $_SERVER['PHP_SELF'] ?>">

<table>
<tr>
<td>Customer ID</td>
<td><input type = "text"  id = "custId" name = "custId" value = "<?php print $row[0] ?>"/> </td> 

</tr>
<tr>
<td>Customer Name</td>
<td> <input type = "text"  id = "custName" name = "custName" value = "<?php print $row[1]?>"/> </td>
</tr>
<tr>
<td>Customer Address</td>
<td> <input type = "text"  id = "custadrs" name = "custadrs" value = "<?php print $row[2] ?>"/> </td>
</tr>
<td>Customer Phone</td>
<td> <input type = "text"  id = "custphone" name = "custphone" value = "<?php print $row[3]?>" /> </td>
</tr>
<tr>
<td colspan = "2">
<input type = "submit" id = "butAdd" name = "butAdd" value = "ADD data" >
<input type = "submit" id = "butUpdate" name = "butUpdate" value = "Update data" />
<input type = "submit" id = "butShow" name = "butShow" value = "Show data" />
<input type = "submit" id = "butDelete" name = "butDelete" value = "Delete data" />

</td>
<tr>
<td colspan = "2">
<input type = "submit" id = "butFirst" name = "butFirst" value = "First data" />
<input type = "submit" id = "butLast" name = "butLast" value = "Last data" />
<input type = "submit" id = "butPrevious" name = "butPrevious" value = "Previous data" />
<input type = "submit" id = "butNext" name = "butNext" value = "Next data" />
</td>
</tr>
<tr><td colspan="2" align="center"><?php print $msg ?></tr>
</table>
<input type="hidden" id="a" name="a" value="<?php print $k ?>" />
</table>

</form>

</body>


</html>