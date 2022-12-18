<?php
require_once '../../core.php';
include('../../function.php');
if (AdminLogin() == true) {
  $output = array('data' => array());
  $query = "SELECT * FROM `users` ORDER BY `users`.`user_id` DESC";
  $result = $connect->query($query);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
      //`id`, `name`, `email`, `password`, `type`, `activity_status`, `activate_code`, `Reg_date`
      $id = $row['user_id'];

      $button = '<!-- Single button -->
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-outline-danger dropdown-toggle"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        Action
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#user_edit_mdl" onclick="edit_user(' . $id . ')">Edit</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#user_delete_mdl" onclick="delete_user(' . $id . ')">Delete</a></li>
                        
                      </ul>
                    </div> 
    
    
    
    ';
      $verify = '';
      if ($row['account_status'] == 0 && $row['address_status'] == 0) {
        $verify = 'Not';
        $button = '';
      } elseif ($row['account_status'] == 1 && $row['address_status'] == 0) {
        $verify = 'Email-Only';
      } elseif ($row['account_status'] == 1 && $row['address_status'] == 1) {
        $verify = 'Address-Pending';
      } elseif ($row['account_status'] == 2 && $row['address_status'] == 1) {
        $verify = 'Pending All';
      } elseif ($row['account_status'] == 3 && $row['address_status'] == 1) {
        $verify = 'Only-ID';
      } elseif ($row['account_status'] == 3 && $row['address_status'] == 2) {
        $verify = 'Confirm';
      }
      $output['data'][] = array(

        $row['user_id'],
        // des
        $row['fname'],
        // state 
        $row['email'],
        //mobile No
        $row['mobile_no'],
        //user Confirm Type
        $verify,
        $button
      );
    }
  }

  $connect->close();

  echo json_encode($output);
} else {
  echo 'Error';
}
