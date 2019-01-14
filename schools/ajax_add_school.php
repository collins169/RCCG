<?php 
include '../functions/db.php';

		$school_name=htmlspecialchars($_POST['school_name'],ENT_QUOTES);
		$school_name=mysqli_real_escape_string($connect,$_POST['school_name']);

		$time=time();
		$created=date ("Y-m-d H:i:s", $time);
		$modified=$created;
			$search=mysqli_query($connect, "SELECT * FROM schools WHERE name='$school_name'") or die('Unable To Process Request');
		if(mysqli_num_rows($search)==0){
			$insert=mysqli_query($connect, "INSERT INTO schools (id,name,created,modified) VALUES('','$school_name','$created','$modified')") or die('Unable To Process Request');
			if($insert==True){
				echo"<center class='alert alert-success'><i class='fa fa-check-circle'></i> ".$school_name." has successfully been added!</center>";
			}else{
				echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, unable to add ".$school_name." at these point!</center>";
			}
		}else{
			
			echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, ".$school_name." has been used before! </center>";
		}
 ?>