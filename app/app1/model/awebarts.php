<?php

/**
 * Description of webarts
 *
 * @author mosae
 */
//include_once 'include/autoloader.php';
class awebarts {
    public $use;
            
    function connect_db() {
        include_once  'database.php';
        $var= 'include/vars.php';
        $this->use= new Database($var);
        
    }
    
    function close_db()
    {
        $this->use=NULL;
    }
    
}
