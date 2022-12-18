<?php

require_once '../core.php';
require_once '../function.php';

if ($_POST) {
    //`email``email_verification`

    $emailtxt = mysqli_real_escape_string($connect, $_POST['emailtxt']);
    $verify_code_txt = mysqli_real_escape_string($connect, $_POST['verify_code_txt']);

    $userid = convert_string('decrypt', $_SESSION['userId']);
    $mainSql = ("SELECT * FROM users WHERE `user_id` = $userid AND `email` = '$emailtxt' AND `email_verification` = '$verify_code_txt'");
    $mainResult = $connect->query($mainSql);
    if ($mainResult->num_rows == 1) {
        $query = "UPDATE `users` SET `account_status` = '1' WHERE `user_id` = $userid AND `email` = '$emailtxt' AND `email_verification` = '$verify_code_txt'; ";

        //$result = $connect->query($query);

        if ($connect->query($query) === TRUE) {
            $valid['success'] = true;
            $valid['messages'] = "Successfully Email Verify";
        } else {
            $valid['success'] = false;
            $valid['messages'] = "Error while Verify";
        }
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Code Error";
    }
}
$connect->close();

echo json_encode($valid);
