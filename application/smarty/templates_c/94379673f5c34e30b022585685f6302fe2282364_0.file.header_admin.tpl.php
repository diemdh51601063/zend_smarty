<?php
/* Smarty version 4.0.0, created on 2022-01-10 18:49:58
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\static\header_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61dc1d669211f4_37231449',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94379673f5c34e30b022585685f6302fe2282364' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\static\\header_admin.tpl',
      1 => 1641506698,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61dc1d669211f4_37231449 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="header_admin">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">QUẢN TRỊ WEBSITE</a>
        <div>
            <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'admin','action'=>'logout'));
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
"><button class ='btn btn-danger'>Đăng xuất</button></a>
        </div>
    </nav>
</div><?php }
}
