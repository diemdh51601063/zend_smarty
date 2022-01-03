<h3 style="text-align: center;">{$title}</h3>
<table id="table_brand" style="width: 100%">
<thead>
    <tr style="text-align: center">
        <th>STT</th>
        <th>Hình ảnh</th>
        <th>Tên Thương Hiệu</th>
        <th></th>
    </tr>
</thead>
<tbody>
    {foreach $listBrand as $brand}
        <tr style="text-align: center">
            <td>{$brand.id}</td>
            <td>{$brand.image}</td>
            <td>{$brand.brand_name}</td>
            <td><button style="padding-right: 10px">Edit</button> <button>Delete</button></td>
        </tr>
    {/foreach}
</tbody>
</table>

<script type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_brand.js"></script>