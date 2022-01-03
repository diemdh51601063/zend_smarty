<?php
/* Smarty version 4.0.0, created on 2022-01-03 23:06:42
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\admin\order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61d31f120abc47_88598415',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d6d0a169391ec826d86f0989f9bff0d3211915a' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\admin\\order.tpl',
      1 => 1641225997,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61d31f120abc47_88598415 (Smarty_Internal_Template $_smarty_tpl) {
?><h3 style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h3>
<table id="table_order" style="width: 100%">
<thead>
    <tr style="text-align: center">
        <th>ID</th>
        <th>Order Name</th>
        <th>Order Phone</th>
        <th>Order Date</th>
        <th></th>
    </tr>
</thead>
<tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listOrder']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
        <tr style="text-align: center">
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['order_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['order_phone'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['regist_dtae'];?>
</td>
            <td><button style="padding-right: 10px">Duyệt</button> <button>Hủy</button></td>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>

<?php echo '<script'; ?>
>
$(document).ready(function () {
    $('#table_order').DataTable({
        className:'display',
        "paging": true,
        "pagingType": "full_numbers"
    });
});
<?php echo '</script'; ?>
><?php }
}
