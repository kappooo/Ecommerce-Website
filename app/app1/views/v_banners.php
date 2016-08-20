
<table  class=" table table-bordered table-hover sectiontable ">
   
<tr >  
    <th>Id</th>
    <th>type</th>
    <th>Status</th>
    <th >Location</th>
    <th>Date</th>
    <th>Created By</th>
    <th>action</th>
</tr>
<?php
for ($i = 0; $i < count($data_banners); $i++) {
      $no=$i+1;
    echo "<tr>
      <td >$no</td>
      <td>{$data_banners[$i]['type']}</td> 
      <td>{$data_banners[$i]['statues']}</td>
      <td>{$data_banners[$i]['banner_url']}</td>
      <td>{$data_banners[$i]['banner_date']}</td>
      <td>{$data_banners[$i]['username']}</td>
      <td>";
    ?>

    <a href="#"  onclick="get_id('controler/ajax_pages/ajax_delt_bann.php', '<?php echo$data_banners[$i]['id']; ?>', '#place')"  
       data-toggle='modal' data-target='.bs-example-modal-lg'>
        <img src='resources/img/delete.png' style='width: 14px;'>
    </a>
    <?php
    echo "
      </td> 
  </tr>";
}
?>
</table>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content sure_box" id="place">


        </div>
    </div>
</div>


