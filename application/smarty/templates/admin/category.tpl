<style>
    #table_category_wrapper .dataTables_filter input {
        background-color: white;
    }

    .dataTables_wrapper .dataTables_length select {
        background-color: white;
    }

    h3 {
        text-align: center;
    }

    .button_width {
        min-width: 90px;
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
                <td>
                    <a href="{{$this->url(['controller' => 'category', 'action' => 'update'])}}?id={$category.id}">
                        <button class="btn btn-primary button_width" style="margin-right: 10px"><i class="fa fa-edit"></i></button>
                    </a>
                    <button id="delete_category" onclick="deleteCategory({$category.id})" class="btn btn-danger button_width"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>

<div class="modal fade" id="hideCategoryModal" tabindex="-1" role="dialog" aria-labelledby="hideCategoryModallabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hideCategoryModallabel">Không Thể Ẩn Danh Mục</h5>
            </div>
            <div class="modal-body">
            <p>Có Sản Phẩm Thuộc Danh Mục</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_category.js"></script>

<script>
function deleteCategory(category_id){
    $.ajax({
        type: 'post',
        url: "/category/delete?id="+category_id,
        dataType: 'json',
        
        success: function (data) {
            if(data.result == false){
                $('#hideCategoryModal').modal('show');
            } else {
               $('#table_category').DataTable().row($('#delete_category').parents('tr') ).remove().draw();
            }
        },
        error: function (status) {
            console.log(status);
        }
    });
}
</script>