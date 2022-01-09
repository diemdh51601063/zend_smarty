<?php
class Model_ProductDetail extends Zend_Db_Table{
    protected $_name = 'product_details';
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

    public function addItem($arrParam){
        $row = $this->createRow($arrParam);
        $row->save();
        return $row;
    }

    public function deleteItem($arrParam){
        $where = 'id = '.$arrParam['id'];
        $this->delete($where);
    }

    public function getListDetailOfProduct($product_id){
        $where = 'product_id = '.$product_id;
        $list = $this->fetchAll($where)->toArray();
        return $list;
    }

    public function editItem($arrParam){
        $where = 'id = '.$arrParam['id'];
        $row = $this->fetchRow($where);
        $row->update_date = date('Y-m-d H:i:s');
        $row->save();
    }
}