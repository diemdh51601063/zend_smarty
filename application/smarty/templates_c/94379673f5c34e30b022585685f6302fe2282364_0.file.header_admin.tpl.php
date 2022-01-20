<?php
/* Smarty version 4.0.0, created on 2022-01-20 06:40:33
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\static\header_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61e8a171c0aed4_58094702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94379673f5c34e30b022585685f6302fe2282364' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\static\\header_admin.tpl',
      1 => 1642635633,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e8a171c0aed4_58094702 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="header_admin">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">QUẢN TRỊ WEBSITE</a>
        <div>
        <i class="fa fa-user"></i> Hello, <?php echo $_smarty_tpl->tpl_vars['admin']->value['last_name'];?>

        <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'admin','action'=>'logout'));
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
"><button class ='btn btn-danger ml-2'><i class="fa fa-sign-out"></i></button></a>
        </div>
    </nav>
</div><?php }
}
