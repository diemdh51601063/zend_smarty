<?php
/* Smarty version 4.0.0, created on 2022-01-10 23:47:43
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\admin\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61dc632f4ec367_29697020',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4e8a46411f66b4e215d9935c710df390a6db869' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\admin\\category.tpl',
      1 => 1641833260,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61dc632f4ec367_29697020 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    #table_category_wrapper .dataTables_filter input {
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


<h3><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h3>
<table id="table_category" class="display nowrap" style="width: 100%">
    <thead>
        <tr style="text-align: center">
            <th>STT</th>
            <th>Tên Danh Mục</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_category']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
            <tr style="text-align: center">
                <td><?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
</td>
                <td style="text-align: left"><?php echo $_smarty_tpl->tpl_vars['category']->value['category_name'];?>
</td>
                <td style="text-align: right">
                    <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'category','action'=>'update'));
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
?id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
                        <button class="btn-sm btn-primary button_width" style="margin-right: 10px">Cập nhật</button>
                    </a>
                    <?php if ($_smarty_tpl->tpl_vars['category']->value['status'] == 1) {?>
                        <button class="btn-sm btn-danger button_width" data-toggle="modal" data-target="#hideCategoryModal">Ẩn
                        </button>
                    <?php } else { ?>
                        <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'category','action'=>'show'));
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
?id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
                            <button class="btn-sm btn-info button_width">Hiển thị</button>
                        <?php }?>

                </td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<div class="modal fade" id="hideCategoryModal" tabindex="-1" role="dialog" aria-labelledby="hideCategoryModallabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hideCategoryModallabel">Ẩn Danh Mục?</h5>
                            </div>
            <div class="modal-body">
                <p>Các sản phẩm thuộc danh mục sẽ hiển thị trong danh mục <b>"Khác"</b>.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <a href="#" id="hideCategory"><button type="button" class="btn btn-primary">Xác nhận</button></a>
            </div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_category.js"><?php echo '</script'; ?>
><?php }
}
