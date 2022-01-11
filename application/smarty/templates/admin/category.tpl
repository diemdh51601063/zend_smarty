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
                <td style="text-align: right">
                    <a href="{{$this->url(['controller' => 'category', 'action' => 'update'])}}?id={$category.id}">
                        <button class="btn btn-primary button_width" style="margin-right: 10px">Cập nhật</button>
                    </a>
                    {*{if $category.status == 1 }
                        <button class="btn-sm btn-danger button_width" data-toggle="modal" data-target="#hideCategoryModal">Ẩn
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

<div class="modal fade" id="hideCategoryModal" tabindex="-1" role="dialog" aria-labelledby="hideCategoryModallabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hideCategoryModallabel">Ẩn Danh Mục ?</h5>
                {*<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>*}
            </div>
            <div class="modal-body">
                <p>Các sản phẩm thuộc danh mục sẽ hiển thị trong danh mục <b>"Khác"</b>.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <a href="#" id="hideCategory"><button type="button" class="btn btn-primary">Xác nhận</button></a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_category.js"></script>