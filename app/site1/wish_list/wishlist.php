<?php
include 'site1/nav_bar.php';
if (isset($_GET['wish_list']) && $_GET['wish_list'] == 'delt_all') {
    $obj_del = new delete('wish_list');
    $del_all_wishlis = $obj_del->delete_by_username($_SESSION['username']);
}
if (isset($_GET['wish_list']) && $_GET['wish_list'] == 'delt_only') {
    $id_delt_wish = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $obj_delt = new delete('wish_list');
    $obj_delt->delete_by_name_id($_SESSION['username'], $id_delt_wish);
}

if (isset($_SESSION['username'])) {
    $wish_for_user = $_SESSION['username'];
    $obj_dis_spec = new display('specifications');
    $obj_wishlist = new display('wish_list');
    $pro_in_wishlist = $obj_wishlist->by_category($wish_for_user, 'username');
}
?>
<script src="site1/resourses/js/ajax2.js"></script>
<script src="site1/resourses/js/js_my_account.js"></script>
<!--//////////////////// start section  profile for user here////////////////////////////////////   -->
<section class="account">
        <div class="container-fluid">
       <?php include 'site1/profile_header.php'; ?>
    </div>
</section>

<!--//////////////////// end section  profile for user here////////////////////////////////////   -->

<!--//////////////////// start section  wish list products here////////////////////////////////////   -->
<section class="wishlist account">
  <div class="container">
    <div class="row">   
            <?php   include 'site1/account_list.php';?>
    
        <div class="col-lg-9">
            <div class="row">
            <h3 style="margin: 50px 5px 20px;font-weight: bold;"> WISH LIST CONTENT </h3>
            <?php
            if (count($pro_in_wishlist) == 0) {
                echo '<h3 class="msg_wishlis" style="top=45px"> Your Wishlist is Empty Now </h3>';
            } else {
                for ($i = 0; $i < count($pro_in_wishlist); $i++) {
                    $id_pro_wish = $pro_in_wishlist[$i]['phone_id'];
                    $prod_content = $obj_dis_spec->by_name($id_pro_wish, 'id');
                    echo<<<EOD
                    
            <div class="col-lg-4">
                   
                  <div class="wish_prod" id='wish'>
                    <button onclick="wish_list('?page=wish_list/delt_one_prod.php','{$prod_content['id']}','#place')" 
                        data-toggle="modal" data-target=".bs-example-modal-ll" 
                        class='remov_wish fa fa-times-circle-o fa-1x'> 
                    </button>
                    <a href='?page=specifications/specifications.php&id={$prod_content['id']}'>
                     <img src="app1/{$prod_content['image']}">
                     </a>
                    <h4> {$prod_content['name']} </h4>
                    <h5>{$prod_content['price']} egp</h5>
                    <a  href='?page=check_out.php&id={$prod_content['id']}&add={$prod_content['price']}' 
                        class="btn-danger fa fa-cart-plus fa-2x">
                        ADD TO CART                          
                    </a>
                    
                </div>
            </div>
                   
EOD;
                }
            }
            ?>
                </div>
            </div>
        </div>
            <div class="fott_wish">
                <hr style="clear: both;">
                <button type="button" data-toggle="modal" data-target=".bs-example-modal-lg" 
                        class="btn-primary fa fa-trash fa-3x"> 
                    Clear My Wishlist 
                </button>
                <a href="index.php" class="btn-warning fa fa-backward"> Back To Shoping</a>
            </div>
        </div>
 
</section>

<!-- clear all wish list   -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg our_offers">
        <div class="modal-content" style="margin-top: 80px;">

            <h3 style="text-align: center; font-size: 35px; height: 56px;">
                Are You Sure To Remove All Wishlist
            </h3>
            <div class = "modal-footer" style = "clear: left;">
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">No</button>
                <a href = "?page=wish_list/wishlist.php&wish_list=delt_all"
                   class = "btn btn-danger">Yes
                </a>
            </div>
        </div>
    </div>
</div>
<!-- end clear all wish list   -->

<!-- clear one wish list product   -->
<!-- Large modal -->
<div class="modal fade bs-example-modal-ll" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg our_offers">
        <div class="modal-content" style="margin-top: 80px;" id="place">

        </div>
    </div>
</div>

<!-- end clear one wish list product   -->



<?php
include 'site1/fotter.php';
?>