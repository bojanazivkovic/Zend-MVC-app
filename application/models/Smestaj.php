<?php

class Application_Model_Smestaj {

    protected $_idSmestaj;
    protected $_smestaj;
    protected $_opis;
    protected $_slika;
    protected $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getSmestaji() {
        $statment = $this->db->select()
                ->from(array('sm' => 'smestaj'))
                ->join(array('m' => 'mesto'), 'sm.idMesto=m.idMesto')
                ->join(array('kat' => 'kategorija'), 'kat.idKategorija=sm.idKategorija')
                ->order('sm.idMesto');
        return $this->db->fetchAll($statment);
    }

    function get_mesto() {
        $statement = $this->db->select()->from('mesto');
        return $this->db->fetchAll($statement);
    }

    function get_kategorije() {

        $statement = $this->db->select()
                ->from('kategorija');

        return $this->db->fetchAll($statement);
    }

    public function getSmestaj($id) {
        $statment = $this->db->select()->from('smestaj')->where('idSmestaj=' . $id);
        $result = $this->db->fetchRow($statment);

        return $result;
    }

    public function updateSmestaj($post,$img) {
        if ($img == '') {
            $data = array(
                "smestaj" => $post['smestaj'],
                "opis" => $post['opis'],
                "idMesto" => $post['select_mesto'],
                "idKategorija" => $post['select_kategoriju'],
                
            );
            return $this->db->update('smestaj', $data, "idSmestaj=" . $post['idSmestaj']);
        } else {
            $data = array(
                "smestaj" => $post['smestaj'],
                "opis" => $post['opis'],
                "idMesto" => $post['select_mesto'],
                "idKategorija" => $post['select_kategoriju'],
                "thumbPutanja" => '/img/thumb/'.$img
            );
            return $this->db->update('smestaj', $data, "idSmestaj=" . $post['idSmestaj']);

            
        }
    }

    public function insertSmestaj($post, $img) {

        $data = array(
            "smestaj" => $post['smestaj'],
            "opis" => $post['opis'],
            "idMesto" => $post['select_mesto'],
            "idKategorija" => $post['select_kategoriju'],
            "thumbPutanja" => "/img/thumb/" . $img,
        );
        return $this->db->insert('smestaj', $data);
    }

    function obrisi_smestaj($id) {
        return $this->db->delete("smestaj", "idSmestaj=" . $id);
    }

}
