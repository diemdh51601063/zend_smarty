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

        $this->_arrParam = $this->filterInput($this->_arrParam);

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

    public function deleteAction()
    {
        $category_model = new Model_Category();
        try {
            $delete = $category_model->deleteItem($this->_arrParam['id']);
            $this->_helper->layout->disableLayout();
            $this->_helper->viewRenderer->setNoRender(TRUE);
            $data = array(
                'result' => $delete
            );
            $this->_helper->json($data);
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

    public function filterInput($arrParam)
    {
        $filter = new Zend_Filter_StripTags();
        foreach ($arrParam as $key => $value) {
            if ($key == "category_name") {
                $arrParam[$key] = $filter->filter($arrParam[$key]);
                $arrParam[$key] = preg_replace("/[^a-z0-9A-Z_[:space:]ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂ ưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/u", "",  $arrParam[$key]);
                // $arrParam[$key] = preg_replace("/[^a-z0-9A-Z_\x{00C0}-\x{00FF}\x{1EA0}-\x{1EFF}]/u", "",  $arrParam[$key]);
            }
        }
        return $arrParam;
    }
}
