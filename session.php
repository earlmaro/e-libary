<?php

    require 'db.php';
    
	session_start();

	$email = $_SESSION['signed_in'];


	$query = " SELECT * FROM user where email = '$email' ";
	// $book = [];
	// $book = $_SESSION['book'];


	$sql = mysqli_query($con , $query);

    $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);


	$lastname = $row['name'];
	// $phone = $row['phone'];
	$password = $row['password'];
	$role = $row['role'];


	if(!isset($_SESSION['signed_in'])){
		// header('Location: dashboard.php');
	}


	

?>
    