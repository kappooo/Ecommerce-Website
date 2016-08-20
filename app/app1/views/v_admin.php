
<!--user in site-->
<table class="table table-striped table-hover sectiontable ">
   
    <tr >  

        <th>name</th>
        <th>username</th>
        <th>Email</th>
        <th>state</th>
        <th>action</th>

    </tr>
    <?php
    for ($i = 0; $i < count($sel_user); $i++) {
        echo "   
  <tr>
    <td>{$sel_user[$i]['name']}</td>
    <td>{$sel_user[$i]['username']}</td> 
    <td>{$sel_user[$i]['email']}</td> 
    <td>";
        if ($sel_user[$i]['state'] == 1) {
            echo '<a style="margin-left: 29px;" '
            . 'class="btn btn-primary" href="?page=admin&action=notadmin&id=' . $sel_user[$i]['id'] . '">'
            . ' Admin</a>';
           // if($use_chat){
            if ($sel_user[$i]['use_chat'] == 1) {
                echo '<a style="margin-top: 6px; margin-left: 27px;" '
                . 'class="btn btn-primary" href="?page=admin&action=chat_off&id=' . $sel_user[$i]['id'] . '">'
                . 'Chat ON'
                . '</a>';
            } else {
                echo '<a style="margin-top: 6px; margin-left: 17px;"'
                . 'class="btn btn-danger" href="?page=admin&action=chat_on&id=' . $sel_user[$i]['id'] . '">'
                . 'Chat Off </a>';
            }
          //  }
        } else {
            echo '<a style="margin-left: 15px;"'
            . 'class="btn btn-default" href="?page=admin&action=admin&id=' . $sel_user[$i]['id'] . '">'
            . ' Not admin </a>';
          /* if ($sel_user[$i]['use_chat'] == 0) {
                echo '<a style="margin-top: 6px; margin-left: 17px;"'
                . 'class="btn btn-danger" href="?page=admin&action=chat_on&id=' . $sel_user[$i]['id'] . '">'
                . 'Chat Off </a>';
            } else {
                echo '<a style="margin-top: 6px; margin-left: 27px;" '
                . 'class="btn btn-primary" href="?page=admin&action=chat_off&id=' . $sel_user[$i]['id'] . '">'
                . 'Chat ON'
                . '</a>';
            }*/
        }
        echo "
        
</td> 
   
    <td>";
        ?>
        <a href="#"  onclick="get_id('controler/ajax_pages/ajax_delt_admin.php', '<?php echo$sel_user[$i]['id']; ?>', '#place')"  
           data-toggle='modal' data-target='.bs-example-modal-lg'>
            <img src='resources/img/delete.png' style='width: 14px;'>
        </a>
        <?php
        echo"
    </td> 
  </tr>
  ";
    }
    ?>
</table> 



<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content sure_box" id="place">


        </div>
    </div>
</div>


