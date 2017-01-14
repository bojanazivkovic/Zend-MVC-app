<?php

class Application_Model_Prodaja {

    protected $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function get_prodaja() {
        $select = $this->db->select()
                ->from(array('ar' => 'aranzman'))
                ->join(array('kat' => 'kategorija'), 'ar.idKategorija = kat.idKategorija')
                ->join(array('sm' => 'smestaj'), 'ar.idSmestaj = sm.idSmestaj')
                ->join(array('vrsm' => 'vrstasmestaja'), 'ar.idVrstaSmestaja = vrsm.idVrstaSmestaja')
                ->join(array('t' => 'termin'), 'ar.idTermin = t.idTermin')
                ->join(array('pr' => 'prevoz'), 'ar.idPrevoz = pr.idPrevoz')
                ->join(array('c' => 'cenovnik'), 'ar.idCenovnik = c.idCenovnik')
                ->order('ar.idKategorija');
        return $this->db->fetchAll($select);
    }
    function get_dostupnost() {
        $select = $this->db->select()               
                ->from(array('rez' => 'rezervacije'))
                ->where('rez.idAranzman = ar.idAranzman')
                ->join(array('ar' => 'aranzman'))
                ->order('idRezervacije');
        return $this->db->fetchAll($select);   
    }
}
