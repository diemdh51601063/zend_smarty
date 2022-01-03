<?php

class ProductController extends Zend_Controller_Action
{
    public function init()
    {
        $this->_helper->layout->setLayout('layout_admin');
    }


    public function addAction()
    {
        $title = 'Thêm Sản Phẩm';
        $this->view->assign('title', $title);
    }

    public function updateAction()
    {
        $title = 'Cập Nhật Thông Tin Sản Phẩm';
        $this->view->assign('title', $title);
    }
    public function detailAction()
    {
        $title = 'Thông Tin Chi Tiết Sản Phẩm';
        $this->view->assign('title', $title);
    }
}
