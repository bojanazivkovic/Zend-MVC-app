<?php

class AdministracijaController extends Zend_Controller_Action {

    public function init() {
        $layout = $this->_helper->layout();
        $layout->setLayout('admin');
        /* Initialize action controller here */
        $logovan = Zend_Auth::getInstance();
        $korisnik = $logovan->getIdentity()->idUloga;

        if (!$logovan->hasIdentity() || $korisnik != 1) {
            Zend_Auth::getInstance()->clearIdentity();
            $this->_redirect('/login');
        }
    }

    public function indexAction() {
        $this->view->Naslov = "ADMINISTRACIJA";
    }

    public function smestajiAction() {
        $this->view->Naslov = "ADMINISTRACIJA SMESTAJA";
        $request = $this->getRequest();
        $smestaji = new Application_Model_Smestaj();
        $dohvati_smestaje = $smestaji->getSmestaji();
        $this->view->dohvati_smestaje = $dohvati_smestaje;
    }

    public function izmeniSmestajAction() {
        $this->view->Naslov = "IZMENA SMESTAJA";
        $request = $this->getRequest();
        $slike = new Application_Model_Smestaj();
        $form = new Application_Form_Smestaji();
        $id = $this->getRequest()->getParam('idSmestaj');
        $smestaj = $slike->getSmestaj($id);


        $options = array(
            'smestaj' => $smestaj['smestaj'],
            'opis' => $smestaj['opis'],
            'select_mesto' => $smestaj['idMesto'],
            'select_kategoriju' => $smestaj['idKategorija']
        );

        $form->populate($options); // data binding in the edit form
        $this->view->form = $form;

        if ($this->_request->isPost("dugmeSubmit")) {
            if ($this->view->form->isValid($this->_request->getPost())) {
                $post = $this->_request->getParams();

                $upload = new Zend_File_Transfer_Adapter_Http();
                try {

                    $tmp = $upload->getFileInfo();
                    $slika = $tmp['slika'];
                    $change = new Application_Model_Promenisliku();
                    $change->tmp_name = $slika['tmp_name'];
                    $change->name = $slika['name'];
                    $change->destination = "img/thumb";
                    $img = $change->upload();
                } catch (Zend_File_Transfer_Exception $e) {
                    $e->getMessage();
                }
                $slike->updateSmestaj($post, $img);
                $this->_redirect("/administracija/smestaji");
            }
        }

        //$this->_helper->viewRenderer->setNoRender(true);
        //$this->_helper->layout->disableLayout();
        //$post = $this->_request->getParams();
        //$smestaji = new Application_Model_Smestaj();
        //echo $smestaji->updateSmestaj($post);
    }

    public function slikeAction() {

        $slike = new Application_Model_Slike();
        $this->view->Naslov = "ADMINISTRACIJA SLIKA";
        $form = new Application_Form_Slike();
        $this->view->formaslike = $form;

        if ($this->_request->isPost("dugmeSubmit")) {
            if ($this->view->formaslike->isValid($this->_request->getPost())) {

                $post = $this->_request->getParams();
                $upload = new Zend_File_Transfer_Adapter_Http();
                try {

                    $tmp = $upload->getFileInfo();
                    $slika = $tmp['slika'];
                    $change = new Application_Model_Promenisliku();
                    $change->tmp_name = $slika['tmp_name'];
                    $change->name = $slika['name'];
                    $change->destination = "img";
                    $img = $change->upload();
                    if ($img != 0) {
                        $this->view->status = $slike->unesi_sliku($img, $post);
                    } else {
                        $this->views->status = "Neuspesno uneta slika";
                    }
                } catch (Zend_File_Transfer_Exception $e) {
                    $e->getMessage();
                }
            }
        }
        $form->reset();
        $dohvati_slike = $slike->getSveslike();
        $this->view->dohvati_slike = $dohvati_slike;
    }

    public function obrisiSmestajAction() {
        $get = $this->_request->getParams();
        $korisnik = new Application_Model_Smestaj();
        $korisnik->obrisi_smestaj($get['idSmestaj']);
        $this->_redirect("/administracija/smestaji");
    }

