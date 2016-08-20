<?php

class login extends awebarts {

    private $username;
    private $tablename;
    private $password;
    private $get_data;

    function __construct($data, $tablename) {

        if (is_array($data)) {
            $this->set_data($data, $tablename);
        } else
            echo 'that is not array';

        $this->connect_db();
       //$this->close_db();
    }

    private function set_data($data, $tablename) {
        $this->username = $data['username'];
        $this->password = $data['password'];
        $this->tablename = $tablename;
    }

    public function get_data($extra='') {
        $get = "SELECT * FROM $this->tablename WHERE username = :username AND password = :password $extra";
        try {
            $query = $this->use->connect->prepare($get);
            $query->bindParam(':username', $this->username, pdo::PARAM_STR);
            $query->bindParam(':password', $this->password, pdo::PARAM_STR);
            $query->execute();
           
          
        } catch (Exception $ex) {
            $ex->getMessage();
        }
        $result = $query->rowCount();
      
        return $result;
    }

}
