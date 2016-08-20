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
                            <th>PROCESSOR:</th>
                            <td><?php  echo $show_data['network']; ?></td>
                        </tr> 

                        <tr>
                            <th>VIDEO MEMORY:</th>
                            <td><?php  echo $show_data['launch']; ?></td>
                        </tr>
                        <tr>
                            <th>RAM:</th>
                            <td><?php echo $show_data['body']; ?></td>
                        </tr>

                        <tr>
                            <th>STORAGE:</th>
                            <td><?php echo $show_data['display']; ?></td>
                        </tr>
                        <tr>
                            <th>DISPLAY:</th>
                            <td><?php echo $show_data['platform']; ?></td>
                        </tr>
                        <tr>
                            <th>CONNECTOR TYPE:</th>
                            <td><?php echo $show_data['memory']; ?></td>
                        </tr>
                         <tr>
                            <th>OPERATING SYSTEM:</th>
                            <td><?php echo $show_data['camera']; ?></td>
                        </tr>
                         <tr>
                            <th>COMPONENT:</th>
                            <td><?php echo $show_data['sound']; ?></td>
                        </tr>
                         <tr>
                            <th>OPTICAL DRIVE:</th>
                            <td><?php echo $show_data['comms']; ?></td>
                        </tr>
                         <tr>
                            <th>COLOR:</th>
                            <td><?php echo $show_data['features']; ?></td>
                        </tr>
                         <tr>
                            <th>WARRANTY:</th>
                            <td><?php echo $show_data['battery']; ?></td>
                        </tr>
 </table>                       