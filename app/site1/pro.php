<?php
if (!isset($_GET['page']) || $_GET['page'] == 'category.php')
    $cols = '3 col-md-4  col-sm-6 ';
else
    $cols = '4   col-sm-5';

echo "
                <div class='col-lg-$cols col-xs-12'>
                      <a style='text-decoration:none; background:none; ' 
                      href='?page=specifications/specifications.php&&id={$all_products[0]['id']}'>
                          <div class='product'>
                          ";
if ($all_products[0]['sale'] > 0)
    echo "
                          <li class='fa fa-bookmark fa-4x'><h4 class='sal_val'> {$all_products[0]['sale']}%</h4></li>";
echo "
                          <img src='app1/{$all_products[0]['image']}'>
                    
                        <li class='list-unstyled divider' role='separator' </li>
                        <div style='margin-bottom: 15px;'><p class='name lead'>{$all_products[0]['name']}</p></div>";

$rating = new display('rating');
$phon_id = $all_products[0]['id'];
$number = $rating->user_rating($phon_id);
$get_rating = $rating->rating($phon_id);
$vote = round($get_rating[0], 1);
if (strlen($vote) == 1) {
    for ($t = 0; $t < $vote; $t++) {
        echo'
                            <li  class = "fa fa-star" style="color:#FFAE36;"></li>';
    }
    for ($n = 0; $n < 5 - $vote; $n++) {
        echo'
                            <li class = "fa fa-star-o" style="color:#000000"></li>';
    }
    echo'<ul class="list-unstyled"><li '
    . 'style="position: relative;top: -26px;left: 85px;font-size: 17px;">'
    . '(' . $number . ')</li></ul>';
} else {
    $vote2 = intval($vote);
    for ($z = 0; $z < $vote2; $z++) {
        echo'
                            <li class ="fa fa-star" style="color:#FFAE36;"></li>';
    }
    echo'
                            <li class ="fa fa-star-half-o " style="color:#FFAE36;"></li>';

    for ($y = 0; $y < 4 - $vote2; $y++) {
        echo'
                            <li  class = "fa fa-star-o" style="color:#000000"></li>';
    }


    echo'<ul class="list-unstyled"><li '
    . 'style="position: relative;top: -28px;left: 101px;font-size: 19px;">'
    . '(' . $number . ')</li></ul>';
}


echo" 
                        <p class='center-block price'> ";
if ($all_products[0]['sale'] > 0) {
    echo "<strike>"
    . "{$all_products[0]['price']} egp"
    . "</strike></p>";

    echo '<span class="sale ">' . round($all_products[0]['price'] - ($all_products[0]['price'] / $all_products[0]['sale'])) . ""
    . " epg</span>";
} else {
    echo $all_products[0]['price'] . " epg</p>";
}
// $wish_list_id = $all_products[0]['id'];
echo "<hr><a href='?page=compare.php&id={$all_products[0]['id']}&cate_id={$all_products[0]['cat_id']}'
                            
                            class='btn btn-default'
                            data-toggle='tooltip' data-placement='left' 
                            title='ADD TO COMPARE'> <li  class='fa fa-compress fa-lg'></li>
                        </a>";

$wishlist_id = $all_products[0]['id'];
?>

<button
    id="wishlist_id"
    value="<?php echo $all_products[0]['id']; ?>"
    type="submit"
    onclick="wish_list('?page=wish_list/add_to_wishlist.php', '<?php echo $all_products[0]['id']; ?>', '#place')"
    style='margin-top: -9px; background: #C12E2A;'
    data-toggle='modal' data-target='.bs-example-modal-lg'
    class='btn btn-default  '
    data-toggle='tooltip' data-placement='left' 
    title='ADD TO WISHLIST'>
    <li class='fa fa-heart-o fa-lg'></li>
</button>


<?php
echo"
                        <a href='?page=check_out.php&id={$all_products[0]['id']}&add={$all_products[0]['id']}'
                            class='btn btn-default' style='color:#fff;'
                             data-toggle='tooltip' data-placement='left' 
                            title='ADD TO CART'> 
                            <li  class='fa fa-cart-plus fa-lg'></li>
                        </a>
                     </div></a>
                </div>";
?>