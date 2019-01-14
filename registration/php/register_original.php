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
            $sql = "INSERT INTO workers (id, surname, first_name, email, phone, occupation, parish, address, username, password) VALUES ('', '".$surname."',  '".$firstname."', '".$email."', '".$phone."', '".$occupation."', '".$parish."', '".$address."', '', '')";
            $INSERT = mysqli_query($connect, $sql) or die ("Failed to add worker");
                if($INSERT == TRUE || $INSERT == 1){
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