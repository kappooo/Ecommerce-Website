
<?php
include 'site1/nav_bar.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$obj_dis_id = new display('specifications');
$count_id = $obj_dis_id->count_id_in_site($id, 'id');
if ($count_id == 0) {
    include 'alert_page.php';
    die();
}

$cate_id = $product_specific['cat_id'];
?>



<script type="text/javascript">
    $(document).ready(function () {
        $('#pic').click(function () {
            var inf = {id: 10};
            $('#replace').load('index.php?page=picture.php', inf);
        });
    });

</script>

<section class="specification our_offers">
    <div class="container-fluid text-center">
        <div class="row">
            <h2 class="h2sp">
                Specifications 
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>

            </h2>
          
            <div class="col-sm-3 text-center">

                <?php include 'product_image.php'; ?>                

            </div>
            <div class="col-sm-9">
                  <?php include 'fetures.php'; ?>

                <div class="table1" id='replace'>
                    <?php if ($product_specific['cat_id'] == 1 or $product_specific['cat_id'] == 3) { ?>
                        <table  class="table  table-striped table-hover table-bordered ">
                            <tr style="text-align: center;">

                                <td id="d">Technology</td>
                                <td id="spec">specification</td>
                            </tr>  

                            <tr>
                                <th>Network</th>
                                <?php
                                echo "<td>{$product_specific['network']}</td>";
                                ?>
                            </tr>

                            <tr>
                                <th>Launch</th>
                                <?php echo "<td>{$product_specific['launch']}</td>"; ?>
                            </tr>
                            <?php
                            $net = explode("_", $product_specific['body']);
                            ?>

                            <tr>
                                <th>Body</th>
                                <?php echo "<td>{$product_specific['body']}</td>"; ?>
                            </tr>

                            <tr>
                                <th>Display</th>
                                <?php echo "<td>{$product_specific['display']}</td>"; ?>
                            </tr>

                            <tr>
                                <th>Platform</th>
                                <?php echo "<td>{$product_specific['platform']}</td>"; ?>
                            </tr>

                            <tr>
                                <th>Memory</th>
                                <?php echo "<td>{$product_specific['memory']}</td>"; ?>
                            </tr>

                            <tr>
                                <th>Camera</th>
                                <?php echo "<td>{$product_specific['camera']}</td>"; ?>
                            </tr>

                            <tr>
                                <th>Sound</th>
                                <?php echo "<td>{$product_specific['sound']}</td>"; ?>
                            </tr>

                            <tr>
                                <th>Comms</th>
                                <?php echo "<td>{$product_specific['comms']}</td>"; ?>
                            </tr>

                            <tr>
                                <th>Battery</th>
                                <?php echo "<td>{$product_specific['battery']}</td>"; ?>
                            </tr>

                            <tr>
                                <th>Features</th>
                                <?php echo "<td>{$product_specific['features']}</td>"; ?>
                            </tr>  

                        </table>
                        <?php
                    } elseif ($product_specific['cat_id'] == 2) {
                        include 'specfication_laptop.php';
                    } else {
                        include 'specification_other.php';
                    }
                    ?>

                </div>
            </div>
           
        
            <?php
            if($product_specific['cat_id']=='1'||$product_specific['cat_id']=='2'||$product_specific['cat_id']=='3')
                $ex='';
            else
                $ex='';
                echo '<div class="'.$ex.'  col-md-9">  '
            . '  <h3 class="cust_rev_title"> Customer Reviews </h3>';
            include 'opinion.php';
            echo '</div>';

            include 'related_pro.php';
            ?>



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


