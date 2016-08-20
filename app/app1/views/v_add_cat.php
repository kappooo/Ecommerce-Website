<form action="" method="post" enctype="multipart/form-data" class="main_settings add newpage">
    <h1>Add new category</h1>
    <label>New Category name</label>
    <input type="text" name="cat_name" placeholder="write the name of category">
    <label>Category image</label>
    <input type="file" name="cat_img[]"  >

    <input type="hidden" name="cat_date" value="<?php echo date("d-m-y"); ?>">
    <input class="bg-primary" type="submit" name="submit" value="Add">
    
    
</form>