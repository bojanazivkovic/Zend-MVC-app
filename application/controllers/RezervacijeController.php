<?php

class RezervacijeController extends Zend_Controller_Action {

public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $this->view->Naslov = "Rezervacija aranzmana";
        
        $rezervacije = new Application_Model_Rezervacije();
        $this->view->rezervacije = $rezervacije->get_rezervacije();
        
        $request = $this->getRequest();
        $form = new Application_Form_Rezervacije();
        $this->view->form = $form;

        if ($this->_request->isPost("submit")) {
            if ($this->view->form->isValid($this->_request->getPost())) {

                $post = $this->getRequest()->getParams();
                $auth = new Application_Model_Termini();
                $res = $auth->rezervisiTermin($post);
                if ($res == 1) {
                    $this->view->status = "Uspešno ste rezervisali termin";
                    $form->reset();
                } else {
                    $this->view->status = "Molimo popunite sva polja";
                }
            }
        }
    }

}
