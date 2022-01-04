<?php
class Model_Brand extends Zend_Db_Table{
    protected $_name = 'brands';
    protected $_primary = 'id';

    public function getItem($id){
        $where = 'id = '.$id;
        $detail = $this->fetchRow($where);
        return $detail;
    }

    public function getListItem(){
        $list_result = $this->fetchAll()->toArray();
        return $list_result;
    }

    public function addItem($arrParam){
        $row = $this->fetchNew();
        $row->id = $arrParam['id'];
        $row->brand_name = $arrParam['brand_name'];
        $row->image = $arrParam['brand_image'];
        $row->description = $arrParam['brand_description'];
        $row->admin_id = $arrParam['admin_id'];
        $row->save();
    }

    public function editItem($arrParam){
        $where = 'id = '.$arrParam['id'];
        $row = $this->fetchRow($where);
        $row->brand_name = $arrParam['brand_name'];
        $row->image = $arrParam['image'];
        $row->description = $arrParam['description'];
        $row->admin_id = $arrParam['admin_id'];
        $row->last_update = date('Y-m-d H:i:s');
        $row->save();
    }

    public function deleteItem($arrParam){
        $where = 'id = '.$arrParam['id'];
        $row = $this->fetchRow($where);
        $row->status = 0;
        $row->last_update = date('Y-m-d H:i:s');
        $row->save();
    }
}