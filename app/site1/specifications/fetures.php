
<div class="fe col-xs-12" style=" margin-top: 15px;margin-left: -150px;">

    <?php
    if ($_GET['page'] != 'specifications/specifications.php') {
        echo<<<EOD
                    
                <a href="index.php?page=specifications/specifications.php&id=$id" 
                   class="fa fa-angle-double-left produ_specific " > Specifications
                </a>
EOD;
    } else {
        echo<<<EOD
                    
                <a style='border-bottom: 5px solid;color: #3445a5;' 
                    href="index.php?page=specifications/specifications.php&id=$id" 
                   class="fa fa-angle-double-left produ_specific " > Specifications
                </a>
EOD;
    }

    if ($_GET['page'] == 'specifications/comments.php') {
        echo<<<EOD
                
                <a style='border-bottom: 5px solid;color: #3445a5;' 
                    href="index.php?page=specifications/comments.php&id=$id" 
                    class="fa fa-comment produ_specific " > Comments
                </a>
EOD;
    } else {
        echo<<<EOD
                   
                    <a href="index.php?page=specifications/comments.php&id=$id" 
                   class="fa fa-comment produ_specific " > Comments
                </a>
                
EOD;
    }
    ?>

   <!-- <a href="index.php?page=compare.php&id=<?php //echo $id; ?>&cate_id=<?php //echo $cate_id; ?>" 
       class="fa fa-arrows-v produ_specific "> Compare 
    </a>-->
    
    <a href="index.php?page=compare.php&id=<?php echo $id;?>" 
       class="fa fa-arrows-v produ_specific "> Compare 
    </a>

    <?php
    if ($_GET['page'] == 'specifications/picture.php') {
        echo<<<EOD
                
                <a style='border-bottom: 5px solid;color: #3445a5;' 
                    href="index.php?page=specifications/picture.php&id=$id" 
                    class="fa fa-picture-o produ_specific " > Picture
                </a>
EOD;
    } else {
        echo<<<EOD
                   
                <a href="index.php?page=specifications/picture.php&id=$id" 
                   class="fa fa-picture-o produ_specific " > Picture
                </a>
                
EOD;
    }

    if ($_GET['page'] == 'specifications/video.php') {
        echo<<<EOD
                
                <a style='border-bottom: 5px solid;color: #3445a5;' 
                    href="index.php?page=specifications/video.php&id=$id" 
                    class="fa fa-youtube-play produ_specific " > Video
                </a>
EOD;
    } else {
        echo<<<EOD
                   
                <a href="index.php?page=specifications/video.php&id=$id" 
                   class="fa fa-youtube-play produ_specific " > Video
                </a>
                
EOD;
    }
    ?>

</div>
<hr style="    margin-left: 29px;    width: 713px;
    margin-top: 9px;">
