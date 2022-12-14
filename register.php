<?php
require_once 'backend/core.php';
if (islogin() == true) {
    if (isband_user() == true) {
        header("location: bandedaccount.php");
    } else {
        if ($_SESSION['Type'] == 6) {
            header("location: myaccount.php");
        } else {
            header("location: confirm_details.php");
        }
    }
}
require_once('./components/header.php') ?>

<body class="firstContainer">
    <!--     <form>
        <input type="text" class="form-control" placeholder="Enter Frist Name" />
        <input type="text" class="form-control" placeholder="Enter Last Name" />

        <input type="email" class="form-control" placeholder="Enter Email" />

        <input type="password" class="form-control" placeholder="Enter Password" />
        <input type="password" class="form-control" placeholder="Enter Confirm Password" />

        <input type="text" class="form-control" placeholder="Enter Country" />

        <select name="language" id="language" class="form-control">
            <option value="English">English</option>
            <option value="Sinhala">Sinhala</option>
        </select>

        <input type="number" class="form-control" placeholder="Enter Mobile No" />


        <button type="submit" id="user_details_submit_btn">Register</button>
    </form> -->
    <div class="container firstContainer">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-md-6 d-flex justify-content-center align-items-start"><img class="verified-man" src="assets/img/Account.gif"></div>
            <div class="col-md-6 text-center d-flex flex-column justify-content-center align-items-center">
                <form class="loginDiv" action="backend/user/add_new_user.php" method="post" id="add_new_user_frm" enctype="multipart/form-data">
                    <h1 class="text-uppercase text-center text-white login-heading">Signup</h1>
                    <p class="text-white loginPara signup-link">Already Registered?&nbsp;<a class="loginLink" href="login.html">Login Now</a></p>

                    <div id="step1details">
                        <div>
                            <div class="field">
                                <input type="text" id="fristnametxt" name="fristnametxt" required />
                                <label>First Name</label>
                            </div>
                        </div>
                        <div>
                            <div class="field">
                                <input type="text" id="lastnametxt" name="lastnametxt" required />
                                <label>Last Name</label>
                            </div>
                        </div>
                        <div>
                            <div class="field">
                                <input type="email" id="emailtxt" name="emailtxt" required />
                                <label>Email Address</label>
                            </div>
                        </div>
                        <div>
                            <div class="field">
                                <input type="text" id="countrytxt" name="countrytxt" required />
                                <label>Country</label>
                            </div>
                        </div>
                        <div>
                            <div class="field">
                                <input type="text" id="Mobilenotxt" name="Mobilenotxt" required />
                                <label>Phone Number</label>
                            </div>
                        </div>

                        <div>
                            <div class="field">
                                <div class="d-flex flex-column flex-sm-column flex-md-row flex-lg-row flex-xl-row flex-xxl-row field">
                                    <select class="form-select signupSelect mx-1" name="language" id="language">
                                        <option value="English">English</option>
                                        <option value="Sinhala">Sinhala</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="step2details">
                        <div>
                            <div class="field">
                                <input type="date" id="dobtxt" name="dobtxt" class="form-control" />
                                <label>DOB</label>
                            </div>
                        </div>

                        <div>
                            <div class="field">
                                <input type="text" id="addresstxt" name="addresstxt" required />
                                <label>Residential Address</label>
                            </div>
                        </div>
                        <div>
                            <div class="field">
                                <input type="text" id="streettxt" name="streettxt" required />
                                <label>Street </label>
                            </div>
                        </div>
                        <div>
                            <div class="field">
                                <input type="text" id="citytxt" name="citytxt" required />
                                <label>City / Town</label>
                            </div>
                        </div>


                        <div>
                            <div class="field">
                                <input type="text" id="zipcodetxt" name="zipcodetxt" required />
                                <label>Zip Code</label>
                            </div>
                        </div>
                        <div>
                            <div class="field">
                                <input type="password" id="password" name="password" required />
                                <label>Password</label>
                            </div>
                        </div>
                        <div>
                            <div class="field">
                                <input type="password" id="con_password" name="con_password" required />
                                <label>Confirm Password</label>
                            </div>
                        </div>

                    </div>

                    <div id="buttondiv">
                        <button class="btn btn-danger loginButton w-100" type="button" onclick="showOtherfun()">NEXT</button>
                    </div>

                    <p class="loginTermsPara text-white">
                    <div id="sinupbtn_div">
                        
                    </div>

                    <p class="text-white loginPara mt-5 text-secondary">&nbsp;<a class="loginLink" href="privacy-policy.html">Privacy Policy&nbsp;</a>&nbsp; |&nbsp;&nbsp;
                        <a class="loginLink" href="cookie-policy.html">Cookie Policy&nbsp;</a>
                    </p>

                </form>
            </div>
        </div>
    </div>

    <script src="./custom/registerfile.js"></script>
    <?php require_once('./components/footer.php') ?>