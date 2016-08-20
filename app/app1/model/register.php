<?php

/**
 * Description of register class
 *
 * @author eslam
 */
class register extends awebarts {

    private $name;
    private $username;
    private $password;
    private $email;

    function __construct($data) {
        if (is_array($data)) {
            $this->set_data($data);
        } else
            echo 'that is not array';

        $this->connect_db();
    }

    private function set_data($data) {
        $this->name = $data['name'];
        $this->username = $data['username'];
        $this->password = $data['password'];
        $this->email = $data['email'];
    }

    

    public function insert_data() {
        $get = "select username from users where username= :username";
        $query = $this->use->connect->prepare($get);
        $query->bindparam(':username', $this->username, pdo::PARAM_STR);
        $query->execute();
        $result = $query->fetch();
        if ($result == FALSE) {
            $insert = "insert into users values('','$this->name','$this->username','$this->email','$this->password',0)";
            $query2=  $this->use->connect->prepare($insert);
            $ins_into= $query2->execute();
            
            if ($ins_into == TRUE) {
               
                return true;
            } else {
              
                return false;
            }
        } else {
          
            return false;
        }
    }

}
