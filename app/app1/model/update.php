<?php

/**
 * Description of update
 * update your data
 * @author eslam
 */
class update extends awebarts {

    private $tablename;
    private $data;

    function __construct($tablename, $data, $id,$col="id") {
        if (is_array($data)) {
            $this->data = $data;
            $this->tablename = $tablename;
        } else {
            echo 'that is not array';
        }
        $this->connect_db();
        $this->update($id,$col);
    }

    public function update($id,$col="id") {
        $id = intval($id);
        $sql = "UPDATE $this->tablename SET  ";
        foreach ($this->data as $key => $value) {
            $sql .= "`".$key. "`  = :".$key.", ";
        }
        $patt = "+-0*/";
        $sql .=$patt;
        $sql = str_replace(", " . "$patt", " ", $sql);
        $sql .=" WHERE $col = $id";
        
     
      
        $query = $this->use->connect->prepare($sql);
        foreach ($this->data as $key => $value) {
            $query->bindparam(":$key", $this->data[$key], pdo::PARAM_STR);
        }
 
        if (!$query->execute()) {
            echo 'Erorr: your query is wrong';
        } else
            echo '';
    }

}
