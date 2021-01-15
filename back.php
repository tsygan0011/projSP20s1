<?php
	session_start(); 
	$dbhost="localhost"; 
	$dbname="infodata"; 
	$dbuser="root"; 
	$dbpass="pass123"; 
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 
if($conn->connect_error){
	die("Connect failed: " . $conn->connect_error);
}
$username = $_SESSION['username']; 
$query = "SELECT * FROM orderitems WHERE username = '$username'"; 
$checkfirst = mysqli_query($conn,$query); 
$row = mysqli_fetch_assoc($checkfirst); 
$fetch_username = $row['username']; 

$checkout = 0;
$sql = "UPDATE orderitems SET checkout = $checkout WHERE username = '$fetch_username'";
$result = mysqli_query($conn,$sql);
header( "refresh:0;url=store.php" );
?>
