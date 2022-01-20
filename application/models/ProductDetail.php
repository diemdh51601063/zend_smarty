<?php

class Model_ProductDetail extends Zend_Db_Table
{
    protected $_name = 'product_details';
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
            'color' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'min' => 2,
                        'max' => 20
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập màu sắc phân loại sản phẩm!!!'
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => '* Màu sắc phân loại sản phẩm tối đa 30 kí tự !!!',
                        Zend_Validate_StringLength::TOO_SHORT => '* Màu sắc phân loại sản phẩm tối thiểu 2 kí tự !!!'
                    )
                )
            ),
            'price' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_GreaterThan(array('min' => 0)),
                new Zend_Validate_Digits(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập giá tiền của phân loại sản phẩm !!!'
                    ),
                    array(
                        Zend_Validate_GreaterThan::NOT_GREATER => '* Vui lòng nhập giá tiền của phân loại sản phẩm hợp lệ !!!',
                    ),
                    array(
                        Zend_Validate_Digits::NOT_DIGITS => '* Nhập số !!!'
                    )
                )
            ),

            'quantily' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_GreaterThan(array('min' => 0)),
                new Zend_Validate_Digits(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập số lượng của phân loại sản phẩm !!!'
                    ),
                    array(
                        Zend_Validate_GreaterThan::NOT_GREATER => '* Vui lòng nhập số lượng của phân loại sản phẩm hợp lệ !!!',
                    ),
                    array(
                        Zend_Validate_Digits::NOT_DIGITS => '* Nhập số !!!'
                    )
                )
            ),

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
            )
        );
    }


    public function getListItem()
    {
        $list_result = $this->fetchAll()->toArray();
        return $list_result;
    }

    public function getItemDetail($arrParam)
    {
        $where = 'id = ' . $arrParam['id'];
        $detail = $this->fetchRow($where);
        return $detail;
    }

    public function addItem($arrParam)
    {
        $result = null;
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arrParam, $this->_option);
        if ($input->isValid()) {
            $row = $this->createRow($arrParam);
            $row->save();
            $result['status'] = true;
            $result['product_detail_type_id'] = $row['id'];
        } else {
            if ($input->hasInvalid() || $input->hasMissing()) {
                $messages = $input->getMessages();
                $result = $messages;
            }
        }
        return $result;
    }

    public function deleteItem($arrParam)
    {
        $where = 'id = ' . $arrParam['id'];
        $this->delete($where);
    }

    public function getListDetailOfProduct($product_id)
    {
        $where = 'product_id = ' . $product_id;
        $list = $this->fetchAll($where)->toArray();
        return $list;
    }

    public function editItem($arrParam)
    {
        $where = 'id = ' . $arrParam['id'];
        $row = $this->fetchRow($where);
        if (!empty($arrParam['reduce'])) {
            $row->quantily = $row->quantily - $arrParam['reduce'];
        } else {
            $row->color = $arrParam['color'];
            $row->price = $arrParam['price'];
            $row->quantily = $arrParam['quantily'];
        }
        $row->update_date = date('Y-m-d H:i:s');
        $row->save();
    }
}
