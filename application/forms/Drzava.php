<?php

class Application_Form_Drzava extends Zend_Form
{

    public function init()
    {
        $this->setAction('')->setMethod('post');
        $this->setAttrib('name', 'drzavaforma');
        
        
        $drzava=new Zend_Form_Element_Text('drzava');
        $drzava->setLabel('Naziv drzave: ');
        $drzava->setAttrib('class', 'forma');
        $drzava->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        $this->addElement($drzava);
    
        $submit = new Zend_Form_Element_Submit('dugmeSubmitd');
        $submit->setLabel('Unesi');
        //$submit->setAttrib('class', 'dugme');
        $submit->setAttrib('id', 'dugmeSubmitd');
        $this->addElement($submit);
        $this->setDecorators(array(
            'FormElements',
            array(array('data' => 'HtmlTag'), array('tag' => 'table')),
            'Form'
        ));
    }


}

