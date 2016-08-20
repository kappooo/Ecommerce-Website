<?php
if(!isset($_SESSION['username']))
{
          header ("location:index.php");
}
$flag=FALSE;
 foreach ($_SESSION as $key1 => $value1) 
 { if (substr($key1, 0, 7) != 'product')
    {
        $flag=TRUE;
    }
    else
    {
        $flag=FALSE;
        break;
    }  
}
    if($flag)
     header ("location:index.php");
    
    
 include 'site1/nav_bar.php';
?>
<section class="title">
    <div class="container">
        <div class="alert text-center lead alert-success" style="margin: 100px auto 50px;">
                <strong>Congratulations !</strong> you have successful payment <?php echo $_SESSION['username'];?>
                <br/><br/><a href="index.php?page=my_account.php" class="btn  btn-primary">proceed to your account</a>
            </div>
      
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
                  
                </tr>
                <?php
                $olddata=array();
                $newdata=array();
                $all=array();
                $number_product = 1;
                global $item;
                $item = 0;
                $cart_total = 0;
              
                foreach ($_SESSION as $key => $value) {
                    if (substr($key,0,7) == 'product') {
                        $id = substr($key, 7);
                        $pro = new display('specifications');
                        $session_product = $pro->get_data_by_id($id);
                       
                        $all[]=$session_product;
                        
                        $olddata[]=$session_product['product_quantity'];
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
               
                
                </td>
                <td><p class='lead'>";
                  if($session_product['sale']>0)
                      echo (round($session_product['price'] - ($session_product['price'] / $session_product['sale'])));
                        else
                           echo $session_product['price'];

                           
                           echo " (EGP)</p></td>
                <td><p class='lead'>{$_SESSION['product' . $id]} </p></td>
                    
                <td><p class='lead'>$sub_total (EGP)<p></td>
               
 
               </tr>
                       ";
                        }
                    }
                }
                if (@$_SESSION['product' . @$_GET['id']] == 0) {
                    unset($_SESSION['product' . @$_GET['id']]);
                }
                echo "</table>";
                ?> 

        </div>
    </div>
</section>

<!--start section subtotal -->
<?php
              
$payment=array();

$trans_id=  str_shuffle(time().$_SESSION['username']."kappooahmed");
$time=  date("Y-m-d h:i:sa");

foreach ($all as $data)
{

    $data['product_quantity']=$data['product_quantity']-$_SESSION['product'.$data['id']];
    
  $payment['trans_id']=$trans_id;
  $payment['product_id']=$data['id'];
  $payment['username']=$_SESSION['username'];
  $payment['qty']=$_SESSION['product'.$data['id']];
  $payment['date']=$time;
  unset($_SESSION['product'.$data['id']]);
   $update=new update('specifications',$data,$data['id']);
   new add($payment, "payments");
    
}

                
                

$del=new delete('user_cart');
$del->delete_by_username($_SESSION['username']);
include 'site1/fotter.php';
?>
 
