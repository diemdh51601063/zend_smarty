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
            $list_product = $product_model->getListItem($this->_arrParam);
            foreach ($list_product as $key => $product) {
                $product_image_model = new Model_ProductImage();
                $list_product[$key]['list_image'] = $product_image_model->getListImageOfProduct($product['id']);
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
        $this_section = 'content indexActions';
        $this->view->assign('hello', $this_section);
        $this->view->assign('listItem', $list_product);
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
        if (!empty($this->_userSessionNamespace->customer['id'])) {
            $customer_id = $this->_userSessionNamespace->customer['id'];
            $customer_model = new Model_Customer();
            $customer_info = $customer_model->getCustomer($customer_id);

            $customer_cart_model = new Model_Cart();
            $cart_id = $customer_cart_model->getCustomerCart($customer_id);

            $product_in_cart_model = new Model_ProductInCart();
            $product_in_cart = $product_in_cart_model->getAllProductInCart($cart_id);
            $list_product_in_cart = [];
            if (!empty($product_in_cart)) {
                foreach ($product_in_cart as $item) {
                    $product = array(
                        'id' => $item['id'],
                        'product_id' => $item['product_id'],
                        'price' => $this->getDetailOfProduct($item['product_id'])['price'],
                        'image' => $this->getOneImageOfProduct($item['product_id']),
                        'type_product_id' => $item['product_detail_id'],
                        'type_product_color' => $this->getColorOfProduct($item['product_detail_id']),
                        'name' => $this->getDetailOfProduct($item['product_id'])['name'],
                        'number_product' => $item['quantily']
                    );
                    $list_product_in_cart[] = $product;
                }
            }
            $this->view->assign('list_product_in_cart', $list_product_in_cart);
            $this->view->assign('customer_info', $customer_info);
        }
        $this->view->assign('content', $this_section);
    }

    public function registerAction()
    {
        $this->filterInputRegister($this->_arrParam);
        $this_section = 'Đăng Ký Tài Khoản';
        $this->view->assign('content', $this_section);

        $customer_model = new Model_Customer();
        if ($this->_request->isPost()) {
            try {
                $check_exist = $customer_model->checkExistCustomer($this->_arrParam);
                if (empty($check_exist['id'])) {
                    $register = $customer_model->registerUser($this->_arrParam);
                    if (isset($register['status']) && ($register['status'] === true)) {
                        $this->userSessionNamespace->user = $register['user'];
                        $data = $register['customer'];
                        $this->redirect('/index');
                    } else {
                        $this->view->assign('message_error', $register);
                        $this->view->assign('input_value', $this->_arrParam);
                    }
                } else {
                    $content = 'Email hoặc Số điện thoại đã được đăng ký !!!!';
                    $this->view->assign('customer_exits', $content);
                    $this->view->assign('input_value', $this->_arrParam);
                }
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }

    public function logoutAction()
    {
        $this->_userSessionNamespace->unsetAll();
        $this->redirect('/' . $this->_arrParam['controller'] . '/index');
    }

    public function loginAction()
    {
        if ($this->_request->isPost()) {
            $login_name = $this->_arrParam['email'];
            $encode = new Ext_Encode();
            $password = $encode->encode_md5($this->_arrParam['password']);
            try {
                $model = new Model_Customer();
                $login = $model->logIn($login_name, $password);
                if ($login['id'] != '') {
                    $this->_userSessionNamespace->customer['id'] = $login['id'];
                    $this->showCustomerCart($login['id']);
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

    public function filterInputRegister($arrParam)
    {
        $param_filter = array('first_name', 'last_name', 'address', 'city_name', 'district_name', 'ward_name');
        $filter = new Zend_Filter_StripTags();
        foreach ($arrParam as $key => $value) {
            if (array_key_exists($key, $param_filter)) {
                $arrParam[$key] = $filter->filter($arrParam[$key]);
                $arrParam[$key] = preg_replace("/[^a-z0-9A-Z_[:space:]ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂ ưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/u", "",  $arrParam[$key]);
            } else if ($key == 'password') {
                $arrParam[$key] = $filter->filter($arrParam[$key]);
                $arrParam[$key] = preg_replace("/[^a-z0-9A-Z_\x{00C0}-\x{00FF}\x{1EA0}-\x{1EFF}]/u", "", $arrParam[$key]);
            }
        }
        return $arrParam;
    }

    public function showCustomerCart($customer_id)
    {
        $customer_cart_model = new Model_Cart();
        $cart_id = $customer_cart_model->getCustomerCart($customer_id);

        $product_in_cart_model = new Model_ProductInCart();
        $product_in_cart = $product_in_cart_model->getAllProductInCart($cart_id);

        if (!empty($product_in_cart)) {
            foreach ($product_in_cart as $item) {
                $product = array(
                    'id' => $item['id'],
                    'product_id' => $item['product_id'],
                    'price' => $this->getDetailOfProduct($item['product_id'])['price'],
                    'image' => $this->getOneImageOfProduct($item['product_id']),
                    'type_product_id' => $item['type_product_id'],
                    'type_product_color' => $this->getColorOfProduct($item['type_product_id']),
                    'name' => $this->getDetailOfProduct($item['product_id'])['name'],
                    'number_product' => $item['quantily']
                );
                $this->_userSessionNamespace->cart[] = $product;
            }
        }

        if (!empty($this->_userSessionNamespace->cart)) {
            foreach ($this->_userSessionNamespace->cart as $cart_item) {
                $cart_item['cart_id'] = $cart_id;
                unset($cart_item['id']);
                $product_in_cart_model->addProductInCart($cart_item);
            }
        }
    }

    private function getOneImageOfProduct($product_id)
    {
        $product_image_model = new Model_ProductImage();
        $image_product = null;
        $list_image = $product_image_model->getListImageOfProduct($product_id);
        if (!empty($list_image)) {
            $image_product = $list_image[0]['image'];
        }
        return $image_product;
    }

    private function getDetailOfProduct($product_id)
    {
        $product = null;
        if (!empty($product_id)) {
            $product_model = new Model_Product();
            $get_product = $product_model->getItemDetail($product_id);
            $product['name'] = $get_product['name'];
            $product['price'] = $get_product['price'];
        }
        return $product;
    }

    private function getColorOfProduct($type_product_id)
    {
        $color = null;
        if (!empty($type_product_id)) {
            $product_detail_model = new Model_ProductDetail();
            $product = $product_detail_model->getItemDetail($type_product_id);
            $color = $product['color'];
        }
        return $color;
    }
}
