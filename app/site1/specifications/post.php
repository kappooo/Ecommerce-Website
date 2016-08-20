<?php
if (!isset($_SESSION['username'])) {
    header("location:?page=login.php&source=post&id={$product_specific['id']}");
}
include 'site1/nav_bar.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$obj_dis_id = new display('specifications');
$count_id = $obj_dis_id->count_id_in_site($id, 'id');
if ($count_id == 0) {
    include 'alert_page.php';
    die();
}
?>

<script src="site1/resourses/js/ajax2.js"></script>

<section class="specification our_offers">
    <div class="container-fluid text-center">
        <div class="row">
            <h2 class="h2sp">
                Comments 
                <i class="fa fa-comments" aria-hidden="true"></i>

            </h2>


            <div class=" col-sm-3 text-center">
                <?php include 'product_image.php'; ?>
            </div>


            <div class="col-sm-9">
                <?php include 'fetures.php'; ?>
                <div class="add_comment">

                    <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        $id = $_GET['id'];
                        unset($_SESSION['message']);
                        echo " <meta http-equiv='refresh' content='3; "
                        . "url=http://localhost/app//?page=specifications/specifications.php&&id=$id/' />";
                    } else {
                        ?>
                        <form method="post">
                            <label> Your comment: </label>
                            <div class="form-group">
                                <textarea required="required" name="comment"> </textarea>
                                <input type="submit" name="submit" value="POST" class="btn btn-danger">
                            </div>
                        </form>

                        <div class="post_rules">
                            <h3> Posting rules </h3> 
                            <ul class="list-unstyled">
                                <li class="fa fa-angle-right">
                                    English only 
                                </li>
                                <li  class="fa fa-angle-right">
                                    Please no foul language, be polite and use common sense 
                                </li>
                                <li class="fa fa-angle-right">
                                    No expressions of hatred based on race/ethnicity, 
                                    sex, sexual orientation, disability, and religion
                                </li>
                                <li class="fa fa-angle-right">
                                    No SPAM, no commercial advertising, no referal
                                    programs of any kind 
                                </li>
                                <li class="fa fa-angle-right" >
                                    Posting your contact info such as phone number 
                                    or email is not a good idea. We won't be responsible 
                                    for any unwanted consequences.
                                </li>
                                <li class="fa fa-angle-right"> If you don't follow 
                                    the above rules, your post will be probably deleted. 
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
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