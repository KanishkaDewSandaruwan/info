<?php
	session_start();
	if(!isset($_SESSION['reg_number'])){
		header('location:login.php');
	}
?>