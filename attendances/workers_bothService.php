<?php
/**
 * Created by PhpStorm.
 * User: Collins
 * Date: 12/09/2018
 * Time: 1:08 AM
 */

include '../functions/db.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id=$_GET['id'];


    $time=time()+172800;
    $created=date ("Y-m-d H:i:s", $time);
    $modified=date ("Y-m-d H:i:s", time());;
    $sql = mysqli_query($connect, "select * from workers_attendances where members_id='$id' and attendance='Early rain' and marked=1") or die('Failed to complete request');
    $result= mysqli_num_rows($sql);

    $sql2 = mysqli_query($connect, "select * from workers_attendances where members_id='$id' and attendance='Latter rain' and marked=1") or die ('Failed to complete request');
    $result2= mysqli_num_rows($sql2);

    if($result==1 AND $result2==1) {
        echo json_encode(array(
            'code' => 1,
            'message' => 'FAILED'
        ));
    }

    else {
        $present = mysqli_query($connect, "INSERT INTO workers_attendances (id,members_id,status,attendance,marked,attendance_date,created,modified) 
        VALUES
        ('','$id','present','Early rain','1','$modified','$created','$modified'),
        ('', '$id', 'present', 'Latter rain','1', '$modified','$created', '$modified')
        ") or die("Unable to process request");
        if ($present == TRUE || $present == 1) {
            echo json_encode(array(
                'code' => 0,
                'message' => 'SUCCESS'
            ));
        } else {
            echo json_encode(array(
                'code' => 1,
                'message' => 'FAILED'
            ));
        }
    }
}
 ?>