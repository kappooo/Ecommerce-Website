<?php

/**
 * Description of display
 * display data from mysql
 * @author eslam
 */
class display extends awebarts {

    private $tablename;
    private $record;
    private $row_sections;
    private $row_sec;
    private $row_section;

    function __construct($tablename) {
        $this->tablename = $tablename;

        $this->connect_db();
        // $this->get_data();
        //$this->get_data_section();
    }

    public function count_name($product_name) {
        $sql = "select * from $this->tablename where `product_name`=:product_name";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':product_name', $product_name, pdo::PARAM_STR);
        $query->execute();
        $this->record = $query->fetchAll();
        return $this->record;
    }
    
    
    public function extra($sql) {
       
        $query = $this->use->connect->prepare($sql);
        $query->execute();
        $this->record = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->record;
    }
    
  
    public function search($search,  $data=array('name','tags','type')) {
        
        $sql = "SELECT * FROM $this->tablename WHERE ";
        foreach ($data as $val)
            $sql.="$val LIKE '%$search%' OR ";
          $sql=  substr($sql, 0,-3);
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':like', $like, pdo::PARAM_STR);
        $query->execute();
        $this->record = $query->fetchALL();
       
        return $this->record;
    }
    
    public function search_by_cat_id($search,$cat_id) {
        $sql = "SELECT * FROM $this->tablename WHERE name LIKE '%$search%' AND `cat_id` = $cat_id";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':like', $like, pdo::PARAM_STR);
        $query->execute();
        $this->record = $query->fetchALL();
        return $this->record;
    }
    
     public function get_company($val,$col) {
         
        $sql = "SELECT distinct type FROM $this->tablename WHERE $col=$val";
        $query = $this->use->connect->prepare($sql);
        $query->execute();
        $this->record = $query->fetchALL(PDO::FETCH_ASSOC);
     
      $ret=array();
         foreach ($this->record as $value)
        {
             $sql = "SELECT *  FROM pages WHERE page_name='{$value['type']}'";
           
        $query = $this->use->connect->prepare($sql);
      
        $query->execute();
          $ret[]= $query->fetchALL(PDO::FETCH_ASSOC);
        }
            
        
        return $ret;
    }
    
     public function get_cats_search($val,$col) {
         
        $sql = "SELECT distinct cat_id FROM $this->tablename WHERE $col=$val";
        $query = $this->use->connect->prepare($sql);
        $query->execute();
        $this->record = $query->fetchALL(PDO::FETCH_ASSOC);
       
      $ret=array();
         foreach ($this->record as $value)
        {
             $sql = "SELECT *  FROM categorey WHERE cat_id='{$value['cat_id']}'";
           
        $query = $this->use->connect->prepare($sql);
      
        $query->execute();
          $ret[]= $query->fetchALL(PDO::FETCH_ASSOC);
        }
             
        return $ret;
    }

    public function get_data_by_id($id,$col="id") {
        $id = intval($id);
        $sql = "select * from $this->tablename where $col =:id";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':id', $id, pdo::PARAM_INT);
        $query->execute();
 
        $this->record = $query->fetch(PDO::FETCH_ASSOC);
        return $this->record;
    }

    public function by_name($name, $column) {
        $sql = "select * from $this->tablename where $column=:name";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':name', $name, pdo::PARAM_STR);
        $query->execute();
      
        $this->record = $query->fetch();
        
        return $this->record;
    }

    public function by_category($name, $column) {
        $sql = "select * from $this->tablename where $column=:name";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':name', $name, pdo::PARAM_STR);
        $query->execute();
        $this->record = $query->fetchAll();
        return $this->record;
    }
    
   

    public function by_username($name) {
        $sql = "select * from $this->tablename where `username`=:name";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':name', $name, pdo::PARAM_STR);
        $query->execute();
        $this->record = $query->fetch();
        return $this->record;
    }

    public function get_data_section() {
        $sql = "select * from $this->tablename order by `id` desc";
        $query = $this->use->connect->prepare($sql);
        $query->execute();
        $this->row_sections = $query->fetchAll();
        return $this->row_sections;
    }
    public function count_id_in_site($name,$column) {
        $sql = "SELECT * FROM $this->tablename where `$column`=:id";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':id', $name, pdo::PARAM_INT);
        $query->execute();
        $this->row_section = $query->rowCount();
        return $this->row_section;
    }
    public function random_sel($extra="",$limit=8){
        
         $sql = "select * from $this->tablename $extra order by rand() limit $limit";
        $query = $this->use->connect->prepare($sql);
        $query->execute();
        $this->row_sections = $query->fetchAll();
        return $this->row_sections;
        
    }
     public function countrows($col,$val,$extra=""){
         
        if($col=='cat_id')
         $sql = "SELECT COUNT(id) FROM $this->tablename where $col=$val $extra";
         else {
           $sql = "SELECT COUNT(id) FROM $this->tablename where $col='$val' $extra";
         }
       
        $query = $this->use->connect->prepare($sql);
        $x=$query->execute();
         $this->row_sections = $query->fetch();
        return   $this->row_sections;
        
        
    }
    
    public function pagination($col,$value,$start,$extra="",$perPage=9,$order='id desc',$select='*',$where="where")
    { if($where=='where')
       $where.=" $col = '$value' ";
    $start=$start-1;
    $start=$start*$perPage;   
    if($col=="cat_id")
        $sql = "select $select from $this->tablename $where  $extra order by $order limit $start,$perPage ";
    else
         $sql = "select $select from $this->tablename $where $extra order by $order limit $start,$perPage ";
     
    $query = $this->use->connect->prepare($sql);
        $query->execute();
        $this->row_sections = $query->fetchAll();
    return $this->row_sections;
    
    }
    
    
    public function get_data() {
        $sql = "select * from $this->tablename order by `id` desc limit 1 ";
        $query = $this->use->connect->prepare($sql);
        $query->execute();
        $row = $query->fetch();
        return $row;
    }

    public function get_data_array() {
        $sql = "select * from $this->tablename  ";
        $query = $this->use->connect->prepare($sql);
        $query->execute();
        $row = $query->fetchAll();
        return $row;
    }

    public function get_all_data($id, $col= "id",$extra='') {
        $id = intval($id);
        $sql = "select * from $this->tablename where `$col`=:id $extra";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':id', $id, pdo::PARAM_INT);
        $query->execute();
        $this->row_sec = $query->fetchAll();
        return $this->row_sec;
    }

    public function get_all_data_by_type($type) {
        $sql = "select * from $this->tablename where statues=1 AND `type`=:type";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':type', $type, pdo::PARAM_STR);
        $query->execute();
        $this->row_section = $query->fetchAll();
        return $this->row_section;
    }

    public function rating($id) {
        $sql = "SELECT AVG(vote) FROM $this->tablename where phone_id=:phone_id";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':phone_id', $id, pdo::PARAM_INT);
        $query->execute();
        $this->row_section = $query->fetch();
        return $this->row_section;
    }

    public function user_rating($id) {
        $sql = "SELECT username FROM $this->tablename where phone_id=:phone_id";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':phone_id', $id, pdo::PARAM_INT);
        $query->execute();
        $this->row_section = $query->rowCount();
        return $this->row_section;
    }

    public function limt_user_rate($id, $username) {
        $sql = "SELECT * FROM $this->tablename where `phone_id` =:phone_id AND `username` =:username";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':phone_id', $id, pdo::PARAM_INT);
        $query->bindparam(':username', $username, pdo::PARAM_STR);
        $query->execute();
        $this->row_section = $query->rowCount();
        return $this->row_section;
    }
    public function get_rating_info($id, $username) {
        $sql = "SELECT * FROM $this->tablename where `phone_id` =:phone_id AND `username` =:username";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':phone_id', $id, pdo::PARAM_INT);
        $query->bindparam(':username', $username, pdo::PARAM_STR);
        $query->execute();
        $this->row_section = $query->fetch();
        return $this->row_section;
    }
    public function get_comments($id, $username) {
        $sql = "SELECT * FROM $this->tablename where `phone_id` =:phone_id AND `username` =:username ";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':phone_id', $id, pdo::PARAM_INT);
        $query->bindparam(':username', $username, pdo::PARAM_STR);
        $query->execute();
        $this->row_section = $query->fetchAll();
        return $this->row_section;
    }
    public function user_cart($username) {
        $sql = "SELECT * FROM $this->tablename where `quantity` !=0  AND `username` =:username";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':username', $username, pdo::PARAM_STR);
        $query->execute();
        $this->row_section = $query->fetchAll();
        return $this->row_section;
    }
    
    public function count_user_in_site($name,$column) {
        $sql = "SELECT username FROM $this->tablename where `$column`=:username";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':username', $name, pdo::PARAM_STR);
        $query->execute();
        $this->row_section = $query->rowCount();
        return $this->row_section;
    }
    
    //repeated functions
    
    
     public function get_message($username, $admin) {
        $sql = "SELECT * FROM $this->tablename where `admin` =:admin AND `username` =:username ";
        $query = $this->use->connect->prepare($sql);
        $query->bindparam(':admin', $admin, pdo::PARAM_STR);
        $query->bindparam(':username', $username, pdo::PARAM_STR);
        $query->execute();
        $this->row_section = $query->fetchAll();
        return $this->row_section;
    }
    
    // used in chat to provid active admin in cms  /////////site1 chat.php ///////////////////
    public function get_actv_adm() {
        $sql = "select * from $this->tablename where use_chat=1 ";
        $query = $this->use->connect->prepare($sql);
        $query->execute();
        $this->row_section = $query->fetchAll();
        return $this->row_section;
    }
    
    public function count_user_in_table() {
        $sql = "SELECT username FROM $this->tablename ";
        $query = $this->use->connect->prepare($sql);
        $query->execute();
        $this->row_section = $query->rowCount();
        return $this->row_section;
    }
    
     public function use_chat() {
        $sql = "select * from $this->tablename where use_chat=1 ";
        $query = $this->use->connect->prepare($sql);
        $query->execute();
        $this->row_section = $query->rowCount();
        return $this->row_section;
    }

}
