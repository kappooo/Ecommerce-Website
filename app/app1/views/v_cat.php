
<h2><a style="text-decoration: none;" href="?page=cat&action=add">Add New Category</a></h2>

<table  class="table table-striped table-hover sectiontable ">
    <tr >  
        <th>No</th>
        <th>Category Name</th>
        <th>Date</th>
        <th>Created By</th>
        <th>Action</th>
    </tr>
    <?php
    for ($i = 0; $i < count($data_pages); $i++) {
        $no=$i+1;
        echo "   
  <tr>
    <td> $no</td>
    <td>{$data_pages[$i]['cat_name']}</td> 
    <td>{$data_pages[$i]['cat_date']}</td> 
    <td>{$data_pages[$i]['username']}</td>
    <td>
        <a href='?page=cat&action=edite&id={$data_pages[$i]['cat_id']}'>
              <img src='resources/img/edite.png' style='width:20px;'>
        </a>";
        ?>

        <a href="#"  onclick="get_id('controler/ajax_pages/ajax_delt_cat.php', '<?php echo$data_pages[$i]['cat_id']; ?>', '#place')"  
           data-toggle='modal' data-target='.bs-example-modal-lg'>
            <img src='resources/img/delete.png' style='width: 14px;'>
        </a>         
        <?php
        echo"
    </td> 
  </tr>
  ";
    }
    ?>
</table> 

<!-- Large modal -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content sure_box" id="place">


        </div>
    </div>
</div>