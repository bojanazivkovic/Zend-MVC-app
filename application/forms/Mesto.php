<?php

class Application_Form_Mesto extends Zend_Form
{

    public function init()
    {
        $this->setAction('')->setMethod('post');
        $this->setAttrib('name', 'mestoforma');
       
        
        $mesto=new Zend_Form_Element_Text('mesto');
        $mesto->setLabel('Naziv mesta: ');
        $mesto->setAttrib('class', 'forma');
        $mesto->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        $this->addElement($mesto);
    
        $submit = new Zend_Form_Element_Submit('dugmeSubmitm');
        $submit->setLabel('Unesi');
        $submit->setAttrib('id', 'dugmeSubmitm');
        $this->addElement($submit);
        $this->setDecorators(array(
            'FormElements',
            array(array('data' => 'HtmlTag'), array('tag' => 'table')),
            'Form'
        ));
    }


}

