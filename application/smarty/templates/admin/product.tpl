<style>
    .button_width {
        min-width: 50px;
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

    .td-limit {
        max-width: 150px;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }
</style>
<h3>{$this->title}</h3>
<table id="table_product" class="display nowrap" style="width: 100%">
    <thead>
        <tr style="text-align: center">
            <th>STT</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        {foreach $listItem as $item}
            {* {$item.list_image|@var_dump} *}
            <tr style="text-align: center">
                <td>{$item.id}</td>
                <td class="td-limit" style="text-align: left">
                    <a href="{{$this->url(['controller' => 'product', 'action' => 'update'])}}?id={$item.id}">
                        {$item.name}
                    </a>
                </td>
                <td>
                    {$item.price|number_format:0:".":"."} VNĐ
                </td>
                <td>{$item.quantily}</td>

                <td>
                    {foreach $list_category as $category}
                        {if $category.id == $item.category_id}
                            {$category.category_name}
                        {/if}
                    {/foreach}
                </td>

                <td>
                    {foreach $list_brand as $brand}
                        {if $brand.id == $item.brand_id}
                            {$brand.brand_name}
                        {/if}
                    {/foreach}
                </td>

                <td>
                    <a href="{{$this->url(['controller' => 'product', 'action' => 'update'])}}?id={$item.id}">
                        <button class="btn btn-primary button_width" style="margin-right: 10px"><i class="fa fa-edit"></i>
                        </button>
                    </a>
                    {if $item.status == 1 }
                        <button onclick="setIDProductToHide({$item.id})" class="btn btn-danger button_width" data-toggle="modal"
                            data-target="#hideProductModal"><i class="fa fa-eye-slash"></i>
                        </button>
                    {else}
                        <a href="{{$this->url(['controller' => 'product', 'action' => 'show'])}}?id={$item.id}">
                            <button class="btn btn-success button_width"><i class="fa fa-eye"></i></button>
                        {/if}
                        {*<button onclick="deleteProduct({$item.id})" id="hideProduct" class="btn btn-danger button_width">Xóa</button>*}
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>
<div class="modal fade" id="hideProductModal" tabindex="-1" role="dialog" aria-labelledby="hideProductModallabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hideProductModallabel">Ẩn Sản Phẩm Khỏi Trang Người Dùng?</h5>

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
    function formatPrice(price) {
        return String(price).replace(/(.)(?=(\d{3})+$)/g, '$1.');
    }

    let id = '';

    function setIDProductToHide(id_product) {
        id = id_product;
        $("#hideProduct").attr('href', '{{$this->url(['controller' => 'product', 'action' => 'hide'])}}?id='+id);
    }

    function deleteProduct(id) {
        $.ajax({
            type: 'post',
            url: '/product/delete?id=' + id,
            dataType: 'json',
            success: function(data) {
                console.log(data.result);
                $('#table_product').DataTable().row($('#hideProduct').parents('tr')).remove().draw();
            },
            error: function(status) {
                console.log(status);
            }
        });
    }
</script>