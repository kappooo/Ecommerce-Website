<?php

include '../include/autoloader.php';

 $obj=new display("payments");
        $xz=$obj->extra("select distinct trans_id from payments");
        
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
$sz = $obj->pagination('1','1',$_GET['page_no'],'',$perpage,$or,'distinct trans_id ');
$rows = count($xz);

if ($rows % $perpage != 0)
    $noOfpages = (int) (($rows / $perpage) + 1);
else {
    $noOfpages = (int) (($rows / $perpage));
}
      
    include 'views/v_pay.php';