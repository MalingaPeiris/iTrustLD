<?php
require_once '../../core.php';
include('../../function.php');
if (AdminLogin() == true){
    $id =  mysqli_real_escape_string($connect, ($_POST['id']));

    $sql = "SELECT * FROM `withdraw_doller` WHERE `id` = $id";
    $result = $connect->query($sql);
    
    if($result->num_rows > 0) { 
     $row = $result->fetch_array();
    } // if num_rows
    
    $connect->close();
    
    echo json_encode($row);
}else{
    echo('Error Loading');
}
