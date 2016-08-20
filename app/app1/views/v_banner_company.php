<h2 class="alert-success">Company slider</h2>
<table class=" table table-bordered table-hover sectiontable ">
  
<tr>  
    <th >Id</th>
    <th>Company</th>
    <th>Slid_name</th>
    <th >Location</th>
    <th>Created By</th>
    <th>action</th>
</tr>
<?php
for ($i = 0; $i < count($data_slide); $i++) {
      $no=$i+1;
    echo "<tr>
      <td>$no</td>
      <td>{$data_slide[$i]['cmpany_name']}</td> 
      <td>{$data_slide[$i]['slide_name']}</td>
      <td>{$data_slide[$i]['banner_url']}</td>
      <td>{$data_slide[$i]['username']}</td>
      <td>";
    ?>
    <a href="#"  onclick="get_id('controler/ajax_pages/ajax_delt_com_bann.php', '<?php echo$data_slide[$i]['id']; ?>', '#place')"  
       data-toggle='modal' data-target='.bs-example-modal-lg'>
        <img src='resources/img/delete.png' style='width: 14px;'>
    </a>
    <?php
    echo"
      </td> 
  </tr>";
}
?>
</table>

<!-- Large modal -->

<div class="modal fade bs-example-modal-mosa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content sure_box" id="place">


        </div>
    </div>
</div>