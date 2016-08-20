<?php
include 'nav_bar.php';

if (isset($_POST['pag'])) {
    $_SESSION['perpage'] = $_POST['pag'];
    $perpage = $_SESSION['perpage'];
} else if (isset($_SESSION['perpage'])) {

    $perpage = $_SESSION['perpage'];
} else
    $perpage = 9;
?>
<script src="site1/resourses/js/ajax2.js"></script>
<section class="slide2" 
         style=" background: url('app1/<?php if (isset($Name)) echo $photo; ?>') no-repeat center ; 
         background-size: cover; ">
    <div class="com_pic">
    </div>
    <div class="com_name text-center">
        <h2><li class="glyphicon glyphicon-erase"></li>  <?php if (isset($Name)) echo strtoupper($Name); ?>  Categorey</h2>
    </div>
</section>
<?php
$obl = new display("specifications");



if (isset($_POST['advanced']) || (isset($_SESSION['extra']) && $_SESSION['extra'] != ' an)') || isset($_SESSION['order'])) {

    if (isset($_POST['advanced'])) {
        $extra = " and (";

        for ($i = 0; $i < count($x); $i++) {

            if (isset($_POST['com_' . $x[$i][0]['id'] . ''])) {

                $extra.="type='{$x[$i][0]['page_name']}' or ";
            }
        }


        $extra = substr($extra, 0, -3);
        $extra.=')';

        if (($_POST['minp']) != '' and ( $_POST['maxp']) != "") {
            $_SESSION['min'] = $_POST['minp'];
            $_SESSION['max'] = $_POST['maxp'];
            if ($extra == ' an)')
                $extra = " and price between {$_POST['minp']} and {$_POST['maxp']}";
            else {
                $extra.=" and price between {$_POST['minp']} and {$_POST['maxp']}";
            }
        } else {
            unset($_SESSION['min']);
            unset($_SESSION['max']);
        }
        if (isset($_POST['sort'])) {
            $val = $_POST['sort'];
            switch ($val) {
                case 'az':
                    $order = 'name';
                    break;
                case 'za':
                    $order = "name desc";
                    break;
                case 'lh':
                    $order = 'price';
                    break;
                case 'hl':
                    $order = 'price desc';
                    break;
                default :
                    $order = 'id desc';
            }
        }
        $_SESSION['extra'] = $extra;
        $_SESSION['order'] = $order;
    } else
        $extra = $_SESSION['extra'];
    $order = $_SESSION['order'];


    if ($extra != ' an)') {

        $cats = $obl->pagination("cat_id", $_GET['cat_id'], $_GET['cat_page_no'], $extra, $perpage, $order);
        $rows = $obl->countrows('cat_id', $_GET['cat_id'], $extra)[0];
    } else {
        $cats = $obl->pagination("cat_id", $_GET['cat_id'], $_GET['cat_page_no'], '', $perpage, $order);
        $rows = $obl->countrows('cat_id', $_GET['cat_id'])[0];
    }
} else {
    $cats = $obl->pagination("cat_id", $_GET['cat_id'], $_GET['cat_page_no']);
    $rows = $obl->countrows('cat_id', $_GET['cat_id'])[0];
}
if ($rows % $perpage != 0)
    $noOfpages = (int) (($rows / $perpage) + 1);
else {
    $noOfpages = (int) (($rows / $perpage));
}
if ($_GET['cat_page_no'] > $noOfpages || !(int) ($_GET['cat_page_no']))
    $_GET['cat_page_no'] = 1;;
?>

<section class="our_offers text-center">
    <div class="container">
        <li class=" fa fa-bullhorn fa-4x"></li>
        <h2> Our Offers </h2>

        <div class="row">


            <?php
            if (!isset($Name))
                echo '<h2 class="btn-danger" style="color:#231212;  background-color: rgba(217, 83, 79, 0.59)'
                . 'padding-top:16px; border:3px solid #9D6060; ">'
                . ' Unknown catergory</h2> </div>';

            else if (empty($cats) && isset($Name)) {

                echo '<h2 class="btn-danger" style=" border:3px solid #9D6060; ">'
                . ' No Products of ' . $Name . ' catergory</h2> </div>';
            } else {
                ?>
               <?php include 'advanced.php'; ?>
                <div class="col-lg-10">
                    <?php
                    for ($i = 0; $i < count($cats); $i++) {
                $all_products[0]=$cats[$i];
                include 'pro.php';
                    }
                }
                ?>
            </div>
        </div>



        <ul class="pagination">


            <?php
            $prev = $_GET['cat_page_no'];
            if ($prev == 1)
                $prev = 1;
            else
                $prev = $prev - 1;
            echo "<li ><a href='index.php?page=cat.php&&cat_id={$_GET['cat_id']}&&cat_page_no={$prev}'>«</a></li>";
            for ($i = 1; $i <= $noOfpages; $i++)
                echo " <li><a href='index.php?page=cat.php&&cat_id={$_GET['cat_id']}&&cat_page_no={$i}'>$i</a></li>";

            $next = $_GET['cat_page_no'];
            if ($next == $noOfpages)
                $prev = $noOfpages;
            else
                $next = $next + 1;
            echo "<li ><a href='index.php?page=cat.php&&cat_id={$_GET['cat_id']}&&cat_page_no={$next}'>»</a></li>";
            ?>
        </ul>
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