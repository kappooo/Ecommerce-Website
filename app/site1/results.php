<?php
include 'site1/nav_bar.php';
$res = new display('specifications');
if (isset($_POST['pag'])) {
    $_SESSION['perpage'] = $_POST['pag'];
    $perpage = $_SESSION['perpage'];
} else if (isset($_SESSION['perpage'])) {

    $perpage = $_SESSION['perpage'];
} else
    $perpage = 9;


$like = $_GET['key'];
$extra1 = " and (name LIKE '%$like%' OR type LIKE '%$like%' OR tags LIKE '%$like%')";
$x = $res->get_company("1  $extra1", 1);
$y = $res->get_cats_search("1 $extra1", 1);


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

        if ($extra == ' an)')
            $extra = " and (";
        else {
            $extra.="and (";
        }

        for ($i = 0; $i < count($y); $i++) {

            if (isset($_POST['cat_' . $y[$i][0]['cat_id'] . ''])) {

                $extra.="cat_id='{$y[$i][0]['cat_id']}' or ";
            }
        }
        $extra = substr($extra, 0, -3);
        $extra.=')';

        if (substr($extra, -3) == "an)")
            $extra = substr($extra, 0, -3);


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

        $cats = $res->pagination("1", 1, $_GET['searno'], $extra1 . $extra, $perpage, $order);
        $rows = $res->countrows('1', '1', $extra1 . $extra)[0];
    } else {
        $cats = $res->pagination("1", 1, $_GET['searno'], $extra1, $perpage, $order);
        $rows = $res->countrows('1', '1', $extra1)[0];
    }
} else {

    $cats = $res->pagination("1", 1, $_GET['searno'], $extra1, $perpage);
    $rows = $res->countrows('1', '1', $extra1)[0];
}


if ($rows % $perpage != 0)
    $noOfpages = (int) (($rows / $perpage) + 1);
else {
    $noOfpages = (int) (($rows / $perpage));
}
?>
<script src="site1/resourses/js/ajax2.js"></script>
<section class="our_offers text-center">
    <div class="container">
        <li class=" fa fa-bullhorn fa-4x"></li>
        <h2 > Our Offers </h2>
        <div class="row">

        <?php include 'advanced.php'; ?>
            <div class="col-lg-10">
                <?php
                foreach ($cats as $value) {
                   $all_products[0]=$value;
                include 'pro.php';
                }
                ?>
            </div>
        </div>
        <ul class="pagination">


            <?php
            $prev = $_GET['searno'];
            if ($prev == 1)
                $prev = 1;
            else
                $prev = $prev - 1;
            echo "<li ><a href='index.php?page=results.php&&key={$_GET['key']}&&searno={$prev}'>«</a></li>";
            for ($i = 1; $i <= $noOfpages; $i++)
                echo " <li><a href='index.php?page=results.php&&key={$_GET['key']}&&searno={$i}'>$i</a></li>";

            $next = $_GET['searno'];
            if ($next == $noOfpages)
                $prev = $noOfpages;
            else
                $next = $next + 1;
            echo "<li ><a href='index.php?page=results.php&&key={$_GET['key']}&&searno={$next}'>»</a></li>";
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
include 'site1/fotter.php';
?>