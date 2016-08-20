<form action="" method="post" enctype="multipart/form-data" class="main_settings add newpage">
    <h1> Edit Company</h1>
    <label>New Company name</label>
    <input type="text"  name="page_name" placeholder="write the name of page" value="<?php echo $data['page_name']; ?>">
    <label>Page image</label>
    
    <input type="file" name="page_image[]" multiple="" >
    <img src="<?php echo $data['page_image'];?>" width="35%">
   
    
    <input class="bg-primary" type="submit" name="submit" value="edite">
    
    
</form>
