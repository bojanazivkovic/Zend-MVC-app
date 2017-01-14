<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->Naslov = "Home";
        $this->view->headTitle('Pocetna', 'PREPEND');

        $popularno = new Application_Model_Popularno();
        $this->view->popularno = $popularno->get_popularno();
        
        $popularneVile = new Application_Model_Popularno();
         $this->view->popularnevile = $popularneVile->get_popularneVile();
    }


}

