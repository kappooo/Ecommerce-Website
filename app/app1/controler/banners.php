<h3>Banners</h3>
<h4> for main slider </h4>
<?php
include '../include/autoloader.php';
if ($_POST OR @ $_GET['action']) {

    if (isset($_GET['action']) AND $_GET['action'] == "delete") {
        $id = $_GET['id'];
        $tb = $_GET['tb'];
        $get_data = new display($tb);
        $data = $get_data->get_data_by_id($id);
        $url = $data['banner_url'];

        $delete = new delete_files();
        if ($delete->delete_one_file($url)) {
            echo "ok";
        }
        $delete_pages = new delete($tb);
        $delete_pages->delete_by_id($id);
        if($delete_pages == TRUE){
            echo 'the slide is deleted sucssessfuly';
        }  else {
            echo 'the slide is not deleted..... ';
        }
    }

    if (isset($_POST['submit']) && $_POST['submit'] == "upload") {
        if ($_FILES) {
            $file = $_FILES['image'];
            $allowed_exten = array('png', 'pneg', 'jpg', 'gif', 'jpeg');
            $max_size = 400000;
            $upload_dir = "resources/upload/main_slider/";
            $upload = new upload($file, $max_size, $allowed_exten, $upload_dir);
            $upload->upload_file();
            $banner_name = $upload->get_file_url();

            $tablename = 'banners';
            
            for ($i = 0; $i < count($banner_name); $i++) {
                echo $file_num[$i]['banner_name'] = $banner_name;
                $file_num[$i]['banner_url'] = $upload_dir . $banner_name;
                $file_num[$i]['statues'] = 1;
                $file_num[$i]['username'] = $_SESSION['admin'];
                $file_num[$i]['type'] = $_POST['type'];
                if (new add($file_num[$i], $tablename)) {
                    echo 'your file uploaded';
                } else {
                    echo 'not uploader';
                }
            }
        }
    }

    if (isset($_POST['submit']) && $_POST['submit'] == "upload slide") {
        if ($_FILES) {
            $file = $_FILES['image'];
            $allowed_exten = array('png', 'pneg', 'jpg', 'gif', 'jpeg');
            $max_size = 400000;
            $upload_dir = "resources/upload/company slide/";
            $upload = new upload($file, $max_size, $allowed_exten, $upload_dir);
            $upload->upload_file();
            $banner_name = $upload->get_file_url();
            $tablename = 'company_slides';

            for ($i = 0; $i < count($banner_name); $i++) {
                echo $com_slide[$i]['slide_name'] = $banner_name;
                $com_slide[$i]['banner_url'] = $upload_dir . $banner_name;
                $com_slide[$i]['username'] = $_SESSION['admin'];
                $com_slide[$i]['cmpany_name'] = $_POST['name'];
                if (new add($com_slide[$i], $tablename)) {
                    echo 'your file uploaded';
                } else {
                    echo 'not uploaded';
                }
            }
        }
    }
} else {
    include 'views/v_upload_file.php';
    include 'views/v_up_banner.php';
    $select_banners = new display("banners");
    $data_banners = $select_banners->get_data_section();
    $select_slide = new display("company_slides");
    $data_slide = $select_slide->get_data_section();
    include 'views/v_banners.php';
    include 'views/v_banner_company.php';
}   