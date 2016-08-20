
<?php

$obj_dis_adchat1 = new display('us_ad_chat1');
$count_row = $obj_dis_adchat1->count_user_in_table();
$obj_dis_adchat2 = new display('us_ad_chat2');
$count_row2 = $obj_dis_adchat2->count_user_in_table();

if ($count_row == 0 and $count_row2 == 0) {
    unset($_SESSION['user_chat']);
    unset($_SESSION['admin_chat']);

    echo 'Please filling Up  Fildes To Can Use This Service';
} else {



    if (isset($_POST['chat']) && isset($_SESSION['admin_chat']) && isset($_SESSION['user_chat']) && !empty($_POST['chat'])) {
        $arr_msg['message'] = $_POST['chat'];
        $arr_msg['username'] = $_SESSION['user_chat'];
        $arr_msg['admin'] = $_SESSION['admin_chat'];
        $arr_msg['saying'] = 'user';
        new add($arr_msg, 'chat');
    }
    ;

    if (isset($_POST['chatupdat']) && isset($_SESSION['admin_chat']) && isset($_SESSION['user_chat'])) {
        $obj_dis_mesg = new display('chat');
        $message = $obj_dis_mesg->get_message($_SESSION['user_chat'], $_SESSION['admin_chat']);
        foreach ($message as $key => $value) {
            if ($value['saying'] == 'admin') {

                echo'   
                 
            <div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src = "site1/resourses/imgs/chat/admin.png" alt = "User Avatar" class = "img-circle img-responsive" />
                        </div>
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_receive">
                                <p >';
                echo $value["message"];
                echo"
                                </p>
                                <time datetime='2009-11-13T20:00'>{$value['date']}</time>
                            </div>
                        </div>
                    </div>";
            } else {
                echo"
           <div class='row msg_container base_sent'>
                        <div class='col-md-10 col-xs-10'>
                            <div class='messages msg_sent'>
                                <p>";
                echo $value['message'];
                echo"
                                </p>
                                <time datetime='2009-11-13T20:00'> {$value['date']} </time>
                            </div>
                        </div>
                        <div class='col-md-2 col-xs-2 avatar'>
                            <img src ='site1/resourses/imgs/chat/u.png' alt = 'User Avatar' class = 'img-circle img-responsive' />
                        </div>
                    </div>";
            }
        }
    }
}
?>