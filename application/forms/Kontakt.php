<?php

class Application_Form_Kontakt extends Zend_Form
{

    public function init()
    {
       $this->setAction('')->setMethod('post');
        $this->setAttrib('name', 'kontaktforma');
        
        $ime=new Zend_Form_Element_Text('ime');
        $ime->setAttrib('id', 'ime');
        $ime->setLabel('Ime: ');
        $ime->setAttrib('class', 'forma');
        $ime->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        $ime->addValidator(new Zend_Validate_Alpha());
        $this->addElement($ime);
        
        $email=new Zend_Form_Element_Text('email');
        $email->setLabel('Email :');
        $email->setAttrib('class', 'forma');
        $email->setAttrib('id', 'email');
        $email->addValidator(new Zend_Validate_EmailAddress())->addErrorMessage('Email adresa nije u dobrom formatu');
        $this->addElement($email);
         
        $poruka=new Zend_Form_Element_Textarea('poruka');
        $poruka->setLabel('Vaša poruka :');
        $poruka->setAttrib('class', 'forma');
        $poruka->setAttrib('id', 'poruka');
        $poruka->setRequired(TRUE)->addErrorMessage('Morate popuniti polje za poruku.');
        $poruka->setAttrib('rows', '8');
        $poruka->setAttrib('cols', 50);
        $this->addElement($poruka);
                
        $submit = new Zend_Form_Element_Submit('dugmePosalji');
        $submit->setLabel('Pošalji');
        $submit->setAttrib('class', 'dugme');
        $submit->setAttrib('id', 'dugmeSubmit');
        $this->addElement($submit);
         
        
       
    }


}

