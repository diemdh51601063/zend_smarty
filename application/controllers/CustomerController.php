<?php

class CustomerController extends Zend_Controller_Action
{
    protected $_arrParam;

    public function init()
    {
        $this->_arrParam = $this->_request->getParams();
        $this->_arrParam = $this->filterInput($this->_arrParam);
        $this->view->arrParam = $this->_arrParam;
    }

    public function checkoutAction()
    {
        $order_model = new Model_Order();
        if ($this->_request->isPost()) {
            try {
                if (!empty($_SESSION['userSessionNamespace']['cart'])) {
                    $cart_data = $_SESSION['userSessionNamespace']['cart'];
                    $customer_id = $_SESSION['userSessionNamespace']['customer']['customer_id'];
                    $this->_arrParam['customer_id'] = $customer_id;
                    $new_order = $order_model->addItem($this->_arrParam);
                    if (isset($new_order['status']) && ($new_order['status'] === true)) {
                        $order_id = $new_order['order_id'];
                        $order_detail_model = new Model_OrderDetail();
                        $order_detail_model->addDetailOrder($order_id, $cart_data);
                        unset($_SESSION['userSessionNamespace']['cart']);
                        $data = array(
                            'status' => 'true'
                        );
                    } else {
                        $data = array(
                            'result' => $new_order
                        );
                    }
                    $this->_helper->json($data);
                }
            } catch (Exception $e) {
                //var_dump($e->getMessage());
            }
        }
    }


    public function registerAction()
    {
        $customer_model = new Model_Customer();
        if ($this->_request->isPost()) {
            try {
                if ($this->_arrParam['password'] !== $this->_arrParam['confirm_password']) {
                    $data = array(
                        'status' => false,
                        'message_pw' => "* Mật khẩu không trùng khớp !!!!"
                    );
                } else {
                    $register = $customer_model->registerUser($this->_arrParam);
                    if (isset($register['status']) && ($register['status'] === true)) {
                        $_SESSION['userSessionNamespace']['customer'] = $register['customer'];
                        $data = array(
                            'status' => 'true'
                        );
                    } else {
                        $data = array(
                            'result' => $register
                        );
                    }
                }

                $this->_helper->json($data);
            } catch (Exception $e) {
                // var_dump($e->getMessage());
            }
        }
    }

    public function filterInput($arrParam)
    {
        $param_filter = array_fill_keys(
            array('first_name', 'last_name', 'address', 'city_name', 'district_name', 'ward_name'),
            null
        );
        // preg_replace("/[^a-z0-9A-Z_\x{00C0}-\x{00FF}\x{1EA0}-\x{1EFF}]/u","")
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
        return array(
            'product_id' => $product_id,
            'price' => $product_detail['price'],
            'image' => $image_product,
            'type_product_id' => $type_product_id,
            'type_product_color' => $type_product_color,
            'name' => $product_detail['name'],
            'number_product' => $number_product
        );
    }

    public function changeAction()
    {
        $customer_model = new Model_Customer();
        if ($this->_request->isPost()) {
            try {
                $check_account = $customer_model->checkCustomerExist($this->_arrParam);
                if (!empty($check_account['error_input'])) {
                    $data = array(
                        'result' => $check_account['error_input']
                    );
                } else {
                    $data = array(
                        'customer_id' => $check_account['id_exist']
                    );
                }
                $this->_helper->json($data);
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }

    public function repassAction()
    {
        $customer_model = new Model_Customer();
        if ($this->_request->isPost()) {
            $update_password = $customer_model->updateItem($this->_arrParam);
            $data = array(
                'result' => $update_password
            );
            $this->_helper->json($data);
        }
    }

    public function searchAction()
    {
        $product_model = new Model_Product();
        if ($this->_request->isPost()) {
            try {
                $search_result = $product_model->searchItem($this->_arrParam);
                foreach ($search_result as $key => $product) {
                    $product_image_model = new Model_ProductImage();
                    $list_image = $product_image_model->getListImageOfProduct($product['id']);
                    if (count($list_image) > 0) {
                        $search_result[$key]['image'] = $list_image[0]['image'];
                    }
                }
                $data = $search_result;
                $this->_helper->json($data);
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }

}
