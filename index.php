<?php
	session_start();
	session_unset($_SESSION);
	$_SESSION ['k'] = session_id();
	header("Location:home.php");

?>