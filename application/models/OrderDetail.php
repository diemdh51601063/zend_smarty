<?php
class Model_OrderDetail extends Zend_Db_Table{
    protected $_name = 'order_details';
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
        $row->update_date = date('Y-m-d H:i:s');
        $row->save();
    }
}