<?php
session_start();

require_once 'config.php';

//User Login



//This for the admin User Login
function useradminLogin() {
    if (isset($_SESSION['AdminuserId']) && ($_SESSION['Activate'] == "active" && $_SESSION['Type'] == "uadmin" || $_SESSION['Type'] == "Admin")) {
       return true;
    } else {
       return false;
    }
 }

 //is login function
 function islogin() {
   if(isset($_SESSION['userId']) && isset($_SESSION['Uname'])){
      return true;
   }else{
      return false;
   }
 }
 
 function isband_user(){//if true is a band User
   if($_SESSION['Type'] == 10){
      return true;
   }else{
      return false;
   }
 }

 function is_confirm_user() { //User is Confirm
   if($_SESSION['Type'] == 3){
      return true;
   }else{
      return false;
   }
 }
//Admin Login
 function AdminLogin()
{
   if (isset($_SESSION['AdminuserId']) && ($_SESSION['Activate'] == 1 && $_SESSION['Type'] == 1)) {
      return true;
   } else {
      return false;
   }
}