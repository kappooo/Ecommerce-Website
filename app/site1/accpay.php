<?php
if(!isset($_SESSION['username'])){
    header("location:?page=login.php");
}
include 'nav_bar.php';
?>
<script src="site1/resourses/js/js_my_account.js"></script>
<section class="account">
   <div class="container-fluid">
       <?php include 'profile_header.php'; ?>
    </div>
    <div class="container">
        <div class="row">
        
      <?php                        include 'account_list.php';?>

    <?php 
        $obj=new display("payments");
        $sz=$obj->extra("select distinct trans_id from payments where username='{$_SESSION['username']}'");
        ?>
    
	
            <div class="col-md-3">
            <form action="#" method="get" style="margin-top:70px; ">
                <div class="input-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
            <div class="col-md-7" style="margin-bottom: 190px;">
                 
                    <table class="table table-list-search" style="margin-bottom: 100px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>product</th>
                            <th>Quantity</th>
                            <th>Transaction id</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        
                       <?php for ($i=0;$i<count($sz);$i++) {
    
                           $data=$obj->extra("select * from payments where trans_id='{$sz[$i]['trans_id']}'");
                 
                           $product=new display("specifications");
                           $pro=$product->get_data_by_id($sz[$i]);
                       
                           echo "
                        <tr>
                            <td>".($i+1)."</td>
                            <td>";
                     $time=explode(" ",$data[0]["date"]);
                     echo $time[1]."<br/>".$time[0];
             echo "</td>
                            <td>";
                            for($j=0;$j<count($data);$j++)
                            { $pro=$product->get_data_by_id($data[$j]['product_id']);
                                echo "<a href='?page=specifications/specifications.php&&id={$pro['id']}'> <strong>". ($j+1)." - ".substr($pro['name'],0,26)."</strong></a><br/>";
                            }
                                    
                                echo "</td>
                             <td>";
                            for($j=0;$j<count($data);$j++)
                            { 
                                echo $data[$j]['qty']."<br/>";
                            }
                                    
                                echo "</td>
                              <td>{$data[0]["trans_id"]}</td>
                           
                       </tr>";}?>
                    
                    </tbody>
                </table>   
		</div>
	</div>
    </div>
</section>




<?php include 'fotter.php'; ?>
  
