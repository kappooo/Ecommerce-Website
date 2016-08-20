<?php

include '../include/autoloader.php';

if (isset($_POST['submit']) && $_POST['submit'] == 'login') {

    $valid = new validation();
    $data['username'] = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $data['password'] = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_NUMBER_INT);
    $rule = array(
        'username' => 'check_required|check_string',
        'password' => 'check_required'
    );
    if ($valid->validate($data, $rule)) {
        $login_admi = new login($data, 'users');
        if ($login_admi->get_data(' and( state=1 or state=2)') == 1) {
            session_start();
            $_SESSION['admin'] = $data['username'];
            header("location:index.php");
        } else {
            echo "<h4 class=' msg_login '> "
            . "<span class='fa_warning'> <li class='fa fa-warning'></li> </span>"
            . "Your username or password is invalid please try again"
            . " </h4>";
        }
    }
}

else if (isset ($_POST['submitr']) && $_POST['submitr'] == 'Register') {
   
    $valid = new validation();
    $data['username'] = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $data['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $data['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
   $x = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
   $y = filter_input(INPUT_POST, 'confirm', FILTER_SANITIZE_STRING);
   if($x==$y)
   {
       $data['password']=$x;
   }
   else {
   echo 'password didn\'t match';
   echo "<meta http-equiv='refresh' content='3; "
                . "url=http://localhost/app/app1/views/register.php' />";
                die();
   }
  
            $v=new register($data);
            if($v->insert_data())
            { echo '<div class="alert alert-success">you registed successfully you must wait until you '
                . 'verified from manger</div>';
            echo "<meta http-equiv='refresh' content='3; "
                . "url=http://localhost/app/app1/views/login_view.php'>";
            }
 else {
                echo 'user name is already exist';
 }
            
            
         
    }


    