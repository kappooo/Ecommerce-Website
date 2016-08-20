<?php

/**
 * Description of delete_files
 * model to delete files
 * @author eslam
 */
class delete_files 
{
    private $files;
    
  
    
    public function delete_file($files)
    {
        if(is_array($files))
        $this->files=$files;
        foreach ($this->files as $file)
        {
            if(file_exists($file))
            {
                unlink($file); 
            }else
            {
               echo'there was not file';
            }
                
        }
        return TRUE;   
    }
    
    
    public function delete_one_file($name)
        {
           if(file_exists($name))
            {
                unlink($name); 
            }else
            {
               echo'there was not file';
            }
        }
    
}
