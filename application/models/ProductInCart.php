<?php
class Model_ProductInCart extends Zend_Db_Table
{
    protected $_name = 'cart_products';
    protected $_primary = 'id';

    protected $_filter = null;
    protected $_validate = null;
    protected $_option = null;


    public function init()
    {
        $this->_filter = array(
            'id' => array('Int'),
        );

        $this->_validate = array(
            'product_id' => array(
                new Zend_Validate_Db_RecordExists(
                    array(
                        'table' => 'products',
                        'field' => 'id'
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_Db_RecordExists::ERROR_NO_RECORD_FOUND => '* Vui lòng chọn sản phẩm hợp lệ !!!'
                    )
                )
            ),
            'product_detail_id' => array(
                new Zend_Validate_Db_RecordExists(
                    array(
                        'table' => 'product_details',
                        'field' => 'id'
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_Db_RecordExists::ERROR_NO_RECORD_FOUND => '* Vui lòng chọn phân loại sản phẩm hợp lệ !!!'
                    )
                )
            ),

        );
    }

    public function addProductInCart($add_product_cart_param)
    {
        $result = null;
        $add_product_cart_param['quantily'] = $add_product_cart_param['number_product'];
        unset($add_product_cart_param['number_product']);
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $add_product_cart_param, $this->_option);
        if ($input->isValid()) {
            $where_get_cart = '';
            if (empty($add_product_cart_param['type_product_id'])) {
                $where_get_cart = 'cart_id = ' . $add_product_cart_param['cart_id'] . ' AND product_id = ' . $add_product_cart_param['product_id'];
            } else {
                $where_get_cart = 'cart_id = ' . $add_product_cart_param['cart_id'] . ' AND product_id = ' . $add_product_cart_param['product_id'] . ' AND product_detail_id = ' . $add_product_cart_param['type_product_id'];
            }
            $add = null;
            $product_in_cart = $this->fetchRow($where_get_cart);
            if (!empty($product_in_cart->id)) {
                $product_in_cart->quantily = $add_product_cart_param['quantily'] + $product_in_cart->quantily;
                $product_in_cart->update_date = date('Y-m-d H:i:s');
                $product_in_cart->save();
                $add = $product_in_cart;
            } else {
                $new_product_in_cart = $this->createRow($add_product_cart_param);
                $new_product_in_cart->save();
                $add = $new_product_in_cart;
            }
            $result['status'] = true;
            $result['cart_item'] = $add;
        } else {
            if ($input->hasInvalid() || $input->hasMissing()) {
                $messages = $input->getMessages();
                $result = $messages;
            }
        }
        return $result;
    }

    public function deleteProductInCartUser($delete_param)
    {
        $where = 'product_id = ' . $delete_param['product_id'] . ' AND cart_id = ' . $delete_param['cart_id'];
        if (!empty($delete_param['type_product_id'])) {
            $where = $where . ' AND product_detail_id = ' . $delete_param['type_product_id'];
        }
        $this->delete($where);
    }

    public function getAllProductInCart($cart_id)
    {
        /*$sql= "SELECT product_id, quantily as number_product, product_detail_id FROM cart_products WHERE cart_id = ". $cart_id;
        $db = $this->getDefaultAdapter();
        $db->setFetchMode(Zend_Db::FETCH_OBJ);
        $product_in_cart = $db->query($sql)->fetchAll();
        foreach($product_in_cart as $index=> $product){
            if($product->product_detail_id != NULL){
                $sql_detail = "SELECT color FROM product_details WHERE product_details.id = ". $product->product_detail_id;
                $query = $db->query($sql_detail)->fetchObject();
                $product_in_cart[$index]->color = $query->color;
            }
        }
        return $product_in_cart;*/
        $where = "cart_id = " . $cart_id;
        $result = $this->fetchAll($where)->toArray();
        return $result;
    }
}
