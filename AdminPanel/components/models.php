<!-- This model for the Admin user edit -->
<div class="modal fade" id="Admin_user_edit_mdl" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="../backend/admin/admin_users/edit_user.php" id="edit_admin_user_frm" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="admin_usertblHeader">Edit Admin Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col mb-3">
                            <input type="hidden" id="adminidtxt" name="adminidtxt" class="form-control" />
                            <label for="nameBasic" class="form-label">Name</label>
                            <input type="text" id="nametxt" name="nametxt" class="form-control" placeholder="Enter Name" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Email</label>
                            <input type="text" id="emailtxt" name="emailtxt" class="form-control" placeholder="Enter Email" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Password</label>
                            <input type="text" id="passwordtxt" name="passwordtxt" class="form-control" placeholder="Enter Password" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Type</label>
                            <select name="stypetxt" id="stypetxt" class="form-control">
                                <option value=""></option>
                                <option value="0">Sub Admin</option>
                                <option value="1">Main Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Status</label>
                            <select name="statustxt" id="statustxt" class="form-control">
                                <option value=""></option>
                                <option value="0">Deactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                    </div>
                    <div id="copencode_andOther">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Code</label>
                                <input type="text" id="codetxt" class="form-control" placeholder="Enter Code" disabled />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Reg Date</label>
                                <input type="text" id="codetxt" class="form-control" placeholder="Enter Date" disabled />
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <div id="admin_add_btn_div">
                        <button type="submit" class="btn btn-danger" id="admin_user_change_btn">Save changes</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- End -->


<!-- This for the delete Admin User -->

<div class="modal fade" id="Admin_user_delete_mdl" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <p>Are You sure to Datele this admin user</p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <div id="delete_admin_user_div"></div>

            </div>
        </div>
    </div>
</div>

<!-- End -->


<!-- User Details Edit Model -->
<div class="modal fade" id="user_edit_mdl" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="../backend/admin/users/edit_user_details.php" id="edit_user_Details_frm" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="admin_usertblHeader">Users Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3" id="uset_identity_img">
                            
                        </div>
                    </div>
                    <p>Address And Indetity Image</p>
                    <hr>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Frist Name</label>
                            <input type="text" id="fnametxt" name="fnametxt" class="form-control" placeholder="Enter Frist Name" disabled />
                        </div>
                        <div class="col mb-0">
                            <label for="dobBasic" class="form-label">Last Name</label>
                            <input type="text" id="lastnametxt" name="lastnametxt" class="form-control" placeholder="Enter Last Name" disabled />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Email</label>
                            <input type="text" id="emailtxt" name="emailtxt" class="form-control" placeholder="Enter Email" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Language</label>
                            <select name="languagetxt" id="languagetxt" class="form-control">
                                <option value=""></option>
                                <option value="0">Sinhala</option>
                                <option value="1">English</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Mobile No</label>
                            <input type="text" id="mobilenotxt" name="mobilenotxt" class="form-control" placeholder="Enter Mobile No" />
                        </div>
                    </div>


                    <!--  <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Password</label>
                            <input type="text" id="passwordtxt" name="passwordtxt" class="form-control" placeholder="Enter Password" />
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">DOB</label>
                            <input type="date" id="dobtxt" name="dobtxt" class="form-control" />
                        </div>
                    </div>
                    <hr>

                    <h4>Adress</h4>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Address</label>
                            <textarea name="addresstxt" id="addresstxt" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Street</label>
                            <input type="text" id="streettxt" name="streettxt" class="form-control" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Country</label>
                            <input type="text" id="countrytxt" name="countrytxt" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">City</label>
                            <input type="text" id="citytxt" name="citytxt" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Zip Code</label>
                            <input type="text" id="zipcodetxt" name="zipcodetxt" class="form-control" />
                        </div>
                    </div>
                    <p>Select User Details</p>
                    <hr>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Identity Confirm</label>
                            <select name="identity_confirm_txt" id="identity_confirm_txt" class="form-control">
                                <option value="">Select Value</option>
                                <!-- <option value="0">Not Confirm</option> -->
                                <option value="1">Email Only</option>
                                <!-- <option value="2">Confirm Pending</option> -->
                                <option value="3">Confirm Sucess</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Address Confirm</label>
                            <select name="address_confirm_txt" id="address_confirm_txt" class="form-control">
                                <option value="">Select Value</option>
                                <option value="0">Address Not Confirm</option>
                                <!-- <option value="1">Pending Address</option> -->
                                <option value="2">Confirm Sucess</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="user_id_txt" id="user_id_txt">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <div id="admin_add_btn_div">
                        <button type="submit" class="btn btn-danger" id="user_details_edit_btn">Save changes</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- End -->


<!-- fetch pending Withrwas -->
<div class="modal fade" id="fetch_withraws_mdl" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="../backend/admin/withraws/update_withdraw_status.php" id="withraws_status_change_frm" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="admin_usertblHeader">Edit Admin Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3" id="Withraw_ImageShow">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Transaction</label>
                            <input type="text" id="trans_id_txt" name="trans_id_txt" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">LKR AMT</label>
                            <input type="text" id="lkramttxt" name="lkramttxt" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Doller AMT</label>
                            <input type="text" id="dolleramttxt" name="dolleramttxt" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Name</label>
                            <input type="text" id="usernametxt" name="usernametxt" class="form-control" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Status Update</label>
                            <select name="statusupdatetxt" id="statusupdatetxt" class="form-control">
                                <option value="0">Pending</option>
                                <option value="1">Sucess</option>
                                <option value="2">Error</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Message</label>
                            <input type="text" id="messagetxt" name="messagetxt" class="form-control" />
                        </div>
                    </div>
                    <p>Bank Details</p>
                    <hr>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Bank User-Name</label>
                            <input type="text" id="bankusernametxt" name="bankusernametxt" class="form-control" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Bank</label>
                            <input type="text" id="banktxt" name="banktxt" class="form-control" disabled />
                        </div>
                        <div class="col mb-0">
                            <label for="dobBasic" class="form-label">Branch</label>
                            <input type="text" id="branchtxt" name="branchtxt" class="form-control" disabled />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Account No</label>
                            <input type="text" id="accountnotxt" name="accountnotxt" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Date</label>
                            <input type="text" id="tanferdatetxt" name="tanferdatetxt" class="form-control" />
                        </div>
                    </div>

                    <p>Subcription</p>
                    <hr>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Subcription ID</label>
                            <input type="text" id="subcriptionidtxt" name="subcriptionidtxt" class="form-control" />
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <div id="admin_add_btn_div">
                        <input type="hidden" id="vithraw_id_txt" name="vithraw_id_txt">
                        <button type="submit" class="btn btn-danger" id="withraws_status_change_btn">Save changes</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<!-- End -->