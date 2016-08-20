
<script src="site1/resourses/js/js_chat.js"></script>
<section class="support">

    <div class="call_u">

        <div  class="container">
            <div class="text-center">
                <h3 class="text-center"> Welcome In Your Support  </h3>
                <div class="col-md-4 col-xs-12 ">
                    <?php
                    if (isset($_SESSION['user_chat']) && isset($_SESSION['admin_chat'])) {
                        echo<<<EOD
                        
                    <a href="#" onclick="get_page()">
                        <div class="chat" id="new">
                            <span class=" glyphicon glyphicon-comment "> </span>
                        </div>
                        <span class="desc"> live chat </span> 
                    </a>
EOD;
                    } else {
                        echo<<<EOD
                        
                        <a href="#">
                        <div class="chat" id="new">
                            <span class=" glyphicon glyphicon-comment "> </span>
                        </div>
                        <span class="desc"> live chat </span> 
                    </a>
EOD;
                    }
                    ?>
                </div>
                <div class="col-md-4 col-xs-12">
                    <a href="?page=call_us.php">
                        <div class="chat">
                            <span class="glyphicon glyphicon-envelope "> </span>
                        </div>
                        <span style="" class="desc"> Send Message </span> 
                    </a> 
                </div>
                <div class="col-lg-4 col-xs-12">
                    <a href="#" data-toggle="modal" data-target=".bs-example-modal-ln">
                        <div class="chat">
                            <span class="fa fa-phone "> </span>
                        </div>
                        <span style="" class="desc"> CALL </span> 
                    </a> 
                </div>
            </div>
        </div>
    </div>
</section>


<!--///////////////// Large modal///////////////////// -->


<div class="modal fade bs-example-modal-ln" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content support_service">
            <button style="font-size: 30px;margin-right: 5px;" type="button" class="close" 
                    data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="chat">
                <span class="fa fa-phone "> </span>
            </div>
            <div class="support_call">
                <h4> CUSTOMER SERVICE </h4>
                <h5> <li class="glyphicon glyphicon-envelope"> </li> Contact us </h5>
                <h3> (+2) 19932 </h3>
                <h5 class="days"> Sat - Thu: 10 AM to 10 PM </h5>
            </div>
            <div class="support_call">
                <h4> CALL TO ORDER </h4>
                <h5> <li class="glyphicon glyphicon-envelope"> </li> Contact us </h5>
                <h3> (+20) 21602100 </h3>
                <h5 class="days"> Daily, 9 AM to 10 PM </h5>
            </div>
             <div class="follow_us ">
                <h4> FOLLOW US: </h4> <br>
                <ul class="list-unstyled">
                    <li> <img src="site1/resourses/imgs/call/tw.png"> </li>
                    <li> <img src="site1/resourses/imgs/call/fa.png"> </li>
                    <li> <img src="site1/resourses/imgs/call/yt.png"> </li>
                    <li> <img src="site1/resourses/imgs/call/ins.png"> </li>
                    <li> <img src="site1/resourses/imgs/call/go+.png"> </li>
                </ul>
            </div>
        </div>
    </div>
</div>