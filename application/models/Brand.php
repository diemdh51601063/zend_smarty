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
            'id' => array('Int'),
            'brand_name' => array(
                new Zend_Filter_StripTags()
            )
        );

        $this->_validate = array(
            'brand_name' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'min' => 2,
                        'max' => 30
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập tên thương hiệu !!!'
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => '* Tên thương hiệu tối đa 30 kí tự !!!',
                        Zend_Validate_StringLength::TOO_SHORT => '* Tên thương hiệu tối thiểu 2 kí tự !!!'
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
        $order = "id ASC";
        $where = "status = 1";
        $list_result = $this->fetchAll($where, $order)->toArray();
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
            if (isset($arrParam['image'])) {
                $row->image = $arrParam['image'];
            }
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

    public function deleteItem($id)
    {
        $result = false;
        $product = new Model_Product();
        $check_fkey = $product->select()->where('brand_id = ?', $id);
        $check_product_in_brand = $product->fetchRow($check_fkey);
        $table = new Model_Product();
        /*$select = $table->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
            ->setIntegrityCheck(false);
        $select->where('bug_status = ?', 'NEW')
            ->join(
                'accounts',
                'accounts.account_name = bugs.reported_by',
                'account_name'
            )
            ->where('accounts.account_name = ?', 'Bob');

        $rows = $table->fetchAll($select);*/
        if (!empty($check_product_in_brand)) {
        } else {
            $where = 'id = ' . $id;
            $row = $this->fetchRow($where);
            if (!empty($row['image'])) {
                $brand_image = BRAND_IMAGE_PATH . '/' . $row['image'];
                if (file_exists($brand_image)) {
                    unlink($brand_image);
                }
            }
            if ($row->delete()) {
                $result = true;
            }
        }
        return $result;
    }
}
