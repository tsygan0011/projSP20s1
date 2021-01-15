<?php 
	session_start();
$dbhost="localhost";
$dbname="infodata";
$dbuser="root";
$dbpass="pass123";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if($conn->connect_error)
	{	
		die("Connect failed: " . $conn->connect_error);
	}

$email=mysqli_real_escape_string($conn, $_POST['email']);
$username=mysqli_real_escape_string($conn, $_POST['username']);
$password=mysqli_real_escape_string($conn, $_POST['password']);
$password2=mysqli_real_escape_string($conn, $_POST['password2']);

if (empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password2']) ) {
	die('<script type="text/javascript">
	alert("Please fill in all forms");
	location.replace("register.php")
	</script>');
}

if ($_POST['password'] !== $_POST['password2']) {
	die('<script type="text/javascript">
	alert("Password does not match");
	location.replace("register.php")
	</script>');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die('<script type="text/javascript">
	alert("Invalid email format");
	location.replace("register.php")
	</script>');
}

$query = "SELECT * FROM users WHERE (username = '$username' or email = '$email')" ;
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0) {
	die('<script type="text/javascript">
	alert("Username or Email is taken");
	location.replace("register.php")
	</script>');
}else{
	$sql = "INSERT INTO users (email,username,password) VALUES ('$email','$username','$password')";
	$result = mysqli_query($conn,$sql);
	if($result)
	{
		echo "<script type='text/JavaScript'>
		 alert('Register Successful');
		 window.location.href = 'login.php';
		 </script>";
	}else{
		echo "<script type='text/JavaScript'>
		 alert('Register unsuccessful');
		 window.location.href = 'register.php';
		 </script>";
	}
}

?>