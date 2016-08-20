
<script>
// Carousel Auto-Cycle
    $(document).ready(function () {
        $('.carousel').carousel({
            interval: 666666000
        })
    });

</script>
<?php 
        if(!isset($_GET['page']))
            $calss='newrel';
        else
            $calss='';
                    $obj=new display("specifications");
                    $data=$obj->random_sel("where cat_id={$product_specific['cat_id']} and id<>{$product_specific['id']}", 16);
                    $k=0;
                    if(count($data)>0){
                         $noperslide=6;
                    $all= ceil(count($data)/ $noperslide);?>

<div class="">
   
    <div class="col-xs-12 col-lg-12 col-lg-offset-0 related_pro">
        <?php if(isset($_GET['page'])){?>
        <h3 class="text-center"> Related Products </h3><hr><?php }?>
        <div class="carousel slide" id="myCarousel<?php echo $product_specific['cat_id'];?>">
            <div class="carousel-inner">
                
                    
                    <?php
                   
                for($i=0;$i<$all;$i++){ echo'
                <div class="item ';if ($i==0)echo 'active'; echo'">
                    <ul class="thumbnails">';
                if($i==($all-1))
                {
                    $temp=count($data)-$noperslide*$i;
                    
                    $perslide =$temp+$i*$noperslide;
                   
                }
                else {
                        $perslide=$i*$noperslide+$noperslide;
                }
                for($j=$i*$noperslide;$j<$perslide;$j++)
                {echo'
                        <li class="col-sm-2   style="text-align: center;">
                           
                                <div class="thumbnail">
                                    <a href="?page=specifications/specifications.php&&id='.$data[$k]['id'].'"><img src="app1/'.$data[$k]['image'].'" alt=""></a>
                                </div>
                                <div class="caption" style="border: 1px solid #DDD ;margin-top: -17px;">
                                    <h4 style="height: 35px;">'.$data[$k]['name'].'</h4>
                                    
                                    <p class="center-block price">';
                if($data[$k]['sale'])
                       echo round($data[$k]['price'] - ($data[$k]['price'] / $data[$k]['sale']));
                else 
                    echo $data[$k]['price'];
                
                        echo ' egp</p>
                                    <a class="btn btn-mini" href="?page=check_out.php&id='.$data[$k]['id'].'&add='.$data[$k]['id'].'">» ADD TO Cart </a>
                                </div>
                          
                </li>';$k++;}
                    echo '
                        
                    </ul>
                </div>';}?>

         

            </div>


            <nav>
                <ul class="control-box pager">
                    <li><a data-slide="prev" href="#myCarousel<?php echo $product_specific['cat_id'];?>" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
                    <li><a data-slide="next" href="#myCarousel<?php echo $product_specific['cat_id'];?>" class=""><i class="glyphicon glyphicon-chevron-right"></i></a></li>
                </ul>
            </nav>
            <!-- /.control-box -->   

        </div><!-- /#myCarousel -->

    </div><!-- /.col-xs-12 -->          

</div><!-- /.container -->
                    <?php } ?>
