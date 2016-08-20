<?php

include 'nav_bar.php';
?>
<section class="login_in">
    <h3 style="text-align: center;">
        MoBilY
        <li class="fa fa-mobile-phone fa-1x"></li>
    </h3>   
    <?php
    if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    if(!isset($_SESSION['username'])){?>
    <div class="login" id="login">
        <h2>Sign In</h2>
        <form action="" method="post" class="form-group">
            <label>username</label>
            <input type="text"required="required" name="username" class="input-lg">
            <label>Password</label>
           
            <input type="password"required="required" name="password"class="input-lg"  >
            <input type="submit" name="submit" value="Sign In"style="width:95%; height:40px;" class="btn-danger ">            
        </form>
        <h5 class="text-center">New to Mobily?</h5>
        <a href="?page=register.php" style="text-decoration: none; text-align: center;padding-top: 10px; " 
           class="btn-primary">Create an account
        </a>
    </div>
    <?php }?>
    
</section>  
