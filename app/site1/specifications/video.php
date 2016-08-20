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
                Videos 
                <i style="color: #e62117;" class="fa fa-youtube-square" aria-hidden="true"></i>

            </h2>
            <div class="col-sm-3 text-center">
              <?php           include 'product_image.php';?>
            </div>
            <div class="col-sm-9">
                 <?php   
                    include 'fetures.php';?>
                <div class="video">
                    <h3>video <?php echo $product_specific['name']; ?> </h3><hr>
                    <?php
                    if (empty($product_specific['video'])) {
                        echo 'no video for this Product';
                    } else {
                        echo <<<EOD
                           <iframe  
                            src="{$product_specific['video']}" 
                            frameborder="0" 
                            allowfullscreen>
                           </iframe>                        
EOD;
                    }
                    ?>

                </div>
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