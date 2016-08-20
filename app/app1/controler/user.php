<h3> user </h3>

<?php
include '../include/autoloader.php';
if (isset($_GET['action']) && $_GET['action'] == 'del_user') {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $tb = filter_input(INPUT_GET, 'tb', FILTER_SANITIZE_STRING);
    if (isset($_GET['tb']) && $_GET['tb'] == 'user_in_site') {
        $id_user_site = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $user_name = new display('user_in_site');
        $get_username = $user_name->get_data_by_id($id_user_site);
       echo  $username = $get_username['username'];
        $del_user_cart = new delete('user_cart');
        $delet_user_content = $del_user_cart->delete_by_username($username);
        if($delet_user_content != TRUE){
            echo 'user cart is deleted successfuly<br>';
        }else{
            echo 'the cart of user not deleted';
        }
    }
    $delet = new delete($tb);
    $del_user = $delet->delete_by_id($id);
    if ($del_user != TRUE) {
        echo 'the user is deleted successfuly';
         echo "<meta http-equiv='refresh' content='3; "
                . "url=http://localhost/app/app1/?page=user' />";
    } else {
        echo 'there is Aprblem...  the user is not deleleted';
    }

 
} else {

    $user = new display('user_in_site');
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
$sel_user = $user->pagination('1','1',$_GET['page_no'],'',$perpage,$or);
$rows = $user->countrows('1', '1')[0];
if ($rows % $perpage != 0)
    $noOfpages = (int) (($rows / $perpage) + 1);
else {
    $noOfpages = (int) (($rows / $perpage));
}

    include 'views/v_user.php';
}
?>