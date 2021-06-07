<?php 
	session_start();

	include '../../config/database.php';

	$email 		= $_POST['email'];
	$password 	= md5($_POST['password']);
	$exist = 0;
	$firstname = "";
	$user_type = "";
	
	$sql = "SELECT count(email) as exist, name, role from admin where email = '$email' and password = '$password'";

	$result = mysqli_query($con,$sql);

	while($row = mysqli_fetch_assoc($result)){
		$exist = $row['exist'];
		$firstname = $row['name'];
		$user_type = $row['role'];

	}

	if($exist > 0){
		$_SESSION['staff_id'] = $_POST['email'];
		$_SESSION['staff_name'] = $firstname;
		$_SESSION['user_type'] = $user_type;
		
		echo "<script>window.location.href='../complaints/dashboardAdmin.php'; </script>";
	}
	else{
		echo "<script>alert ('Failed to Login');</script>";
		echo "<script>window.location.href='../admin/login.php'; </script>";
	}

	mysqli_close($con);
?>