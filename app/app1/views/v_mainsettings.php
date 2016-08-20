


<form action="" method="post" class="main_settings">
    <label>site name</label>
    <input required="required" type="text" name="site_name" value="<?php echo $row['site_name']?>">
    <label>site url</label>
    <input required="required" type="text" name="site_url" value="<?php echo $row['site_url']?>">
    <label>site Email</label>
    <input required="required" type="email" name="site_email" value="<?php echo $row['site_email']?>">
    
    <label>site description</label>
    <textarea required="required" name="site_desc"><?php echo $row['site_desc']?></textarea>
    <label>site tags </label>
    <textarea required="required" name="site_tags"><?php echo $row['site_tags']?></textarea>
    <label>Home panel</label>
    <textarea required="required" name="site_homepanal"><?php echo $row['site_homepanal']?></textarea>
    
    <label>facebook link</label>
    <input required="required" type="text" name="fb" value="<?php echo $row['fb']?>">
    <label>Twitter link</label>
    <input required="required" type="text" name="tw" value="<?php echo $row['tw']?>">
    <label>Youtube link</label>
    <input required="required" type="text" name="yt" value="<?php echo $row['yt']?>">
    <label>Rss link</label>
    <input required="required" type="text" name="rss" value="<?php echo $row['rss']?>">
    
    
    <input type="hidden" name="username" value=" <?php echo $_SESSION['username']?> " >
    <input class="btn-primary  btn-lg"  type="submit" name="submit" value="update">
</form>