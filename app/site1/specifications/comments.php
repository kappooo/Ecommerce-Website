<?php
include 'site1/nav_bar.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$obj_dis_id = new display('specifications');
$count_id = $obj_dis_id->count_id_in_site($id,'id');
if( $count_id == 0 ){
    include 'alert_page.php';
    die();
}


$cate_id = $product_specific['cat_id'];
?>
<script src="site1/resourses/js/ajax2.js"></script>
<section class="specification our_offers">
    <div class="container-fluid text-center">
        <div class="row">
            <h2 class="h2sp">
                Comments 
                <i class="fa fa-comments" aria-hidden="true"></i>

            </h2>
         
            <div class="col-sm-3">
                <?PHP include 'product_image.php';?>
            </div>
        <div class="col-sm-9">
              <?php   
                    include 'fetures.php';?>
            
            <?php  include 'opinion.php';?>
        </div>
        </div>
    </div>
</section>

<!-- //////////////////////  this  div for wish list ////////////////////////////////////////  -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg our_offers text-center" style="margin-top: 85px;">
        <div class="modal-content" id="place">

        </div>
    </div>
</div>
<!-- ////////////////////// end this  div for wish list ////////////////////////////////////////  -->


<?php
include 'site1/fotter.php';
?>