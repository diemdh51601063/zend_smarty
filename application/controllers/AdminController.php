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
        $this->redirect('/' . $this->_arrParam['controller'] . '/order');
    }

    public function loginAction()
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

    public function productAction()
    {
        $this_section = 'Danh Sách Sản Phẩm';
        $list_product = [];
        try {
            $product_model = new Model_Product();
            $list_product = $product_model->getListItem();
            foreach($list_product as $key => $product){
                $product_image_model = new Model_ProductImage();
                $list_product[$key]['list_image'] = $product_image_model->getListImageOfProduct($product['id']);
            }
        } catch (Exception $e) {
            ($e);
        }
        $this->view->assign('title', $this_section);
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
        $public_link= BRAND_IMAGE_PATH;
        $this_title = 'Danh Sách Thương Hiệu';
        $brand_model = new Model_Brand();
        $list_brand = $brand_model->getListItem();
        $this->view->assign('title', $this_title);
        $this->view->assign('listBrand', $list_brand);
        $this->view->assign('public_link', $public_link);
    }

    public function customerAction()
    {
        $this_section = 'Danh sách khách hàng';
        $this->view->assign('title', $this_section);
    }

    public function orderAction()
    {
        $this_section = 'Danh sách đơn hàng';
        $order_model = new Model_Order();
        $list_order = $order_model->getListItem();
        $this->view->assign('title', $this_section);
        $this->view->assign('listOrder', $list_order);
    }
}
