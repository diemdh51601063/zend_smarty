<style>
    .title_content {
        text-align: center;
    }

    .form_product {
        background-color: white;
        padding: 10px;
        border-radius: 10px;
    }

    .pip {
        display: inline-block;
        margin: 10px 10px 0 0;
    }

    .remove {
        display: block;
        background: #444;
        border: 1px solid black;
        color: white;
        text-align: center;
        cursor: pointer;
    }

    .remove:hover {
        background: white;
        color: black;
    }

    .err_input {
        color: red;
        font-weight: 400;
        margin-top: 10px;
        font-size: 15px;
    }
    .input_error{
        border: 1px solid red; !important;
    }

</style>

<h3 class="title_content">{$this->title}</h3>
<div class="mx-5 form_product">
    <form class="mx-5 my-5" onsubmit="onSubmitForm('{{$this->url(['controller' => 'product', 'action' => 'add'])}}') "
        method="post" id="formAdd" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Sản Phẩm <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                {if isset($error_value.name) }
                    <input type="text" class="form-control input_error" id="name" name="name" required value="{$error_value.name}">
                {else}
                    <input type="text" class="form-control" id="name" name="name" required>
                {/if}
                {if isset($error_input.name) }
                    <span class="err_input my-3">* {$error_input.name.isEmpty}</span>
                {/if}
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mã Sản Phẩm</label>
            <div class="col-sm-10">
                {if isset($error_value.product_code) }
                    <input type="text" class="form-control" id="product_code" name="product_code" value="{$error_value.product_code}">
                {else}
                    <input type="text" class="form-control" id="product_code" name="product_code">
                {/if}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Danh Mục <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <select class="form-control" id="category_id" name="category_id" required>
                            {foreach $listCategory as $category}
                                {if isset($error_value.name) }
                                    {else}
                                    {/if}
                                <option value="{$category.id}">{$category.category_name}</option>
                            {/foreach}
                        </select>
                        {if isset($error_input.category_id) }
                            <span class="err_input my-3">* {$error_input.category_id.noRecordFound}</span>
                        {/if}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Giá <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        {if isset($error_value.price) }
                            <input type="number" class="form-control" id="price" name="price" value="{$error_value.price}" required>
                        {else}
                            <input type="number" class="form-control" id="price" name="price" required>
                        {/if}
                        {if isset($error_input.price) }
                            {foreach $error_input.price as $err}
                                <span class="err_input my-3">* {$err}</span><br>
                            {/foreach}
                        {/if}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label ">Loại jack cắm</label>
                    <div class="col-sm-8">
                        {if isset($error_value.jack) }
                            <input type="text" class="form-control" id="jack" name="jack" required value="{$error_value.jack}">
                        {else}
                            <input type="text" class="form-control" id="jack" name="jack">
                        {/if}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Kích thước</label>
                    <div class="col-sm-8">
                        {if isset($error_value.size) }
                            <input type="text" class="form-control" id="size" name="size" value="{$error_value.size}">
                        {else}
                            <input type="text" class="form-control" id="size" name="size">
                        {/if}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Chiều dài dây</label>
                    <div class="col-sm-8">
                        {if isset($error_value.length) }
                            <input type="text" class="form-control" id="length" name="length" value="{$error_value.length}">
                        {else}
                            <input type="text" class="form-control" id="length" name="length">
                        {/if}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Điều khiển <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        {if isset($error_value.control) }
                            <input type="text" class="form-control" id="control" name="control" value="{$error_value.control}">
                        {else}
                            <input type="text" class="form-control" id="control" name="control">
                        {/if}
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Thương Hiệu <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-control" id="brand_id" name="brand_id" required>
                            {foreach $listBrand as $brand}
                                <option value="{$brand.id}">{$brand.brand_name}</option>
                            {/foreach}
                        </select>
                        {if isset($error_input.brand_id) }
                            <span class="err_input my-3">* {$error_input.brand_id.noRecordFound}</span>
                        {/if}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Số lượng <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        {if isset($error_value.quantily) }
                            <input type="number" class="form-control" id="quantily" name="quantily" value="{$error_value.quantily}" required>
                        {else}
                            <input type="number" class="form-control" id="quantily" name="quantily" required>
                        {/if}

                        {if isset($error_input.quantily) }
                            {foreach $error_input.quantily as $err_quantily}
                                <span class="err_input my-3">* {$err_quantily}</span><br>
                            {/foreach}
                        {/if}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Cổng sạc</label>
                    <div class="col-sm-9">
                        {if isset($error_value.charging_port) }
                            <input type="text" class="form-control" id="charging_port" name="charging_port" value="{$error_value.charging_port}">
                        {else}
                            <input type="text" class="form-control" id="charging_port" name="charging_port">
                        {/if}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Khối lượng</label>
                    <div class="col-sm-9">
                        {if isset($error_value.weight) }
                            <input type="text" class="form-control" id="weight" name="weight" value="{$error_value.weight}">
                        {else}
                            <input type="text" class="form-control" id="weight" name="weight">
                        {/if}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Tương thích</label>
                    <div class="col-sm-9">
                        {if isset($error_value.compatible) }
                            <textarea rows="3" class="form-control" id="compatible" name="compatible">{$error_value.compatible}</textarea>
                        {else}
                            <textarea rows="3" class="form-control" id="compatible" name="compatible"></textarea>
                        {/if}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mô tả<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                {if isset($error_value.description) }
                    <textarea rows="3" class="form-control" id="description" name="description" required>{$error_value.description}</textarea>
                {else}
                    <textarea rows="3" class="form-control" id="description" name="description" required></textarea>
                {/if}
                {if isset($error_input.description) }
                    <span class="err_input my-3">* {$error_input.description.isEmpty}</span>
                {/if}
            </div>
        </div>

        {*
         <div class="form-group row">
            <label for="inputtext3" class="col-sm-2 col-form-label">Chế độ bảo hành</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputtext3">
            </div>
        </div> *}

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hình ảnh</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" id="product_image" name="product_image[]" multiple>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12 filearray"></div>
        </div>
        <div class="form-group row custom-control custom-checkbox ml-1">
            <input type="checkbox" class="custom-control-input" id="multiple_type" name="multiple_type">
            <label class="custom-control-label" for="multiple_type">Sản phẩm có nhiều màu sắc</label>
        </div>

        <div class="d-none" id="div_multiple_type">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nhập số phân loại màu sắc</label>
                <div class="col-sm-1">
                    <input type="number" class="form-control" id="number_type" name="number_type" min="0">
                </div>
            </div>
        </div>

        <div class="form-group border rounded" id="detail_type">
        </div>

        <div class="form-group row">
            <div class="col-sm-10 mt-2">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#product_image').change(function() {
            var flength = this.files.length;
            for (i = 0; i < flength; i++) {
                var filereader = new FileReader();
                filereader.onload = function(e) {
                    $('.filearray').append('<span class="pip" style="margin-right: 15px"> ' +
                            '<img src=' + e.target.result +
                            ' width=200 height=200/>' +
                            '<br/><span class="remove"><i class="fa fa-remove"></i> </span></span>')
                        .insertAfter(
                            "#files");
                    $(".remove").click(function() {
                        $(this).parent(".pip").remove();
                    });
                };
                filereader.readAsDataURL(this.files[i]);
            }
        });

        $('#multiple_type').on('change', function() {
            if ($('#multiple_type').is(":checked")) {
                $('#div_multiple_type').removeClass('d-none')
            } else {
                $('#div_multiple_type').addClass('d-none')
                $("#number_type").val('0');
                $('#detail_type').children('div').remove();
            }
        });

    });

    $('#div_multiple_type').change(function() {
        $('#detail_type').children('div').remove();
        var number_input = $('#number_type').val();
        for (x=1;x <= number_input;x++) {
            $('#detail_type').append(
            '<div><label class="ml-2">Thông tin phân loại ' + x + '</label></div>' +
            '<div class="form-group row mx-2">' +
                '<div class="col-sm-4">' +
                    '<div class="form-group row">' +
                        '<label class="col-sm-4 col-form-label">Màu sắc<span class="text-danger">*</span></label>' +
                        '<div class="col-sm-8">' +
                        '<input type="text" required class="form-control" id="detail_color" name="detail_color['+x+']">' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group row">' +
                        '<label class="col-sm-4 col-form-label">Giá<span class="text-danger">*</span></label>' +
                        '<div class="col-sm-8">' +
                        '<input type="number" required class="form-control" id="detail_price" name="detail_price['+x+']">' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group row">' +
                        '<label class="col-sm-4 col-form-label">Số lượng<span class="text-danger">*</span></label>' +
                        '<div class="col-sm-8">' +
                        '<input type="text" required class="form-control" id="detail_quantily" name="detail_quantily['+x+']">' +
                        '</div>' +
                    '</div>' +
                '</div>' +
                '<div class="col-sm-8">' +
                    '<label>Hình ảnh phân loại</label>' +
                    '<input type="file" onChange=getImage(this) class="form-control-file detail_image" id="'+x+'" name="detail_image_'+x+'[]" multiple>' +                      
                    '<div id="filearray_'+x+'"></div>'+
                '</div>' +
            '</div>'
            );
        }
    }); 
    function getImage(div_input){
        var id= $(div_input).attr('id');
        var id_div= '#filearray_'+id;
        var dlength = $(div_input).prop('files').length;
        for (i = 0; i < dlength; i++) {
            var filereader = new FileReader();
            filereader.onload = function(e) {
                $(id_div).append('<span class="pip" style="margin-right: 15px"> ' +
                        '<img src=' + e.target.result +
                        ' width=120 height=120 />' +
                        '<br/><span class="remove"><i class="fa fa-remove"></i> </span></span>')
                    .insertAfter(
                        "#files");
                $(".remove").click(function() {
                    $(this).parent(".pip").remove();
                });
            };
            filereader.readAsDataURL($(div_input).prop('files')[i]);
        }
    }   
</script>