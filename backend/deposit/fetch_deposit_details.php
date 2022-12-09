<?php

//fetch_deposit_details.php

include '../core.php';
include '../function.php';

if ($_SESSION['userId']) {
    $date = date('Y-m-d');
    $valid = ''; //Output Value
    $id =  mysqli_real_escape_string($connect, $_POST['id']); //which currency
    $rate = 0;
    $mainSql = ("SELECT * FROM `doller_rate` ORDER BY `doller_rate`.`id` DESC LIMIT 1; ");
    $mainResult = $connect->query($mainSql);
    if ($mainResult->num_rows == 1) {
        $value = $mainResult->fetch_assoc();
        $rate = $value['rate'];
    }
    
    $valid = '
    <div class="container firstContainer loyaltyContainer font" id="deposit_details_div">
            <div class="row">
                <div class="col-md-12" style="border-color: rgb(152,152,152);">
                    <h1 class="text-danger fs-2">Deposit Details</h1>
                    <p class="text-white-50">Short description about deposit Details</p>
                    <hr class="text-danger">
                    <div class="row">
                        <div class="col-md-6"><img class="w-100" src="assets/img/XMLogo-2021_homepage.svg"></div>
                        <div class="col-md-6">
                            <p class="text-sm-center text-md-center text-lg-start text-xl-start text-xxl-start text-white-50 mt-2">Short description about XM</p>
                        </div>
                    </div>
                    <input type="hidden" name="deposit_type" id="deposit_type" value="'.$id.'">
                    <input type="hidden" name="dollerratetxt" id="dollerratetxt" value="'.$rate.'">
                    <div class="row my-3 p-3">
                        <div class="col-md-6 p-4 depositColumn">
                            <p class="m-0 text-white">Payment Option:</p>
                            <div class="field">
                            <select class="signupSelect w-100 depositSelect" id="selectbacktxt" name="selectbacktxt">
                                    <option value="1" selected="">Crypto</option>
                                    <option value="2">Skrill</option>
                                    <option value="3">Netteler</option>
                                    <option value="4">Perfect Money</option>
                                    <option value="5">Bank Transfer</option>
                                    <option value="6">Visa / Master</option>
                                </select></div>
                            <p class="m-0 text-white">Select Currency:</p>
                            <div class="field">
                            <select class="signupSelect w-100 depositSelect" id="selectcurrencetxt" name="selectcurrencetxt">
                                    <option value="7" selected="">LKR</option>
                                    <option value="2">Skrill</option>
                                    <option value="3">Netteler</option>
                                    <option value="4">Perfect Money</option>
                                    <option value="5">Bank Transfer</option>
                                    <option value="6">Visa / Master</option>
                                </select>
                                </div>
                            <div>
                                <div class="field">
                                    <input type="number" required id="depositamttxt" name="depositamttxt"  onchange="change_amt()" required/>
                                    <label>Deposit Amount</label>
                                </div>
                            </div>
                            <div>
                                <div class="field">
                                    <input type="text" required  id="platformtxt" name="platformtxt" required/>
                                    <label>Platform Credentials</label>
                                </div>
                            </div>
                            <p class="mb-0 mt-4 text-white">Deposit Amount:</p>
                            <div class="field depositAmount" id="doller_amt_lbl">
                                
                            </div>
                            <p class="text-center mb-2 mt-4 text-white-50">Special notice about calculated deposit amount and daily exchange rates</p>
                            <div class="depositExchangeRate">
                                <p class="text-center m-0 text-success fw-bold">Daily Exchange Rate:</p>
                                <p class="text-center mb-0 mt-4 text-white">Exchange Rate</p>
                                <div class="d-flex w-100 p-1 bg-dark rounded-3">
                                    <div class="d-xxl-flex justify-content-xxl-center w-100">
                                        <p class="text-white m-0"><span class="text-white">$&nbsp;</span>1<span class="text-white">&nbsp; &nbsp;:&nbsp;</span></p>
                                    </div>
                                    <div class="w-100">
                                        <p class="text-white m-0"><span class="text-white">LKR&nbsp;</span>' . $rate . '</p>
                                    </div>
                                </div>
                                <p class="text-center mb-0 mt-2 text-white">Date</p>
                                <div class="d-flex w-100 p-1 bg-dark rounded-3">
                                    <p class="text-center text-white w-100 m-0">' . $date . '</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"><img class="w-100 depositGif1" src="assets/img/Crypto%20portfolio.gif"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr class="text-danger"><button class="btn btn-danger w-100 fw-bold" type="button"  onclick="Image_fetch()">Next</button>
                </div>
            </div>
        </div>
    
    
    ';
}

$connect->close();

echo json_encode($valid);
