<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $category_model = new Model_Category();
        $list_category = $category_model->getListItem();
        $this->view->assign('listCategory', $list_category);
    }

    public function indexAction()
    {
        $list_product = [];
        try{
            $product_model = new Model_Product();
            $list_product = $product_model->getListItem();
            foreach($list_product as $key => $product){
                $product_image_model = new Model_ProductImage();
                $list_product[$key]['list_image'] = $product_image_model->getListImageOfProduct($product['id']);
            }
        }catch (Exception $e){
            ($e);
        }
        $this_section = 'content indexActions';
        $this->view->assign('hello', $this_section);
        $this->view->assign('listItem', $list_product);
    }

    public function viewAction()
    {
        $this_section = 'VIEW ACTIONS';
        $this->view->assign('content', $this_section);
    }

    public function detailAction()
    {
        $this_section = 'detail ACTIONS';
        $this->view->assign('content', $this_section);
    }

    public function checkoutAction()
    {
        $this_section = 'checkout ACTIONS';
        $this->view->assign('content', $this_section);
    }
}