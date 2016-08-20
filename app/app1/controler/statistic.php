<?php 
include '../include/autoloader.php';

$obj=new display('user_in_site');
$data['user']=$obj->countrows('1', '1');

$obj=new display('users');
$data['admin']=$obj->countrows('1', '1');

$obj=new display('payments');
$data['pay']=$obj->countrows('1', '1');


$obj=new display('specifications');
$data['products']=$obj->countrows('1', '1');

$obj=new display('categorey');
$data['cat']=$obj->extra('select count(cat_id) from categorey');

$obj=new display('pages');
$data['company']=$obj->countrows('1', '1');

$obj=new display('client_say');
$data['comments']=$obj->countrows('1', '1');

include 'views/statistics.php';


?>