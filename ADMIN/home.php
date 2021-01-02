<!doctype html>

<html>

<head>

</head>
<body>
<table class = 'tbl' border ='1' height = "500px" width = "100%">


<tr height = "100px" >
<td colspan = "2">
<p aling = "center">Admin site</p>
<p align = "right"><?php
		session_start();
		
		print "Hello".$_SESSION['username'];
?>
</p>
<p align = "right"><a href = "logout.php">Logout</a></p>
</td>
</tr>
<tr height = "300px"  >

<td height = "300px" width = "25%" valign = "top">
<ul>
  <li><a href = "admin.php" target = "pData">Admin</a></li>
  
  <li><a href = "cartInfo.php" target = "pData">Cart_info</a></li>
  
  <li><a href = "categories.php" target = "pData">Categories</a></li>
  
  <li><a href = "customer.php" target = "pData">Customer</a></li>
  
  <li><a href = "orderDetail.php" target = "pData">Order_details</a></li>
  
  <li><a href = "oreder.php" target = "pData">Orders</a></li>
  
  <li><a href = "product.php" target = "pData">Product</a></li>
  
  <li><a href = "userInfo.php" target = "pData">User_info</a></li>
</ul>  

</td>

<td height = "630px" width = "75%" valign = "top" >
<iframe src='' name='pData' width='80%' height='400px'></iframe>
</td>

</tr>
<tr>
<td colspan = "2" height = "50px" > Copyright BY spWave 2020
</td>
</tr>
</table>


</body>

</html>