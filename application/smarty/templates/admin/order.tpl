<style>
    #table_order_wrapper .dataTables_filter input {
        background-color: white;
    }
    .dataTables_wrapper .dataTables_length select{
        background-color: white;
    }

    h3 {
        text-align: center;
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
                    <td>{$item.regist_date}</td>
                    <td><button class="btn btn-info" onclick="acceptOrder({$item.id})" style="padding-right: 10px">Duyệt</button> <button onclick="cancelOrder({$item.id})" class="btn btn-danger">Hủy</button></td>
        {/foreach}
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#table_order').DataTable({
            className: 'display',
            "paging": true,
            "pagingType": "full_numbers"
        });
    });
</script>