<?php 
	session_start();
$dbhost="localhost";
$dbname="Intsec";
$dbuser="root";
$dbpass="pass123";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if($conn->connect_error)
	{	
		die("Connect failed: " . $conn->connect_error);
	}

$username = $_SESSION['username'];
$check = "SELECT * FROM cart WHERE username = '$username'" ;
$getitems = mysqli_query($conn,$check);
$row = mysqli_fetch_assoc($getitems);
$fetch_username = $row['username'];
$fetch_plate = $row['plate'];
$fetch_spoon = $row['spoon'];
$fetch_fork = $row['fork'];
$fetch_ladle = $row['ladle'];
$fetch_chopstick = $row['chopstick'];


if ($fetch_username == $username) {
	echo"Number of plates you order: "."$fetch_plate". "<br>";
	echo"Number of spoons you order: "."$fetch_spoon". "<br>";
	echo"Number of forks you order: "."$fetch_fork". "<br>";
	echo"Number of ladles you order: "."$fetch_ladle". "<br>";
	echo"Number of chopsticks you order: "."$fetch_chopstick". "<br>";
}else{
	echo"Contact admin";
}
?>
