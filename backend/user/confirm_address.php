<?php
require_once '../core.php';
require_once '../function.php';
$valid = '';

if (isset($_POST["action"])) {
    //Folder Not In a System Then Create A FOlder
    $select_type_txt = mysqli_real_escape_string($connect, $_POST['select_type_txt']);
    $gcurdir = getcwd();
    $chdirectory = $gcurdir . "/upload/" . $_SESSION["userId"];
    if (!is_dir($chdirectory)) {
        mkdir($gcurdir . "/upload/" . $_SESSION["userId"], 0777);
    }
    //-------------End The Folder Cresate---------------------

    $file_name = $_FILES["file"]["name"][0];
    $tmp_name = $_FILES["file"]['tmp_name'][0];

    $file = explode(".", $_FILES["file"]["name"][0]);
    $extension = end($file);
    $name = 'N-' . rand(1000, 100000000) . '.' . $extension;
    $location = 'upload/' . $_SESSION["userId"] . '/' . $name;

    if (move_uploaded_file($tmp_name, $location)) {
        $userid = convert_string('decrypt', $_SESSION['userId']);
        //$query = "INSERT INTO `user_images` (`id`, `nic_Image`, `address_img`, `status`, `user_id`) VALUES (NULL, '$location', '', '0', '$userid');";
        $query = "INSERT INTO `user_images` (`ide`,`nic_Image`, `address_img`, `status`, `user_id`) VALUES (NULL,'0',$location','0', '$userid');";
        
        $result = $connect->query($query);
        if (($result) === TRUE) {
            $res = $connect->query("UPDATE `users` SET `address_status` = '1' WHERE `users`.`user_id` = $userid; ");
        }else{
            $valid = 'Error in Image Upload';
        }
    }
}
echo($valid);
$connect->close();


/* $gcurdir = getcwd();
$chdirectory = $gcurdir . "/uploaded/" . $_SESSION["phone"];
if (!is_dir($chdirectory)) {
    mkdir($gcurdir . "/uploaded/" . $_SESSION["phone"], 0777);
} */
