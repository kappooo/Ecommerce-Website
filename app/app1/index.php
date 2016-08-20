
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location:views/login_view.php");
    die();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> MOBILY </title>

        <link rel="stylesheet" href="resources/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="resources/css/bootstrap-theme.min.css" type="text/css">
        <link rel="stylesheet" href="resources/css/style.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script src="resources/js/bootstrap.min.js" ></script>
        <script src="resources/js/jquery-1.11.3.min.js" ></script>
        <script src="resources/js/bootstrap.js" ></script>
        <script src="resources/js/ajax_delt_pro.js" ></script>

    </head>
    <body>
        <div class="container">
            <header>

                <li class="glyphicon glyphicon-erase" style="font-size: 83px; color:#C12E2A"></li>
                <h2 class="btn-lg">welcome
                    <?php
                    echo $_SESSION['admin'] . " <a href='?page=logout'class='btn-danger' "
                    . "style='text-decoration:none;'>"
                    . "logout"
                    . "</a>";
                    ?>
                </h2> 
            </header>
            <div class="clear"></div>
            <div class="content">
                <aside>   
                    <nav>
                        <a class="btn-danger active" href="index.php"><i class="fa fa-home" aria-hidden="true"></i></i>
                            home page</a>
                        <a class="btn-danger active" href="?page=statistic"><i class="fa fa-tachometer" aria-hidden="true"></i>
                            statics</a>
                        <a class="btn-danger active" href="?page=product"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                            Products</a>
                        <a class="btn-danger active" href="?page=product_review"><i class=" fa fa-comments" aria-hidden="true"></i>
                            Products Review</a>
                        <a class="btn-danger active" href="?page=user"><i class="fa fa-users" aria-hidden="true"></i>
                            users</a>
                        <a class="btn-danger active" href="?page=cat"><i class="fa fa-tasks " aria-hidden="true"></i> Categories</a>
                        <a class="btn-danger active" href="?page=pages"><i class="fa fa-tasks" aria-hidden="true"></i> Companies</a>
                        <a class="btn-danger active" href="?page=comments"><i class="fa fa-comments" aria-hidden="true"></i>
                            comments</a>
                        <a class="btn-danger active" href="?page=library"><i class="fa fa-picture-o" aria-hidden="true"></i>
                            library</a>
                        <a class="btn-danger active" href="?page=Banners"><i class="fa fa-picture-o" aria-hidden="true"></i>
                            Banners</a>
                        <a class="btn-danger active" href="?page=pay"><i class="fa fa-credit-card" aria-hidden="true"></i>
                            payments</a>
                        <a class="btn-danger active" href="?page=admin"><i class="fa fa-user" aria-hidden="true"></i>
                            Admins</a>
                        <a class="btn-danger active"  href="http://localhost/app/app1/chat.php"><i class="fa fa-weixin" aria-hidden="true"></i>
                            Chat</a>
                        <a class="btn-danger active" href="?page=email"><i class="fa fa-envelope" aria-hidden="true"></i>
                            Email</a>
                    </nav>
                </aside>    
                <section style="overflow: hidden">
                    <?php
                    if (@$_GET['page']) {
                        $url = 'controler/' . $_GET['page'] . '.php';
                        if (is_file($url)) {
                            include $url;
                        } else {
                            echo " requested file not founde";
                        }
                    } else {
                        include 'controler/main.php';
                    }
                    ?> 
                </section>
            </div>
            <div class="clear"></div>
            <footer>
                <p> Copyright reserved - EA team </p>
            </footer>

        </div>
    </body>
</html>
