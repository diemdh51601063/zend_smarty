<?php

class CustomerController extends Zend_Controller_Action
{
    protected $_arrParam;
    protected $_currentController;
    protected $_actionMain;
    protected $_userSessionNamespace;


    public function init()
    {
        $this->_arrParam = $this->_request->getParams();
        $this->_currentController = '/' . $this->_arrParam['controller'];
        $this->_actionMain = '/' . $this->_arrParam['controller'] . '/index';

        $this->view->arrParam = $this->_arrParam;
        $this->view->currentController = $this->_currentController;
        $this->view->actionMain = $this->_actionMain;

        if (Zend_Session::sessionExists() == true) {
            if (isset($_SESSION['userSessionNamespace'])) {
                if(!empty($_SESSION['userSessionNamespace']['user'])){
                    $this->view->user = $_SESSION['userSessionNamespace']['user'];
                }
                if(!empty($_SESSION['userSessionNamespace']['cart'])){
                    $this->view->cart = $_SESSION['userSessionNamespace']['cart'];
                }
            }
        }
    }

    public function indexAction()
    {
        $list_product = [];
        try {
            $product_model = new Model_Product();
            $list_product = $product_model->getListItem();
            foreach ($list_product as $key => $product) {
                $product_image_model = new Model_ProductImage();
                $list_product[$key]['list_image'] = $product_image_model->getListImageOfProduct($product['id']);
            }
        } catch (Exception $e) {
            ($e);
        }
        $this_section = 'content indexActions';
        $this->view->assign('hello', $this_section);
        $this->view->assign('listItem', $list_product);
    }

    public function loginAction()
    {
        $this_section = 'VIEW ACTIONS';
        $this->view->assign('content', $this_section);
    }

    public function addcartAction()
    {
        $product_model = new Model_Product();
        $product_image_model = new Model_ProductImage();
        $product_id = $this->_arrParam['product_id'];
        $cart_session = $this->_userSessionNamespace->cart;

       $is_product_exist = false;
        foreach ($cart_session as $k => $cart_item){
            if($cart_item['id'] == $product_id){
                $cart_item['total_in_cart'] = (int)$this->_arrParam['number_product'] + (int)$cart_item['total_in_cart'];
                $is_product_exist = true;
            }
        }

       if($is_product_exist == false){
            $product_detail = $product_model->getItemDetail($product_id);
            $image_product = null;
            $list_image = $product_image_model->getListImageOfProduct($product_id);
            if(!empty($list_image)){
                $image_product = $list_image[0]['image'];
            }
            $product = array(
                'id' => $product_id,
                'price' => $product_detail['price'],
                'image' => $image_product,
                'name' => $product_detail['name'],
                'total_in_cart' => $this->_arrParam['number_product']
            );
           $cart_session[] = $product;
        }
       //$cart_session = $this->_userSessionNamespace->cart;
        $data = array(
            'result' => $cart_session
        );
        $this->_helper->json($data);
    }

    public function delcartAction(){
        $cart = null;
        $product_model = new Model_Product();
        $delete_product_id = $this->_arrParam['product_id'];
        if(!empty($this->_userSessionNamespace->user)){

        }else{
           $cart = $this->_userSessionNamespace->cart;
           foreach ($cart as $key => $product){
               if($product['id'] == $delete_product_id){
                   unset($cart[$key]);
               }
           }
        }

        $data = array(
            'result' => $cart
        );
        $this->_helper->json($data);
    }

    public function checkoutAction()
    {
        $this_section = 'checkout ACTIONS';
        $this->view->assign('content', $this_section);
    }


    public function registerAction()
    {
        $this->filterInputRegister($this->_arrParam);
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(TRUE);

        $customer_model = new Model_Customer();
        if ($this->_request->isPost()) {
            try {
                $check_exist = $customer_model->checkExistCustomer($this->_arrParam);
                if (empty($check_exist['id'])) {
                    $register = $customer_model->registerUser($this->_arrParam);
                    if (isset($register['status']) && ($register['status'] === true)) {
                        $this->_userSessionNamespace->user = $register['customer'];
                    }
                    $data = array(
                        'result' => $register
                    );
                }else{
                    $data = array(
                        'result' => false,
                        'message' => "Email hoặc Số điện thoại đã được đăng ký !!!!"
                    );
                }
                $this->_helper->json($data);
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }
    public function filterInputRegister($arrParam)
    {
        $param_filter=array('first_name', 'last_name', 'address', 'city_name', 'district_name', 'ward_name');
        $filter = new Zend_Filter_StripTags();
        foreach ($arrParam as $key => $value) {
            if (array_key_exists($key, $param_filter)) {
                $arrParam[$key] = $filter->filter($arrParam[$key]);
                $arrParam[$key] = preg_replace("/[^a-z0-9A-Z_[:space:]ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂ ưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/u", "",  $arrParam[$key]);
            }else if ($key == 'password'){
                $arrParam[$key] = $filter->filter($arrParam[$key]);
                $arrParam[$key] = preg_replace("/[^a-z0-9A-Z_\x{00C0}-\x{00FF}\x{1EA0}-\x{1EFF}]/u", "",$arrParam[$key]);
            }
        }
        return $arrParam;
    }
}
