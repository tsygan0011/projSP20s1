<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="pass123";
$dbname="infodata";

//create new connection
$db = mysqli_connect($dbhost, $dbuser, $dbpass , $dbname);

$username = $_POST['username'];
$retrieve = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($db,$retrieve);
$row = mysqli_fetch_assoc($result);
$fetch_email=$row['email'];
$fetch_username =$row['username'];

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
