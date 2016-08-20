<?php
include 'nav_bar.php';

$name_pho = $_GET['type'];
?>
<script src="site1/resourses/js/ajax2.js"></script>
<section class="slide2" 
         style=" background: url('app1/<?php echo @$slid_com[0]['banner_url']; ?>') no-repeat center ; 
         background-size: cover; ">
    <div class="com_pic">
    </div>
    <div class="com_name text-center">
        <h2><li class="glyphicon glyphicon-erase"></li> <?php echo strtoupper($name_pho); ?> products</h2>
    </div>
</section>
<?php
$obl = new display("specifications");
$rows = $obl->countrows('type', $_GET['type'])[0];
$noOfpages = (int) (($rows / 8) + 1);
if ($_GET['page_com_no'] > $noOfpages || !(int) ($_GET['page_com_no']))
    $_GET['page_com_no'] = 1;


$cat_page = $obl->pagination("type", $_GET['type'], $_GET['page_com_no']);
?>

<section class="our_offers text-center">
    <div class="container">
        <li class=" fa fa-bullhorn fa-4x"></li>
        <h2> Our Offers </h2>
        <div class="row">
            <?php
            if (count($cat_page) == 0) {
                echo '<h2 class="btn-danger" style=" border:3px solid #9D6060; ">'
                . ' No Products of ' . $_GET['type'] . '</h2> </div>';
            } else {
                for ($i = 0; $i < count($cat_page); $i++){
                 $all_products[0]= $cat_page[$i] ;
                include 'pro.php';
                }
            }
            ?>
        </div>
        <div class="container">
            <ul class="pagination">


                <?php
                $prev = $_GET['page_com_no'];
                if ($prev == 1)
                    $prev = 1;
                else
                    $prev = $prev - 1;
                echo "<li ><a href='index.php?page=category.php&&type={$_GET['type']}&&page_com_no={$prev}'>«</a></li>";
                for ($i = 1; $i <= $noOfpages; $i++)
                    echo " <li><a href='index.php?page=category.php&&type={$_GET['type']}&&page_com_no={$i}'>$i</a></li>";

                $next = $_GET['page_com_no'];
                if ($next == $noOfpages)
                    $prev = $noOfpages;
                else
                    $next = $next + 1;
                echo "<li ><a href='index.php?page=category.php&&type={$_GET['type']}&&page_com_no={$next}'>»</a></li>";
                ?>




            </ul>
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
include 'fotter.php';
?>