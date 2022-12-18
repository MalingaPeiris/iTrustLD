<?php
require_once '../../core.php';
include('../../function.php');
if (AdminLogin() == true) {
    $statusupdatetxt =  mysqli_real_escape_string($connect, ($_POST['statusupdatetxt']));
    $messagetxt =  mysqli_real_escape_string($connect, ($_POST['messagetxt']));
    $vithraw_id_txt =  mysqli_real_escape_string($connect, ($_POST['vithraw_id_txt']));
    
    
    $admin_id = convert_string('decrypt', $_SESSION['AdminuserId']);
    $admin_name = $_SESSION['Uname'];
    
    $query = "UPDATE `withdraw_doller` SET `adminid` = '$admin_id', `adminname` = '$admin_name', `message` = '$messagetxt', `status` = '$statusupdatetxt' WHERE `withdraw_doller`.`id` = $vithraw_id_txt; ";
    
    if ($connect->query($query) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "Order Status Change";
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error withraw system";
    }
    $connect->close();
    echo json_encode($valid);
} else {
    echo ('Error Loading');
}
