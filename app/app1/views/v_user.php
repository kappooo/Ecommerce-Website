
<!--user in site-->
<div class="sort">
    <a href="?page=user&page_no=<?php echo $_GET['page_no']?>&s=a<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>"class="<?php if($_GET['s']=='a')echo "alert-success";?>">Asc</a>
    <a href="?page=user&page_no=<?php echo $_GET['page_no']?>&s=d<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>"" class="<?php if($_GET['s']=='d')echo "alert-success";?>">Desc</a>
</div>
<table class="table table-bordered table-hover sectiontable ">
    
    <tr >  
        <th><a  title="sort by first name" href="?page=user&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=fristname">First Name</a></th>
        <th><a  title="sort by birthdate" href="?page=user&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=birthday">BirthDay</a></th>
        <th>Telephone</th>
         <th><a  title="sort by username" href="?page=user&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=username">username</a></th>
        <th><a  title="sort by email" href="?page=user&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=email">Email</a></th>
       
        <th>Action</th>
        
      
    </tr>
    <?php
    for ($i = 0; $i < count($sel_user); $i++) {
        echo "   
  <tr>
    <td>{$sel_user[$i]['fristname']}</td>
    <td>{$sel_user[$i]['birthday']}</td> 
    <td>{$sel_user[$i]['telephone']}</td> 
    <td>{$sel_user[$i]['username']}</td> 
    <td>{$sel_user[$i]['email']}</td> 
    <td>";?>
        <a href="#"  onclick="get_id('controler/ajax_pages/ajax_delt_user.php', '<?php echo$sel_user[$i]['id']; ?>', '#place')"  
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
<ul class="pagination">
            <?php     
            $prev = $_GET['page_no'];
            if ($prev == 1)
                $prev = 1;
            else
                $prev = $prev - 1;
            echo "<li ><a href='index.php?page=user&page_no={$prev}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
            if(isset($_GET['by']))echo '&by='.$_GET['by'];
            echo"'>«</a></li>";
            for ($i = 1; $i <= $noOfpages; $i++){
                echo " <li><a href='index.php?page=user&page_no={$i}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
                  if(isset($_GET['by']))echo '&by='.$_GET['by'];
                  echo"' class='";
                if($i==$_GET['page_no'])echo "alert-success";
            echo "'>$i</a></li>";}

            $next = $_GET['page_no'];
            if ($next == $noOfpages)
                $prev = $noOfpages;
            else
                $next = $next + 1;
            echo "<li ><a href='index.php?page=user&page_no={$next}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
              if(isset($_GET['by']))echo '&by='.$_GET['by'];
              echo"'>»</a></li>";
             ?>
        </ul>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content sure_box" id="place">


        </div>
    </div>
</div>



