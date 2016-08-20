
<h3>library</h3>
<?php
if ($_POST) {
    if (isset($_POST['submit']) && $_POST['submit'] == "upload") {
        if ($_FILES) {
            $file = $_FILES['image'];
            $allowed_exten = array('png', 'pneg', 'jpg', 'gif');
            $max_size = 4000000;
            $upload_dir = "resources/upload/";
            include 'model/upload.php';
            $upload = new upload($file, $max_size, $allowed_exten, $upload_dir);
            $upload->upload_file();
            $upload->get_file_url();
        }
    }
} 
    //  include 'views/v_upload_file.php';
    $upload_dir = "resources/upload/";
    $folder = scandir($upload_dir);
    
    echo"<h3> click any folder to mange pictures </h3>";
    for ($n =0; $n < count($folder); $n++) {
        if ($folder[$n] == '.' or $folder[$n] == '..') {
        //    unset($folder[$n]);
       } else {
           echo<<<EOD
           <a href='?page=fld_content&fld=$folder[$n]'>
           <div class = "fold" style="border: 1px solid;width: 192px;
               text-align: center;float: left; margin:5px; height: 140px; ">
            <img src="resources/upload/folder.png">
             <h5> $folder[$n]</h5> 
           </div>
           </a>        
           
EOD;
        
        }
   }
?>