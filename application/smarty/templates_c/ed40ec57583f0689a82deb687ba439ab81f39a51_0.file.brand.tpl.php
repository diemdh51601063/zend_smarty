<?php
/* Smarty version 4.0.0, created on 2022-01-10 20:48:43
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\admin\brand.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61dc393be78d78_47735552',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed40ec57583f0689a82deb687ba439ab81f39a51' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\admin\\brand.tpl',
      1 => 1641814919,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61dc393be78d78_47735552 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    #table_brand_wrapper .dataTables_filter input {
        background-color: white;
    }

    .dataTables_wrapper .dataTables_length select {
        background-color: white;
    }

    h3 {
        text-align: center;
    }

    .button_width {
        min-width: 90px;
    }
</style>


<h3 style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h3>
<table id="table_brand" class="display nowrap" style="width: 100%">
    <thead>
        <tr style="text-align: center">
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Tên Thương Hiệu</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_brand']->value, 'brand');
$_smarty_tpl->tpl_vars['brand']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->do_else = false;
?>
            <tr style="text-align: center">
                <td><?php echo $_smarty_tpl->tpl_vars['brand']->value['id'];?>
</td>
                <td><?php if ($_smarty_tpl->tpl_vars['brand']->value['image'] != '') {?> <img src="../../asset/images/brands/<?php ob_start();
echo $_smarty_tpl->tpl_vars['brand']->value['image'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
" width="50px" height="40px"><?php }?></td>
                <td><?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_name'];?>
</td>
                <td>
                    <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'brand','action'=>'update'));
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
?id=<?php echo $_smarty_tpl->tpl_vars['brand']->value['id'];?>
">
                        <button class="btn btn-primary button_width" style="margin-right: 10px">Cập nhật</button>
                    </a>
                    <button class="btn btn-danger button_width">Ẩn</button>
                </td>
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
