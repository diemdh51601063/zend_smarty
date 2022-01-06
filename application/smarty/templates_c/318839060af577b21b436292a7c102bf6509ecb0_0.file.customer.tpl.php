<?php
/* Smarty version 4.0.0, created on 2022-01-05 16:24:02
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\admin\customer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61d563b21003e3_76017312',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '318839060af577b21b436292a7c102bf6509ecb0' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\admin\\customer.tpl',
      1 => 1641257916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61d563b21003e3_76017312 (Smarty_Internal_Template $_smarty_tpl) {
?><h3 style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h3>
<table id="table_customer" style="width: 100%">
<thead>
    <tr style="text-align: center">
        <th>ID</th>
        <th style="width: 30%">First Name</th>
        <th style="width: 30%">Last Name</th>
        <th>Last Update</th>
        <th></th>
    </tr>
</thead>
<tbody>
    </tbody>
</table>

<?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_customer.js"><?php echo '</script'; ?>
><?php }
}
