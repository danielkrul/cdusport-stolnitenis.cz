<?php
	session_start();
	require 'connect.php';

	function getOut(){
		header("Location: index.php");
		die();
	}

	$name = $_SESSION['name'];
	$password = $_SESSION['password'];

	$sqlPasswordCorrect = "SELECT name FROM login WHERE password='$password'";
	$resultPasswordCorrect = mysqli_query($conn, $sqlPasswordCorrect);
	if(mysqli_num_rows($resultPasswordCorrect) == 0){
		getOut();
	} else {
		$rowPasswordCorrect = mysqli_fetch_assoc($resultPasswordCorrect);
		if($rowPasswordCorrect['name'] != $name){
			getOut();
		}
	}
?>