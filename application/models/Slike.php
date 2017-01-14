<?php

class Application_Model_Slike
{
protected $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function unesi_sliku($img, $id) {
        if ($id['select_smestaj'] == "0") {
            return "Morate izabrati smestaj";
        } else {
            $data = array(
                "idSmestaj" => $id['select_smestaj'],
                "putanja" => "/img/" . $img,
            );

           $f=$this->db->insert('slike', $data);
           if($f!='0')
           {
           return "Uspešno ste dodali sliku";
           }
        }
    }

    public function getslike($id) {
        $upit = $this->db->select()->from('slike')->where('idSmestaj=' . $id);
        return $result = $this->db->fetchAll($upit);
    }

    public function getSveslike() {
        $upit = $this->db->select()->from(array('sl' =>'slike'))->join(array('sm' => 'smestaj'), 'sm.idSmestaj = sl.idSmestaj');
        return $result = $this->db->fetchAll($upit);
    }

    function obrisi_sliku($id) {


        $del = $this->get_info_slike($id);

        unlink("/img/" . $del['slika']);

        return $this->db->delete("slike", "idSlike=" . $id);
    }

    function get_info_slike($id) {
        $statement = $this->db->select()->from('slike')->where('idSlike=' . $id);

        return $this->db->fetchRow($statement);
    }

}
