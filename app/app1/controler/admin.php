<h2>Admins in stie</h2>

<?php
include '../include/autoloader.php';

$obja=new display("users");
$data=$obja->by_name($_SESSION['admin'],'username');
if($data['state']!=2)
{
    header("location:index.php");
    exit();
}



if (isset($_GET['action']) && $_GET['action'] == 'del_user') {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $delet = new delete('users');
    $del_user = $delet->delete_by_id($id);
    if ($del_user != TRUE) {
        echo ' admin is deleted successfuly';
        echo "<meta http-equiv='refresh' content='3; "
        . "url=http://localhost/app/app1/?page=admin' />";
    } else {
        echo 'there is  a problem...  admin is not deleleted';
    }
}



if (isset($_GET['action'])) {
    
    $st = $_GET['action'];
    $id = $_GET['id'];
    if ($st == "admin")
        $toupdate['state'] = 1;

    if ($st == "notadmin")
        $toupdate['state'] = 0;

    if ($st == "chat_off")
        $toupdate['use_chat'] = 0;
    $obj_dis_ad = new display('users');
    $use_chat = $obj_dis_ad->use_chat();
    if($use_chat < 2) {
        if ($st == "chat_on")
            $toupdate['use_chat'] = 1;
    }
      else
         header("location:?page=admin");

    $update = new update('users', $toupdate, $id);
}

$user_adm = new display('users');
$sel_user = $user_adm->get_data_section();

include 'views/v_admin.php';
