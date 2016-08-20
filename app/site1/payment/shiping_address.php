<?php
if (!isset($_SESSION['username'])) {
    header("location:?page=login.php");
}
foreach ($_SESSION as $key1 => $value1) {
    if (substr($key1, 0, 7) != 'product') {

        $flag = TRUE;
    } else {

        $flag = FALSE;
        break;
    }
}
if ($flag)
    header("location:?page=index.php");

include 'site1/nav_bar.php';
?>
<section class="cart_in_address">
    <div class="container">
        <h1 class="title_address">shipping address</h1>
        <div class="row">
            <div class="col-lg-4">
                <h5>SHOPPING CART <a class="back_shoping" href="?page=check_out.php">Back to cart</a></h5>
                <div class="all_cart">
                    <?php
                    $total_price = 0;
                    foreach ($cart_address as $value) {
                        echo"
                    <div class='cart_product'>
                        
                        <img src='app1/{$value['product_image']}'>
                        <h5>
                            {$value['product_name']}
                            <br>{$value['product_price']}   EGP
                            <br>Qty: {$value['quantity']}
                              
                        </h5>
                    </div>
                   
                    ";
                        $total_price +=$value['product_price'];
                    }
                    ?>

                </div>
                <div class="total_price text-center">
                    <h4>
                        Total: <?php echo $total_price; ?> EGP
                        <br> +  Shipping: <?php echo $shiping = 10.0; ?> EGP
                    </h4>
                </div>
                <div class="grand_total text-center">
                    <h4> GRAND TOTAL </h4>
                    <h2><?php echo $garnd = $total_price + $shiping; ?> EGP</h2>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="">
                    <div class="shiping_address">
                        <form method="post" >
                            <button type="button" class="btn-default input-lg new_address"
                                    data-toggle="modal" data-target="#exampleModal" 
                                    data-whatever="@mdo"> Edit 
                            </button>
                        </form>
                        <div class="info_address">
                            <?php
                            echo<<<EOD
                            <h5>
                               {$address_info['fristname']} , {$address_info['city']} City<br>
                               {$address_info['email']}<br>
                               {$address_info['city']} City, {$address_info['address']}, <br>
                               Egypt<br>
                               {$address_info['telephone']}<br>
                            </h5>
EOD;
                            ?>
                        </div>


                        <!-- ////////////////////// start payment method for mony///////////////////////////////////////////// -->

                        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
                        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
                        <script>
                            $(function () {
                                $("#tabs").tabs();
                            });
                        </script>

                        <h3 style="margin-top: 70px;margin-bottom: -65px;">
                            How would you like to pay?
                        </h3>

                        <div id="tabs" style="margin-top: 80px;">
                            <ul>
                                <li><a href="#tabs-1"> <img style="width: 100px;height: 30px;" src="site1/resourses/imgs/paypal2.png"> 
                                    </a>
                                </li>
                                <li><a href="#tabs-2">Proin dolor</a></li>
                                <li><a href="#tabs-3">Aenean lacinia</a></li>
                            </ul>
                            <div id="tabs-1">
                                <h5 style="margin-bottom: -114px;">
                                    Click to connect to PayPal. 
                                    <span style="color:#c1c1c1;">(You won't be charged until the order is placed.)</span>
                                </h5>


                                <!-- //////////////////// start form of payment by paypal //////////////////////////////   -->
                                <form class="pay" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

                                    <!-- Identify your business so that you can collect the payments. -->
                                    <input type="hidden" name="business" value="sell_test@shop.com">

                                    <!-- Specify a Buy Now button. -->
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="upload" value="1">
                                    <?php
                                    $item;
                                    $number_product = 1;
                                    foreach ($_SESSION as $key => $value) {
                                        if ($key != 'username') {
                                            $id = substr($key, 7);
                                            $pro = new display('specifications');
                                            $session_product = $pro->get_data_by_id($id);
                                            if ($session_product['sale'] > 0)
                                                $sub_total = (round($session_product['price'] - ($session_product['price'] / $session_product['sale']))) * $value;
                                            else
                                                $sub_total = $session_product['price'] * $value;


                                            $storage = explode('_', $session_product['memory']);

                                            if (@$_SESSION['product' . $id] != 0) {
                                                ?>


                                                <input type="hidden" name="item_name_<?php echo $number_product ?>" value="<?php echo $session_product['name']; ?>"/>
                                                <input type="hidden" name="amount_<?php echo $number_product ?>" value="<?php
                                                if ($session_product['sale'])
                                                    echo (round($session_product['price'] - ($session_product['price'] / $session_product['sale'])));
                                                else
                                                    echo $session_product['price'];
                                                ?>"/>
                                                <input type="hidden" name="quantity_<?php echo $number_product ?>" value="<?php echo $_SESSION['product' . $id]; ?>"/>


                                                <?php
                                                $number_product++;
                                            }
                                        }
                                    }
                                    ?>
                                    <input type="hidden" name="currency_code" value="USD"/> 
                                    <input type="hidden" name="return" value="http://localhost/app/index.php?page=payment/success.php"
                                           " />
                                    <input type="hidden" name="cancel_return" value="http://localhost/app/index.php?page=payment/unsuccess.php"
                                           " />


                                    <!-- Display the payment button. -->
                                    <input type="image" name="submit" border="none"
                                           src="site1/resourses/imgs/paypal.jpg"
                                           style="width: 157px;height: 36px;margin-bottom: -76px;"
                                           alt="PayPal - The safer, easier way to pay online">


                                </form>
                                <!-- //////////////////// end form of payment by paypal //////////////////////////////   -->



                            </div>
                            <div id="tabs-2">
                                <p>Morbi tincidunt, dui sit amet facilisis feugiat, </p>
                            </div>
                            <div id="tabs-3">
                                <p>Mauris eleifend est et turpis. Duis id erat.usce in lacus. Vivamus 
                                    a libero vitae lectus hendrerit hendrerit.
                                </p>
                            </div>
                        </div>
                        <!-- ////////////////////// end payment method for mony///////////////////////////////////////////// -->



                    </div>
                </div>
                <div class="next">

                </div>










            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</section>
<!-- start form add new address  -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">FristName :</label>
                        <input type="text" name="fristname" value="<?php echo $address_info['fristname']; ?>" 
                               class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Telephone Number :</label>
                        <input type="text" name="telephone" value="<?php echo $address_info['telephone']; ?>" 
                               class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Email Address :</label>
                        <input type="email" name="email" value="<?php echo $address_info['email']; ?>" 
                               class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">City:</label>
                        <input type="text" name="city" value="<?php echo $address_info['city']; ?>" 
                               class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">   
                        <label for="message-text" class="control-label">Address:</label>
                        <input type="text" name="address" value="<?php echo $address_info['address']; ?>" 
                               class="form-control" id="recipient-name">
                        <input type="submit" name="submit" style="margin-top: 20px;"
                               value="Edit" class="btn btn-primary"> 
                    </div>    
                </form> 

            </div>
        </div>
    </div>
</div>
</section> 
<!-- end form add new address  -->


<?php
include 'site1/fotter.php';
?>
