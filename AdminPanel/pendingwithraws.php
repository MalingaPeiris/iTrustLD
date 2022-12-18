<?php
//pendingwithraws.php
require_once '../backend/core.php';
if (AdminLogin() == false) {
    //Adminautolog();
    header('location: login.php');
}

require_once('./components/header.php') ?>
<!-- header file -->

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <?php require_once('./components/navbar.php') ?>

        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!--Top Navbar -->
            <?php require_once('./components/topnavbar.php') ?>
            <!-- / Top Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card">

                        <table class="table" id="list_tbl">
                            <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>UserID</th>
                                    <th>Name</th>
                                    <th>transactionID</th>
                                    <th>LKR AMT</th>
                                    <th>Doller Amt</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="usertblid">
                                <tr>

                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>33</td>
                                    <td>2008/11/28</td>
                                    <td>$162,700</td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><strong>ID</strong></td>
                                    <td><strong>UserID</strong></td>
                                    <td><strong>Name</strong></td>
                                    <td><strong>transactionID</strong></td>
                                    <td><strong>LKR AMT</strong></td>
                                    <td><strong>Doller Amt</strong></td>
                                    <td><strong>Status</strong></td>
                                    <td><strong>Action</strong></td>


                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>





                <script src="./custom/pending_withrawfile.js"></script>
                <?php require_once('./components/footer.php') ?>