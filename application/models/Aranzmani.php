<?php

class Application_Model_Aranzmani {

    protected $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function get_aranzmani() {
        $statement = $this->db->select()
                ->from(array('ar' => 'aranzman'))
                ->join(array('kat' => 'kategorija'), 'ar.idKategorija = kat.idKategorija')
                ->join(array('sm' => 'smestaj'), 'ar.idSmestaj = sm.idSmestaj')
                ->join(array('vrsm' => 'vrstasmestaja'), 'ar.idVrstaSmestaja = vrsm.idVrstaSmestaja')
                ->join(array('t' => 'termin'), 'ar.idTermin = t.idTermin')
                ->join(array('pr' => 'prevoz'), 'ar.idPrevoz = pr.idPrevoz')
                ->join(array('c' => 'cenovnik'), 'ar.idCenovnik = c.idCenovnik');               
                
        return $this->db->fetchAll($statement);
    }
    
    public function getAranzman($id) {
        $statment = $this->db->select()->from('aranzman')->where('idAranzman=' . $id);
        $result = $this->db->fetchRow($statment);

        return $result;
    }
    
    function get_kategorije() {

       $statement = $this->db->select()
                ->from('kategorija');
                
        return $this->db->fetchAll($statement);
    }
    
      function get_kategorija($id) {

       $statement = $this->db->select()
                ->from('kategorija')->where('idKategorija=' . $id);;
                
        return $this->db->fetchRow($statement);
    }
    
    function get_smestaji() {

        $statement = $this->db->select()
                ->from('smestaj');
                
        return $this->db->fetchAll($statement);
    }
    
    
    function get_vrstaSmestaja() {

        $statement = $this->db->select()
                ->from('vrstasmestaja');
                
        return $this->db->fetchAll($statement);
    }
    function get_termini() {

        $statement = $this->db->select()
                ->from('termin');
                
        return $this->db->fetchAll($statement);
    }
    
    function get_prevoz(){
        $statement = $this->db->select()
                ->from('prevoz');
                
        return $this->db->fetchAll($statement);
    }
    function get_cenovnik(){
        $statement = $this->db->select()->from('cenovnik');         
        return $this->db->fetchAll($statement);
    }
    
    
    

    
    //LETO
    function get_leto() {

        $sql = 'SELECT * FROM smestaj WHERE idKategorija = ?';
        return $this->db->fetchAll($sql, 1);
    }
    
    public function getLeto($id) {
        $statment = $this->db->select()->from('smestaj')->where('idSmestaj=' . $id);
        $result = $this->db->fetchRow($statment);

        return $result;
    }
    //kraj LETO
    
    
    
    
//zima
    function get_zima() {

        $sql = 'SELECT * FROM smestaj WHERE idKategorija = ?';
        return $this->db->fetchAll($sql, 2);

        /*$select = $this->db->select()
                ->from(array('ar' => 'aranzman'))
                ->where('ar.idKategorija = ?', '2')
                ->join(array('kat' => 'kategorija'), 'ar.idKategorija = kat.idKategorija')
                ->join(array('sm' => 'smestaj'), 'ar.idSmestaj = sm.idSmestaj')
                ->join(array('vrsm' => 'vrstasmestaja'), 'ar.idVrstaSmestaja = vrsm.idVrstaSmestaja')
                ->join(array('t' => 'termin'), 'ar.idTermin = t.idTermin')
                ->join(array('p' => 'prevoz'), 'ar.idPrevoz = p.idPrevoz')
                ->join(array('c' => 'cenovnik'), 'ar.idCenovnik = c.idCenovnik');

        return $this->db->fetchAll($select);*/
    }

    public function getArazman($id) {
        $statment = $this->db->select()->from('smestaj')->where('idSmestaj=' . $id);
        $result = $this->db->fetchRow($statment);

        return $result;
    }
    
     public function getArazmani($id) {
        $statment = $this->db->select()->from('smestaj')->where('idKategorija=' . $id);
        $result = $this->db->fetchAll($statment);

        return $result;
    }
    //kraj zima
    
    
    
    
    
    function get_izleti() {
        $sql = 'SELECT * FROM smestaj WHERE idKategorija = ?';
        return $this->db->fetchAll($sql,3);
    }
    
    function get_novagodina() {
        $sql = 'SELECT * FROM smestaj WHERE idKategorija = ?';
        return $this->db->fetchAll($sql, 4);
    }
  
    
    
    
    
    

    public function insertAranzman($post) {
        $data = array(
            
            "idKategorija" => $post['select_kategoriju'],
            "idSmestaj" => $post['select_smestaj'],
            "idVrstaSmestaja" => $post['select_smestajVrsta'],
            "idTermin" => $post['select_termin'],
            "idPrevoz" => $post['select_prevoz'],
            "idCenovnik" => $post['select_cenovnik'],
        );
        return $this->db->insert('aranzman', $data);
    }

    public function updateAranzman($post) {
        $data = array(
            
            "idKategorija" => $post['select_kategoriju'],
            "idSmestaj" => $post['select_smestaj'],
            "idVrstaSmestaja" => $post['select_smestajVrsta'],
            "idTermin" => $post['select_termin'],
            "idPrevoz" => $post['select_prevoz'],
            "idCenovnik" => $post['select_cenovnik'],
        );
        return $this->db->update('aranzman', $data, "idAranzman=" . $post['idAranzman']);
    }

    function obrisi_aranzman($id) {
        return $this->db->delete("aranzman", "idAranzman=" . $id);
    }

}
