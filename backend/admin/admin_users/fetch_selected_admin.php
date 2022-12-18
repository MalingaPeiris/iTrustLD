<?php
//fetch_selected_admin.php

require_once '../../core.php';
require_once '../../function.php';
if (AdminLogin() == true){
    $userid = mysqli_real_escape_string($connect, $_POST['id']);

    $sql = "SELECT * FROM `adminusers` WHERE id = $userid";
    $result = $connect->query($sql);
    
    if ($result->num_rows > 0) {
        //`id`, `name`, `email`, ``, ``, ``, ``, ``
        while ($row = $result->fetch_array()) {
            $password = convert_string('decrypt', $row['password']);
            $users_arr[] = array("id" => $row['id'], "name" => $row['name'], "email" => $row['email'], "password" => $password, "type" => $row['type'], "activity_status" => $row['activity_status'], "activate_code" => $row['activate_code'], "Reg_date" => $row['Reg_date']);
        }
    } // if num_rows
    
    $connect->close();
    
    echo json_encode($users_arr);
    
}else{
    echo 'Error Loading';
}
