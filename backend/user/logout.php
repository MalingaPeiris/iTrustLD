<?php
require_once '../core.php';

if (isset($_POST["action"])) {
    session_destroy();
    unset($_SESSION['userId']);
    unset($_SESSION['Type']);
    unset($_SESSION['Activate']);
    unset($_SESSION['Uname']);

}