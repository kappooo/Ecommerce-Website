<h3>main settings</h3>
<?php
include '../include/autoloader.php';

if (isset($_POST['submit']) && $_POST['submit'] == 'update') {
    $mainsettings['site_name'] = $_POST['site_name'];
    $mainsettings['site_url'] = $_POST['site_url'];
    $mainsettings['site_email'] = $_POST['site_email'];
    $mainsettings['site_desc'] = $_POST['site_desc'];
    $mainsettings['site_tags'] = $_POST['site_tags'];
    $mainsettings['site_homepanal'] = $_POST['site_homepanal'];
    $mainsettings['fb'] = $_POST['fb'];
    $mainsettings['tw'] = $_POST['tw'];
    $mainsettings['yt'] = $_POST['yt'];
    $mainsettings['rss'] = $_POST['rss'];
    $mainsettings['username'] = $_SESSION['admin'];

    try {
        $add = new add($mainsettings, 'main_settings');
    } catch (Exception $ex) {
        echo 'Erorr!!!!!!! the data faild to added';
    }
} else {
    try {
        $data = new display('main_settings');
        $row = $data->get_data();
    } catch (Exception $ex) {

        echo "faild" . $ex->getMessage();
    }
    include 'views/v_mainsettings.php';
}
    
   