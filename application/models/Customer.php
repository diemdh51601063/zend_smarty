<?php
class Model_Customer extends Zend_Db_Table{
    protected $_name = 'customers';
    protected $_primary = 'id';

    public function logIn($login_name, $password){
        $where = "login_name = '".$login_name."' AND password ='".$password."'";
        $admin = $this->fetchRow($where);
        return $admin;
    }

}