<?php

class AdminController extends Zend_Controller_Action
{
    public function init()
    {
        $this->_helper->viewRenderer->setNoRender();
        $front_request = $this->_request->getParams();
        if (isset($this->_helper->viewRenderer)) {
            $this->_helper->viewRenderer->setNoRender();
        }else{
            $action = $this->_request->getActionName();
            $this->_helper->viewRenderer->setScriptAction($action);
        }
        $front = Zend_Controller_Front::getInstance();

        $front::setRequest($front_request);
        $front->dispatch();
    }

    public function indexAction()
    {
        $action = $this->_request->getActionName();
        //$this->_helper->viewRenderer->setScriptAction($action);
        //var_dump($this->_helper->viewRenderer->getViewScript());
        $this_section = 'ADMIN INDEX ACTIONS';
        $this->view = $this->_helper->viewRenderer->render($action, 'content', true);
        var_dump($this->_helper->viewRenderer->render($action, 'content', true));
        die;
        $this->view->assign('content', $this_section);

    }

    public function productAction()
    {
        $this_section = 'ADMIN PRODUCT ACTIONS';
        $this->view->assign('content', $this_section);
    }
}
