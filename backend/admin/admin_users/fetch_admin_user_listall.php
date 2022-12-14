<?php
require_once '../../config.php';
include('../../function.php');
$output = array('data' => array());
$query = "SELECT * FROM `adminusers` ORDER BY `adminusers`.`id` DESC";
$result = $connect->query($query);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_array()) {
    //`id`, `name`, `email`, `password`, `type`, `activity_status`, `activate_code`, `Reg_date`
    $id = $row['id'];

    $button = '<!-- Single button -->
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-outline-danger dropdown-toggle"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        Danger
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Admin_user_edit_mdl" onclick="edit_admin_user(' . $id . ')">Edit</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Admin_user_delete_mdl" onclick="delete_admin_user(' . $id . ')">Delete</a></li>
                        
                      </ul>
                    </div> 
    
    
    
    ';

    $password = convert_string('decrypt',$row['password']);
    if($row['type'] == 0){
      $type = 'Sub-Admin';
    }elseif($row['type'] ==1){
      $type = 'Main-Admin';
    }
    if($row['activity_status'] == 1){
      $status = 'Active';
    }elseif($row['activity_status'] ==0){
      $status = 'Deactive';
    }
    $output['data'][] = array(

      $row['id'],
      // des
      $row['name'],
      // state 
      $row['email'],
      // Post Date
      $password,
      // modify date 		
      $type,

      $status,

      $row['activate_code'],

      $row['Reg_date'],
      // button
      $button
    );
  }
}

$connect->close();

echo json_encode($output);
