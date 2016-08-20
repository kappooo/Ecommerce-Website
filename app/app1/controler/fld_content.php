<?php

include '../include/autoloader.php';
if (isset($_GET['fld'])) {
    if(isset($_POST['submit'])&&$_POST['submit']=='delete'){
    $arr = $_POST['delt_img'];
    $delet_obj = new delete_files();
    if($delet_obj->delete_file($arr) == TRUE){
        echo " your file deleted ";
    }else{
        echo " faild to deleted file";
    }
}
    
    include 'views/show_pic.php';
}




?>

