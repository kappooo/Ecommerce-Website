
<!DOCTYPE html>

<html>
    <head>
         <title> MOBILY</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="site1/resourses/css/normalize.css" rel="stylesheet"/>
        <link href="site1/resourses/css/bootstrap.css" rel="stylesheet"/>
        <link href="site1/resourses/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="site1/resourses/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>        
        <link href="site1/resourses/css/media.css" rel="stylesheet" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
 
       
        <script src="site1/resourses/js/jquery-1.11.1.min.js"></script>
        
        <script src= "site1/resourses/js/bootstrap.min.js" ></script>
         <script src="site1/resourses/js/respond.js"></script>
        <script src="site1/resourses/js/site.js"></script>
        <script src="site1/resourses/js/jquery.nicescroll.min.js"></script>
        <script src="site1/resourses/js/ajax2.js"></script>
      

        <script>
            $(document).ready(function () {


                var div_info = $("#info");
                $(window).scroll(function () {
                    // $(this).scrollTop() >= 400 ? div_info.hide() : div_info.show();
                    if ($(this).scrollTop() >= 50) {
                        $("#result").css("top", "47px");
                        $(".hamburger").css("top", "12px");
                        $(".navbar-fixed-top").css("top", "-69px");
                        div_info.hide();

                    } else {
                        $("#result").css("top", "97px");
                        $(".navbar-fixed-top").css("top", "-19px");
                        $(".navbar-fixed-top").css("-webkit-transition", "all 0.7s ease");
                        $(".navbar-fixed-top").css("-moz-transition", "all 0.7s ease");
                        $(".navbar-fixed-top").css("-o-transition", "all 0.7s ease");
                        $(".navbar-fixed-top").css("transition", "all 0.7s ease");
                        div_info.show();
                        $(".hamburger").css("top", "4px");
                    }
                });

                $("section").click(function () {
                    $(".user_info").hiden();
                });
                $(".username").hover(function () {
                    $(this).css("background", "");
                });
                $(".username").click(function () {
                    $(".user_info").toggle();
                });
                $('#search').keyup(function () {
                    var search = $('#search').val();
                    $.ajax({
                        url: 'index.php?page=search/search.php',
                        data: {search: search},
                        type: 'POST',
                        success: function (data) {
                            if (!data.error) {
                                $('#result').html(data);
                            }
                        }

                    });
                });
            });
        </script>
    </head>
    <body>



        <!--start navbar --> 

        <div class="bar " id="info">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-8">
                        <ul >
                            <li class="fa fa-mobile " style="color: #d9534f" aria-hidden="true">
                                <span>01093507928</span> 
                            </li> 
                            <li class="fa fa-life-ring " style="color: #d9534f" aria-hidden="true"> 
                                <span>24 hours avaliable</span> 
                            </li> 
                            <li class="fa fa-car " style="color: #d9534f" aria-hidden="true"> 
                                <span>where you were</span> 
                            </li>
                            <li class="fa fa-refresh " style="color: #d9534f" aria-hidden="true"> 
                                <span> Free Returns </span> 
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-5 right hidden-xs">
                        <a href="#"><img src="site1/resourses/imgs/egypt-flag-button-1.png" title="arabic" alt="arabic language" width='38px' height="38px"/></a>
                        <a href="#"><i class="fa fa-facebook fa-2x"  aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header">       
            <nav class="navbar navbar-inverse navbar-fixed-top ">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php
                        foreach ($_SESSION as $key => $value) {
                            if ($key != 'username')
                                $id = substr($key, 7);
                        }
                        if (isset($_SESSION['username'])) {
                            if (isset($_SESSION['product' . $id]) && $_SESSION['product' . $id] != 0) {
                                echo "
                                <a href ='index.php?page=check_out.php&id=$id'
                                 class = 'pro btn btn-default' aria-label = 'Left Align'>";
                            } else {
                                echo "  
                              <a href ='index.php?page=check_out.php' 
                               class = 'pro btn btn-default' aria-label = 'Left Align'>";
                            }
                        } else {
                            echo "
                          <a href ='#' 
                            class = 'pro btn btn-default' aria-label = 'Left Align'>";
                        }
                        ?>
                        <li class = " fa fa-shopping-cart fa-2x"> <?php echo $item1; ?> </li></a>

                        <a  href="index.php" class="navbar-brand">MoBily</a>

                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <form method="post" class="navbar-form navbar-left get_form" >
                            <input type="text" required="required" class="form-control" placeholder="Search" id="search" name="search" autocomplete="off">
                            <input type="submit" name="submit" value="search" class="btn btn-default">
                        </form>



                        <ul class="nav navbar-nav navbar-right   ">
                            <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
                            <li ><a href="index.php?page=offers.php&searno=1">Our offer's</a></li>

                            <li class="comp hidden-xs"><a href="index.php">Company</a>
                                <section class="company" id="company">
                                    <div class="row">
                                     <!--  <table class="table1">-->
                                        <?php
                                        for ($i = 0; $i < count($add_page); $i++) {
                                            echo "
                                                <a href='index.php?page=category.php&type={$add_page[$i]['page_name']}&page_com_no=1'>
                                                <img width='' height='' src='app1/{$add_page[$i]['page_image']}'>"
                                            . "</a>";
                                        }
                                        ?>                                           
                                    </div>
                                </section>
                            </li>
                            <li class="dropdown service">
                                <a href="#" id="dropdownMenu1" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Categories <span class="caret"></span></a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">All categories</a></li>
                                    <?php
                                    for ($i = 0; $i < count($catsArr); $i++) {
                                        echo "
                                                <li><a href='index.php?page=cat.php&cat_id={$catsArr[$i]['cat_id']}&cat_page_no=1'>
                                              {$catsArr[$i]['cat_name']}"
                                        . "</a></li>";
                                    }
                                    ?>       
                                </ul>
                            </li>
                            <li><a href="?page=call_us.php">call us</a></li>
                            <?php
                            if (!isset($_SESSION['username'])) {
                                echo ' <li><a href="?page=login.php&source=home">login</a></li>';
                            } else {
                                
                              
                                $my_nam = $_SESSION['username'];
                               $obj_display = new display('profile_img');
                              $my_img = $obj_display->by_name($my_nam, 'username');
                                if (file_exists($my_img['img'])) { 
                              echo"
                                  <li class='person'>
                                    <a class='username' href='#'>
                                     <img class='img-rounded' src='{$my_img['img']}' width='53px' height='53px'/>
                                    </a>
                                  </li>";
                                } else {                             
                                  echo"
                                  <li class='person'>
                                    <a class='username' href='#'>
                                     <img class='img-rounded' src='app1/resources/upload/profile_img/anonymous.png' 
                                         width='53px' height='53px'/>
                                    </a>
                                  </li>";
                                }
                            }
                            ?>
                        </ul>

                        <div class="user_info">
                            <h4 class="text-center"><?php echo $_SESSION['username'] ?> </h4>

                            <hr>
                            <ul class="list-unstyled">
                                <li><a  href="?page=my_account.php">My Account</a></li>
                                <li><a href='?page=check_out.php'>My Shoping cart</a></li>      
                                <li><a  href="?page=call_us.php">Contact Us</a></li>
                                <hr>
                                <li><a href="?page=logout_site.php"  
                                       class="fa fa-power-off fa-lg" >
                                        logout 
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>

        <div id="wrapper">
            <div class="overlay"></div>

            <!-- Sidebar -->
            <div class="navbar navbar-inverse navbar-fixed-top nv" id="sidebar-wrapper" role="navigation">
                <ul class="nav sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="#">
                            MoBily
                        </a>
                    </li>
                    <li>
                        <a href="index.php">
                            <i class="fa fa-home" aria-hidden="true"></i>Home</a>
                    </li>
                    <li>
                        <a href="?page=check_out.php&source=specifications"><i class="fa fa-cart-plus" aria-hidden="true"></i>My Cart</a>
                    </li>

                    <li>

                        <a href="index.php?page=offers.php&searno=1">  <i class="fa fa-star" aria-hidden="true"></i>Our offer's today</a>
                    </li>
