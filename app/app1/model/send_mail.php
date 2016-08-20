<?php

/**
 * Description of send_mail
 * used for client to send message to company ...
 * @author mosae
 */

//include 'include/functio.php';
class send_mail {
    private $to;
    private $header;
    private $subject;
    private $message;
   
            function __construct($to,$subject,$message,$header)
    {                     
        $this->to=$to;
        $this->subject=$subject;            
        $this->message=$message;      
        $this->header=$header;
        mail($this->to, $this->subject, $this->message);  
    }
}
