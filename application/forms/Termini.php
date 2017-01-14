<?php

class Application_Form_Termini extends Zend_Form {

    public function init() {

        $ulogovan = Zend_Auth::getInstance();
        $idKorisnik = $ulogovan->getIdentity()->idKorisnik;
        $userIme = $ulogovan->getIdentity()->imePrezime;
        $imeee = $idKorisnik . "." . $userIme;

        $date = new Zend_Date();
        $danasnjiDatum = $date->get('dd.MM.yyyy');


        $this->setAction('')->setMethod('post');
        $this->setAttrib('name', 'terminiforma');
        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'table')),
            'Form'
        ));


        $datum = new Zend_Form_Element_Text('datumRezervacije');
        $datum->setLabel('Datum rezervacije: ');
        $datum->setAttrib('id', 'datumRezervacije');
        $datum->setAttribs(array('style' => 'margin:10px;', 'margin' => '10'));
        $datum->setAttrib('class', 'forma');
        $datum->setAttrib('readonly', 'true');
        $datum->setValue($danasnjiDatum);
        $this->addElement($datum);
        $datum->setDecorators(array(
    'ViewHelper',
     array('Errors'),
    array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
    array('Label', array('tag' => 'td')),
    //array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
));




        $ime = new Zend_Form_Element_Text('idKorisnik');
        $ime->setLabel('Ime i prezime: ');
        $ime->setAttrib('id', 'idKorisnik');
        $ime->setAttribs(array('style' => 'margin:10px;', 'margin' => '10'));
        $ime->setAttrib('class', 'forma');
        $ime->setAttrib('readonly', 'true');
        $ime->setValue($imeee);
        //$ime->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        //$ime->addValidator(new Zend_Validate_Alpha());
        $this->addElement($ime);
        $ime->setDecorators(array(
    'ViewHelper',
     array('Errors'),
    array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
    array('Label', array('tag' => 'td')),
    //array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
));


        $required = new Zend_Validate_NotEmpty ();
        $required->setType($required->getType() | Zend_Validate_NotEmpty::INTEGER | Zend_Validate_NotEmpty::ZERO);
        
               
        $smestajiModel = new Application_Model_Aranzmani();
        $smestaj = $smestajiModel->get_aranzmani();
        $smestaji = new Zend_Form_Element_Select('select_smestaj');
        $smestaji->setAttrib('id', 'select_smestaj');
        $smestaji->setAttribs(array('style' => 'margin:10px;', 'margin' => '10'));
         $smestaji->addValidators (array ($required));
        //$smestaji->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        $smestaji->addMultiOption(0, 'Izaberi aranzman *');
        foreach ($smestaj as $loc) {
            $smestaji->addMultiOption($loc['idAranzman'], $loc['smestaj'] . " - " . $loc['vrstaSmestaja'] . " (" . $loc['od'] . " - " . $loc['do'] . ")");
        }
        $this->addElement($smestaji);
        $ak = $this->getElement('select_smestaj');
        $ak->setDecorators(array(
    'ViewHelper',
     array('Errors'),
    array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
    array('Label', array('tag' => 'td')),
    //array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
));


        $napomena = new Zend_Form_Element_Textarea('napomena');
        $napomena->setAttrib('id', 'napomena');
        $napomena->setAttribs(array('style' => 'margin:10px;', 'margin' => '10'));
        $napomena->setAttrib('cols', '20');
        $napomena->setAttrib('rows', '2');
        $napomena->setLabel('Napomena: ');
        $napomena->setAttrib('class', 'forma');
        $this->addElement($napomena);
        $napomena->setDecorators(array(
    'ViewHelper',
     array('Errors'),
    array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
    array('Label', array('tag' => 'td')),
    
    array(array('row' => 'HtmlTag'), array('tag' => 'tr')),//napomena u drugom redu
));



        $submit = new Zend_Form_Element_Submit('posalji');
        $submit->setLabel('Rezervisi');
        //$submit->setAttrib('class', 'dugme');
        $submit->setAttribs(array('style' => 'margin:10px;', 'margin' => '10'));
        $submit->setAttrib('id', 'submit');
        $this->addElement($submit);
        $submit->setDecorators(array(
    'ViewHelper',
     array('Errors'),
    array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
    array('Label', array('tag' => 'td')),
    array(array('row' => 'HtmlTag'), array('tag' => 'tr')),//submit u drugom redu
));
    }

}
