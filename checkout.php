<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<style>
table, th, td {
  border: 1px solid black;
}
table.a {
	border: none;
}	
th.b {
  visibility: hidden;
}
</style>
<body style="background-color:lightblue;"> 
<meta charset="utf-8">
<title></title>
</head>
<body>
<?php
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="pass123";
    $dbname="infodata";
	
    session_start();
    //create new connection
    $db = mysqli_connect($dbhost, $dbuser, $dbpass , $dbname);
    $myusername = $_SESSION['username'];
	date_default_timezone_set("Singapore");
	$currentdate = date("Y-m-d") ;
    $sql = "SELECT * FROM orderitems WHERE username = '$myusername'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_assoc($result);
    $whiteshirt = $row['white'];
    $blackshirt = $row['black'];
    $orangeshirt = $row['orange'];
    $redshirt = $row['red'];
    $yellowshirt = $row['yellow'];
	$date2 = $row['dateb4renew'];
	$firsttime = $row['firsttime'];

if ($_SESSION['username']) {
}else {
echo "<script type='text/JavaScript'>
	alert('Please login before proceeding.');
	window.location.href = 'login.php';
	</script>";
}
    $unitprice = ($whiteshirt + $blackshirt + $redshirt + $orangeshirt + $yellowshirt) * 5;

if ($unitprice == 0) {
echo "<script type='text/JavaScript'>
alert('Order something');
window.location.href = 'store.php';
</script>";
}
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
?>
<table style="width:25%">
<caption><b>Summary of Orders</b></caption>
    <tr>
    <th>Item</th> 
    <th>No. of Items</th> 
    <th>Price</th>
  </tr>
  <tr>
    <td>White Shirt</td>
    <td><?php echo"$whiteshirt";?></td>
    <td align="right"><?php $totalwhite = 5 * $whiteshirt;
		echo "$".number_format($totalwhite,2);?></td>
  </tr>
  <tr>
    <td>Black Shirt</td>
    <td><?php echo"$blackshirt";?></td>
    <td align="right"><?php $totalblack = 5 * $blackshirt;
		echo "$".number_format($totalblack,2);?></td>
  </tr>
  <tr>
    <td>Red Shirt</td>
    <td><?php echo"$redshirt";?></td>
    <td align="right"><?php $totalred = 5 * $redshirt;
		echo "$".number_format($totalred,2);?></td>
  </tr>
  <tr>
    <td>Yellow Shirt</td>
    <td><?php echo"$yellowshirt";?></td>
    <td align="right"><?php $totalyellow = 5 * $yellowshirt;
		echo "$".number_format($totalyellow,2);?></td>
  </tr>
  <tr>
    <td>Orange Shirt</td>
    <td><?php echo"$orangeshirt";?></td>
    <td align="right"><?php $totalorange = 5 * $orangeshirt;
		echo "$".number_format($totalorange,2);?></td>
  </tr>
</table>
<table class='a'>
   <tr>
	<th class='b'>Itemssssssssssssssssss</th>
    <th align="left" style="width:39.3%">Price</th> 
    <td style="width:21%" align="right"><?php echo "$".number_format($unitprice,2);?></td>
  </tr>
  <tr>
    <th class='b'></th> 
    <th align="left">10% Discount</th> 
    <td style="width:21%" align="right"><?php echo "$".number_format($discount10,2);?></td>
  </tr>
  <tr>
    <th class='b'></th> 
    <th align="left">5% Discount</th> 
    <td style="width:19.5%" align="right"><?php echo "$".number_format($discount5,2);?></td>
  </tr>
  <tr>
    <th class='b'></th> 
    <th align="left">Total Price</th> 
    <th style="width:19.5%" align="right"><?php echo "$".number_format($finalprice,2);?></th>
  </tr>
 </table>

    <form action="endpage.php" method="POST">
        <input type="submit" value="Proceed to Pay" />
    </form>
	<form action="store.php" method="POST">
        <input type="submit" value="Go Back" />
    </form>


  </body>
</html>

