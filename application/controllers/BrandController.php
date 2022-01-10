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
        $title = 'Thêm Thương Hiệu';
        $this->view->assign('title', $title);

        if ($this->_request->isPost()) {
            try {
               $this->_arrParam['admin_id'] = $_SESSION['adminSessionNamespace']['admin']['id'];
                if ($_FILES["brand_image"]["name"] != "") {
                    $brand_image = $this->getUploadImages();
                    $this->_arrParam['brand_image'] = $brand_image;
                }
                $model = new Model_Brand();
                $add = $model->addItem($this->_arrParam);
                //var_dump($add);
                //die;
                if($add === true){
                    $this->redirect('/admin/brand');
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
        $brand_model = new Model_Brand();
        $detail_brand = $brand_model->getItem($this->_arrParam['id']);
        $title = 'Cập Nhật Thông Tin Thương Hiệu';
        $this->view->assign('title', $title);
        $this->view->assign('detail_brand', $detail_brand);
        if ($this->_request->isPost()) {
            try {
                $this->_arrParam['admin_id'] = $_SESSION['adminSessionNamespace']['admin']['id'];
                if ($_FILES["brand_image"]["name"] != "") {
                    $brand_image = $this->getUploadImages();
                    $this->_arrParam['brand_image'] = $brand_image;
                }

                $update = $brand_model->editItem($this->_arrParam);
                if(empty($update['id'])){
                    $this->view->assign('error_input', $update);
                    $this->view->assign('error_value', $this->_arrParam);
                }else{
                    $this->redirect('/admin/brand');
                }
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }

    public function detailAction()
    {
        $title = 'Thông Tin Chi Tiết Thương Hiệu';
        $this->view->assign('title', $title);
    }

    public function getUploadImages()
    {
        $brand_image = null;
        $file_adapter = new Zend_File_Transfer_Adapter_Http();
        $path = BRAND_IMAGE_PATH;
        $file_adapter->setDestination($path);
        $list_photo = $file_adapter->getFileInfo();
        foreach ($list_photo as $key => $fileInfo) {
            $path_info = pathinfo($fileInfo['name']);
            $file_name = $path_info['filename'];
            $ext = $path_info['extension'];
            try {
                $file_adapter->addValidator('Extension', false, array('extension' => 'jpg,gif,png', 'case' => true));
                //overwriting file name
                $new_name = md5(rand()) . '-' . $file_name . '.' . $ext;
                //Add rename filter
                $file_adapter->addFilter('Rename', $path . '/' . $new_name);
                $brand_image = $new_name;
            } catch (Zend_File_Transfer_Exception $e) {
                die($e->getMessage());
            }
            try {
                //Store
                $file_adapter->receive($fileInfo['name']);
            } catch (Zend_File_Transfer_Exception $e) {
                //die($e->getMessage());
            }
        }
        return $brand_image;
    }
}
