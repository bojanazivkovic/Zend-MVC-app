<?php

class Application_Model_Ostalo
{
    protected $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    
    
    public function insertKategorija($post) {
        $data = array(
            "naziv" => $post['naziv'],
        );
        return $this->db->insert('kategorija', $data);
    }
    
    function get_kategorije() {

       $statement = $this->db->select()
                ->from('kategorija');
                
        return $this->db->fetchAll($statement);
    }
    
    function obrisi_kategoriju($id){
        return $this->db->delete("kategorija", "idKategorija=" . $id);
    }
    
    
    
    
    public function insertDrzava($post) {
        $data = array(
            "drzava" => $post['drzava'],
        );
        return $this->db->insert('drzava', $data);
    }
    
    function get_drzave() {

       $statement = $this->db->select()
                ->from('drzava');
                
        return $this->db->fetchAll($statement);
    }
    
    function obrisi_drzavu($id){
        return $this->db->delete("drzava", "idDrzava=" . $id);
    }
    
    
    
    
    public function insertMesto($post) {
        $data = array(
            "mesto" => $post['mesto'],
        );
        return $this->db->insert('mesto', $data);
    }
    
    function get_mesta() {

       $statement = $this->db->select()
                ->from('mesto');
                
        return $this->db->fetchAll($statement);
    }
    
    function obrisi_mesto($id){
        return $this->db->delete("mesto", "idMesto=" . $id);
    }
    
    function get_cene() {
        $statement = $this->db->select()->from('cenovnik');
        return $this->db->fetchAll($statement);
        
    }

    public function insertCena($post) {
        $data = array(
            "cena" => $post['cena'],
        );
        return $this->db->insert('cenovnik', $data);
    }

    public function updateCena($post) {
        $data = array(
            "cena" => $post['cena'],
        );
        return $this->db->update('cenovnik', $data, "idCenovnik=" . $post['idCenovnik']);
    }

    function obrisi_cenu($id) {
        return $this->db->delete("cenovnik", "idCenovnik=" . $id);
    }

    


}

