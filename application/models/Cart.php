<?php
class Model_Cart extends Zend_Db_Table
{
    protected $_name = 'customers_cart';
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
            'customer_id' => array(
                new Zend_Validate_Db_RecordExists(
                    array(
                        'table' => 'customers',
                        'field' => 'id'
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_Db_RecordExists::ERROR_NO_RECORD_FOUND => '* ID khách hàng không hợp lệ !!!'
                    )
                )
            )
        );
    }

    public function createCustomerCart($customer_id)
    {
        $result = null;
        $input_param = array(
            'customer_id' => $customer_id
        );
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $input_param, $this->_option);
        if ($input->isValid()) {
            $new_cart = $this->createRow($input_param);
            $new_cart->save();
            $result['status'] = true;
            $result['cart_id'] = $new_cart['id'];
        } else {
            if ($input->hasInvalid() || $input->hasMissing()) {
                $messages = $input->getMessages();
                $result = $messages;
            }
        }
        return $result;
    }

    public function getCustomerCart($customer_id)
    {
        $where = "customer_id = " . $customer_id;
        $cart = $this->fetchRow($where);
        $cart_id = null;
        if (!empty($cart['id'])) {
            if ($cart['status'] == 0) {
                $cart->update_date = date('Y-m-d H:i:s');
                $cart->status = 1;
                $cart->save();
            }
            $cart_id = $cart['id'];
        } else {
            $new_cart = $this->createCustomerCart($customer_id);
            $cart_id = $new_cart['cart_id'];
        }
        return $cart_id;
    }
}
