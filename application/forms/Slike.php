<?php

class Application_Form_Slike extends Zend_Form
{

   public function init() {
        $this->setAction("");
        $this->setMethod("post");
        $this->addElement('file', 'slika', array(
            'label' => 'Slike za galeriju: ',
            'required' => true,
            'validators' => array(
                array('extension', true, array(
                        'extention' => 'jpg,png,gif',
                        'messages' => array(
                            Zend_Validate_File_Extension::NOT_FOUND =>
                            'Pogrešan format slike.',
                            Zend_Validate_File_Extension::FALSE_EXTENSION =>
                            'Pogrešan format slike.'))))
        ));
      
        
        $smestajiModel=new Application_Model_Smestaj();
        $smestaj=$smestajiModel->getSmestaji();
        $smestaji = new Zend_Form_Element_Select('select_smestaj');
        $smestaji->setAttrib('id', 'select_smestaj');
        $smestaji->setRequired(TRUE)->addErrorMessage('Polje je obavezno!');
        $smestaji->addMultiOption(0, 'Izaberi smestaj');
         foreach ($smestaj as $loc) {
            $smestaji->addMultiOption($loc['idSmestaj'], $loc['smestaj']);
        }
          $this->addElement($smestaji);

            $this->addElement('submit', 'dugmeSubmit', array(
            'ignore' => true,
            'label' => 'Unesi'
        ));
          
           $ak = $this->getElement('select_smestaj');
        $ak->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' =>
                    'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
          
          
        $slika = $this->getElement('slika');
        $slika->setDecorators(array(
            'File',
            'Errors',
            array(array('data' => 'HtmlTag'), array('tag' =>
                    'td')),
            array('Label', array('tag' => 'td')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        $submit = $this->getElement('dugmeSubmit');
        $submit->setAttrib("class", "btn btn-primary");
        $submit->setDecorators(array(
            'ViewHelper',
            'Description',
            'Errors', array(array('data' => 'HtmlTag'),
                array('tag' => 'td',
                    'colspan' => '2', 'align' => 'right')),
            array(array('row' => 'HtmlTag'), array('tag' => 'tr'))
        ));
        
        
//uvek na kraju mora ovo
        $this->setDecorators(array(
            'FormElements',
            array(array('data' => 'HtmlTag'), array('tag' =>'table', 'class' => 'table table-hover tablesorter')),
            'Form'
        ));
    }

}
