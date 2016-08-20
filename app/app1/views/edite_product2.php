
<script src="http://localhost/app/app1/resources/js/tinymce/tinymce.min.js"></script>
 <script>
     tinyMCE.init({
        mode : "textareas",
        mode : "specific_textareas",
        editor_selector : "myTextEditor",
       
    });
 </script>

 <form action="?page=product&id=<?php echo $edit['id']; ?>" method="post" enctype="multipart/form-data"  class=" main_settings add newpage" novalidate="">
    <label>Mobile name</label>
    <input required="required" type="text" name="name" value="<?php echo $edit['name']; ?>">
    
    <label>price</label>
    <input required="required" type="text" name="price" value="<?php echo $edit['price']; ?>">
    <label>product quantity</label>
    <input required="required" type="text" name="product_quantity" value="<?php echo $edit['product_quantity']; ?>">
    <label>Select category</label>
     
     <select name="cat_id">
    <?php
     $current=$edit['cat_id'];
    $casts=new display('categorey');
$catsArr= $casts->get_data_array();
    for ($i = 0; $i < count($catsArr); $i++) {
        
        if($current==$catsArr[$i]['cat_id'])
             echo "<option value='{$catsArr[$i]['cat_id']}' selected>{$catsArr[$i]['cat_name']}</option>";
             else
        echo "<option value='{$catsArr[$i]['cat_id']}'>{$catsArr[$i]['cat_name']}</option>";
    }?>
     </select>
    
    
   <label>Product company</label>
     <select name="type">
    <?php
     $current=$edit['type'];
    $companies=new display('pages');
$com= $companies->get_data_array();
    for ($i = 0; $i < count($com); $i++) {
          if($current==$com[$i]['page_name'])
            echo "<option value='{$com[$i]['page_name']}' selected>{$com[$i]['page_name']}</option>";
              else
        echo "<option value='{$com[$i]['page_name']}'>{$com[$i]['page_name']}</option>";
    }?>
     </select>
    <img src="<?php echo $edit['image']; ?>" style="width: 100px; ">
    <label>product image</label>
    <input type="file" name="image[]" value="" multiple="" >
    <label>product_Video</label>
    <input required="required" type="text" name="video" value="<?php echo $edit['video']; ?>">
    
       <label>product sale</label>
    <input required="required" type="text" name="sale" value="<?php echo $edit['sale']; ?>">
    
    
      <label>product tags</label>
    <input required="required" type="text" name="tags" value="<?php echo $edit['tags']; ?>">
    

    <label>Product description</label><br>
    <textArea name="desc" class="myTextEditor"><?php echo $edit['descrip'];?></textArea> <br>
    
    <label>NetWork</label>
    <textarea required="required" name="network" ><?php echo $edit['network']; ?></textarea>
    <label>Launch</label>
    <textarea required="required" name="launch"><?php echo $edit['launch']; ?></textarea>
    <label>body</label>
    <textarea required="required" name="body"><?php echo $edit['body']; ?></textarea>
    
    <label>Display</label>
    <textarea required="required" name="display"><?php echo $edit['display']; ?></textarea>
    <label>platform</label>
    <textarea required="required" name="platform"><?php echo $edit['platform']; ?></textarea>

    <label>memory</label>
    <textarea required="required" name="memory"><?php echo $edit['memory']; ?></textarea>
    <label>camera</label>
    <textarea required="required" name="camera"><?php echo $edit['camera']; ?></textarea>
    <label>sound</label>
    <textarea required="required" name="sound"><?php echo $edit['sound'] ;?></textarea>
    
    <label>comms</label>
    <textarea required="required" name="comms"><?php echo $edit['comms']; ?></textarea>
    <label>Features</label>
    <textarea required="required" name="features"><?php echo $edit['features']; ?></textarea>
    <label>battery</label>
    <textarea required="required" name="battery"><?php echo $edit['battery']; ?></textarea>
    
    
    
    <input type="hidden" name="username" value=" <?php echo  $_SESSION['admin'];?> " >
    <input class="btn-primary  btn-lg"  type="submit" name="submit" value="Edit">
</form>