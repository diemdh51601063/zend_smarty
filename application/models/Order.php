<?php
class Model_Order extends Zend_Db_Table{
    protected $_name = 'orders';
    protected $_primary = 'id';

    public function getListItem(){
        $list_result = $this->fetchAll()->toArray();
        return $list_result;
    }

    public function getItemDetail($arrParam){
        $where = 'id = '.$arrParam['id'];
        $detail = $this->fetchRow($where);
        return $detail;
    }

    public function editItem($arrParam){
        $where = 'id = '.$arrParam['id'];
        $row = $this->fetchRow($where);
        $row->status = $arrParam['status'];
        $row->confirm_admin_id = $arrParam['confirm_admin_id'];
        $row->confirm_date = date('Y-m-d H:i:s');
        $row->update_date = date('Y-m-d H:i:s');
        $row->save();
    }
}