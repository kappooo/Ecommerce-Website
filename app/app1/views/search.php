<h3>Search result</h3>
<br/>
<a href="index.php">Back to search</a>
<br/>
<div class="sort">
    <a href="?page=main&name=<?php echo$_GET['name'];?>&page_no=<?php echo $_GET['page_no']?>&s=a<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>"class="<?php if($_GET['s']=='a')echo "alert-success";?>">Asc</a>
    <a href="?page=main&name=<?php echo$_GET['name'];?>&page_no=<?php echo $_GET['page_no']?>&s=d<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>"" class="<?php if($_GET['s']=='d')echo "alert-success";?>">Desc</a>
</div>
<form  action="" method="post" > 
 <table  class="table table-striped table-hover sectiontable ">
   
    <tr >  
   <th><a  title="sort by name" href="?page=main&name=<?php echo $_GET['name'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=name">Name</a></th>
        <th><a  title="sort by company" href="?page=main&name=<?php echo $_GET['name'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=type">Company</a></th>
        <th><a  title="sort by price" href="?page=main&name=<?php echo $_GET['name'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=price">price</a></th>
        <th><a  title="sort by quantity" href="?page=main&name=<?php echo $_GET['name'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=product_quantity">Quantity</a></th>
        <th><a  title="sort by category" href="?page=main&name=<?php echo $_GET['name'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=cat_name">Category</a></th>
       
    <th>Edit</th>
    <th>select to delete</th>
  </tr>
  <?php
  for($i=0;$i<count($specifi);$i++) 
  {
  echo "   
  <tr>
    <td>{$specifi[$i]['name']}</td>
    <td>{$specifi[$i]['type']}</td> 
    <td>{$specifi[$i]['price']}</td> 
    <td>{$specifi[$i]['product_quantity']}</td> 
    <td>{$specifi[$i]['cat_id']}</td> 
    <td>
       
        <a title='edit' href='?page=product&action=edite&id={$specifi[$i]['id']}&cat_id={$specifi[$i]['cat_id']}'>
              <img src='resources/img/edite.png' style='width:20px;'>
        </a>
    </td> 
    <td>
     <input type='checkbox' name='todelete[]' value='{$specifi[$i]['id']}' />
    </td>
  </tr>
  ";
  }
  ?>
  <tr>
      <td colspan="7"><input type="submit" name="submitp" value="Delete selected"  class="btn btn-danger"/></td>
  </tr>
</table> 
</form>

        
         <ul class="pagination">
            <?php     
            $prev = $_GET['page_no'];
            if ($prev == 1)
                $prev = 1;
            else
                $prev = $prev - 1;
            echo "<li ><a href='index.php?page=main&page_no={$prev}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
            if(isset($_GET['by']))echo '&by='.$_GET['by'];
            echo"&name={$_GET['name']}'>«</a></li>";
            for ($i = 1; $i <= $noOfpages; $i++){
                echo " <li><a href='index.php?page=main&page_no={$i}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
                  if(isset($_GET['by']))echo '&by='.$_GET['by'];
                  echo"&name={$_GET['name']}'"; 
            if($i==$_GET['page_no'])echo "class='alert-success'";echo ">$i</a></li>";}

            $next = $_GET['page_no'];
            if ($next == $noOfpages)
                $prev = $noOfpages;
            else
                $next = $next + 1;
            echo "<li ><a href='index.php?page=main&page_no={$next}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
              if(isset($_GET['by']))echo '&by='.$_GET['by'];
              echo"&name={$_GET['name']}'>»</a></li>";
             ?>
        </ul>