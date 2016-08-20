<section class="home_view">
    <div class="container">
              
        <?php
        echo "<h2>". $specifi['name']."</h2>";
          $net=explode("_",$specifi['network']);
        ?>
        <table style="width: 760px;" cellspacing ="0" class="table table-bordered table-hover sectiontable ">
            <tr style="text-align: center;">
              <th rowspan="7">Network</th>
               <td>Technology</td>
               <td>specification</td>
               <td>
                   <a href="?page=main&action=edite&id=<?php echo $specifi['id'];?>">
                       <img src='resources/img/edite.png' style='width:25px;'>
                   </a>
                   <a href="?page=main&action=delete&id=<?php echo $specifi['id'];?>">
                       <img src='resources/img/delete.png' style='width: 20px;'>
                   </a>
               </td>
            </tr>  
           
            <tr>
            <td>2G bands</td>
                <td><?php echo $net[0] ?></td>
            </tr>
            <tr>
            <td>3G bands</td>
                <td><?php echo $net[1] ?></td>
            </tr>
            <tr>
            <td>4G bands</td>
                <td><?php echo $net[2] ?></td>
            </tr>
           
            <tr>
                <td>Speed</td>
                <td><?php echo $net[3] ?></td>
            </tr>
            <tr>
                <td>GPRS</td>
                <td> <?php echo $net[4] ?></td>
            </tr>
            <tr>
                <td>EDGE</td>
                <td><?php echo $net[5] ?></td>
            </tr>
            
          <?php
            
            $net=explode("_",$specifi['launch']);
          ?>
            
            <th rowspan="3">Launch</th>
            <tr>
                <td>Announced</td>
                <td><?php echo $net[0]; ?></td>
            </tr>
             <tr>
                <td>Statue</td>
                <td><?php echo $net[1]; ?></td>
            </tr>
            
            
            <?php
             
             $net=explode("_",$specifi['body']);
            ?>
            
            <th rowspan="3">Body</th>
            <tr>
                <td>Dimensions</td>
                <td><?php echo $net[0]; ?></td>
            </tr>
            <tr>
                <td>Weight</td>
                <td><?php echo $net[1]; ?></td>
            </tr>
            
            <?php
             
             $net=explode("_",$specifi['display']);
            ?>
            
             <th rowspan="4">Display</th>
            <tr>
                <td>Type</td>
                <td><?php echo $net[0]; ?></td>
            </tr>
            <tr>
                <td>Size</td>
                <td><?php echo $net[1]; ?></td>
            </tr>
             <tr>
                <td>Resolution</td>
                <td><?php echo $net[2]; ?></td>
            </tr>
            
            <?php
            
             $net=explode("_",$specifi['platform']);
            ?>
            
             <th rowspan="4">Platform</th>
            <tr>
                <td>OS</td>
                <td><?php echo $net[0]; ?></td>
            </tr>
            <tr>
                <td>Chipset</td>
                <td><?php echo $net[1]; ?></td>
            </tr>
             <tr>
                <td>CPU</td>
                <td><?php echo $net[2]; ?></td>
            </tr>
            
             <?php
             
             $net=explode("_",$specifi['memory']);
            ?>
            
             <th rowspan="3">Memory</th>
            <tr>
                <td>Card slot</td>
                <td><?php echo $net[0]; ?></td>
            </tr>
            <tr>
                <td>Internal</td>
                <td><?php echo $net[1]; ?></td>
            </tr>
            
             <?php
             
             $net=explode("_",$specifi['camera']);
            ?>
            
            
            <th rowspan="5">Camera</th>
            <tr>
                <td>Primary</td>
                <td><?php echo $net[0]; ?></td>
            </tr>
            <tr>
                <td>Features</td>
                <td><?php echo $net[1]; ?></td>
            </tr>
             <tr>
                <td>Video</td>
                <td><?php echo $net[2]; ?></td>
            </tr>
            
             <tr>
                <td>Secondary</td>
                <td><?php echo $net[3]; ?></td>
             </tr>
             
             <?php
             
             $net=explode("_",$specifi['memory']);
            ?>
            
            <th rowspan="4">Sound</th>
            <tr>
                <td>Alert types</td>
                <td><?php echo $net[0]; ?></td>
            </tr>
            <tr>
                <td>Loudspeaker</td>
                <td><?php echo $net[1]; ?></td>
            </tr>
            <tr>
                <td>3.5mm jack</td>
                <td><?php echo @$net[2]; ?></td>
            </tr>
            
             <?php
             
             $net=explode("_",$specifi['comms']);
            ?> 
            
            <th rowspan="6">Comms</th>
            <tr>
                <td>WLAN</td>
                <td><?php echo $net[0]; ?></td>
            </tr>
            <tr>
                <td>Bluetooth</td>
                <td><?php echo $net[1]; ?></td>
            </tr>
            <tr>
                <td>GPS</td>
                <td><?php echo $net[2]; ?></td>
            </tr>
            <tr>
                <td>Radio</td>
                <td><?php echo $net[3]; ?></td>
            </tr>
            <tr>
                <td>USB</td>
                <td><?php echo $net[4]; ?></td>
            </tr>
            
            <?php
             
             $net=explode("_",$specifi['battery']);
            ?>
            
            <th rowspan="3">Battery</th>
            <tr>
                <td>Stand-by</td>
                <td><?php echo $net[0]; ?></td>
            </tr>
            <tr>
                <td>Talk time</td>
                <td><?php echo $net[1]; ?></td>
            </tr>
            
            <?php
             
             $net=explode("_",$specifi['features']);
            ?>
            
            <th rowspan="5">Features</th>
            <tr>
                <td>Sensors</td>
                    <td><?php echo $net[0]; ?></td>
            </tr>
            <tr>
                <td>Messaging</td>
                <td><?php echo $net[1]; ?></td>
            </tr>
            <tr>
                <td>Browser</td>
                <td><?php echo $net[2]; ?></td>
            </tr>
            <tr>
                <td>Java</td>
                <td><?php echo $net[3]; ?></td>
            </tr>
           
         
                
            
            
            
            
            
            
        </table>
    </div>
</section>



