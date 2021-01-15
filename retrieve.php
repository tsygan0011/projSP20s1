<!DOCTYPE HTML>
<html>
<head>
<title>BlueWave</title>
</head>
<body style="background-color:lightblue;">  
<body>

<div class="header">
	<h2>BlueWave</h2>
</div>

<form method="post" action="retrieveprocess.php">
	<table>   	
        	<tr>Email Address:</tr>
            <td><input type="text" name="email" class="textInput"><td><br>
           	<tr></tr>
            <td><input type="submit" name="submit" value="Retrieve Username"></td>
    </table>
</form>
<form method="post" action="retrieveprocess1.php">
	<table>
    	
        	<br><tr>Username:</tr>
            <td><input type="text" name="username" class="textInput"><td><br>
           	<tr></tr>
            <td><input type="submit" name="submit" value="Retrieve Email Address"></td>
    </table>
</form>
<form method="post" action="passwordchange.php">

    		<br><h4>To change your password.</h4>
        	<tr>Email Address:</tr>
            <br><td><input type="text" name="email" class="textInput" ></td><br>
        
           <br><td>Username:</td>
          <br><td><input type="text" name="username" class="textInput" ></td><br>
		  
		  <br><tr>Password:</tr>
            <br><td><input type="password" name="password" class="textInput" ></td><br>
        
           <br><td>Confirm password:</td>
          <br><td><input type="password" name="password1" class="textInput" ></td><br>
        
            <tr><br><td><input type="submit" name="submit" value="Change my password"></td>
 
</form>
<p>Click <a href="login.php">here</a> to go back</a></p>
</form>
</body>
</html>