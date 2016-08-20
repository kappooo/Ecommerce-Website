<h3>Search result</h3>
<br/>
<a href="index.php">Back to seach</a>
<br/>
<div class="sort">
    <a href="?page=main&nameu=<?php echo$_GET['nameu'];?>&page_no=<?php echo $_GET['page_no']?>&s=a<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>"class="<?php if($_GET['s']=='a')echo "alert-success";?>">Asc</a>
    <a href="?page=main&nameu=<?php echo$_GET['nameu'];?>&page_no=<?php echo $_GET['page_no']?>&s=d<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>"" class="<?php if($_GET['s']=='d')echo "alert-success";?>">Desc</a>
</div>
<form  action="" method="post">
 <table  class="table table-bordered table-hover sectiontable ">
   
    <tr>  
  
        <th><a  title="sort by first name" href="?page=main&nameu=<?php echo $_GET['nameu'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=fristname">First Name</a></th>
        <th><a  title="sort by birthdate" href="?page=main&nameu=<?php echo $_GET['nameu'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=birthday">BirthDay</a></th>
        <th>Telephone</th>
         <th><a  title="sort by username" href="?page=main&nameu=<?php echo $_GET['nameu'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=username">username</a></th>
        <th><a  title="sort by email" href="?page=main&nameu=<?php echo $_GET['nameu'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=email">Email</a></th>
       
    <th>select to delete</th>
  </tr>
  <?php
  for($i=0;$i<count($specifi);$i++) 
  {
  echo "   
  <tr>
    <td>{$specifi[$i]['fristname']}</td>
    <td>{$specifi[$i]['birthday']}</td> 
    <td>{$specifi[$i]['telephone']}</td> 
    <td>{$specifi[$i]['username']}</td> 
    <td>{$specifi[$i]['email']}</td> 
    <td>
      <input type='checkbox' name='todelete[]' value='{$specifi[$i]['id']}'>      
    </td> 
  </tr>
  
  ";
  }
  
  ?>
   <tr>
       <td colspan='6'><input type='submit' name='submitu' value='Delete selected'  class='btn btn-danger'/></td>
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
            echo"&nameu={$_GET['nameu']}'>«</a></li>";
            for ($i = 1; $i <= $noOfpages; $i++){
                echo " <li><a href='index.php?page=main&page_no={$i}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
                  if(isset($_GET['by']))echo '&by='.$_GET['by'];
                  echo"&nameu={$_GET['nameu']}'";
            if($i==$_GET['page_no'])echo "class='alert-success'";echo ">$i</a></li>";}

            $next = $_GET['page_no'];
            if ($next == $noOfpages)
                $prev = $noOfpages;
            else
                $next = $next + 1;
            echo "<li ><a href='index.php?page=main&page_no={$next}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
              if(isset($_GET['by']))echo '&by='.$_GET['by'];
              echo"&nameu={$_GET['nameu']}'>»</a></li>";
             ?>
        </ul>