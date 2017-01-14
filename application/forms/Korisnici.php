<?php

class Application_Form_Korisnici extends Zend_Form {

    public function init() {
        $this->setAction("");
        $this->setMethod("post");
        $this->setAttrib('id', 'forma');
        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'table')),
            'Form'
        ));


        $imePrezime = new Zend_Form_Element_Text('imePrezime');
        $imePrezime->setAttrib("class", "forma");
        $imePrezime->setAttrib(array('style' => 'margin:10px;', 'margin' => '10'));
        $imePrezime->setLabel('Unesite ime i prezime: ');
        $this->addElement($imePrezime);
        $imePrezime->addValidators(array(array('NotEmpty', true, array('messages' => array('isEmpty' => 'Ovo polje je obavezno.',)))));
        $imePrezime->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));


        $korisnickoIme = new Zend_Form_Element_Text('korisnickoIme');
        $korisnickoIme->setLabel('Unesite korisnicko ime: ');
        $korisnickoIme->setAttrib("class", "forma");
        $korisnickoIme->setAttrib(array('style' => 'margin:10px;', 'margin' => '10'));
        $this->addElement($korisnickoIme);
        $korisnickoIme->addValidators(array(array('NotEmpty', true, array('messages' => array('isEmpty' => 'Ovo polje je obavezno.',)))));
        $korisnickoIme->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        
    

        $telefon = new Zend_Form_Element_Text('telefon');
        $telefon->setLabel('Unesite broj telefona: ');
        $telefon->setAttrib("class", "forma");
        $telefon->setAttrib(array('style' => 'margin:10px;', 'margin' => '10'));
        $this->addElement($telefon);
        $telefon->addValidators(array(array('NotEmpty', true, array('messages' => array('isEmpty' => 'Ovo polje je obavezno.',)))));
        $telefon->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));


        $submit = new Zend_Form_Element_Submit('btnSubmit');
        $submit->setLabel('Unesi');
        $submit->setAttrib(array('style' => 'margin:10px;', 'margin' => '10'));
        $this->addElement($submit);
        $submit->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors', array(array('data' => 'HtmlTag'), array('tag' => 'td', 'colspan' => '2', 'align' => 'center')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
    }

}
