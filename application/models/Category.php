<?php
class Model_Category extends Zend_Db_Table
{
    protected $_name = 'categories';
    protected $_primary = 'id';

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
        $row = $this->fetchNew();
        $row->category_name = $arrParam['category_name'];
        $row->admin_id = $arrParam['admin_id'];
        $row->save();
    }

    public function editItem($arrParam)
    {
        $where = 'id = ' . $arrParam['id'];
        $row = $this->fetchRow($where);
        $row->category_name = $arrParam['category_name'];
        $row->admin_id = $arrParam['admin_id'];
        $row->update_date = date('Y-m-d H:i:s');
        $row->save();
    }

    public function deleteItem($arrParam)
    {
        $where = 'id = ' . $arrParam['id'];
        $row = $this->fetchRow($where);
        $row->status = 0;
        $row->update_date = date('Y-m-d H:i:s');
        $row->save();
    }
}
