<?php
/* Smarty version 4.0.0, created on 2022-01-02 20:34:52
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\admin\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61d1a9fc6272c6_02371785',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb638d99f49a7f440634c2007ab04b6298b35815' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\admin\\product.tpl',
      1 => 1641124463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61d1a9fc6272c6_02371785 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table id="table_example" style="width: 100%">
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
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listItem']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <tr style="text-align: center">
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['quantily'];?>
</td>
                <td><button style="padding-right: 10px">Edit</button> <button>Delete</button></td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_product.js"><?php echo '</script'; ?>
><?php }
}
