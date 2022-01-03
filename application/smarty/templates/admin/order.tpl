<h3 style="text-align: center;">{$this->title}</h3>
<table id="table_order" style="width: 100%">
<thead>
    <tr style="text-align: center">
        <th>ID</th>
        <th>Order Name</th>
        <th>Order Phone</th>
        <th>Order Date</th>
        <th></th>
    </tr>
</thead>
<tbody>
    {foreach $listOrder as $item}
        <tr style="text-align: center">
            <td>{$item.id}</td>
            <td>{$item.order_name}</td>
            <td>{$item.order_phone}</td>
            <td>{$item.regist_dtae}</td>
            <td><button style="padding-right: 10px">Duyệt</button> <button>Hủy</button></td>
        </tr>
    {/foreach}
</tbody>
</table>

<script>
$(document).ready(function () {
    $('#table_order').DataTable({
        className:'display',
        "paging": true,
        "pagingType": "full_numbers"
    });
});
</script>