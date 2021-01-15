<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="pass123";
$dbname="infodata";

//create new connection
$db = mysqli_connect($dbhost, $dbuser, $dbpass , $dbname);

session_start();
   
if($_SERVER["REQUEST_METHOD"] == "POST") {
$email = $_POST['email'];
$retrieve = "SELECT * FROM users where email = '$email' ";
$result = mysqli_query($db,$retrieve);
$row = mysqli_fetch_assoc($result);
$fetch_email=$row['email'];
$username =$row['username'];
$password = $row['password'];
if ($email==$fetch_email) {
	echo "<script type='text/JavaScript'>
	alert('Your Email Address is: $email\\nYour Username is: $username\\nYour Password is: $password');
	window.location.href = 'retrieve.php';
	</script>";
}else {
	echo "<script type='text/JavaScript'>
	alert('Email address not registered');
	window.location.href = 'register.php';
	</script>";
}
}
?>
