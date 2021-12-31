<?php

class AdminController extends Zend_Controller_Action
{
    public function init()
    {
        //$this->_helper->viewRenderer->setNoRender();
    }

    public function indexAction()
    {
        try {
            $this_section = 'ADMIN INDEX ACTIONS';
            $this->render('index');
            //$this->_view->content = $this_section;
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

    public function productAction()
    {
        $this->render('product');
        $this_section = 'ADMIN PRODUCT ACTIONS';
        $this->view->assign('content', $this_section);
    }
}
