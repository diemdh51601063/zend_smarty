<style>
    #table_customer_wrapper .dataTables_filter input {
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
<table id="table_customer" class="display nowrap" style="width: 100%">
<thead>
    <tr style="text-align: center">
        <th>STT</th>
        <th>Họ Tên</th>
        <th>SĐT</th>
        <th>Email</th>
    </tr>
</thead>
<tbody>
    {foreach $list_customer as $customer}
        <tr style="text-align: center">
            <td>{$customer.id}</td>
            <td>{$customer.first_name} {$customer.last_name}</td>
            <td>{$customer.phone}</td>
            <td>{$customer.email}</td>
        </tr>
    {/foreach}
</tbody>
</table>

<script type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_customer.js"></script>