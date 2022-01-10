<?php
/* Smarty version 4.0.0, created on 2022-01-10 23:46:40
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\admin\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61dc62f0bb20f1_17297416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb638d99f49a7f440634c2007ab04b6298b35815' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\admin\\product.tpl',
      1 => 1641832926,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61dc62f0bb20f1_17297416 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    .button_width {
        min-width: 90px;
    }

    #table_product_wrapper .dataTables_filter input {
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
<table id="table_product" class="display nowrap" style="width: 100%">
    <thead>
        <tr style="text-align: center">
            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Gía</th>
            <th>Số lượng</th>
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
                <td style="text-align: left"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['quantily'];?>
</td>
                <td>
                    <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'product','action'=>'update'));
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <button class="btn btn-primary button_width" style="margin-right: 10px">Cập nhật
                        </button>
                    </a>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 1) {?>
                        <button onclick="setIDProductToHide(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)" class="btn btn-danger button_width"
                            data-toggle="modal" data-target="#hideProductModal">Ẩn
                        </button>
                    <?php } else { ?>
                        <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'product','action'=>'show'));
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <button class="btn btn-info button_width">Hiển thị</button>
                    <?php }?>
                </td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
<div class="modal fade" id="hideProductModal" tabindex="-1" role="dialog" aria-labelledby="hideProductModallabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hideProductModallabel">Ẩn Sản Phẩm Khỏi Trang Người Dùng?</h5>
                            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <a href="#" id="hideProduct"><button type="button" class="btn btn-primary">Ẩn</button></a>
            </div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_product.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    let id = '';

    function setIDProductToHide(id_product) {
        id = id_product;
        $("#hideProduct").attr('href', '<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'product','action'=>'hide'));
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
?id='+id);
    }

    $("#hideProduct").click(function() {
        $("#hideProduct").attr('href', '<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'product','action'=>'hide'));
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
?id='+id)
    })

    /* $("#hideProduct").click(
        function () {
            $.ajax({
                type: 'post',
                url: 'product/update',
                //dataType: 'json',
                data: JSON.stringify({
                    'status': 2,
                    'id': id
                }),
                success: function (data) {
                    // console.log(data.result);
                    $('#exampleModal').modal('toggle');
                    $('#table_product').dataTable().ajax.reload();
                },
                error: function (status) {
                    console.log(status);
                }
            });
        }
    ) */
<?php echo '</script'; ?>
><?php }
}
