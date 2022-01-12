<style>
    #table_brand_wrapper .dataTables_filter input {
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


<h3 style="text-align: center;">{$title}</h3>
<table id="table_brand" class="display nowrap" style="width: 100%">
    <thead>
        <tr style="text-align: center">
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Tên Thương Hiệu</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        {foreach $list_brand as $brand}
            <tr style="text-align: center">
                <td>{$brand.id}</td>
                <td>{if $brand.image != '' } <img src="../../asset/images/brands/{{$brand.image}}" width="50px" height="40px">{/if}</td>
                <td>{$brand.brand_name}</td>
                <td style="text-align: right">
                    <a href="{{$this->url(['controller' => 'brand', 'action' => 'update'])}}?id={$brand.id}">
                        <button class="btn btn-primary button_width" style="margin-right: 10px"><i class="fa fa-edit"></i></button>
                    </a>
                    {*<a href="{{$this->url(['controller' => 'brand', 'action' => 'delete'])}}?id={$brand.id}">*}
                        <button id="delete_brand" onclick="deleteBrand({$brand.id})" class="btn btn-danger button_width"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>


<div class="modal fade" id="hideBrandModal" tabindex="-1" role="dialog" aria-labelledby="hideBrandModallabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hideBrandModallabel">Không Thể Xóa Thương Hiệu</h5>
            </div>
            <div class="modal-body">
                <p>Có Sản Phẩm Thuộc Thương Hiệu</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_brand.js"></script>

<script>
function deleteBrand(brand_id){
    $.ajax({
        type: 'post',
        url: "/brand/delete?id="+brand_id,
        dataType: 'json',
        
        success: function (data) {
            if(data.result == false){
                $('#hideBrandModal').modal('show');
            } else {
               $('#table_brand').DataTable().row($('#delete_brand').parents('tr') ).remove().draw();
            }
        },
        error: function (status) {
            console.log(status);
        }
    });
}
</script>