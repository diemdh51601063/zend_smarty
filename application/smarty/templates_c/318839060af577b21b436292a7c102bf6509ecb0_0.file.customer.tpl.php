<?php
/* Smarty version 4.0.0, created on 2022-01-20 05:44:44
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\admin\customer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61e8945c74ccf5_12331494',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '318839060af577b21b436292a7c102bf6509ecb0' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\admin\\customer.tpl',
      1 => 1642631990,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e8945c74ccf5_12331494 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    #table_customer_wrapper .dataTables_filter input {
        background-color: white;
    }

    .dataTables_wrapper .dataTables_length select {
        background-color: white;
    }

    h3 {
        text-align: center;
    }
</style>


<h3><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h3>
<table id="table_customer" class="display nowrap" style="width: 100%">
    <thead>
        <tr style="text-align: center">
            <th>STT</th>
            <th>Họ Tên</th>
            <th>SĐT</th>
            <th>Email</th>
            <th>Số đơn hàng</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_customer']->value, 'customer');
$_smarty_tpl->tpl_vars['customer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['customer']->value) {
$_smarty_tpl->tpl_vars['customer']->do_else = false;
?>
            <tr style="text-align: center">
                <td><?php echo $_smarty_tpl->tpl_vars['customer']->value['id'];?>
</td>
                <td><a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'admin','action'=>'order'));
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
?customer_id=<?php echo $_smarty_tpl->tpl_vars['customer']->value['id'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['customer']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['customer']->value['last_name'];?>

                    </a>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['customer']->value['phone'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['customer']->value['email'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['customer']->value['count_order'];?>
</td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_customer.js"><?php echo '</script'; ?>
><?php }
}
