<?php

include '../include/autoloader.php';

$obj=new display('comments');
 $xz=$obj->extra("select count(id)  from comments");
    if(!isset($_GET['by']))
    $by='comments.id';
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
$show_review = $obj->pagination('','',$_GET['page_no'],' inner join specifications
on specifications.id=comments.phone_id',$perpage,$or,'comments.id,comments.date,comments.username,specifications.name,comments.comment','');

$rows = $xz[0]['count(id)'];


if ($rows % $perpage != 0)
    $noOfpages = (int) (($rows / $perpage) + 1);
else {
    $noOfpages = (int) (($rows / $perpage));
}

if (isset($_GET['action'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        $obj_delt = new delete('comments');
        if ($obj_delt->delete_data_id($id, 'id') == FALSE) {
            echo 'review is deleted successfully';
            echo "<meta http-equiv='refresh' content='2; "
            . "url=http://localhost/app/app1/?page=product_review' />";
        }
    }
} else {
    include 'views/v_pro_review.php';
}
