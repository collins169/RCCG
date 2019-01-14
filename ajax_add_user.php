<?php
include 'db.php';

	$name=htmlspecialchars($_POST['name'],ENT_QUOTES);
	$name=mysqli_real_escape_string($connect,$_POST['name']);

	$username=htmlspecialchars($_POST['username'],ENT_QUOTES);
	$username=mysqli_real_escape_string($connect,$_POST['username']);

	$phone=htmlspecialchars($_POST['phone'],ENT_QUOTES);
	$phone=mysqli_real_escape_string($connect,$_POST['phone']);

	$password=md5(htmlspecialchars($_POST['password'],ENT_QUOTES));
	$password=md5(mysqli_real_escape_string($connect,$_POST['password']));

	$cpassword=md5(htmlspecialchars($_POST['cpassword'],ENT_QUOTES));
	$cpassword=md5(mysqli_real_escape_string($connect,$_POST['cpassword']));

	$role=htmlspecialchars($_POST['role'],ENT_QUOTES);
	$role=mysqli_real_escape_string($connect,$_POST['role']);

	$email=htmlspecialchars($_POST['email'],ENT_QUOTES);
	$email=mysqli_real_escape_string($connect,$_POST['email']);

	if($password==$cpassword){
	$time=time();
	$created=date ("Y-m-d H:i:s", $time);
	$modified=$created;
	$email_check=mysqli_query($connect, "SELECT * FROM users WHERE email='$email'") or die('Unable To Process Request');
	if (mysqli_num_rows($email_check)>0) {
		echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, the email Address <strong>".$email."</strong> has already been taken!</center><hr/>";
		}else{
			$phone_check=mysqli_query($connect, "SELECT * FROM users WHERE phone='$phone'") or die('Unable To Process Request');
			if(mysqli_num_rows($phone_check)>0){
			echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, the Phone Number <strong>".$phone."</strong> has already been taken!</center><hr/>";
				}else{
					$username_check=mysqli_query($connect, "SELECT * FROM users WHERE username='$username'") or die('Unable To Process Request');
						if(mysqli_num_rows($username_check)>0){
						echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, the Other Phone Number <strong>".$username."</strong> has already been taken!</center><hr/>";
				}
				else{
						$insert=mysqli_query($connect, "INSERT INTO users VALUES('','$username','$password','$name','$email','$phone','','$role','0','$created','$modified')") or die('Unable To Process Request insert');
						if($insert==True){
							echo"<center class='alert alert-success'><i class='fa fa-check-circle'></i> New Member has been successfully added!</center><hr/>
							<script>
                        $('#name').val('');
                        $('#username').val('');
                        $('#password').val('');
                        $('#phone').val('');
                        $('#cpassword').val('');
                        $('#role').val('');</script>";
						}else{
							echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, unable to add new user!</center><hr/>";
						}
					}
				}
			}
		}else{
			echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, Password doesn't march!</center><hr/>";
		}
