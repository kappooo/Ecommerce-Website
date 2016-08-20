
<?php 

if($_GET['page']=="specifications/specifications.php")
    $style='';
else
$style='margin-left:50px;';
    ?>
<div class="form-comment" style="<?php echo $style;?>">
                  
                <div class="comments">
                    <form method="post" >
                        <div class="form-group post">

                            <a href="?page=specifications/post.php&id=<?php echo $id; ?>" class="btn btn-default"> POST YOUR OPINION </a> 
                        </div>
                        <div class="form-group my_comment">   
                            <input type="text" name="my_comment" placeholder="username">
                            <input type="submit" name="submit" value="SEARCH OPINIONS" class="btn btn-default">
                        </div>
                        <hr style="clear: both;">
                    </form>
                    <?php
                    $obj_vote = new display("rating");

                    if (isset($_POST['submit']) && $_POST['submit'] == 'SEARCH OPINIONS') {
                        if (count($user_posts) == 0) {
                            $input_name = filter_input(INPUT_POST, 'my_comment', FILTER_SANITIZE_STRING);
                            echo "<h4>This user ( " . $input_name . " ) Not have comments about this product</h4>";
                        } else {
                            foreach ($user_posts as $value) {
                                $user = strtoupper($value['username']);
                                $date = explode(' ', $value['date']);
                                $prod_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                                $user_vote = $obj_vote->get_rating_info($prod_id, $user);
                                echo<<<EOD
                    <div class="comment">
                        <li style="color: #DDD;" class="sty_user fa fa-user fa-3x"></li>
                        <h3> {$user} </h3>
                        <h6><li class="fa fa-clock-o"> </li> $date[0]<br> $date[1]</h6>
                        <div class="review">
                            <p class="lead" style="float: left;">
                              {$value['comment']}
                            </p>
                            <h4 style="clear: both; color:#9D9D9D;"> Rating: {$user_vote['vote']} stars of 5 </h4>
                        </div>
                        <hr style="clear: both;">
                    </div>
EOD;
                            }
                        }
                    } else {
                        foreach ($post as $post_val) {
                            $user = strtoupper($post_val['username']);
                            $date = explode(' ', $post_val['date']);
                            $prod_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                            $user_vote = $obj_vote->get_rating_info($prod_id, $user);
                            echo<<<EOD
                    <div class="comment">
                        <li style="color: #DDD;" class="sty_user fa fa-user fa-4x"></li>
                        <h3> {$user} </h3>
                        <h6><li class="fa fa-clock-o"> </li> $date[0]<br> $date[1]</h6>
                        <div class="review">
                            <p  style="float: left;">
                              {$post_val['comment']}
                            </p>
                            <h4 style="clear: both; color:#9D9D9D;"> Rating: {$user_vote['vote']} stars of 5 </h4>
                        </div>
                        <hr style="clear: both;">
                    </div>
EOD;
                        }
                    }
                    ?>        
                </div>
            </div>