<?php

class Application_Form_Kategorija extends Zend_Form
{

    public function init()
    {
         $this->setAction('')->setMethod('post');
        $this->setAttrib('name', 'kategorijaforma');
        
        
        $kategorija=new Zend_Form_Element_Text('naziv');
        //$kategorija->setAttrib('id', 'nazivkat');
        $kategorija->setLabel('Naziv kategorije: ');
        $kategorija->setAttrib('class', 'forma');
        $kategorija->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        //$kategorija->addValidator(new Zend_Validate_Alpha());
        $this->addElement($kategorija);
    
        $submit = new Zend_Form_Element_Submit('dugmeSubmit');
        $submit->setLabel('Unesi');
        $submit->setAttrib('id', 'dugmeSubmit');
        $this->addElement($submit);
        $this->setDecorators(array(
            'FormElements',
            array(array('data' => 'HtmlTag'), array('tag' => 'table')),
            'Form'
        ));
    }


}

