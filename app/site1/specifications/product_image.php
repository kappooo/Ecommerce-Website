
<div class="product spe" style="height: 349px;">

    <script src="site1/resourses/js/jquery.elevateZoom-3.0.8.min.js"></script>
    <img id="zoom_mw" src="<?php echo 'app1/' . $product_specific['image'] ?>" 
         data-zoom-image="<?php echo 'app1/' . $product_specific['image'] ?>">
    <script>
        $("#zoom_mw").elevateZoom(
           {scrollZoom : true,
            loadingIcon:true,
            easing:true,
            easingDuration:2000,
            lensFadeIn:true,
            lensFadeOut:true,
            zoomWindowFadeIn:true,
            zoomWindowFadeOut:true,
            zoomWindowPosition:2
        });
    </script>

    <li class="list-unstyled divider" role="separator"> </li>
    <p class="lead" ><?php echo $product_specific['name']; ?></p>
    <p class="center-block price" style="margin-top: 5px;">
        <?php
        if ($product_specific['sale'] > 0) {
            echo '<strike >' .
            $product_specific['price'] .
            ' epg</strike><br/>';
            echo '<span style="float: right;margin-top: -24px; margin-right: 37px;" class="sale">'
            . round($product_specific['price'] - ($product_specific['price'] / $product_specific['sale'])) . ""
            . " epg</span>";
        } else
            echo $product_specific['price'] . ' epg';
        ?>
    </p>
    <hr> 
    <a href="?page=compare.php&id=<?php echo$product_specific['id']; ?>&cate_id=<?php echo $product_specific['cat_id'] ?>"
       class='btn btn-default fa fa-compress fa-2x'
       data-toggle='tooltip' data-placement='left' 
       title='ADD TO COMPARE'> 
    </a>
    <!--------------- ///////////////  here wish list button //////////////////// -->
    <button
        id="wishlist_id"
        value="<?php echo $product_specific['id']; ?>"
        type="submit"
        onclick="wish_list('?page=wish_list/add_to_wishlist.php', '<?php echo $product_specific['id']; ?>', '#place')"
        style='margin-top: -9px; background: #C12E2A;'
        data-toggle='modal' data-target='.bs-example-modal-lg'
        class='btn btn-default fa fa-heart-o fa-2x '
        data-toggle='tooltip' data-placement='left' 
        title='ADD TO WISHLIST'> 
    </button> 
    <!--------------- ///////////////  here end wish list button //////////////////// -->


    <a href="?page=check_out.php&id=<?php echo $product_specific['id']; ?>&add=<?php echo $product_specific['id']; ?>
       " class="btn btn-danger fa fa-cart-plus fa-2x"> 
    </a>
</div>
<h3 style="margin-right: 3px;"> Customer Reviews  </h3>
<hr style=" margin-left: 2px;">
<div class="rating">

    <?php
    $vote = round($get_rating[0], 1);
    if (isset($_SESSION['username'])) {
        if ($count_user == 1) {
            echo<<<EOD
                        <h3> you already rating on this product </h3>
                        <h3> your rating is </h3>
EOD;

            for ($i = 0; $i < $my_rating['vote']; $i++) {
                echo<<<EOD
                                <li  class = "fa fa-star" style='color:#FFAE36;'></li>
                                
EOD;
            }
            for ($i = 0; $i < 5 - $my_rating['vote']; $i++) {
                echo<<<EOD
                                <li  class = "fa fa-star-o";'></li>
                                
EOD;
            }

            echo<<<EOD
                        <hr>    
                        <h4 class="fa fa-user fa-1x"> $user_rate customer reviews </h4>
                        <h5> out of 5 stars </h5>
                        <h1> $vote </h1>
                        <div id="response"></div>
EOD;
        } else {
            echo<<<EOD
                    <div>
                        <h3 class="text-center"> Rate this product ? </h3>
                    </div>
                    <span id="1_star" class="fa fa-star-o"></span>
                    <span id="2_star" class="fa fa-star-o"></span>
                    <span id="3_star" class="fa fa-star-o"></span>
                    <span id="4_star" class="fa fa-star-o"></span>
                    <span id="5_star" class="fa fa-star-o"></span>

                       <form method="post" action="#">
EOD;
            if (!isset($_SESSION['username'])) {
                echo '<h4 class="fa fa-lock"> Please Sign In for Rating </h4>';
            }
            echo<<<EOD
                            <input type="submit" id="add_rate" value="Add This Rate" name="submit" class="btn btn-default">
EOD;
            $phone_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            echo<<<EOD
                            <input type="hidden" id="phone_id" value="<?php echo $phone_id; ?>">
                        </form>
                        <h4 class="fa fa-user fa-1x"> $user_rate customer reviews </h4>
                        <h5> out of 5 stars </h5>
                        <h1>$vote</h1>
                        <div id="response"></div>             
EOD;
        }
    } else {
        echo<<<EOD
                    <div>
                        <h3 class="text-center"> Rate this product ? </h3>
                    </div>
                    <span id="1_star" class="fa fa-star-o"></span>
                    <span id="2_star" class="fa fa-star-o"></span>
                    <span id="3_star" class="fa fa-star-o"></span>
                    <span id="4_star" class="fa fa-star-o"></span>
                    <span id="5_star" class="fa fa-star-o"></span>

                       <form method="post" action="#">
EOD;
        if (!isset($_SESSION['username'])) {
            echo '<h4 class="fa fa-lock"> Please Sign In for Rating </h4>';
        }
        echo<<<EOD
                            <input type="submit" id="add_rate" value="Add This Rate" name="submit" class="btn btn-default">
EOD;
        $phone_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        echo<<<EOD
                            <input type="hidden" id="phone_id" value="<?php echo $phone_id; ?>">
                        </form>
                        <h4 class="fa fa-user fa-1x"> $user_rate customer reviews </h4>
                        <h5> out of 5 stars </h5>
                        <h1>$vote</h1>
                        <div id="response"></div>             
EOD;
    }
    ?>   
</div>