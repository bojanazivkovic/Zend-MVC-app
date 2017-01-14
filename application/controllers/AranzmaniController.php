<?php

class AranzmaniController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {
        $this->view->Naslov = "Aranzmani";
        $this->view->headTitle('Aranzmani', 'PREPEND');
        $aranzmani = new Application_Model_Aranzmani;
        $idKategorija = $this->getRequest()->getParam('idKategorija');
        if (isset($idKategorija)) {
            $this->view->naslov = $aranzmani->get_kategorija($idKategorija);
            $this->view->kategorija = $aranzmani->getArazmani($idKategorija);
        } else {

            $this->view->kategorije = $aranzmani->get_kategorije();
        }
    }

    public function letoAction() {
        $this->view->Naslov = "Leto 2017";
        $this->view->headTitle('Leto 2017', 'PREPEND');

        $letoM = new Application_Model_Aranzmani();
        $leto = $letoM->get_leto();

        $paginator = Zend_Paginator::factory($leto);
        $paginator->setDefaultItemCountPerPage(5);
        $allItems = $paginator->getTotalItemCount();
        $countPages = $paginator->count();
        $p = $this->getRequest()->getParam('strana');
        if (isset($p)) {
            $paginator->setCurrentPageNumber($p);
        } else {
            $paginator->setCurrentPageNumber(1);
        }
        $currentPage = $paginator->getCurrentPageNumber();
        $this->view->leto = $paginator;
        $this->view->countItems = $allItems;
        $this->view->countPages = $countPages;
        $this->view->currentPage = $currentPage;
        if ($currentPage == $countPages) {
            $this->view->nextPage = $countPages;
            $this->view->previousPage = $currentPage - 1;
        } else if ($currentPage == 1) {
            $this->view->nextPage = $currentPage + 1;
            $this->view->previousPage = 1;
        } else {
            $this->view->nextPage = $currentPage + 1;
            $this->view->previousPage = $currentPage - 1;
        }
    }

    public function prikazLetoAction() {
        $id = $this->getRequest()->getParam('idSmestaj');
        if (!isset($id)) {
            $this->_redirect('/leto');
        }


        $letoM = new Application_Model_Aranzmani();
        $leto = $letoM->getLeto($id);

        $slikemodel = new Application_Model_Slike();
        $slike = $slikemodel->getslike($id);

        $this->view->Naslov = $leto['smestaj'];
        $this->view->leto = $leto;
        $this->view->slike = $slike;
    }

    public function zimaAction() {
        $this->view->Naslov = "Zimovanje";
        $this->view->headTitle('Zimovanje', 'PREPEND');

        $zimaM = new Application_Model_Aranzmani();
        $zima = $zimaM->get_zima();

        $paginator = Zend_Paginator::factory($zima);
        $paginator->setDefaultItemCountPerPage(5);
        $allItems = $paginator->getTotalItemCount();
        $countPages = $paginator->count();
        $p = $this->getRequest()->getParam('strana');
        if (isset($p)) {
            $paginator->setCurrentPageNumber($p);
        } else {
            $paginator->setCurrentPageNumber(1);
        }
        $currentPage = $paginator->getCurrentPageNumber();
        $this->view->zima = $paginator;
        $this->view->countItems = $allItems;
        $this->view->countPages = $countPages;
        $this->view->currentPage = $currentPage;
        if ($currentPage == $countPages) {
            $this->view->nextPage = $countPages;
            $this->view->previousPage = $currentPage - 1;
        } else if ($currentPage == 1) {
            $this->view->nextPage = $currentPage + 1;
            $this->view->previousPage = 1;
        } else {
            $this->view->nextPage = $currentPage + 1;
            $this->view->previousPage = $currentPage - 1;
        }
    }

    public function novagodinaAction() {
        $this->view->Naslov = "Nova godina";
        $this->view->headTitle('Nova godina', 'PREPEND');

        $novagodinaM = new Application_Model_Aranzmani();
        $novagodina = $novagodinaM->get_novagodina();

        $paginator = Zend_Paginator::factory($novagodina);
        $paginator->setDefaultItemCountPerPage(5);
        $allItems = $paginator->getTotalItemCount();
        $countPages = $paginator->count();
        $p = $this->getRequest()->getParam('strana');
        if (isset($p)) {
            $paginator->setCurrentPageNumber($p);
        } else {
            $paginator->setCurrentPageNumber(1);
        }
        $currentPage = $paginator->getCurrentPageNumber();
        $this->view->novagodina = $paginator;
        $this->view->countItems = $allItems;
        $this->view->countPages = $countPages;
        $this->view->currentPage = $currentPage;
        if ($currentPage == $countPages) {
            $this->view->nextPage = $countPages;
            $this->view->previousPage = $currentPage - 1;
        } else if ($currentPage == 1) {
            $this->view->nextPage = $currentPage + 1;
            $this->view->previousPage = 1;
        } else {
            $this->view->nextPage = $currentPage + 1;
            $this->view->previousPage = $currentPage - 1;
        }
    }

    public function prikazNovagodinaAction() {
        $id = $this->getRequest()->getParam('idSmestaj');
        if (!isset($id)) {
            $this->_redirect('/novagodina');
        }
        $novagodinaM = new Application_Model_Aranzmani();
        $novagodina = $novagodinaM->getNovagodina($id);

        $slikemodel = new Application_Model_Slike();
        $slike = $slikemodel->getslike($id);

        $this->view->Naslov = $novagodina['smestaj'];
        $this->view->novagodina = $novagodina;
        $this->view->slike = $slike;
    }

    public function prikazIzletiAction() {
        $id = $this->getRequest()->getParam('idSmestaj');
        if (!isset($id)) {
            $this->_redirect('/izleti');
        }
        $izletiM = new Application_Model_Aranzmani();
        $izleti = $izletiM->getIzleti($id);

        $slikemodel = new Application_Model_Slike();
        $slike = $slikemodel->getslike($id);

        $this->view->Naslov = $izleti['smestaj'];
        $this->view->izleti = $izleti;
        $this->view->slike = $slike;
    }

    public function prikazZimaAction() {
        $id = $this->getRequest()->getParam('idSmestaj');
        if (!isset($id)) {
            $this->_redirect('/zima');
        }
        $zimaM = new Application_Model_Aranzmani();
        $zima = $zimaM->getZima($id);

        $slikemodel = new Application_Model_Slike();
        $slike = $slikemodel->getslike($id);

        $this->view->Naslov = $zima['smestaj'];
        $this->view->zima = $zima;
        $this->view->slike = $slike;
    }

    public function izletiAction() {
        $this->view->Naslov = "Izleti";
        $this->view->headTitle('Izleti', 'PREPEND');

        $izletiM = new Application_Model_Aranzmani();
        $izleti = $izletiM->get_izleti();

        $paginator = Zend_Paginator::factory($izleti);
        $paginator->setDefaultItemCountPerPage(5);
        $allItems = $paginator->getTotalItemCount();
        $countPages = $paginator->count();
        $p = $this->getRequest()->getParam('strana');
        if (isset($p)) {
            $paginator->setCurrentPageNumber($p);
        } else {
            $paginator->setCurrentPageNumber(1);
        }
        $currentPage = $paginator->getCurrentPageNumber();
        $this->view->izleti = $paginator;
        $this->view->countItems = $allItems;
        $this->view->countPages = $countPages;
        $this->view->currentPage = $currentPage;
        if ($currentPage == $countPages) {
            $this->view->nextPage = $countPages;
            $this->view->previousPage = $currentPage - 1;
        } else if ($currentPage == 1) {
            $this->view->nextPage = $currentPage + 1;
            $this->view->previousPage = 1;
        } else {
            $this->view->nextPage = $currentPage + 1;
            $this->view->previousPage = $currentPage - 1;
        }
    }

    public function prikazAction() {
        $id = $this->getRequest()->getParam('idSmestaj');
        if (!isset($id)) {
            $this->_redirect('/zima');
        }
        $zimaM = new Application_Model_Aranzmani();
        $zima = $zimaM->getArazman($id);

        $slikemodel = new Application_Model_Slike();
        $slike = $slikemodel->getslike($id);

        $this->view->Naslov = $zima['smestaj'];
        $this->view->text = $zima;
        $this->view->slike = $slike;
    }

}
