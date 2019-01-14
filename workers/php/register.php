<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Cache-Control: no-cache, must-revalidate');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


require "db.php";
if($_POST['surname'] !="" || $_POST['first_name'] !="" || $_POST['email'] !=""
   || $_POST['phone'] !=""|| $_POST['occupation'] !="" || $_POST['parish'] !="" || $_POST['address'] !="") {
    $surname = htmlspecialchars(strip_tags($_POST['surname']));
    $firstname = htmlspecialchars(strip_tags($_POST['first_name']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $phone = htmlspecialchars(strip_tags($_POST['phone']));
    $occupation = htmlspecialchars(strip_tags($_POST['occupation']));
    $parish = htmlspecialchars(strip_tags($_POST['parish']));
    $address = htmlspecialchars(strip_tags($_POST['address']));   
    $dept = htmlspecialchars(strip_tags($_POST['dept']));


    $CHECK_SURNAME = mysqli_query($connect, "SELECT * FROM workers WHERE surname='".$surname."' AND first_name='".$firstname."' ") or die ("Failed to search surname and firstname");
    if(mysqli_num_rows($CHECK_SURNAME)>0){
        echo json_encode(
            array(
                'respCode'=>1,
                'respMsg'=>"You have already registered before."
            )
        );
    } else {
    $CHECK_PHONE = mysqli_query($connect, "SELECT * FROM workers WHERE phone='".$phone."' ") or die ("Failed to search phone number");
        if(mysqli_num_rows($CHECK_PHONE)>0){
            echo json_encode(
                array(
                    'respCode'=>1,
                    'respMsg'=>"These phone number already exist."
                )
            );
        } else {
            $sql = "INSERT INTO workers (id, surname, first_name, email, phone, occupation, parish, dept, address, username, password) VALUES ('', '".$surname."',  '".$firstname."', '".$email."', '".$phone."', '".$occupation."', '".$parish."', '".$dept."', '".$address."', '', '')";
            $INSERT = mysqli_query($connect, $sql) or die ("Failed to add worker");
                if($INSERT == TRUE || $INSERT == 1){
                    //email subject
                $subject ='The Ambassador Worker Registration';

                //email body
                $message_body = '<style type="text/css">
			* {
				-ms-text-size-adjust:100%;
				-webkit-text-size-adjust:none;
				-webkit-text-resize:100%;
				text-resize:100%;
			}
			a{
				outline:none;
				color:#40aceb;
				text-decoration:underline;
			}
			a:hover{text-decoration:none !important;}
			.nav a:hover{text-decoration:underline !important;}
			.title a:hover{text-decoration:underline !important;}
			.title-2 a:hover{text-decoration:underline !important;}
			.btn:hover{opacity:0.8;}
			.btn a:hover{text-decoration:none !important;}
			.btn{
				-webkit-transition:all 0.3s ease;
				-moz-transition:all 0.3s ease;
				-ms-transition:all 0.3s ease;
				transition:all 0.3s ease;
			}
			table td {border-collapse: collapse !important;}
			.ExternalClass, .ExternalClass a, .ExternalClass span, .ExternalClass b, .ExternalClass br, .ExternalClass p, .ExternalClass div{line-height:inherit;}
			@media only screen and (max-width:500px) {
				table[class="flexible"]{width:100% !important;}
				table[class="center"]{
					float:none !important;
					margin:0 auto !important;
				}
				*[class="hide"]{
					display:none !important;
					width:0 !important;
					height:0 !important;
					padding:0 !important;
					font-size:0 !important;
					line-height:0 !important;
				}
				td[class="img-flex"] img{
					width:100% !important;
					height:auto !important;
				}
				td[class="aligncenter"]{text-align:center !important;}
				th[class="flex"]{
					display:block !important;
					width:100% !important;
				}
				td[class="wrapper"]{padding:0 !important;}
				td[class="holder"]{padding:30px 15px 20px !important;}
				td[class="nav"]{
					padding:20px 0 0 !important;
					text-align:center !important;
				}
				td[class="h-auto"]{height:auto !important;}
				td[class="description"]{padding:30px 20px !important;}
				td[class="i-120"] img{
					width:120px !important;
					height:auto !important;
				}
				td[class="footer"]{padding:5px 20px 20px !important;}
				td[class="footer"] td[class="aligncenter"]{
					line-height:25px !important;
					padding:20px 0 0 !important;
				}
				tr[class="table-holder"]{
					display:table !important;
					width:100% !important;
				}
				th[class="thead"]{display:table-header-group !important; width:100% !important;}
				th[class="tfoot"]{display:table-footer-group !important; width:100% !important;}
			}
		</style>
	<div style="margin:0; padding:0;" bgcolor="#eaeced">
		<table style="min-width:320px;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#eaeced">
			<!-- fix for gmail -->
			<tr>
				<td class="hide">
					<table width="600" cellpadding="0" cellspacing="0" style="width:600px !important;">
						<tr>
							<td style="min-width:600px; font-size:0; line-height:0;">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="wrapper" style="padding:0 10px;">
					<!-- module 3 -->
					<table data-module="module-3" width="100%" cellpadding="0" cellspacing="0"  style="margin-top: 50px">
						<tr>
							<td data-bgcolor="bg-module" bgcolor="#eaeced">
								<table class="flexible" width="600" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
									<tr>
										<td class="img-flex"><img src="http://rccgambprotocolgh.com/workers/images/web_banner.jpg" style="vertical-align:top;" width="600" height="249" alt="" /></td>
									</tr>
									<tr>
										<td data-bgcolor="bg-block" class="holder" style="padding:65px 60px 50px;" bgcolor="#f9f9f9">
											<table width="100%" cellpadding="0" cellspacing="0">
												<tr>
													<td data-color="title" data-size="size title" data-min="20" data-max="40" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:30px/33px Arial, Helvetica, sans-serif; color:#292c34; padding:0 0 24px;">
														RCCG The Ambassador 
													</td>
												</tr>
												<tr>
													<td data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" align="justify" style="font:16px/29px Arial, Helvetica, sans-serif; color:#888; padding:0 0 21px;">
														Hi '.$surname.',<br><br>
                                                        
                                                        Thank you for registering, your account details are: &nbsp;
                                                        <br>
                                                        <strong>Full Name: </strong>'.$surname.' '.$firstname.'        <br>                                                
                                                        <strong>Phone Number: </strong> '.$phone.'    <br>
                                                        <strong>Email Address: </strong>'.$email.'    <br>
                                                        <strong>Address: </strong>'.$address.'  <br>                                              <strong>Department: </strong>'.$dept.'  <br>
                                                        <strong>Parish: </strong> '.$parish.'
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr><td height="28"></td></tr>
								</table>
							</td>
						</tr>
					</table>
					<!-- module 7 -->
					<table data-module="module-7" data-thumb="thumbnails/07.png" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td data-bgcolor="bg-module" bgcolor="#eaeced">
								<table class="flexible" width="600" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
									<tr>
										<td class="footer" style="padding:0 0 10px;">
											<table width="100%" cellpadding="0" cellspacing="0">
												<tr class="table-holder">
													<th class="tfoot" width="400" align="left" style="vertical-align:top; padding:0;">
														<table width="100%" cellpadding="0" cellspacing="0">
															<tr>
																<td data-color="text" data-link-color="link text color" data-link-style="text-decoration:underline; color:#797c82;" class="aligncenter" style="font:12px/16px Arial, Helvetica, sans-serif; color:#797c82; padding:0 0 10px;">
																	RCCG The Ambassador, 2018. &nbsp; All Rights Reserved. <a target="_blank" style="text-decoration:underline; color:#797c82;" href="sr_unsubscribe">Unsubscribe.</a>
																</td>
															</tr>
														</table>
													</th>
													<th class="thead" width="200" align="left" style="vertical-align:top; padding:0;">
														<table class="center" align="right" cellpadding="0" cellspacing="0">
															<tr>
																<td class="btn" valign="top" style="line-height:0; padding:3px 0 0;">
																	<a target="_blank" style="text-decoration:none;" href="#"><img src="http://rccgambprotocolgh.com/workers/images/ico-facebook.png" border="0" style="font:12px/15px Arial, Helvetica, sans-serif; color:#797c82;" align="left" vspace="0" hspace="0" width="6" height="13" alt="fb" /></a>
																</td>
																<td width="20"></td>
																<td class="btn" valign="top" style="line-height:0; padding:3px 0 0;">
																	<a target="_blank" style="text-decoration:none;" href="#"><img src="http://rccgambprotocolgh.com/workers/images/ico-twitter.png" border="0" style="font:12px/15px Arial, Helvetica, sans-serif; color:#797c82;" align="left" vspace="0" hspace="0" width="13" height="11" alt="tw" /></a>
																</td>
															</tr>
														</table>
													</th>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<!-- fix for gmail -->
			<tr>
				<td style="line-height:0;"><div style="display:none; white-space:nowrap; font:15px/1px courier;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div></td>
			</tr>
		</table>
</div>';

                //proceed with PHP email.
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: RCCG The Ambassador Protocol<no-reply@rccgambprotocolgh.com>'."\r\n" .
                'Reply-To: RCCG The Ambassador Protocol <info@rccgambprotocolgh.com>' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

                $send_mail = mail($email, $subject, $message_body, $headers);
                    
                    echo json_encode(
                        array(
                            'respCode'=>0,
                            'respMsg'=>"SUCCESS"
                        )
                    );
                } else {
                    echo json_encode(
                        array(
                            'respCode'=>1,
                            'respMsg'=>"Failed to Add worker, Try again!"
                        )
                    );
                }
        }
    }
}
?>