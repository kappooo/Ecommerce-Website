<?php
$search = $_POST['mosa'];
$like = new display('specifications');
$count=0;
if (!empty($search)) {
    $ser = $like->search($search);
    foreach ($ser as $value) {
        echo "  
       <ul class='list list-unstyled'>
       <a href=''>
        <li>{$value['name']}</li></a>
       </ul>";
    }
  
} else {
    die();
}
?>