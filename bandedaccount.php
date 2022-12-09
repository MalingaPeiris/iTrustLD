<?php
require_once 'backend/core.php'; 
if(islogin() == false){
    header("location: login.php");
}else{
    if(isband_user() == false){ 
        header("location: login.php");
    }
}
require_once('./components/header.php');?>
