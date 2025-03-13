<?php

//data insert

$cnn = new mysqli("localhost","root","","the_packers");

if(!$cnn) {
	echo "error" . mysqli_error();
}

$a = $_REQUEST['first_name'];
$b = $_REQUEST['last_name'];
$c = $_REQUEST['email'];
$d = $_REQUEST['password'];


if(isset($_REQUEST['submit'])) {
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$sql = "INSERT INTO user(first_name,last_name,email,password) VALUES ('$a','$b','$c','$d')";
		if($cnn->query($sql) == true) {
			echo "<script>alert('Register successfully!');</script>";
		echo "<script>window.location.href='login.html';</script>";
		}
		else {
			echo "something wrong";
		}
	}
}

$cnn->close();
?>
