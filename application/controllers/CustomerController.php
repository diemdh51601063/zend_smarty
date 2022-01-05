<?php

class CustomerController extends Zend_Controller_Action
{

    protected $_arrParam;
    protected $_currentController;
    protected $_actionMain;
    protected $_userSessionNamespace;
 

    public function init()
    {
        $this->_arrParam = $this->_request->getParams();
        $this->_currentController = '/' . $this->_arrParam['controller'];
        $this->_actionMain = '/' . $this->_arrParam['controller'] . '/index';

        $this->view->arrParam = $this->_arrParam;
        $this->view->currentController = $this->_currentController;
        $this->view->actionMain = $this->_actionMain;

        $this->_userSessionNamespace = new Zend_Session_Namespace('userSessionNamespace');
    }

    public function indexAction()
    {
        $list_product = [];
        try{
            $product_model = new Model_Product();
            $list_product = $product_model->getListItem();
            foreach($list_product as $key => $product){
                $product_image_model = new Model_ProductImage();
                $list_product[$key]['list_image'] = $product_image_model->getListImageOfProduct($product['id']);
            }
        }catch (Exception $e){
            ($e);
        }
        $this_section = 'content indexActions';
        $this->view->assign('hello', $this_section);
        $this->view->assign('listItem', $list_product);
    }

    public function loginAction()
    {
        $this_section = 'VIEW ACTIONS';
        $this->view->assign('content', $this_section);
        if (!isset($userSessionNamespace->bar)) {
            echo "\$namespace->bar not set\n";
        }
    }

    public function detailAction()
    {
        var_dump($this->_arrParam);
        //die;
        $this_section = 'detail ACTIONS';
        $this->view->assign('content', $this_section);
    }

    public function checkoutAction()
    {
        $this_section = 'checkout ACTIONS';
        $this->view->assign('content', $this_section);
    }

    public function registerAction()
    {
        $this_section = 'register ACTIONS';
        $this->view->assign('content', $this_section);
    }
}