<?php

class CategoryController extends Zend_Controller_Action
{
    protected $_arrParam;
    protected $_currentController;
    protected $_actionMain;

    public function init()
    {
        $this->_helper->layout->setLayout('layout_admin');

        $this->_arrParam = $this->_request->getParams();
        $this->_currentController = '/' . $this->_arrParam['controller'];
        $this->_actionMain = '/' . $this->_arrParam['controller'] . '/index';
    }


    public function addAction()
    {

        $title = 'Thêm Danh Mục';
        $this->view->assign('title', $title);
        // $model = new Model_Category();
        // $add = $model->addItem($this->_arrParam);
        // return $add;
    }

    public function updateAction()
    {
        $model = new Model_Category();
        $update = $model->addItem($this->_arrParam);
        return $update;
    } 
}
