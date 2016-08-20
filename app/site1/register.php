<?php
include 'nav_bar.php';
?>

<section class="login_in">
    <h3>
        MoBilY
        <li class="fa fa-mobile-phone fa-1x"></li>
    </h3>  
    <div class="login" id="login">
        <h2>Create account</h2><hr>
        <form action="" method="post" class="form-group">
            <label>your name</label>
            <input type="text" name="fristname"class="input-lg">
            <label>Birthday</label>
            <input type="date"  name="birthday"class="input-lg"  >
            <label>mobile number</label>
            <input type="tel"  name="telephone"class="input-lg"style="width:320px; height:40px;"  >
            <label>email</label>
            <input type="email"   name="email"class="input-lg" style="width:320px; height:40px;" >
            <label>username</label>
            <input type="text" name="username"class="input-lg" style="width:320px; height:40px;" >
            <label>password</label>
            <input type="password"  name="password"class="input-lg"style="width:320px; height:40px;" >
            
            <label>city</label>
            <input type="text"   name="city"class="input-lg" style="width:320px; height:40px;" >
            <label>Address</label>
            <input type="text"  name="address"class="input-lg" style="width:320px; height:40px;" >
            <input type="submit" name="submit" value="Sign Up"style="margin-left: 2px; width:320px; height:40px;" class="btn-primary ">
        </form>
        <hr>
        <h5 style=" position: relative; left: 25px; margin-bottom: 30px;">Already have an account?
            <a style="position: relative;left:0px;" href="index.php?page=login.php" >Sign In</a>
        </h5>
    </div>
<section>


