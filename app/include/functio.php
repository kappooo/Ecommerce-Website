<?php

//start header
session_start();
//session_destroy();
//destory selection criteria

if (!isset($_GET['page']) || (isset($_GET['page']) && ( $_GET['page'] != 'cat.php') || $_GET['page'] != 'results.php' ) || $_GET['page'] != 'offers.php') {
    unset($_SESSION['extra']);
    unset($_SESSION['order']);
    unset($_SESSION['min']);
    unset($_SESSION['max']);
}
if (isset($_POST['clear'])) {
    unset($_SESSION['extra']);
    unset($_SESSION['order']);
    unset($_SESSION['min']);
    unset($_SESSION['max']);
    unset($_SESSION['perpage']);
}
try {

    include_once 'autoloader.php';
    $data = new display('main_settings');
    $site_info = $data->get_data();

    $data_section = new display('sections');
    $sections = $data_section->get_data_section();

    for ($i = 0; $i < count($sections); $i++) {
        $id = $sections[$i]['id'];
        $data_page = new display('pages');

        $pages[$i] = $data_page->get_all_data($id, 'section_id');
//echo count($pages[$i]);
        for ($j = 0; $j < count($pages[$i]); $j++) {
            $pages[$i][$j]['page_name'];
        }
    }

    //end header 
    $projects = new display('pages');
    $pages_for_projects = $projects->get_all_data(4, 'section_id');
    for ($i = 0; $i < count($pages_for_projects); $i++) {
        
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}
$general = new display('pages');
$general_pages = $general->get_data_array();
$id = @$_GET['id'];
$pages_of_section = $data_page->get_all_data($id);

//start function for get all products to home page
$products = new display('specifications');
$all_products = $products->random_sel();
//start function for get all products to home page
// get all slide to home page
$slide = new display('banners');
$all_slides = $slide->get_all_data_by_type('slider');

// get all slide to home page
//sending email
function email() {
    if (isset($_POST['submit']) && $_POST['submit'] == 'Sending') {
        $to = 'mosae35@yahoo.com';
        echo$subject = $_POST['subject'];
        echo $from = $_POST['email'];
        echo $message = $_POST['message'];

        $send = mail('mosae4050@gmail.com', $_POST['subject'], $_POST['message'], 'from:' . $from);
        if ($send) {
            echo "<h3 class='text-center '> ok </h3>";
        } else {
            echo "<h2 class='text-center '> your message not send </h2>";
        }
    }
}

//end sending mail
///////////////////////////////////////////////////////////////////////////////
//sart mobile specification function get by id

$id = @$_GET['id'];
$product = new display('specifications');
$product_specific = $product->get_data_by_id($id);

//end specification function get by id
//////////////////////////////////////////////////////////////////////////////////////////////////////////
// start checkout functions

@$id = $_GET['id'];
$pro = new display('specifications');
$product_checkout = $pro->get_data_by_id($id);

if (isset($_GET['add'])) {
    @$id = $_GET['id'];
    $pro = new display('specifications');
    $add_id = $pro->get_data_by_id($id);
    if ($add_id['product_quantity'] != @$_SESSION['product' . $add_id['id']]) {
        @$_SESSION['product' . $add_id['id']]+=1;
    } else {
        $message = '<h3 class="btn-danger text-center" style="color: #FFF;'
                . 'background-color: rgb(230, 121, 119);padding:15px 15px 15px 15px;'
                . 'border: 2px solid #985252;"> we have only '
                . $add_id['product_quantity'] .
                ' Pieces of ' . ($add_id['name']) . ' avaliable  </h3>';
    }
} elseif (@$_GET['remove']) {
    @$id = $_GET['id'];
    $pro = new display('specifications');
    $remove_id = $pro->get_data_by_id($id);
    @$_SESSION['product' . $remove_id['id']] --;
    if ($_SESSION['product' . $remove_id['id']] < 1) {
        $_SESSION['product' . $remove_id['id']] = 0;
    }
} elseif (@$_GET['delete']) {
    @$id = $_GET['id'];
    $pro = new display('specifications');
    $delete_id = $pro->get_data_by_id($id);
    $_SESSION['product' . $delete_id['id']] = 0;
}
//end checkout functions
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//function register
if (@$_POST['submit'] && $_POST['submit'] == 'Sign Up') {

    $valid_regis = new validation();
    $user7['fristname'] = filter_input(INPUT_POST, 'fristname', FILTER_SANITIZE_STRING);
    $user7['birthday'] = filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_NUMBER_INT);
    $user7['telephone'] = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_NUMBER_INT);
    $user7['username'] = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $user7['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $user7['password'] = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_ENCODED);
    $user7['city'] = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $user7['address'] = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_ENCODED);
    //return(filter_var('bob@example.com', FILTER_VALIDATE_EMAIL));
    $rule3 = array(
        'fristname' => 'check_required|check_string',
        'birthday' => 'check_required',
        'telephone' => 'check_required',
        'username' => 'check_required|check_string',
        'password' => 'check_required',
        'city' => 'check_required|check_string',
        'address' => 'check_required|check_string',
        'email' => 'check_required'
    );

    if ($valid_regis->validate($user7, $rule3)) {
        new register_user($user7);
    } 
}
//end register
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//function login
if (@$_POST['submit'] && $_POST['submit'] == 'Sign In') {
    $valid = new validation();
    $user1['username'] = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $user1['password'] = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_ENCODED);
    $rule2 = array(
        'username' => 'check_required|check_string',
        'password' => 'check_required'
    );
    if ($valid->validate($user1, $rule2)) {

        $login = new login($user1, 'user_in_site');
        if ($login->get_data() == 1) {
            $_SESSION['username'] = $user1['username'];
            $source = filter_input(INPUT_GET, 'source', FILTER_SANITIZE_STRING);

            $_SESSION['message'] = "<h5 class='msg_login' style='margin:20px auto'> " . "<span class='fa_warning'> <i style='color:green' "
                    . "class='fa fa-check-circle'></i> </span>"
                    . " Correct You will Redirct to last page after afew seconds <h5>";


            if ($source == 'home') {
                echo " <meta http-equiv='refresh' content='5; "
                . "url=http://localhost/app/' />";
            } elseif ($source == 'rating') {
                echo " <meta http-equiv='refresh' content='5; "
                . "url=http://localhost/app//?page=specifications/specifications.php&&id=$id/' />";
            } elseif ($source == 'post') {
                echo " <meta http-equiv='refresh' content='5; "
                . "url=http://localhost/app//?page=specifications/comments.php&&id=$id/' />";
            } elseif ($source == 'specifications') {
                echo " <meta http-equiv='refresh' content='5; "
                . "url=http://localhost/app//?page=check_out.php&&id=$id/' />";
            }
            // header("location:index.php");
        } else {
            $_SESSION['message'] = "<h5 class=' msg_login ' style='margin:20px auto;'> "
                    . "<span class='fa_warning'> <li class='fa fa-warning'></li> </span>"
                    . "Your username or password is invalid please try again"
                    . " </h5>";
        }
    }
    $user_name = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $obj_dlt = new delete('user_cart');
    $obj_dlt->delete_username_qountity($user_name);
}
//end login
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//edti account info
$name = @$_SESSION['username'];
$acount = new display('user_in_site');
$user_cart = new display('user_cart');
$user_rating = new display('rating');
$user_comment = new display('comments');
$user_client_say = new display('client_say');
$user_wishlist = new display('wish_list');
$user_profil_img = new display('profile_img');
$user_payment = new display('payments');
$img_folder = new display('profile_img');


