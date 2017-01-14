<?php

class ProdajaController extends Zend_Controller_Action {

    public function init() {
        $layout = $this->_helper->layout();
        $layout->setLayout('admin');
    }

    public function indexAction() {
        $this->view->Naslov = "Prodaja";
        $this->view->headTitle('Prodaja', 'PREPEND');

        $prodaja = new Application_Model_Prodaja();
        $this->view->prodaja = $prodaja->get_prodaja();

        $dostupnost = new Application_Model_Prodaja();
        $this->view->dostupnost = $dostupnost->get_dostupnost();

        $rezervacije = new Application_Model_Rezervacije();
        $this->view->rezervacije = $rezervacije->get_rezervacije();

        $request = $this->getRequest();
        $form = new Application_Form_Termini();

        $this->view->form = $form;


        if ($this->_request->isPost("submit")) {
            if ($this->view->form->isValid($this->_request->getPost())) {


                $post = $this->getRequest()->getParams();
                $auth = new Application_Model_Termini();
                $res = $auth->rezervisiTermin($post);
                //$this->view->status = "Uspešno ste rezervisali termin";
                //$form->reset();
                $this->_redirect("/prodaja");
            }
        }
    }

}
