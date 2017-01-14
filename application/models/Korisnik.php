<?php

class Application_Model_Korisnik {

    protected $_idKorisnik;
    protected $_imePrezime;
    protected $_korisnickoIme;
    protected $_telefon;
    protected $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function get_korisnici() {
        $sql = $this->db->select()->from('korisnici');
        return $this->db->fetchAll($sql);
    }

    function obrisi_korisnika($id) {
        return $this->db->delete("korisnici", "idKorisnik=" . $id);
    }

    public function updateKorisnik($post) {
        $data = array(
            "imePrezime" => $post['ime'],
            "korisnickoIme" => $post['kime'],
            "telefon" => $post['tel'],
        );
        return $this->db->update('korisnici', $data, "idKorisnik=" . $post['idKorisnik']);
    }

}
