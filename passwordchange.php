<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="pass123";
$dbname="infodata";

//create new connection
$db = mysqli_connect($dbhost, $dbuser, $dbpass , $dbname);

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$password1 = $_POST['password1'];
$retrieve = "SELECT * FROM users WHERE (email = '$email' AND username = '$username')";
$result = mysqli_query($db,$retrieve);
$match = mysqli_num_rows($result);

if ($_POST['password'] !== $_POST['password1']) {
	die('<script type="text/javascript">
	alert("Password does not match");
	location.replace("retrieve.php")
	</script>');
}

if (empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password1']) ) {
	die('<script type="text/javascript">
	alert("Please fill in all forms");
	location.replace("retrieve.php")
	</script>');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die('<script type="text/javascript">
	alert("Invalid email format");
	location.replace("retrieve.php")
	</script>');
}

if ($match == 1) {
	$update = "UPDATE users SET password = '$password' WHERE (email = '$email' AND username = '$username')";
	$updatepassword = mysqli_query($db,$update);
	echo "<script type='text/JavaScript'>
	alert('Changed password');
	window.location.href = 'login.php';
	</script>";
}else{
	 echo "<script type='text/JavaScript'>
	 alert('Wrong Username/Email Address');
	 window.location.href = 'retrieve.php';
	 </script>";
}
?>
