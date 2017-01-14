<?php

class OnamaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->Naslov="O nama";
        $this->view->headTitle('O nama','PREPEND');
        
        $cenovnik=new Application_Model_Onama();
        $this->view->onama=$cenovnik->get_tekst();
    }


}

