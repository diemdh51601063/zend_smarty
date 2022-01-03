<?php
class Model_Customer extends Zend_Db_Table{
    protected $_name = 'customers';
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

}