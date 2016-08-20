
<h2><a style="text-decoration: none;" href="?page=pages&action=add">Add New Company</a></h2>
<div class="sort">
    <a href="?page=pages&page_no=<?php echo $_GET['page_no']?>&s=a<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>"class="<?php if($_GET['s']=='a')echo "alert-success";?>">Asc</a>
    <a href="?page=pages&page_no=<?php echo $_GET['page_no']?>&s=d<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>"" class="<?php if($_GET['s']=='d')echo "alert-success";?>">Desc</a>
</div>
<table  class="table table-striped table-hover sectiontable ">
    <tr >  
    <th  >No</th>
   
    <th><a  title="sort by name" href="?page=pages&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=page_name">Company name</a></th>
        <th><a  title="sort by username" href="?page=pages&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=username">Created by</a></th>
        <th><a  title="sort by date" href="?page=pages&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=page_date">Date</a></th>
       
    <th>Action</th>
  </tr>
  <?php
  for($i=0;$i<count($data_pages);$i++) 
  {  $no=$i+1;
  echo "   
  <tr>
    <td>  $no</td>
    <td>{$data_pages[$i]['page_name']}</td> 
    <td>{$data_pages[$i]['username']}</td> 
    <td>{$data_pages[$i]['page_date']}</td>
    <td>
        <a href='?page=pages&action=edite&id={$data_pages[$i]['id']}'>
              <img src='resources/img/edite.png' style='width:20px;'>
        </a>";?>
        <a href="#"  onclick="get_id('controler/ajax_pages/ajax_delt_comp.php', '<?php echo $data_pages[$i]['id']; ?>', '#place')"  
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
            echo "<li ><a href='index.php?page=pages&page_no={$prev}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
            if(isset($_GET['by']))echo '&by='.$_GET['by'];
            echo"'>«</a></li>";
            for ($i = 1; $i <= $noOfpages; $i++){
                echo " <li><a href='index.php?page=pages&page_no={$i}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
                  if(isset($_GET['by']))echo '&by='.$_GET['by'];
                  echo"' class='";
                if($i==$_GET['page_no'])echo "alert-success";
            echo "'>$i</a></li>";}

            $next = $_GET['page_no'];
            if ($next == $noOfpages)
                $prev = $noOfpages;
            else
                $next = $next + 1;
            echo "<li ><a href='index.php?page=pages&page_no={$next}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
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