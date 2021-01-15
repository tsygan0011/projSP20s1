<?php 
	session_start();
$dbhost="localhost";
$dbname="logindatabase";
$dbuser="root";
$dbpass="pass123";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if($conn->connect_error)
	{	
		die("Connect failed: " . $conn->connect_error);
	}
$username = $_SESSION['username'];
$bluetie = mysqli_real_escape_string($conn,$_POST['quantity1']);
$purpletie = mysqli_real_escape_string($conn,$_POST['quantity2']); 
$browntie = mysqli_real_escape_string($conn,$_POST['quantity3']); 
$pinktie = mysqli_real_escape_string($conn,$_POST['quantity4']); 
$blacktie = mysqli_real_escape_string($conn,$_POST['quantity5']); 
$whitetie = mysqli_real_escape_string($conn,$_POST['quantity6']); 

if (!empty($bluetie))
{
	$purpletie = 0 ;
	$browntie = 0;
	$pinktie = 0;
	$blacktie = 0;
	$whitetie = 0;
	$check = "SELECT * FROM cart WHERE username = '$username'" ;
	$duplicate = mysqli_query($conn,$check);
	
	if (!mysqli_num_rows($duplicate) > 0) {
		$sql = "INSERT INTO cart (username,plate,spoon,fork,ladle,chopstick) 
		VALUES ('$username','$blackshirt','$whiteshirt','$orangeshirt','$redshirt','$yellowshirt')";
		$result1 = mysqli_query($conn,$sql);
		if ($result1){
		 echo "<script type='text/JavaScript'>
		 alert('Added to cart');
		 window.location.href = 'shopping.php';
		 </script>";
		}else{ 
		echo"Error"; 
		}
	}else{ 
		 $update = "UPDATE cart SET plate = plate + '$blackshirt' WHERE username = '$username'";
		 $result2 = mysqli_query($conn,$update);
		 if ($result2) {
		 echo "<script type='text/JavaScript'>
		 alert('Added to cart');
		 window.location.href = 'shopping.php';
		 </script>"; 
		 }
		 else{ 
		 echo"Error update";
		 }
	}
}else if (!empty($whiteshirt))
{
	 $blackshirt = 0;
	 $orangeshirt = 0;
	 $redshirt = 0;
	 $yellowshirt = 0;
	 $check = "SELECT * FROM cart WHERE username = '$username'" ;
	 $duplicate = mysqli_query($conn,$check);
	
	 if (!mysqli_num_rows($duplicate) > 0) {
		$sql = "INSERT INTO cart (username,plate,spoon,fork,ladle,chopstick) 
		VALUES ('$username','$blackshirt','$whiteshirt','$orangeshirt','$redshirt','$yellowshirt')";
		$result1 = mysqli_query($conn,$sql);
		if ($result1){
		 echo "<script type='text/JavaScript'>
		 alert('Added to cart');
		 window.location.href = 'shopping.php';
		 </script>"; 
		}else{ 
		echo"Error"; 
		}
	 }else{ 
		 $update = "UPDATE cart SET spoon = spoon + '$whiteshirt' WHERE username = '$username'";
		 $result2 = mysqli_query($conn,$update);
		 if ($result2) {
		 echo "<script type='text/JavaScript'>
		 alert('Added to cart');
		 window.location.href = 'shopping.php';
		 </script>"; 
		 }
		 else{ 
		 echo"Error update";
		 }
	}
}else if (!empty($orangeshirt))
{ 	
	 $blackshirt = 0 ;
	 $whiteshirt = 0;
	 $redshirt = 0;
	 $yellowshirt = 0;
	 $check = "SELECT * FROM cart WHERE username = '$username'" ;
	 $duplicate = mysqli_query($conn,$check);
	
	 if (!mysqli_num_rows($duplicate) > 0) {
		$sql = "INSERT INTO cart (username,plate,spoon,fork,ladle,chopstick) 
		VALUES ('$username','$blackshirt','$whiteshirt','$orangeshirt','$redshirt','$yellowshirt')";
		$result1 = mysqli_query($conn,$sql);
		if ($result1){
		 echo "<script type='text/JavaScript'>
		 alert('Added to cart');
		 window.location.href = 'shopping.php';
		 </script>"; 
		}else{ 
		echo"Error"; 
		}
	 }else{ 
		 $update = "UPDATE cart SET fork = fork + '$orangeshirt' WHERE username = '$username'";
		 $result2 = mysqli_query($conn,$update);
		 if ($result2) {
		 echo "<script type='text/JavaScript'>
		 alert('Added to cart');
		 window.location.href = 'shopping.php';
		 </script>";  
		 }
		 else{ 
		 echo"Error update";
		 }
	}
}else if (!empty($redshirt))
{
	 $blackshirt = 0 ;
	 $whiteshirt = 0;
	 $orangeshirt = 0;
	 $yellowshirt = 0;
	 $check = "SELECT * FROM cart WHERE username = '$username'" ;
	 $duplicate = mysqli_query($conn,$check);
	
	 if (!mysqli_num_rows($duplicate) > 0) {
		$sql = "INSERT INTO cart (username,plate,spoon,fork,ladle,chopstick) 
		VALUES ('$username','$blackshirt','$whiteshirt','$orangeshirt','$redshirt','$yellowshirt')";
		$result1 = mysqli_query($conn,$sql);
		if ($result1){
		 echo "<script type='text/JavaScript'>
		 alert('Added to cart');
		 window.location.href = 'shopping.php';
		 </script>"; 
		}else{ 
		echo"Error"; 
		}
	 }else{ 
		 $update = "UPDATE cart SET ladle = ladle + '$redshirt' WHERE username = '$username'";
		 $result2 = mysqli_query($conn,$update);
		 if ($result2) {
		 echo "<script type='text/JavaScript'>
		 alert('Added to cart');
		 window.location.href = 'shopping.php';
		 </script>";  
		 }
		 else{ 
		 echo"Error update";
		 }
	}
}else if (!empty($yellowshirt))
{
	 $blackshirt = 0 ;
	 $whiteshirt = 0;
	 $orangeshirt = 0;
	 $redshirt = 0;
	 $check = "SELECT * FROM cart WHERE username = '$username'" ;
	 $duplicate = mysqli_query($conn,$check);
	
	 if (!mysqli_num_rows($duplicate) > 0) {
		$sql = "INSERT INTO cart (username,plate,spoon,fork,ladle,chopstick) 
		VALUES ('$username','$blackshirt','$whiteshirt','$orangeshirt','$redshirt','$yellowshirt')";
		$result1 = mysqli_query($conn,$sql);
		if ($result1){
		 echo "<script type='text/JavaScript'>
		 alert('Added to cart');
		 window.location.href = 'shopping.php';
		 </script>"; 
		}else{ 
		echo"Error"; 
		}
	 }else{ 
		 $update = "UPDATE cart SET chopstick = chopstick + '$yellowshirt' WHERE username = '$username'";
		 $result2 = mysqli_query($conn,$update);
		 if ($result2) {
		 echo "<script type='text/JavaScript'>
		 alert('Added to cart');
		 window.location.href = 'shopping.php';
		 </script>"; 
		 }
		 else{ 
		 echo"Error update";
		 }
	}
}
?>