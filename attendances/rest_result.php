<?php
/**
 * Created by PhpStorm.
 * User: Collins
 * Date: 30/12/2018
 * Time: 4:22 PM
 */

	include '../functions/db.php';


//	$service=htmlspecialchars($_POST['service'],ENT_QUOTES);
//	$service=mysqli_real_escape_string($connect,$_POST['service']);
//
//	$date=htmlspecialchars($_POST['s_date'],ENT_QUOTES);
//	$date=mysqli_real_escape_string($connect,$_POST['s_date']);
$service=$_POST['service'];
$date=$date['s_date'];

	$sql1=mysqli_query($connect, "SELECT amb_worker_table.Phone_Number, amb_worker_table.Full_Name, amb_worker_table.Department FROM amb_worker_table WHERE amb_worker_table.deleted=0 AND amb_worker_table.id  NOT IN(
SELECT workers_attendances.members_id FROM workers_attendances WHERE STATUS='present' AND 
attendance='$service' AND attendance_date='$date')")or die('unable to process request');

	if(mysqli_num_rows($sql1)>0){
        $j = 0;
        $array = array();

	    while($data=mysqli_fetch_assoc($sql1)){
            $j++;
            $details = array(
                'id'=>$j,
                'name'=> mb_convert_encoding($data['Full_Name'], 'UTF-8', 'UTF-8'),
                'phone'=>mb_convert_encoding($data['Phone_Number'],'UTF-8','UTF-8'),
                'dept'=>mb_convert_encoding($data['Department'],'UTF-8', 'UTF-8'),
            );
            $array[] = $details;
        }
//        echo DetailsResponses($array,'SUCCESS',0);
        echo json_encode(array('data'=>$array));
    }else{
	    echo json_encode(
	        array(
	            'RespMsg'=>'Empty List',
                'RespCode' => '1'
            )
        );
    }
