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

    public function addProductInCart($arrParam)
    {
        $result = null;
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arrParam, $this->_option);
        if ($input->isValid()) {
            $where_get_cart = '';
            if(empty($arrParam['product_detail_id'])){
                $where_get_cart = 'cart_id = '.$arrParam['id'].' AND product_id = '.$arrParam['product_id'];
            }else{
                $where_get_cart = 'cart_id = '.$arrParam['id'].' AND product_id = '.$arrParam['product_id'].' AND product_detail_id = '.$arrParam['type_id'];
            }
            $add = null;
            $product_in_cart = $this->fetchRow($where_get_cart);
            if(!empty($product_in_cart->id)){
                $product_in_cart->quantily = $arrParam['number_product'] + $product_in_cart->quantily;
                $product_in_cart->update_date = date('Y-m-d H:i:s');
                $product_in_cart->save();
                $add = $product_in_cart;
            }else{
                $new_product_in_cart = $this->createRow($arrParam);
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

    public function deleteProductInCartUser($arrParam)
    {
        $where = 'id = ' . $arrParam['id'];
        $this->delete($where);
    }

    public function deleteListItem($list)
    {
        if (!empty($list)) {
            foreach ($list as $image_id) {
                $where = 'id = ' . $image_id;
                $detail_image = $this->fetchRow($where);
                if ($detail_image['image'] !== "") {
                    $product_image = PRODUCT_IMAGE_PATH . '/' . $detail_image['image'];
                    if (file_exists($product_image)) {
                        unlink($product_image);
                    }
                }
                $this->delete($where);
            }
        }
    }
}