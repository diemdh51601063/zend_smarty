<?php
/* Smarty version 4.0.0, created on 2022-01-05 16:30:31
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\admin\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61d5653702ed07_05643241',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4e8a46411f66b4e215d9935c710df390a6db869' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\admin\\category.tpl',
      1 => 1641257916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61d5653702ed07_05643241 (Smarty_Internal_Template $_smarty_tpl) {
?><h3 style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h3>
<table id="table_category" style="width: 100%">
<thead>
    <tr style="text-align: center">
        <th>STT</th>
        <th>Tên Danh Mục</th>
        <th></th>
    </tr>
</thead>
<tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listCategory']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
        <tr style="text-align: center">
            <td><?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['category']->value['category_name'];?>
</td>
            <td><button style="padding-right: 10px">Edit</button> <button>Delete</button></td>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>

<?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_category.js"><?php echo '</script'; ?>
><?php }
}
