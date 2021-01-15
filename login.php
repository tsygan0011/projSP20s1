<?php
session_start();
$username = $_COOKIE['myusername'];
$password = $_COOKIE['mypassword'];
?>
<!DOCTYPE HTML>
<html>
<body style="background-color:lightblue;">  
<body>

<div class="header">
	<h1>Bluewave</h1>
</div>
<?php
	if ($_SESSION['username']) {
		 echo "<script type='text/JavaScript'>
		 alert('You are already logged in');
		 window.location.href = 'store.php';
		 </script>";
	}
?>
<h4>You must login in order to proceed</h4>
<form method="post" action="loginprocess.php">
        	<tr>Username:</tr></br>
            <td><input type="text" name="username" class="textInput" value=<?php echo"$username"; ?>></td>

        <tr>
        	<br><td>Password:</td></br>
            <td><input type="password" name="password" class="textInput" value=<?php echo"$password"; ?>></td>
        </tr>
 		<tr>
        
        <br><td><input type="checkbox" name="rememberme" id="rememberme" value="tick"></td>
        <label for="rememberme">Remember me</label><br>
         
         </tr>
 			<td></td>
            <td><input type="submit" name="login" value="Login"></td>
	<p>Are you a new user? Click <a href="register.php">here</a> to sign up!</a></p>
	<p>Click <a href="retrieve.php">here</a> to retrieve your information if you forget.</a></p>
</form>
</body>
</html>