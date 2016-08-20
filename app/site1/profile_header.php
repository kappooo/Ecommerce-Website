   <div class="profil_header col-lg-12">
      
            <?php
             if(file_exists($img['img'])){
                 echo '<img class="profil_img img-thumbnail" src="'.$img['img'].'">';
             }else{
                 echo '<img class="profil_img img-thumbnail" '
                 . 'src="app1/resources/upload/profile_img/anonymous.png">';
             }
                 
            ?> 
            
            <h2> <?php echo $_SESSION['username']; ?> </h2>
            <p><?php echo $account_setting['email']; ?></p>
            <h4> <?php echo $account_setting['city'] . " ,egypt"; ?> </h4>
            <!-- /////////////////// start uploading profile image ////////////// -->
            <?php
            include 'profile_img.php';
            ?>
            <!-- /////////////////// end uploading profile image ////////////// -->
        </div>