<?php 

					session_start();
 	 $connect= @mysqli_connect('localhost','root','','rccg') or die('Could Not Connect to the Database, Please Contact the Administrator of KED Systems.');
//	$connect= @mysqli_connect('localhost','bluerayg_collins','Ads13a00106y','bluerayg_rccgambprotocolgh') or die('Could Not Connect to the Database, Please Contact the Administrator of KED Systems.');

	if (isset($_SESSION["login_id"])!="") {
		echo "<script>window.location='index.php'</script>";
	}
		$username=htmlspecialchars($_POST['username'],ENT_QUOTES);
		$username=mysqli_real_escape_string($connect,$_POST['username']);

		$password=md5(htmlspecialchars($_POST['password'],ENT_QUOTES));
		$password=md5(mysqli_real_escape_string($connect,$_POST['password']));

		$check=mysqli_query($connect,"SELECT * FROM users WHERE username='$username' AND password='$password'")or die("Unable to process request");
		if(mysqli_num_rows($check)>0){
			$info=mysqli_fetch_assoc($check);
					$time=time()+3600;
					$_SESSION["locked"]=$info['username'];
					$_SESSION["login_id"]=$info['id'];
					$_SESSION["time_login_token"]=$time;
					echo 1;
		}else{
			echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Username and Password Not Correct!</center><hr/>";
		}
 ?>