<nav class="navbar navbar-light navbar-expand-md textlight bg-dark text-uppercase text-start text-light navigation-clean">
    <div class="container"><a class="navbar-brand" href="#">iTrustLD</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon text-danger fw-bold"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto">

                <?php if (isset($_SESSION['userId'])) { ?>
                    <li class="nav-item"><a class="nav-link" href="myaccount.php">Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="deposit.php">Deposit</a></li>
                    <li class="nav-item"><a class="nav-link" href="withdraw.php">Withdrawal</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Loyalty</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Verification</a></li>

                    <li class="nav-item"><a class="btn btn-danger" role="button" onclick="logoutFunc()">LOGOUT</a></li>

                <?php } else { ?>
                    <li class="nav-item"><a class="btn btn-danger" role="button" href="login.php">LOGIN</a></li>

                <?php } ?>
            </ul>
        </div>
    </div>
</nav>