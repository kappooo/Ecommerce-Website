<?php
/**
 * Description of add class
 * insert data in mysql
 * @author eslam mosa
 */
class add extends awebarts {

    private $data;
    private $tablename;

    function __construct($data, $tablename) {
        if (is_array($data)) {
            // $this->data = $data;
            $this->tablename = $tablename;
        } else {
            echo 'that is not array';
        }

        $this->connect_db();
        $this->add_data($data);
        $this->close_db();
    }

    public function add_data($data) {

        foreach ($data as $key => $value) {
            $keys[] = $key;
            $values[] = $value;
        }
        $tblkeys = implode($keys, ",");
        $keyss = ":" . implode($keys, ",:");

        //$values= '"'.implode($tblvalue, '","').'"';
        $sql = "INSERT INTO $this->tablename ($tblkeys) VALUES($keyss)";
        $query = $this->use->connect->prepare($sql);
        foreach ($keys as $key)
            $query->bindparam(":$key", $data[$key], pdo::PARAM_STR);

        if ($query->execute($data)) {
            return TRUE;
        
            }else{
                throw new Exception("the data not insert");
                return FALSE;
            }
    }

}
