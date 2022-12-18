<?php
require_once 'backend/core.php'; 
if(islogin() == false){
    header("location: login.php");
}else{
    if(isband_user() == true){ 
        header("location: bandedaccount.php");
    }
}
require_once('./components/header.php');?>



<?php require_once('./components/footer.php') ?>
