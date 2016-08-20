<?php

$id_prod = $_POST['phone_id'];
//$obj-delt = new delete('wish_list');

echo<<<EOD
   <h3 style="text-align: center; font-size: 35px; height: 56px;"> 
         Are You Sure You Want Remove this Product 
    </h3>

    <div class = "modal-footer" style = "clear: left;">
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">No</button>
                <a href = "?page=wish_list/wishlist.php&wish_list=delt_only&id=$id_prod"
                   class = "btn btn-danger">Yes
    </a>
</div>
EOD;


