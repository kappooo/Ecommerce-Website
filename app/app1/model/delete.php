<?php

/**
 * Description of delete
 * delet by id
 * @author eslam
 */
class delete extends awebarts {

    private $tabelname;

    public function __construct($tabelname) {
        $this->tabelname = $tabelname;
        $this->connect_db();
    }

    public function delete_by_id($id) {
        $id = intval($id);
        $sql = "delete from $this->tabelname where `id`=:id";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':id', $id, pdo::PARAM_INT);
        $query->execute();
    }

    public function delete_data_id($id, $column) {
        $id = intval($id);
        $sql = "delete from $this->tabelname where `$column`=:id";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':id', $id, pdo::PARAM_INT);
        $query->execute();
    }

    public function delete_by_username($username) {
        $sql = "delete from $this->tabelname where `username`=:username";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':username', $username, pdo::PARAM_STR);
        $query->execute();
    }

     public function delete_username_qountity($username) {
        $sql = "delete from $this->tabelname where `quantity` =0  AND `username` =:username";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':username', $username, pdo::PARAM_STR);
        $query->execute();
    }
    public function delete_by_name_id($username , $id) {
        $sql = "delete from $this->tabelname where `username` =:username  AND `phone_id` =$id";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':username', $username, pdo::PARAM_STR);
        $query->execute();
    }
    
     public function delete_by_username_colmn($username,$col) {
        $sql = "delete from $this->tabelname where `$col`=:username";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':username', $username, pdo::PARAM_STR);
        $query->execute();
    }
     
    public function delete_all() {
        $sql = "delete from $this->tabelname";
        $query = $this->use->connect->prepare($sql);
      //  $query->bindparam(':username', $username, pdo::PARAM_STR);
        $query->execute();
    }
}

