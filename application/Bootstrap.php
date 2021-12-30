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

   /* protected function initView()
    {
        $front = Zend_Controller_Front::getInstance();
        $config_app = $this->getOptions();
        //var_dump($config_app['smarty']);
        $view = new Ext_View_Smarty($config_app['smarty']);

        $render = new Zend_Controller_Action_Helper_ViewRenderer($view);


        $render->setViewBasePathSpec(APPLICATION_PATH . '/smarty')
            ->setViewScriptPathSpec(':controller/:action.:suffix')
            ->setViewScriptPathNoControllerSpec(':action.:suffix')
            ->setViewSuffix('tpl');

        Zend_Controller_Action_HelperBroker::addHelper($render);

        $layout = Zend_Layout::startMvc(
            array(
                'layoutPath' => APPLICATION_PATH . '/smarty',
                'layout' => 'layout_admin',
                'contentKey' => 'content'
            )
        );

        $layout->setViewSuffix('tpl');
        $front->dispatch();
    }*/
}
