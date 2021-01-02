<?php
	
	require_once('inc.php');
	$tblName = "`categories`";
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
		$sql = "UPDATE `categories` SET `categoryName` = '".$_REQUEST['cat_name']."' 
		WHERE `categoryID` = '".$_REQUEST['cat_id']."'";
		$res = mysqli_query($db,$sql);
		$msg = ($res)? "Data update succesfull": "Data update not succesfull";
	}
	if(isset($_REQUEST['butDelete']))
	{
		$sql = "DELETE FROM `categories` WHERE `categoryID` = '".$_REQUEST['cat_id']."'";
		$res = mysqli_query($db,$sql);
		$msg = ($res) ? "Data delete successfull":"Data delete not succesfull";
	}
	if(isset($_REQUEST['butAdd']))
	{
		
		//$id=mysqli_fetch_row(mysqli_query($db,"SELECT MAX(`cat_id`) FROM `categories` "));
		$sql = "SELECT MAX(`categoryID`) FROM `categories`";
		$rs = mysqli_query($db,$sql);
		$id = mysqli_fetch_row($rs);
		$id=$id[0];
		$myId =  make_id('CAT-',7,$id);
		$insql="INSERT INTO $tblName VALUES(
			'".$myId."',
			'".$_REQUEST['cat_name']."')";
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
Welcome to categories information.
</head>

<body>
<form method = "post" action = "<?php print $_SERVER['PHP_SELF']?>">
<table>
<tr>
<td>Category ID</td>
<td><input type = "text" id = "cat_id" name = "cat_id" value = "<?php print $row[0]?>"</td>
</tr>
<tr>
<td>Category Name</td>
<td><input type = "text" id = "cat_name" name = "cat_name" value = "<?php print $row[1] ?>"</td>
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
<form>
</body>

</html> 