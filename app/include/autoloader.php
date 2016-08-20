<?php

/*function autoloader($classname) {
    $dir = array('', 'app1/model', '../app1/model/', 'app1/model/');
    $formats = array('%s.php', '%s.php.inc', 'class.%s.php', '%s.class.php');

    foreach ($dir as $dirs) {
        foreach ($formats as $format) {
            $path = $dirs . sprintf($format, $classname);
            if (file_exists($path)) {
                include $path;
                return;
            }
        }
    }
}*/

function autoloader($classname)
{
    $paths=array('../app1/model/','app1/model/');
    foreach ($paths as $path){
    $path1 = $path.$classname.'.php';
    if(file_exists(strtolower($path1))){
      include $path1;
      return;
    }
    }
    
}

spl_autoload_register('autoloader');