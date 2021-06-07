<?php 
	include 'database.php';

	
	function getUser($con){

		if(isset($_SESSION['staff_id'])){

			$email = $_SESSION['staff_id'];
			$role_id = "";

			$sql = "SELECT * from staff where email = '$email'";

			$result = mysqli_query($con,$sql);

			$row = mysqli_fetch_assoc($result);

			return $row;
		}else{

			$email = $_SESSION['email'];
			$role_id = "";

			$sql = "SELECT * from customer where email = '$email'";

			$result = mysqli_query($con,$sql);

			$row = mysqli_fetch_assoc($result);

			return $row;
		}
	}

	function getUserType(){
		// return $_SESSION['user_type'];
		return 1;
	}
	
?>