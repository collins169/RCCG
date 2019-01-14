<?php 
include '../functions/db.php';

		$id=htmlspecialchars($_POST['id'],ENT_QUOTES);
		$id=mysqli_real_escape_string($connect,$_POST['id']);

		$school_name=htmlspecialchars($_POST['school_name'],ENT_QUOTES);
		$school_name=mysqli_real_escape_string($connect,$_POST['school_name']);

		$time=time();
		$created=date ("Y-m-d H:i:s", $time);
		$modified=$created;
			$insert=mysqli_query($connect, "UPDATE schools SET name='$school_name', modified='$modified' WHERE id=$id") or die('Unable To Process Request');
			if($insert==True){
				echo 1;
			}else{
				echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, unable to update".$school_name." at these point!</center>";
			}
 ?>