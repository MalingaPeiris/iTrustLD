<?php

require_once '../core.php';
require_once '../function.php';

if ($_POST) {
    $action = mysqli_real_escape_string($connect, $_POST['action']);
    $userid = convert_string('decrypt', $_SESSION['userId']);
    // exists
    $mainSql = "SELECT * FROM users WHERE `user_id` = '$userid'";
    $mainResult = mysqli_query($connect, $mainSql);

    if (mysqli_num_rows($mainResult) == 1) {
        //`user_id``fname``lname``email``email_verification`
        //`language``mobile_no``mobile_status``password``dob``address``street``country``city``zip_code``account_status``address_status`
        $value = mysqli_fetch_assoc($mainResult);
        
        $users_arr[] = array("success" =>"Done","email" =>$value['email'] ,"error" => "Done", "Status" => 
        $value['account_status'], "address_status"=> $value['address_status']);
    } else {
       
    } // /else
} else {
    $valid['success'] = false;
    $valid['error'] = 'Error in Post Method';
}

$connect->close();
echo json_encode($users_arr);
