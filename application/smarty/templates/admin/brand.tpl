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
                        <button class="btn btn-primary button_width" style="margin-right: 10px">Cập nhật</button>
                    </a>
                    {*{if $category.status == 1 }
                        <button class="btn-sm btn-danger button_width" data-toggle="modal" data-target="#hideBrandModal">Ẩn
                        </button>
                    {else}
                        <a href="{{$this->url(['controller' => 'category', 'action' => 'show'])}}?id={$category.id}">
                            <button class="btn-sm btn-info button_width">Hiển thị</button></a>
                    {/if}*}
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
                <h5 class="modal-title" id="hideBrandModallabel">Ẩn Thương Hiệu ?</h5>
                {*<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>*}
            </div>
            <div class="modal-body">
                <p>.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <a href="#" id="hideBrand"><button type="button" class="btn btn-primary">Xác nhận</button></a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_brand.js"></script>