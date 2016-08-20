<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<script>
    $("document").ready(function () {
        $("#mob_det").click(function () {
            $("#add_hid").toggle();
        });
        $("#lap_det").click(function () {
            $("#add_hid").toggle();
        });
        $("#lap_det").click(function () {
            $("#mob_det").toggle();
        });
        $("#mob_det").click(function () {
            $("#lap_det").toggle();
        });
    });

</script>
<form action="" method="post" enctype="multipart/form-data"  class=" main_settings add newpage" novalidate="">
    <label>Product name</label>
    <input required="required" type="text" name="name" value="">

    <label>Select category</label>

    <select name="cat_id">
        <?php
        $casts = new display('categorey');
        $catsArr = $casts->get_data_array();
        for ($i = 0; $i < count($catsArr); $i++) {
            echo "
               <option value='{$catsArr[$i]['cat_id']}'>{$catsArr[$i]['cat_name']}</option>";
        }
        ?>
    </select>

    <label>price</label>
    <input required="required" type="text" name="price" value="">

    <label>Product company</label>
    <select name="type">
        <?php
        $companies = new display('pages');
        $com = $companies->get_data_array();
        for ($i = 0; $i < count($com); $i++) {
            echo "
               <option value='{$com[$i]['page_name']}'>{$com[$i]['page_name']}</option>";
        }
        ?>
    </select>

    <label>Product Quantity</label>
    <input required="required" type="text" name="product_quantity" value="">
    <label>product image</label>
    <input type="file" name="image[]" value="" multiple="" >
    <label>Product Video</label>
    <input required="required" type="text" name="video" value="" placeholder="video LINK">

    <label>Product tags</label>
    <input required="required" type="text" name="tags" value="" placeholder="tags for search">


    <label>Product description</label><br>
    <textarea name="desc" class="myTextEditor"></textarea> <br>
    <button id="mob_det" type="button" class="btn btn-primary" data-toggle="collapse" data-target="#mobile">
        <i class="fa fa-expand" aria-hidden="true"></i>
        mobile details

    </button>
    <button id="lap_det" type="button" class="btn btn-success" data-toggle="collapse" data-target="#laptop">
        laptop details
    </button>

    <div id="mobile" class="collapse">
        <br/>

        <label>NetWork</label>
        <ul>
            <li><h4 class="btn btn-primary">2g_bands</h4></li>
            <li><h4 class="btn btn-primary">3g_bands</h4></li>
            <li><h4 class="btn btn-primary">4g_bands</h4></li>
            <li><h4 class="btn btn-primary">speed</h4></li>
            <li><h4 class="btn btn-primary">GPRS</h4></li>
            <li><h4 class="btn btn-primary">EDGE</h4></li>
        </ul>
        <h3 class="btn-danger" style="height: 200px; width: 200px; clear: both;
            position: absolute;top: 200px; right:110px; position: fixed;background: rgba(219, 15, 15, 0.48);"> 
            Notice That :- You Must entre underscore sign (_) after each property please 
        </h3>
        <textarea required="required" name="network"></textarea>
        <label>Launch</label>
        <ul>
            <li><h4 class="btn btn-primary">Announced</h4></li>
            <li><h4 class="btn btn-primary">Statue</h4></li>
        </ul>
        <textarea required="required" name="launch"></textarea>
        <label>body</label>
        <ul>
            <li><h4 class="btn btn-primary">Dimensions</h4></li>
            <li><h4 class="btn btn-primary">Weight</h4></li>
        </ul>
        <textarea required="required" name="body"></textarea>

        <label>Display</label>
        <ul>
            <li><h4 class="btn btn-primary">Type</h4></li>
            <li><h4 class="btn btn-primary">Size</h4></li>
            <li><h4 class="btn btn-primary">Resolution</h4></li>
        </ul>
        <textarea required="required" name="display"></textarea>
        <label>platform</label>
        <ul>
            <li><h4 class="btn btn-primary">OS</h4></li>
            <li><h4 class="btn btn-primary">Chipset</h4></li>
            <li><h4 class="btn btn-primary">CPU</h4></li>
        </ul>
        <textarea required="required" name="platform"></textarea>

        <label>memory</label>
        <ul>
            <li><h4 class="btn btn-primary">Card slot</h4></li>
            <li><h4 class="btn btn-primary">Internal</h4></li>

        </ul>
        <textarea required="required" name="memory"></textarea>
        <label>camera</label>
        <ul>
            <li><h4 class="btn btn-primary">Primary</h4></li>
            <li><h4 class="btn btn-primary">Features</h4></li>
            <li><h4 class="btn btn-primary">Video</h4></li>
            <li><h4 class="btn btn-primary">Secondary</h4></li>

        </ul>
        <textarea required="required" name="camera"></textarea>
        <label>sound</label>
        <ul>
            <li><h4 class="btn btn-primary">Alert types</h4></li>
            <li><h4 class="btn btn-primary">Loudspeaker</h4></li>
            <li><h4 class="btn btn-primary">3.5mm jack</h4></li>

        </ul>
        <textarea required="required" name="sound"></textarea>
        <label>comms</label>
        <ul>
            <li><h4 class="btn btn-primary">WLAN</h4></li>
            <li><h4 class="btn btn-primary">Bluetooth</h4></li>
            <li><h4 class="btn btn-primary">GPS</h4></li>
            <li><h4 class="btn btn-primary">Radio</h4></li>
            <li><h4 class="btn btn-primary">USB</h4></li>

        </ul>
        <textarea required="required" name="comms"></textarea>
        <label>Features</label>
        <ul>
            <li><h4 class="btn btn-primary">Sensors</h4></li>
            <li><h4 class="btn btn-primary">Messaging</h4></li>
            <li><h4 class="btn btn-primary">Browser</h4></li>
            <li><h4 class="btn btn-primary">Java</h4></li>


        </ul>
        <textarea required="required" name="features"></textarea>
        <label>battery</label>
        <ul>
            <li><h4 class="btn btn-primary">Stand-by</h4></li>
            <li><h4 class="btn btn-primary">Talk time</h4></li>
        </ul>
        <textarea required="required" name="battery"></textarea>
        <input type="submit" name="submit" value="ADD Product" class="btn-primary">
    </div>
    <div id="laptop" class="collapse">

        <br>
        <label>PROCESSOR:</label>
        <input required="required" type="text" name="processor">
        <label>VIDEO MEMORY:</label>
        <input type="text" name="video_memory" required="required">
        <label>RAM:</label>
        <input required="required" type="text" name="ram">
        <label>STORAGE:</label>
        <input required="required" type="text" name="storage">
        <label>DISPLAY</label>
        <input required="required" type="text" name="dis_resolution">
        <label>CONNECTOR TYPE:</label><br>
        <input required="required" type="text" name="connecting">
        <label>OS:</label>
        <input required="required" type="text" name="os" >
        <label>COMPONENT:</label>
        <input required="required" type="text" name="component">
        <label>OPTICAL DRIVE:</label>
        <input required="required" type="text" name="drive">
        <label>COLOR:</label>
        <input required="required" type="text" name="color">
        <label>WARRANTY:</label>
        <input required="required" type="text" name="warranty">
        <input type="submit" name="submit" value="ADD PRODUCT" class="btn-primary">
    </div>



    <input type="hidden" name="username" value=" <?php echo $_SESSION['admin'] ?> " >
    <input id="add_hid" class="btn-primary  btn-lg"  type="submit" name="submit" value="Add New Product">
</form>
<script src="http://localhost/app/app1/resources/js/tinymce/tinymce.min.js"></script>

<script>
    tinyMCE.init({
        mode: "textareas",
        mode : "specific_textareas",
                editor_selector: "myTextEditor",
    });
</script>