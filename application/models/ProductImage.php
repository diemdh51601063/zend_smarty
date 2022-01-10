<?php
class Model_ProductImage extends Zend_Db_Table
{
    protected $_name = 'product_images';
    protected $_primary = 'id';

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
        $row = $this->createRow($arrParam);
        $row->product_id = $arrParam['product_id'];
        $row->image = $arrParam['image'];
        $row->save();
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
                $row = $this->createRow($arrParam);
                $row->product_id = $arrParam['product_id'];
                $row->product_detail_id = $arrParam['product_detail_id'];
                $row->image = $detail_image;
                $row->save();
            }
        }
    }
}
