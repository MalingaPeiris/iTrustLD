<?php
require_once 'backend/core.php';
include 'backend/function.php';
if (islogin() == false) {
    header("location: login.php");
} else {
    if (isband_user() == true) {
        header("location: bandedaccount.php");
    }
}
require_once('./components/header.php');

$userid = convert_string('decrypt', $_SESSION['userId']);
$query = ("SELECT * FROM users WHERE `user_id` = '$userid'");
$result = $connect->query($query);
if ($result->num_rows == 1) {
    $value = mysqli_fetch_assoc($result);
    $account_status = $value['account_status'];
    $address_status = $value['address_status'];
    $email = $value['email'];
}

?>

<body>
    <?php require_once('./components/navbar.php') ?>
    <div class="container firstContainer" id="account_verify">
        <div class="row">
            <div class="col-md-6 p-4">
                <h1 class="verify-heading">Account <br>Verification</h1>
                <p class="text-white">Verification process introduction paragraph</p>
                <?php if ($account_status == 3 && $address_status == 2) { ?>
                    <p class="text-success notVerifyPara"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-exclamation-triangle">
                            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"></path>
                            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"></path>
                        </svg>&nbsp;Your account is verified</p> 
                <?php } else { ?>
                    <p class="text-danger notVerifyPara"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-exclamation-triangle">
                            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"></path>
                            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"></path>
                        </svg>&nbsp;Your account is not verified yet</p>
                <?php } ?>

            </div>
            <div class="col-md-6 p-4">
                <?php if ($account_status  != 0) { ?>
                    <h3 class="verifySubHeading">Email Verification</h3>
                    <div>
                        <div class="field">
                            <input type="text" id="emailtxt" name="emailtxt" value="<?php echo ($email); ?>" required />
                            <label>Email Address</label>
                        </div>
                    </div>
                    <p class="text-start text-white-50">Your Email is Confirm</p>
                <?php } else { ?>
                    <h3 class="verifySubHeading">Email Verification</h3>
                    <p class="text-start text-white-50" id="email_confirm_para">Please Enter your E-mail to begin the email verification process</p>
                    <div>
                        <div class="field">
                            <input type="text" id="emailtxt" name="emailtxt" value="<?php echo ($email); ?>" required />
                            <label>Email Address</label>
                        </div>

                        <div class="field" id="verifi_code_div">
                            <input type="text" id="verify_code_txt" name="verify_code_txt" class="form-control" />
                            <label>Verification Code</label>
                        </div>
                    </div>

                    <div id="main_confirm_btn_div">
                        <button class="btn btn-danger my-3" id="send_mail_btn" type="button" onclick="send_to_user_mail()">Send</button>
                    </div>

                    <p class="text-start text-white-50">Please note that Email verification process may take several minutes to complete.</p>
                <?php } ?>

            </div>
        </div>
    </div>

    <?php if ($account_status == 2 && $address_status == 1) { //Pending 
    ?>
        <div class="container verifiedContainer" id="verrify_class">
            <div class="row">
                <div class="col-md-12 text-center"><img class="verified-man" src="assets/img/verified-man.gif">
                    <h1 class="text-danger fw-bold">Well Done!!</h1>
                    <h1 class="text-white">Your Documents are&nbsp;<span class="text-success">Pending</span>!</h1>
                </div>
            </div>
        </div>


    <?php } else if ($account_status == 3 && $address_status == 2) { ?>
        <div class="container verifiedContainer" id="verrify_class">
            <div class="row">
                <div class="col-md-12 text-center"><img class="verified-man" src="assets/img/verified-man.gif">
                    <h1 class="text-danger fw-bold">Congratulations!!</h1>
                    <h1 class="text-white">Your Account Is Already&nbsp;<span class="text-success">Verified</span>!</h1>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="container d-flex flex-column justify-content-center align-items-center docVerifyContainer p-3 my-5" id="user_date_confirm">
            <div class="row">
                <div class="col-md-12">
                    <?php if (($account_status == 1 || $account_status == 0)) { ?>
                        <h2 class="text-center verifySubHeading mt-3">Document Verification</h2>
                        <p class="text-center text-white-50">Please Confirm your Identity</p>
                        <div class="dropdown text-center">
                            <!-- <button class="btn btn-danger dropdown-toggle my-4" aria-expanded="false" data-bs-toggle="dropdown" type="button">Choose Method Here</button> -->


                            <div id="upload_type_div">
                                <select name="select_type_txt" id="select_type_txt" class="btn btn-danger dropdown-toggle my-4" onchange="select_Itentity()">
                                    <option value="">Choose Method Here</option>
                                    <option value="1">National Identity card</option>
                                    <option value="2">Driving Liscence</option>
                                    <option value="3">Passport</option>
                                </select>

                            </div>
                            <!-- Identity -->
                            <div class="row mt-4" id="id_confirm_div">
                                <div class="col-md-6 mt-2">
                                    <form action="#" id="Identity_img_submit_frm" name="Identity_img_submit_frm" method="post" enctype="multipart/form-data">
                                        <h5 class="text-center text-white" id="image_title">Front Image</h5>
                                        <p class="text-center text-white-50 w-75 mx-auto" id="image_paragraph">Please attach the front image of the selected document verification method to begin the verification process.</p>
                                        <div class="bootstrap_img_upload">
                                            <div class="container py-5">

                                                <div class="row py-2">
                                                    <div class="col-lg-6 mx-auto">

                                                        <!-- Upload image input-->
                                                        <div class="input-group mb-3 px-1 py-2 rounded-pill bg-white shadow-sm w-100">
                                                            <input id="front_Img_upload" type="file" onchange="readURL(this);" class="form-control border-0">
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
                                        <div class="text-center" id="front_upload_btn_div">
                                            <button class="btn btn-danger text-center mx-auto" id="ifrntity_img_submit_btn" type="submit">Upload image</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Identity End -->
                        </div>
                    <?php } else if ( $address_status == 0 || $address_status == 1) { ?>
                        <h2 class="text-center verifySubHeading mt-3">Document Verification</h2>
                        <p class="text-center text-white-50">Please Confirm Your Address</p>
                        <div class="dropdown text-center">
                            <!-- <button class="btn btn-danger dropdown-toggle my-4" aria-expanded="false" data-bs-toggle="dropdown" type="button">Choose Method Here</button> -->


                            <div id="upload_type_div">
                                <select name="select_type_txt" id="select_type_txt" class="btn btn-danger dropdown-toggle my-4" onchange="select_Itentity()">
                                    <option value="">Select Document Type</option>
                                    <option value="1">Electricity Bill</option>
                                    <option value="2">Water Bill</option>
                                </select>

                            </div>


                            <!-- Address Upload------------------------------------------------------- -->
                            <div class="row mt-4" id="address_con_div">
                                <div class="col-md-6 mt-2">
                                    <h5 class="text-center text-white">Address Confirm Docment</h5>
                                    <p class="text-center text-white-50 w-75 mx-auto">Please attach the selected document verification method to begin the verification process.</p>
                                    <form action="#" id="submit_address_frm" name="submit_address_frm" method="post" enctype="multipart/form-data">
                                        <div class="bootstrap_img_upload">
                                            <div class="container py-5">

                                                <div class="row py-2">
                                                    <div class="col-lg-6 mx-auto">

                                                        <!-- Upload image input-->
                                                        <div class="input-group mb-3 px-1 py-2 rounded-pill bg-white shadow-sm w-100">
                                                            <input id="address_doc_uploa" type="file" onchange="readURL(this);" class="form-control border-0">
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
                                        <div class="text-center">
                                            <button class="btn btn-danger text-center mx-auto" id="address_doc_btn" type="submit">Upload Document</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Upload------------------------------------------------------------------------------------------------ -->
                        </div>
                    <?php } ?>
                    ------
                </div>
            </div>
            <!-- Image Upload------------------------------------------- -->

            <div class="row d-flex flex-column justify-content-center align-items-center mt-5" style="border-top: 2px dashed rgb(88,88,88) ;">
                <div class="col text-center">
                    <button class="btn btn-danger mt-3 verifyButton" type="button">Start Document Verification</button>
                </div>
                <div class="col-md-12 text-center d-flex justify-content-between d-flex w-75">
                    <p class="text-center text-white-50 mt-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20" fill="none" class="text-white mr-4 fs-4">

                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18 10C18 14.4183 14.4183 18 10 18C5.58172 18 2 14.4183 2 10C2 5.58172 5.58172 2 10 2C14.4183 2 18 5.58172 18 10ZM11 6C11 6.55228 10.5523 7 10 7C9.44772 7 9 6.55228 9 6C9 5.44772 9.44772 5 10 5C10.5523 5 11 5.44772 11 6ZM9 9C8.44772 9 8 9.44772 8 10C8 10.5523 8.44772 11 9 11V14C9 14.5523 9.44772 15 10 15H11C11.5523 15 12 14.5523 12 14C12 13.4477 11.5523 13 11 13V10C11 9.44772 10.5523 9 10 9H9Z" fill="currentColor"></path>
                        </svg>&nbsp; Please note that the Verification Process will take up to 24 hours. Once the verification is done you will receive a notification to your email address.&nbsp;</p>
                </div>
            </div>
        </div>
    <?php } ?>


    <div>






        <script src="./custom/confirm_user_details_file.js"></script>
        <?php require_once('./components/footer.php') ?>