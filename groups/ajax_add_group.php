<?php 
include '../functions/db.php';

		$group_name=htmlspecialchars($_POST['group_name'],ENT_QUOTES);
		$group_name=mysqli_real_escape_string($connect,$_POST['group_name']);

		$time=time();
		$created=date ("Y-m-d H:i:s", $time);
		$modified=$created;
			$search=mysqli_query($connect, "SELECT * FROM groups WHERE name='$group_name'") or die('Unable To Process Request');
		if(mysqli_num_rows($search)==0){
			$insert=mysqli_query($connect, "INSERT INTO groups (id,name,created,modified) VALUES('','$group_name','$created','$modified')") or die('Unable To Process Request');
			if($insert==True){
				echo"<center class='alert alert-success'><i class='fa fa-check-circle'></i> ".$group_name." has successfully been added!</center>";
			}else{
				echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, unable to add".$group_name." at these point!</center>";
			}
		}else{
			
			echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, these ".$group_name." has been used before! </center>";
		}
 ?>