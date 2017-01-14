<?php

class CenovnikController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {
        $this->view->Naslov = "Cenovnik";
        $this->view->headTitle('Cenovnik', 'PREPEND');

        $cenovnik = new Application_Model_Cenovnik;
        $this->view->cenovnik = $cenovnik->get_cene();
    }

}
