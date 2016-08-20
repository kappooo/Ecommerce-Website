<div class="sort">
    <a href="?page=main&comment=<?php echo$_GET['comment'];?>&page_no=<?php echo $_GET['page_no']?>&s=a<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>"class="<?php if($_GET['s']=='a')echo "alert-success";?>">Asc</a>
    <a href="?page=main&comment=<?php echo$_GET['comment'];?>&page_no=<?php echo $_GET['page_no']?>&s=d<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>"" class="<?php if($_GET['s']=='d')echo "alert-success";?>">Desc</a>
</div>


		<div class="col-md-12">
  <form action="" method="post" >
    	 <table class="table table-striped table-hover sectiontable ">
                    <thead>
                        <tr>
                            <th>No</th>
                              <th><a  title="sort by username" href="?page=main&comment=<?php echo $_GET['comment'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=username">username</a></th>
        <th><a  title="sort by date" href="?page=main&comment=<?php echo $_GET['comment'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=date">Date</a></th>
                            <th>comment</th>       
        <th><a  title="sort by state" href="?page=main&comment=<?php echo $_GET['comment'];?>&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=active">State</a></th>
                              <th>action</th>
      
                           
                        </tr>
                    </thead>
                    <tbody>
                        
                       <?php for ($i=0;$i<count($data);$i++) {
    
                         
                       
                           echo "
                        <tr>
                            <td>".($i+1)."</td>
                                
                             <td>{$data[$i]["username"]}</td>
                            <td>";
                     $time=explode(" ",$data[$i]["date"]);
                     echo $time[1]."<br/>".$time[0];
             echo "</td>
                            <td>
                            {$data[$i]["comment"]}
                     </td>";
                               
                                    
                              
                              echo "<td>";
                                
                                if($data[$i]['active']==1)
                                    echo "active";
                                else {
                                    echo 'not active';
                                }
                            
                            
                            echo"</td>
                                
                                <td>
                                <input type='checkbox' value='{$data[$i]['id']}' name='delete[]'/>
                                </td>
                           
                       </tr> ";}?>
                                       
                        <tr>
                            <td colspan="6"><input type="submit" name="submitc" value="Delete selected"  class="btn btn-danger"/></td>
                        </tr>
                    </tbody>
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
            echo"&comment={$_GET['comment']}'>«</a></li>";
            for ($i = 1; $i <= $noOfpages; $i++){
                echo " <li><a href='index.php?page=main&page_no={$i}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
                  if(isset($_GET['by']))echo '&by='.$_GET['by'];
                  echo"&comment={$_GET['comment']}'";  
            if($i==$_GET['page_no'])echo "class='alert-success'";echo ">$i</a></li>";}

            $next = $_GET['page_no'];
            if ($next == $noOfpages)
                $prev = $noOfpages;
            else
                $next = $next + 1;
            echo "<li ><a href='index.php?page=main&page_no={$next}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
              if(isset($_GET['by']))echo '&by='.$_GET['by'];
              echo"&comment={$_GET['comment']}'>»</a></li>";
             ?>
        </ul>
		</div>
  