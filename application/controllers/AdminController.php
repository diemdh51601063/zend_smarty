<?php
class AdminController extends Zend_Controller_Action
{
    public function init()
    {
        $layout = Zend_Layout::resetMvcInstance();
        $layout = Zend_Layout::startMvc(
            array(
                'layoutPath'     => APPLICATION_PATH . '/smarty/templates/admin',
                'layout'         => 'login',
                'contentKey'     => 'content'
            )
        );
        $layout->setViewSuffix('tpl');
        /*var_dump($layout);
        die;
        $this->_helper->layout->setLayout('layout_admin');*/
        $this->_helper->viewRenderer->setNoRender();
    }

    public function indexAction()
    {
        $this->view->content = 'hdwghw';
    }

    public function productAction()
    {
        $this_section = 'ADMIN PRODUCT ACTIONS';
        //$this->view->assign('content',$this_section);
        $this->view->content = $this_section;
    }
}
