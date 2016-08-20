<form action="" method="post" enctype="multipart/form-data" class="main_settings add newpage">
    <h1> Edit Category</h1>
    <label>New Category name</label>
    <input type="text"  name="cat_name" placeholder="write the name of page" value="<?php echo $data['cat_name']; ?>">
    <label>Category image</label>
    
    <input type="file" name="cat_img[]"  >
    <img src="<?php echo $data['cat_img'];?>" width="35%">
   
    
    <input class="bg-primary" type="submit" name="submit" value="edite">
    
    
</form>
