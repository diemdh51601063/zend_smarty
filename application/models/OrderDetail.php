<?php
class Model_OrderDetail extends Zend_Db_Table
{
    protected $_name = 'order_details';
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
            'order_id' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_Db_RecordExists(
                    array(
                        'table' => 'orders',
                        'field' => 'id'
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập đơn hàng !!!'
                    ),
                    array(
                        Zend_Validate_Db_RecordExists::ERROR_NO_RECORD_FOUND => '* Đơn hàng không tồn tại trong hệ thống !!!'
                    )
                )
            ),
            'product_id' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_Db_RecordExists(
                    array(
                        'table' => 'products',
                        'field' => 'id'
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập thông tin sản phẩm!!!'
                    ),
                    array(
                        Zend_Validate_Db_RecordExists::ERROR_NO_RECORD_FOUND => '* Sản phẩm không tồn tại trong hệ thống !!!'
                    )
                )
            ),
            'quantily' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_GreaterThan(array('min' => 0)),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập số lượng sản phẩm!!!'
                    ),
                    array(
                        Zend_Validate_GreaterThan::NOT_GREATER => '* Số lượng sản phẩm không nhỏ hơn 0!!!',
                    )
                )
            ),
            'price' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_GreaterThan(array('min' => 0)),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập số lượng sản phẩm!!!'
                    ),
                    array(
                        Zend_Validate_GreaterThan::NOT_GREATER => '* Số lượng sản phẩm không nhỏ hơn 0!!!',
                    )
                )
            )
        );
    }

    public function addDetailOrder($order_id, $list_product_in_cart)
    {
        $result = null;
        foreach ($list_product_in_cart as $product_in_cart) {
            $arr_param_add = array(
                'order_id' => $order_id,
                'product_id' => $product_in_cart['product_id'],
                'quantily' => $product_in_cart['number_product'],
                'price' => $product_in_cart['price'],
                'detail_product_id' => $product_in_cart['type_product_id'],
                'detail_product_color' => $product_in_cart['type_product_color']
            );
            $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arr_param_add, $this->_option);
            if ($input->isValid()) {
                $row = $this->createRow($arr_param_add);
                $row->save();
                $result['status'] = true;
                $result[] = $row['id'];
            } else {
                if ($input->hasInvalid() || $input->hasMissing()) {
                    $messages = $input->getMessages();
                    $result[] = $messages;
                }
            }
        }
        return $result;
    }

    public function getListItem($order_id)
    {
        $where = " id > 0";
        if(!empty($arrParam['order_id'])){
            $where = $where . " order_id = " . $order_id;
        }
        $list_result = $this->fetchAll($where)->toArray();
        return $list_result;
    }

    public function getItemDetail($arrParam)
    {
        $where = 'id = ' . $arrParam['id'];
        $detail = $this->fetchRow($where);
        return $detail;
    }

    public function editItem($arrParam)
    {
        $where = 'id = ' . $arrParam['id'];
        $row = $this->fetchRow($where);
        $row->status = $arrParam['status'];
        $row->update_date = date('Y-m-d H:i:s');
        $row->save();
    }
}
