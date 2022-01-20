<?php

require_once 'Ext/EnCode.php';

class AdminController extends Zend_Controller_Action
{
    protected $_arrParam;
    protected $_currentController;
    protected $_actionMain;
    protected $_adminSessionNamespace;

    public function init()
    {
        $this->_helper->layout->setLayout('layout_admin');

        $this->_adminSessionNamespace = new Zend_Session_Namespace('adminSessionNamespace');
        $this->_adminSessionNamespace->setExpirationSeconds(3600);

        $this->_arrParam = $this->_request->getParams();
        $this->_currentController = '/' . $this->_arrParam['controller'];
        $this->_actionMain = '/' . $this->_arrParam['controller'] . '/index';

        $this->view->arrParam = $this->_arrParam;
        $this->view->currentController = $this->_currentController;
        $this->view->actionMain = $this->_actionMain;

        if (empty($this->_adminSessionNamespace->admin)) {
            $this->_request->setActionName('login');
        } else {
            $this->view->admin = $this->_adminSessionNamespace->admin;
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
                    $this->_adminSessionNamespace->admin = $login;
                    $this->redirect($this->_actionMain);
                } else {
                    $message_error = 'Sai thông tin đăng nhập !!!!';
                    $this->view->assign('message_error', $message_error);
                }
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }

    public function productAction()
    {
        $this_section = 'Danh Sách Sản Phẩm';
        $list_product = [];
        try {
            $product_model = new Model_Product();
            $list_product = $product_model->getListItem($this->_arrParam);
            foreach ($list_product as $key => $product) {
                $product_image_model = new Model_ProductImage();
                $list_product[$key]['list_image'] = $product_image_model->getListImageOfProduct($product['id']);
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
        $this->view->assign('title', $this_section);
        $this->view->assign('list_product', $list_product);

        $brand_model = new Model_Brand();
        $list_brand = $brand_model->getListItem();

        $category_model = new Model_Category();
        $list_category = $category_model->getListItem();

        $this->view->assign('list_category', $list_category);

        $this->view->assign('list_brand', $list_brand);
    }

    public function categoryAction()
    {
        $this_title = 'Danh Sách Danh Mục';
        $category_model = new Model_Category();
        $list_category = $category_model->getListItem();
        $product_model = new Model_Product();
        foreach ($list_category as $key => $category) {
            $list_product_in_category = $product_model->getListItem(
                array(
                    'category_id' => $category['id']
                )
            );
            $list_category[$key]['number_product'] = count($list_product_in_category);
        }
        $this->view->assign('title', $this_title);
        $this->view->assign('list_category', $list_category);
    }

    public function brandAction()
    {
        $this_title = 'Danh Sách Thương Hiệu';
        $brand_model = new Model_Brand();
        $list_brand = $brand_model->getListItem();
        $product_model = new Model_Product();
        foreach ($list_brand as $key => $brand) {
            $list_product_in_category = $product_model->getListItem(
                array(
                    'brand_id' => $brand['id']
                )
            );
            $list_brand[$key]['number_product'] = count($list_product_in_category);
        }
        $this->view->assign('title', $this_title);
        $this->view->assign('list_brand', $list_brand);
    }

    public function customerAction()
    {
        $order_model = new Model_Order();
        $customer_model = new Model_Customer();
        $list_customer = $customer_model->getListItem();
        foreach ($list_customer as $key => $customer) {
            $count_order_of_user = $order_model->getcountOrderOfCustomer($customer['id']);
            $list_customer[$key]['count_order'] = $count_order_of_user;
        }
        $this_section = 'Danh sách khách hàng';
        $this->view->assign('title', $this_section);
        $this->view->assign('list_customer', $list_customer);
    }

    public function orderAction()
    {
        $this_section = 'Danh sách đơn hàng';
        $order_model = new Model_Order();
        try {
            $list_order = $order_model->getListItem($this->_arrParam);
            $this->view->assign('title', $this_section);
            $this->view->assign('list_order', $list_order);
        } catch (Exception $e) {
            //var_dump($e->getMessage());
        }
    }

    public function confirmorderAction()
    {
        if ($this->_request->isPost()) {
            $order_model = new Model_Order();
            $product_model = new Model_Product();
            $product_detail_model = new Model_ProductDetail();
            $order_detail_model = new Model_OrderDetail();
            $this->_arrParam['admin_id'] = $this->_adminSessionNamespace->admin['id'];

            $order = $order_model->confirmOrder($this->_arrParam);
            if (!empty($order['id'])) {
                $list_detail = $order_detail_model->getListItem($order['id']);
                if (!empty($list_detail)) {
                    foreach ($list_detail as $detail) {
                        $order_detail_model->editItem(
                            array(
                                'id' => $detail['id'],
                                'status' => 2
                            )
                        );
                        if (!empty($detail['product_id'])  && !empty($detail['detail_product_id'])) {
                            $product_model->editItem(array('reduce' => $detail['quantily']));
                            $product_detail_model->editItem(array('reduce' => $detail['quantily']));
                        } else if (!empty($detail['product_id'])  && empty($detail['detail_product_id'])) {
                            $product_model->editItem(array('reduce' => $detail['quantily']));
                        }
                    }
                }
            }
        }
    }

    public function cancelorderAction()
    {
        if ($this->_request->isPost()) {
            $order_model = new Model_Order();

            $this->_arrParam['admin_id'] = $this->_adminSessionNamespace->admin['id'];

            $list_order = $order_model->cancelOrder($this->_arrParam);
        }
    }


    public function logoutAction()
    {
        $this->_adminSessionNamespace->unsetAll();
        $this->redirect('/' . $this->_arrParam['controller'] . '/login');
    }
}
