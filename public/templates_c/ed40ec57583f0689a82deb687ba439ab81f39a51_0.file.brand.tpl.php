<?php
/* Smarty version 4.0.0, created on 2022-01-03 22:43:58
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\admin\brand.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61d319be98e237_01728540',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed40ec57583f0689a82deb687ba439ab81f39a51' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\admin\\brand.tpl',
      1 => 1641224602,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61d319be98e237_01728540 (Smarty_Internal_Template $_smarty_tpl) {
?><h3 style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h3>
<table id="table_brand" style="width: 100%">
<thead>
    <tr style="text-align: center">
        <th>ID</th>
        <th>Image</th>
        <th>Brand Name</th>
        <th></th>
    </tr>
</thead>
<tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listBrand']->value, 'brand');
$_smarty_tpl->tpl_vars['brand']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->do_else = false;
?>
        <tr style="text-align: center">
            <td><?php echo $_smarty_tpl->tpl_vars['brand']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['brand']->value['image'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_name'];?>
</td>
            <td><button style="padding-right: 10px">Edit</button> <button>Delete</button></td>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>

<?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_brand.js"><?php echo '</script'; ?>
><?php }
}