// the id of user to make edit        
$user_cart_id = $user_cart->by_category($name, 'username');
$user_rate_id = $user_rating->by_category($name, 'username');
$user_comment_id = $user_comment->by_category($name, 'username');
$user_client_say_id = $user_client_say->by_category($name, 'username');
$user_wishlist_id = $user_wishlist->by_category($name, 'username');
$user_profil_img_id = $user_profil_img->by_category($name, 'username');
$user_payment_id = $user_payment->by_category($name, 'username');
$path_img = $img_folder->by_category($name, 'username');
//echo $path_img[0]['img'];
// end the id of user to make edit

$account_setting = $acount->by_username($name);
if (@isset($_POST['submit']) and $_POST['submit'] == "Done") {
    $old_dir = 'app1/resources/upload/profile_img/' . $account_setting['username'];
    $new_dir = 'app1/resources/upload/profile_img/' . filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    @rename($old_dir, $new_dir);
    //edite the username in path profile img
    $old_path = explode('/', $path_img[0]['img']);
    $old_path[4] = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $new_name['img'] = implode('/', $old_path);
    // end edite the username in path profile img
    $id = $account_setting['id'];
    // update username in user cart
    $user_cart_edit['username'] = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    //end update username in user cart

    $da_to_edit['fristname'] = filter_input(INPUT_POST, 'fristname', FILTER_SANITIZE_STRING);
    $da_to_edit['telephone'] = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_NUMBER_INT);
    $da_to_edit['birthday'] = filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_NUMBER_INT);
    $da_to_edit['address'] = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $da_to_edit['city'] = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $da_to_edit['username'] = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $da_to_edit['password'] = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_NUMBER_INT);
    $da_to_edit['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    $users_in_site = $acount->count_user_in_site($user_cart_edit['username'], 'username');

    if ($users_in_site == 0) {
        $updat = new update('user_in_site', $da_to_edit, $id);
        for ($y = 0; $y < count($user_cart_id); $y++) {
            new update('user_cart', $user_cart_edit, $user_cart_id[$y]['id']);
        }
        for ($r = 0; $r < count($user_rate_id); $r++) {
            new update('rating', $user_cart_edit, $user_rate_id[$r]['id']);
        }
        for ($c = 0; $c < count($user_comment_id); $c++) {
            new update('comments', $user_cart_edit, $user_comment_id[$c]['id']);
        }
        for ($cl = 0; $cl < count($user_client_say_id); $cl++) {
            new update('client_say', $user_cart_edit, $user_client_say_id[$cl]['id']);
        }
        for ($w = 0; $w < count($user_wishlist_id); $w++) {
            new update('wish_list', $user_cart_edit, $user_wishlist_id[$w]['id']);
        }
        for ($p = 0; $p < count($user_profil_img_id); $p++) {
            new update('profile_img', $user_cart_edit, $user_profil_img_id[$p]['id']);
        }
        for ($pm = 0; $pm < count($user_payment_id); $pm++) {
            new update('payments', $user_cart_edit, $user_payment_id[$pm]['id']);
        }
        for ($n = 0; $n < count($path_img); $n++) {
            new update('profile_img', $new_name, $path_img[$n]['id']);
        }

        echo ' <meta http-equiv="Refresh" content="3">';
        if ($updat == TRUE) {
            unset($_SESSION['username']);
            $_SESSION['username'] = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            echo $mes = '<h4 class="text-center" style="color:#231212;'
            . 'padding:15px 15px 15px 15px; border:1px solid #E3E3E3; margin:0 auto; width:805px;'
            . 'margin-top:73px; margin-bottom:-50px;position: relative; rigt:20px; top: 51px;">'
            . 'Your Info Is Updated Successfully Wait...</h4>'
            . '<li style="color:green;position: absolute; top:57px; left:317px;"class=" fa fa-check-square fa-3x"></li>';
        }
    } else {

        $without_username['fristname'] = filter_input(INPUT_POST, 'fristname', FILTER_SANITIZE_STRING);
        $without_username['telephone'] = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_NUMBER_INT);
        $without_username['birthday'] = filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_NUMBER_INT);
        $without_username['address'] = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $without_username['city'] = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $without_username['password'] = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_NUMBER_INT);
        $without_username['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $updat = new update('user_in_site', $without_username, $id);
        echo '<h4 class="text-center" style="color:#231212;'
        . 'border:1px solid #E3E3E3; margin:0 auto; width:739px;'
        . 'position: relative;top: 67px; padding: 14px;margin-top:60px;margin-bottom:-31px;">'
        . '<li style="color:#C12E2A;position: absolute; top:6px; left:52px;" '
        . 'class="fa fa-exclamation-triangle fa-2x"></li>'
        . 'Username Not Changed OR A pre-existing Info Is Updated'
        . '</h4>';
        echo ' <meta http-equiv="Refresh" content="3">';
    }
}
//end edit
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//add_pages
$add_pa = new display('pages');
$add_page = $add_pa->get_data_array();

