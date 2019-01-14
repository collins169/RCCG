<?php
include '../functions/db.php';


	$surname=htmlspecialchars($_POST['surname'],ENT_QUOTES);
	$surname=mysqli_real_escape_string($connect,$_POST['surname']);

	$middle_name=htmlspecialchars($_POST['middle_name'],ENT_QUOTES);
	$middle_name=mysqli_real_escape_string($connect,$_POST['middle_name']);

	$first_name=htmlspecialchars($_POST['first_name'],ENT_QUOTES);
	$first_name=mysqli_real_escape_string($connect,$_POST['first_name']);

	$phone=htmlspecialchars($_POST['phone'],ENT_QUOTES);
	$phone=mysqli_real_escape_string($connect,$_POST['phone']);

	$other_phone=htmlspecialchars($_POST['other_phone'],ENT_QUOTES);
	$other_phone=mysqli_real_escape_string($connect,$_POST['other_phone']);

	$gender=htmlspecialchars($_POST['gender'],ENT_QUOTES);
	$gender=mysqli_real_escape_string($connect,$_POST['gender']);

	$dob=htmlspecialchars($_POST['dob'],ENT_QUOTES);
	$dob=mysqli_real_escape_string($connect,$_POST['dob']);

	$join_date=htmlspecialchars($_POST['join_date'],ENT_QUOTES);
	$join_date=mysqli_real_escape_string($connect,$_POST['join_date']);

	$email=htmlspecialchars($_POST['email'],ENT_QUOTES);
	$email=mysqli_real_escape_string($connect,$_POST['email']);

	$country=htmlspecialchars($_POST['country'],ENT_QUOTES);
	$country=mysqli_real_escape_string($connect,$_POST['country']);

	$occupation=htmlspecialchars($_POST['occupation'],ENT_QUOTES);
	$occupation=mysqli_real_escape_string($connect,$_POST['occupation']);

	$school=htmlspecialchars($_POST['school'],ENT_QUOTES);
	$school=mysqli_real_escape_string($connect,$_POST['school']);

	$address=htmlspecialchars($_POST['address'],ENT_QUOTES);
	$address=mysqli_real_escape_string($connect,$_POST['address']);

	$martial_status=htmlspecialchars($_POST['martial_status'],ENT_QUOTES);
	$martial_status=mysqli_real_escape_string($connect,$_POST['martial_status']);

	$family=htmlspecialchars($_POST['family'],ENT_QUOTES);
	$family=mysqli_real_escape_string($connect,$_POST['family']);

	$dept=htmlspecialchars($_POST['dept'],ENT_QUOTES);
	$dept=mysqli_real_escape_string($connect,$_POST['dept']);

	$group=htmlspecialchars($_POST['group'],ENT_QUOTES);
	$group=mysqli_real_escape_string($connect,$_POST['group']);

	$time=time();
	$created=date ("Y-m-d H:i:s", $time);
	$modified=$created;
	$email_check=mysqli_query($connect, "SELECT * FROM members WHERE email='$email'") or die('Unable To Process Request');
	
	
	if (mysqli_num_rows($email_check)>0) {
		echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, the email Address <strong>".$email."</strong> has already been taken!</center><hr/>";
		}else{
			$phone_check=mysqli_query($connect, "SELECT * FROM members WHERE phone='$phone'") or die('Unable To Process Request');
			if(mysqli_num_rows($phone_check)>0){
			echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, the Phone Number <strong>".$phone."</strong> has already been taken!</center><hr/>";
				}else{
					$other_phone_check=mysqli_query($connect, "SELECT * FROM members WHERE other_phone='$other_phone'") or die('Unable To Process Request');
						if(mysqli_num_rows($other_phone_check)>0){
						echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, the Other Phone Number <strong>".$other_phone."</strong> has already been taken!</center><hr/>";
				}
				else{
					if($_POST['occupation']=='worker'){
						$insert=mysqli_query($connect, "INSERT INTO members VALUES('','$family','$dept','$country','$group','$surname','$middle_name','$first_name','$phone','$other_phone','$gender','$email','$address','$occupation','','$martial_status','0','$dob','$join_date','$created','$modified')") or die('Unable To Process Request worker');
						if($insert==True){
							echo"<center class='alert alert-success'><i class='fa fa-check-circle'></i> New Member has been successfully added!</center><hr/>
							<script>
                        $('#surname').val('');
                        $('#middle_name').val('');
                        $('#first_name').val('');
                        $('#phone').val('');
                        $('#other_phone').val('');
                        $('#gender').val('');
                        $('#dob').val('');
                        $('#join_date').val('');
                        $('#email').val('');
                        $('#country').val('');
                        $('#occupation').val('');
                        $('#address').val('');
                        $('#martial_status').val('');
                        $('#family').val('');
                        $('#dept').val('');
                        $('#group').val('');</script>";
						}else{
							echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, unable to add new member!</center><hr/>";
						}
					}
					else{
					$insert=mysqli_query($connect, "INSERT INTO members VALUES('','$family','$dept','$country','$group','$surname','$middle_name','$first_name','$phone','$other_phone','$gender','$email','$address','$occupation','$school','$martial_status','0','$dob','$join_date','$created','$modified')") or die('Unable To Process Request Student');
						if($insert==True){
							echo"<center class='alert alert-success'><i class='fa fa-check-circle'></i> New Member has been successfully added!</center><hr/>
							<script>
                        $('#surname').val('');
                        $('#middle_name').val('');
                        $('#first_name').val('');
                        $('#phone').val('');
                        $('#other_phone').val('');
                        $('#gender').val('');
                        $('#dob').val('');
                        $('#join_date').val('');
                        $('#email').val('');
                        $('#country').val('');
                        $('#occupation').val('');
                        $('#school').val('');
                        $('#address').val('');
                        $('#martial_status').val('');
                        $('#family').val('');
                        $('#dept').val('');
                        $('#group').val('');</script>";
						}else{
							echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, unable to add new member!</center><hr/>";
						}
					}
				}
			}
		}
					

