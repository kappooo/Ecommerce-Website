<?php
/**
 * Description of upload
 * upload file to destination
 * @author eslam
 */
class upload 
{
    private $allowed_exten;
    private $max_size;
    private $file;
    private $file_url;
    private $upload_dir;
    private $file_name;
            
    function __construct($file,$max_size,$allowed_exten,$upload_dir)
    {
      if(is_array($allowed_exten) && is_int($max_size))
      {
          $this->allowed_exten=$allowed_exten;
          $this->file=$file;
          $this->max_size=$max_size;
          $this->upload_dir=$upload_dir;
      }else
          {
            echo 'that is not array please try agaian';          
          }
    }
    
    public function upload_file()
    {

      for($i=0;$i<count($this->file['name']);$i++)
       {
         
         $erorrs=array();
         $filename   =  $this->file['name'][$i];
         $file_exte=explode('.', $filename);
         $fileexten  = strtolower(array_pop($file_exte));
         $filesize   =$this->file['size'][$i];
         $filetmpname=  $this->file['tmp_name'][$i];
         if(in_array($fileexten, $this->allowed_exten)== FALSE)
          {
           $erorrs[]="the extention is not available";
          }
         if($filesize > $this->max_size)
          {
            $erorrs[]="alloowed size is less than 2MB";
          }
     
        if(empty($erorrs))
         {
           $random=  rand(0,9999);
           $this->file_url=$random.$filename;
           $destination = $this->upload_dir.$random.$filename;
           move_uploaded_file($filetmpname,  $destination);
           $this->file_name[]=  $this->file_url;      
         }else
        {
          foreach ($erorrs as $erorr)
           {
             echo $erorr .'file not uploaded' ; 
           } 
        }
     
     
     }
    
        
    }
    
    public function get_file_url()
    {
        
        return $this->file_url;
    }
    
     public function get_file_name()
    {
         echo $this->file_name;
    }
}



    