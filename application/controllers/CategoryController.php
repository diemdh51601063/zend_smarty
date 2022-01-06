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

        $this->view->arrParam = $this->_arrParam;
        $this->view->currentController = $this->_currentController;
        $this->view->actionMain = $this->_actionMain;

        if(Zend_Session::sessionExists() == true){
            if(isset($_SESSION['adminSessionNamespace'])){
                $this->view->admin = $_SESSION['adminSessionNamespace']['admin'];
            }else{
                $this->redirect('/admin/login');
            }
        }
    }


    public function addAction()
    {
        $title = 'Thêm Danh Mục';
        $this->view->assign('title', $title);
        if ($this->_request->isPost()) {
            try {
                $this->_arrParam['admin_id'] = '1';
                $model = new Model_Category();
                $add = $model->addItem($this->_arrParam);
                $this->redirect('/admin/category');
            } catch (Exception $e) {
                var_dump($e->getMessage());
                //die;
            }
        }
    }

    public function updateAction()
    {
        $model = new Model_Category();
        $update = $model->addItem($this->_arrParam);
        return $update;
    }
}
