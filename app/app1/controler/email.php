<?php

include '../include/autoloader.php';

$obj=new display('mail');
 $xz=$obj->extra("select count(id)  from mail");
    if(!isset($_GET['by']))
    $by='id';
else {
    $by=$_GET['by'];
    }
if(!isset($_GET['s']))
    $_GET['s']='a';
if($_GET['s']=='a')
    $or="$by asc";
else {
     $or="$by desc";
}

    $perpage=10;
    if(!isset($_GET['page_no']))
         $_GET['page_no']=1;
$show_mail = $obj->pagination('1','1',$_GET['page_no'],'',$perpage,$or);

$rows = $xz[0]['count(id)'];


if ($rows % $perpage != 0)
    $noOfpages = (int) (($rows / $perpage) + 1);
else {
    $noOfpages = (int) (($rows / $perpage));
}
if (isset($_GET['action'])) {
    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $obj_delt_mail = new delete('mail');
        if ($obj_delt_mail->delete_data_id($id, 'id') == FALSE) {
            echo 'mail message is deleted successfully';
            echo "<meta http-equiv='refresh' content='2; "
            . "url=http://localhost/app/app1/?page=email' />";
        }
    }
} else {
    include 'views/v_mail.php';
}