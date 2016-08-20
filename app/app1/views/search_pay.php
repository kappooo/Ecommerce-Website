<h3>Search result</h3>
<br/>
<a href="index.php">Back to seach</a>
<br/>
<div class="sort">
    <a href="?page=main&pay=<?php echo$_GET['pay'];?>&page_no=<?php echo $_GET['page_no']?>&s=a<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>"class="<?php if($_GET['s']=='a')echo "alert-success";?>">Asc</a>
    <a href="?page=main&pay=<?php echo$_GET['pay'];?>&page_no=<?php echo $_GET['page_no']?>&s=d<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>"" class="<?php if($_GET['s']=='d')echo "alert-success";?>">Desc</a>
</div>

 <table  class="table table-striped table-hover sectiontable ">
   
    <tr>  
  
        <th><a  title="sort by username" href="?page=main&pay=<?php echo $_GET['pay'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=username">Username</a></th>
        <th><a  title="sort by date" href="?page=main&pay=<?php echo $_GET['pay'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=date">Date</a></th>
         <th><a  title="sort by product name" href="?page=main&pay=<?php echo $_GET['pay'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=name">product Name</a></th>
                 <th><a  title="sort by quantity" href="?page=main&pay=<?php echo $_GET['pay'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=qty">Quantity</a></th>
        <th><a  title="sort by transaction" href="?page=main&pay=<?php echo $_GET['pay'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=trans_id">Transaction id</a></th>
          <th><a  title="sort by deliver" href="?page=main&pay=<?php echo $_GET['pay'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=deliver">Deliver</a></th>

       
   
  </tr>
  <?php
  for($i=0;$i<count($specifi);$i++) 
  {
  echo "   
  <tr>
    <td>{$specifi[$i]['username']}</td>
    <td>{$specifi[$i]['date']}</td> 
    <td>{$specifi[$i]['name']}</td> 
    <td>{$specifi[$i]['qty']}</td> 
    <td>{$specifi[$i]['trans_id']}</td> 
     <td>
                              ";if($specifi[$i]['deliver']==1)
                                  echo '<li class="fa fa-truck fa-lg"></li>';
                                  else
                                      echo'not delivered';
                              
                                     echo" </td>
   
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
            echo "<li ><a href='index.php?page=main&page_no={$prev}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
            if(isset($_GET['by']))echo '&by='.$_GET['by'];
            echo"&pay={$_GET['pay']}'>«</a></li>";
            for ($i = 1; $i <= $noOfpages; $i++){
                echo " <li><a href='index.php?page=main&page_no={$i}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
                  if(isset($_GET['by']))echo '&by='.$_GET['by'];
                  echo"&pay={$_GET['pay']}'";
            if($i==$_GET['page_no'])echo "class='alert-success'";echo ">$i</a></li>";}

            $next = $_GET['page_no'];
            if ($next == $noOfpages)
                $prev = $noOfpages;
            else
                $next = $next + 1;
            echo "<li ><a href='index.php?page=main&page_no={$next}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
              if(isset($_GET['by']))echo '&by='.$_GET['by'];
              echo"&pay={$_GET['pay']}'>»</a></li>";
             ?>
        </ul>