<?php
include 'site1/nav_bar.php';
$cate_id = $product_specific['cat_id'];

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$obj_dis_id = new display('specifications');
$count_id = $obj_dis_id->count_id_in_site($id,'id');
if( $count_id == 0 ){
    include 'alert_page.php';
    die();
}

?>
<link href="site1/resourses/css/lightbox.min.css" rel="stylesheet">
<script src="site1/resourses/js/lightbox.min.js"></script>
<script src="site1/resourses/js/ajax2.js"></script>
<script>
    lightbox.option({
        'resizeDuration': 600,
        'wrapAround': true,
        'maxWidth':
    })
</script>

<!--<script type="text/javascript" src="site1/resourses/js/jquery-1.11.3.min.js"></script>-->


<section class="specification our_offers">
    <div class="container-fluid text-center">
        <div class="row">
           <h2 class="h2sp">
               
                pictures 
                <i class="fa fa-picture-o" aria-hidden="true"></i>
            </h2>
            
            <div class=" col-sm-3 text-center">
                
                    <?php include 'product_image.php';?>
            </div>
            <div class="col-sm-9 ">
                 <?php   
                    include 'fetures.php';?>
                <div class="gallery">
                    <?php
                    $id = $_GET['id'];
                    $mob = new display('specifications');
                    $mobil_nam = $mob->get_data_by_id($id);
                    $dir_name = $mobil_nam['name'];
                    $upload_dir = "app1/resources/upload/$dir_name/";
                    echo "<h3>$dir_name => gallery</h3><hr>";
                    if (is_dir($upload_dir)) {
                        $dir = scandir($upload_dir);
                        for ($i = 0; $i < count($dir); $i++) {
                            if ($dir[$i] == '.' or $dir[$i] == '..') {
                                //unset($dir[$i]);
                            } else {
                                $path_image = 'app1/resources/upload/' . $dir_name . '/' . $dir[$i];
                                echo "<a href='$path_image' data-lightbox='image-1' data-title='My caption'>
                                <img src='$path_image'> 
                                </a>";
                            }
                        }
                    } else {
                        echo 'this phone not have photo';
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


