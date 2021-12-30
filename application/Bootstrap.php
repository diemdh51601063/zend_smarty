<?php
//require_once './library/Ext/View/Smarty.php';
//require_once './library/Zend/Controller/Action/HelperBroker.php';

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload()
    {
        $arrConfig = array(
            'namespace' => '',
            'basePath' => APPLICATION_PATH,
        );
        $autoload = new Zend_Application_Module_Autoloader($arrConfig);
        return $autoload;
    }
}
