<?php
require_once 'Ext/EnCode.php';
class IndexController extends Zend_Controller_Action
{
    protected $_arrParam;
    protected $_currentController;
    protected $_actionMain;

    public function init()
    {
        $this->_arrParam = $this->_request->getParams();
        $this->_currentController = '/' . $this->_arrParam['controller'];
        $this->_actionMain = '/' . $this->_arrParam['controller'] . '/index';

        $this->view->arrParam = $this->_arrParam;
        $this->view->currentController = $this->_currentController;
        $this->view->actionMain = $this->_actionMain;

        $product_model = new Model_Product();
        $category_model = new Model_Category();
        $list_category = $category_model->getListItem();
        foreach ($list_category as $key => $category) {
            $list_product_in_category = $product_model->getListItem(array(
                'category_id' => $category['id']
            ));
            $list_category[$key]['number_product'] = count($list_product_in_category);
        }
        $this->view->assign('list_category', $list_category);


        $brand_model = new Model_Brand();
        $list_brand = $brand_model->getListItem();
        foreach ($list_brand as $key => $brand) {
            $list_product_in_category = $product_model->getListItem(array(
                'brand_id' => $brand['id']
            ));
            $list_brand[$key]['number_product'] = count($list_product_in_category);
        }
        $this->view->assign('list_brand', $list_brand);

        $this->_userSessionNamespace = new Zend_Session_Namespace('userSessionNamespace');

        if (isset($this->_userSessionNamespace->customer)) {
            $this->view->customer = $this->_userSessionNamespace->customer;
        }
        if (isset($this->_userSessionNamespace->cart)) {
            $this->view->cart = $this->_userSessionNamespace->cart;
        }
    }

    public function indexAction()
    {
        $list_product = [];
        try {
            $product_model = new Model_Product();
            $this->_arrParam['status'] = 1;
            $this->_arrParam['order_by'] = " regist_date DESC ";
            $list_product = $product_model->getListItem($this->_arrParam);
            foreach ($list_product as $key => $product) {
                $product_image_model = new Model_ProductImage();
                $list_product[$key]['list_image'] = $product_image_model->getListImageOfProduct($product['id']);
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
        $this->view->assign('list_product', $list_product);
    }

    public function viewAction()
    {
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
        
        if(!empty($this->_arrParam['brand_id'])){
            $this->view->assign('active_brand', $this->_arrParam['brand_id']);
        }
        $this->view->assign('list_product', $list_product);
    }

    public function detailAction()
    {
        $category_model = new Model_Category();
        $list_category = $category_model->getListItem();
        $brand_model = new Model_Brand();
        $list_brand = $brand_model->getListItem();

        $id_product = $this->_arrParam['id'];

        $product_model = new Model_Product();
        $detail = $product_model->getItemDetail($id_product);

        $product_image_model = new Model_ProductImage();
        $list_image = $product_image_model->getListImageOfProduct($id_product);

        $product_detail_model = new Model_ProductDetail();
        $list_type_product = $product_detail_model->getListDetailOfProduct($id_product);

        $list_image_type_product = $product_image_model->getListImageOfDetailProduct($id_product);

        $this->view->assign('list_category', $list_category);
        $this->view->assign('list_brand', $list_brand);
        $this->view->assign('detail_product', $detail);
        $this->view->assign('image_product', $list_image);
        $this->view->assign('list_type_product', $list_type_product);
        $this->view->assign('list_image_type_product', $list_image_type_product);
    }

    public function checkoutAction()
    {
        $this_section = "CHECKOUT ACTION";
        if (!empty($this->_userSessionNamespace->customer)) {
            $customer_id = $this->_userSessionNamespace->customer['customer_id'];
            $customer_model = new Model_Customer();
            $customer_info = $customer_model->getCustomer($customer_id);
            if (!empty($_SESSION['userSessionNamespace']['cart'])) {
                $cart_data = $_SESSION['userSessionNamespace']['cart'];
                $this->view->assign('list_product_in_cart', $cart_data);
                $this->view->assign('customer_info', $customer_info);
            }
        }
        $this->view->assign('content', $this_section);
    }

    public function registerAction()
    {
        $this_section = 'Đăng Ký Tài Khoản';
        $this->view->assign('content', $this_section);
    }

    public function logoutAction()
    {
        $this->_userSessionNamespace->unsetAll();
        $this->redirect('/' . $this->_arrParam['controller'] . '/index');
    }

    public function loginAction()
    {
        if ($this->_request->isPost()) {
            try {
                $model = new Model_Customer();
                $login = $model->logIn($this->_arrParam);
                if($login === false){
                    $message_error = 'Sai thông tin đăng nhập !!!!';
                    $this->view->assign('message_error', $message_error);
                    unset($this->_arrParam['password']);
                    $this->view->assign('error_value', $this->_arrParam);
                }else if (!empty($login['customer_id'])) {
                    $this->_userSessionNamespace->customer = $login;
                    $this->redirect($this->_actionMain);
                } else {
                    unset($this->_arrParam['password']);
                    $this->view->assign('error_value', $this->_arrParam);
                    $this->view->assign('error_input', $login);
                }
            } catch (Exception $e) {
                //var_dump($e->getMessage());
            }
        }
    }
}
