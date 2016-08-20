<h3><a href='?page=product&&action=add' style='text-decoration: none;'>add New Products</a></h3>
<h3><a href='?page=product&&type=image' style='text-decoration: none;'>add Product images</a></h3>

<div class="sort">
    <a href="?page=product&page_no=<?php echo $_GET['page_no']?>&s=a<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>"class="<?php if($_GET['s']=='a')echo "alert-success";?>">Asc</a>
    <a href="?page=product&page_no=<?php echo $_GET['page_no']?>&s=d<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>"" class="<?php if($_GET['s']=='d')echo "alert-success";?>">Desc</a>
</div>
<table style="" class="table  table-hover sectiontable table-striped">

    <tr class="">  
        <th><a  title="sort by name" href="?page=product&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=name">Name</a></th>
        <th><a  title="sort by company" href="?page=product&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=type">Company</a></th>
        <th><a  title="sort by price" href="?page=product&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=price">price</a></th>
        <th><a  title="sort by quantity" href="?page=product&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=product_quantity">Quantity</a></th>
        <th><a  title="sort by category" href="?page=product&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=cat_name">Category</a></th>
       
        <th>Action</th>
    </tr>
    <?php
    
    for ($i = 0; $i < count($show_pro); $i++) {
        echo "   
  <tr>
    <td>{$show_pro[$i]['name']}</td>
    <td>{$show_pro[$i]['type']}</td> 
    <td>{$show_pro[$i]['price']}</td> 
    <td>{$show_pro[$i]['product_quantity']}</td> 
    <td>{$show_pro[$i]['cat_id']}</td> 
    <td>"
        ?>

        <a href="#"  onclick="get_id('controler/ajax_pages/ajax_delt_prod.php', '<?php echo$show_pro[$i]['id']; ?>', '#place')"  
           data-toggle='modal' data-target='.bs-example-modal-lg'>
            <img src='resources/img/delete.png' style='width: 14px;'>
        </a>
        <?php
        echo"    
        <a title='edit' 
           href='?page=product&action=edite&id={$show_pro[$i]['id']}'>
           <img src='resources/img/edite.png' style='width:20px;'>
        </a>
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
            echo "<li ><a href='index.php?page=product&page_no={$prev}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
            if(isset($_GET['by']))echo '&by='.$_GET['by'];
            echo"'>«</a></li>";
            for ($i = 1; $i <= $noOfpages; $i++){
                echo " <li><a href='index.php?page=product&page_no={$i}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
                  if(isset($_GET['by']))echo '&by='.$_GET['by'];
                  echo"' class='";
                if($i==$_GET['page_no'])echo "alert-success";
            echo "'>$i</a></li>";}

            $next = $_GET['page_no'];
            if ($next == $noOfpages)
                $prev = $noOfpages;
            else
                $next = $next + 1;
            echo "<li ><a href='index.php?page=product&page_no={$next}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
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
