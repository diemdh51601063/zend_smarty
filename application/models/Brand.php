<?php

class Model_Brand extends Zend_Db_Table
{
    protected $_name = 'brands';
    protected $_primary = 'id';

    protected $_filter = null;
    protected $_validate = null;
    protected $_option = null;

    public function init()
    {
        $this->_filter = array(
            'id' => array('Int')
        );

        $this->_validate = array(
            'brand_name' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_Alnum(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập tên thương hiệu !!!'
                    ),
                    array(
                        Zend_Validate_Alnum::NOT_ALNUM => '* Vui lòng nhập tên thương hiệu hợp lệ !!!'
                    )
                )
            ),
            'description' => array(
                new Zend_Validate_Alnum(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_Alnum::NOT_ALNUM => '* Vui lòng nhập mô tả thương hiệu hợp lệ !!!'
                    )
                )
            ),

        );
    }

    public function getItem($id)
    {
        $where = 'id = ' . $id;
        $detail = $this->fetchRow($where);
        return $detail;
    }

    public function getListItem()
    {
        $list_result = $this->fetchAll()->toArray();
        return $list_result;
    }

    public function addItem($arrParam)
    {
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arrParam, $this->_option);

        $result = null;

        if ($input->isValid()) {
            $row = $this->createRow($arrParam);
            $row->save();
            $result = true;
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
            $row->brand_name = $arrParam['brand_name'];
            $row->image = $arrParam['image'];
            $row->description = $arrParam['description'];
            $row->admin_id = $arrParam['admin_id'];
            $row->update_date = date('Y-m-d H:i:s');
            $row->save();
            $result = true;
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
        $row->update_date = date('Y-m-d H:i:s');
        $row->save();
    }
}
