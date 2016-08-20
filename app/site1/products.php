
<!-- start section our offers  -->
<section class="our_offers text-center">
    <div class="container">
     
        <div class="row">
              
            <?php
            for ($i = 0; $i < count($all_products); $i++) {
                $all_products[0]=$all_products[$i];
                include 'pro.php';
            }
               ?>
        </div>
    </div>
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" style="margin-top: 85px;">
            <div class="modal-content" id="place">

            </div>
        </div>
    </div>

</section>



<!-- end section our offers  -->