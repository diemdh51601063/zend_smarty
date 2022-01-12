<?php
class Model_Category extends Zend_Db_Table
{
    protected $_name = 'categories';
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
            'category_name' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'min' => 2,
                        'max' => 30
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập tên danh mục !!!'
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => '* Tên danh mục tối đa 30 kí tự !!!'
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_SHORT => '* Tên danh mục tối thiểu 2 kí tự !!!'
                    )
                )
            )
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
            $row = $this->fetchNew();
            $row->category_name = $arrParam['category_name'];
            $row->admin_id = $arrParam['admin_id'];
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
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arrParam, $this->_option);

        $result = null;

        if ($input->isValid()) {
            $where = 'id = ' . $arrParam['id'];
            $row = $this->fetchRow($where);
            $row->category_name = $arrParam['category_name'];
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
        $check_fkey = $product->select()->where('category_id = ?', $id);
        $check = $product->fetchRow($check_fkey);
        if (!empty($check)) {
        } else {
            $where = 'id = ' . $id;
            $row = $this->fetchRow($where);
            if ($row->delete()) {
                $result = true;
            }
        }
        return $result;
    }
}
