<?php
include '../core.php';
include '../function.php';

if($_SESSION['userId']){
    $date = date('Y-m-d');
    $mainSql = ("SELECT * FROM `doller_rate` WHERE `add_date` = '$date'; ");
    $mainResult = $connect->query($mainSql);
    if ($mainResult->num_rows == 1) {
        
    }
}
