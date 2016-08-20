 

<?php
    include 'nav_bar.php';
    include 'deal.php';
    include 'slide.php';
    
    $product_specific['id']=0;
    $objs=new display(('categorey'));
    $datas=$objs->random_sel("", 4);
    
  for($z=0;$z<count($datas);$z++){
      echo "<h3 class='text-left rel'>{$datas[$z]['cat_name']} </h3>";
  $product_specific['cat_id']=$datas[$z][0];
  include 'specifications/related_pro.php';
  
  }
    include 'products.php';
    include 'support/support.php';
    include 'client_says/client_says.php';
    include 'chat/chat.php';
    include 'fotter.php';
?>
