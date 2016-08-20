
<script>
    $(document).ready(function () {
        $('#img').keyup(function () {
            var search = $('#img').val();
            $.ajax({
                url: 'search_add_img.php',
                data: {search: search},
                type: 'POST',
                success: function (data) {
                    if (!data.error) {
                        $('#result_add_imgs').html(data);
                    }
                }

            });
        });
    });
</script>

<?php
//error_reporting(0);
include '../include/autoloader.php';
$products = new display('specifications');
if (!isset($_GET['by']))
    $by = 'id';
else {
    $by = $_GET['by'];
}
if (!isset($_GET['s']))
    $_GET['s'] = 'a';
if ($_GET['s'] == 'a')
    $or = "$by asc";
else {
    $or = "$by desc";
}

$perpage = 10;
if (!isset($_GET['page_no']))
    $_GET['page_no'] = 1;
$show_pro = $products->pagination('1', '1', $_GET['page_no'], '', $perpage, $or);
$rows = $products->countrows('1', '1')[0];
if ($rows % $perpage != 0)
    $noOfpages = (int) (($rows / $perpage) + 1);
else {
    $noOfpages = (int) (($rows / $perpage));
}



if (isset($_GET) || isset($_POST)) {
    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        $pro_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        //delete old photo
        $obj_update = new display('specifications');
        $oldphoto = $obj_update->get_data_by_id($pro_id);
        $photo = $oldphoto['image'];
        $obj_update = new delete('specifications');
        $obj_del_file = new delete_files();
        $obj_del_file->delete_one_file($photo);
        $place = $oldphoto['name'];
        if (is_dir('resources/upload/' . $place)) {
            $all = scandir('resources/upload/' . $place);

            foreach ($all as $value) {
                if (file_exists('resources/upload/' . $place . '/' . $value)) {
                    @unlink('resources/upload/' . $place . '/' . $value);
                }
            }
            @rmdir('resources/upload/' . $oldphoto['name']);
        }
        $delt_prod = new delete('specifications');
        $delt = $delt_prod->delete_by_id($pro_id);

        if ($delt == false) {
            echo 'your product deleted successfully';
            echo "<meta http-equiv='refresh' content='3; "
            . "url=http://localhost/app/app1/?page=product' />";
        } else {
            echo'fail to delete this product please try later';
        }
    } else if (isset($_GET['action']) && $_GET['action'] == 'edite') {


        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $edit = $products->get_data_by_id($id);
        $cat_id = $edit['cat_id'];
        if ($cat_id == 1 or $cat_id == 3) {
            include 'views/edite_product2.php';
        } else if ($cat_id == 2) {
            include 'views/edite_product.php';
        } else {

            include 'views/edit_other_pro.php';
        }
    } else if (isset($_POST['submit']) AND $_POST['submit'] == 'Edit') {

        $prdu_to_edite['name'] = $_POST['name'];
        $prdu_to_edite['type'] = $_POST['type'];
        $prdu_to_edite['descrip'] = $_POST['desc'];
        $prdu_to_edite['cat_id'] = $_POST['cat_id'];
        $prdu_to_edite['price'] = $_POST['price'];
        $prdu_to_edite['sale'] = $_POST['sale'];
        $prdu_to_edite['video'] = $_POST['video'];
        $prdu_to_edite['product_quantity'] = $_POST['product_quantity'];
        $prdu_to_edite['network'] = $_POST['network'];
        $prdu_to_edite['launch'] = $_POST['launch'];
        $prdu_to_edite['body'] = $_POST['body'];
        $prdu_to_edite['display'] = $_POST['display'];
        $prdu_to_edite['platform'] = $_POST['platform'];
        $prdu_to_edite['memory'] = $_POST['memory'];
        $prdu_to_edite['camera'] = $_POST['camera'];
        $prdu_to_edite['sound'] = $_POST['sound'];
        $prdu_to_edite['comms'] = $_POST['comms'];
        $prdu_to_edite['features'] = $_POST['features'];
        $prdu_to_edite['battery'] = $_POST['battery'];
        $id = $_GET['id'];
        if (!empty($_FILES['image']['name'][0])) {
            $sp = new display('specifications');
            $edit = $sp->get_data_by_id($id);
            $obj_del_file = new delete_files();
            $obj_del_file->delete_one_file($edit['image']);
            $file = $_FILES['image'];
            $allowed_exten = array('png', 'jpg', 'gif');
            $max_size = 4000000;
            $upload_dir = "resources/upload/products_img/";
            $upload = new upload($file, $max_size, $allowed_exten, $upload_dir);
            $upload->upload_file();
            $prdu_to_edite['image'] = $upload_dir . $upload->get_file_url();
            //delete old photo
            $obj_update = new display('specifications');
            $oldphoto = $obj_update->get_data_by_id($id);
            $oldphoto = $oldphoto['image'];
            $obj_update = new delete('specifications');
            if (file_exists($oldphoto))
                unlink($oldphoto);
        } else {
            $sp = new display('specifications');
            $edit = $sp->get_data_by_id($id);
            $prdu_to_edite['image'] = $edit['image'];
        }
        
        $id = $_GET['id'];
        
        //////////////////start chang folder name for this product that contain images/////////////////////
        $old_dir = 'resources/upload/'.$edit['name'];
        $new_dir = 'resources/upload/'.$_POST['name'];
        @rename($old_dir, $new_dir);
        //////////////////start chang folder name for this product that contain images/////////////////////
        
        $update_product = new update('specifications', $prdu_to_edite, $id);
        if ($update_product) {
            echo "<meta http-equiv='refresh' content='0; "
            . "url=http://localhost/app/app1/?page=product&action=edite&id=$id&cat_id={$prdu_to_edite['cat_id']}' />"
            . '<script type="text/javaScript">alert("the product  updated");</script>';
        } else
            echo 'not';
    }

    else if (isset($_POST['submit']) AND $_POST['submit'] == 'Edit product') {
        
        $prdu_to_edite['name'] = $_POST['name'];
        $prdu_to_edite['type'] = $_POST['type'];
        $prdu_to_edite['descrip'] = $_POST['desc'];
        $prdu_to_edite['cat_id'] = $_POST['cat_id'];
        $prdu_to_edite['price'] = $_POST['price'];
        $prdu_to_edite['video'] = $_POST['video'];
        $prdu_to_edite['sale'] = $_POST['sale'];
        $prdu_to_edite['product_quantity'] = $_POST['product_quantity'];
        $id = $_GET['id'];
        if (!empty($_FILES['image']['name'][0])) {
            //////////////////start delete old image//////////////////////////////////////////////////////
            $sp = new display('specifications');
            $edit = $sp->get_data_by_id($id);
            $obj_del_file = new delete_files();
            $obj_del_file->delete_one_file($edit['image']);
             //////////////////start delete old image//////////////////////////////////////////////////
            $file = $_FILES['image'];
            $allowed_exten = array('png', 'jpg', 'gif');
            $max_size = 4000000;
            $upload_dir = "resources/upload/products_img/";
            $upload = new upload($file, $max_size, $allowed_exten, $upload_dir);
            $upload->upload_file();
            $prdu_to_edite['image'] = $upload_dir . $upload->get_file_url();
            //delete old photo
            $obj_update = new display('specifications');
            $oldphoto = $obj_update->get_data_by_id($id);
            $oldphoto = $oldphoto['image'];
            $obj_update = new delete('specifications');
            if (file_exists($oldphoto))
                unlink($oldphoto);
        } else {
            $sp = new display('specifications');
            $edit = $sp->get_data_by_id($id);
            $prdu_to_edite['image'] = $edit['image'];
        }
        
        //////////////////start chang folder name for this product that contain images/////////////////////
        $sp2 = new display('specifications');
        $edit2 = $sp2->get_data_by_id($id);
        $old_dir = 'resources/upload/'.$edit2['name'];
        $new_dir = 'resources/upload/'.$_POST['name'];
        @rename($old_dir, $new_dir);
        //////////////////start chang folder name for this product that contain images/////////////////////
        
        $update_product = new update('specifications', $prdu_to_edite, $id);
        if ($update_product) {
            echo "<meta http-equiv='refresh' content='0; "
            . "url=http://localhost/app/app1/?page=product&action=edite&id=$id&cat_id={$prdu_to_edite['cat_id']}' />"
            . '<script type="text/javaScript">alert("the product  updated");</script>';
        } else
            echo 'not';
    }
    else if (isset($_POST['submit']) AND $_POST['submit'] == 'Edit lap') {

        $prdu_to_edite['name'] = $_POST['name'];
        $prdu_to_edite['type'] = $_POST['type'];
        $prdu_to_edite['cat_id'] = $_POST['cat_id'];
        $prdu_to_edite['price'] = $_POST['price'];
        $prdu_to_edite['video'] = $_POST['video'];
        $prdu_to_edite['sale'] = $_POST['sale'];
        $prdu_to_edite['product_quantity'] = $_POST['product_quantity'];
        $prdu_to_edite['network'] = $_POST['processor'];
        $prdu_to_edite['launch'] = $_POST['video_memory'];
        $prdu_to_edite['body'] = $_POST['ram'];
        $prdu_to_edite['display'] = $_POST['storage'];
        $prdu_to_edite['platform'] = $_POST['dis_resolution'];
        $prdu_to_edite['memory'] = $_POST['connecting'];
        $prdu_to_edite['camera'] = $_POST['os'];
        $prdu_to_edite['sound'] = $_POST['component'];
        $prdu_to_edite['comms'] = $_POST['drive'];
        $prdu_to_edite['features'] = $_POST['color'];
        $prdu_to_edite['battery'] = $_POST['warranty'];
        $id = $_GET['id'];
        if (!empty($_FILES['image']['name'][0])) {
             //////////////////start delete old image/////////////////////////////////////////////////
            $sp = new display('specifications');
            $edit = $sp->get_data_by_id($id);
            $obj_del_file = new delete_files();
            $obj_del_file->delete_one_file($edit['image']);
             //////////////////end delete old image////////////////////////////////////////////////////
            $file = $_FILES['image'];
            $allowed_exten = array('png', 'jpg', 'gif');
            $max_size = 4000000;
            $upload_dir = "resources/upload/products_img/";
            $upload = new upload($file, $max_size, $allowed_exten, $upload_dir);
            $upload->upload_file();
            $prdu_to_edite['image'] = $upload_dir . $upload->get_file_url();

            //delete old photo
            $obj_update = new display('specifications');
            $oldphoto = $obj_update->get_data_by_id($id);
            $oldphoto = $oldphoto['image'];
            $obj_update = new delete('specifications');
            if (file_exists($oldphoto))
                unlink($oldphoto);
        } else {
            $sp = new display('specifications');
            $edit = $sp->get_data_by_id($id);
            $prdu_to_edite['image'] = $edit['image'];
        }

        $id = $_GET['id'];
        //////////////////start chang folder name for this product that contain images/////////////////////
        $old_dir = 'resources/upload/'.$edit['name'];
        $new_dir = 'resources/upload/'.$_POST['name'];
        @rename($old_dir, $new_dir);
        //////////////////end chang folder name for this product that contain images/////////////////////
        $update_product = new update('specifications', $prdu_to_edite, $id);
        if ($update_product) {
            echo "<meta http-equiv='refresh' content='0; "
            . "url=http://localhost/app/app1/?page=product&action=edite&id=$id&cat_id={$prdu_to_edite['cat_id']}' />"
            . '<script type="text/javaScript">alert("the product  updated");</script>';
        } else
            echo 'not';
    }

    else if (isset($_GET['type']) && $_GET['type'] == 'image') {

        include 'views/product_image.php';
    } else if (isset($_POST['submit']) AND $_POST['submit'] == "image") {
         $file_name = filter_input(INPUT_POST, 'product_name',FILTER_SANITIZE_STRING);
        if (!empty($file_name)) {

            if (!empty($_FILES['image']['name'][0])) {
                @mkdir('C:/xampp/htdocs/app/app1/resources/upload/' . trim($file_name));
                $file = $_FILES['image'];
                $allowed_exten = array('png', 'jpg', 'gif');
                $max_size = 4000000;
                $upload_dir = "resources/upload/" . $file_name . "/";
                $upload = new upload($file, $max_size, $allowed_exten, $upload_dir);
                if ($upload->upload_file() == FALSE) {
                    echo 'your images is uploaded';
                }
            } else {
                echo 'no photos to upload';
            }
        } else {
            echo 'please enter name of product <br>';
        }
    } else if (isset($_GET['action']) && $_GET['action'] == "add") {
        if (isset($_POST['submit']) AND $_POST['submit'] == 'Add New Product') {
            $mobil['name'] = $_POST['name'];
            $mobil['price'] = $_POST['price'];
            $mobil['cat_id'] = $_POST['cat_id'];
            $mobil['descrip'] = $_POST['desc'];
            $mobil['type'] = $_POST['type'];
            $mobil['video'] = $_POST['video'];
            $mobil['tags'] = $_POST['tags'];
            $mobil['product_quantity'] = $_POST['product_quantity'];

            if (!empty($_FILES['image']['name'][0])) {
                $file = $_FILES['image'];
                $allowed_exten = array('png', 'jpg', 'gif');
                $max_size = 4000000;
                $upload_dir = "resources/upload/products_img/";
                $upload = new upload($file, $max_size, $allowed_exten, $upload_dir);
                $upload->upload_file();
                $mobil['image'] = $upload_dir . $upload->get_file_url();
            } else {
                $mobil['image'] = "resources/upload/logo.png";
            }


            if (new add($mobil, "specifications")) {
                echo '<br>';
                echo 'the data was added';
            }
        } elseif (isset($_POST['submit']) AND $_POST['submit'] == 'ADD Product') {
            $mobil['name'] = $_POST['name'];
            $mobil['price'] = $_POST['price'];
            $mobil['cat_id'] = $_POST['cat_id'];
            $mobil['descrip'] = $_POST['desc'];
            $mobil['type'] = $_POST['type'];
            $mobil['video'] = $_POST['video'];
            $mobil['tags'] = $_POST['tags'];
            $mobil['product_quantity'] = $_POST['product_quantity'];
            $mobil['network'] = $_POST['network'];
            $mobil['launch'] = $_POST['launch'];
            $mobil['body'] = $_POST['body'];
            $mobil['display'] = $_POST['display'];
            $mobil['platform'] = $_POST['platform'];
            $mobil['memory'] = $_POST['memory'];
            $mobil['camera'] = $_POST['camera'];
            $mobil['sound'] = $_POST['sound'];
            $mobil['comms'] = $_POST['comms'];
            $mobil['features'] = $_POST['features'];
            $mobil['battery'] = $_POST['battery'];
            if (!empty($_FILES['image']['name'][0])) {
                $file = $_FILES['image'];
                $allowed_exten = array('png', 'jpg', 'gif');
                $max_size = 4000000;
                $upload_dir = "resources/upload/products_img/";
                $upload = new upload($file, $max_size, $allowed_exten, $upload_dir);
                $upload->upload_file();
                $mobil['image'] = $upload_dir . $upload->get_file_url();
            } else {
                $mobil['image'] = "resources/upload/logo.png";
            }


            if (new add($mobil, "specifications")) {
                echo '<br>';
                echo 'the data was added';
            }
        } elseif (isset($_POST['submit']) AND $_POST['submit'] == 'ADD PRODUCT') {
            $mobil['name'] = $_POST['name'];
            $mobil['price'] = $_POST['price'];
            $mobil['cat_id'] = $_POST['cat_id'];
            $mobil['descrip'] = $_POST['desc'];
            $mobil['type'] = $_POST['type'];
            $mobil['video'] = $_POST['video'];
            $mobil['tags'] = $_POST['tags'];
            $mobil['product_quantity'] = $_POST['product_quantity'];
            $mobil['network'] = $_POST['processor'];
            $mobil['launch'] = $_POST['video_memory'];
            $mobil['body'] = $_POST['ram'];
            $mobil['display'] = $_POST['storage'];
            $mobil['platform'] = $_POST['dis_resolution'];
            $mobil['memory'] = $_POST['connecting'];
            $mobil['camera'] = $_POST['os'];
            $mobil['sound'] = $_POST['component'];
            $mobil['comms'] = $_POST['component'];
            $mobil['features'] = $_POST['color'];
            $mobil['battery'] = $_POST['warranty'];
            if (!empty($_FILES['image']['name'][0])) {
                $file = $_FILES['image'];
                $allowed_exten = array('png', 'jpg', 'gif');
                $max_size = 4000000;
                $upload_dir = "resources/upload/products_img/";
                $upload = new upload($file, $max_size, $allowed_exten, $upload_dir);
                $upload->upload_file();
                $mobil['image'] = $upload_dir . $upload->get_file_url();
            } else {
                $mobil['image'] = "resources/upload/logo.png";
            }


            if (new add($mobil, "specifications")) {
                echo '<br>';
                echo 'the data was added';
            }
        }
        include 'views/add_product.php';
    } else {
        include 'views/v_products.php';
    }
}
?>