    public function obrisiSlikeAction() {
        $get = $this->_request->getParams();
        $slika = new Application_Model_Slike();
        $slika->obrisi_sliku($get['idSlike']);
        $this->_redirect("/administracija/slike");
    }

    public function rezervacijeAction() {
        $this->view->Naslov = "ADMINISTRACIJA REZERVACIJA";
        $dohvati_termine = new Application_Model_Termini();
        $dohvati_termin = $dohvati_termine->gettermin();
        $this->view->dohvati_termine = $dohvati_termin;
    }

    public function obrisiTerminAction() {
        $get = $this->_request->getParams();
        $t = new Application_Model_Termini();
        $t->obrisi_termin($get['idRezervacije']);
        $this->_redirect("/administracija/rezervacije");
    }

    public function korisniciAction() {
        $this->view->Naslov = "ADMINISTRACIJA KORISNIKA";
        $dohvati_korisnike = new Application_Model_Korisnik();
        $dohvati_korisnika = $dohvati_korisnike->get_korisnici();
        $this->view->dohvati_korisnike = $dohvati_korisnika;
    }

    public function obrisiKorisnikaAction() {
        $get = $this->_request->getParams();
        $korisnik = new Application_Model_Korisnik();
        $korisnik->obrisi_korisnika($get['idKorisnik']);
        $this->_redirect("/administracija/korisnici");
    }

    public function izmeniKorisnikaAction() {
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout->disableLayout();
        $post = $this->_request->getParams();
        $korisnik = new Application_Model_Korisnik();
        echo $korisnik->updateKorisnik($post);
    }

    public function cenovnikAction() {
        $this->view->Naslov = "ADMINISTRACIJA CENOVNIKA";
        $request = $this->getRequest();
        $cenovnik = new Application_Model_Cenovnik();
        $form = new Application_Form_Cenovnik();
        $this->view->form = $form;
        if ($this->_request->isPost("dugmeSubmit")) {
            if ($this->view->form->isValid($this->_request->getPost())) {
                $post = $this->_request->getParams();
                $cenovnik->insertCena($post);
            }
        }
        $form->reset();

        $dohvati_cenovnik = $cenovnik->get_cene();
        $this->view->dohvati_cenovnik = $dohvati_cenovnik;
    }

    public function aranzmaniAction() {
        $this->view->Naslov = "ADMINISTRACIJA ARANZMANA";
        $request = $this->getRequest();
        $dohvati_aranzmane = new Application_Model_Aranzmani();
        $form = new Application_Form_Aranzmani();
        $this->view->form = $form;

        if ($this->_request->isPost("submit")) {
            if ($this->view->form->isValid($this->_request->getPost())) {
                $post = $this->_request->getParams();
                $dohvati_aranzmane->insertAranzman($post);
            }
        }
        $form->reset();

        $dohvati_aranzman = $dohvati_aranzmane->get_aranzmani();
        $this->view->dohvati_aranzmane = $dohvati_aranzman;
    }

    public function obrisiAranzmanAction() {
        $get = $this->_request->getParams();
        $aranzmani = new Application_Model_Aranzmani();
        $aranzmani->obrisi_aranzman($get['idAranzman']);
        $this->_redirect("/administracija/aranzmani");
    }

    public function izmeniAranzmanAction() {
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout->disableLayout();
        $post = $this->_request->getParams();
        $aranzmani = new Application_Model_Aranzmani();
        echo $aranzmani->updateAranzman($post);
    }

