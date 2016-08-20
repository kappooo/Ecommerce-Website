<section class="deal hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-5 ">
                <a href="index.php?page=offers.php&searno=1" style="text-decoration: none;">
                    <div class="more_deals">
                        <img src="site1/resourses/imgs/deals-en2.png" alt="deals of todya">
                        <h5> New Sales </h5>
                        <h4> Fast Shipping </h4>
                        <h6> Shop Now </h6>
                    </div>
                </a>    
            </div>

            <?php
            $products = new display('specifications');
            $product = $products->random_sel("where sale >0", 1);
            ;
            ?>
            <div class="col-md-7 hidden-sm">
                <a href="?page=specifications/specifications.php&id=<?php echo $product[0]['id']; ?>" 
                   style="text-decoration: none;">
                    <div class="one_deal">
                        <div class="col-md-2">
                            <img src="app1/<?php echo $product[0]['image']; ?>" alt="sale for this product">
                        </div>
                        <div class="col-md-4">
                            <h4><?php echo $product[0]['name']; ?></h4>
                        </div>
                        <div class="col-md-2">
                            <h5> Price<br><span><?php echo 
                            round($product[0]['price'] - ($product[0]['price'] / $product[0]['sale']));?></h5>
                        </div>
                        <div class="col-md-3">
                            <h6> Shop Now </h6>
                        </div>
                    </div>
                </a>    
            </div>
        </div>
    </div>
</section>