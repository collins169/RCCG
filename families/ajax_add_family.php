<?php 
include '../functions/db.php';

		$family_name=htmlspecialchars($_POST['family_name'],ENT_QUOTES);
		$family_name=mysqli_real_escape_string($connect,$_POST['family_name']);

		$time=time();
		$created=date ("Y-m-d H:i:s", $time);
		$modified=$created;
			$search=mysqli_query($connect, "SELECT * FROM families WHERE name='$family_name'") or die('Unable To Process Request');
		if(mysqli_num_rows($search)==0){
			$insert=mysqli_query($connect, "INSERT INTO families (id,name,created,modified) VALUES('','$family_name','$created','$modified')") or die('Unable To Process Request');
			if($insert==True){
				echo"<center class='alert alert-success'><i class='fa fa-check-circle'></i> ".$family_name." has successfully been added!</center>";
			}else{
				echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, unable to add".$family_name." at these point!</center>";
			}
		}else{
			
			echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, these ".$family_name." has been used before! </center>";
		}
 ?>