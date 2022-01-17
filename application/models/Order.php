<?php
class Model_Order extends Zend_Db_Table
{
    protected $_name = 'orders';
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
            'customer_id' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_Db_RecordExists(
                    array(
                        'table' => 'customers',
                        'field' => 'id'
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập khách hàng !!!'
                    ),
                    array(
                        Zend_Validate_Db_RecordExists::ERROR_NO_RECORD_FOUND => '* Khách hàng không tồn tại trong hệ thống !!!'
                    )
                )
            ),
            'confirm_admin_id' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_Db_RecordExists(
                    array(
                        'table' => 'admins',
                        'field' => 'id'
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập thông tin admin!!!'
                    ),
                    array(
                        Zend_Validate_Db_RecordExists::ERROR_NO_RECORD_FOUND => '* Admin không tồn tại trong hệ thống !!!'
                    )
                )
            ),

            'order_name' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'min' => 6,
                        'max' => 80
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập tên khách hàng !!!'
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => '* Tên khách hàng có tối đa 80 kí tự !!!',
                        Zend_Validate_StringLength::TOO_SHORT => '* Tên khách hàng có phải tối thiểu 6 kí tự !!!'
                    )
                )
            ),
            'order_email' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_EmailAddress(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập email !!!'
                    ),
                    array(
                        Zend_Validate_EmailAddress::INVALID => '* Không nhận dạng được email !!!!',
                        Zend_Validate_EmailAddress::INVALID_FORMAT => '* Sai định dạng email !!!!',
                    ),

                )
            ),
            'order_phone' => array(
                new Zend_Validate_Digits,
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'min' => 10,
                        'max' => 11
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_Digits::NOT_DIGITS => '* Số điện thoại không đúng định dạng !!!'
                    ),
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập số điện thoại !!!'
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => '* Số điện thoại có tối đa 11 kí tự !!!',
                        Zend_Validate_StringLength::TOO_SHORT => '* Số điện thoại có tối thiểu 10 kí tự !!!'
                    )
                )
            ),

            'country_code' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng  nhập mã vùng !!!'
                    )
                )
            ),
            'city_code' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng chọn thành phố  !!!'
                    )
                )
            ),
            'district_code' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '*  Vui lòng chọn quận  !!!'
                    )
                )
            ),
            'ward_code' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng chọn phường !!!'
                    )
                )
            ),
            'address' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập địa chỉ  !!!'
                    )
                )
            ),

            'city_name' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng chọn thành phố  !!!'
                    )
                )
            ),
            'district_name' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng chọn quận !!!'
                    )
                )
            ),
            'ward_name' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng chọn phường !!!'
                    )
                )
            ),

            'total' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_GreaterThan(array('min' => 0)),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập số lượng sản phẩm !!!'
                    ),
                    array(
                        Zend_Validate_GreaterThan::NOT_GREATER => '* Số lượng sản phẩm phải lớn hơn 0 !!!',
                    )
                )
            )
        );
    }

    public function addItem($arr_param_add)
    {
        $result = null;
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arr_param_add, $this->_option);
        if ($input->isValid()) {
            $row = $this->createRow($arr_param_add);
            $row->save();
            $result['status'] = true;
            $result['order_id'] = $row['id'];
        } else {
            if ($input->hasInvalid() || $input->hasMissing()) {
                $messages = $input->getMessages();
                $result = $messages;
            }
        }
        return $result;
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

    public function editItem($arrParam)
    {
        $where = 'id = ' . $arrParam['id'];
        $row = $this->fetchRow($where);
        $row->status = $arrParam['status'];
        $row->confirm_admin_id = $arrParam['confirm_admin_id'];
        $row->confirm_date = date('Y-m-d H:i:s');
        $row->update_date = date('Y-m-d H:i:s');
        $row->save();
    }
}
