


<section class="break">
    <div class="container text-center">
        <div class="row">
            <div style=" border-bottom: solid #DDD 1px;  position: relative ;top:44px; width: 515px;">

            </div>
            <div style="position: relative; top: 5px;" >
                <h2 class="text-center glyphicon glyphicon-earphone"></h2>
            </div>
            <div class="" style="border-bottom: solid #DDD 1px; position: relative; top:-16px;left: 645px;  width: 500px;"">

            </div>
        </div>
    </div>
</section>



<!-- start  section CONTACT_US here -->
<section class="contact_us">
    <div class="cover">
        <div class="container text-center">
            <li class="fa fa-headphones fa-5x" style="color: #b92c28;"></li>
            <h3>tell Us What You Fell</h3>
            <p class="lead"> Feel Free To Conntact Us Anytime</p>

            <div class="row">
                <div class=" col-lg-12">
                    <form method="post" action="#">
                        <div class="form-group col-lg-6" >
                            <input type="email" required="" name="email" class="input-lg" placeholder="Your Mail" >
                            <div class="form-group">
                                <input type="text" required="" name="subject" class="input-lg" placeholder="Message Subject">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <textarea required="" name="message" placeholder = " Your Message "></textarea>
                            <input type="submit" class="btn-danger input-lg" name="submit" value="Sending">
                        </div>
                        <?php
                        email();
                        ?>
                    </form>
                </div>    
            </div>
        </div>
    </div>
</section>
<!-- end section contact_us-->


<!--Start SECTION Testimonial HERE --> 
<section class="testimonial  text-center" >
    
<?php include 'client_says/client_says.php';   ?>
</section>
<!--END SECTION Testimonial HERE -->



