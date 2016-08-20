<table style="width: 760px; float: right;" class="table table-bordered table-hover sectiontable ">
    <tr class="danger">  
    <th style="color:#900; background: #ff9; " >Id</th>
    <th>section Name</th>
    <th>Status</th>
    <th>Location</th>
    <th>section Desc</th>
    <th>Date</th>
    <th>Created By</th>
    <th>action</th>
  </tr>
  <?php for($i=0;$i<count($rows_in_section);$i++)
  { echo "<tr>
      <td>{$rows_in_section[$i]['id']} </td>
      <td>{$rows_in_section[$i]['section_name']}</td> 
      <td>{$rows_in_section[$i]['section_statues']}</td>
      <td>{$rows_in_section[$i]['section_location']}</td>
      <td>{$rows_in_section[$i]['section_desc']}</td>
      <td>{$rows_in_section[$i]['section_date']}</td>
      <td>{$rows_in_section[$i]['username']}</td>
      <td>
          <a href='?page=sections&action=edite&id={$rows_in_section[$i]['id']}'>
              <img src='resources/img/edite.png' style='width:20px;'>
          </a>
           <a href='?page=sections&action=delete&id={$rows_in_section[$i]['id']}'>
          <img src='resources/img/delete.png' style='width: 15px;'>
          </a>
      </td> 
  </tr>";}
  ?>
  </table>