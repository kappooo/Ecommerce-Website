<?php
//print_r($_SESSION);
//include '../../include/autoloader.php';


echo '<h1>chat welcom </h1>';


if (isset($_POST['chat'])) {
   $arr_msg['message'] = $_POST['chat'];
   $arr_msg['username'] = 'mosa';
   new add($arr_msg,'chat');
}
if (isset($_POST['chatupdat']) && isset($_SESSION['username'])) {
    $obj_dis_mesg = new display('chat'); 
    $message = $obj_dis_mesg->get_message($_SESSION['username'],'username');
    foreach ($message as $key => $value) {
     echo $value['message']."<br>";   
    }
    
}
?>
