<?php

class Application_Form_Signin extends Zend_Form {

    public function init() {
        $this->setAction("");
        $this->setMethod("post");
        $this->setAttrib('id', 'forma');

        
        $this->addElement('text', 'imePrezimeR', array(
            'label' => 'Ime i prezime:',
            'required' => true,
            'filters' => array('StringTrim', 'StripTags'),
        ));
                
        $this->addElement('text', 'korisnickoImeR', array(
            'label' => 'Korisničko ime:',
            'required' => true,
            'filters' => array('StringTrim', 'StripTags'),
        ));

        $this->addElement('password', 'lozinkaR', array(
            'label' => 'Lozinka:',
            'required' => true
        ));

        $this->addElement('text', 'telefonR', array(
            'label' => 'Broj telefona:',
            'required' => true,
            'filters' => array('StringTrim')
        ));
        $this->addElement('text', 'emailR', array(
            'label' => 'Email:',
            'required' => true,
            'filters' => array('StringTrim')
        ));

        $this->addElement('submit', 'dugmeSubmitR', array(
            'ignore' => true,
            'label' => 'Registruj se'
        ));

 //ime i prezime
        $imePrezime = $this->getElement('imePrezimeR');
        $imePrezime->setAttrib("class", "text_input");
        $imePrezime->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                        'isEmpty' => 'Polje je obavezno.',
                    )))
        ));
        $imePrezime->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        
        
        
//username
        $username = $this->getElement('korisnickoImeR');
        $username->setAttrib("class", "text_input");
        $username->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                        'isEmpty' => 'Polje je obavezno.',
                    )))
        ));
        $username_stringlength_validate = new Zend_Validate_StringLength(4, 15);
        $username->addValidator($username_stringlength_validate);
        $username->getValidator('Zend_Validate_StringLength')->setMessage('Korisničko ime mora da sadrži od 4 do 15
karaktera.');

        $username->addValidator('Db_NoRecordExists', true, array('table' => 'korisnici', 'field' => 'korisnickoIme'));
        $username->getValidator('Db_NoRecordExists')->setMessage('Korisničko ime već postoji u bazi.');

        $username->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

//lozinka
        $password = $this->getElement('lozinkaR');
        $password->setAttrib("class", "text_input");

        $password->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                        'isEmpty' => 'Polje je obavezno.',
        )))));
        $password_stringlength_validate = new
                Zend_Validate_StringLength(4, 15);
        $password->addValidator($password_stringlength_validate);
        $password->getValidator('Zend_Validate_StringLength')->setMessage('Lozinka mora da sadrži od 4 do 15 karaktera.');
        $password->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

        
        
//telefon
        $telefon = $this->getElement('telefonR');
        $telefon->setAttrib("class", "text_input");
        $telefon->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                        'isEmpty' => 'Polje je obavezno.',
                    )))
        ));
        $telefon->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
//email
        $email = $this->getElement('emailR');
        $email->setAttrib("class", "text_input");
        $email->addValidators(array(
            array('NotEmpty', true, array('messages' => array(
                        'isEmpty' => 'Polje je obavezno.',
                    )))
        ));

        $email->addValidator('EmailAddress');
        $email->getValidator('EmailAddress')->setMessage('Email nije u dobrom formatu.');
        $email->addValidator('Db_NoRecordExists', true, array('table' => 'korisnici', 'field' => 'email'));
        $email->getValidator('Db_NoRecordExists')->setMessage('Email već postoji u bazi.');

        $email->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' => 'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));





//submit
        $submit = $this->getElement('dugmeSubmitR');

        $submit->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors', array(array('data' => 'HtmlTag'),
                array('tag' => 'td',
                    'colspan' => '2', 'align' => 'center')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));

//uvek na kraju mora ovo
        $this->setDecorators(array(
            'FormElements',
            array(array('data' => 'HtmlTag'), array('tag' => 'table')),
            'Form'
        ));
    }

}
