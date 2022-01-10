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
                $this->_arrParam['admin_id'] = $_SESSION['adminSessionNamespace']['admin']['id'];
                $category_model = new Model_Category();
                $add = $category_model->addItem($this->_arrParam);
                if($add === true){
                    $this->redirect('/admin/category');
                }else{
                    $this->view->assign('error_input', $add);
                    $this->view->assign('error_value', $this->_arrParam);
                }
                
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }

    public function updateAction()
    {
        $title = 'Cập Nhật Thông Tin Danh Mục';
        $category_model = new Model_Category();
        $detail_category = $category_model->getItem($this->_arrParam['id']);

        $this->view->assign('detail_category', $detail_category);
        $this->view->assign('title', $title);
        
        if ($this->_request->isPost()) {
            try {
                $this->_arrParam['admin_id'] = $_SESSION['adminSessionNamespace']['admin']['id'];
                
                $update = $category_model->editItem($this->_arrParam);
                if($update === true){
                    $this->redirect('/admin/category');
                }else{
                    $this->view->assign('error_input', $update);
                    $this->view->assign('error_value', $this->_arrParam);
                };
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }
}
