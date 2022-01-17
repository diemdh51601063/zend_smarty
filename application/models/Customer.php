<?php

require_once 'Ext/EnCode.php';

class Model_Customer extends Zend_Db_Table
{
    protected $_name = 'customers';
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
            'first_name' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'min' => 2,
                        'max' => 50
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập họ !!!'
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => '* Họ có tối đa 50 kí tự !!!',
                        Zend_Validate_StringLength::TOO_SHORT => '* Họ có phải tối thiểu 2 kí tự !!!'
                    )
                )
            ),

            'last_name' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'min' => 2,
                        'max' => 50
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập tên !!!'
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => '* Tên có tối đa 50 kí tự !!!',
                        Zend_Validate_StringLength::TOO_SHORT => '* Tên có phải tối thiểu 2 kí tự !!!'
                    )
                )
            ),

            'email' => array(
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

            'phone' => array(
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

            'password' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'min' => 5,
                        'max' => 20
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập mật khẩu !!!'
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => '* Mật khẩu phải có ít nhất 5 kí tự !!!!',
                        Zend_Validate_StringLength::TOO_SHORT => '* Mật khẩu chỉ được có tối đa 20 kí tự !!!!'
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
            )

        );
    }


    public function logIn($email, $password)
    {
        $where = "email = '" . $email . "' AND password ='" . $password . "'";
        $customer = $this->fetchRow($where);
        return $customer;
    }

    public function getListItem()
    {
        $list_result = $this->fetchAll()->toArray();
        return $list_result;
    }

    public function checkExistEmail($email)
    {
        $check = null;
        $where = " email LIKE  '" . $email . "'";
        $row = $this->fetchRow($where);
        $check = $row['id'];
        return $check;
    }

    public function checkExistPhone($phone)
    {
        $check = null;
        $where = " phone LIKE '" . $phone . "'";
        $row = $this->fetchRow($where);
        $check = $row['id'];
        return $check;
    }


    public function registerUser($arrParam)
    {
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arrParam, $this->_option);
        $result = null;
        if ($input->isValid()) {
            $encode = new Ext_Encode();
            $arrParam['password'] = $encode->encode_md5($arrParam['password']);
            $row = $this->createRow($arrParam);
            $row->save();
            $result['status'] = true;
            $result['customer_id'] = $row['id'];
        } else {
            if ($input->hasInvalid() || $input->hasMissing()) {
                $messages = $input->getMessages();
                $result = $messages;
            }
        }
        return $result;
    }

    public function getCustomer($customer_id)
    {
        $where = "id = " . $customer_id;
        $result = $this->fetchRow($where);
        unset($result['password']);
        return $result;
    }
}
