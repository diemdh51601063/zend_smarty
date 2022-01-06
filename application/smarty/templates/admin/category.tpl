<style>
    #table_category_wrapper .dataTables_filter input {
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
<table id="table_category" class="display nowrap" style="width: 100%">
<thead>
    <tr style="text-align: center">
        <th>STT</th>
        <th>Tên Danh Mục</th>
        <th></th>
    </tr>
</thead>
<tbody>
    {foreach $list_category as $category}
        <tr style="text-align: center">
            <td>{$category.id}</td>
            <td style="text-align: left">{$category.category_name}</td>
            <td><button style="padding-right: 10px">Edit</button> <button>Delete</button></td>
        </tr>
    {/foreach}
</tbody>
</table>

<script type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_category.js"></script>