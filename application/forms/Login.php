<?php

class Application_Form_Login extends Zend_Form
{

    public function init() {
        /* Form Elements & Other Definitions Here ... */
        $this->setAction("");
        $this->setMethod("post");
        $this->setAttrib('id', 'forma');
        
        $this->addElement('text', 'korisnickoIme', array(
            'label' => 'Korisničko ime:',
            'required' => true,
            'filters' => array('StringTrim'),
        ));

        $this->addElement('password', 'lozinka', array(
            'label' => 'Lozinka:',
            'required' => true,
        ));
        $this->addElement('submit', 'dugmeSubmit', array(
            'ignore' => true,
            'label' => 'Uloguj se',
        ));
        
        
        $username = $this->getElement('korisnickoIme');
        $username->setAttrib("class", "text_input");
        $username->addValidators(array(array('NotEmpty', true, array('messages' => array('isEmpty' => 'Polje je obavezno.',)))));
        $username->addValidator('Db_RecordExists', true, array('table' => 'korisnici', 'field' => 'korisnickoIme'));
        $username->getValidator('Db_RecordExists')->setMessage('Korisničko ime ne postoji u bazi.');
        $username->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        
        
        
        $password = $this->getElement('lozinka');
        $password->setAttrib("class", "text_input");
        $password->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                        'isEmpty' => 'Polje je obavezno.',
                    )))
        ));

        $password->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        
        $submit = $this->getElement('dugmeSubmit');

        $submit->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors', array(array('data' => 'HtmlTag'),array('tag' => 'td','colspan' => '2', 'align' => 'center')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        $this->addElements(array(
            $username,
            $password,
            $submit
        ));
        $this->setDecorators(array(
            'FormElements',
            array(array('data' => 'HtmlTag'), array('tag' => 'table')),
            'Form'
        ));
        
        
        
    }

}
