<?php
/* Smarty version 4.0.0, created on 2022-01-04 06:01:34
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\product\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61d3804e8fcbe2_27333404',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41b5c17950654cda2b88ddf7abaddc38552e1cf7' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\product\\add.tpl',
      1 => 1641250894,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61d3804e8fcbe2_27333404 (Smarty_Internal_Template $_smarty_tpl) {
?><h3 style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h3>
<div class="mr-4 ml-2" style="background-color: white; padding: 10px; border-radius: 10px;">
    <form class="mx-5 my-5">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Sản Phẩm</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="product_name" name="product_name">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Danh Mục</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="category_id" name="category_id">
                            <option>Default select</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Thương Hiệu</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="brand_id" name="brand_id">
                            <option>Default select</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mô tả</label>
            <div class="col-sm-10">
                <textarea rows="3" class="form-control" id="product_description" name="product_description"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Giá</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="price" name="price">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Số lượng</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="quantily" name="quantily">
            </div>
        </div>
                
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hình ảnh</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" multiple id="exampleFormControlFile1">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </div>
    </form>
</div><?php }
}
