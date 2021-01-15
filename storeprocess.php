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
date_default_timezone_set("Singapore");
$date2 = date("Y/m/d", strtotime($date. ' +10 days'));
$username = $_SESSION['username'];
$white = mysqli_real_escape_string($conn,$_POST['whiteShirt']);
$black = mysqli_real_escape_string($conn,$_POST['blackShirt']);
$red = mysqli_real_escape_string($conn,$_POST['redShirt']);
$yellow = mysqli_real_escape_string($conn,$_POST['yellowShirt']);
$orange = mysqli_real_escape_string($conn,$_POST['orangeShirt']);
$totalshirt = $white + $black + $red + $yellow + $orange;
$query = "SELECT * FROM orderitems WHERE username = '$username'";
$checkfirst = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($checkfirst);
$fetch_username = $row['username'];
$fetch_firsttime = $row['firsttime'];

if($totalshirt != 0){
	if ($fetch_username == $username) {
		$sql = "UPDATE orderitems SET datetorenew = '$date2', 
			    white ='$white', black = '$black' , red = '$red',
				yellow = '$yellow' , orange = '$orange' WHERE username = '$fetch_username'";
		$result = mysqli_query($conn,$sql);
	}else {
		$firsttime = 1;
		$sql = "INSERT INTO orderitems (firsttime,dateb4renew,datetorenew,username,white,black,red,yellow,orange) 
		VALUES ('$firsttime','$date2','$date2','$username','$white','$black','$red','$yellow','$orange')";
		$result = mysqli_query($conn,$sql);
	}
if($result)
{
	echo "<script type='text/JavaScript'>
		alert('Checkout Successful');
		window.location.href = 'checkout.php';
		</script>";
}else{
	echo "<script type='text/JavaScript'>
		alert('Checkout unsuccessful');
		window.location.href = 'store.php';
		</script>";
 	}
} else {
}


?>
