<?php
/* Smarty version 4.0.0, created on 2022-01-20 06:44:48
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\admin\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61e8a2700e9a99_01741185',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4e8a46411f66b4e215d9935c710df390a6db869' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\admin\\category.tpl',
      1 => 1642541058,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e8a2700e9a99_01741185 (Smarty_Internal_Template $_smarty_tpl) {
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

    .icon_warning{
        color: #962424;
        height: 40px;
    }
</style>


<h3><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h3>
<table id="table_category" class="display nowrap" style="width: 100%">
    <thead>
        <tr style="text-align: center">
            <th>ID</th>
            <th>Tên Danh Mục</th>
            <th>Số Lượng Sản phẩm</th>
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
                <td style="text-align: left">
                    <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'admin','action'=>'product'));
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
?category_id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['category']->value['category_name'];?>

                    </a>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['category']->value['number_product'];?>
</td>
                <td>
                    <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'category','action'=>'update'));
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
?id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
                        <button class="btn btn-primary button_width" style="margin-right: 10px"><i class="fa fa-edit"></i></button>
                    </a>
                    <?php if ($_smarty_tpl->tpl_vars['category']->value['number_product'] > 0) {?>
                        <button id="delete_category" onclick="deleteCategory(<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
)" class="btn btn-danger button_width disabled"><i class="fa fa-trash"></i></button>
                    <?php } else { ?>
                        <button id="delete_category" onclick="deleteCategory(<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
)" class="btn btn-danger button_width"><i class="fa fa-trash"></i></button>
                    <?php }?>
                </td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<div class="modal fade" id="hideCategoryModal" tabindex="-1" role="dialog" aria-labelledby="hideCategoryModallabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="hideCategoryModallabel"><i class="fa fa-exclamation-circle icon_warning"></i> Không Thể Xóa Danh Mục</h5>
            </div>
            <div class="modal-body">
            <p>Có Sản Phẩm Thuộc Danh Mục</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_category.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
function deleteCategory(category_id){
    $.ajax({
        type: 'post',
        url: "/category/delete?id="+category_id,
        dataType: 'json',

        success: function (data) {
            if(data.result == false){
                $('#hideCategoryModal').modal('show');
            } else {
               $('#table_category').DataTable().row($('#delete_category').parents('tr') ).remove().draw();
            }
        },
        error: function (status) {
            console.log(status);
        }
    });
}
<?php echo '</script'; ?>
><?php }
}
