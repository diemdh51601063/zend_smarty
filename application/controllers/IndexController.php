<?php
require_once 'Ext/EnCode.php';
class IndexController extends Zend_Controller_Action
{
    protected $_arrParam;
    protected $_currentController;
    protected $_actionMain;

    public function init()
    {
        $this->_arrParam = $this->_request->getParams();
        $this->_currentController = '/' . $this->_arrParam['controller'];
        $this->_actionMain = '/' . $this->_arrParam['controller'] . '/index';

        $this->view->arrParam = $this->_arrParam;
        $this->view->currentController = $this->_currentController;
        $this->view->actionMain = $this->_actionMain;

        $category_model = new Model_Category();
        $list_category = $category_model->getListItem();
        $this->view->assign('list_category', $list_category);

        $brand_model = new Model_Brand();
        $list_brand = $brand_model->getListItem();
        $this->view->assign('list_brand', $list_brand);

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

    public function viewAction()
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
        $this->view->assign('list_product', $list_product);
    }

    public function detailAction()
    {
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
    }

    public function checkoutAction()
    {
        $this_section = 'checkout ACTIONS';
        $this->view->assign('content', $this_section);
    }

    public function registerAction()
    {
        $this->filterInputRegister($this->_arrParam);
        $this_section = 'Đăng Ký Tài Khoản';
        $this->view->assign('content', $this_section);
        
        $customer_model = new Model_Customer();
        if ($this->_request->isPost()) {
            try {
                $check_exist = $customer_model->checkExistCustomer($this->_arrParam);
                if (empty($check_exist['id'])) {
                    $register = $customer_model->registerUser($this->_arrParam);
                    if (isset($register['status']) && ($register['status'] === true)) {
                        $this->_userSessionNamespace->user = $register['user'];
                        $data = $register['customer'];
                        $this->redirect('/index');
                    } else {
                        $this->view->assign('message_error', $register);
                        $this->view->assign('input_value', $this->_arrParam);
                    }
                }else{
                    $content = 'Email hoặc Số điện thoại đã được đăng ký !!!!';
                    $this->view->assign('customer_exits', $content);
                    $this->view->assign('input_value', $this->_arrParam);
                }
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }

    public function logoutAction(){
        $this->_userSessionNamespace->unsetAll();
        $this->redirect('/' . $this->_arrParam['controller'].'/index');
    }

    public function loginAction()
    {
        if ($this->_request->isPost()) {
            $login_name = $this->_arrParam['email'];
            $encode = new Ext_Encode();
            $password = $encode->encode_md5($this->_arrParam['password']);
            try {
                $model = new Model_Customer();
                $login = $model->logIn($login_name, $password);
                if ($login != '') {
                    $this->_userSessionNamespace->user = $login;
                    $this->redirect($this->_actionMain);
                } else {
                    $message_error = 'Sai thông tin đăng nhập !!!!';
                    $this->view->assign('message_error',$message_error);
                }
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }


    public function addcartAction(){

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
