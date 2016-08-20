<?php
$obj = new display('specifications');
$show_data = $obj->get_data_by_id($id);

?> 

<table  class="table  table-striped table-hover table-bordered ">
                        <tr style="text-align: center;">
                            <th style=" width: 30%;">  </th>
                            <td id="spec">specification</td>
                        </tr>
                        
                         <tr>
                            <th>Company:</th>
                            <td style="text-align: left"><?php  echo $show_data['type']; ?></td>
                        </tr>  
 
                        <tr>
                            <th>Description:</th>
                            <td style="text-align: left"><?php  echo $show_data['descrip']; ?></td>
                        </tr>                        
 </table>                       