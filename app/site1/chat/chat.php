
<script src="site1/resourses/js/js_chat.js"></script>
<?php

$obj_dis_user = new display('users');
$obj_dis_adchat1 = new display('us_ad_chat1');
$obj_dis_adchat2 = new display('us_ad_chat2');
$adm_actv = $obj_dis_user->get_actv_adm();

$count_row = $obj_dis_adchat1->count_user_in_table();
$count_row2 = $obj_dis_adchat2->count_user_in_table();

if(isset($_SESSION['user_chat'])&&isset($_SESSION['admin_chat'])){
    echo<<<EOD
    <input type="submit" id="btn_get_div"  onclick="get_page()" name="submit" value="start">
    <a class="fa fa-minus-circle" id="mins"></a>
EOD;
}else{
    echo<<<EOD
    <a href="#" id="btn_get_div" >  <li class="fa fa-commenting-o"></li> let us amessage </a>
    <a class="fa fa-minus-circle" id="mins"></a>
EOD;
}

?>



<div id="section" >
    <h5> Choose person to chat with him </h5>

    <form method="post" >
        <?php
        $onlin1 = $obj_dis_user->by_name(@$adm_actv[0]['username'], 'username');
        if ($onlin1['onlin'] == 1) {
            if ($count_row == 1) {
                echo<<<EOD
               <img src="site1/resourses/imgs/chat/busy.png"  class='chat-img'/>
                {$onlin1['name']} <br>            
EOD;
            } else {
                echo<<<EOD
                <img src="site1/resourses/imgs/chat/online.jpg"  class='chat-img'/>
            <input type="radio" name="gender"  
                required = "required" id='admin1' value="{$adm_actv[0]['username']}">   {$onlin1['name']} <br>  
        
EOD;
            }
        } else {
            echo<<<EOD
               <img src="site1/resourses/imgs/chat/offline.jpg"  class='chat-img'/>
               {$onlin1['name']} <br>  
        
EOD;
        }

        $onlin2 = $obj_dis_user->by_name(@$adm_actv[1]['username'], 'username');
        if ($onlin2['onlin'] == 1) {
            if ($count_row2 == 1) {
                echo<<<EOD
               <img src="site1/resourses/imgs/chat/busy.png"  class='chat-img'/>
              {$onlin2['name']} 
                  <br>  
EOD;
            } else {
                echo<<<EOD
          <img src="site1/resourses/imgs/chat/online.jpg"  class='chat-img'/>
            <input type="radio" name="gender" 
                required = "required" id='admin2' value="{$adm_actv[1]['username']}">  {$onlin2['name']} <br>  
        
EOD;
            }
        } else {
            echo<<<EOD
              <img src="site1/resourses/imgs/chat/offline.jpg" class='chat-img'/> {$onlin2['name']} <br/>
          
        
EOD;
        }

        ?>
        <label> enter username: </label>
        <input type = "text" id="name" name = "username" required = "required"  class="form-control"><br>
        <input type="submit" style="background: #38454f; width: 282px;" onclick="get_page()" name="submit" value="start" class="btn btn-success">
        <img style="float: right;width: 150px;height: 140px;margin-right: 67px;margin-top: 20px;" 
             src="site1/resourses/imgs/chat6.png" class="chatimg">
    </form>
    
</div>

<?php

////////////////////////////////////////// start buttton here ////////////////////////////////////////////////
if (isset($_POST['submit']) && $_POST['submit'] == 'start') {
    $obj_dis_adchat1 = new delete('us_ad_chat1');
    $obj_dis_adchat2 = new delete('us_ad_chat2');


    $_SESSION['user_chat'] = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $_SESSION['admin_chat'] = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    $ch['username'] = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $ch['admin'] = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);

    if (@$_POST['gender'] == $adm_actv[0]['username']) {
        $count_col_chat = $obj_dis_adchat1->delete_all();
        new add($ch, 'us_ad_chat1');
    } elseif (@$_POST['gender'] == $adm_actv[1]['username']) {
        $obj_dis_adchat2 = $obj_dis_adchat2->delete_all();
        new add($ch, 'us_ad_chat2');
    }
     echo " <meta http-equiv='refresh' content='0; "
    . "url=http://localhost/app' />";
}

/////////////////////////////   button end here ///////////////////////////////////////////////////////////
///////////
$user_name = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
if (isset($_POST['submit']) && $_POST['submit'] == 'END') {
    if (@$_SESSION['admin_chat'] == $adm_actv[0]['username']) {
        $obj_dis_adchat1 = new delete('us_ad_chat1');
        $count_col_chat1 = $obj_dis_adchat1->delete_all();
    }
    if (@$_SESSION['admin_chat'] == $adm_actv[1]['username']) {
        $obj_dis_adchat2 = new delete('us_ad_chat2');
        $count_col_chat2 = $obj_dis_adchat2->delete_all();
    }
    echo " <meta http-equiv='refresh' content='1; "
    . "url=http://localhost/app' />";
}

        