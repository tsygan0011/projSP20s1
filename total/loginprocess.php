<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="pass123";
$dbname="infodata";

session_start();

//create new connection
$db = mysqli_connect($dbhost, $dbuser, $dbpass , $dbname);

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
	  $rememberuser = mysqli_real_escape_string($db,$_POST['rememberme']);
	  $tick = tick ;
      $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
		 if ($rememberuser == $tick) {
		 setcookie("myusername",$myusername, time() + 3600, '/');
		 setcookie("mypassword",$mypassword, time() + 3600, '/');
		 $_SESSION['username'] = $myusername ;
		 echo "<script type='text/JavaScript'>
		 alert('Login Successful');
		 window.location.href = 'store.php';
		 </script>";
		 } else {
			 setcookie("myusername",$myusername, time() - 3600, '/');
			 setcookie("mypassword",$mypassword, time() - 3600, '/');
			 $_SESSION['username'] = $myusername ;
		     echo "<script type='text/JavaScript'>
		     alert('Login Successful');
		     window.location.href = 'store.php';
		     </script>";
		 }
      } else {
         echo "<script type='text/JavaScript'>
		 alert('Wrong Username or Password');
		 window.location.href = 'login.php';
		 </script>";
      }
}

?>
