<?php
/* Smarty version 4.0.0, created on 2022-01-20 06:41:03
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\admin\brand.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61e8a18f068b39_24739598',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed40ec57583f0689a82deb687ba439ab81f39a51' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\admin\\brand.tpl',
      1 => 1642541033,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e8a18f068b39_24739598 (Smarty_Internal_Template $_smarty_tpl) {
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

    .icon_warning{
        color: #962424;
        height: 40px;
    }
</style>


<h3 style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h3>
<table id="table_brand" class="display nowrap" style="width: 100%">
    <thead>
    <tr>
        <th style="text-align: center">ID</th>
        <th style="text-align: center">Hình Ảnh</th>
        <th>Tên Thương Hiệu</th>
        <th style="text-align: center">Số Lượng Sản phẩm</th>
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
            <td><?php if ($_smarty_tpl->tpl_vars['brand']->value['image'] != '') {?>
                    <img src="../../asset/images/brands/<?php ob_start();
echo $_smarty_tpl->tpl_vars['brand']->value['image'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
" width="50px" height="40px">
                <?php }?>
            </td>
            <td style="text-align: left">
                <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'admin','action'=>'product'));
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
?brand_id=<?php echo $_smarty_tpl->tpl_vars['brand']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_name'];?>
</a>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['brand']->value['number_product'];?>
</td>
            <td style="text-align: center">
                <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'brand','action'=>'update'));
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
?id=<?php echo $_smarty_tpl->tpl_vars['brand']->value['id'];?>
">
                    <button class="btn btn-primary button_width" style="margin-right: 10px"><i class="fa fa-edit"></i>
                    </button>
                </a>
                <?php if ($_smarty_tpl->tpl_vars['brand']->value['number_product'] > 0) {?>
                    <button id="disable_delete_brand" onclick="showPopup()" class="btn btn-danger button_width disabled"><i class="fa fa-trash"></i></button>
                <?php } else { ?>
                    <button id="delete_brand" onclick="deleteBrand(<?php echo $_smarty_tpl->tpl_vars['brand']->value['id'];?>
)" class="btn btn-danger button_width"><i class="fa fa-trash"></i></button>
                <?php }?>
            </td>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>


<div class="modal fade" id="hideBrandModal" tabindex="-1" role="dialog" aria-labelledby="hideBrandModallabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hideBrandModallabel"> <i class="fa fa-exclamation-circle icon_warning"></i> Không Thể Xóa Thương Hiệu</h5>
            </div>
            <div class="modal-body">
                <p>Có Sản Phẩm Thuộc Thương Hiệu</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_brand.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>

    function showPopup(){
        $('#hideBrandModal').modal('show');
    }
    function deleteBrand(brand_id) {
        $.ajax({
            type: 'post',
            url: "/brand/delete?id=" + brand_id,
            dataType: 'json',

            success: function (data) {
                if (data.result == false) {
                    $('#hideBrandModal').modal('show');
                } else {
                    $('#table_brand').DataTable().row($('#delete_brand').parents('tr')).remove().draw();
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
