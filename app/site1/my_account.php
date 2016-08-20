<?php
if(!isset($_SESSION['username'])){
    header("location:?page=login.php");
}
include 'nav_bar.php';
?>
<script src="site1/resourses/js/js_my_account.js"></script>
<section class="account">
   
        <div class="container-fluid">
       <?php  include 'profile_header.php';?>
       </div>
    <div class="container">
        <div class="row">
        
      <?php  include 'account_list.php';?>

    <?php 
        $obj=new display("user_cart");
        $data=$obj->extra("select cart.phone_id ,pro.image,pro.name  from user_cart cart inner join specifications pro on cart.phone_id=pro.id where username='{$_SESSION['username']}'");
       
        $data2=$obj->extra("select  cart.product_id ,pro.image,pro.name,cart.deliver  from payments cart inner join specifications pro on cart.product_id =pro.id where username='{$_SESSION['username']}'");
       $ncart=  count($data);
        
     
     
        
        ?>
    
	
           
            <div class="col-md-7" style="margin-bottom: 190px;">
                 
            <?php       for($i=0;$i<count($data2);$i++){
                
               
            
                    $val=$data2[$i];
           
                ?>
              <div class=" col-xs-12 bs-wizard" style="border-bottom:0;">
                  <img src="app1/<?php echo $val['image'];?>" class="progress-img"/>
                  
                  <span class="progress-span"><?php echo $val['name'];?></span>
                
                <div class="col-xs-4 bs-wizard-step  <?php 
                if(!isset($data2[$i]))
                    echo 'active';
                else {
                    echo '  complete ';    
                }?>">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">in cart <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
</div>
                </div>
                
                <div class="col-xs-4 bs-wizard-step  <?php 
                if(!isset($data2[$i]))
                    echo 'disabled  ';
                else if($data2[$i]['deliver']){
                    echo ' complete ';    
                }
 else {
                    echo 'active';
 }
                ?>"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">purchase completed <i class="fa fa-usd" aria-hidden="true"></i>
</div>
                </div>
                
                <div class="col-xs-4 bs-wizard-step 
                     <?php 
                if(!isset($data2[$i])||$data2[$i]['deliver']==0)
                    echo 'disabled';
                else 
                    echo 'complete  active';
                ?>"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">delivered <i class="fa fa-truck fa-lg"></i></div>
                </div>
                
  
            </div>
	<?php  } ?>
                 <?php       for($i=0;$i<count($data);$i++){
                
               
            
                    $val=$data[$i];
           
                ?>
              <div class=" col-xs-12 bs-wizard" style="border-bottom:0;">
                  <img src="app1/<?php echo $val['image'];?>" class="progress-img"/>
                  
                  <span class="progress-span"><?php echo $val['name'];?></span>
                
                <div class="col-xs-4 bs-wizard-step active">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">in cart <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
</div>
                </div>
                
                <div class="col-xs-4 bs-wizard-step disabled"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">purchase completed <i class="fa fa-usd" aria-hidden="true"></i>
</div>
                </div>
                
                <div class="col-xs-4 bs-wizard-step disabled"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">delivered <i class="fa fa-truck fa-lg"></i></div>
                </div>
                
  
            </div>
	<?php  } ?>
      </div>
   </div>
 </div>
</section>




<?php include 'fotter.php'; ?>
  
