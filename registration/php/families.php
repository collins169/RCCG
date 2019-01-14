<?php
/**
 * Created by PhpStorm.
 * User: Collins
 * Date: 23/12/2018
 * Time: 12:09 AM
 */

// Setting Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require 'db.php';

$sql= 'SELECT * FROM families WHERE status =1';
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result)>0){
//    $data=mysqli_fetch_assoc($result);
    $array = array();
    while ($data = mysqli_fetch_assoc($result)){
        $families = array(
            'id'=>mb_convert_encoding($data['id'], 'UTF-8', 'UTF-8'),
            'name'=> mb_convert_encoding($data['name'], 'UTF-8', 'UTF-8'),
           );
        $array[] = $families;
    }
    echo json_encode($array);
}
