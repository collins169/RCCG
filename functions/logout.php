<?php 
	session_start();
	session_destroy();
	unset($_SESSION['login_id']);
	unset($_SESSION['locked']);
	unset($_SESSION['time_login_token']);
	
	echo "<script>window.location='../login.php'</script>";
 ?>