<?php
require_once '../../core.php';
include('../../function.php');
if (AdminLogin() == true) {
    $user_id_txt =  mysqli_real_escape_string($connect, ($_POST['user_id_txt']));

    $identity_confirm_txt =  mysqli_real_escape_string($connect, ($_POST['identity_confirm_txt']));
    $address_confirm_txt =  mysqli_real_escape_string($connect, ($_POST['address_confirm_txt']));
    
    if($identity_confirm_txt == 3 && $address_confirm_txt == 2){// COnfirm All

    }elseif($identity_confirm_txt == 3 && $address_confirm_txt == 0){// Only Identity Confirm
        //$qur = "UPDATE `user_images` SET `status` = '1' WHERE `user_images`.`ide` = 8; ";
    }elseif($identity_confirm_txt == 1 && $address_confirm_txt == 2){// Only Address Confirm
        
    }elseif($identity_confirm_txt == 1 && $address_confirm_txt == 0){//Not Confirm

    }
    $query = "UPDATE `users` SET `account_status` = '$identity_confirm_txt', `address_status` = '$address_confirm_txt' WHERE `users`.`user_id` = $user_id_txt; ";
    if ($connect->query($query) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "User Status Change";
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error Status change in System";
    }
    $connect->close();
    echo json_encode($valid);
}else{
    echo 'Error Loading';
}