<?php
$cat_id_2 = $_POST['cat_id_2'];
$id_1 = $_POST['id_1'];
$id_2 = $_POST['id_2'];
$id_3 = $_POST['id_3'];

$search = $_POST['search'];
$like = new display('specifications');
$count = 0;
if (!empty($search)) {
    $ser = $like->search_by_cat_id($search,$cat_id_2);
    foreach ($ser as $value) {
        echo "  
       <ul class='list list-unstyled'>
       <a href='?page=compare.php&id=$id_1&id2={$value['id']}&id3=$id_3&cate_id=$cat_id_2'>
        <li class='ser'>
          <span class='name'>{$value['name']}</span><img src='app1/{$value['image']}'>
        </li></a>
       </ul>";
        $count+=1;
        if ($count == 5) {
            break;
        }
    }
    echo "<div id='more'>"
    . "<a href='?page=compare.php&id=$id_1&id2=$id_2&id3=$id_3&search_2=$search&cate_id=$cat_id_2'> "
            . "FOR MORE DEVICES RESULTS <li class='fa fa-arrow-circle-right'> "
            . "</li>"
            . "</a>"
    . "</div>";
} else {

    die();
}
?>