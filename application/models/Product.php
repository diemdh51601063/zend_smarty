<?php
class Model_Product extends Zend_Db_Table{
    protected $_name = 'products';
    protected $_primary = 'id';

    public function getListItem(){
        $list_result = $this->fetchAll()->toArray();
        return $list_result;
    }

    public function getItemDetail($arrParam){
        $where = 'actor_id = '.$arrParam['id'];
        $detail = $this->fetchRow($where);
        return $detail;
    }

    public function addItem($arrParam){
        $row = $this->fetchNew();
        $row->product_code = $arrParam['product_code'];
        $row->name = $arrParam['name'];
        $row->brand_id = $arrParam['brand_id'];
        $row->category_id = $arrParam['category_id'];
        $row->price = $arrParam['price'];
        $row->description = $arrParam['description'];
        $row->quantily = $arrParam['quantily'];
        $row->admin_id = $arrParam['name'];
        $row->warranty_id = $arrParam['warranty_id'];
        $row->status = $arrParam['status'];
        $row->admin_id = $arrParam['admin_id'];
        $row->save();
    }

    public function editItem($arrParam){
        $where = 'actor_id = '.$arrParam['id'];
        $row = $this->fetchRow($where);
        $row->product_code = $arrParam['product_code'];
        $row->name = $arrParam['name'];
        $row->brand_id = $arrParam['brand_id'];
        $row->category_id = $arrParam['category_id'];
        $row->price = $arrParam['price'];
        $row->description = $arrParam['description'];
        $row->quantily = $arrParam['quantily'];
        $row->admin_id = $arrParam['name'];
        $row->warranty_id = $arrParam['warranty_id'];
        $row->admin_id = $arrParam['admin_id'];
        $row->status = $arrParam['status'];
        $row->update_date = date('Y-m-d H:i:s');
        $row->save();
    }

    public function deleteItem($arrParam){
        $where = 'id = '.$arrParam['id'];
        $row = $this->fetchRow($where);
        $row->status = 0;
        $row->update_date = date('Y-m-d H:i:s');
        $row->save();
    }
}