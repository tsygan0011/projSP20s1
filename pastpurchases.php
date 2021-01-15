<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
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
$db = mysqli_connect($dbhost, $dbuser, $dbpass , $dbname);
$myusername = $_SESSION['username'];

$digdirt="SELECT * FROM history WHERE username = '$myusername'";
$result = mysqli_query($db,$digdirt);
$count = mysqli_num_rows($result);

if($result){

	echo "hello <a style='font-size:30px'>$myusername</a>, this is your past purchases with us" . "<br>";
	echo "<style media='screen'>
  table, th, td , to{
    border: 1px solid black;
    border-collapse: collapse;
  }
  th, td {
    padding: 5px;
    text-align: left;
  }
</style>

<table style='width:80%'>
  <tr>
    <th></th>
    <th colspan='6' style='text-align: center'>Number of each shirt ordered</th>
	<th colspan='4' style='text-align: center'>Price</th>
  </tr>
  <tr>
    <th>Date Ordered</th>
    <th>White</th>
    <th>Black</th>
    <th>Red</th>
    <th>Yellow</th>
    <th>Orange</th>
    <th>Total shirts</th>
	<th>Price</th>
	<th>10% Discount</th>
	<th>5% Discount</th>
	<th>Total Price</th>
  </tr>
";
	while ($row = mysqli_fetch_assoc($result)) {
        	$dateordered = $row['dateordered'];
        	$white = $row['white'];
        	$black = $row["black"];
        	$red = $row["red"];
			$yellow = $row["yellow"];
			$orange = $row["orange"];
			$totalshirts = $white + $black + $red + $yellow + $orange;
			$price = $row['price'];
			$discount10 = $row['discount10'];
			$discount5 = $row['discount5'];
			$totalprice = $row['totalprice'];

		echo "<tr>";
		echo "<td>" . $dateordered . "</td>";
		echo "<td>" . $white . "</td>";
		echo "<td>" . $black . "</td>";
		echo "<td>" . $red . "</td>";
		echo "<td>" . $yellow . "</td>";
		echo "<td>" . $orange . "</td>";
		echo "<td>" . $totalshirts . "</td>";
		echo "<td>$" . $price . "</td>";
		echo "<td>$" . $discount10 . "</td>";
		echo "<td>$" . $discount5 . "</td>";
		echo "<td>$" . $totalprice . "</td>";
		echo "</tr>";
    	}

		echo "You have made <a style='font-size:30px'>" . $count . "</a> transactions with us so far" . "<br>";

}else{echo "error";}

?>

<button type="button" name="button" onclick="window.location.href='store.php'" style="background-color: orange; padding: 16px;">Back to store</button>

  </body>
</html>

