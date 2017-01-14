<?php

class Application_Model_Termini {

    private $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
    }

    public function rezervisiTermin($post) {

        if ($post['select_smestaj'] == "0") {
            return "Morate izabrati aranzman";
        } else {
            $data = array(
                "idKorisnik" => $post['idKorisnik'],
                "idAranzman" => $post['select_smestaj'],
                "datumRezervacije" => $post['datumRezervacije'],
                "napomena" => $post['napomena'],
            );

            $f = $this->db->insert('rezervacije', $data);
            
        }
        //return $this->db->insert('rezervacije', $data);
    }

    public function gettermin() {
        $upit = $this->db->select()               
                ->from(array('rez' => 'rezervacije'))
                ->join(array('kor' => 'korisnici'), 'rez.idKorisnik = kor.idKorisnik')
                ->join(array('ar' => 'aranzman'), 'ar.idAranzman = rez.idAranzman')
                ->join(array('t' => 'termin'), 't.idTermin = ar.idTermin')
                ->join(array('sm' => 'smestaj'), 'sm.idSmestaj = ar.idSmestaj')
                ->order('od');
        return $this->db->fetchAll($upit);
    }

    public function gettermini() {
        $upit = $this->db->select()->from('termin');
        return $this->db->fetchAll($upit);
    }

    function obrisi_termin($id) {
        return $this->db->delete("rezervacije", "idRezervacije=" . $id);
    }

}
