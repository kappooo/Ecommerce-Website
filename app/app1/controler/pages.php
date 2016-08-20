<h3>Companies</h3>

<?php
include '../include/autoloader.php';

if ($_POST OR @ $_GET['action']) {
    if (isset($_GET['action']) && $_GET['action'] == "add") {

        if (isset($_POST['submit']) AND $_POST['submit'] == 'Add') {
            $page_inf['page_name'] = $_POST['page_name'];
            $page_inf['username'] = $_SESSION['admin'];

            if (!empty($_FILES['page_image']['name'][0])) {
                $file = $_FILES['page_image'];
                $allowed_exten = array('doc', 'docx', 'pdf', 'txt', 'png', 'jpg', 'gif');
                $max_size = 4000000;
                $upload_dir = "resources/upload/company/";
                $upload = new upload($file, $max_size, $allowed_exten, $upload_dir);
                $upload->upload_file();
                $page_inf['page_image'] = $upload_dir . $upload->get_file_url();
            } else {
                $page_inf['page_image'] = "resources/upload/logo.png";
            }
            if (new add($page_inf, "pages")) {
                echo '<br>';
                echo 'the data was added';
            }
        }
        $select_pages = new display("sections");
        $data_page = $select_pages->get_data_section();
        include 'views/v_add_page.php';
    }


    if (isset($_GET['action']) AND $_GET['action'] == "delete") {
        $id = $_GET['id'];
        $get_data = new display('pages');
        $data = $get_data->get_data_by_id($id);
        $url = $data['page_image'];

        $delete = new delete_files();
        if ($delete->delete_one_file($url)) {
            echo "ok";
        }
        $delete_pages = new delete('pages');
        $delete_pages->delete_by_id($id);
        if ($delete_pages == TRUE) {
            echo 'the page is deleted sucssessfuly';
             echo "<meta http-equiv='refresh' content='3; "
                . "url=http://localhost/app/app1/?page=pages' />";
        } else {
            echo 'the page is not deleted..... ';
        }
    }

    if (isset($_POST['submit']) AND $_POST['submit'] == 'edite') {
        $data_to_edit['page_name'] = $_POST['page_name'];
        
         $id = $_GET['id'];
        $get_data = new display('pages');
        $data = $get_data->get_data_by_id($id);
        $url = $data['page_image'];
        $delete = new delete_files();
        if ($delete->delete_one_file($url)) {1;}
        
        if (!empty($_FILES['page_image']['name'][0])) {
            $file = $_FILES['page_image'];
            $allowed_exten = array('doc', 'docx', 'pdf', 'txt', 'png', 'jpg', 'gif');
            $max_size = 4000000;
            $upload_dir = "resources/upload/company/";
            $upload = new upload($file, $max_size, $allowed_exten, $upload_dir);
            $upload->upload_file();
            $data_to_edit['page_image'] = $upload_dir . $upload->get_file_url();
        } else {
            $data_to_edit['page_image'] = "resources/upload/logo.png";
        }


        $id = $_GET['id'];

        $update_page = new update('pages', $data_to_edit, $id);
        if ($update_page) {
            echo '<script type="text/javaScript">alert("the page was updated");</script>';
        } else
            echo 'not';
    }

    if (isset($_GET['action']) && $_GET['action'] == 'edite') {
        $id = $_GET['id'];
        $select_pages = new display("sections");
        $data_page = $select_pages->get_data_section();
        $get_page_info = new display("pages");
        $data = $get_page_info->get_data_by_id($id);
        include 'views/v_edite_pages.php';
    }
} else {

 
    $obj=new display('pages');
 $xz=$obj->extra("select count(id)  from pages");
    if(!isset($_GET['by']))
    $by='id';
else {
    $by=$_GET['by'];
    }
if(!isset($_GET['s']))
    $_GET['s']='a';
if($_GET['s']=='a')
    $or="$by asc";
else {
     $or="$by desc";
}

    $perpage=10;
    if(!isset($_GET['page_no']))
         $_GET['page_no']=1;
$data_pages = $obj->pagination('1','1',$_GET['page_no'],'',$perpage,$or);

$rows = $xz[0]['count(id)'];


if ($rows % $perpage != 0)
    $noOfpages = (int) (($rows / $perpage) + 1);
else {
    $noOfpages = (int) (($rows / $perpage));
}
    include 'views/v_pages.php';
}  