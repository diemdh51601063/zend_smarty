<?php
class Model_ProductImage extends Zend_Db_Table
{
    protected $_name = 'product_images';
    protected $_primary = 'id';

    protected $_filter = null;
    protected $_validate = null;
    protected $_option = null;


    public function init()
    {
        $this->_filter = array(
            'id' => array('Int'),
        );

        $this->_validate = array(
            'product_id' => array(
                new Zend_Validate_Db_RecordExists(
                    array(
                        'table' => 'products',
                        'field' => 'id'
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_Db_RecordExists::ERROR_NO_RECORD_FOUND => '* Vui lòng chọn sản phẩm hợp lệ !!!'
                    )
                )
            ),
            'product_detail_id' => array(
                new Zend_Validate_Db_RecordExists(
                    array(
                        'table' => 'product_details',
                        'field' => 'id'
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_Db_RecordExists::ERROR_NO_RECORD_FOUND => '* Vui lòng chọn phân loại sản phẩm hợp lệ !!!'
                    )
                )
            ),

        );
    }

    public function getListItem()
    {
        $list_result = $this->fetchAll()->toArray();
        return $list_result;
    }

    public function getItemDetail($arrParam)
    {
        $where = 'id = ' . $arrParam['id'];
        $detail = $this->fetchRow($where);
        return $detail;
    }

    public function addItem($arrParam)
    {
        $result = null;
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arrParam, $this->_option);
        if ($input->isValid()) {
            $row = $this->createRow($arrParam);
            $row->save();
            $result['status'] = true;
            $result['product_image_id'] = $row['id'];
        } else {
            if ($input->hasInvalid() || $input->hasMissing()) {
                $messages = $input->getMessages();
                $result = $messages;
            }
        }
        return $result;
    }

    public function deleteItem($arrParam)
    {
        $where = 'id = ' . $arrParam['id'];
        $this->delete($where);
    }

    public function deleteListItem($list)
    {
        if (!empty($list)) {
            foreach ($list as $image_id) {
                $where = 'id = ' . $image_id;
                $detail_image = $this->fetchRow($where);
                if ($detail_image['image'] !== "") {
                    $product_image = PRODUCT_IMAGE_PATH . '/' . $detail_image['image'];
                    if (file_exists($product_image)) {
                        unlink($product_image);
                    }
                }
                $this->delete($where);
            }
        }
    }

    public function getListImageOfProduct($product_id)
    {
        $where = 'product_id = ' . $product_id . ' AND product_detail_id is null';
        $list = $this->fetchAll($where)->toArray();
        return $list;
    }

    public function getListImageOfDetailProduct($product_id)
    {
        $where = 'product_id = ' . $product_id . ' AND product_detail_id is not null';
        $list = $this->fetchAll($where)->toArray();
        return $list;
    }

    public function addImageDetailProduct($arrParam)
    {
        if ($arrParam['list_detail_image'] != '') {
            foreach ($arrParam['list_detail_image'] as $detail_image) {
                $row = $this->fetchNew();
                $row->product_id = $arrParam['product_id'];
                $row->product_detail_id = $arrParam['product_detail_id'];
                $row->image = $detail_image;
                $row->save();
            }
        }
    }
}
