<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="pass123";
$dbname="infodata";

//create new connection
$db = mysqli_connect($dbhost, $dbuser, $dbpass , $dbname);

$email = $_POST['email'];
$retrieve = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($db,$retrieve);
$row = mysqli_fetch_assoc($result);
$fetch_email=$row['email'];
$fetch_username =$row['username'];

if ($email==$fetch_email) {
	echo "<script type='text/JavaScript'>
	alert('Your Username is: $fetch_username');
	window.location.href = 'retrieve.php';
	</script>";
}else {
	echo "<script type='text/JavaScript'>
	alert('Email address not registered');
	window.location.href = 'retrieve.php';
	</script>";
}

if ($username == $fetch_username) {
	echo "<script type='text/JavaScript'>
	alert('Your Email Address is: $fetch_email');
	window.location.href = 'retrieve.php';
	</script>";
}else{
	echo "<script type='text/JavaScript'>
	alert('Username is not registered');
	window.location.href = 'retrieve.php';
	</script>";
}

?>
