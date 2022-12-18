<?php
require_once '../../core.php';
include('../../function.php');
if (AdminLogin() == true){
    $output = array('data' => array());
    $query = "SELECT * FROM `withdraw_doller` WHERE `status` = 0; ";
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
                            Action
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#fetch_withraws_mdl" onclick="view_withraw(' . $id . ')">Edit</a></li>
                            
                            
                          </ul>
                        </div> 
        
        
        
        ';
        //`id``userid``name````lkramt```
        //`adminid``adminname``message``image``up_date``bankusername``bank``branch``account_no``status``subscription`
        if($row['status'] == 0){
            $status = 'Pending';
        }else{
            $status = 'Complate';
        }
        $output['data'][] = array(
    
          $row['id'],
          // des
          $row['userid'],
          // state 
          $row['name'],
          // Post Date
          $row['tran_id'],
          // modify date 		
          $row['lkramt'],
    
          $row['dolleramt'],
    
          $status,
    
          $button
        );
      }
    }
    
    $connect->close();
    
    echo json_encode($output);
    
}else{
    echo 'Error loading';
}

/* <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Admin_user_delete_mdl" onclick="delete_admin_user(' . $id . ')">Delete</a></li> */