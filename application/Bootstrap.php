<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    
    function _initViewHelpers() {
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();

        $view->headLink()->appendStylesheet('/style.css');       
        $view->headMeta()->appendHttpEquiv('Content-type', 'text/html;charset=utf-8');
        $view->headTitle()->setSeparator(' - ');
        $view->headTitle('Turisticka agencija');

        $view->headLink()->appendStylesheet('/assets/css/font-awesome.css');

        
    }


}
