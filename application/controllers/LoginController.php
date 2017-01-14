<?php

class LoginController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {

        $this->view->Naslov = "Login";

        $form = new Application_Form_Login();

        $ulogovan = Zend_Auth::getInstance();

        if (!$ulogovan->hasIdentity()) {
            $this->view->form = $form;
        } else {
            $this->_redirect('/');
        }

        if ($this->_request->isPost("dugmeSubmit")) {
            if ($this->view->form->isValid($this->_request->getPost())) {

                $auth_adapter = $this->getAuthAdapter();
// uzimamo vrednosti sa forme
                $username = $this->view->form->getValue('korisnickoIme');
                $password = md5($this->view->form->getValue('lozinka'));
// pass to the adapter the submitted email and password
                $auth_adapter->setIdentity($username);
                $auth_adapter->setCredential($password);

                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($auth_adapter);
               
// check Is the user a valid one
                if ($result->isValid()) {
                    $sesija = new Zend_Auth_Storage_Session();
//get information about the user from database
                    $user_info = $auth_adapter->getResultRowObject(null, 'lozinka');
// write information in the auth storage
                    $auth_storage = $auth->getStorage();
                    $auth_storage->write($user_info);
                    $sesija->write($user_info);

                    if ($username == "admin") {
                        $this->_redirect('/administracija');
                    } 
                    if ($username == "prodaja") {
                        $this->_redirect('/prodaja');
                    } 
                    else {
                        $this->_redirect('/');
                    }
                } else {
                    $this->view->errorMessage = "Pogrešni podaci!";
                }
            }
        }
    }

    public function loginAction()
    {
        // action body
    }

    public function logoutAction()
    {
        // action body
        $this->_helper->viewRenderer->setNoRender(TRUE);
        Zend_Auth::getInstance()->clearIdentity();
        $sesija = new Zend_Auth_Storage_Session();
        $sesija->clear();
        $this->_redirect('/');
    }

    protected function getAuthAdapter() {

        $auth_adapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $auth_adapter->setTableName('korisnici');
        $auth_adapter->setIdentityColumn('korisnickoIme');
        $auth_adapter->setCredentialColumn('lozinka');
        $select = $auth_adapter->getDbSelect();


        return $auth_adapter;
    }

    public function signinAction() {
        $formreg = new Application_Form_Signin();
        $this->view->formreg = $formreg;


        if ($this->_request->isPost("dugmeSubmitR")) {
            if ($this->view->formreg->isValid($this->_request->getPost())) {

                $post = $this->_request->getParams();

                $auth = new Application_Model_Signin();

                if ($auth->sigin_user($post)) {
                    $this->view->status = 1;
                } else {
                    $this->view->status = 0;
                }
            }
        }
    }

}