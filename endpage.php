<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="pass123";
$dbname="infodata";

session_start();

//create new connection
$db = mysqli_connect($dbhost, $dbuser, $dbpass , $dbname);
	
$username = $_SESSION['username'];
date_default_timezone_set("Singapore");
$sql = "SELECT * FROM orderitems WHERE username = '$username'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
$fetch_username = $row['username'];
$whiteshirt = $row['white'];
$blackshirt = $row['black'];
$orangeshirt = $row['orange'];
$redshirt = $row['red'];
$yellowshirt = $row['yellow'];
$date = date("Y/m/d");
$date2 = $row['dateb4renew'];
$date3 = $row['datetorenew'];
$firsttime = $row['firsttime'];


if ($_SESSION['username']) {
}else {
echo "<script type='text/JavaScript'>
	alert('Please login before proceeding.');
	window.location.href = 'login.php';
	</script>";
}

$unitprice = ($whiteshirt + $blackshirt + $redshirt + $orangeshirt + $yellowshirt) * 5;
	
if ($firsttime == 1) {
		if($unitprice > 100) {
			$discount10 = $unitprice * 0.1;
			$discount5 = 0;
			$finalprice = $unitprice * 0.9;			
		}else {
			$discount10 = 0;
			$discount5 = 0;
			$finalprice = $unitprice ;			
		}
	}else {
		if ($unitprice > 100) {
			if ($currentdate < $date2) {
				$discount10 = $unitprice * 0.1;
				$discount5 = $unitprice * 0.05;
				$finalprice = $unitprice * 0.85;				
			}else{
				$discount10 = $unitprice *0.1;
				$discount5 = 0;
				$finalprice = $unitprice * 0.9;				
			}
		}else {
			if ($currentdate < $date2) {
				$discount5 = $unitprice * 0.05;
				$discount10 = 0 ;
				$finalprice = $unitprice * 0.95;
			}else {
				$discount5 = 0;
				$discount10 = 0;
				$finalprice = $unitprice ;
			}
		}
	}
if ($unitprice != 0)
{
$sendtohistory = "INSERT INTO history (dateordered,date10days,username, white, black, red, yellow,orange,
				 price,discount10,discount5,totalprice) VALUES 
				 ('$date','$date2','$username', '$whiteshirt', '$blackshirt', '$redshirt', '$yellowshirt', '$orangeshirt',
				 '$unitprice','$discount10','$discount5','$finalprice')";

$sendtodb = mysqli_query($db,$sendtohistory);
}else{
die('<script type="text/javascript">
	alert("Order something");
	location.replace("store.php")
	</script>');
}
/*if ($sendtodb) {
echo"Successful";
}else{
echo"Error";
}*/
$updatecart = "UPDATE orderitems SET dateb4renew = '$date3', firsttime ='0' ,white = '0', black = '0', orange = '0' , red = '0' ,
			   yellow = '0' WHERE username = '$username'";
$updatedb = mysqli_query($db,$updatecart);


if ($updatedb) {
echo"Transaction Successful. Redirecting you back to store in 5 seconds";
header( "refresh:5;url=store.php" );
}else{
echo"Error";
}

//echo"<br>" . "transaction successful";

?>

<!DOCTYPE html>
<html>
<style>
p {
    padding : 0;
    margin : 0;
}
</style>
<body style="background-color:lightblue;">
<body>
<p>Click <a href="store.php">here</a> to go to the store page straight away.</p>
</body>
</html>