

<script>
    $(document).ready(function () {
        $(".profil_img").hover(function () {
            $(".profile_pic").show();
        });

    });
    
    $(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

    //something is entered in search form
    $('#system-search').keyup( function() {
       var that = this;
        // affect all table rows on in systems table
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {
        
            //Lower text for case insensitive
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            if(inputText != '')
            {
                $('.search-query-sf').remove();
                tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Searching for: "'
                    + $(that).val()
                    + '"</strong></td></tr>');
            }
            else
            {
                $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
                //hide rows
                tableRowsClass.eq(i).hide();
                
            }
            else
            {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
            }
        });
        //all tr elements are hidden
        if(tableRowsClass.children(':visible').length == 0)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No entries found.</td></tr>');
        }
    });
});
</script>
 <div class="col-md-3">
            <form action="#" method="get" style="margin-top:20px;">
                <div class="input-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
     
        </div>
<div class="sort">
    <a href="?page=pay&page_no=<?php echo $_GET['page_no']?>&s=a<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>"class="<?php if($_GET['s']=='a')echo "alert-success";?>">Asc</a>
    <a href="?page=pay&page_no=<?php echo $_GET['page_no']?>&s=d<?php if(isset($_GET['by'])) echo "&by={$_GET['by']}";?>" class="<?php if($_GET['s']=='d')echo "alert-success";?>">Desc</a>
</div>
		<div class="col-md-12">
    	 <table class="table table-list-search">
                    <thead>
                        <tr>
                            <th>No</th>
                           
                           
                              <th><a  title="sort by username" href="?page=pay&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=username">Username</a></th>
                              <th><a  title="sort by date" href="?page=pay&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=date">Date</a></th>
                            <th>product</th>
                            <th>Quantity</th>
                            <th>Transaction id</th>
                                  <th><a  title="sort by deliver" href="?page=pay&page_no=<?php echo $_GET['page_no']?>&s=<?php echo $_GET['s'];?>&by=Deliver">Deliver</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                       <?php for ($i=0;$i<count($sz);$i++) {
    
                           $data=$obj->extra("select * from payments where trans_id='{$sz[$i]['trans_id']}'");
                 
                           $product=new display("specifications");
                           $pro=$product->get_data_by_id($sz[$i]);
                       
                           echo "
                        <tr>
                            <td>".($i+1)."</td>
                                
                             <td>{$data[0]["username"]}</td>
                            <td>";
                     $time=explode(" ",$data[0]["date"]);
                     echo $time[1]."<br/>".$time[0];
             echo "</td>
                            <td>";
                            for($j=0;$j<count($data);$j++)
                            { $pro=$product->get_data_by_id($data[$j]['product_id']);
                                echo "<a href='?page=specifications/specifications.php&&id={$pro['id']}'> <strong>". ($j+1)." - ".substr($pro['name'],0,15)."</strong></a><br/>";
                            }
                                    
                                echo "</td>
                             <td>";
                            for($j=0;$j<count($data);$j++)
                            { 
                                echo $data[$j]['qty']."<br/>";
                            }
                                    
                                echo "</td>
                              <td>{$data[0]["trans_id"]}</td>
                                  
                              <td>
                              ";if($data[0]['Deliver']==1)
                                  echo '<li class="fa fa-truck fa-lg"></li>';
                                  else
                                      echo'not delivered';
                              
                                     echo" </td>
                           
                       </tr>";}?>
                    
                    </tbody>
                </table>
                    <ul class="pagination">
            <?php     
            $prev = $_GET['page_no'];
            if ($prev == 1)
                $prev = 1;
            else
                $prev = $prev - 1;
            echo "<li ><a href='index.php?page=pay&page_no={$prev}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
            if(isset($_GET['by']))echo '&by='.$_GET['by'];
            echo"'>«</a></li>";
            for ($i = 1; $i <= $noOfpages; $i++){
                echo " <li><a href='index.php?page=pay&page_no={$i}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
                  if(isset($_GET['by']))echo '&by='.$_GET['by'];
                  echo"' class='";
                if($i==$_GET['page_no'])echo "alert-success";
            echo "'>$i</a></li>";}

            $next = $_GET['page_no'];
            if ($next == $noOfpages)
                $prev = $noOfpages;
            else
                $next = $next + 1;
            echo "<li ><a href='index.php?page=pay&page_no={$next}";if(isset($_GET['s']))echo "&s={$_GET['s']}";
              if(isset($_GET['by']))echo '&by='.$_GET['by'];
              echo"'>»</a></li>";
             ?>
        </ul>
		</div>
