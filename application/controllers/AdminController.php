<?php

class AdminController extends Zend_Controller_Action
{
    public function init()
    {
        $this->_helper->viewRenderer->setNoRender();
        // $router     = new Zend_Controller_Router_Rewrite();
        //$controller = Zend_Controller_Front::getInstance();
        // $controller->setRouter($router);
        //$response   = $controller->dispatch();
        try {
            $front_request = $this->_request->getParams();
            //var_dump("<pre>".$this->_request->getControllerName()."</pre>");
            //var_dump($this->_helper->viewRenderer);
        } catch (Exception $e) {
            var_dump($e);
        }

        if (isset($this->_helper->viewRenderer)) {
            $this->_helper->viewRenderer->setNoRender();
        } else {
            $action = $this->_request->getActionName();
            $this->_helper->viewRenderer->setScriptAction($action);
        }
    }

    public function indexAction()
    {
        $action = $this->_request->getActionName();
        $controller = $this->_request->getControllerName();
        //$this->_helper->viewRenderer->setScriptAction($action);
        //var_dump($this->_helper->viewRenderer->getViewScriptPathNoControllerSpec());
        try {
            $this_section = 'ADMIN INDEX ACTIONS';
            //var_dump($this->view);
            $this->view = $this->_helper->viewRenderer->render($action, null, false);
            //var_dump($this->_helper->viewRenderer->render($action, 'content', true));
            // die;

           $this->view->assign('content', $this_section);
        } catch (Exception $e) {
            //var_dump('jsgdgh');
            var_dump($e->getMessage());
        }
    }

    public function productAction()
    {
        $this_section = 'ADMIN PRODUCT ACTIONS';
        $this->view->assign('content', $this_section);
    }
}
