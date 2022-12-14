<?php
include '../core.php';
include '../function.php';

if ($_SESSION['userId']) {
    /*  $mainSql = ("SELECT * FROM users WHERE email = '$emailtxt'");
    $mainResult = $connect->query($mainSql);
    if ($mainResult->num_rows == 1) {
        
    } */
    $msg =  mysqli_real_escape_string($connect, $_POST['sucessstatus']);

    $valid = '';
    if($msg == 1){
        
        $valid = '<div class="container firstContainer loyaltyContainer font">
        <div class="row">
            <div class="col-md-12" style="border-color: rgb(152,152,152);">
                <h1 class="text-warning fs-2">Deposit Processing. . .</h1>
                <p class="text-white-50">Short description about deposit Processing</p><img class="w-100" src="assets/img/Process.gif"><button class="btn btn-danger w-100 mb-4" type="button">OK</button>
            </div>
        </div>
    </div>';
    }elseif($msg == 0){
        $valid = '<div class="container firstContainer loyaltyContainer font">
        <div class="row">
            <div class="col-md-12" style="border-color: rgb(152,152,152);">
                <h1 class="text-danger fs-2">Deposit Error!!!</h1>
                <p class="text-white-50">Short description about deposit Error</p><img class="w-100" src="assets/img/No%20data.gif"><button class="btn btn-danger w-100 mb-4" type="button">Understood</button>
            </div>
        </div>
    </div>';
    }elseif($msg == 2){
        $valid = '<div class="container firstContainer loyaltyContainer font">
        <div class="row">
            <div class="col-md-12" style="border-color: rgb(152,152,152);">
                <h1 class="text-success fs-2">Your Deposit Was Successful!</h1>
                <p class="text-white-50">Short description about deposit&nbsp;</p><img class="w-100 rounded-3" src="assets/img/Payment%20Information.gif"><button class="btn btn-danger w-100 my-4" type="button">Continue</button>
            </div>
        </div>
    </div>';
    }
}

$connect->close();

echo json_encode($valid);
?>
<!-- <div class="container firstContainer loyaltyContainer font">
    <div class="row">
        <div class="col-md-12" style="border-color: rgb(152,152,152);">
            <h1 class="text-warning fs-2">Deposit Processing. . .</h1>
            <p class="text-white-50">Short description about deposit Processing</p><img class="w-100" src="assets/img/Process.gif"><button class="btn btn-danger w-100 mb-4" type="button">OK</button>
        </div>
    </div>
</div>
<div class="container firstContainer loyaltyContainer font">
    <div class="row">
        <div class="col-md-12" style="border-color: rgb(152,152,152);">
            <h1 class="text-danger fs-2">Deposit Error!!!</h1>
            <p class="text-white-50">Short description about deposit Error</p><img class="w-100" src="assets/img/No%20data.gif"><button class="btn btn-danger w-100 mb-4" type="button">Understood</button>
        </div>
    </div>
</div>
<div class="container firstContainer loyaltyContainer font">
    <div class="row">
        <div class="col-md-12" style="border-color: rgb(152,152,152);">
            <h1 class="text-success fs-2">Your Deposit Was Successful!</h1>
            <p class="text-white-50">Short description about deposit&nbsp;</p><img class="w-100 rounded-3" src="assets/img/Payment%20Information.gif"><button class="btn btn-danger w-100 my-4" type="button">Continue</button>
        </div>
    </div>
</div> -->