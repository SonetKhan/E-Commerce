<?php
	session_start();
	 $_SESSION ['k'];
	require_once('inc.php');
	

?>
<!doctype html>
<html>
<head>
<link href="style.css" type=""text/css"" rel="stylesheet"/>
</head>

<body>
<table border = "1px" solid  height = "630px" width = "100%" class ="tble">
<tr class="head" >
<td colspan = "2" height = "100px">
<table width = "100%" class="head1">
<tr >
<td align = "center">Mobile mela</td>
<td align = "right"><a href = 'checkout.php' target = 'fdata'>Check out</a></td>
<td align = "right" ><a href='./ADMIN'>Admin</a></td>
</tr>
</table>
</td>
</tr>
<tr height = "480px" width = "100%" valign = "top" >
<td width = "30%" class="body1">
<?php
	$sql = "SELECT * FROM `categories`";
	$rs = mysqli_query($db,$sql);
	$ret = "<ul>";
	while($row = mysqli_fetch_row($rs))
	{
		
		$ret .= "<li><a href = 'product.php?id=".$row[0]."' target = 'fdata'> ".$row[1]."</a></li>";
		
	}
		$ret .= "</ul>";
		print $ret;
	


?>
</td>
<td width = "70%" class="body2">
<iframe src = "product.php" name = "fdata" height = "400px" width = "100%"> </iframe>

</td>
</tr>
<tr class="footer">
<td colspan = "2" height = "50px" width = "100%" align = "center">Copyright by spwave 2019</td>
</tr>
</table>
</body>

</html>