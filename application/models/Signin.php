<?php

class Application_Model_Signin
{
 protected $db;

    public function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Zend_Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function sigin_user($post) {
        $data = array(
            "imePrezime" => $post['imePrezimeR'],
            "korisnickoIme" => $post['korisnickoImeR'],
            "telefon" => $post['telefonR'],
            "email" => $post['emailR'],
            "lozinka" => md5($post['lozinkaR']),
            "idUloga" => "2",
        );
        return $this->db->insert('korisnici', $data);
    }

}
