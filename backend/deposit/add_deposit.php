<?php


include '../core.php';
include '../function.php';

if ($_SESSION['userId']) {
    $date = date('Y-m-d');
    $valid = ''; //Output Value
    
    $deposit_type =  mysqli_real_escape_string($connect, $_POST['deposit_type']);

    $selectbacktxt =  mysqli_real_escape_string($connect, $_POST['selectbacktxt']);
    $selectcurrencetxt =  mysqli_real_escape_string($connect, $_POST['selectcurrencetxt']);
    $depositamttxt =  mysqli_real_escape_string($connect, $_POST['depositamttxt']);
    $platformtxt =  mysqli_real_escape_string($connect, $_POST['platformtxt']);
    $copencode_txt =  mysqli_real_escape_string($connect, $_POST['copencode_txt']);

    $newrate = get_doller_date($connect ,$date);
    //Create Folder------------------------------------
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

        //watermark add
        $watermark_image = imagecreatefrompng('itust-watermark.png');

        if ($extension == 'jpg' || $extension == 'jpeg') {
            $image = imagecreatefromjpeg($location);
        }

        if ($extension == 'png') {
            $image = imagecreatefrompng($location);
        }

        $margin_right = 10;
        $margin_bottom = 10;

        $watermark_image_width = imagesx($watermark_image);
        $watermark_image_height = imagesy($watermark_image);

        imagecopy($image, $watermark_image, imagesx($image) - $watermark_image_width - $margin_right, imagesy($image) - $watermark_image_height - $margin_bottom, 0, 0, $watermark_image_width, $watermark_image_height);

        imagejpeg($image, $location);
        imagedestroy($image);
        $userid = convert_string('decrypt', $_SESSION['userId']);
        $name = $_SESSION['Uname'];

        $transaction_id = time();

        $doller_amt = calculate_amt($depositamttxt , $newrate);
        $tans_date = date('Y-m-d H:i:s');
        $get_arr = is_subcriptionaccount($connect , $userid);
        $user_subcription = $get_arr[0];
        if($copencode_txt == ''){
            $copencode_txt = 0;
        }
        $query = "INSERT INTO `deposit_doller` (`id`, `userid`, `name`, `tran_id`, `lkramt`, `dolleramt`, `adminid`, `adminname`, `message`, `image`, `up_date`, `partnercode`, `status`, `subscription`) VALUES 
        (NULL, '$userid', '$name', '$transaction_id', '$depositamttxt', '$doller_amt', NULL, NULL, NULL, '$location', '$tans_date', '$copencode_txt', '0', '$user_subcription');";
        
        $result = $connect->query($query);
        if (($result) === TRUE) { 
            //This part for the add commeshion
            
            //End Commeshion
            $valid = 'Done';
        }else{
            $valid = 'Error';
        }
    }
    //INSERT INTO `warrning_tbl` (`id`, `user_id`, `name`, `message`, `date`, `status`) VALUES (NULL, '1', 'name', 'message', '2022-12-04 18:23:54', '0');
    /* $query = "";
    if ($connect->query($query) === TRUE) {

    } */
}

function get_doller_date($connect ,$date){
    $rate = 0;
    $mainSql = ("SELECT * FROM `doller_rate` ORDER BY `doller_rate`.`id` DESC LIMIT 1; ");
    $mainResult = $connect->query($mainSql);
    if ($mainResult->num_rows == 1) {
        $value = $mainResult->fetch_assoc();
        $rate = $value['rate'];
    }
    return $rate;

}

function calculate_amt($amt , $rate){
    $result = $amt / $rate;
    $result = round($result,2);
    return $result;
}
function is_subcriptionaccount($connect, $userid){
    $mainSql = "SELECT * FROM users WHERE `user_id` = '$userid'";
    $mainResult = mysqli_query($connect, $mainSql);
    if (mysqli_num_rows($mainResult) == 1) {
        $value = mysqli_fetch_assoc($mainResult);
        $subscription = $value['subcription'];
    }
    return [$subscription];
}
$connect->close();

echo ($valid);