<?php

class ProductController extends Zend_Controller_Action
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
        $title = 'Thêm Sản Phẩm';
        $category_model = new Model_Category();
        $list_category = $category_model->getListItem();
        $brand_model = new Model_Brand();
        $list_brand = $brand_model->getListItem();
        $this->view->assign('title', $title);
        $this->view->assign('listCategory', $list_category);
        $this->view->assign('listBrand', $list_brand);
        if ($this->_request->isPost()) {
            try {
                $this->_arrParam['admin_id'] = $_SESSION['adminSessionNamespace']['admin']['id'];
                $product_model = new Model_Product();
                $new_product = $product_model->addItem($this->_arrParam);
                if ($_FILES["product_image"]["name"][0] != "") {
                    $product_image_model = new Model_ProductImage();
                    $list_image = $this->getUploadImages();
                    $this->_arrParam['product_id'] = $new_product['id'];
                    foreach ($list_image as $image) {
                        $this->_arrParam['image'] = $image;
                        $product_image_model->addItem($this->_arrParam);
                    }
                }
                $this->redirect('/admin/product');
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }

    public function updateAction()
    {
        $title = 'Cập Nhật Thông Tin Sản Phẩm';
        $this->view->assign('title', $title);
        $category_model = new Model_Category();
        $list_category = $category_model->getListItem();
        $brand_model = new Model_Brand();
        $list_brand = $brand_model->getListItem();

        $id_product = $this->_arrParam['id'];

        $product_model = new Model_Product();
        $detail = $product_model->getItemDetail($id_product);

        $product_image_model = new Model_ProductImage();
        $list_image = $product_image_model->getListImageOfProduct($id_product);

        $this->view->assign('list_category', $list_category);
        $this->view->assign('list_brand', $list_brand);
        $this->view->assign('detail_product', $detail );
        $this->view->assign('image_product', $list_image );

        if ($this->_request->isPost()) {
            var_dump($this->_arrParam);
            exit();
            try {
                $product_model = new Model_Product();
                if (isset($this->_arrParam['status'])) {
                   // $up = $product_model->hideItem($this->_arrParam);
                    //return json_encode($up);
                } else {
                    $this->_arrParam['admin_id'] = $_SESSION['adminSessionNamespace']['admin']['id'];
                    $update_product = $product_model->editItem($this->_arrParam);
                    if ($_FILES["product_image"]["name"][0] != "") {
                        unset($this->_arrParam['id']);
                        $product_image_model = new Model_ProductImage();
                        $list_image = $this->getUploadImages();
                        $this->_arrParam['product_id'] = $id_product;
                        foreach ($list_image as $image) {
                            $this->_arrParam['image'] = $image;
                            $product_image_model->addItem($this->_arrParam);
                        }
                    }
                    $this->redirect('/admin/product');
                }
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }

    public function hideAction()
    {
        $product_model = new Model_Product();
    }

    public function detailAction()
    {
        $title = 'Thông Tin Chi Tiết Sản Phẩm';
        $this->view->assign('title', $title);
    }

    public function getUploadImages()
    {
        $product_images = [];
        $file_adapter = new Zend_File_Transfer_Adapter_Http();
        $path = PRODUCT_IMAGE_PATH;
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
                $product_images[] = $new_name;
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
        return $product_images;
    }
}
