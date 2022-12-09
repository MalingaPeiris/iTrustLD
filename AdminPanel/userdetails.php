<!-- userdetails -->
<!-- header file -->
<?php 
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
                       
                        <table class="table" id="user_list_tbl">
                            <thead>
                                <tr>

                                    <th>Acc ID</th>
                                    <th>First Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Confirm Type</th>
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
                                    <td><strong>Acc ID</strong></td>
                                    <td><strong>First Name</strong></td>
                                    <td><strong>Email</strong></td>
                                    <td><strong>Mobile No</strong></td>
                                    <td><strong>Confirm Type</strong></td>
                                    <td><strong>Action</strong></td>
                                  
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>





                <script src="./custom/userfile.js"></script>
                <?php require_once('./components/footer.php') ?>