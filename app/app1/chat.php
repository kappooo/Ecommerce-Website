<?php
session_start();
include '../include/autoloader.php';
if (!isset($_SESSION['admin'])) {
    header("Location:views/login_view.php");
    die();
}
$obj_dis_user = new display('users');

$chat_state_use = $obj_dis_user->by_name($_SESSION['admin'], 'username');
if ($chat_state_use['use_chat'] == 0) {
    header("location:index.php");
}

$adm_actv = $obj_dis_user->get_actv_adm();
?>


<link rel="stylesheet" href="resources/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="resources/css/bootstrap-theme.min.css" type="text/css">
<link rel="stylesheet" href="resources/css/style.css" type="text/css">
<script src="resources/js/jquery-1.11.3.min.js" ></script>
<script src="resources/js/bootstrap.js" ></script>
<script src="resources/js/chat_ajax.js" ></script>
<style>
    .logo{
        margin-top: 23px;
        margin-left: 122px;
        margin-bottom: -80px;
    }
    .logout{
        float: right;
        margin-right: 80px;
        margin-top: 53px;
    }
    .logout2{
        border-radius: 10px;
        padding: 10px;
    }
    .chat_room {
        border: 2px solid #E4DEDE;
        margin-top: 20px;
        margin: 0 auto;
        width: 1200px;
        margin-top: 100px;
        border-radius: 11px;
        padding: 27px;
        height: 450px;
    }
    .state{
        position: absolute;
        top: -4px;
        right: -330px;
        font-size: 18px;
        font-weight: bold;
    }
    .chat_room #section{
        margin-left: 359px;
        margin-top: -320px;
    }
    .chat_room input[type="submit"]{
        width: 200px;
        margin-bottom: 10px;
        font-size: 18px;
    }
    .chat_room input[type="button"]{
        width: 200px;
        margin-bottom: 10px;
        font-size: 18px;
    }
    .foter{
        width: 1191px;
        margin-left: 80px;
    }
</style>


<li class="logo glyphicon glyphicon-erase" style="font-size: 83px; color:#C12E2A"></li>
<h2 class=" logout btn-lg">welcome
    <?php
    echo $_SESSION['admin'] . " <a href='index.php'class='logout2 btn-danger' "
    . "style='text-decoration:none;'>"
    . "back"
    . "</a>";
    ?>
</h2> 

<section class="chat_room">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="n">
                    <div class="links">
                        <form method="post" action="">
                            <label> please select online to be online for users: </label><br>
                            <input type="submit" name="submit" value="online"class="btn btn-success input-lg"><br>
                            <input type="submit" name="submit" value="offline" class="btn btn-danger input-lg"><br>
                        </form>
                    </div>    


                    <?php
                    if (isset($_SESSION['admin'])) {
                        $obj_dis_user = new display('users');
                        $id_user = $obj_dis_user->by_name($_SESSION['admin'], 'username');
                        if (isset($_POST['submit']) && $_POST['submit'] == 'online') {
                            $arr_onlin['onlin'] = 1;
                            if (new update('users', $arr_onlin, $id_user['id']) == TRUE) {
                                echo<<<EOD
            <form method='post' action='#'>
            <h4> selecte start to get conversation </h4>                    
            <input  type="button"  onclick="get_pages()" name="submit" value="Start"
                    class="btn btn-primary input-lg"><br>
            <h5> selecte end to finsh conversation with that user </h5>                     
            <input  type="submit" name="submit" value="END" class="btn btn-primary input-lg">
            </form>
EOD;
                                echo '<span class="alert-success state">online now</span>';
                            } else {
                                echo '<span class="alert-danger state">offline now</span>';
                            }
                        } elseif (isset($_POST['submit']) && $_POST['submit'] == 'offline') {
                            $arr_offline['onlin'] = 0;
                            if (new update('users', $arr_offline, $id_user['id']) == TRUE) {
                                echo '<span class="alert-danger state">offline now</span>';
                            } else {
                                echo '<span class="alert-success state">online now</span>';
                            }
                            if ($_SESSION['admin'] == @$adm_actv[0]['username']) {
                                $ob_delt = new delete('us_ad_chat1');
                                $ob_delt->delete_by_username_colmn($_SESSION['admin'], 'admin');
                            } elseif ($_SESSION['admin'] == @$adm_actv[1]['username']) {
                                $ob_delt = new delete('us_ad_chat2');
                                $ob_delt->delete_by_username_colmn($_SESSION['admin'], 'admin');
                            }
                        }
                    } else {

                        echo 'please sign in to can active chat';
                    }
                    if (isset($_POST['submit']) && $_POST['submit'] == 'END') {

                        if ($_SESSION['admin'] == @$adm_actv[0]['username']) {
                            $obj_dis_adchat1 = new delete('us_ad_chat1');
                            $count_col_chat1 = $obj_dis_adchat1->delete_all();
                        }
                        if ($_SESSION['admin'] == @$adm_actv[1]['username']) {
                            $obj_dis_adchat2 = new delete('us_ad_chat2');
                            $count_col_chat2 = $obj_dis_adchat2->delete_all();
                        }

                        $obj_del_msg = new delete('chat');
                        if ($obj_del_msg->delete_by_username_colmn($_SESSION['admin'], 'admin') == TRUE) {
                            echo 'messages is deleted successfully';
                        }
                    }
                    ?>
                    <div id="section">

                    </div>
                </div>
            </div>
        </div>
    </div>                 
</section>
<div class="clear"></div>
<footer class="foter">
    <p> Copyright reserved - EA </p>
</footer>