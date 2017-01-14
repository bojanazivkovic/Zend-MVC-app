<?php

class Application_Model_Rezervacije {

    protected $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function get_rezervacije() {
        //$statement = $this->db->select()->from('rezervacije');
        //return $this->db->fetchAll($statement);

        $select = $this->db->select()
                ->from(array('rez' => 'rezervacije'))
                ->join(array('ar' => 'aranzman'), 'rez.idAranzman = ar.idAranzman')
                ->join(array('sm' => 'smestaj'), 'ar.idSmestaj = sm.idSmestaj')
                ->join(array('m' => 'mesto'), 'sm.idMesto = m.idMesto')
                ->join(array('d' => 'drzava'), 'd.idDrzava = m.idDrzava')
                ->join(array('vrsm' => 'vrstasmestaja'), 'ar.idVrstaSmestaja = vrsm.idVrstaSmestaja')
                ->join(array('t' => 'termin'), 'ar.idTermin = t.idTermin')
                ->join(array('pr' => 'prevoz'), 'ar.idPrevoz = pr.idPrevoz')
                ->join(array('kor' => 'korisnici'), 'rez.idKorisnik = kor.idKorisnik')
                ->order('datumRezervacije');

        return $this->db->fetchAll($select);
    }

}
