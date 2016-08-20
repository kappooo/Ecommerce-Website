<?php

include_once './include/functio.php';
if(@$_GET['page']){
    $url='site1/'.$_GET['page'];
    if(file_exists($url))
        include $url;
}else{
include 'site1/index.php';
}

?>