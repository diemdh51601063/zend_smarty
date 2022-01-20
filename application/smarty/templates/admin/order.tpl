<style>
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


<h3>{$this->title}</h3>
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
        {foreach $list_order as $item}
            <tr style="text-align: center">
                <td>{$item.id}</td>
                <td>{$item.order_name}</td>
                <td>{$item.order_phone}</td>
                <td>{$item.regist_date} {$item.hour}:{$item.minute}</td>
                <td>
                    <button class="btn btn-info button_width mr-1" onclick="acceptOrder({$item.id})">Duyệt</button> 
                    <button class="btn btn-danger button_width" data-toggle="modal" data-target="#cancelOrderModal" id="cacelOrderBtn" data="{$item.id}">Hủy</button>
                </td>
            {/foreach}
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


<script>
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
                $('#table_order').DataTable().row($('#delete_brand').parents('tr')).remove().draw();
            },
            error: function (status) {
                console.log(status);
            }
        });
    }
</script>