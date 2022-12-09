<?php
//dffdfdfd

//session_start();
require_once '../../core.php';
require_once '../../function.php';

$errors = array();

if ($_POST) {

	$email = mysqli_real_escape_string($connect, ($_POST['exampleInputEmail']));
	$planepassword = mysqli_real_escape_string($connect, ($_POST['exampleInputPassword']));

	
	if (empty($email) || empty($planepassword)) {
		if ($email == "") {
			$errors[] = "Email is required";
		}

		if ($planepassword == "") {
			$errors[] = "Password is required";
		}
	} else {
		$sql = "SELECT * FROM adminusers WHERE email = '$email'";
		$result = mysqli_query($connect, $sql);

		if (mysqli_num_rows($result) == 1) {
			//$password = md5($password);
			$password = convert_string('encrypt', $planepassword);
			// exists
			$mainSql = "SELECT * FROM adminusers WHERE email = '$email' AND password = '$password'";
			$mainResult = mysqli_query($connect, $mainSql);

			if (mysqli_num_rows($mainResult) == 1) {
				$value = mysqli_fetch_assoc($mainResult);

				$user_id = $value['id'];

				//type And Activation
				$type = $value['type'];
				$activate = $value['activity_status'];
				$usname = $value['name'];
				// set session
				$_SESSION['AdminuserId'] = convert_string('encrypt', $user_id);
				$_SESSION['Activate'] = $activate;
				$_SESSION['Type'] = $type;
				$_SESSION['Uname'] = $usname;

				//this for the cookie time
				/* $cookie_time = (3600 * 24); //this for the day cookie

				setcookie("AdminuserId", $user_id, time() + $cookie_time,"/");
            	setcookie("Activate", $activate, time() + $cookie_time,"/");
            	setcookie("Type",  $type,time() + $cookie_time,"/");
				setcookie("Uname",  $usname,time() + $cookie_time,"/"); */
				$valid['success'] = true;

				//get the message to the activate or Not
				$valid['messages'] = $activate;


			} else {
				$valid['success'] = false;
				$valid['messages'] = "Password Or Email Is Not Correct";
				$errors[] = "Incorrect Email/password combination";
			} // /else
		} else {
			$errors[] = "Email doesnot exists";
			$valid['success'] = false;
		} // /else
	} // /else not empty Email // password

	//$valid['success'] = false;
	//$valid['messages'] = "Password Or Email Is Not Correct";
} // /if $_POST

$connect->close();
echo json_encode($valid);
