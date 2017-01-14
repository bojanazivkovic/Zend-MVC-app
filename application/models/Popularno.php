<?php

class Application_Model_Popularno
{
    protected $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function get_popularno() {
        $statement = $this->db->select()
                ->from('mesto')
                ->limit(3);               
                
        return $this->db->fetchAll($statement);
    }
    function get_popularneVile() {
        $statement = $this->db->select()
                ->from('smestaj')
                ->limit(9);               
                
        return $this->db->fetchAll($statement);
    }
    
    
    function get_Vile() {
        $statement = $this->db->select()
                ->from('smestaj')
                ->limit(9);               
                
        return $this->db->fetchAll($statement);
    }


}

