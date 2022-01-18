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
            $upload_image = true;
            $list_image = null;
            $product_model = new Model_Product();
            $product_image_model = new Model_ProductImage();
            $product_detail_model = new Model_ProductDetail();
            $list_product_image = [];
            $list_detail_product_image = [];
            try {
                $this->_arrParam['admin_id'] = $_SESSION['adminSessionNamespace']['admin']['id'];
                $new_product = $product_model->addItem($this->_arrParam);

                if (empty($new_product['product_id'])) {
                    $this->view->assign('error_input', $new_product);
                    $this->view->assign('error_value', $this->_arrParam);
                } else {
                    if ($_FILES["product_image"]["name"] != "") {
                        $list_image = $this->getUploadImages();
                        if ($list_image['status'] === false) {
                            $upload_image = false;
                        } else {
                            foreach ($list_image as $key => $img) {
                                if (strstr($key, 'product_image_') != '') {
                                    $list_product_image[] = $list_image[$key];
                                } else {
                                    $k = substr($key, -4, 1);
                                    $i = substr($key, -2, 1);
                                    $list_detail_product_image[$k][$i] = $list_image[$key];
                                }
                            }
                        }
                    }

                    if ($upload_image === false) {
                        $this->view->assign('error_image', $list_image['error']);
                    } else {
                        $add_img_param['product_id'] = $new_product['product_id'];
                        foreach ($list_product_image as $product_image) {
                            $add_img_param['image'] = $product_image;
                            $product_image_model->addItem($add_img_param);
                        }
                        $list_detail_error_input = [];
                        if ($this->_arrParam['number_type'] > 0) {
                            for ($i = 1; $i <= $this->_arrParam['number_type']; $i++) {
                                $add_detail_param['product_id'] = $new_product['product_id'];
                                $add_detail_param['color'] = $this->_arrParam['detail_color'][$i];
                                $add_detail_param['price'] = $this->_arrParam['detail_price'][$i];
                                $add_detail_param['quantily'] = $this->_arrParam['detail_quantily'][$i];
                                $new_product_detail = $product_detail_model->addItem($add_detail_param);
                                if (!empty($new_product_detail['product_detail_type_id'])) {
                                    $add_detail_image['product_id'] = $new_product['product_id'];
                                    $add_detail_image['product_detail_id'] = $new_product_detail['product_detail_type_id'];
                                    $add_detail_image['list_detail_image'] = $list_detail_product_image[$i];
                                    $product_image_model->addImageDetailProduct($add_detail_image);
                                } else {
                                    $list_detail_error_input[$i] = $new_product_detail;
                                }
                            }
                        }

                        if (!empty($list_detail_error_input)) {
                            $this->view->assign('list_detail_error_input', $list_detail_error_input);
                            $this->view->assign('error_value', $this->_arrParam);
                        } else {
                            $this->redirect('/admin/product');
                        }
                    }
                }
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

        $product_detail_model = new Model_ProductDetail();
        $list_type_product = $product_detail_model->getListDetailOfProduct($id_product);

        $list_image_type_product = $product_image_model->getListImageOfDetailProduct($id_product);

        $this->view->assign('list_category', $list_category);
        $this->view->assign('list_brand', $list_brand);
        $this->view->assign('detail_product', $detail);
        $this->view->assign('image_product', $list_image);
        $this->view->assign('list_type_product', $list_type_product);
        $this->view->assign('list_image_type_product', $list_image_type_product);

        if ($this->_request->isPost()) {
            foreach ($_FILES as $key => $value) {
                if (empty($value['name'][0])) {
                    unset($_FILES[$key]);
                }
            }

            $upload_image = true;
            $list_image = null;
            $list_product_image = [];
            $list_detail_product_image = [];
            $list_new_detail_product_image = [];
            try {
                $product_model = new Model_Product();
                $this->_arrParam['admin_id'] = $_SESSION['adminSessionNamespace']['admin']['id'];
                $update_product = $product_model->editItem($this->_arrParam);

                if ($update_product === true) {
                    $id_product = $this->_arrParam['id'];
                    unset($this->_arrParam['id']);

                    if (isset($this->_arrParam['product_image_delete_id'])) {
                        $product_image_model->deleteListItem($this->_arrParam['product_image_delete_id']);
                    }
                    if (isset($this->_arrParam['product_type_image_delete_id'])) {
                        $product_image_model->deleteListItem($this->_arrParam['product_type_image_delete_id']);
                    }

                    if (!empty($_FILES)) {
                        $list_image = $this->getUploadImages();
                        if (isset($list_image['status']) && ($list_image['status'] === false)) {
                            $upload_image = false;
                        } else {
                            foreach ($list_image as $key => $img) {
                                if (strstr($key, 'product_image_') != '') {
                                    $list_product_image[] = $list_image[$key];
                                } else {
                                    if (strstr($key, 'new_detail_image_') != '') {
                                        $a = explode("_", substr($key, 17));
                                        $k = $a[0];
                                        $i = $a[1];
                                        $list_new_detail_product_image[$k][$i] = $list_image[$key];
                                    } else {
                                        $a = explode("_", substr($key, 13));
                                        $k = $a[0];
                                        $i = $a[1];
                                        $list_detail_product_image[$k][$i] = $list_image[$key];
                                    }
                                }
                            }
                        }
                    }
                    
                    if ($upload_image === true) {
                        if ($list_product_image != '') {
                            $add_img_param['product_id'] = $id_product;
                            foreach ($list_product_image as $product_image) {
                                $add_img_param['image'] = $product_image;
                                $product_image_model->addItem($add_img_param);
                            }
                        }
                        if ($list_detail_product_image != '') {
                            foreach ($list_detail_product_image as $key => $value) {
                                $add_detail_image['product_id'] = $id_product;
                                $add_detail_image['product_detail_id'] = $key;
                                $add_detail_image['list_detail_image'] = $value;
                                $product_image_model->addImageDetailProduct($add_detail_image);
                            }
                        }
                        foreach ($list_type_product as $type_product) {
                            $edit_detail_param['id'] = $type_product['id'];
                            $edit_detail_param['product_id'] = $id_product;
                            $edit_detail_param['color'] = $this->_arrParam['detail_color'][$type_product['id']];
                            $edit_detail_param['price'] = $this->_arrParam['detail_price'][$type_product['id']];
                            $edit_detail_param['quantily'] = $this->_arrParam['detail_quantily'][$type_product['id']];
                            $product_detail_model->editItem($edit_detail_param);
                        }
                        $list_new_detail = true;
                        if (isset($this->_arrParam['new_detail_color'])) {
                            $list_new_detail = $this->addDetailTypeProduct(
                                $id_product,
                                count($list_type_product),
                                $this->_arrParam,
                                $list_new_detail_product_image
                            );
                        }
                        if($list_new_detail !== true){
                            $this->view->assign('error_detail', $list_new_detail);
                        }else{
                            $this->redirect('/admin/product');
                        }
                    } else {
                        $this->view->assign('error_image', $list_image['error']);
                    }
                } else {
                    $this->view->assign('error_input', $update_product);
                    $this->view->assign('error_value', $this->_arrParam);
                }
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }

    public function hideAction()
    {
        $this->_arrParam['admin_id'] = $_SESSION['adminSessionNamespace']['admin']['id'];
        $product_model = new Model_Product();
        $product_model->hideItem($this->_arrParam);
        $this->redirect('/admin/product');
    }

    public function showAction()
    {
        $this->_arrParam['admin_id'] = $_SESSION['adminSessionNamespace']['admin']['id'];
        $product_model = new Model_Product();
        $product_model->showItem($this->_arrParam);
        $this->redirect('/admin/product');
    }

    public function getUploadImages()
    {
        $product_images = null;
        $file_adapter = new Zend_File_Transfer_Adapter_Http();
        $path = PRODUCT_IMAGE_PATH;
        $file_adapter->setDestination($path);
        $size_validator = new Zend_Validate_File_Size(array('min' => 10, 'max' => '10MB'));
        $size_validator->setMessage('Dung lượng quá lớn !!!', Zend_Validate_File_Size::TOO_BIG);
        $size_validator->setMessage('Dung lượng quá nhỏ !!!', Zend_Validate_File_Size::TOO_SMALL);
        $extension_validator = new Zend_Validate_File_Extension('jpg,png,gif');
        $extension_validator->setMessage('Sai định dạng hình ảnh !!!!', Zend_Validate_File_Extension::FALSE_EXTENSION);
        $file_adapter->addValidator($extension_validator);
        $file_adapter->addValidator($size_validator);
        $file_upload = $file_adapter->getFileInfo();
        if ($file_adapter->isValid()) {
            foreach ($file_upload as $key => $fileInfo) {
                if (!empty($fileInfo['name'][0])) {
                    $path_info = pathinfo($fileInfo['name']);
                    $file_name = preg_replace('/[^a-z0-9_-]/', '', $path_info['filename']);
                    $ext = $path_info['extension'];
                    $new_name = substr(md5(uniqid(rand(1, 6))), 0, 8) . '-' . $file_name . '.' . $ext;
                    try {
                        $file_adapter->addFilter('Rename', $path . '/' . $new_name);
                        $file_adapter->receive($fileInfo['name']);
                        $product_images[$key] = $new_name;
                    } catch (Exception $e) {
                        print_r($e->getMessage());
                    }
                }
            }
        } else {
            $messages = $file_adapter->getMessages();
            if (count($messages)) {
                $product_images['status'] = false;
                $product_images['error'] = $messages;
            }
        }

        return $product_images;
    }

    public function deleteAction()
    {
        $product_model = new Model_Product();
        try {
            $delete = $product_model->deleteItem($this->_arrParam['id']);
            $this->_helper->layout->disableLayout();
            $this->_helper->viewRenderer->setNoRender(true);
            $data = array(
                'result' => $delete
            );
            $this->_helper->json($data);
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

    public function filterInput($array_input_param)
    {
        $filter = new Zend_Filter_StripTags();
        foreach ($array_input_param as $key => $value) {
            if (($key == "name") || ($key == "description")) {
                $array_input_param[$key] = $filter->filter($array_input_param[$key]);
                $array_input_param[$key] = preg_replace(
                    "/[^a-z0-9A-Z_[:space:]ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂ ưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/u",
                    "",
                    $array_input_param[$key]
                );
            }
        }
        return $array_input_param;
    }


    public function addDetailTypeProduct($id_product, $count_type_current, $array_input_detail, $list_image)
    {
        $product_detail_model = new Model_ProductDetail();
        $product_image_model = new Model_ProductImage();
        $result = true;
        $start = $count_type_current + 1;
        $loop = count($array_input_detail['new_detail_color']) + $count_type_current;
        for ($i = $start; $i <= $loop; $i++) {
            $add_detail_param['product_id'] = $id_product;
            $add_detail_param['color'] = $this->_arrParam['new_detail_color'][$i];
            $add_detail_param['price'] = $this->_arrParam['new_detail_price'][$i];
            $add_detail_param['quantily'] = $this->_arrParam['new_detail_quantily'][$i];
            $new_product_detail = $product_detail_model->addItem($add_detail_param);
            if (!empty($new_product_detail['product_detail_type_id'])) {
                $add_detail_image['product_id'] = $id_product;
                $add_detail_image['product_detail_id'] = $new_product_detail['product_detail_type_id'];
                $add_detail_image['list_detail_image'] = $list_image[$i];
                $product_image_model->addImageDetailProduct($add_detail_image);
            } else {
                $result[$i] = $new_product_detail;
            }
        }
        return $result;
    }
}
