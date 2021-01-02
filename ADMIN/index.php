<?php
	session_start();
	isset($_SESSION['username'])? print $_SESSION['username']  : "";
	//print_r($_SESSION[]);
	session_destroy();
?>

<!doctype html>
<html>

<head>

</head>

<body>
<h2>Login window</h2>
<form method = "post" action = "validation.php" >
<table>
<tr>
<td>User ID</td>
<td><input type = "text" name = "username"  /></td>
</tr>
<tr>
<td>Email</td>
<td><input type = "text" name = "email" /></td>
</tr>
<tr>
<td>Mobile Number</td>
<td><input type = "text" name = "number" /></td>
</tr>
<tr>
<td>User Password</td>
<td><input type = "password" name = "password"  /></td>
</tr>
<tr>
<td></td>
<td><input type ="submit" name ="sub" value ="Login" /></td>
</tr>
</table>
</form>
</body>

</html>