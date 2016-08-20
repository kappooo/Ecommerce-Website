
<button type="button"
        class="profile_pic btn btn-default" data-toggle="modal" data-target=".bs-example-modal-pro_img">
    <li class="fa fa-camera"></li> Update Picture
</button>

<?php
if (isset($_POST['submit']) && $_POST['submit'] == 'Delete selected') {
    $arr_val = @$_POST['delte'];
    if (count($arr_val) == 0) {
        echo'<div style="position:relative;left:559px; background:white;'
        . 'border: 1px solid #000;width:321px;margin-left: 261px;    font-size: 28px;">'
        . '<h3 style="text-align: center;margin-left: 10px; margin-top: 8px;"'
        . '<h4 class="fa fa-exclamation-triangle" style="color:brown;"></h4>'      
        . ' No Items Selected'
        . '<i class="fa fa-spinner fa-pulse fa-1x fa-fw margin-bottom"></i>
           <span class="sr-only">Loading...</span>'
        . '</h3>'
        . '</div>';
        echo " <meta http-equiv='refresh' content='3; "
        . "url=http://localhost/app//index.php?page=my_account.php' />";
    } else {
        $obj_delt = new delete_files();
        $delet_pic_prof = $obj_delt->delete_file($arr_val);
        if ($delet_pic_prof == TRUE) {
            echo'<div style="position:relative;left:559px; background:white;'
            . 'border: 1px solid #000;width:321px;margin-left: 261px;    font-size: 28px;">'
            . '<h3 style="text-align: center;margin-left: 10px; margin-top: 8px;" class="fa fa-check-circle"'
            . '> Deleted Successfuly '
            . '<i class="fa fa-spinner fa-pulse fa-1x fa-fw margin-bottom"></i>
           <span class="sr-only">Loading...</span>'
            . '</h3>'
            . '</div>';
            echo " <meta http-equiv='refresh' content='3; "
            . "url=http://localhost/app//index.php?page=my_account.php' />";
        }
    }
}
?>

<div class="modal fade bs-example-modal-pro_img" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header" style="margin-bottom: 10px;">
             
                 <?php
             if(file_exists($img['img'])){
                 echo "<img style='float: left; margin-left: 9px; width: 129px;height: 116px; ' 
                     class='profil_img img-thumbnail' src='{$img['img']}'>";
             }else{
                 echo '<img class="profil_img img-thumbnail" '
                 . 'src="app1/resources/upload/profile_img/anonymous.png">';
             }
                 
            ?> 
                
                
                
                
                <form style="float: left; margin-bottom: 24px;" method="post" enctype="multipart/form-data" >
                    <input class="inp_up btn-primary" type="file" name="image[]" 
                           style="margin-top: 32px;margin-left: 10px;" >
                    <input class="btn_up btn-success input-lg" type="submit"
                           name="submit" value="update profile picture" style=" margin-left: 10px;">
                </form>

            </div>
            <hr style="clear:both;">
            <h3 style="margin-top: -12px;margin-left: 20px;margin-bottom: 13px;"> 
                Old Picture 
            </h3>
            <p> click on picture to make it your profile picture </p>
            <?php
            $dir_pic = "app1/resources/upload/profile_img/" . $_SESSION['username'];
            if (is_dir($dir_pic)) {
                $imgs = scandir("app1/resources/upload/profile_img/" . $_SESSION['username']);
                echo "<div style='clear: both; height:270px'>";
                foreach ($imgs as $key => $value) {
                    if ($value == '.' || $value == '..') {
                        unset($value);
                    } else {
                        echo "<form method='post' action=''>";
                        echo "
                          <div style='margin-left: 25px; border-radius: 10px;
                          width: 150px; height: 134px; border: 2px solid #F1F1F1;
                          margin-bottom: 10px;float: left;'>  
                          <input type='checkbox' name='delte[]' 
                          value='app1/resources/upload/profile_img/{$_SESSION['username']}/$value'>"
                        . "<a href='?page=my_account.php&update=$value'>"
                        . "<img style='margin-top: 14px;width: 120px;height: 110px;margin-left:11px' "
                           
                        . "class='img-thumbnail'"
                        . "src='app1/resources/upload/profile_img/{$_SESSION['username']}/$value'></a>"
                        . "</div>";
                    }
                }

                echo "</div>";
            } else {
                echo "<h3 class='text-center'>Here are pictures show</h3>";
            }
            ?>
            <div class="modal-footer" style="clear:both;">
                <input style="position: relative;top: 4px;border-radius: 5px;font-size: 16px; margin-bottom: 5px"
                       class="btn-danger " 
                       type="submit" name="submit" value="Delete selected">
                </form>
                <button type="button" class="btn btn-default" style="    position: relative;
                        left: 6px;top: 1px;width: 55px;" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>



