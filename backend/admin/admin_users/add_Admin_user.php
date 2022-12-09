<?php
require_once '../../core.php';
require_once '../../function.php';

if ($_POST) {

    $nametxt = mysqli_real_escape_string($connect, $_POST['nametxt']);
    $emailtxt = mysqli_real_escape_string($connect, $_POST['emailtxt']);
    $passwordtxt = mysqli_real_escape_string($connect, $_POST['passwordtxt']);
    $stypetxt = mysqli_real_escape_string($connect, $_POST['stypetxt']);
    $statustxt = mysqli_real_escape_string($connect, $_POST['statustxt']);


    date_default_timezone_set("Asia/Colombo");
    $date = date('Y-m-d H:i:s');
    $rand_no = rand(1000,9999);
    $n_password = convert_string('encrypt',$passwordtxt);
    $query = "INSERT INTO `adminusers` (`id`, `name`, `email`, `password`, `type`, `activity_status`, `activate_code`, `Reg_date`) VALUES (NULL, '$nametxt', '$emailtxt', '$n_password', '$stypetxt', '$statustxt', '$rand_no', '$date');";

    //$result = $connect->query($query);

    if ($connect->query($query) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "Successfully Add to the System";
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error while updating product info";
    }
}
$connect->close();

echo json_encode($valid);

//add_Admin_user.php
//`id`, `name`, `email`, `password`, `type`, `activity_status`, `activate_code`, `Reg_date`
//INSERT INTO `adminusers` (`id`, `name`, `email`, `password`, `type`, `activity_status`, `activate_code`, `Reg_date`) VALUES (NULL, 'name', 'email', 'pass', '1', '1', '2563', '2022-11-14 11:35:19');
