<?php 
include '../functions/db.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id=$_GET['id'];

        $time=time()+172800;
        $created=date ("Y-m-d H:i:s", $time);
        $modified=date ("Y-m-d H:i:s", time());;

        $present=mysqli_query($connect, "INSERT INTO attendances (id,members_id,status,attendance,marked,attendance_date,created,modified) 
        VALUES('','$id','present','Latter rain','1','$modified','$created','$modified')")or die("Unable to process request");
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
 ?>