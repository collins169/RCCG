<?php 
include '../functions/db.php';

		$id=htmlspecialchars($_POST['id'],ENT_QUOTES);
		$id=mysqli_real_escape_string($connect,$_POST['id']);

		$family_name=htmlspecialchars($_POST['family_name'],ENT_QUOTES);
		$family_name=mysqli_real_escape_string($connect,$_POST['family_name']);

		$time=time();
		$created=date ("Y-m-d H:i:s", $time);
		$modified=$created;
			$insert=mysqli_query($connect, "UPDATE families SET name='$family_name', modified='$modified' WHERE id=$id") or die('Unable To Process Request');
			if($insert==True){
				echo 1;
			}else{
				echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, unable to update".$family_name." at these point!</center>";
			}
 ?>