<?php if (isset($_SESSION['username'])) { ?>
                        <li>

                            <a href="http://localhost/app//index.php?page=my_account.php">   <i class="fa fa-user fa-lg"></i> My Account</a>
                        </li>
<?php } else {
    ?>
                        <li>

                            <a href=" http://localhost/app/index.php?page=login.php&source=home">   <i class="fa fa-user "></i> Sign in</a>
                        </li>
<?php } ?>
                    <li class="collapse" data-toggle="collapse" data-target="#cats">
                        <a href="#"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
Categories<span class="caret"></span></a>
                    </li>
                    <ul class="sub-menu collapse" role="menu" id="cats">


<?php
for ($i = 0; $i < count($catsArr); $i++) {
    echo "
                                                <li><a href='index.php?page=cat.php&cat_id={$catsArr[$i]['cat_id']}&cat_page_no=1'>
                                              {$catsArr[$i]['cat_name']}"
    . "</a></li>";
}
?>  
                    </ul>
                    </li>

                    <li class="collapse" data-toggle="collapse" data-target="#coms">
                        <a href="#"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
Companies<span class="caret"></span></a>
                    </li>
                    <ul class="sub-menu collapse" role="menu" id="coms">

<?php
for ($i = 0; $i < count($add_page); $i++) {
    echo "
                                                <li><a href='index.php?page=category.php&type={$add_page[$i]['page_name']}&page_com_no=1'>
                                                {$add_page[$i]['page_name']}"
    . "</a></li>";
}
?>  
                    </ul>
                    <li>
                        <a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i>
Services</a>
                    </li>
                    <li>
                        <a href="http://localhost/app//index.php?page=call_us.php#"><i class="fa fa-life-ring" aria-hidden="true"></i>
Contact</a>
                    </li>
                    <li>
                        <a href="https://twitter.com/maridlcrmn"><i class="fa fa-twitter-square" aria-hidden="true"></i>
Follow me</a>
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <button type="button" class="hamburger is-closed  hidden-xs" data-toggle="offcanvas">
                    <span class="hamb-top"></span>
                    <span class="hamb-middle"></span>
                    <span class="hamb-bottom"></span>
                </button>
            </div>
            <!-- /#wrapper -->

            <div id="result">
            </div>