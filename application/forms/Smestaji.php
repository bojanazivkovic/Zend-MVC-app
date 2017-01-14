<?php

class Application_Form_Smestaji extends Zend_Form {

    public function init() {
        $this->setAction('')->setMethod('post');
        $this->setAttrib('id', 'forma');
        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'table')),
            'Form'
        ));
        $this->addElement('file', 'slika', array(
            'label' => 'Mala (thumb) slika: ',
            //'required' => true,
            'validators' => array(
                array('extension', true, array(
                        'extention' => 'jpg,png,gif',
                        'messages' => array(
                            Zend_Validate_File_Extension::NOT_FOUND =>
                            'Pogrešan format slike.',
                            Zend_Validate_File_Extension::FALSE_EXTENSION =>
                            'Pogrešan format slike.'))))
        ));


        $required = new Zend_Validate_NotEmpty ();
        $required->setType($required->getType() | Zend_Validate_NotEmpty::INTEGER | Zend_Validate_NotEmpty::ZERO);



        $smestaj = new Zend_Form_Element_Text('smestaj');
        $smestaj->setLabel('Naziv smestaja: ');
        $smestaj->addValidators(array($required));
        $smestaj->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        $this->addElement($smestaj);
        $smestaj->setDecorators(array(
            'ViewHelper',
            array('Errors'),
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element','style'=>'padding:10px')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
        ));


        $opis = new Zend_Form_Element_Textarea('opis');
        $opis->setLabel('Opis smestaja: ')
                ->setAttrib('rows', 9)
                ->setAttrib('cols', 50);
        $opis->addValidators(array($required));
        $opis->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        $this->addElement($opis);
        $opis->setDecorators(array(
            'ViewHelper',
            array('Errors'),
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element','style'=>'padding:10px')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
        ));



        $mestoModel = new Application_Model_Smestaj();
        $mesto = $mestoModel->get_mesto();
        $mesta = new Zend_Form_Element_Select('select_mesto');
        $mesta->setAttrib('id', 'select_mesto');
        $mesta->addValidators(array($required));
        $mesta->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        $mesta->addMultiOption(0, 'Izaberi mesto *');
        foreach ($mesto as $loc) {
            $mesta->addMultiOption($loc['idMesto'], $loc['mesto']);
        }
        $this->addElement($mesta);
        $ak = $this->getElement('select_mesto');
        $ak->setDecorators(array(
            'ViewHelper',
            array('Errors'),
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element','style'=>'padding:10px')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
        ));



        $kategorijeModel = new Application_Model_Smestaj();
        $kategorija = $kategorijeModel->get_kategorije();
        $kategorije = new Zend_Form_Element_Select('select_kategoriju');
        $kategorije->setAttrib('id', 'select_kategoriju');
        $kategorije->addValidators(array($required));
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
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element','style'=>'padding:10px')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
        ));


        $slika = $this->getElement('slika');
        $slika->setDecorators(array(
            'File',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' =>'td','style'=>'padding:10px')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));



        $submit = new Zend_Form_Element_Submit('dugmeSubmit');
        $submit->setLabel('Snimi smestaj');
        //$submit->setAttrib('class', 'dugme');
        $submit->setAttrib('id', 'submit');
        $this->addElement($submit);
        $submit->setDecorators(array(
            'ViewHelper',
            array('Errors'),
            array(array('' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element','style'=>'padding:10px')),
            array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
        ));
    }

}
