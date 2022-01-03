<h3 style="text-align: center;">{$this->title}</h3>
<table id="table_category" style="width: 100%">
<thead>
    <tr style="text-align: center">
        <th>STT</th>
        <th>Tên Danh Mục</th>
        <th></th>
    </tr>
</thead>
<tbody>
    {foreach $listCategory as $category}
        <tr style="text-align: center">
            <td>{$category.id}</td>
            <td>{$category.category_name}</td>
            <td><button style="padding-right: 10px">Edit</button> <button>Delete</button></td>
        </tr>
    {/foreach}
</tbody>
</table>

<script type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_category.js"></script>