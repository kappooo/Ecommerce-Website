<h3>Categories</h3>

<?php
include '../include/autoloader.php';

if ($_POST OR @ $_GET['action']) {
    if (isset($_GET['action']) && $_GET['action'] == "add") {

        if (isset($_POST['submit']) AND $_POST['submit'] == 'Add') {
          
            $page_inf['cat_name'] = $_POST['cat_name'];
           
            $page_inf['username'] = $_SESSION['admin'];

            if (!empty($_FILES['cat_img']['name'][0])) {
             
                $file = $_FILES['cat_img'];
                
                $allowed_exten = array('doc', 'docx', 'pdf', 'txt', 'png', 'jpg', 'gif');
                $max_size = 4000000;
                $upload_dir = "resources/upload/cats/";
                $upload = new upload($file, $max_size, $allowed_exten, $upload_dir);
                $upload->upload_file();
                $page_inf['cat_img'] = $upload_dir . $upload->get_file_url();
                
            } else {
                    $page_inf['cat_img'] = "resources/upload/logo.png";
            }
            if (new add($page_inf, "categorey")) {
                echo '<br>';
                echo 'the data was added';
            }
        }
        $select_pages = new display("categorey");
        $data_page = $select_pages->get_data_section();
        include 'views/v_add_cat.php';
    }


    if (isset($_GET['action']) AND $_GET['action'] == "delete") {
        $id = $_GET['id'];
        $get_data = new display('categorey');
        $data = $get_data->get_data_by_id($id,'cat_id');
        $url = $data['cat_img'];

        $delete = new delete_files();
      
        if ($delete->delete_one_file($url)) {
            echo "ok";
        }
        $delete_pages = new delete('categorey');
        $delete_pages->delete_data_id($id,'cat_id');
        if ($delete_pages == TRUE) {
            echo 'the category is deleted sucssessfuly';
             echo "<meta http-equiv='refresh' content='3; "
                . "url=http://localhost/app/app1/?page=cat' />";
        } else {
            echo 'the the category is not deleted..... ';
        }
    }

    if (isset($_POST['submit']) AND $_POST['submit'] == 'edite') {
        $data_to_edit['cat_name'] = $_POST['cat_name'];
            $id = $_GET['id'];
            $get_data = new display('categorey');
            $data = $get_data->get_data_by_id($id,'cat_id');
            $url = $data['cat_img'];
            $upload_dir = "resources/upload/cats/";
            $delete = new delete_files();
             if ($delete->delete_one_file($url)) {1;}
        if (!empty($_FILES['cat_img']['name'][0])) {
            $file = $_FILES['cat_img'];
            $allowed_exten = array('doc', 'docx', 'pdf', 'txt', 'png', 'jpg', 'gif');
            $max_size = 4000000;
            
            $upload = new upload($file, $max_size, $allowed_exten, $upload_dir);
            $upload->upload_file();
         
           
            
       
            $data_to_edit['cat_img'] = $upload_dir . $upload->get_file_url();
        } else {
            $data_to_edit['cat_img'] = "resources/upload/logo.png";
        }


        $id = $_GET['id'];

        $update_page = new update('categorey', $data_to_edit, $id,'cat_id');
        
        if ($update_page) {
            echo '<script type="text/javaScript">alert("the page was updated");</script>';
        } else
            echo 'not';
    }

    if (isset($_GET['action']) && $_GET['action'] == 'edite') {
        $id = $_GET['id'];
        $get_page_info = new display("categorey");
        $data = $get_page_info->get_data_by_id($id,'cat_id');
        include 'views/v_edit_cat.php';
    }
} else {

    $select_pages = new display("categorey");
    $data_pages = $select_pages->get_data_array();
    include 'views/v_cat.php';
}  