<style>
    #table_customer_wrapper .dataTables_filter input {
        background-color: white;
    }

    .dataTables_wrapper .dataTables_length select {
        background-color: white;
    }

    h3 {
        text-align: center;
    }
</style>


<h3>{$this->title}</h3>
<table id="table_customer" class="display nowrap" style="width: 100%">
    <thead>
        <tr style="text-align: center">
            <th>STT</th>
            <th>Họ Tên</th>
            <th>SĐT</th>
            <th>Email</th>
            <th>Số đơn hàng</th>
        </tr>
    </thead>
    <tbody>
        {foreach $list_customer as $customer}
            <tr style="text-align: center">
                <td>{$customer.id}</td>
                <td><a href="{{$this->url(['controller' => 'admin', 'action' => 'order'])}}?customer_id={$customer.id}">
                        {$customer.first_name} {$customer.last_name}
                    </a>
                </td>
                <td>{$customer.phone}</td>
                <td>{$customer.email}</td>
                <td>{$customer.count_order}</td>
            </tr>
        {/foreach}
    </tbody>
</table>

<script type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_customer.js"></script>