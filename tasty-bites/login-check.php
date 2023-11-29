<?php 
	if (!isset($_SESSION['user'])) {
		$_SESSION['no-login'] = "<div style='color:red;>Please login first to enter admin panel!</div>";
		header('location:index.php');
	}
 ?>