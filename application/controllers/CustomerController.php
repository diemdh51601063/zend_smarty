<?php

class CustomerController extends Zend_Controller_Action
{
    protected $_arrParam;
    protected $_currentController;
    protected $_actionMain;


    public function init()
    {
        $this->_helper->layout->setLayout('layout_user');

        $this->_arrParam = $this->_request->getParams();
        $this->_currentController = '/' . $this->_arrParam['controller'];
        $this->_actionMain = '/' . $this->_arrParam['controller'] . '/index';

        $this->_arrParam = $this->filterInput($this->_arrParam);

        $this->view->arrParam = $this->_arrParam;
        $this->view->currentController = $this->_currentController;
        $this->view->actionMain = $this->_actionMain;
    }

    public function indexAction()
    {
        $list_product = [];
        try {
            $product_model = new Model_Product();
            $list_product = $product_model->getListItem();
            foreach ($list_product as $key => $product) {
                $product_image_model = new Model_ProductImage();
                $list_product[$key]['list_image'] = $product_image_model->getListImageOfProduct($product['id']);
            }
        } catch (Exception $e) {
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
    }

    public function addcartAction()
    {
        $product_id = $this->_arrParam['product_id'];
        $number_product = $this->_arrParam['number_product'];

        if (!empty($_SESSION['userSessionNamespace']['customer']['id'])) {
            $customer_id = $_SESSION['userSessionNamespace']['customer']['id'];
            $customer_cart_model = new Model_Cart();
            $product_in_cart_model = new Model_ProductInCart();
            $this->_arrParam['cart_id'] = $customer_cart_model->getCustomerCart($customer_id);
            $product_in_cart_model->addProductInCart($this->_arrParam);
        }
        if (!empty($_SESSION['userSessionNamespace']['cart'])) {
            $key_type_id = '';
            $key_product_id = '';
            var_dump($_SESSION['userSessionNamespace']['cart']);

            foreach ($_SESSION['userSessionNamespace']['cart'] as $key => $value) {
                if ($this->_arrParam['type_product_id'] !== '') {
                    if (($value['type_product_id'] == $this->_arrParam['type_product_id']) && ($value['product_id'] == $product_id)) {
                        $key_type_id = $key;
                    }
                } else {
                    if (empty($this->_arrParam['type_product_id'])) {
                        if ($value['product_id'] == $product_id) {
                            $key_product_id = $key;
                        }
                    }
                }
            }

            if (!empty($key_type_id)) {
                $_SESSION['userSessionNamespace']['cart'][$key_type_id]['number_product'] += $number_product;
            } else {
                if (!empty($key_product_id)) {
                    $_SESSION['userSessionNamespace']['cart'][$key_product_id]['number_product'] += $number_product;
                } else {
                    $this->addProductToCart($product_id, $this->_arrParam['type_product_id'], $number_product);
                }
            }
            var_dump($_SESSION['userSessionNamespace']['cart']);
            die;
        } else {
            $this->addProductToCart($product_id, $this->_arrParam['type_product_id'], $number_product);
        }
        $data = array(
            'result' => $_SESSION['userSessionNamespace']['cart']
        );
        $this->_helper->json($data);
    }

    public function delcartAction()
    {
        $delete_id = $this->_arrParam['cart_item_id'];
        if (!empty($_SESSION['userSessionNamespace']['cart'][$delete_id])) {
            try {
                $delete_item = $_SESSION['userSessionNamespace']['cart'][$delete_id];
                if (!empty($_SESSION['userSessionNamespace']['customer'])) {
                    $customer_id = $_SESSION['userSessionNamespace']['customer']['id'];
                    $customer_cart_model = new Model_Cart();
                    $delete_item['cart_id'] = $customer_cart_model->getCustomerCart($customer_id);
                    $product_cart_model = new Model_ProductInCart();
                    $product_cart_model->deleteProductInCartUser($delete_item);
                }
                unset($_SESSION['userSessionNamespace']['cart'][$delete_id]);
            } catch (Exception $e) {
                var_dump($e);
            }
        }

        $data = array(
            'result' => $_SESSION['userSessionNamespace']['cart']
        );
        $this->_helper->json($data);
    }

    public function checkoutAction()
    {
        $order_model = new Model_Order();
        if ($this->_request->isPost()) {
            try {
                $customer_id = $_SESSION['userSessionNamespace']['customer']['id'];
                $this->_arrParam['customer_id'] = $customer_id;
                $new_order = $order_model->addItem($this->_arrParam);
                if (isset($new_order['status']) && ($new_order['status'] === true)) {
                    $order_id = $new_order['order_id'];
                    $order_detail_model = new Model_OrderDetail();
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
                                'name' => $this->getDetailOfProduct($item['product_id'])['name'],
                                'number_product' => $item['quantily'],
                                'cart_id' => $cart_id
                            );
                            $list_product_in_cart[] = $product;
                        }
                    }
                    $order_detail_model->addDetailOrder($order_id, $list_product_in_cart);
                    unset($_SESSION['userSessionNamespace']['cart']);
                    $data = array(
                        'mess' => 'true'
                    );
                } else {
                    $data = array(
                        'result' => $new_order
                    );
                }
                $this->_helper->json($data);
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }


