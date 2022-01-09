<style>
    .button_width {
        min-width: 90px;
    }

    #table_product_wrapper .dataTables_filter input {
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
<table id="table_product" class="display nowrap" style="width: 100%">
    <thead>
        <tr style="text-align: center">
            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Gía</th>
            <th>Số lượng</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        {foreach $listItem as $item}
            {* {$item.list_image|@var_dump} *}
            <tr style="text-align: center">
                <td>{$item.id}</td>
                <td style="text-align: left">{$item.name}</td>
                <td>{$item.price}</td>
                <td>{$item.quantily}</td>
                <td>
                    <a href="{{$this->url(['controller' => 'product', 'action' => 'update'])}}?id={$item.id}">
                        <button class="btn btn-primary button_width" style="margin-right: 10px">Cập nhật
                        </button>
                    </a>
                    {if $item.status == 1 }
                        <button onclick="setIDProductToRemove({$item.id})" class="btn btn-danger button_width"
                            data-toggle="modal" data-target="#exampleModal">Ẩn
                        </button>
                    {else}
                        <a href="{{$this->url(['controller' => 'product', 'action' => 'show'])}}?id={$item.id}">
                        <button class="btn btn-info button_width">Hiển thị</button>
                    {/if}
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ẩn Sản Phẩm ?</h5>
                {*<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>*}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <a href="#" id="hideProduct"><button type="button" class="btn btn-primary">Ẩn</button></a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_product.js"></script>
<script>
    let id = '';

    function setIDProductToRemove(id_product) {
        id = id_product;
        $("#hideProduct").attr('href', '{{$this->url(['controller' => 'product', 'action' => 'hide'])}}?id='+id);
    }

    $("#hideProduct").click(function() {
        $("#hideProduct").attr('href', '{{$this->url(['controller' => 'product', 'action' => 'hide'])}}?id='+id)
    })

    /* $("#hideProduct").click(
        function () {
            $.ajax({
                type: 'post',
                url: 'product/update',
                //dataType: 'json',
                data: JSON.stringify({
                    'status': 2,
                    'id': id
                }),
                success: function (data) {
                    // console.log(data.result);
                    $('#exampleModal').modal('toggle');
                    $('#table_product').dataTable().ajax.reload();
                },
                error: function (status) {
                    console.log(status);
                }
            });
        }
    ) */
</script>