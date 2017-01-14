<?php

class Application_Form_Aranzmani extends Zend_Form
{

    public function init()
    {
        $this->setAction('')->setMethod('post');
        $this->setAttrib('id', 'forma');
        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'table')),
            'Form'
        ));

        
        $required = new Zend_Validate_NotEmpty ();
        $required->setType($required->getType() | Zend_Validate_NotEmpty::INTEGER | Zend_Validate_NotEmpty::ZERO);
        
               
        $kategorijeModel = new Application_Model_Aranzmani();
        $kategorija = $kategorijeModel->get_kategorije();
        $kategorije = new Zend_Form_Element_Select('select_kategoriju');
        $kategorije->setAttrib('id', 'select_kategoriju');
        $kategorije->setAttribs(array('style' => 'margin:10px;', 'margin' => '10'));
         $kategorije->addValidators (array ($required));
        $kategorije->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        $kategorije->addMultiOption(0, 'Izaberi kategoriju *');
        foreach ($kategorija as $loc) {
            $kategorije->addMultiOption($loc['idKategorija'], $loc['naziv']);
        }
        $this->addElement($kategorije);
        $ak = $this->getElement('select_kategoriju');
        $ak->setDecorators(array(
            'ViewHelper',
            array('Errors'),
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array('Label', array('tag' => 'td')),
            //array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
        ));


        $smestajiModel = new Application_Model_Aranzmani();
        $smestaj = $smestajiModel->get_smestaji();
        $smestaji = new Zend_Form_Element_Select('select_smestaj');
        $smestaji->setAttrib('id', 'select_smestaj');
        $smestaji->setAttribs(array('style' => 'margin:10px;', 'margin' => '10'));
         $smestaji->addValidators (array ($required));
        $smestaji->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        $smestaji->addMultiOption(0, 'Izaberi smestaj *');
        foreach ($smestaj as $loc) {
            $smestaji->addMultiOption($loc['idSmestaj'], $loc['smestaj']);
        }
        $this->addElement($smestaji);
        $ak = $this->getElement('select_smestaj');
        $ak->setDecorators(array(
            'ViewHelper',
            array('Errors'),
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array('Label', array('tag' => 'td')),
           // array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
        ));
        
        $smestajiVrstaModel = new Application_Model_Aranzmani();
        $smestajVr = $smestajiVrstaModel->get_vrstaSmestaja();
        $smestajiVrsta = new Zend_Form_Element_Select('select_smestajVrsta');
        $smestajiVrsta->setAttrib('id', 'select_smestajVrsta');
        $smestajiVrsta->setAttribs(array('style' => 'margin:10px;', 'margin' => '10'));
         $smestajiVrsta->addValidators (array ($required));
        //$smestajiVrsta->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        $smestajiVrsta->addMultiOption(0, 'Izaberi vrstu smestaja *');
        foreach ($smestajVr as $loc) {
            $smestajiVrsta->addMultiOption($loc['idVrstaSmestaja'], $loc['vrstaSmestaja']);
        }
        $this->addElement($smestajiVrsta);
        $ak = $this->getElement('select_smestajVrsta');
        $ak->setDecorators(array(
            'ViewHelper',
            array('Errors'),
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array('Label', array('tag' => 'td')),
            //array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
        ));
        
        
        $terminiModel = new Application_Model_Aranzmani();
        $termin = $terminiModel->get_termini();
        $termini = new Zend_Form_Element_Select('select_termin');
        $termini->setAttrib('id', 'select_termin');
        $termini->setAttribs(array('style' => 'margin:10px;', 'margin' => '10'));
         $termini->addValidators (array ($required));
        $termini->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        $termini->addMultiOption(0, 'Izaberi termin *');
        foreach ($termin as $loc) {
            $termini->addMultiOption($loc['idTermin'], $loc['od']." - ". $loc['do']);
        }
        $this->addElement($termini);
        $ak = $this->getElement('select_termin');
        $ak->setDecorators(array(
            'ViewHelper',
            array('Errors'),
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array('Label', array('tag' => 'td')),
           // array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
        ));
        
        $prevozModel = new Application_Model_Aranzmani();
        $prevoz = $prevozModel->get_prevoz();
        $prevozi = new Zend_Form_Element_Select('select_prevoz');
        $prevozi->setAttrib('id', 'select_prevoz');
        $prevozi->setAttribs(array('style' => 'margin:10px;', 'margin' => '10'));
         $prevozi->addValidators (array ($required));
        $prevozi->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        $prevozi->addMultiOption(0, 'Izaberi prevoz *');
        foreach ($prevoz as $loc) {
            $prevozi->addMultiOption($loc['idPrevoz'], $loc['prevoz']);
        }
        $this->addElement($prevozi);
        $ak = $this->getElement('select_prevoz');
        $ak->setDecorators(array(
            'ViewHelper',
            array('Errors'),
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array('Label', array('tag' => 'td')),
            //array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
        ));
        
        
        $cenovnikModel = new Application_Model_Aranzmani();
        $cenovnik = $cenovnikModel->get_cenovnik();
        $cenovnici = new Zend_Form_Element_Select('select_cenovnik');
        $cenovnici->setAttrib('id', 'select_cenovnik');
        $cenovnici->setAttribs(array('style' => 'margin:10px;', 'margin' => '10'));
         $cenovnici->addValidators (array ($required));
        $cenovnici->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        $cenovnici->addMultiOption(0, 'Izaberi cenovnik *');
        foreach ($cenovnik as $loc) {
            $cenovnici->addMultiOption($loc['idCenovnik'], $loc['cena'].' RSD');
        }
        $this->addElement($cenovnici);
        $ak = $this->getElement('select_cenovnik');
        $ak->setDecorators(array(
            'ViewHelper',
            array('Errors'),
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array('Label', array('tag' => 'td')),
            //array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
        ));
        



        $submit = new Zend_Form_Element_Submit('posalji');
        $submit->setLabel('Snimi aranzman');
        //$submit->setAttrib('class', 'dugme');
        $submit->setAttrib('id', 'submit');
        $submit->setAttribs(array('style' => 'margin:10px;', 'margin' => '10'));
        $this->addElement($submit);
        $submit->setDecorators(array(
            'ViewHelper',
            array('Errors'),
            array(array('' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr')),//dugme submit u drugom redu
        ));
    }

}
