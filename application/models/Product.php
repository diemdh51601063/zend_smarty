<?php
class Model_Product extends Zend_Db_Table{
    protected $_name = 'products';
    protected $_primary = 'id';

    public function getListItem(){

        $list_result = $this->fetchAll()->toArray();
        return $list_result;
    }

    public function getItemDetail($id){
        $where = 'id = '.$id;
        $detail = $this->fetchRow($where);
        return $detail;
    }

    public function addItem($arrParam){
        /*$row = $this->fetchNew();
        $row->product_code = $arrParam['product_code'];
        $row->name = $arrParam['product_name'];
        $row->brand_id = $arrParam['brand_id'];
        $row->category_id = $arrParam['category_id'];
        $row->price = $arrParam['price'];
        $row->description = $arrParam['product_description'];
        $row->quantily = $arrParam['quantily'];
        $row->charging_port = $arrParam['charging_port'];
        $row->size = $arrParam['size'];
        $row->weight = $arrParam['weight'];
        $row->jack = $arrParam['jack'];
        $row->length = $arrParam['length'];
        $row->control = $arrParam['control'];
        $row->compatible = $arrParam['compatible'];
        //$row->warranty_id = $arrParam['warranty_id'];
        $row->admin_id = $arrParam['admin_id'];*/
        $row = $this->createRow($arrParam);
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
        $row->description = $arrParam['description'];
        $row->quantily = $arrParam['quantily'];
        $row->admin_id = $arrParam['admin_id'];
        $row->charging_port = $arrParam['charging_port'];
        $row->size = $arrParam['size'];
        $row->weight = $arrParam['weight'];
        $row->jack = $arrParam['jack'];
        $row->length = $arrParam['length'];
        $row->control = $arrParam['control'];
        $row->compatible = $arrParam['compatible'];
       // $row->setFromArray($arrParam);
        $row->update_date = date('Y-m-d H:i:s');
        $row->save();
    }

    public function hideItem($arrParam){
        $where = 'id = '.$arrParam['id'];
        $row = $this->fetchRow($where);
        $row->status = $arrParam['status'];
        $row->update_date = date('Y-m-d H:i:s');
        $row->save();
        return $row;
    }
}