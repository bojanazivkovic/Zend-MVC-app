<?php

class Application_Model_Onama
{

    protected $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function get_tekst() {
        $statement = $this->db->select()->from('onama');
        return $this->db->fetchAll($statement);
    }
    
    public function insertTekst($post){
      $data = array(
            "naslov" => $post['naslov'],
            "tekst" => $post['tekst'],
           
        );
        return $this->db->insert('onama', $data);
    }
    
    public function updateOnama($post){
         $data = array(
            "naslov" => $post['naslov'],    
            "tekst" => $post['tekst'],            
        );
        return $this->db->update('onama',$data,"idOnama=".$post['idOnama']);
        
     
    }
    
     function obrisi_onama($id) {
        return $this->db->delete("onama", "idOnama=" . $id);
    }
    
    

}
