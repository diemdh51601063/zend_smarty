<?php
/* Smarty version 4.0.0, created on 2022-01-03 22:52:54
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\category\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61d31bd67ec7e2_66099358',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2f2ea1efb54161779df4a6743203de0fef79679' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\category\\add.tpl',
      1 => 1641225173,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61d31bd67ec7e2_66099358 (Smarty_Internal_Template $_smarty_tpl) {
?><h3 style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h3>
<div class= "mx-5" style="background-color: white; padding: 10px; border-radius: 10px;">
    <form class= "mx-5 my-5">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Tên Danh Mục</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3">
            </div>
        </div>
        
        <div class="form-group row justify-content-center">
                <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </form>
</div><?php }
}
