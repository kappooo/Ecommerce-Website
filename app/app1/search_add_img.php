<?php

include '../include/autoloader.php';
$search = $_POST['search'];
$obj_dis = new display('specifications');
$find = $obj_dis->search($search);
if (!empty($search)) {
    $count = 0;
    foreach ($find as $value) {
        echo "  
       <ul class='list'>
       <a href='?page=product&&type=image&name={$value['name']}' id='need''>
        <li>{$value['name']}</li></a>
       </ul>";
        $count+=1;
        if ($count == 10) {
            break;
        }
    }
    echo "<div id='more'>"
    . "<a href='?page=product&&type=image&search=$search'>"
    . " FOR MORE DEVICES RESULTS <li class='fa fa-arrow-circle-right'> "
    . "</li>"
    . "</a>"
    . "</div>";
} else {
    die();
}