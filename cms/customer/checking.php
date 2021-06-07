<?php 
	session_start();

	include '../../config/database.php';

	$email 	= $_POST['email'];
	$password 	= md5($_POST['password']);
	$exist = 0;
	$firstname = "";
	$id = "";
	$user_type = "";
	
	$sql = "SELECT count(email) as exist, id, firstname, role from customer where email = '$email' and password = '$password'";

	$result = mysqli_query($con,$sql);

	while($row = mysqli_fetch_assoc($result)){
		$exist = $row['exist'];
		$firstname = $row['firstname'];
		$id = $row['id'];
		$user_type = $row['role'];
	}

	if($exist > 0){
		$_SESSION['id'] = $id;
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['staff_name'] = $firstname;
		$_SESSION['user_type'] = $user_type;
		
		echo "<script>window.location.href='../complaints/dashboard.php'; </script>";
	}
	else{
		echo "<script>alert ('Failed to Login');</script>";
		echo "<script>window.location.href='../customer/login.php'; </script>";
	}

?>