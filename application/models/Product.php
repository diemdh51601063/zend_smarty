<?php
class Model_Product extends Zend_Db_Table{
    protected $_name = 'actor';
    protected $_primary = 'actor_id';

    public function test(){
        echo '<br>'.__METHOD__;
        echo '<br> Model';
    }

    public function getItem(){

    }

    public function getListItem(){
        $where = 'actor_id < 50';
        $order = 'actor_id ASC';
        $list_result = $this->fetchAll($where, $order)->toArray();
        return $list_result;
    }
}