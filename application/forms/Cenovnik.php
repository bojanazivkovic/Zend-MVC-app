<?php

class Application_Form_Cenovnik extends Zend_Form {

    public function init()
    {
        $this->setAction('')->setMethod('post');
        $this->setAttrib('name', 'cenaform');
        
        
        $cena=new Zend_Form_Element_Text('cena');
        $cena->setLabel('Cena: ');
        $cena->setAttrib('class', 'forma');
        $cena->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        $this->addElement($cena);
    
        $submit = new Zend_Form_Element_Submit('dugmeSubmitc');
        $submit->setLabel('Unesi');
        //$submit->setAttrib('class', 'dugme');
        $submit->setAttrib('id', 'dugmeSubmitc');
        $this->addElement($submit);
        $this->setDecorators(array(
            'FormElements',
            array(array('data' => 'HtmlTag'), array('tag' => 'table')),
            'Form'
        ));
    }


}

