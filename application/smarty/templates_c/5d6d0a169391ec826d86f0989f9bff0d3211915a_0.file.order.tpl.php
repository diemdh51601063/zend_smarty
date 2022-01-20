<?php
/* Smarty version 4.0.0, created on 2022-01-20 05:26:27
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\admin\order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61e8901332ef41_25723794',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d6d0a169391ec826d86f0989f9bff0d3211915a' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\admin\\order.tpl',
      1 => 1642610036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e8901332ef41_25723794 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    #table_order_wrapper .dataTables_filter input {
        background-color: white;
    }

    .dataTables_wrapper .dataTables_length select {
        background-color: white;
    }

    h3 {
        text-align: center;
    }

    .button_width{
        min-width: 80px;
    }
    .icon_warning{
        color: #962424;
        height: 40px;
    }
</style>


<h3><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h3>
<table id="table_order" class="display nowrap" style="width: 100%">
    <thead>
        <tr style="text-align: center">
            <th>ID</th>
            <th>Người Đặt Hàng</th>
            <th>SĐT</th>
            <th>Ngày Đặt Hàng</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_order']->value, 'item');
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
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['regist_date'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['hour'];?>
:<?php echo $_smarty_tpl->tpl_vars['item']->value['minute'];?>
</td>
                <td>
                    <button class="btn btn-info button_width mr-1" onclick="acceptOrder(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)">Duyệt</button> 
                    <button class="btn btn-danger button_width" data-toggle="modal" data-target="#cancelOrderModal" id="cacelOrderBtn" data="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Hủy</button>
                </td>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<div class="modal fade" id="cancelOrderModal" tabindex="-1" role="dialog" aria-labelledby="cancelOrderModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelOrderModalLabel"><i class="fa fa-exclamation-circle icon_warning"></i> Hủy Đơn Đặt Hàng ?</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="formCancelOrder" onsubmit="cancelOrder(event)">
                    <div class="form-group">
                        <label><b>Nhập lí do hủy đơn: </b></label>
                        <input type="text" class="form-control" id="cancel_reason" name="cancel_reason">
                    </div>
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-danger button_width" data-dismiss="modal">Hủy Đơn</button>
                        <button type="button" class="btn btn-secondary button_width" data-dismiss="modal">Thoát</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>


<?php echo '<script'; ?>
>
    $(document).ready(function() {
        $('#table_order').DataTable({
            className: 'display',
            "paging": true,
            "pagingType": "full_numbers"
        });
    });


    function acceptOrder(order_id) {

    }

    function cancelOrder(e) {
        e.preventDefault();
        var fdata = $('#formCancelOrder').serializeArray();
        $.ajax({
            type: 'post',
            url: "/admin/cancelorder",
            dataType: 'json',
            data: fdata,
            success: function (data) {
               
            },
            error: function (status) {
                console.log(status);
            }
        });
    }
<?php echo '</script'; ?>
><?php }
}
