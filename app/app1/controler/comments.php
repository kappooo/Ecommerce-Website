<?php

include '../include/autoloader.php';


if (isset($_GET['action'])) {
    $state = $_GET['action'];
    $id = $_GET['id'];
    $no = $_GET['no'];
    if ($state == "active" && $no <= 3)
        $toupdate['active'] = 1;



    else if ($state == "deactive")
        $toupdate['active'] = 0;
    else
        header("location:?page=comments");
    $update = new update('client_say', $toupdate, $id);
}
$obj = new display("client_say");
$data = $obj->extra("select *  from client_say");
$counter = $obj->extra("select count(active)  from client_say where active=1")[0];

include 'views/v_comment.php';

if (isset($_POST['submit']) && $_POST['submit'] == 'Delete selected') {
    if (count(@$_POST['delete']) == 0) {
        echo '<h3>you dont select any item to delete</h3>';
    } else {
        $arr_delt_comm = @$_POST['delete'];
        $obj_de = new delete('client_say');
        for ($i = 0; $i < count($arr_delt_comm); $i++) {
            $delt_comments = $obj_de->delete_by_id($arr_delt_comm[$i]);
        }
        echo " <meta http-equiv='refresh' content='0; "
        . "url=http://localhost/app/app1//index.php?page=comments' />";
    }
}