<?php

    $fl_name = filter_input(INPUT_GET, 'fld', FILTER_SANITIZE_STRING);
    echo "<h3> folder " . $fl_name . "</h3>";
    $fold_content = "resources/upload/" . $fl_name . "/";
    echo "<hr>";

    $dir = scandir($fold_content);  // scandir :: used for get the imges from directories
    $scdir = array_diff($dir, array('..', '.')); //compare the two array and return the diff from 
    echo '<div class="image"><form action="" method="post" class="main_settings add newpage imgs">';

    foreach ($scdir as $value) {
        echo
        "<p>"
        ."<input type='checkbox' name='delt_img[]' value='$fold_content$value'>"
        . "<img src='$fold_content$value'/>"
        . "</p>";
        $path = $fold_content . $value;
    }
    echo '<div class="clear"> </div>'
    .'<input type="submit" name ="submit" value="delete">'
    . '</form></div>';
