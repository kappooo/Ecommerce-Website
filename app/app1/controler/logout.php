<?php

@session_start();

include '../include/autoloader.php';
if (isset($_SESSION['admin'])) {
    $obj_dis_user = new display('users');
    $id_user = $obj_dis_user->by_name($_SESSION['admin'], 'username');
    $all_offline['onlin'] = 0;
    new update('users', $all_offline, $id_user['id']);
    $obj_dis_user = new display('users');
    $adm_actv = $obj_dis_user->get_actv_adm();
    if ($_SESSION['admin'] == $adm_actv[0]['username']) {
        $obj_dis_adchat1 = new delete('us_ad_chat1');
        $count_col_chat1 = $obj_dis_adchat1->delete_all();
    }
    if ($_SESSION['admin'] == $adm_actv[1]['username']) {
        $obj_dis_adchat2 = new delete('us_ad_chat2');
        $count_col_chat2 = $obj_dis_adchat2->delete_all();
    }
    //print_r($_SESSION);
    unset($_SESSION['admin']);
    //session_destroy();
    header("Location:../app1/views/login_view.php");
} else {
    echo 'not';
}
?>