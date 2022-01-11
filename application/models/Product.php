<?php

class Model_Product extends Zend_Db_Table
{
    protected $_name = 'products';
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
            'name' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập tên sản phẩm !!!'
                    )
                )
            ),

            'category_id' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_Db_RecordExists(
                    array(
                        'table' => 'categories',
                        'field' => 'id'
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng chọn danh mục !!!'
                    ),
                    array(
                        Zend_Validate_Db_RecordExists::ERROR_NO_RECORD_FOUND => '* Vui lòng chọn đúng danh mục !!!'
                    )
                )
            ),

            'brand_id' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_Db_RecordExists(
                    array(
                        'table' => 'brands',
                        'field' => 'id'
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng chọn thương hiệu !!!'
                    ),
                    array(
                        Zend_Validate_Db_RecordExists::ERROR_NO_RECORD_FOUND => '* Vui lòng chọn đúng thương hiệu !!!'
                    )
                )
            ),

            'price' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_GreaterThan(array('min' => 0)),
                new Zend_Validate_Digits(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập giá sản phẩm !!!'
                    ),
                    array(
                        Zend_Validate_GreaterThan::NOT_GREATER => '* Vui lòng nhập giá sản phẩm hợp lệ !!!',
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
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập số lượng sản phẩm !!!'
                    ),
                    array(
                        Zend_Validate_GreaterThan::NOT_GREATER => '* Vui lòng nhập số lượng sản phẩm hợp lệ !!!',
                    ),
                    array(
                        Zend_Validate_Digits::NOT_DIGITS => '* Nhập số !!!'
                    )
                )
            ),

            'control' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng thông tin điều khiển (tương tác với sản phẩm) !!!'
                    )
                )
            ),

            'compatible' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng thông tin tương thích !!!'
                    )
                )
            ),

            'description' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng thông tin mô tả !!!'
                    )
                )
            ),
        );
    }

    public function getListItem()
    {
        $order = "id ASC";
        $list_result = $this->fetchAll(null, $order)->toArray();
        return $list_result;
    }

    public function getItemDetail($id)
    {
        $where = 'id = ' . $id;
        $detail = $this->fetchRow($where);
        return $detail;
    }

    public function addItem($arrParam)
    {
        /*$row = $this->fetchNew();
        $row->product_code = $arrParam['product_code'];
        $row->name = $arrParam['product_name'];
        $row->brand_id = $arrParam['brand_id'];
        $row->category_id = $arrParam['category_id'];
        $row->price = $arrParam['price'];
        $row->description = $arrParam['product_description'];
        $row->quantily = $arrParam['quantily'];
        $row->charging_port = $arrParam['charging_port'];
        $row->size = $arrParam['size'];
        $row->weight = $arrParam['weight'];
        $row->jack = $arrParam['jack'];
        $row->length = $arrParam['length'];
        $row->control = $arrParam['control'];
        $row->compatible = $arrParam['compatible'];
        //$row->warranty_id = $arrParam['warranty_id'];
        $row->admin_id = $arrParam['admin_id'];
        $row = $this->createRow($arrParam);
        $row->save();
        return $row;*/
        $result = null;
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arrParam, $this->_option);
        if ($input->isValid()) {
            $row = $this->createRow($arrParam);
            $row->save();
            $result['status'] = true;
            $result['product_id'] = $row['id'];
        } else {
            if ($input->hasInvalid() || $input->hasMissing()) {
                $messages = $input->getMessages();
                $result = $messages;
            }
        }
        return $result;
    }

    public function editItem($arrParam)
    {
        $result = null;
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arrParam, $this->_option);
        if ($input->isValid()) {
            $where = 'id = ' . $arrParam['id'];
            $row = $this->fetchRow($where);
            $row->product_code = $arrParam['product_code'];
            $row->name = $arrParam['name'];
            $row->brand_id = $arrParam['brand_id'];
            $row->category_id = $arrParam['category_id'];
            $row->price = $arrParam['price'];
            $row->description = $arrParam['description'];
            $row->quantily = $arrParam['quantily'];
            $row->admin_id = $arrParam['admin_id'];
            $row->charging_port = $arrParam['charging_port'];
            $row->size = $arrParam['size'];
            $row->weight = $arrParam['weight'];
            $row->jack = $arrParam['jack'];
            $row->length = $arrParam['length'];
            $row->control = $arrParam['control'];
            $row->compatible = $arrParam['compatible'];
            $row->update_date = date('Y-m-d H:i:s');
            $row->save();
            $result = $row;
        } else {
            if ($input->hasInvalid() || $input->hasMissing()) {
                $messages = $input->getMessages();
                $result = $messages;
            }
        }
        return $result;
    }

    public function hideItem($arrParam)
    {
        $where = 'id = ' . $arrParam['id'];
        $row = $this->fetchRow($where);
        $row->status = 0;
        $row->admin_id = $arrParam['admin_id'];
        $row->update_date = date('Y-m-d H:i:s');
        $row->save();
        return $row;
    }

    public function showItem($arrParam)
    {
        $where = 'id = ' . $arrParam['id'];
        $row = $this->fetchRow($where);
        $row->status = 1;
        $row->admin_id = $arrParam['admin_id'];
        $row->update_date = date('Y-m-d H:i:s');
        $row->save();
        return $row;
    }
}
