<?php
$id = filter_input(INPUT_POST,'phone_id',FILTER_SANITIZE_NUMBER_INT);
//$obje_dis = new display('specifications');
//$pro_deti = $obje_dis->by_name($id, 'id');
//print_r($pro_deti);
?>
<h3> Are you sure you want delete this product </h3>

<div class="modal-footer ">
    <button type="button" style="width: 80px;height: 50px;"
            class="btn btn-default" data-dismiss="modal"> NO 
    </button>
    <a href="?page=product&action=delete&id=<?php echo $id; ?>"
       style="margin-right: 339px;width: 80px;height: 50px;padding-top: 13px;" 
       type="button" class="btn btn-primary"> YES 
    </a>
</div>

