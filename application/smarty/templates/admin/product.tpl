
<table id="table_example" style="width: 100%">
    <thead>
        <tr style="text-align: center">
            <th>ID</th>
            <th style="width: 30%">First Name</th>
            <th style="width: 30%">Last Name</th>
            <th>Last Update</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        {foreach $listItem as $item}
            <tr style="text-align: center">
                <td>{$item.id}</td>
                <td>{$item.name}</td>
                <td>{$item.price}</td>
                <td>{$item.quantily}</td>
                <td><button style="padding-right: 10px">Edit</button> <button>Delete</button></td>
            </tr>
        {/foreach}
    </tbody>
</table>

<script type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_product.js"></script>