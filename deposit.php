<?php
require_once 'backend/core.php';
if (islogin() == false) {
    header("location: login.php");
} else {
    if (isband_user() == true) {
        header("location: bandedaccount.php");
    } else if (is_confirm_user() == false) {
        header("location: confirm_details.php");
    }
}
require_once('./components/header.php');
?>

<body>
    <?php require_once('./components/navbar.php'); ?>
    <!-- form start -->
    <form action="#" id="Identity_img_submit_frm" name="Identity_img_submit_frm" method="post" enctype="multipart/form-data">
        <!-- Deposit Type -->
        
        <div class="container firstContainer loyaltyContainer font" id="deposit_type_div">
            <div class="row">
                <div class="col-md-12" style="border-color: rgb(152,152,152);">
                    <h1 class="text-danger fs-2">Deposit</h1>
                    <p class="text-white-50">Short description about deposit process</p>
                    <hr class="text-danger">
                    <h4 class="text-danger mb-3">Deposit Method</h4>
                    <p class="text-white-50">Please choose a deposit method from below to continue.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" onclick="fetch_widrowal_detail(1)">
                    <div class="deposit-logo-div p-4"><img class="w-100" src="assets/img/XMLogo-2021_homepage.svg"></div>
                </div>
                <div class="col-md-4" onclick="fetch_widrowal_detail(2)">
                    <div class="deposit-logo-div p-4"><img class="w-100" src="assets/img/Skrill-Logo.svg"></div>
                </div>
                <div class="col-md-4" onclick="fetch_widrowal_detail(3)">
                    <div class="deposit-logo-div p-4"><img class="w-100 rounded h-100" src="assets/img/csm_og_d51407eaee.jpg"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" onclick="fetch_widrowal_detail(4)">
                    <div class="deposit-logo-div p-4"><img class="w-100" src="assets/img/logo3.png"></div>
                </div>
                <div class="col-md-4" onclick="fetch_widrowal_detail(5)">
                    <div class="deposit-logo-div p-4 d-flex flex-column"><img class="w-100 h-100" src="assets/img/tether-usdt-logo.svg">
                        <p class="text-center text-white fw-bold mb-0">USDT</p>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <!-- Deposit Type -->
        <!-- Deposti Details -->
        
        
        <div id="load_deposit_details"></div>
       
        <!-- End Deposti Details -->
        <!-- Image -->
        <div class="container firstContainer loyaltyContainer font" id="Imgipdaddiv">
            <div class="row">
                <div class="col-md-12" style="border-color: rgb(152,152,152);">
                    <h1 class="text-danger fs-2">Deposit Proofs</h1>
                    <p class="text-white-50">Short description about deposit Proof</p>
                    <hr class="text-danger">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"><img class="w-100" src="assets/img/XMLogo-2021_homepage.svg"></div>
                <div class="col-md-6">
                    <p class="text-white-50 mt-md--3">Short description about XM</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr class="text-danger">
                    <h5 class="text-center text-white">Please Attach a payment slip or a screen shot to prove your transaction.&nbsp;&nbsp;</h5>
                    <div class="bootstrap_img_upload bg-dark rounded-3">
                        <div class="container py-5">

                            <div class="row py-2">
                                <div class="col-lg-6 mx-auto">

                                    <!-- Upload image input-->
                                    <div class="input-group mb-3 px-1 py-2 rounded-pill bg-white shadow-sm w-100">
                                        <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0" required>
                                        <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                                        <div class="input-group-append">
                                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4">
                                                 <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                        </div>
                                    </div>

                                    <!-- Uploaded image area-->
                                    <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                                    <div class="image-area mt-4">
                                        <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="field">
                            <input type="text" id="copencode_txt" name="copencode_txt"/>
                            <label>Add Partner Code</label>
                        </div>
                    </div>
                    <p class="text-center loginTermsPara text-white">
                        <input type="checkbox" required>
                        &nbsp;I accept&nbsp;<a class="loginLink" href="terms-and-conditions.html">Terms and Conditions</a></p>
                        <button class="btn btn-danger mt-4 w-100" type="submit" id="all_doc_submit_btn">Deposit</button>
                </div>
            </div>
        </div>
        <!-- End Image -->
    </form>

    <div id="main_Status_load"></div>
    <!-- form End -->

    <script src="./custom/depositfile.js"></script>

    <?php require_once('./components/footer.php') ?>