<?php 
//outputs.php
	include '../functions/db.php';

	
	$service=htmlspecialchars($_POST['service'],ENT_QUOTES);
	$service=mysqli_real_escape_string($connect,$_POST['service']);

	$date=htmlspecialchars($_POST['s_date'],ENT_QUOTES);
	$date=mysqli_real_escape_string($connect,$_POST['s_date']);
$outputs= '';
$output='';

	$sql1=mysqli_query($connect, "SELECT members.phone, members.surname, members.first_name, members.email FROM members WHERE members.deleted=0 AND members.id  NOT IN(
SELECT attendances.members_id FROM attendances WHERE STATUS='present' AND 
attendance='$service' AND attendance_date='$date')")or die('unable to process request');
	$outputs.="
                                    <div class='page-content-inner'>
                                        <div class='mt-content-body'>
                                            <div class='portlet box blue'>
                                                    <div class='portlet-title'>
                                                        <div class='caption'>
                                                            <i class='fa fa-bar-chart'></i> List of Members that are <strong>Abscent</strong> for $service Service on $date</div>
                                                        <div class='tools'> </div>
                                                    </div>
			<div class='portlet-body'>
                                                        <table class='table table-striped table-bordered table-hover' id='sample_2'>
                                                            <thead>
                                                                <tr>
                                                                    <th> No </th>
                                                                    <th> Surname </th>
                                                                    <th> First name </th>
                                                                    <th> Phone </th>
                                                                    <th> Email Address </th>
                                                                </tr>
                                                            </thead><tbody>
	";
	if(mysqli_num_rows($sql1)>0){
		$j=0;
		foreach($sql1 as $data){
			$j++;
			$outputs .= "
				<tr>
                         <td> $j  </td>
                         <td>$data[surname] </td>
                         <td>$data[first_name]</td>
                         <td>$data[phone] </td>
                         <td>$data[email] </td>
                    </tr>
			";
		}
	}else {
		$outputs .= "";
	}
		$outputs .= "</tbody>
		                        </table>
		                            </div>
		                                </div>
		                                    </div>
		                                    	</div>
				";



				echo $outputs;
?>
