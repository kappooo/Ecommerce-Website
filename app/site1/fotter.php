
<script>
    $(document).ready(function () {
        var scrollbtn = $("#scroll");
        $(window).scroll(function () {
            $(this).scrollTop() >= 1000 ? scrollbtn.show() : scrollbtn.hide();
        });
        scrollbtn.click(function () {
            $("html,body").animate({scrollTop: 0}, 1200);
        });
    });
</script>
<section class="fotter">
    <div class="container">
        <div class="row">
            <div class="col-md-4  help col-xs-12">
                <div class="links_fotter">
                    <h2> Website Links </h2>
                    <ul class="list-inline">
                        <li><a href="index.php"> Home</a></li>
                        <li><a href="index.php?page=offers.php&searno=1"> Our Offers</a></li>
                        <li><a href="index.php?page=my_account.php"> My Account</a></li>
                        <li><a href="index.php?page=call_us.php"> Contact Us</a></li>
                        <li><a id="new" href=""> live chat </a></li>
                        <li><a href=""> Nile Cruise</a></li>
                        <li><a href=""> Gallery</a></li>
                        <li><a href=""> Information</a></li>
                        <li><a href="">Our Staff</a></li>
                        <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-ls">
                                Call Us</a>
                        </li>
                    </ul> 
                </div>
                <h3> Use The Following Browsers</h3>
                <div class="browsers">
                    <ul class="list-unstyled">
                        <li><a href=""><img src="site1/resourses/imgs/fotter/firefoxicon.png"></a></li>
                        <li><a href=""><img src="site1/resourses/imgs/fotter/gchromeicon.png"></a></li>
                        <li><a href=""><img src="site1/resourses/imgs/fotter/operaicon.png"></a></li>
                        <li><a href=""><img src="site1/resourses/imgs/fotter/safariicon.png"></a></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-4 help col-xs-12">
                <h2>Connect with us</h2>

                <div class="media">
                    <a href="#"class="pull-left"><li class="fa fa-headphones fa-lg"></li>
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">customers service</h4>
                        <p> 01093507928 </p>
                    </div>
                </div>
                <div class="media">
                    <a href="#" class="pull-left"><li class="fa fa-truck fa-lg"></li>
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Delivery service</h4>
                        <p>01095771266</p>
                    </div>
                </div>

                <div class="media">
                    <a href="#" class="pull-left"><li class="fa fa-phone-square fa-lg"></li>
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Hot line</h4>
                        <p>19777<p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 help copyright col-xs-12">
                <div id="scroll">
                    <li class="fa fa-chevron-up fa-3x"></li>
                </div>
                <h2>Mobily Site Copyrights</h2>
                <p >
                    If you have any problems browsing this web or any page of it 
                    please don't hesitate to contact us any time by sending an email at the following email address 
                    <a href="index.html"> mosae35@yahoo.com </a>
                    and we will handle this problem.<br/><br>
                    © Copyrights Reserved to Mobily Egypt 2016
                    Designed, Developed and Powered by <a href="index.html" title="made by mosa">Sky Team</a>
                </p>

            </div>
        </div>
    </div>
</section>
<!-- end  section fotter here -->




<!--///////////////// Large modal///////////////////// -->


<div class="modal fade bs-example-modal-ls" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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




</body>
</html>
