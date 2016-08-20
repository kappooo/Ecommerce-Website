
<?php

session_start();
include '../include/autoloader.php';
$obj_dis_user = new display('users');
$adm_actv = $obj_dis_user->get_actv_adm();
if (isset($_SESSION['admin']) && $_SESSION['admin'] == @$adm_actv[0]['username']) {
    $obj_dis_nam = new display('us_ad_chat1');
    $usr_chat = $obj_dis_nam->by_name($_SESSION['admin'], 'admin');
    
} elseif (isset($_SESSION['admin']) && $_SESSION['admin'] == @$adm_actv[1]['username']) {
    $obj_dis_nam = new display('us_ad_chat2');
    $usr_chat = $obj_dis_nam->by_name($_SESSION['admin'], 'admin');
}


if (isset($_POST['chat'])&& !empty($_POST['chat']) && count($usr_chat['admin'])!=0 ) {
    $arr_msg['message'] = $_POST['chat'];
    $arr_msg['admin'] = $_SESSION['admin'];
    $arr_msg['saying'] = 'admin';
    $arr_msg['username'] = $usr_chat['username'];
    new add($arr_msg, 'chat');
}
if (isset($_POST['chatupdat']) && isset($_SESSION['admin'])) {
    $obj_dis_mesg = new display('chat');
    $message = $obj_dis_mesg->get_message($usr_chat['username'], $_SESSION['admin']);
    foreach ($message as $key => $value) {
        if ($value['saying'] == 'admin') {


            echo<<<EOD

            <li class = "right clearfix"><span class = "chat-img pull-right">
            <img src = "resources/img/me.png" alt = "User Avatar" class = "img-circle" />
            </span>
            <div class = "chat-body clearfix">
            <div class = "header">
            <small class = " text-muted"><span class = "glyphicon glyphicon-time"></span>{$value['date']}</small>
            <strong class = "pull-right primary-font">{$_SESSION['admin']}</strong>
            </div>
            <p>
            {$value['message']}
            </p>
            </div>
            </li>

EOD;
        } else {

            echo<<<EOD

            <li class = "left clearfix"><span class = "chat-img pull-left">
            <img src = "resources/img/user.png" alt = "User Avatar" class = "img-circle" />
            </span>
            <div class = "chat-body clearfix">
            <div class = "header">
            <strong class = "primary-font">{$usr_chat['username']}</strong> <small class = "pull-right text-muted">
            <span class = "glyphicon glyphicon-time"></span> {$value['date']} </small>
            </div>
            <p>
             {$value['message']}
            </p>
            </div>
            </li>

EOD;
        }
    }
}
?>




