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

        if (Zend_Session::sessionExists() == true) {
            if (isset($_SESSION['adminSessionNamespace'])) {
                $this->view->admin = $_SESSION['adminSessionNamespace']['admin'];
            } else {
                $this->redirect('/admin/login');
            }
        }
    }


    public function addAction()
    {
        $title = 'Thêm Thương Hiệu';
        $this->view->assign('title', $title);

        if ($this->_request->isPost()) {
            $filter = new Zend_Filter_StripTags();
            $this->_arrParam['brand_name'] = $filter->filter( $this->_arrParam['brand_name']);
            $this->_arrParam['description'] = $filter->filter( $this->_arrParam['description']);
            try {
                $this->_arrParam['admin_id'] = $_SESSION['adminSessionNamespace']['admin']['id'];
                $brand_image = null;
                $upload_image = true;
                if ($_FILES["brand_image"]["name"] != "") {
                    $brand_image = $this->getUploadImages();
                    if($brand_image['status'] === false){
                        $upload_image = false;
                    }else{
                        $this->_arrParam['image'] = $brand_image[0];
                    }
                }
                if($upload_image === true){
                    $model = new Model_Brand();
                    $add = $model->addItem($this->_arrParam);
                    if ($add === true) {
                        $this->redirect('/admin/brand');
                    } else {
                        $this->view->assign('error_input', $add);
                        $this->view->assign('error_value', $this->_arrParam);
                    }
                }else{
                    $this->view->assign('error_image', $brand_image['error']);
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
            $filter = new Zend_Filter_StripTags();
            $this->_arrParam['brand_name'] = $filter->filter( $this->_arrParam['brand_name']);
            $this->_arrParam['description'] = $filter->filter( $this->_arrParam['description']);
            try {
                $this->_arrParam['admin_id'] = $_SESSION['adminSessionNamespace']['admin']['id'];
                if ((isset($_FILES["brand_image"])) && (!empty($_FILES["brand_image"]["name"]))) {
                    if (!empty($detail_brand['image'])) {
                        $brand_image = BRAND_IMAGE_PATH . '/' . $detail_brand['image'];
                        if (file_exists($brand_image)) {
                            unlink($brand_image);
                        }
                    }
                    $brand_update_image = $this->getUploadImages();
                    $this->_arrParam['image'] = $brand_update_image[0];
                }
                else if( (isset($this->_arrParam['delete_brand_image'])) && ($this->_arrParam['delete_brand_image'] == 1)){
                    if (!empty($detail_brand['image'])) {
                        $brand_image = BRAND_IMAGE_PATH . '/' . $detail_brand['image'];
                        if (file_exists($brand_image)) {
                            unlink($brand_image);
                        }
                    }
                    $this->_arrParam['image'] = '';
                }
                $update = $brand_model->editItem($this->_arrParam);
                if ($update === true) {
                    $this->redirect('/admin/brand');
                } else {
                    $this->view->assign('error_input', $update);
                    $this->view->assign('error_value', $this->_arrParam);
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
        $size_validator = new Zend_Validate_File_Size(array('min' => 10, 'max' => 10000));
        $size_validator->setMessage('Dung lượng quá lớn !!!', Zend_Validate_File_Size::TOO_BIG);
        $size_validator->setMessage('Dung lượng quá nhỏ !!!', Zend_Validate_File_Size::TOO_SMALL);
        $extension_validator = new Zend_Validate_File_Extension('jpg,png,gif');
        $extension_validator->setMessage('Sai định dạng hình ảnh !!!!', Zend_Validate_File_Extension::FALSE_EXTENSION);
        $file_adapter->addValidator($extension_validator);
        $file_adapter->addValidator($size_validator);
        $file_upload = $file_adapter->getFileInfo();
        foreach ($file_upload as $key => $fileInfo) {
            if ($fileInfo['name'] != ''){
                $path_info = pathinfo($fileInfo['name']);
                $file_name = $path_info['filename'];
                $ext = $path_info['extension'];
                $new_name = substr(md5(uniqid(rand(1, 6))), 0, 8) . '-' . $file_name . '.' . $ext;
                $file_adapter->addFilter('Rename', $path . '/' . $new_name);
                $file_adapter->receive($fileInfo['name']);
                $brand_image[] = $new_name;
            }
        }
        $messages = $file_adapter->getMessages();
        if(count($messages)){
            $brand_image['status'] = false;
            $brand_image['error'] = $messages;
        }
        return $brand_image;
    }
}