//categories
$casts = new display('categorey');
$catsArr = $casts->get_data_array();
//end_add_pages
//////////////////////////////////////////////////////////////////////////////////////////////////////////
// ctegory page
if (isset($_GET['cat_id']) && $_GET['page'] = 'cat.php') {
    $category_id = $_GET['cat_id'];

    if (!is_int($category_id)) {
        $category_id = (int) $category_id;
        if ($category_id == 0)
            $category_id = 1;
    }


    $disp = new display("specifications");
    $x = $disp->get_company($category_id, "cat_id");





    $catName = new display("categorey");
    $data = $catName->by_category($category_id, 'cat_id');

    if (!empty($data)) {
        $Name = $data[0]['cat_name'];
        $photo = $data[0]['cat_img'];
    }
}
//start slide for category page

if (isset($_GET['type'])) {
    $name1 = $_GET['type'];
    $com_slid = new display('company_slides');
    $category = new display('specifications');
    $cat_page = $category->by_category($name1, 'type');
    $slid_com = $com_slid->by_category($name1, 'cmpany_name');
}
//end slide for category page 
// end category 
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//start number of items inshoping cart
$item1 = 0;
foreach ($_SESSION as $key1 => $value1) {
    if (!is_array($value1) && substr($key1, 0, 7) == 'product')
        $item1+=$value1;
}
//end number of items inshoping cart
//////////////////////////////////////////////////////////////////////////////////////////////////////////   
// function to store shoping cart for user
if (isset($_GET['page'])and ! isset($_SESSION['username']) and $_GET['page'] == 'check_out.php') {
    header("location:index.php?page=login.php&source=specifications&id=$id");
} else {
    if (isset($_GET['id'])and isset($_GET['page']) and $_GET['page'] == 'check_out.php') {
        $cart_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $sh_cart = new display('specifications');
        $cart = $sh_cart->get_data_by_id($cart_id);
        $arr_cart['phone_id'] = $cart_id;
        $arr_cart['quantity'] = @$_SESSION['product' . $cart_id];
        $arr_cart['username'] = $_SESSION['username'];
        $arr_cart['product_name'] = $cart['name'];
        $arr_cart['status'] = 'new';
        $arr_cart['color'] = 'black';
        $arr_cart['storage'] = $cart['memory'];
        $arr_cart['company'] = $cart['type'];
        $arr_cart['product_image'] = $cart['image'];
        if ($cart['sale'] > 0)
            $arr_cart['product_price'] = (round($cart['price'] - ($cart['price'] / $cart['sale'])));
        else
            $arr_cart['product_price'] = $cart['price'];



        $username = $_SESSION['username'];

        $cou = new display('user_cart');
        $coun_num = $cou->count_name($cart['name']);

        $num = 0;
        for ($n = 0; $n < count($coun_num); $n++) {

            if (isset($_GET['delete']) and $coun_num[$n]['username'] == $_SESSION['username']) {
                $del_id = $coun_num[$n]['id'];
                $del_cart = new delete('user_cart');
                $del_cart->delete_by_id($del_id, 'id');
            }
            if (isset($_GET['remove'])and $coun_num[$n]['username'] == $_SESSION['username']or
                    isset($_GET['add'])and $coun_num[$n]['username'] == $_SESSION['username']) {
                new update('user_cart', $arr_cart, $coun_num[$n]['id']);
            }

            if ($coun_num[$n]['username'] == $_SESSION['username']) {
                $num+=1;
            }
        }
        if ($num == 0) {
            new add($arr_cart, 'user_cart');
        }
    }
}
$username = @$_SESSION['username'];
$limet = new display('user_cart');
$limet2 = $limet->by_category($username, 'username');
for ($z = 0; $z < count($limet2); $z++) {
    $_SESSION['product' . $limet2[$z]['phone_id']] = $limet2[$z]['quantity'];
}
//end function to store shoping cart for user
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//start search nav_bar
if (isset($_POST['submit']) && $_POST['submit'] == 'search') {
    $result_nav_bar = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
    header("location:?page=results.php&&key=$result_nav_bar&searno=1");
}
//end search nav_bar
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//start rating system
$rating = new display('rating');
$phone_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if ((isset($_POST['submit']) && $_POST['submit'] == 'Add This Rate') && !isset($_SESSION['username'])) {
    header("location:?page=login.php&source=rating&id=$phone_id");
} elseif ((isset($_POST['submit']) && $_POST['submit'] == 'Add This Rate') && isset($_SESSION['username'])) {
    header("location:index.php?page=specifications/thanks_rating.php&id=$phone_id");
}

