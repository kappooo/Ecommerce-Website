<h3> Reviews on Products  </h3>

<div class="sort">
    <a href="?page=product_review&page_no=<?php echo $_GET['page_no']?>&s=a<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>"class="<?php if($_GET['s']=='a')echo "alert-success";?>">Asc</a>
    <a href="?page=product_review&page_no=<?php echo $_GET['page_no']?>&s=d<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>" class="<?php if($_GET['s']=='d')echo "alert-success";?>">Desc</a>
</div>
<table style="" class="table  table-hover sectiontable table-striped">

    <tr class="">  
        <th><a  title="sort by name" href="?page=product_review&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=name">Product Name</a></th>
        <th><a  title="sort by username" href="?page=product_review&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=username"> Username </a></th>
        <th>comment</th>
        <th><a  title="sort by date" href="?page=product_review&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=date"> Date </a></th>
        <th>Action</th>
    </tr>
    <?php
    
    for ($i = 0; $i < count($show_review); $i++) {
      
        echo "   
  <tr>
    <td>{$show_review[$i]['name']}</td>
    <td>{$show_review[$i]['username']}</td> 
    <td>{$show_review[$i]['comment']}</td> 
    <td>{$show_review[$i]['date']}</td>  
    <td>"
        ?>

        <a href="#"  onclick="get_id('controler/ajax_pages/ajax_delt_review.php', '<?php echo $show_review[$i]['id']; ?>', '#place')"  
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
            echo "<li ><a href='index.php?page=product_review&page_no={$prev}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
            if(isset($_GET['by']))echo '&by='.$_GET['by'];
            echo"'>«</a></li>";
            for ($i = 1; $i <= $noOfpages; $i++){
                echo " <li><a href='index.php?page=product_review&page_no={$i}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
                  if(isset($_GET['by']))echo '&by='.$_GET['by'];
                  echo"' class='";
                if($i==$_GET['page_no'])echo "alert-success";
            echo "'>$i</a></li>";}

            $next = $_GET['page_no'];
            if ($next == $noOfpages)
                $prev = $noOfpages;
            else
                $next = $next + 1;
            echo "<li ><a href='index.php?page=product_review&page_no={$next}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
              if(isset($_GET['by']))echo '&by='.$_GET['by'];
              echo"'>»</a></li>";
             ?>
        </ul>



<!-- Large modal -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content sure_box" id="place">


        </div>
    </div>
</div>
