<?php

if (isset($_SESSION['username'])) {
    $wish_pro_id = $_POST['phone_id'];
    $user_wishlis_name = $_SESSION['username'];
    $obj_dis = new display('wish_list');
    $limt_user_of_ins = $obj_dis->limt_user_rate($wish_pro_id, $user_wishlis_name);
    $obj_gets = new display('specifications');
    $pro_content = $obj_gets->get_data_by_id($wish_pro_id, 'id');
    if ($limt_user_of_ins == 0) {
        $wish_list['username'] = $_SESSION['username'];
        $wish_list['phone_id'] = $wish_pro_id;
        if (new add($wish_list, 'wish_list') == TRUE) {
            echo<<<EOD
        <h3>The product was added to your Wish list</h3>
        <img src="app1/{$pro_content['image']}">
        <h4>{$pro_content['name']}</h4>
        <h5> {$pro_content['price']} egp </h5>
        
EOD;
        } else {
            echo '<h3> Erorr In Add To Wishlis Please Try Later</h3>';
        }
    } else {
        echo<<<EOD
        <h3>This product is already exit in your Wish list</h3>
        <img src="app1/{$pro_content['image']}">
        <h4>{$pro_content['name']}</h4>
        <h5> {$pro_content['price']} egp </h5>
EOD;
    }
    echo<<<EOD
<div class = "modal-footer" style = "clear: left;">
    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>
    <a href = "?page=wish_list/wishlist.php"
       class = "btn btn-danger">VIEW WISH LIST
    </a>

</div>
EOD;
} else {
    echo "<h3> Please Sign In To Can Add To Your Wishlist </h3>";

    echo<<<EOD
    
    <div class = "modal-footer" style = "clear: left;">
    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>
    <a href = "?page=login.php&source=home"
       class = "btn btn-danger">Sign In
    </a>

</div>
EOD;
}
?>