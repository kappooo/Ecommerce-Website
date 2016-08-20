<?php

include 'site1/nav_bar.php';

if ($count_user == 1) {
    echo '<h2 class="msg_rating" > Thank You, Your Rating is Add Successfuly<br/>'
    . ' You are redirecting to your last page automaticlly '
    . '</h2>';
} else {
    echo '<h3>you already rating</h3>';
}
$id = $_GET['id'];
echo " <meta http-equiv='refresh' content='3; "
 . "url=http://localhost/app//?page=specifications/specifications.php&id=$id/' />";



