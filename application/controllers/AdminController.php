<?php

class AdminController extends Zend_Controller_Action
{
    protected $_arrParam;
    protected $_currentController;
    protected $_actionMain;
    protected $_admin;

    public function init()
    {
        $this->_helper->layout->setLayout('layout_admin');
        $this->_admin = 'bbbb';

        $this->_arrParam = $this->_request->getParams();
        $this->_currentController = '/' . $this->_arrParam['controller'];
        $this->_actionMain = '/' . $this->_arrParam['controller'] . '/index';

        $this->view->arrParam = $this->_arrParam;
        $this->view->currentController = $this->_currentController;
        $this->view->actionMain = $this->_actionMain;

        if ($this->_admin == '') {
            //$this->_request->setActionName('login');
        } else {
            $this->view->admin = $this->_admin;
        }
    }

    public function indexAction()
    {
        $this_section = 'INDEX LOGIN';
        $this->view->assign('content', $this_section);
    }

    public function loginAction()
    {
        try {
            $this_section = 'ADMIN LOGIN';
            $this->view->assign('content', $this_section);

            $linkLogIn = '/' . $this->_arrParam['module'] . '/' . $this->_arrParam['controller'] . '/get';
            $this->view->assign('linkLogIn', $linkLogIn);
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    public function productAction()
    {
        $this_section = 'ADMIN PRODUCT ACTIONS';
        $list_product = [];
        try {
            $product_model = new Model_Product();
            $list_product = $product_model->getListItem();
        } catch (Exception $e) {
            ($e);
        }
        $this_section = 'content indexActions';
        $this->view->assign('hello', $this_section);
        $this->view->assign('listItem', $list_product);
    }

    public function categoryAction()
    {
        $this_title = 'Danh Sách Danh Mục';
        $category_model = new Model_Category();
        $list_category = $category_model->getListItem();
        $this->view->assign('title', $this_title);
        $this->view->assign('listCategory', $list_category);
    }

    public function brandAction()
    {
        $this_title = 'Danh Sách Thương Hiệu';
        $brand_model = new Model_Brand();
        $list_brand = $brand_model->getListItem();
        $this->view->assign('title', $this_title);
        $this->view->assign('listBrand', $list_brand);
    }

    public function customerAction()
    {
        $this_section = 'Danh sách khách hàng';
        $this->view->assign('title', $this_section);
    }

    public function orderAction()
    {
        var_dump($this->_arrParam);
        //$type_list = $this->_arrParam['type_list'];
        $this_section = 'Danh sách đơn hàng';
        $order_model = new Model_Order();
        $list_order = $order_model->getListItem();
        $this->view->assign('title', $this_section);
        $this->view->assign('listOrder', $list_order);
    }

    public function getAction()
    {
        if ($this->_request->isPost()) {
            $login_name = $this->_arrParam['login_name'];
            $encode = new Ext_Encode();
            $password = $encode->encode_md5($this->_arrParam['password']);
            try {
                $model = new Model_Admin();
                $login = $model->logIn($login_name, $password);
                if ($login != '') {
                    $this->_admin = $login;
                    $this->redirect($this->_actionMain);
                } else {
                    var_dump($login);
                    //die;
                }
            } catch (Exception $e) {
                var_dump($e->getMessage());
                //die;
            }
        }
    }
}
