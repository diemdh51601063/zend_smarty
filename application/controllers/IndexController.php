<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $param = $this->_request->getParams();
    }

    public function indexAction()
    {
        $this_section = 'content indexActions';
        $this->view->assign('hello', $this_section);
    }

    public function viewAction()
    {
        $this_section = 'VIEW ACTIONS';
        $this->view->assign('content', $this_section);
    }
}