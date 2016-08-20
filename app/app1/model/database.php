<?php

class Database {

    private $host;
    private $username;
    private $password;
    private $database;
    public $connect;

    function __construct($filename) {
        if (is_file($filename)) {
            include $filename;
        } else {
            echo "that is not file";
        }

        $this->host = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->connect_db();
    }

    public function connect_db() {
        try {
            $this->connect = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
        } catch (Exception $ex) {
            echo 'you faild to connect to db' . $ex->getMessage();
        }
    }

}
