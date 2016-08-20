


<!--START SLIDE SHOW HERE --> 
<div  class="hidden-xs">
<div id="myslide" class="carousel slide" data-ride="carousel" style="height: 410px;" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myslide" data-slide-to="0" class="active"></li>
        <li data-target="#myslide" data-slide-to="1"></li>
        <li data-target="#myslide" data-slide-to="2"></li>
        <li data-target="#myslide" data-slide-to="3"></li>
        <li data-target="#myslide" data-slide-to="4"></li>
        <li data-target="#myslide" data-slide-to="5"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

        <div class='item active'>
            <img src='site1/resourses/imgs/slide/slid1.jpg' style='width: 100%; height: 400px;' alt='...'>
            <div class='carousel-caption'>
                <h3> Mobily </h3>
            </div>
        </div>

        <?php
        for ($i = 0; $i < count($all_slides); $i++) {
            echo "
                <div class='item'>
                    <img src='app1/{$all_slides[$i]['banner_url']}' style='width: 100%; height: 400px;' alt='...'>
                    <div class='carousel-caption'>
                        mobily
                    </div>
                 </div>";
        }
        ?>
    </div>

</div>


<!-- Controls -->
<a style="height: 401px; margin-top: 74px;" 
   class="left carousel-control" href="#myslide" role="button" data-slide="prev" >
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a style="height: 401px; margin-top:74px;" 
   class="right carousel-control" href="#myslide" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div> 
<!--END SLIDE SHOW HERE -->