<?php
/* Smarty version 4.0.0, created on 2022-01-20 06:45:36
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\admin\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61e8a2a00f6d15_69118898',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb638d99f49a7f440634c2007ab04b6298b35815' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\admin\\product.tpl',
      1 => 1642540885,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e8a2a00f6d15_69118898 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    .button_width {
        min-width: 50px;
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

    .td-limit {
        max-width: 150px;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }
</style>
<h3><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h3>
<table id="table_product" class="display nowrap" style="width: 100%">
    <thead>
        <tr style="text-align: center">
            <th>STT</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Danh Mục</th>
            <th>Thương Hiệu</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_product']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <tr style="text-align: center">
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                <td class="td-limit" style="text-align: left">
                    <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'product','action'=>'update'));
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                    </a>
                </td>
                <td>
                    <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],0,".",".");?>
 VNĐ
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['quantily'];?>
</td>

                <td>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_category']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                        <?php if ($_smarty_tpl->tpl_vars['category']->value['id'] == $_smarty_tpl->tpl_vars['item']->value['category_id']) {?>
                            <?php echo $_smarty_tpl->tpl_vars['category']->value['category_name'];?>

                        <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </td>

                <td>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_brand']->value, 'brand');
$_smarty_tpl->tpl_vars['brand']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->do_else = false;
?>
                        <?php if ($_smarty_tpl->tpl_vars['brand']->value['id'] == $_smarty_tpl->tpl_vars['item']->value['brand_id']) {?>
                            <?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_name'];?>

                        <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </td>

                <td>
                    <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'product','action'=>'update'));
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <button class="btn btn-primary button_width" style="margin-right: 10px"><i class="fa fa-edit"></i>
                        </button>
                    </a>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 1) {?>
                        <button onclick="setIDProductToHide(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)" class="btn btn-danger button_width" data-toggle="modal"
                            data-target="#hideProductModal"><i class="fa fa-eye-slash"></i>
                        </button>
                    <?php } else { ?>
                        <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'product','action'=>'show'));
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                            <button class="btn btn-success button_width"><i class="fa fa-eye"></i></button>
                        </a>
                    <?php }?>
                </td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
<div class="modal fade" id="hideProductModal" tabindex="-1" role="dialog" aria-labelledby="hideProductModallabel" aria-hidden="true">
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
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
?id='+id);
    }

    /* ajax delete with datatable
    function deleteProduct(id) {
        $.ajax({
            type: 'post',
            url: '/product/delete?id=' + id,
            dataType: 'json',
            success: function(data) {
                console.log(data.result);
                $('#table_product').DataTable().row($('#hideProduct').parents('tr')).remove().draw();
            },
            error: function(status) {
                console.log(status);
            }
        });
    } */
<?php echo '</script'; ?>
><?php }
}
