<?php
include 'nav_bar.php';
?>
<section class="title">
    <div class="container">
        <h2> Shopping Cart <li class="fa fa-cart-arrow-down"></li></h2>

        <?php
        // if (isset($_GET['id'])) {
        echo @$message;
        //  }
        ?>
    </div>
</section>

<section class="check_out">
    <div class="container ">
        <div class="item">
            <table class="table table-responsive ">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub-Total</th>
                    <th>Action</th>
                </tr>
                <?php
                $number_product = 1;
                global $item;
                $item = 0;
                $cart_total = 0;
                foreach ($_SESSION as $key => $value) {
                    if ($key != 'username') {
                        $id = substr($key, 7);
                        $pro = new display('specifications');
                        $session_product = $pro->get_data_by_id($id);
                        if($session_product['sale']>0)
                        $sub_total = (round($session_product['price'] - ($session_product['price'] / $session_product['sale'])))* $value;
                        else
                            $sub_total=$session_product['price']*$value;
                        $item+=$value;
                        $cart_total +=$sub_total;

                        if (@$_SESSION['product' . $id] != 0) {
                            echo " 
                <tr>
                <td style='padding-left:20px;'>";
                            echo "<h4 class='number'> (" . $number_product++ . ")</h4>" .
                            "
                   <p class='lead name'>
                   <a href='?page=specifications/specifications.php&&id=$id&cate_id={$session_product['cat_id']}'>"
                   . "{$session_product['name']}</a></p>
                       
                   <img src='app1/{$session_product['image']}'>
               
                
                </td>";
                   if($session_product['sale'] > 0)
                       echo 
                         "<td><p class='lead'>".round($session_product['price'] - ($session_product['price'] / $session_product['sale']))." (EGP)</p></td>";
                       else echo "
                
                <td><p class='lead'>{$session_product['price'] } (EGP)</p></td>";
                echo "
                <td><p class='lead'>{$_SESSION['product' . $id]}</p></td>
                    
                <td><p class='lead'>$sub_total (EGP)<p></td>
                <td>
                <p ><a href = '?page=check_out.php&&id={$id}&&remove={$id}'><span style='color:#EBB115'class='fa fa-minus fa-2x'></span></a></p>
                <p><a href = '?page=check_out.php&&id={$id}&&add={$id}'><span style = 'color:#0E9D07;' class = 'fa fa-plus fa-2x'></span></a></p>
                <p><a href = '?page=check_out.php&&id={$id}&&delete={$id}'><span style = 'color:#C12E2A;' class = 'fa fa-remove fa-2x'></span></a></p>
                </td>
 
               </tr>
                       ";
                        }
                    }
                }
                if (@$_SESSION['product' . @$_GET['id']] == 0) {
                    unset($_SESSION['product' . @$_GET['id']]);
                }
              
                ?> 
            </table>
        </div>
    </div>
</section>

<!--start section subtotal -->
<section class="total">
    <div class = "container">
        <div class = "row">
            <?php
            if (isset($_GET['page']) && $_GET['page'] == 'check_out.php' && $item1 == 0) {
                echo "<h3 class='msg_cart'> Your Cart is Empty Now</h3>";
            }
            ?>
            <div class="col-sm-4">
                <a href="index.php" class="btn btn-danger back">
                    <li class="fa fa-backward"></li> back to shopping 
                </a>
            </div>
            <div class = "col-sm-offset-8">
                <h1>Cart Totals</h1>
                <div class = "cart_total">
                    <?php 
                    $obj_cart=new display('user_cart');
                    $havepurchaes=$obj_cart->countrows('username', $_SESSION['username']);                    
                    if($havepurchaes[0]>0){ ;?>
                    <table class = "table-bordered">
                        <tr>
                            <th>Items</th>
                            <td><?php echo $item; ?></td>
                        </tr>
                        <tr>
                            <th>shiping and handling</th>
                            <td>free</td>
                        </tr>
                        <tr>
                            <th>cart-total</th>
                            <td><?php echo '$' . $cart_total; ?></td>
                        </tr>
                    </table> <?php } ?>
                    
                    <?php ;
                        $no=0;
                       foreach ($_SESSION as $key1 => $value1) 
                        {
                            if(substr($key1, 0,7)=='product')
                            {$no++;}

                        }
                      
                                
                   echo' <a href="?page=payment/shiping_address.php" class="btn btn-success process_check';
                   if(!$no)    echo " disabled ";echo '">
                        Proceed to checkout
                    </a>'
                             ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end section subtotal -->
<?php
include 'fotter.php';
?>