<?php

require_once '../../core.php';
require_once '../../function.php';

if ($_POST) {

    $adminidtxt = mysqli_real_escape_string($connect, $_POST['adminidtxt']);
    $nametxt = mysqli_real_escape_string($connect, $_POST['nametxt']);
    $emailtxt = mysqli_real_escape_string($connect, $_POST['emailtxt']);
    $passwordtxt = mysqli_real_escape_string($connect, $_POST['passwordtxt']);
    $stypetxt = mysqli_real_escape_string($connect, $_POST['stypetxt']);
    $statustxt = mysqli_real_escape_string($connect, $_POST['statustxt']);


    date_default_timezone_set("Asia/Colombo");
    $date = date('Y-m-d H:i:s');
    $n_password = convert_string('encrypt',$passwordtxt);
    $query = "UPDATE `adminusers` SET `name` = '$nametxt', `email` = '$emailtxt', `password` = '$n_password', `type` = '$stypetxt', `activity_status` = '$statustxt' WHERE `adminusers`.`id` = $adminidtxt; ";

    //$result = $connect->query($query);

    if ($connect->query($query) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "Successfully Updated";
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error while updating product info";
    }
}
$connect->close();

echo json_encode($valid);
