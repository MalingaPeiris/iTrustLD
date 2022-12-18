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
    <div class="container firstContainer">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-md-6 d-flex justify-content-center align-items-center"><img class="verified-man" src="assets/img/Account.gif"></div>
            <div class="col-md-6 text-center d-flex flex-column justify-content-center align-items-center">
                <form class="loginDiv" action="backend/user/user_login.php" method="post" id="loginFrm">
                    <h1 class="text-uppercase text-center text-white login-heading">Login</h1>
                    <p class="text-white loginPara signup-link">Not a member?&nbsp;<a class="loginLink" href="register.php">Signup Now</a></p>
                    <div>
                        <div class="field">
                            <input type="text" class="form-control" id="username" name="username"  autocomplete="off" required />
                            <label>Email Address</label>
                        </div>
                    </div>
                    <div>
                        <div class="field">
                            <input type="password" class="form-control" id="password" name="password"  autocomplete="off" required />
                            <label>Password</label>
                        </div>
                    </div>
                    <p class="loginTermsPara text-white"><input type="checkbox">&nbsp;I accept&nbsp;<a class="loginLink" href="terms-and-conditions.html">Terms and Conditions</a></p>

                    <button class="btn btn-danger loginButton w-100" type="submit" id="sininBtn">LOGIN</button>

                    <p class="text-white loginPara">&nbsp;<a class="loginLink" href="forgot-password.html">Forgot Your
                            Password?&nbsp;</a></p>
                    <p class="text-white loginPara mt-5 text-secondary">&nbsp;<a class="loginLink" href="privacy-policy.html">Privacy Policy&nbsp;</a>&nbsp; |&nbsp;&nbsp;<a class="loginLink" href="cookie-policy.html">Cookie Policy&nbsp;</a></p>
                </form>
            </div>
        </div>
    </div>

    <script src="./custom/loginfile.js"></script>

    <?php require_once('./components/footer.php') ?>