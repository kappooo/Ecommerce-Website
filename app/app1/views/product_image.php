
<script>
    $(document).ready(function () {
        $("#need").click(function () {
            $("#result_more").hide();
        });
        var name = $("#pro_name").val();
        $("#img").val(name);
    });

</script>

<form action='?page=product' method='post'enctype="multipart/form-data" class='form-group main_settings'>
    <label> Enter Mobile Name:- </label>
    <input class='input-lg input-group' id="img" required="" type='text' name='product_name' >
    <label>product image</label>
    <input type="file" name="image[]" value="" multiple="" >
    <input class='btn-success' required="" type='submit' name='submit' value='image'>
    <h3 class="btn-default" style="padding: 10px;"> 
        Notice That: The maximum numper of files to uploade 20 files
    </h3>
</form> 

<div id="result_add_imgs" style="width: 247px;position: absolute;
    top: 177px;left: 550px;z-index: 999999;background: #222222;border-radius: 5px;">
</div>

<?php

if (isset($_GET['search'])) {
    $like = $_GET['search'];
    $more = new display('specifications');
    $results = $more->search($like);
    echo "<div id='result_more'>";
    foreach ($results as $result) {
        echo "
             <ul>
               <a href='?page=product&&type=image&name={$result['name']}' id='need'>
                  <li>{$result['name']}</li>
               </a>
            </ul>";
    }
    echo "</div>";
}
if (isset($_GET['name'])) {
    echo<<<EOD
        <input type="hidden" id="pro_name" value="{$_GET['name']}">
EOD;
}
?>

