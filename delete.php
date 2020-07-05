<?php 
	require_once "function.php";
	require_once "db.php";





	$id = $_GET['id'];
	$sql= "DELETE  FROM product_info WHERE id='$id'";
	$connection -> query($sql);

	header('location:allstudent.php');
?>