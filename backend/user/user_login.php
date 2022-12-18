<?php
//dffdfdfd

//session_start();
require_once '../core.php';
require_once '../function.php';

$errors = array();

if ($_POST) {

    $email = mysqli_real_escape_string($connect, ($_POST['username']));
    $planepassword = mysqli_real_escape_string($connect, ($_POST['password']));


    if (empty($email) || empty($planepassword)) {
        if ($email == "") {
            $errors[] = "Email is required";
        }

        if ($planepassword == "") {
            $errors[] = "Password is required";
        }
    } else {
        $sql = "SELECT * FROM users WHERE Email = '$email'";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) == 1) {
            //$password = md5($password);
            $password = convert_string('encrypt', $planepassword);
            // exists
            $mainSql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $mainResult = mysqli_query($connect, $mainSql);

            if (mysqli_num_rows($mainResult) == 1) {
                $value = mysqli_fetch_assoc($mainResult);

                $activate = $value['account_status'];
                $userName = $value['fname'] . ' ' . $value['lname'];
                $_SESSION['userId'] = convert_string('encrypt', $value['user_id']); //User Id Encrypt
                $_SESSION['Type'] = $value['account_status'];
                $_SESSION['Activate'] = $activate;
                $_SESSION['Uname'] = $userName;

                $valid['success'] = true;
                $valid['messages'] = "Login Success";
            } else {
                $valid['success'] = false;
                $valid['messages'] = "Password Not Correct";
                $errors[] = "Incorrect Email/password combination";
            } // /else
        } else {
            $errors[] = "Email doesnot exists";
            $valid['success'] = false;
        } // /else
    } // /else not empty Email // password

} // /if $_POST

$connect->close();
echo json_encode($valid);
