<?php
include '../../config/database.php';

$firstname 	= $_POST['firstname'];
$email 		= $_POST['email'];
$street 	= $_POST['street'];
$street2 	= $_POST['street2'];
$postcode 	= $_POST['postcode'];
$city 		= $_POST['city'];
$state 		= $_POST['state'];
$country 	= $_POST['country'];
$contact 	= $_POST['contact'];
$password 	= md5($_POST['password']);
// echo $_POST['password'];

$sql = "INSERT INTO customer(firstname, email, contact, password, street, street2, postcode, city, country, state, role)
		VALUES ('$firstname','$email','$contact','$password','$street','$street2','$postcode','$city','$country','$state', '2')";
echo $sql;
$result = mysqli_query($con,$sql);

if($result > 0){
	echo "<script>alert ('Register successfully');</script>";
	// echo "<script>window.location.href='../customer/login.php'; </script>";
}
else{
	echo "<script>alert ('Failed to Register');</script>";
	// echo "<script>window.location.href='../customer/register.php'; </script>";
}

mysqli_close($con);
?>