<!--Start SECTION Testimonial HERE --> 
<section class="testimonial  text-center" >
    <div class="container">

        <div id="open" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->

            <!-- Wrapper for slides -->

            <?php
            $obj = new display("client_say");
            $clients = $obj->extra("select * from client_say where active=1");
            if (isset($_POST['submit']) && $_POST['submit'] == 'Post your opinion' && isset($_SESSION['username'])) {
                $client_say['comment'] = $_POST['client_say'];
                $client_say['username'] = $_SESSION['username'];
                $client_say['date'] = date("Y-m-d h:i:a");
                $obj_add = new add($client_say, 'client_say');
                echo '<script>alert("thanks for your opinion")</script>';
            }
            ?>

            <div class="carousel-inner" role="listbox">
                <?php
                for ($i = 0; $i < count($clients); $i++) {
                    echo'
                <div class="';
                    if ($i == 0)
                        echo 'active';
                    echo' item">
                    <h2>' . $clients[$i]['comment'] . '</h2>
                    <p>
                       ' . explode(' ', $clients[$i]['date'])[0] . '<br/>'
                    . explode(' ', $clients[$i]['date'])[1] . '  
                    </p>
                    <span>' . $clients[$i]['username'] . '</span> 
              </div> ';
                }
                ?>

                <ol class="carousel-indicators">
                    <?php
                    $dispalyimg = new display("profile_img");
                    for ($j = 0; $j < count($clients); $j++) {

                        $img = $dispalyimg->extra("select img from profile_img where username='{$clients[$j]['username']}'")[0]['img'];

                        echo'
                <li data-target="#open" data-slide-to="' . $j . '" class="';
                        if ($j == 0)
                            echo 'active';echo '">';
                        if (file_exists($img)) {
                            echo '<img src="' . $img . '" style="width: 80px; height: 80px;" />';
                        } else {
                            echo '<img src="app1/resources/upload/profile_img/anonymous.png"'
                            . 'style="width: 80px; height: 80px;" />';
                        }



                        echo'</li>';
                    }
                    ?>

                </ol>

            </div> 
        </div>
</section>
<!--END SECTION Testimonial HERE -->



<!--  circle button here   -->
<div class="container">
    <div class="row">
        <section class="section_0">
            <a href="3" data-toggle="modal" data-target=".bs-example-modal-say">
                <div class="col-xs-12">
                    <div class="circle circle1">
                        <h3 >say something about the site <br><li class="fa fa-comment-o fa-2-x"></li></h3>
                    </div>
                </div>
            </a>   
        </section>
    </div>
</div>
<!--  end circle button here   -->

<!-- /////////////////// form  ///////////////////////////  -->

<div class="modal fade bs-example-modal-say" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-say">
        <div class="modal-content text-center">

            <button style="font-size: 33px;" 
                    type="button" class="close" data-dismiss="modal" 
                    aria-label="Close"><span aria-hidden="true">
                    &times;
                </span>
            </button>
            <?php if (isset($_SESSION['username'])) { ?>

                <h4 style="margin-top: 10px;"> 
                    <span style="font-size: 33px;">welcom</span>

                    <br><?php echo $_SESSION['username']; ?>
                </h4>
                <?php
                $my_nam = $_SESSION['username'];
                $obj_display = new display('profile_img');
                $my_img = $obj_display->by_name($my_nam, 'username');
                if (file_exists($my_img['img'])) {
                    echo '<img src="' . $my_img['img'] . '" 
                     class="img-circle" style="width: 100px;height: 100px;">';
                } else {
                    echo '<img src="app1/resources/upload/profile_img/anonymous.png" 
                     class="img-circle" style="width: 100px;height: 100px;">';
                }
                ?>


                <form method="post" action="#">
                    <h2> say something about the site </h2>
                    <textarea name="client_say" 
                              style="width: 80%;;height: 148px; border: 2px solid #E3E3E3;border-radius: 15px;">
                    </textarea><br>
                    <input type="submit" class="input-lg btn-danger" 
                           style="width: 80%;margin-top: 10px;margin-bottom: 20px;" 
                           name="submit" value="Post your opinion">
                </form>
                <?php
            } else {
                echo '<div class="alert alert-info"  height="300px">
            <strong>Please login to post your opinion </strong>
          </div>
          <a class="btn btn-success" href="?page=login.php&source=home">Sign in</a><br/>';
            }
            ?>
            <br/>
        </div>
    </div>
</div>
