<?php

$product_id = filter_input(INPUT_POST, 'phone_id', FILTER_SANITIZE_NUMBER_INT);
$rate = new display('rating');
if (isset($_SESSION['username'])) {
    $user_to_rate = $_SESSION['username'];
    $user_rate_1product = $rate->limt_user_rate($product_id, $user_to_rate);
    $add_vote['phone_id'] = $product_id;
    $add_vote['vote'] = filter_input(INPUT_POST, 'click_num', FILTER_SANITIZE_NUMBER_INT);
    $add_vote['username'] = $_SESSION['username'];
    if ($user_rate_1product == 0) {
        $add = new add($add_vote, 'rating');
    } else {
        echo "<h5>you already rating</h5>";
    }
}
?>