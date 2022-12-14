<?php
include '../core.php';
include '../function.php';

if ($_POST) {
    $chkmail = checkemailaddress($connect, mysqli_real_escape_string($connect, $_POST['emailtxt']));

    if ($chkmail == true) {
        $fristnametxt = mysqli_real_escape_string($connect, $_POST['fristnametxt']);
        $lastnametxt = mysqli_real_escape_string($connect, $_POST['lastnametxt']);
        $emailtxt = mysqli_real_escape_string($connect, $_POST['emailtxt']);
        //Password encodeing
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        $password = convert_string('encrypt', $password);
        $countrytxt = mysqli_real_escape_string($connect, $_POST['countrytxt']);
        $Mobilenotxt = mysqli_real_escape_string($connect, $_POST['Mobilenotxt']);
        $language = mysqli_real_escape_string($connect, $_POST['language']);

        $dobtxt = mysqli_real_escape_string($connect, $_POST['dobtxt']);
        $dobtxt = date_format(new DateTime($dobtxt), "Y-m-d");
        $rand_no = rand(1000, 9999);
        $mrand_no = rand(10000, 99999);

        $addresstxt = mysqli_real_escape_string($connect, $_POST['addresstxt']);
        $streettxt = mysqli_real_escape_string($connect, $_POST['streettxt']);
        $citytxt = mysqli_real_escape_string($connect, $_POST['citytxt']);
        $zipcodetxt = mysqli_real_escape_string($connect, $_POST['zipcodetxt']);


        $query = "INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `email_verification`, `language`, `mobile_no`, `mobile_status`, `password`, `dob`,`address`,`street`,`country`,`city`,`zip_code`,  `account_status`, `address_status`) VALUES 
        (NULL, '$fristnametxt', '$lastnametxt', '$emailtxt', '$rand_no', '$language', '$Mobilenotxt', '$mrand_no', '$password', '$dobtxt','$addresstxt','$streettxt','$countrytxt','$citytxt','$zipcodetxt', '0', '0');";

        //$result = $connect->query($query);

        if ($connect->query($query) === TRUE) {
            $mainSql = ("SELECT * FROM users WHERE email = '$emailtxt'");
            $mainResult = $connect->query($mainSql);
            if ($mainResult->num_rows == 1) {
                $value = $mainResult->fetch_assoc();
                //Name frist name - last name
                $activate = $value['account_status'];
                $userName = $value['fname']. ' '. $value['lname'];
                $_SESSION['userId'] = convert_string('encrypt', $value['user_id']); //User Id Encrypt
                $_SESSION['Type'] = $value['account_status'];
                $_SESSION['Activate'] = $activate; 
                $_SESSION['Uname'] = $userName;
            }

            $valid['success'] = true;
            $valid['messages'] = "Successfully Add to the System";
        } else {
            $valid['success'] = false;
            $valid['messages'] = "Error while Adding";
        }
    } else {
        $valid['success'] = false;
        $valid['messages'] = "the mail All Ready in the System";
    }
} else {
    $valid['success'] = false;
    $valid['messages'] = "Method does not Run Correctly";
}

$connect->close();

echo json_encode($valid);





//INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `email_verification`, `language`, `mobile_no`, `mobile_status`, `password`, `dob`, `address`, `street`, `country`, `city`, `zip_code`, `account_status`, `address_status`) VALUES (NULL, 'fname', 'lname', 'email', '1526', 'English', 'mobile_no', '11254', 'password', '2022-11-15', 'colombo road', 'street', 'country', 'city', '82000', '0', '0');