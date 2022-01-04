<?php

class BrandController extends Zend_Controller_Action
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

        $this->view->arrParam = $this->_arrParam;
        $this->view->currentController = $this->_currentController;
        $this->view->actionMain = $this->_actionMain;
    }


    public function addAction()
    {
        $title = 'Thêm Thương Hiệu';
        $this->view->assign('title', $title);
        if ($this->_request->isPost()) {
            try {
                $this->_arrParam['admin_id'] = '1';
                $this->_arrParam['id'] = '3';
                $model = new Model_Brand();
                $model->addItem($this->_arrParam);
                $this->redirect('/admin/brand');
            } catch (Exception $e) {
                var_dump($e->getMessage());
                //die;
            }
        }
    }

    public function updateAction()
    {
        $title = 'Cập Nhật Thông Tin Thương Hiệu';
        $this->view->assign('title', $title);
    }

    public function detailAction()
    {
        $title = 'Thông Tin Chi Tiết Thương Hiệu';
        $this->view->assign('title', $title);
    }
}
