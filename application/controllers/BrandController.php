<?php

class BrandController extends Zend_Controller_Action
{
    public function init()
    {
        $this->_helper->layout->setLayout('layout_admin');
    }


    public function addAction()
    {
        $title = 'Thêm Thương Hiệu';
        $this->view->assign('title', $title);
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
