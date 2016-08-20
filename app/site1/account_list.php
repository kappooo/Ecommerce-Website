  


<?php
    $page=$_GET['page'];

?>
<div class="col-sm-3 col-xs-12">
           





			<div class="profile-sidebar">
				
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php    echo $_SESSION['username'];?>
					</div>
					<div class="profile-usertitle-job">
						Developer
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						 <li><a class="<?php if($page=='my_account.php')echo 'active';?> fa fa-book" href="?page=my_account.php"> My Orders </a></li>
                <li ><a class="<?php if($page=='accpay.php')echo 'active';?> fa fa-credit-card" href="?page=accpay.php"> payments </a></li>  
                <li ><a class="<?php if($page=='wish_list/wishlist.php')echo 'active';?> fa fa-lock" href="?page=wish_list/wishlist.php"> Wish Lists </a></li>
                <li ><a class="<?php if($page=='account_setting.php')echo 'active';?> fa fa-edit" href="?page=account_setting.php"> Account Settings </a></li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
 </div>