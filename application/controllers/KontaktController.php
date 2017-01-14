<?php

class KontaktController extends Zend_Controller_Action
{

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $request = $this->getRequest();
        $form = new Application_Form_Kontakt();

        if ($request->isPost() && $form->isValid($request->getPost())) {
            
        }

        $this->view->form = $form;
    }

}
