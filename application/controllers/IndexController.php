<?php

class IndexController extends Zend_Controller_Action
{
    protected $_arrParam;
    protected $_currentController;
    protected $_actionMain;
    protected $_userSessionNamespace;

    public function __contruct()
    {
        $this->_arrParam = $this->_request->getParams();
        $this->_currentController = '/' . $this->_arrParam['controller'];
        $this->_actionMain = '/' . $this->_arrParam['controller'] . '/index';

        $this->_userSessionNamespace = new Zend_Session_Namespace('userSessionNamespace');
        $this->_userSessionNamespace->setExpirationSeconds(3600);

        $this->view->arrParam = $this->_arrParam;
        $this->view->currentController = $this->_currentController;
        $this->view->actionMain = $this->_actionMain;
        $this->view->user = $this->_userSessionNamespace->user;

        $category_model = new Model_Category();
        $list_category = $category_model->getListItem();
        $this->view->assign('listCategory', $list_category);
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

    public function registerAction()
    {
        $this_section = 'register ACTIONS';
        $this->view->assign('content', $this_section);
    }
}