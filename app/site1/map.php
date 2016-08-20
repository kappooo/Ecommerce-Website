<?php
include 'nav_bar.php';
?>

<script>
// Carousel Auto-Cycle
    $(document).ready(function () {
        $('.carousel').carousel({
            interval: 6000
        })
    });

</script>


<style>

    /* Global */
    img { max-width:100%; }

    a {
        -webkit-transition: all 150ms ease;
        -moz-transition: all 150ms ease;
        -ms-transition: all 150ms ease;
        -o-transition: all 150ms ease;
        transition: all 150ms ease; 
    }

    a:hover {
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)"; /* IE 8 */
        filter: alpha(opacity=50); /* IE7 */
        opacity: 0.6;
        text-decoration: none;
    }

    .thumbnails li> .fff .caption { 
        background:#fff !important; 
        padding:10px
    }

    /* Page Header */
    ul.thumbnails { 
        margin-bottom: 0px;
    }

    /* Thumbnail Box */
    .caption h4 {
        color: #444;
    }

    .caption p {  
        color: #999;
    }

    /* Carousel Control */
    .control-box {
        text-align: right;
        width: 100%;
    }
    .carousel-control{
        background: #666;
        border: 0px;
        border-radius: 0px;
        display: inline-block;
        font-size: 34px;
        font-weight: 200;
        line-height: 18px;
        opacity: 0.5;
        padding: 4px 10px 0px;
        position: static;
        height: 30px;
        width: 15px;
    }

    /* Mobile Only */
    @media (max-width: 767px) {
        .page-header, .control-box {
            text-align: center;
        } 
    }
    @media (max-width: 479px) {
        .caption {
            word-break: break-all;
        }
    }

    li { list-style-type:none;}

    ::selection { background: #ff5e99; color: #FFFFFF; text-shadow: 0; }
    ::-moz-selection { background: #ff5e99; color: #FFFFFF; }

</style>





<div class="container">
    <div class="col-xs-12">

        <div class="carousel slide" id="myCarousel">
            <div class="carousel-inner">
                <div class="item active">
                    <ul class="thumbnails">
                        <li class="col-sm-3">
                            <div class="fff">
                                <div class="thumbnail">
                                    <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                    <h4>Praesent commodo</h4>
                                    <p>Nullam Condimentum Nibh Etiam Sem</p>
                                    <a class="btn btn-mini" href="#">» Read More</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-sm-3">
                            <div class="fff">
                                <div class="thumbnail">
                                    <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                    <h4>Praesent commodo</h4>
                                    <p>Nullam Condimentum Nibh Etiam Sem</p>
                                    <a class="btn btn-mini" href="#">» Read More</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-sm-3">
                            <div class="fff">
                                <div class="thumbnail">
                                    <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                    <h4>Praesent commodo</h4>
                                    <p>Nullam Condimentum Nibh Etiam Sem</p>
                                    <a class="btn btn-mini" href="#">» Read More</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-sm-3">
                            <div class="fff">
                                <div class="thumbnail">
                                    <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                    <h4>Praesent commodo</h4>
                                    <p>Nullam Condimentum Nibh Etiam Sem</p>
                                    <a class="btn btn-mini" href="#">» Read More</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div><!-- /Slide1 --> 
                <div class="item">
                    <ul class="thumbnails">
                        <li class="col-sm-3">
                            <div class="fff">
                                <div class="thumbnail">
                                    <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                    <h4>Praesent commodo</h4>
                                    <p>Nullam Condimentum Nibh Etiam Sem</p>
                                    <a class="btn btn-mini" href="#">» Read More</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-sm-3">
                            <div class="fff">
                                <div class="thumbnail">
                                    <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                    <h4>Praesent commodo</h4>
                                    <p>Nullam Condimentum Nibh Etiam Sem</p>
                                    <a class="btn btn-mini" href="#">» Read More</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-sm-3">
                            <div class="fff">
                                <div class="thumbnail">
                                    <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                    <h4>Praesent commodo</h4>
                                    <p>Nullam Condimentum Nibh Etiam Sem</p>
                                    <a class="btn btn-mini" href="#">» Read More</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-sm-3">
                            <div class="fff">
                                <div class="thumbnail">
                                    <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                    <h4>Praesent commodo</h4>
                                    <p>Nullam Condimentum Nibh Etiam Sem</p>
                                    <a class="btn btn-mini" href="#">» Read More</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div><!-- /Slide2 --> 
                <div class="item">
                    <ul class="thumbnails">
                        <li class="col-sm-3">	
                            <div class="fff">
                                <div class="thumbnail">
                                    <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                    <h4>Praesent commodo</h4>
                                    <p>Nullam Condimentum Nibh Etiam Sem</p>
                                    <a class="btn btn-mini" href="#">» Read More</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-sm-3">
                            <div class="fff">
                                <div class="thumbnail">
                                    <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                    <h4>Praesent commodo</h4>
                                    <p>Nullam Condimentum Nibh Etiam Sem</p>
                                    <a class="btn btn-mini" href="#">» Read More</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-sm-3">
                            <div class="fff">
                                <div class="thumbnail">
                                    <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                    <h4>Praesent commodo</h4>
                                    <p>Nullam Condimentum Nibh Etiam Sem</p>
                                    <a class="btn btn-mini" href="#">» Read More</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-sm-3">
                            <div class="fff">
                                <div class="thumbnail">
                                    <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                    <h4>Praesent commodo</h4>
                                    <p>Nullam Condimentum Nibh Etiam Sem</p>
                                    <a class="btn btn-mini" href="#">» Read More</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div><!-- /Slide3 --> 
            </div>


            <nav>
                <ul class="control-box pager">
                    <li><a data-slide="prev" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
                    <li><a data-slide="next" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></li>
                </ul>
            </nav>
            <!-- /.control-box -->   

        </div><!-- /#myCarousel -->

    </div><!-- /.col-xs-12 -->          

</div><!-- /.container -->





















<section class="account_setting account">
    <div class="container">
        <div class="row">
            <div class="profil_header col-lg-12">
                <img class=" img-thumbnail" src="<?php echo $img; ?>">
                <h2> <?php echo $_SESSION['username']; ?> </h2>
                <p><?php echo $account_setting['email']; ?></p>
                <h4> <?php echo $account_setting['city'] . " ,egypt"; ?> </h4>
            </div>

            <!-- /////////////////// start uploading profile image ////////////// -->
            <?php
            include 'profile_img.php';
            ?>
            <!-- /////////////////// end uploading profile image ////////////// -->

            <div class="col-lg-4">    
                <div class="accountlist">
                    <ul class="list-unstyled">
                        <li><a href="?page=my_account.php" class="active fa fa-book" href=""> My Orders </a></li>
                        <li ><a class="fa fa-edit" href="?page=account_setting.php"> Account Settings </a></li>
                        <li ><a href="?page=wish_list/wishlist.php" class="fa fa-lock" href=""> Wish Lists </a></li>
                    </ul>
                </div>
            </div>














