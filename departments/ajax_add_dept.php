<?php 
include '../functions/db.php';

		$dept_name=htmlspecialchars($_POST['dept_name'],ENT_QUOTES);
		$dept_name=mysqli_real_escape_string($connect,$_POST['dept_name']);

		$time=time();
		$created=date ("Y-m-d H:i:s", $time);
		$modified=$created;
			$search=mysqli_query($connect, "SELECT * FROM departments WHERE name='$dept_name'") or die('Unable To Process Request');
		if(mysqli_num_rows($search)==0){
			$insert=mysqli_query($connect, "INSERT INTO departments (id,name,created,modified) VALUES('','$dept_name','$created','$modified')") or die('Unable To Process Request');
			if($insert==True){
				echo"<center class='alert alert-success'><i class='fa fa-check-circle'></i> ".$dept_name." has successfully been added!</center>";
			}else{
				echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, unable to add".$dept_name." at these point!</center>";
			}
		}else{
			
			echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, ".$dept_name." has been used before! </center>";
		}
 ?>