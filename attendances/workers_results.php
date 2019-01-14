<?php 
//outputs.php
	include '../functions/db.php';

	
	$service=htmlspecialchars($_POST['service'],ENT_QUOTES);
	$service=mysqli_real_escape_string($connect,$_POST['service']);

	$date=htmlspecialchars($_POST['s_date'],ENT_QUOTES);
	$date=mysqli_real_escape_string($connect,$_POST['s_date']);
$outputs= '';
$output='';

	$sql1=mysqli_query($connect, "SELECT amb_worker_table.Phone_Number, amb_worker_table.Full_Name, amb_worker_table.Department FROM amb_worker_table WHERE amb_worker_table.deleted=0 AND amb_worker_table.id  NOT IN(
SELECT workers_attendances.members_id FROM workers_attendances WHERE STATUS='present' AND 
attendance='$service' AND attendance_date='$date')")or die('unable to process request');
	$outputs.="
                                    <div class='page-content-inner'>
                                        <div class='mt-content-body'>
                                            <div class='portlet box blue'>
                                                    <div class='portlet-title'>
                                                        <div class='caption'>
                                                            <i class='fa fa-bar-chart'></i> List of Workers that are <strong>Abscent</strong> for $service Service on $date</div>
                                                        <div class='tools'> </div>
                                                    </div>
			<div class='portlet-body'>
                                                        <table class='table table-striped table-bordered table-hover' id='sample_2'>
                                                            <thead>
                                                                <tr>
                                                                    <th> No </th>
                                                                    <th> Full Name </th>
                                                                    <th> Phone Number </th>
                                                                    <th> Department </th>
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
                         <td>$data[Full_Name] </td>
                         <td>$data[Phone_Number]</td>
                         <td>$data[Department] </td>
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
