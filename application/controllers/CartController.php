<?php

class CartController extends Zend_Controller_Action
{
    protected $_arrParam;

    public function init()
    {
        $this->_arrParam = $this->_request->getParams();
    }

    public function addAction()
    {
        $product_id = $this->_arrParam['product_id'];
        $number_product = $this->_arrParam['number_product'];
        $type_product_id = $this->_arrParam['type_product_id'];
        $cart_data = [];
        if (empty($_SESSION['userSessionNamespace']['cart'])) {
            $cart_data[] = $this->addProductToCart($product_id, $type_product_id, $number_product);
        } else {
            $cart_data = array_values($_SESSION['userSessionNamespace']['cart']);
            if (empty($type_product_id)) {
                $key = array_search($product_id, array_column($cart_data, 'product_id'));
                if (($key !== false) && ($cart_data[$key]['type_product_id'] === '')) {
                    $cart_data[$key]['number_product'] += $number_product;
                } else {
                    $cart_data[] = $this->addProductToCart($product_id, $type_product_id, $number_product);
                }
            } else {
                $key = array_search($type_product_id, array_column($cart_data, 'type_product_id'));
                if ($key !== false) {
                    $cart_data[$key]['number_product'] += $number_product;
                } else {
                    $cart_data[] = $this->addProductToCart($product_id, $type_product_id, $number_product);
                }
            }
        }
        $_SESSION['userSessionNamespace']['cart'] = $cart_data;
        $data = array(
            'result' => $_SESSION['userSessionNamespace']['cart']
        );
        $this->_helper->json($data);
    }

    public function deleteAction()
    {
        $delete_id = $this->_arrParam['cart_item_id'];
        $cart_session = $_SESSION['userSessionNamespace'];

        if (isset($cart_session['cart'][$delete_id])) {
            try {
                unset($cart_session['cart'][$delete_id]);
                $cart_session['cart'] = array_values($cart_session['cart']);
                $_SESSION['userSessionNamespace']['cart'] = $cart_session['cart'];
            } catch (Exception $e) {
                //var_dump($e);
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
                if (!empty($_SESSION['userSessionNamespace']['cart'])) {
                    $cart_data = $_SESSION['userSessionNamespace']['cart'];
                    $customer_id = $_SESSION['userSessionNamespace']['customer']['id'];
                    $this->_arrParam['customer_id'] = $customer_id;
                    $new_order = $order_model->addItem($this->_arrParam);
                    if (isset($new_order['status']) && ($new_order['status'] === true)) {
                        $order_id = $new_order['order_id'];
                        $order_detail_model = new Model_OrderDetail();
                        $order_detail_model->addDetailOrder($order_id, $cart_data);

                        unset($_SESSION['userSessionNamespace']['cart']);
                        $data = array(
                            'message' => 'true'
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

    public function addProductToCart($product_id, $type_product_id, $number_product)
    {
        $product_model = new Model_Product();
        $product_image_model = new Model_ProductImage();
        $product_type_detail_model = new Model_ProductDetail();
        $product_detail = $product_model->getItemDetail($product_id);
        $type_product_color = '';
        $price = $product_detail['price'];
        if (!empty($type_product_id)) {
            $type_product_detail = $product_type_detail_model->getItemDetail(array('id' => $type_product_id));
            $type_product_color = $type_product_detail['color'];
            $price = $type_product_detail['price'];
        }
        $image_product = null;
        $list_image = $product_image_model->getListImageOfProduct($product_id);
        if (!empty($list_image)) {
            $image_product = $list_image[0]['image'];
        }
        return array(
            'product_id' => $product_id,
            'price' => $price,
            'image' => $image_product,
            'type_product_id' => $type_product_id,
            'type_product_color' => $type_product_color,
            'name' => $product_detail['name'],
            'number_product' => $number_product
        );
    }

}
