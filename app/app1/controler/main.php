<h3 style="margin-bottom: 20px;">home page</h3>

<?php
include '../include/autoloader.php';
if ($_POST OR @ $_GET) {

    if ((isset($_GET['submit']) AND $_GET['submit'] == "specification")||isset($_GET['name'])) {
        $name = $_GET['name'];
        $mob = new display('specifications');
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
        $specifi = $mob->pagination('1',1,$_GET['page_no']," and ( tags like'%$name%' or name like '%$name%' or type like '%$name%')",$perpage,$or);
       
        $rows =count($mob->search($name));
if ($rows % $perpage != 0)
    $noOfpages = (int) (($rows / $perpage) + 1);
else {
    $noOfpages = (int) (($rows / $perpage));
}

        
        if ($specifi) {
            include 'views/search.php';
        } else {
            echo 'mobile name is incorrect';
        }
    }
    if ((isset($_GET['submit']) AND $_GET['submit'] == "search user")||isset($_GET['nameu'])) {
        $nameu = $_GET['nameu'];
        $mob = new display('user_in_site');
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
        $specifi = $mob->pagination('1',1,$_GET['page_no']," and ( username like'%$nameu%' or fristname like '%$nameu%')",$perpage,$or);
       
        $rows =count($mob->search($_GET['nameu'],array('username','fristname')));
if ($rows % $perpage != 0)
    $noOfpages = (int) (($rows / $perpage) + 1);
else {
    $noOfpages = (int) (($rows / $perpage));
}

        if ($specifi) {
            include 'views/search_user.php';
        } else {
            echo 'user name is incorrect';
        }
    }
    
if ((isset($_GET['submit']) AND $_GET['submit'] == "search comment")||isset($_GET['comment'])) {
        $comment = $_GET['comment'];
        $mob = new display('client_say');
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
        $specifi = $mob->pagination('1',1,$_GET['page_no']," and ( username like'%$comment%' or comment like '%$comment%' or date like '%$comment%')",$perpage,$or);
       
        $rows =count($mob->search($_GET['comment'],array('username','comment','date')));
if ($rows % $perpage != 0)
    $noOfpages = (int) (($rows / $perpage) + 1);
else {
    $noOfpages = (int) (($rows / $perpage));
}
    $data=$specifi;
       
        if ($specifi) {
            
           include 'views/search_comment.php';
    }
    }
    
        
if ((isset($_GET['submit']) AND $_GET['submit'] == "search pay")||isset($_GET['pay'])) {
        $pay = $_GET['pay'];
        $mob = new display('payments');
         if(!isset($_GET['by']))
    $by='payments.id';
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
    $select='specifications.name,payments.username,payments.date,payments.qty,payments.trans_id,payments.product_id,payments.deliver ';
        $specifi = $mob->pagination('','',$_GET['page_no'],"inner join specifications
on specifications.id=payments.product_id
and ( username like'%$pay%' or trans_id like '%$pay%' or date like '%$pay%')",$perpage,$or,$select,'');
      
        $rows =count($mob->search($_GET['pay'],array('username','trans_id','date')));
if ($rows % $perpage != 0)
    $noOfpages = (int) (($rows / $perpage) + 1);
else {
    $noOfpages = (int) (($rows / $perpage));
}
  
       
        if ($specifi) {
            
           include 'views/search_pay.php';
    }
    }
if (isset($_POST['submitp']) && $_POST['submitp'] == 'Delete selected') {
    if (count(@$_POST['todelete']) == 0) {
        echo '<h3>you dont select any item to delete</h3>';
    } else {
       
        $arr_delt_comm = @$_POST['todelete'];
        
        $obj_de = new delete('specifications');
        for ($i = 0; $i < count($arr_delt_comm); $i++) {
            $delt_comments = $obj_de->delete_by_id($arr_delt_comm[$i]);
          
        }
        
        echo " <script> alert('products deleted successfully')</script>";
       echo " <meta http-equiv='refresh' content='0; "
        . "url=http://localhost/app/app1//index.php />";
    }
}
if (isset($_POST['submitc']) && $_POST['submitc'] == 'Delete selected') {
    if (count(@$_POST['delete']) == 0) {
        echo '<h3>you dont select any item to delete</h3>';
    } else {
        $arr_delt_comm = @$_POST['delete'];
        $obj_de = new delete('client_say');
        for ($i = 0; $i < count($arr_delt_comm); $i++) {
            $delt_comments = $obj_de->delete_by_id($arr_delt_comm[$i]);
          
        }
        echo " <script> alert('comments deleted successfully')</script>";
       echo " <meta http-equiv='refresh' content='0; "
        . "url=http://localhost/app/app1//index.php />";
    }
}
    
    if (isset($_POST['submitu']) && $_POST['submitu'] == 'Delete selected') {
    if (count(@$_POST['todelete']) == 0) {
        echo '<h3>you dont select any item to delete</h3>';
    } else {
        $arr_delt_comm = @$_POST['todelete'];
        $obj_de = new delete('user_in_site');
        for ($i = 0; $i < count($arr_delt_comm); $i++) {
            $delt_comments = $obj_de->delete_by_id($arr_delt_comm[$i]);
        }
        echo " <script> alert('users deleted successfully')</script>";
       echo " <meta http-equiv='refresh' content='0; "
        . "url=http://localhost/app/app1//index.php />";
    }
}
} else { ;
   ?>
 <form action='index.php' method='get' class='form-group main_settings'>
          <label> search products:- </label>
          <input class='input-lg input-group' type='text' name='name' >
          <input class='btn-primary' type='submit' name='submit' value='specification'>
 </form> 

<form action='index.php' method='get' class='form-group main_settings'>
          <label> search users </label>
          <input class='input-lg input-group' type='text' name='nameu'>
          <input class='btn-primary' type='submit' name='submit' value='search user'>
 </form> 

<form action='index.php' method='get' class='form-group main_settings'>
          <label> search comments </label>
          <input class='input-lg input-group' type='text' name='comment'>
          <input class='btn-primary' type='submit' name='submit' value='search comment'>
 </form> 


<form action='index.php' method='get' class='form-group main_settings'>
          <label> search payment </label>
          <input class='input-lg input-group' type='text' name='pay'>
          <input class='btn-primary' type='submit' name='submit' value='search pay'>
 </form> 


<?php } ?>


    