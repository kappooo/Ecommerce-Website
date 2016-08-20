<?php

/*
 * Description of  awebarts classs
  *is the main class
 * @author eslam
 */
//error_reporting(0);
//include_once '../include/autoloader.php';
class awebarts 
{
    public function connect_db()
    {
       include_once 'database.php';
        $var="include/vars.php";
        $this->use = new Database($var);
    }
    
    
    public function close_db()
    {
        $this->use->connect=NULL ;
    }
}
