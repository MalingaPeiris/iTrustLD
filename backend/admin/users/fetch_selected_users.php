<?php
require_once '../../core.php';
if (AdminLogin() == true) {
    $user_id =  mysqli_real_escape_string($connect, $_POST['id']);

    $sql = "SELECT * FROM `user_account` WHERE user_id = $user_id";
    $result = $connect->query($sql);
    //````````````````````````
    //````````````````````
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            if ($row['status'] != 1) {
                $users_arr[] = array(
                    "user_id" => $row['user_id'], "fname" => $row['fname'], "lname" => $row['lname'], "email" => $row['email'], "email_verification" => $row['email_verification'], "language" => $row['language'], "mobile_no" => $row['mobile_no'], "mobile_status" => $row['mobile_status'], "password" => $row['password'], "dob" => $row['dob'], "address" => $row['address'], "street" => $row['street'], "country" => $row['country'], "city" => $row['city'], "zip_code" => $row['zip_code'], "account_status" => $row['account_status'], "address_status" => $row['address_status'], "subcription" => $row['subcription'], "ide" => $row['ide'], "nic_Image" => $row['nic_Image'], "address_img" => $row['address_img'], "status" => $row['status']
                );
            }
        }
    } // if num_rows

} else {
    echo 'Error Loading';
}

$connect->close();

echo json_encode($users_arr);
