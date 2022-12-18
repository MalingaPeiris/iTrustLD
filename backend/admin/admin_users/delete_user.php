<?php

require_once '../../core.php';
//require_once '../../function.php';

if ($_POST) {

    $adminidtxt = mysqli_real_escape_string($connect, $_POST['id']);
    
    $query = "DELETE FROM `adminusers` WHERE `adminusers`.`id` = $adminidtxt;";

    //$result = $connect->query($query);

    if ($connect->query($query) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "Successfully Delete";
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error while Remove Admin";
    }
}
$connect->close();

echo json_encode($valid);
