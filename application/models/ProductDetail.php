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
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập màu sắc phân loại !!!'
                    )
                )
            ),

            'product_id' => array(
                new Zend_Validate_Db_RecordExists(
                    array(
                        'table' => 'product',
                        'field' => 'id'
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_Db_RecordExists::ERROR_NO_RECORD_FOUND => '* Vui lòng chọn sản phẩm hợp lệ !!!'
                    )
                )
            ),

            'price' => array(
                new Zend_Validate_GreaterThan(array('min' => 0)),
                new Zend_Validate_Digits(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_GreaterThan::NOT_GREATER => '* Vui lòng nhập giá sản phẩm hợp lệ !!!',
                    ),
                    array(
                        Zend_Validate_Digits::NOT_DIGITS => '* Nhập số !!!'
                    )
                )
            ),

            'quantily' => array(
                new Zend_Validate_GreaterThan(array('min' => 0)),
                new Zend_Validate_Digits(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_GreaterThan::NOT_GREATER => '* Vui lòng nhập số lượng sản phẩm hợp lệ !!!',
                    ),
                    array(
                        Zend_Validate_Digits::NOT_DIGITS => '* Nhập số !!!'
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
        $row = $this->createRow($arrParam);
        $row->save();
        return $row;
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
        $row->update_date = date('Y-m-d H:i:s');
        $row->save();
    }
}
