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
                        <br>
                        <div>
                            <button class="btn rounded-pill btn-danger" data-bs-toggle="modal" data-bs-target="#Admin_user_edit_mdl" onclick="add_new_user_mdl_load()">Add New Admin</button>
                        </div>
                        <br>
                        <table class="table" id="adminuser_list_tbl">
                            <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Type</th>
                                    <th>Active State</th>
                                    <th>Code</th>
                                    <th>Reg Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="usertblid">
                                <tr>
                                    <td>
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
                                    <td><strong>Name</strong></td>
                                    <td><strong>Email</strong></td>
                                    <td><strong>Password</strong></td>
                                    <td><strong>Type</strong></td>
                                    <td><strong>Active State</strong></td>
                                    <td><strong>Code</strong></td>
                                    <td><strong>Reg Date</strong></td>
                                    <td><strong>Action</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>





                <script src="./custom/adminluserfile.js"></script>
                <?php require_once('./components/footer.php') ?>