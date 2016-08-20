<?php

$search = $_POST['search'];
$like = new display('specifications');
$count=0;
if (!empty($search)) {
    $ser = $like->search($search);
    foreach ($ser as $value) {
        echo "  
       <ul class='list list-unstyled'>
       <a href='?page=specifications/specifications.php&&id={$value['id']}'>
        <li>{$value['name']}</li></a>
       </ul>";
        $count+=1;
        if($count == 10){
            break;
        }
    }
} else {
    die();
}
?>
