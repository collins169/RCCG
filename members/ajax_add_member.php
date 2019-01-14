<?php
include '../functions/db.php';

	$surname=$_POST['surname'];
	// $surname=htmlspecialchars($_POST['surname'],ENT_QUOTES);
	// $surname=mysqli_real_escape_string($connect,$_POST['surname']);

	$middle_name=$_POST['middle_name'];
	// $middle_name=htmlspecialchars($_POST['middle_name'],ENT_QUOTES);
	// $middle_name=mysqli_real_escape_string($connect,$_POST['middle_name']);

	$first_name=$_POST['first_name'];
	// $first_name=htmlspecialchars($_POST['first_name'],ENT_QUOTES);
	// $first_name=mysqli_real_escape_string($connect,$_POST['first_name']);

	$phone=$_POST['phone'];
	// $phone=htmlspecialchars($_POST['phone'],ENT_QUOTES);
	// $phone=mysqli_real_escape_string($connect,$_POST['phone']);

	$other_phone=$_POST['other_phone'];
	// $other_phone=htmlspecialchars($_POST['other_phone'],ENT_QUOTES);
	// $other_phone=mysqli_real_escape_string($connect,$_POST['other_phone']);

	$gender=$_POST['gender'];
	// $gender=htmlspecialchars($_POST['gender'],ENT_QUOTES);
	// $gender=mysqli_real_escape_string($connect,$_POST['gender']);

	$dob=$_POST['dob'];
	// $dob=htmlspecialchars($_POST['dob'],ENT_QUOTES);
	// $dob=mysqli_real_escape_string($connect,$_POST['dob']);

	$join_date=$_POST['join_date'];
	// $join_date=htmlspecialchars($_POST['join_date'],ENT_QUOTES);
	// $join_date=mysqli_real_escape_string($connect,$_POST['join_date']);

	$email=$_POST['email'];
	// $email=htmlspecialchars($_POST['email'],ENT_QUOTES);
	// $email=mysqli_real_escape_string($connect,$_POST['email']);

	$country=$_POST['country'];
	// $country=htmlspecialchars($_POST['country'],ENT_QUOTES);
	// $country=mysqli_real_escape_string($connect,$_POST['country']);

	$occupation=$_POST['occupation'];
	// $occupation=htmlspecialchars($_POST['occupation'],ENT_QUOTES);
	// $occupation=mysqli_real_escape_string($connect,$_POST['occupation']);

	$school=$_POST['school'];
	// $school=htmlspecialchars($_POST['school'],ENT_QUOTES);
	// $school=mysqli_real_escape_string($connect,$_POST['school']);

	$address=$_POST['address'];
	// $address=htmlspecialchars($_POST['address'],ENT_QUOTES);
	// $address=mysqli_real_escape_string($connect,$_POST['address']);

	$martial_status=$_POST['martial_status'];
	// $martial_status=htmlspecialchars($_POST['martial_status'],ENT_QUOTES);
	// $martial_status=mysqli_real_escape_string($connect,$_POST['martial_status']);

	$family=$_POST['family'];
	// $family=htmlspecialchars($_POST['family'],ENT_QUOTES);
	// $family=mysqli_real_escape_string($connect,$_POST['family']);

	$dept=$_POST['dept'];
	// $dept=htmlspecialchars($_POST['dept'],ENT_QUOTES);
	// $dept=mysqli_real_escape_string($connect,$_POST['dept']);

	$group=$_POST['group'];
	// $group=htmlspecialchars($_POST['group'],ENT_QUOTES);
	// $group=mysqli_real_escape_string($connect,$_POST['group']);

	
