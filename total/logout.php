<?php
	session_start();
	session_destroy();
	unset($_SESSION['username']);
	echo "<script type='text/JavaScript'>
		 alert('Finally you are free');
		 window.location.href = 'login.php';
		 </script>";
?>