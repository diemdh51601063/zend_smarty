<?php
class Ext_Encode
{
    public function encode_md5($value){
        $val_md5 = md5($value);
        return $val_md5;
    }
}