    public function noviSmestajAction() {
        $this->view->Naslov = "UNOS NOVOG SMESTAJA";
        $request = $this->getRequest();
        $slike = new Application_Model_Smestaj();
        $form = new Application_Form_Smestaji();
        $this->view->form = $form;
        if ($this->_request->isPost("dugmeSubmit")) {
            if ($this->view->form->isValid($this->_request->getPost())) {
                $post = $this->_request->getParams();

                $upload = new Zend_File_Transfer_Adapter_Http();
                try {

                    $tmp = $upload->getFileInfo();
                    $slika = $tmp['slika'];
                    $change = new Application_Model_Promenisliku();
                    $change->tmp_name = $slika['tmp_name'];
                    $change->name = $slika['name'];
                    $change->destination = "img/thumb";
                    $img = $change->upload();
                } catch (Zend_File_Transfer_Exception $e) {
                    $e->getMessage();
                }
                $slike->insertSmestaj($post, $img);
                $this->_redirect("/administracija/smestaji");
            }
        }

        //$form->reset();
    }

    public function ostaloAction() {
        $this->view->Naslov = "OSTALO - kategorija, drzava, mesto, cena...";
        $request = $this->getRequest();
        $dohvati_kategorije = new Application_Model_Ostalo();
        $dohvati_drzave = new Application_Model_Ostalo();
        $dohvati_mesta = new Application_Model_Ostalo();
        $dohvati_cene = new Application_Model_Ostalo();

        $modelOstalo = new Application_Model_Ostalo();
        $modelCenovnik = new Application_Model_Ostalo();

        $form = new Application_Form_Kategorija();
        $this->view->kategorijaform = $form;

        if ($this->_request->getPost("dugmeSubmit")) {
            $post = $this->_request->getParams();
            $modelOstalo->insertKategorija($post);
        }
        $form->reset();
        $dohvati_kategoriju = $dohvati_kategorije->get_kategorije();
        $this->view->dohvati_kategorije = $dohvati_kategoriju;

        $formDrzava = new Application_Form_Drzava();
        $this->view->drzavaform = $formDrzava;

        if ($this->_request->getPost("dugmeSubmitd")) {
            $post = $this->_request->getParams();
            $modelOstalo->insertDrzava($post);
        }
        $formDrzava->reset();
        $dohvati_drzavu = $dohvati_drzave->get_drzave();
        $this->view->dohvati_drzave = $dohvati_drzavu;


        $formMesto = new Application_Form_Mesto();
        $this->view->mestoform = $formMesto;

        if ($this->_request->getPost("dugmeSubmitm")) {
            $post = $this->_request->getParams();
            $modelOstalo->insertMesto($post);
        }
        $formMesto->reset();
        $dohvati_mesto = $dohvati_mesta->get_mesta();
        $this->view->dohvati_mesta = $dohvati_mesto;


        $formCena = new Application_Form_Cenovnik();
        $this->view->cenaform = $formCena;

        if ($this->_request->getPost("dugmeSubmitc")) {
            $post = $this->_request->getParams();
            $modelCenovnik->insertCena($post);
        }
        $formCena->reset();
        $dohvati_cenu = $dohvati_cene->get_cene();
        $this->view->dohvati_cene = $dohvati_cenu;
    }

    public function obrisiKategorijuAction() {
        $get = $this->_request->getParams();
        $kategorije = new Application_Model_Ostalo();
        $kategorije->obrisi_kategoriju($get['idKategorija']);
        $this->_redirect("/administracija/ostalo");
    }

    public function obrisiDrzavuAction() {
        $get = $this->_request->getParams();
        $drzave = new Application_Model_Ostalo();
        $drzave->obrisi_drzavu($get['idDrzava']);
        $this->_redirect("/administracija/ostalo");
    }

    public function obrisiMestoAction() {
        $get = $this->_request->getParams();
        $mesta = new Application_Model_Ostalo();
        $mesta->obrisi_mesto($get['idMesto']);
        $this->_redirect("/administracija/ostalo");
    }

    public function obrisiCenuAction() {
        $get = $this->_request->getParams();
        $korisnik = new Application_Model_Ostalo();
        $korisnik->obrisi_cenu($get['idCenovnik']);
        $this->_redirect("/administracija/ostalo");
    }

    public function izmeniCenuAction() {
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout->disableLayout();
        $post = $this->_request->getParams();
        $cene = new Application_Model_Ostalo();
        echo $cene->updateCena($post);
    }

}
