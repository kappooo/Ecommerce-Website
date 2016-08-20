<?php
include 'nav_bar.php';





$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$obj_dis_id = new display('specifications');
$datap=$obj_dis_id->get_data_by_id($id);
$cate_id = $datap['cat_id'];






//$cate_id = filter_input(INPUT_GET, 'cate_id', FILTER_SANITIZE_NUMBER_INT);

//$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//$obj_dis_id = new display('specifications');
$count_id = $obj_dis_id->count_id_in_site($id, 'id');

if ($count_id == 0) {
    include 'site1/specifications/alert_page.php';
    die();
}
if (isset($_GET['id2']) && $_GET['id3'] != NULL) {
    $id2 = filter_input(INPUT_GET, 'id2', FILTER_SANITIZE_NUMBER_INT);
    $count_id2 = $obj_dis_id->count_id_in_site($id2, 'id');

    if ($count_id2 == 0) {
        include 'site1/specifications/alert_page.php';
        die();
    }
}

if (isset($_GET['id3']) && $_GET['id3'] != NULL) {
    $id3 = filter_input(INPUT_GET, 'id3', FILTER_SANITIZE_NUMBER_INT);
    $count_id3 = $obj_dis_id->count_id_in_site($id3, 'id');
    if ($count_id3 == 0) {
        include 'site1/specifications/alert_page.php';
        die();
    }
}
?>
<script src="site1/resourses/js/ajax2.js"></script>
<section class="compare" style="margin-top: 120px;">
    <div class="container">

        <div class="row">
            <div class="col-sm-3">

                <div class="page">  
                    <?php
                    foreach ($add_page as $value) {
                        echo "<ul class='list-unstyled'>
                 <a href='?page=category.php&&type={$value['page_name']}&page_com_no=1'> 
                <li><img src='app1/{$value['page_image']}'</li>
                    </a>
                    </ul>   
                    ";
                    }
                    ?>
                </div>    
            </div>
            <div class="col-xs-3">
                <div class="item_1">
                    <div class="find">
                        <h5> COMPARE WITH </h5>
                        <form method="post" action="">
                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                            }
                            if (isset($_GET['id2'])) {
                                $id_2 = $_GET['id2'];
                            }
                            if (isset($_GET['id3'])) {
                                $id_3 = $_GET['id3'];
                            }
                            $phone_id = @$_GET['id'];
                            $compare = new display('specifications');
                            $phone_1 = $compare->get_data_by_id($phone_id);
                            if (isset($_GET['id2']) && $_GET['id2'] != NULL) {
                                $phone_id2 = $_GET['id2'];
                                $compare2 = new display('specifications');
                                $phone_2 = $compare2->get_data_by_id($phone_id2);
                            }
                            if (isset($_GET['id3']) && $_GET['id3'] != NULL) {
                                $phone_id3 = $_GET['id3'];
                                $compare3 = new display('specifications');
                                $phone_3 = $compare3->get_data_by_id($phone_id3);
                            }
                            ?>
                            <input type="text"  name="mosa" id="find_1" 
                                   onkeyup="get_page('?page=search/search_compare1.php', '#find_1', '#result_1')" >
                            <input type="hidden" id="cat_id_1" value="<?php echo $cate_id ?>">
                            <input type="hidden" id="id_1" value="<?php echo isset($_GET['id']) ? $_GET['id'] : null; ?>">
                            <input type="submit" name="submit" value=" search " class="btn-danger">
                            <?php
