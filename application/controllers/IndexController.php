<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
       
    }

    public function indexAction()
    {
        $list_product = [];
        try{
            $product_model = new Model_Product();
            $list_product = $product_model->getListItem();
        }catch (Exception $e){
            ($e);
        }
        $this_section = 'content indexActions';
        $this->view->assign('hello', $this_section);
        $this->view->assign('listItem', $list_product);
    }

    public function viewAction()
    {
        $this_section = 'VIEW ACTIONS';
        $this->view->assign('content', $this_section);
    }

    public function detailAction()
    {
        $this_section = 'detail ACTIONS';
        $this->view->assign('content', $this_section);
    }

    public function checkoutAction()
    {
        $this_section = 'checkout ACTIONS';
        $this->view->assign('content', $this_section);
    }
}