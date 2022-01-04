<?php
class Model_Product extends Zend_Db_Table{
    protected $_name = 'products';
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
        $row = $this->fetchNew();
        $row->id = $arrParam['id'];
        $row->product_code = $arrParam['product_code'];
        $row->name = $arrParam['product_name'];
        $row->brand_id = $arrParam['brand_id'];
        $row->category_id = $arrParam['category_id'];
        $row->price = $arrParam['price'];
        $row->description = $arrParam['product_description'];
        $row->quantily = $arrParam['quantily'];
        //$row->warranty_id = $arrParam['warranty_id'];
        $row->admin_id = $arrParam['admin_id'];
        $row->save();
        return $row;
    }

    public function editItem($arrParam){
        $where = 'id = '.$arrParam['id'];
        $row = $this->fetchRow($where);
        $row->product_code = $arrParam['product_code'];
        $row->name = $arrParam['name'];
        $row->brand_id = $arrParam['brand_id'];
        $row->category_id = $arrParam['category_id'];
        $row->price = $arrParam['price'];
        $row->description = $arrParam['product_description'];
        $row->quantily = $arrParam['quantily'];
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