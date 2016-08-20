<?php

if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    foreach ($_SESSION as $key => $value) {
        $k = substr($key, 0, 7);
        if ($k == 'product') {
            unset($_SESSION[$key]);
        }
    }
    //session_destroy();
    header("location:index.php");
} else {
    echo 'not session';
}