//if (isset($_POST['submit']) && $_POST['submit'] == ' search ') {
//  }
                            ?>
                            <div id="result_1"></div>                                
                        </form>

                        <!-- //////////////////////////// first search end her /////////////////////////////////////////////// -->   

                        <h6 class="fa fa-info-circle"> Please enter model name or part of it </h6>
                    </div>
                    <?php
                    if (isset($_GET['search_1'])) {
                        $like = $_GET['search_1'];
                        $more = new display('specifications');
                        $results = $more->search_by_cat_id($like, $cate_id);
                        echo "<div id='result_more'>";
                        foreach ($results as $result) {
                            echo "
                                 <ul>
                                   <a href='?page=compare.php&id={$result['id']}&id2=$id_2&id3=$id_3&cate_id=$cate_id'>
                                    <li>{$result['name']}</li>
                                   </a>
                                 </ul>";
                        }
                        echo "</div>";
                    }
                    ?>
                    <div class="modal_1">
                        <?php
                        if (isset($_GET['id']) && $_GET['id'] != NULL) {
                            echo "
                        <h4><a>{$phone_1['name']}</a></h4>
                        <img src='app1/{$phone_1['image']}' >
                        <ul class='list-unstyled'>
                            <li><a href='?page=specifications/specifications.php&&id={$phone_1['id']}'
                                class='btn-default'>Specifications</a>
                            </li>
                            <li><a href='?page=specifications/comments.php&&id={$phone_1['id']}' class='btn-default'>Read opinions</a></li>
                            <li><a href='?page=specifications/picture.php&&id={$phone_1['id']}' class='btn-default'>Pictures</a></li>
                            <li><a href='?page=specifications/video.php&&id={$phone_1['id']}' class='btn-default'>video</a></li>
                         </ul>";
                        } else {
                            echo "
                                <li class='no_device fa fa-mobile fa-4x'></li>
                                <h4 id='text'>Add a device to compare</h4>
                                ";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- //////////////////////////// second search start her /////////////////////////////////////////////// --> 

            <div class="col-xs-3">
                <div class="item_1">
                    <div class="find">
                        <h5> COMPARE WITH </h5>
                        <form method="post">
                            <input type="text" name="search_2" id="find_2"
                                   onkeyup="get_page('?page=search/search_compare2.php', '#find_2', '#result_2')">
                            <input type="hidden" id="cat_id_2" value="<?php echo $cate_id ?>">
                            <input type="hidden" id="id_2" value="<?php echo @$_GET['id2']; ?>">
                            <input type="submit" name="submit" value=" search " class="btn-danger">
                            <div id="result_2"></div>
                        </form>
                        <h6 class="  fa fa-info-circle "> Please enter model name or part of it </h6>
                    </div>
                    <?php
                    if (isset($_GET['search_2'])) {
                        $like_2 = $_GET['search_2'];
                        $more = new display('specifications');
                        $results_2 = $more->search_by_cat_id($like_2, $cate_id);
                        echo "<div id='result_more'>";
                        foreach ($results_2 as $result_2) {
                            echo "
                                 <ul>
                                   <a href='?page=compare.php&id=$id&id2={$result_2['id']}&id3=$id_3&cate_id=$cate_id'>
                                    <li>{$result_2['name']}</li>
                                   </a>
                                 </ul>";
                        }
                        echo "</div>";
                    }
                    ?>
                    <div class="modal_1">
                        <?php
                        if (isset($_GET['id2']) && $_GET['id2'] != NULL) {
                            echo "
                        <h4><a>{$phone_2['name']}</a></h4>
                        <img src='app1/{$phone_2['image']}' >
                        <ul class='list-unstyled'>
                            <li><a href='?page=specifications/specifications.php&&id={$phone_2['id']}}' 
                                class='btn-default'>Specifications</a>
                            </li>
                            <li><a href='?page=specifications/comments.php&&id={$phone_2['id']}' class='btn-default'>Read opinions</a></li>
                            <li><a href='?page=specifications/picture.php&&id={$phone_2['id']}' class='btn-default'>Pictures</a></li>
                            <li><a href='?page=specifications/video.php&&id={$phone_2['id']}' class='btn-default'>video</a></li>
                         </ul>";
                        } else {
                            echo "
                                <li class='no_device fa fa-mobile fa-4x'></li>
                                <h4 id='text'>Add a device to compare</h4>
                                ";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- //////////////////////////// third search start her /////////////////////////////////////////////// --> 
            <div class="col-xs-3">
                <div class="item_1">
                    <div class="find">
                        <h5> COMPARE WITH </h5>
                        <form method="post">
                            <input type="text" name="search_3" id="find_3"
                                   onkeyup="get_page('?page=search/search_compare3.php', '#find_3', '#result_3')">
                            <input type="submit" name="submit" value=" search " class="btn-danger">
                            <input type="hidden" id="cat_id_3" value="<?php echo $cate_id ?>">
                            <input type="hidden" id="id_3" value="<?php echo @$_GET['id3']; ?>">
                            <div id="result_3"></div>
                        </form>
                        <h6 class="fa fa-info-circle"> Please enter model name or part of it </h6>
                    </div>
                    <?php
                    if (isset($_GET['search_3'])) {
                        $like_3 = $_GET['search_3'];
                        $more = new display('specifications');
                        $results_3 = $more->search_by_cat_id($like_3, $cate_id);
                        echo "<div id='result_more'>";
                        foreach ($results_3 as $result_3) {
                            echo "
                                 <ul>
                                   <a href='?page=compare.php&id=$id&id2=$id_2&id3={$result_3['id']}&cate_id=$cate_id'>
                                    <li>{$result_3['name']}</li>
                                   </a>
                                 </ul>";
                        }
                        echo "</div>";
                    }
                    ?>
                    <div class="modal_1">
                        <?php
                        if (isset($_GET['id3']) && $_GET['id3'] != NULL) {
                            echo "
                        <h4><a>{$phone_3['name']}</a></h4>
                        <img src='app1/{$phone_3['image']}' >
                        <ul class='list-unstyled'>
                            <li><a href='?page=specifications/specifications.php&&id={$phone_3['id']}}'
                                class='btn-default'>Specifications</a>
                            </li>
                            <li><a href='?page=specifications/comments.php&&id={$phone_3['id']}' class='btn-default'>Read opinions</a></li>
                            <li><a href='?page=specifications/picture.php&&id={$phone_3['id']}' class='btn-default'>Pictures</a></li>
                            <li><a href='?page=specifications/video.php&&id={$phone_3['id']}' class='btn-default'>video</a></li>
                         </ul>";
                        } else {
                            echo "
                                <li class='no_device fa fa-mobile fa-4x'></li>
                                <h4 id='text'>Add a device to compare</h4>
                                ";
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- //////////////////////////// table for compare start her ////////////////////////////////////////// --> 
<?php
if ($cate_id == 1 || $cate_id == 3) {
    include 'compare_table.php';
} elseif ($cate_id == 2) {
    include 'lap_com.php';
}
?>
<!-- //////////////////////////// table for compare start her ////////////////////////////////////////// --> 

<?php include 'fotter.php'; ?>
