<?php
include 'nav_bar.php';
?>
<section class="title">
    <div class="container">
        <h1> Shopping Cart </h1>
        
            <?php
            if (isset($_GET['id'])) {
                echo @$message;
            }
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
                            $number_product=1;
                            global $item;
                            $item=0;
                            $cart_total = 0;
                            foreach ($_SESSION as $key => $value) {
                                if ($key != 'username') {
                                    $id = substr($key, 7);
                                    $pro = new display('specifications');
                                    $session_product = $pro->get_data_by_id($id);
                                    $sub_total = $session_product['price'] * $value;
                                    $item+=$value;
                                    $cart_total +=$sub_total;
                                    $storage= explode('_',$session_product['memory']);
                                    
                                    if ($_SESSION['product' . $id] != 0) {
                                        echo " 
                <tr>
                <td style='padding-left:20px;'>";
                 echo  "<h4 class='number'> (".$number_product++.")</h4>".
                 "
                   <p class='lead name'><a href='?page=specifications.php&&id=$id'>{$session_product['name']}</a></p>
                   <img src='app1/{$session_product['image']}'>
                   <ul>
                     <li>Status : new</li>
                     <li>storage capacity : {$storage[0]},<br>{$storage[1]}</li>
                     <li>color : black </li>
                     <li>by : {$session_product['type']}</li>
                     
                   <ul>
                </td>
                <td><p class='lead'>&#36;{$session_product['price']}</p></td>
                <td><p class='lead'>{$_SESSION['product' . $id]}</p></td>
                    
                <td><p class='lead'>&#36;$sub_total<p></td>
                <td>
                <p ><a href = '?page=check_out.php&&id={$id}&&remove={$id}'><span style='color:#EBB115'class='fa fa-minus fa-3x'></span></a></p>
                <p><a href = '?page=check_out.php&&id={$id}&&add={$id}'><span style = 'color:#0E9D07;' class = 'fa fa-plus fa-3x'></span></a></p>
                <p><a href = '?page=check_out.php&&id={$id}&&delete={$id}'><span style = 'color:#C12E2A;' class = 'fa fa-remove fa-3x'></span></a></p>
                </td>
                            </tr>";
                                    }

                               
                                }
                                
                            }
                            if(@$_SESSION['product' . @$_GET['id']]== 0)
                                {
                                    unset($_SESSION['product' . @$_GET['id']]);
                                }

                            echo "</table>";
                            if (!isset($_SESSION['username'])and count($_SESSION)>=1) {
                                echo "
                                     <h3>
                                      <a class='btn-succuss' href='index.php'> back to shoping</a>
                                     </h3>
                                     ";
                            } elseif (isset($_SESSION['username'])and count($_SESSION)>1) {
                                echo '
                                      
                                     <h3 class="back">
                                      <a class="back btn-succuss" style="margin-top:10px;" 
                                     href="index.php">back to shoping</a>
                                     </h3>';
                                
                            }
                            elseif (@$_SESSION['product' . $id] == 0) {
                            
                             echo 
                                     '<h3 ">
                                      <a class="back btn-succuss" style="margin-top:10px;" 
                                     href="index.php">back to shoping</a>
                                     </h3>';
                            }
                            ?> 
                            
                    </div>
                </div>
</section>

            <!--start section subtotal -->
<section class="total">
                <div class = "container">
                    <div class = "row">
                        <div class = "col-lg-offset-8">
                            <h1>Cart Totals</h1>
                            <div class = "cart_total">
                                <table class = "table-bordered" style = "width: 300px;
                                       " >
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
                                </table>
                                <a href="" class="btn-success process_check">
                                    Proceed to checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
</section>
          <!--end section subtotal -->
            <?php
            include 'fotter.php';
            ?>