$get_rating = $rating->rating($phone_id);
$user_rate = $rating->user_rating($phone_id);
if (isset($_SESSION['username'])) {
    $user_to_rate = $_SESSION['username'];
    $my_rating = $rating->get_rating_info($phone_id, $user_to_rate);
    $count_user = $rating->limt_user_rate($phone_id, $user_to_rate);
}
//END rating system
//////////////////////////////////////////////////////////////////////////////////////////////////////////
// START cart in address page
if (isset($_SESSION['username'])) {
    $user_name = $_SESSION['username'];
    $cart_object = new display('user_cart');
    $cart_address = $cart_object->user_cart($user_name);
    $address = new display('user_in_site');
    $address_info = $address->by_username($user_name);
}
if (isset($_POST['submit']) && $_POST['submit'] == 'Edit') {
    $address_edit['fristname'] = filter_input(INPUT_POST, 'fristname', FILTER_SANITIZE_STRING);
    $address_edit['telephone'] = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_NUMBER_INT);
    $address_edit['address'] = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $address_edit['city'] = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $address_edit['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    new update('user_in_site', $address_edit, $address_info['id']);
    echo ' <meta http-equiv="Refresh" content="3">';
}
// END cart in address page
//////////////////////////////////////////////////////////////////////////////////////////////////////////
// start adding post here
if (isset($_POST['submit']) && $_POST['submit'] == 'POST') {
    $add_post['username'] = $_SESSION['username'];
    $add_post['comment'] = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
    $add_post['phone_id'] = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    // $rule5 = array(
    //      'comment' => 'check_required',
    //  );
    //  $comment_validate = new validation($add_post,$rule5);
    if (new add($add_post, 'comments') == TRUE) {
        $_SESSION['message'] = '<h3 style="margin-bottom:50px;" class="msg_post">your comment is add successfuly</h3>';
    }
}
$post_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$comment = new display('comments');
$post = $comment->get_all_data($post_id, 'phone_id', ' order by id desc limit 10');
if (isset($_POST['submit']) && $_POST['submit'] == 'SEARCH OPINIONS') {
    $user_post = filter_input(INPUT_POST, 'my_comment', FILTER_SANITIZE_STRING);
    $user_posts = $comment->get_comments($post_id, $user_post);
}
// END adding post here
//////////////////////////////////////////////////////////////////////////////////////////////////////////
// start upload profile image 
if (isset($_POST['submit']) && $_POST['submit'] == 'update profile picture') {
    $file_name = $_SESSION['username'];
    @mkdir('app1/resources/upload/profile_img/' . $file_name);
    if (isset($_SESSION['username'])) {
        $obj_count_user = new display('profile_img');
        $user_profile = $obj_count_user->count_user_in_site($_SESSION['username'], 'username');
        $profile_id = $obj_count_user->by_username($_SESSION['username']);
    }
    if (!empty($_FILES['image']['name'][0])) {
        $file = $_FILES['image'];
        $allowed_exten = array('png', 'jpg', 'gif');
        $max_size = 4000000;
        $upload_dir = "app1/resources/upload/profile_img/" . $file_name . "/";
        $upload = new upload($file, $max_size, $allowed_exten, $upload_dir);
        if ($upload->upload_file() == FALSE) {
            $profile_img['img'] = $upload_dir . $upload->get_file_url();
            $profile_img['username'] = $_SESSION['username'];
            if ($user_profile == 0) {
                $pro_img = new add($profile_img, 'profile_img');
                echo'
            <h4 class = "text-center" style = "color:#231212;'
                . 'border:1px solid #E3E3E3; margin:0 auto; width:560px;'
                . 'position: relative;top:45px; padding: 14px;margin-top:57px;margin-bottom:-54px;">'
                . '<li style = "color:green;position: absolute; top:6px; left:52px;" '
                . 'class = "fa fa-check-square fa-2x"></li>'
                . 'Profile Picture Updated Successfuly '
                . '<i class="fa fa-spinner fa-pulse fa-1x fa-fw margin-bottom"></i>
                    <span class="sr-only">Loading...</span>'
                . '</h4>';
                echo " <meta http-equiv='refresh' content='3; "
                . "url=http://localhost/app/?page=my_account.php' />";
            } else {
                $upd_pro_pic['img'] = $upload_dir . $upload->get_file_url();
                new update('profile_img', $upd_pro_pic, $profile_id['id']);
                echo'
            <h4 class = "text-center" style = "color:#231212;'
                . 'border:1px solid #E3E3E3; margin:0 auto; width:560px;'
                . 'position: relative;top: 45px; padding: 14px;margin-top:57px;margin-bottom:-54px;">'
                . '<li style = "color:green;position: absolute; top:6px; left:52px;" '
                . 'class = "fa fa-check-square fa-2x"></li>'
                . 'Profile Picture Updated Successfuly '
                . '<i class="fa fa-spinner fa-pulse fa-1x fa-fw margin-bottom"></i>
<span class="sr-only">Loading...</span>'
                . '</h4>';
                echo " <meta http-equiv='refresh' content='3; "
                . "url=http://localhost/app/?page=my_account.php' />";
            }
        } else {
            echo '<h4 class="text-center" style="color:#231212;'
            . 'border:1px solid #E3E3E3; margin:0 auto; width:560px;'
            . 'position: relative;top: 45px; padding: 14px;margin-top:57px;margin-bottom:-54px;">'
            . '<li style="color:#C12E2A;position: absolute; top:6px; left:52px;" '
            . 'class="fa fa-exclamation-triangle fa-2x"></li>'
            . 'Profile Picture Not Updated Please Try Later'
            . '</h4>';
        }
    } else {
        if ($user_profile == 0) {
            $default_img = "app1/resources/upload/profile_img/anonymous.png";
            $pro_img = new add($default_img, 'profile_img');
            echo'
            <h4 class = "text-center" style = "color:#231212;'
            . 'border:1px solid #E3E3E3; margin:0 auto; width:560px;'
            . 'position: relative;top: 45px; padding: 14px;margin-top:57px;margin-bottom:-54px;">'
            . '<li style = "color:green;position: absolute; top:6px; left:52px;" '
            . 'class = "fa fa-check-square fa-2x"></li>'
            . 'No picture selected pleease try again '
            . '</h4>';
            echo " <meta http-equiv='refresh' content='3; "
            . "url=http://localhost/app/?page=my_account.php' />";
        } else {
            $upd_def_pic['img'] = "app1/resources/upload/profile_img/anonymous.png";
            new update('profile_img', $upd_def_pic, $profile_id['id']);
            echo'
            <h4 class = "text-center" style = "color:#231212;'
            . 'border:1px solid #E3E3E3; margin:0 auto; width:560px;'
            . 'position: relative;top: 45px; padding: 14px;margin-top:57px;margin-bottom:-54px;">'
            . '<li style = "color:green;position: absolute; top:6px; left:52px;" '
            . 'class = "fa fa-check-square fa-2x"></li>'
            . 'No Picture Selected Pleease Try Again '
            . '</h4>';
            echo " <meta http-equiv='refresh' content='3; "
            . "url=http://localhost/app/?page=my_account.php' />";
        }
    }
}
if (isset($_SESSION['username'])) {
    $obj_pro_img = new display('profile_img');
    $img = $obj_pro_img->by_name($_SESSION['username'], 'username');
}
if (isset($_GET['update']) && isset($_SESSION['username'])) {
    $obj_get_id = new display('profile_img');
    $id_to_upd = $obj_get_id->by_username($_SESSION['username']);
    $name = filter_input(INPUT_GET, 'update', FILTER_SANITIZE_STRING);
    $upd_my_pic['img'] = "app1/resources/upload/profile_img/{$_SESSION['username']}/$name";
    new update('profile_img', $upd_my_pic, $id_to_upd['id']);
    echo'
            <h4 class = "text-center" style = "color:#231212;'
    . 'border:1px solid #E3E3E3; margin:0 auto; width:560px;'
    . 'position: relative;top: 45px; padding: 14px;margin-top:57px;margin-bottom:-54px;">'
    . '<li style = "color:green;position: absolute; top:6px; left:52px;" '
    . 'class = "fa fa-check-square fa-2x"></li>'
    . 'Profile Picture Updated Successfuly Wait '
    . '<i class="fa fa-spinner fa-pulse fa-1x fa-fw margin-bottom"></i>
       <span class="sr-only">Loading...</span>'
    . '</h4>';
    echo " <meta http-equiv='refresh' content='3; "
    . "url=http://localhost/app/?page=my_account.php' />";
}
// end upload profile image
// 
// remove from database when remove///////////////////////////////////////////////////////
if (isset($_GET['remove']) && isset($_SESSION['username'])) {
    $obj_del_pro = new delete('user_cart');
    $delet_cart = $obj_del_pro->delete_username_qountity($_SESSION['username']);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////// start insert email messages in database////////////////////////////

if (isset($_POST['submit']) && $_POST['submit'] == 'Sending') {
    $mail_msg['user_mail'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mail_msg['msg_subject'] = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $mail_msg['message'] = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    new add($mail_msg, 'mail');
}

//////////////////////////////// end insert email messages in database////////////////////////////
?>
