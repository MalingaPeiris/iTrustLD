<?php
//withdraw.php
require_once 'backend/core.php';
require_once 'backend/function.php';
if (islogin() == false) {
    header("location: login.php");
} else {
    if (isband_user() == true) {
        header("location: bandedaccount.php");
    } else if (is_confirm_user() == false) {
        header("location: confirm_details.php");
    }
}
$userid = convert_string('decrypt', $_SESSION['userId']);
$query = ("SELECT * FROM users WHERE `user_id` = '$userid'");
$result = $connect->query($query);
if ($result->num_rows == 1) {
    $value = mysqli_fetch_assoc($result);
   
    $username = $value['fname'] .' ' . $value['lname'];
}
require_once('./components/header.php');
/*  */

?>

<body>
    <?php require_once('./components/navbar.php'); ?>
    <!-- form -->
    <form action="#" id="withraw_img_submit_frm" name="withraw_img_submit_frm" method="post" enctype="multipart/form-data">
        <!-- Withdraw Type -->

        <div class="container firstContainer loyaltyContainer font" id="withraw_type_div">
            <div class="row">
                <div class="col-md-12" style="border-color: rgb(152,152,152);">
                    <h1 class="text-danger fs-2">Withdrawal</h1>
                    <p class="text-white-50">Short description about Withdraw process</p>
                    <hr class="text-danger">
                    <h4 class="text-danger mb-3">Withdraw Method</h4>
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
                    <div class="deposit-logo-div p-4 d-flex flex-column"><img class="w-75 h-100" src="assets/img/165671-banking-finance-free-download-image.png"></div>
                </div>
                <div class="col-md-4" onclick="fetch_widrowal_detail(6)">
                    <div class="deposit-logo-div p-4 d-flex flex-column"><img class="w-100 h-100" src="assets/img/visa-and-mastercard-logo-26.png"></div>
                </div>
            </div>
        </div>
        <!-- Withdraw Type -->

        <!-- withdraw Details -->
        <div id="load_withraw_details"></div>

        <!-- withdraw Details -->

        <!-- Image Upload -->
        <div class="container firstContainer loyaltyContainer font" id="Imgipdaddiv">
            <div class="row">
                <div class="col-md-12" style="border-color: rgb(152,152,152);">
                    <h1 class="text-danger fs-2">Deposit Proof</h1>
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
                                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                        </div>
                                    </div>

                                    <!-- Uploaded image area-->
                                    <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                                    <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="loginDiv mx-auto">
                        <h4 class="text-white">Please fill your Bank Account Details</h4>
                        <div>
                            <div class="field">
                                <input type="text" name="usernametxt" id="usernametxt" value="<?php echo($username)?>" required />
                                <label>Name</label>
                            </div>
                        </div>
                        <div>
                            <div class="field">
                                <input type="text" name="banktxt" id="banktxt" required />
                                <label>Bank</label>
                            </div>
                        </div>
                        <div>
                            <div class="field">
                                <input type="text"  name="branchtxt" id="branchtxt" required />
                                <label>Branch</label>
                            </div>
                        </div>
                        <div>
                            <div class="field">
                                <input type="text"  name="accountnotxt" id="accountnotxt" required />
                                <label>Account Number</label>
                            </div>
                        </div>
                    </form>
                    <p class="text-center loginTermsPara text-white">
                        <input type="checkbox" required>&nbsp;I accept&nbsp;<a class="loginLink" href="terms-and-conditions.html">Terms and Conditions</a></p>
                        <button class="btn btn-danger mt-4 w-100" type="submit">Withdraw</button>
                </div>
            </div>
        </div>

        <!-- Image Upload -->
    </form>
    <!-- form -->


    <script>
        function change_amt() {
            var dollerratetxt = $("#dollerratetxt").val();
            var withrawamttxt = $("#withrawamttxt").val();

            var amt = dollerratetxt * withrawamttxt;
            const result1 = amt.toFixed(2);
            $("#RSrate_amt_lbl").html('<p class="text-center text-white fw-bold m-0 fs-4" ><span class="text-danger">LKR</span>&nbsp;' + result1 + '</p>');
        }
    </script>

    <script src="./custom/withdrawfile.js"></script>

    <?php require_once('./components/footer.php') ?>