    public function registerAction()
    {
        $customer_model = new Model_Customer();
        if ($this->_request->isPost()) {
            try {
                $check_mail_exist = $customer_model->checkExistEmail($this->_arrParam['email']);
                $check_phone_exist = $customer_model->checkExistPhone($this->_arrParam['phone']);
                if ((empty($check_mail_exist)) && (empty($check_phone_exist))) {
                    $usernameValidator = new Zend_Validate_Regex('/^[a-zA-Z0-9_!@#$&*\/]+$/');
                    if (!$usernameValidator->isValid($this->_arrParam['password'])) {
                        $data = array(
                            'result' => false,
                            'message_pw' => "* Mật khẩu chỉ bao gồm chữ không dấu, số và các kí tự: @, #, $, &, !, _ , /, \ !!!!"
                        );
                    } else {
                        $register = $customer_model->registerUser($this->_arrParam);
                        if (isset($register['status']) && ($register['status'] === true)) {
                            $_SESSION['userSessionNamespace']['customer']['id'] = $register['customer_id'];
                            $data = $register;
                        }
                        $data = array(
                            'result' => $register
                        );
                    }
                } else {
                    $data = array(
                        'result' => false
                    );
                    if (!empty($check_mail_exist)) {
                        $data['message_email'] = "* Email đã được đăng ký !!!!";
                    }
                    if (!empty($check_phone_exist)) {
                        $data['message_phone'] = "* Số điện thoại đã được đăng ký !!!!";
                    }
                }
                $this->_helper->json($data);
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }

    public function filterInput($arrParam)
    {
        $param_filter = array_fill_keys(
            array('first_name', 'last_name', 'address', 'city_name', 'district_name', 'ward_name'),
            null
        );
        $filter = new Zend_Filter_StripTags();
        foreach ($arrParam as $key => $value) {
            if (array_key_exists($key, $param_filter)) {
                $arrParam[$key] = $filter->filter($arrParam[$key]);
                $arrParam[$key] = preg_replace(
                    "/[^a-z0-9A-Z_[:space:]ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂ ưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/u",
                    "",
                    $arrParam[$key]
                );
            }
        }
        return $arrParam;
    }


    public function addProductToCart($product_id, $type_product_id, $number_product)
    {
        $product_model = new Model_Product();
        $product_image_model = new Model_ProductImage();
        $product_type_detail_model = new Model_ProductDetail();
        $product_detail = $product_model->getItemDetail($product_id);
        $type_product_color = '';
        if (!empty($type_product_id)) {
            $type_product_detail = $product_type_detail_model->getItemDetail(array('id' => $type_product_id));
            $type_product_color = $type_product_detail['color'];
        }
        $image_product = null;
        $list_image = $product_image_model->getListImageOfProduct($product_id);
        if (!empty($list_image)) {
            $image_product = $list_image[0]['image'];
        }
        $count = 0;
        if (empty($_SESSION['userSessionNamespace']['cart'])) {
            $count = 0;
        } else {
            $count = count($_SESSION['userSessionNamespace']['cart']) + 1;
        }

        $product = array(
            'id' => $count,
            'product_id' => $product_id,
            'price' => $product_detail['price'],
            'image' => $image_product,
            'type_product_id' => $type_product_id,
            'type_product_color' => $type_product_color,
            'name' => $product_detail['name'],
            'number_product' => $number_product
        );

        $_SESSION['userSessionNamespace']['cart'][$count] = $product;
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

    public function searchAction()
    {
        $product_model = new Model_Product();
        if ($this->_request->isPost()) {
            try {
                $search_result = $product_model->searchItem($this->_arrParam);
//                echo"<pre>";
//                print_r($search_result);
//                echo"</pre>";
//                die;
                $data = $search_result;
                $this->_helper->json($data);
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }
}
