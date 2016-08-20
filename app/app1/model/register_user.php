<?php

/**
 * Description of register class
 *
 * @author eslam
 */
class register_user extends awebarts {

    private $fristname;
    private $birthday;
    private $telephone;
    private $username;
    private $email;
    private $password;
    private $repassword;
    private $city;
    private $address;

    function __construct($data) {
        if (is_array($data)) {
            $this->set_data($data);
        } else
            echo 'that is not array';

        $this->connect_db();

        $this->insert_data();
        $this->close_db();
    }

    private function set_data($data) {
        $this->fristname = $data['fristname'];
        
        $this->birthday = $data['birthday'];
        $this->telephone = $data['telephone'];
        $this->username = $data['username'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        
        $this->city = $data['city'];
        $this->address = $data['address'];
        
    }

    

    private function insert_data() {
        $get = "select username,password from user_in_site where username= :username";
        $query = $this->use->connect->prepare($get);
        $query->bindparam(':username', $this->username, pdo::PARAM_STR);
        $query->execute();
        $result = $query->fetch();
        if ($result == FALSE) {
            $insert = "insert into user_in_site values('','$this->fristname',"
            ."'$this->birthday','$this->telephone',"
            . "'$this->username','$this->email','$this->password','$this->city','$this->address')";
            $query2=  $this->use->connect->prepare($insert);
            $ins_into= $query2->execute();
            
            if ($ins_into == TRUE) {
                echo 'register successful';
                //session_start();
                $_SESSION['username']=$this->username;
                header("location:index.php");
            } else {
                echo 'Erorr!!!! register faild';
                
            }
        } else {
            echo 'your username  is already exist';
        }
    }

}