if($_FILES['image']['name']!=''){
			$time=time();
	      $target_dir = "../assets/uploads/pictures/";
	      $image = $target_dir .strtolower($surname).strtolower($first_name).$time.'.'. pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
	      $uploadOk = 1;
	      $imageFileType = pathinfo($image,PATHINFO_EXTENSION);

	       $check = getimagesize($_FILES["image"]["tmp_name"]);
	      if($check !== false) {
	          $alert="<center class='alert alert-success'><i class='fa fa-check-circle'></i> File is an image - " . $check["mime"] . ".</center><hr/>";
	          $uploadOk = 1;
	      } else {
	          $alert="<center class='alert alert-danger'><i class='fa fa-warning'></i> File is not an image!</center><hr/>";
	          $uploadOk = 0;
	      }
	      // Check if file already exists
	      if (file_exists($image)) {
	           $alert="<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, image already exists!</center><hr/>";
	          $uploadOk = 0;
	      }
	      // Check file size
	      elseif ($_FILES["image"]["size"] > 30000000) {
	          $alert="<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, your image is too large!</center><hr/>";
	          $uploadOk = 0;
	      }
      else {
	                //Inserting image 
	   if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
	   $time=time();
		$created=date ("Y-m-d H:i:s", $time);
		$modified=$created;
		$email_check=mysqli_query($connect, "SELECT * FROM members WHERE email='$email'") or die('Unable To Process Request');
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
								$insert=mysqli_query($connect, "INSERT INTO members VALUES('','$family','$dept','$country','$group','$surname','$middle_name','$first_name','$phone','$other_phone','$gender','$email','$address','$occupation','','$martial_status','$image','0','$dob','$join_date','$created','$modified')") or die('Unable To Process Request worker');
								if($insert==True){
									echo"<center class='alert alert-success'><i class='fa fa-check-circle'></i> New Member has been successfully added!</center><hr/>
									<script>
										$('.fileinput-exists').click();
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
							$insert=mysqli_query($connect, "INSERT INTO members VALUES('','$family','$dept','$country','$group','$surname','$middle_name','$first_name','$phone','$other_phone','$gender','$email','$address','$occupation','$school','$martial_status','$image','0','$dob','$join_date','$created','$modified')") or die('Unable To Process Request Student');
								if($insert==True){
									echo"<center class='alert alert-success'><i class='fa fa-check-circle'></i> New Member has been successfully added!</center><hr/>
									<script>
		                        $('.fileinput-exists').click();
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
				
		 }else {
		     $alert="<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, there was an error uploading your file.</center><hr/>";
		 }
	}
}else{
	$time=time();
	$created=date ("Y-m-d H:i:s", $time);
	$modified=$created;
			$phone_check=mysqli_query($connect, "SELECT * FROM members WHERE phone='$phone'") or die('Unable To Process Request');
			if(mysqli_num_rows($phone_check)>0){
			echo"<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, the Phone Number <strong>".$phone."</strong> has already been taken!</center><hr/>";
				}
				else{
					if($_POST['occupation']=='worker'){
						$insert=mysqli_query($connect, "INSERT INTO members VALUES('','$family','$dept','$country','$group','$surname','$middle_name','$first_name','$phone','$other_phone','$gender','$email','$address','$occupation','','$martial_status','','0','$dob','$join_date','$created','$modified')") or die('Unable To Process Request worker2');
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
					$insert=mysqli_query($connect, "INSERT INTO members VALUES('','$family','$dept','$country','$group','$surname','$middle_name','$first_name','$phone','$other_phone','$gender','$email','$address','$occupation','$school','$martial_status','','0','$dob','$join_date','$created','$modified')") or die('Unable To Process Request Student2');
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

        // else{
        //     $check=mysqli_query($connect, "SELECT * FROM contents WHERE id=$id")or die('Unable to process request!');
        //     $info=mysqli_fetch_array($check);
        //     $image1=$info['image'];
        
        //     //Inserting image 
        //         $modified=time();
        //         $insert=mysqli_query($connect, "UPDATE contents SET menu_id='$menu_id', title='$title',summary='$summary',content='$content',image='$image1',image_caption='$image_caption',status='$status',modified='$modified' WHERE id=$id") or die('Unable to process request!');
        //         if($insert==TRUE){
        //         $alert="<center class='alert alert-success'><i class='fa fa-check-circle'></i> Content has been Updated.</center><hr/>";
        //         header('Refresh:2; url=./content.php');
        //        } else {
        //         $alert="<center class='alert alert-danger'><i class='fa fa-warning'></i> Sorry, there was an error uploading your file.</center><hr/>";
        //     }

        // }

					

