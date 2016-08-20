<form action="" method="post" enctype="multipart/form-data" class="main_settings add newpage">
    <h1>Add new cpmpany</h1>
    <label>New Company name</label>
    <input type="text" name="page_name" placeholder="write the name of page">
    <label>Page image</label>
    <input type="file" name="page_image[]" value="" multiple="" >

    <input type="hidden" name="page_date" value="<?php echo date("d-m-y"); ?>">
    <input class="bg-primary" type="submit" name="submit" value="Add">
    
    
</form>