<?php

class Application_Model_Cenovnik {

    protected $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function get_cene() {
        $statement = $this->db->select()
                ->from(array('ar' => 'aranzman'))
                ->join(array('kat' => 'kategorija'), 'ar.idKategorija = kat.idKategorija')
                ->join(array('sm' => 'smestaj'), 'ar.idSmestaj = sm.idSmestaj')
                ->join(array('vrsm' => 'vrstasmestaja'), 'ar.idVrstaSmestaja = vrsm.idVrstaSmestaja')
                ->join(array('t' => 'termin'), 'ar.idTermin = t.idTermin')
                ->join(array('pr' => 'prevoz'), 'ar.idPrevoz = pr.idPrevoz')
                ->join(array('c' => 'cenovnik'), 'ar.idCenovnik = c.idCenovnik')
                ->join(array('m' => 'mesto'), 'sm.idMesto = m.idMesto');
        
        
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
