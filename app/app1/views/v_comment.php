

<h3>Current Activated comments are <span class="alert-success"><?php echo $counter['count(active)'];?></span></h3>

		<div class="col-md-12">
                    <form method="post" action="?page=comments">
    	 <table class="table table-list-search">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User name</th>
                            <th>Date</th>
                            <th>comment</th>
                            <th>action</th>
                            <th>to be deleted</th>
                        
                           
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
                     </td>
                           
                              <td>";
                                if($data[$i]['active']==1)
                                    echo '<a class="btn btn-primary" href="?page=comments&action=deactive&id='.$data[$i]['id'].'&no='. ($counter['count(active)']+1).'"> active</a>';
                                else {
                                      echo '<a class="btn btn-default '; if($counter['count(active)']>=3)echo 'disabled';echo'" href="?page=comments&action=active&id='.$data[$i]['id'].'&no='. ($counter['count(active)']+1).'"> not  active</a>';
                                }
                            
                            
                            echo"</td>
                                
                                <td>
                                <input type='checkbox' value='{$data[$i]['id']}' name='delete[]'/>
                                </td>
                           
                       </tr> ";}?>
                                       
                        <tr>
                            <td colspan="6"><input type="submit" name="submit" value="Delete selected"  class="btn btn-danger"/></td>
                        </tr>
                    </tbody>
                </table>
                    </form>
		</div>
