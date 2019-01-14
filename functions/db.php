<?php 
session_start();
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
//Connection to the Database
	 $connect= @mysqli_connect('localhost','root','','rccg') or die('Could Not Connect to the Database, Please Contact the Administrator of KED Systems.');
//$connect= @mysqli_connect('localhost','bluerayg_collins','Ads13a00106y','bluerayg_rccgambprotocolgh') or die('Could Not Connect to the Database, Please Contact the Administrator of KED Systems.');
$conn=$connect;
$item_per_page 		= 50;

	if (isset($_SESSION["login_id"]) && isset($_SESSION["time_login_token"])) {
		if(time() > $_SESSION['time_login_token']){
			echo "<script>window.location='../functions/logout.php'</script>";
		}
	}
	if (isset($_SESSION["login_id"])=='') {
			echo "<script>window.location='../functions/logout.php'</script>";
		}

	 $id=$_SESSION['login_id'];
    $check= mysqli_query($connect, "SELECT * FROM users WHERE id=$id")or die("Unable to process request");
    if (mysqli_num_rows($check)>0) {
        $user_info=mysqli_fetch_array($check);
    }
    $username=$user_info['username'];
 ?>
