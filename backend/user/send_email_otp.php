<?php

require_once '../core.php';
require_once '../function.php';

if ($_POST) {
    //`email``email_verification`
    $emailtxt = mysqli_real_escape_string($connect, $_POST['emailtxt']);
    $userid = convert_string('decrypt', $_SESSION['userId']);
   
    $mainSql = "SELECT * FROM users WHERE `user_id` = '$userid'";
    $mainResult = mysqli_query($connect, $mainSql);

    if (mysqli_num_rows($mainResult) == 1) {
        $value = mysqli_fetch_assoc($mainResult);
        if($value['email'] != $emailtxt){
            $rand_no = rand(1000, 9999);
            $query = "UPDATE `users` SET `email` = '$emailtxt',`email_verification` = '$rand_no',`account_status` = '0' WHERE `users`.`user_id` = $userid; ";

            if ($connect->query($query) === TRUE) {
                $valid['success'] = true;
                $valid['messages'] = "Email Change & Send Opt";
            } else {
                $valid['success'] = false;
                $valid['messages'] = "Error while Remove Admin";
            }
        }else{
            $Otp_message = $value['email_verification'];
            //Add the EMail Send Sucess Message to here
            $valid['success'] = true;
            $valid['messages'] = "Successfully Send";
        }

    }else{
        $valid['success'] = false;
        $valid['messages'] = "Cant find the mail";
    }
    
}
$connect->close();

echo json_encode($valid);
