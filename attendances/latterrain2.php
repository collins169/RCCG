<?php 
include '../functions/db.php';
if (isset($_GET['present'])) {
        $id=$_GET['present'];

        $time=time()+172800;
        $created=date ("Y-m-d H:i:s", $time);
        $modified=date ("Y-m-d H:i:s", time());;

        $present=mysqli_query($connect, "INSERT INTO attendances (id,members_id,status,attendance,marked,attendance_date,created,modified) VALUES('','$id','present','Latter rain','1','$modified','$created','$modified')")or die("Unable to process request");
        if($present==TRUE || $present==1){
                echo "<script>alert('attendances been added')
                window.location.href='../attendances/attendances.php'</script>";
        }else{
                 echo "<script>alert('Unable to add attendance')
                       window.location.href='../attendances/attendances.php'</script>";
               }
    }

    if (isset($_GET['absent'])) {
        $id=$_GET['absent'];

        $time=time();
        $created=date ("Y-m-d H:i:s", $time);
        $modified=$created;

        $absent=mysqli_query($connect, "INSERT INTO attendances (id,member_id,status,attendance,attendance_date,created,modified) VALUES('','$id','absent','Latter rain','$created','$created','$modified')")or die("Unable to process request");
        if($abscent==TRUE || $absent==1){
                echo "<script>alert('attendances been added')
                window.location.href='../attendances/attendances.php'</script>";
        }else{
                 echo "<script>alert('Unable to add attendance')
                       window.location.href='../attendances/attendances.php'</script>";
               }
    }
 ?>