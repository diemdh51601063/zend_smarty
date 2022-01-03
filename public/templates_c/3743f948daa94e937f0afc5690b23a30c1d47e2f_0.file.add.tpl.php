<?php
/* Smarty version 4.0.0, created on 2022-01-03 22:57:46
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\brand\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61d31cfa8da017_24194437',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3743f948daa94e937f0afc5690b23a30c1d47e2f' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\brand\\add.tpl',
      1 => 1641225453,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61d31cfa8da017_24194437 (Smarty_Internal_Template $_smarty_tpl) {
?><h3 style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h3>
<div class= "mx-5" style="background-color: white; padding: 10px; border-radius: 10px;">
    <form class= "mx-5 my-5">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Thương Hiệu</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="brand_name" name="brand_name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mô Tả</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="description" name="description">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hình ảnh</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" id="brand_image" name="brand_image">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </form>
</div><?php }
}
