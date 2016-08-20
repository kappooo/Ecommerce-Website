<h3>sections</h3>
<h2><a style="text-decoration: none;" href="?page=sections&action=add">Add New section</a></h2>

<?php
include '../include/autoloader.php';
if ($_POST OR @ $_GET['action']) {

    if (isset($_GET['action']) && $_GET['action'] == "add") {
        include 'views/add_section.php';
    }

    if (isset($_POST['submit']) && $_POST['submit'] == "add") {
        $new_section_data['section_name'] = filter_input(INPUT_POST, 'section_name', FILTER_SANITIZE_STRING);
        $new_section_data['section_statues'] = $_POST['section_statues'];
        $new_section_data['section_location'] = $_POST['section_location'];
        $new_section_data['section_desc'] = $_POST['section_desc'];
        $new_section_data['username'] = $_SESSION['admin'];

        $add_new_section = new add($new_section_data, "sections");
        if ($add_new_section) {
            echo '<script type="text/javaScript">alert("the new section was added");</script>';
        } else {
            echo "Erorr the section not added";
        }
    }

    if (isset($_GET['action']) && $_GET['action'] == "delete") {
        $id = $_GET['id'];
        $delete_section = new delete('sections');
        $delete_section->delete_by_id($id);
        echo '<script type="text/javaScript">alert("the section was deleted");</script>';
    }
    
    if (isset($_GET['action']) && $_GET['action'] == "edite") {
        $id = $_GET['id'];
        $select = new display('sections');
        $data = $select->get_data_by_id($id);
        include 'views/edite_section.php';
    }
    

    if (isset($_POST['submit']) && $_POST['submit'] == "edite") {
        $update_data['section_name'] = $_POST['section_name'];
        $update_data['section_statues'] = $_POST['section_statues'];
        $update_data['section_location'] = $_POST['section_location'];
        $update_data['section_desc'] = $_POST['section_desc'];
        $id = $_GET['id'];
        $new = new update('sections', $update_data, $id);
    }

    
} else {
    $data = new display('sections');
    $rows_in_section = $data->get_data_section();
    include 'views/section.php';
}  
