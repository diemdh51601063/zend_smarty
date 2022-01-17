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

    label {
        font-weight: 600;
    }

</style>

<h3 class="title_content">{$this->title}</h3>

<div class="mx-5 form_product">
    <form class="mx-5 my-3" onsubmit="onSubmitForm('{{$this->url(['controller' => 'product', 'action' => 'update'])}}?id={$detail_product.id}')"
        method="post" id="formAdd" enctype="multipart/form-data">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Sản Phẩm<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{$detail_product.name}" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mã Sản Phẩm</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="product_code" name="product_code" value="{$detail_product.product_code}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Danh Mục<span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <select class="form-control" id="category_id" name="category_id" required>
                            {foreach $list_category as $category}
                                {if $detail_product.category_id == $category.id }
                                    <option value="{$category.id}" selected>{$category.category_name}</option>
                                {else}
                                    <option value="{$category.id}">{$category.category_name}</option>
                                {/if}
                            {/foreach}
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Giá<span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="price" name="price" value="{$detail_product.price}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label ">Loại jack cắm</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="jack" name="jack" value="{$detail_product.jack}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Kích thước</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="size" name="size" value="{$detail_product.size}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Chiều dài dây</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="length" name="length" value="{$detail_product.length}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Điều khiển <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="control" name="control" value="{$detail_product.control}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Thương Hiệu <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-control" id="brand_id" name="brand_id" required>
                            {foreach $list_brand as $brand}
                                {if $detail_product.brand_id == $brand.id }
                                    <option value="{$brand.id}" selected>{$brand.brand_name}</option>
                                {else}
                                    <option value="{$brand.id}">{$brand.brand_name}</option>
                                {/if}
                            {/foreach}
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Số lượng <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="quantily" name="quantily" value="{$detail_product.quantily}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Cổng sạc</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="charging_port" name="charging_port" value="{$detail_product.charging_port}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Khối lượng</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="weight" name="weight" value="{$detail_product.weight}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Tương thích</label>
                    <div class="col-sm-9">
                        <textarea rows="3" class="form-control" id="compatible" name="compatible">{$detail_product.compatible}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mô tả <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <textarea rows="3" class="form-control" id="description" name="description">{$detail_product.description}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hình ảnh</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" id="product_image" name="product_image[]" multiple accept="image/png, image/gif, image/jpeg">
                {if isset($error_image)}
                    {foreach $error_image as $err}
                        <span class="err_input my-3">{$err}</span><br>
                    {/foreach}
                {/if}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 filearray"></div>
        </div>


        <div class="form-group row custom-control custom-checkbox ml-1 mt-4">
            {if $list_type_product|@count > 0}
                <input type="checkbox" class="custom-control-input" id="multiple_type" name="multiple_type" checked>
            {else}
                <input type="checkbox" class="custom-control-input" id="multiple_type" name="multiple_type">
            {/if}
            <label class="custom-control-label" for="multiple_type">Sản phẩm có nhiều màu sắc</label>
        </div>

        
        <div id="div_multiple_type" onchange="renderInputType()">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Số phân loại màu sắc</label>
                <div class="col-sm-1">
                    <input type="number" class="form-control" id="number_type" name="number_type" min="0"
                        value="{$list_type_product|@count}">
                </div>
            </div>
        </div>

        <div id="detail_type">
            {foreach from=$list_type_product key=key item=type_product}
                <div class="form-group border rounded"  data="{$type_product.id}">
                    <div>
                        <label class="ml-2 mt-3">Thông tin phân loại {$key+1}</label>
                    </div>
                    <div class="form-group row mx-2">
                        <div class="col-sm-4">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Màu sắc <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="detail_color" name="detail_color[{$type_product.id}]" value="{$type_product.color}" maxlength="30" minlength="2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Giá <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="detail_price" name="detail_price[{$type_product.id}]" value="{$type_product.price}" required min="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Số lượng <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="detail_quantily" name="detail_quantily[{$type_product.id}]" value="{$type_product.quantily}" required min="0">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <label>Hình ảnh phân loại</label>
                            <input type="file" onChange=getImage(this) class="form-control-file detail_image"
                                id="{$type_product.id}" name="detail_image_{$type_product.id}[]" multiple accept="image/png, image/gif, image/jpeg">
                            <div id="filearray_{$type_product.id}"></div>
                        </div>
                    </div>
                </div>
            {/foreach}
        </div>


        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>

    </form>
</div>


<script>
    $(document).ready(function() {
        if($('#number_type').val() === 0){
            $('#div_multiple_type').addClass('d-none');
        }
        {if isset($error_value) }
            var err_value = {$error_value|json_encode};
            $.each( err_value, function(key, value) {
                $('.form-control').each(function () {
                    if($(this).prop('id') == key){
                        var id_div_input = '#'+key;
                        $(id_div_input).val(value);
                    }
                });
            });
        {/if}

        {if isset($error_input) }
            var err_input = {$error_input|json_encode};
            $.each( err_input, function(key, value) {
                $('.form-control').each(function () {
                    if($(this).prop('id') == key){
                        var id_div_input = '#'+key;
                        $.each( value, function(k, v) {
                            console.log(k + ": " + v);
                            $(id_div_input).addClass('input_error');
                            $(id_div_input).after('<span class="err_input my-3">'+v+'</span><br>');
                        })
                    }
                });
            });
        {/if}
        
        var list_image = {$image_product|json_encode};
        var list_image_length = {$image_product|@count};
        if (list_image_length > 0) {
            for (i = 0; i < list_image_length; i++) {
                var filereader = new FileReader();
                $('.filearray').append('<span class="pip" style="margin-right: 15px"> ' +
                    '<img id="myimg" src=../../asset/images/products/' + list_image[i].image +
                    ' width=200 height=200/>' +
                    '<br/><span class="remove" data="' + list_image[i].id +
                    '" ><i class="fa fa-remove"></i> </span></span>').insertAfter(
                    "#files");
                $(".remove").click(function() {
                    var id_image = $(this).attr("data");
                    $('.filearray').append(
                        '<input type="hidden" class="form-control-file" id="product_image_delete_id" name="product_image_delete_id[' +
                        id_image + ']" value="' + id_image + '">');
                    $(this).parent(".pip").remove();
                });
            }

        }

        $('#product_image').change(function() {
            var current_count_image = $('.filearray').children().length;
            var flength = this.files.length;
            if (current_count_image + flength <= 5)
            {
                $('.filearray').children('.err_img').remove();
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
            }else{
                $('.filearray').append('<span class="err_input err_img">Chỉ được chọn tối đa 5 hình !!!</span>')
            }
        });


        var list_type_image = {$list_image_type_product|json_encode};
        var list_type_image_length = {$list_image_type_product|@count};
        if (list_type_image_length > 0) {
            for (k = 0; k < list_type_image_length; k++) {
                var filereader = new FileReader();
                $('#filearray_' + list_type_image[k].product_detail_id).append(
                    '<span class="pip" style="margin-right: 15px"> ' +
                    '<img id="myimg" src=../../asset/images/products/' + list_type_image[k].image +
                    ' width=120 height=120/>' +
                    '<br/><span class="remove" data="' + list_type_image[k].id +
                    '" ><i class="fa fa-remove"></i> </span></span>').insertAfter(
                    "#files");
                $(".remove").click(function() {
                    var id_type_image = $(this).attr("data");
                    $('.filearray').append(
                        '<input type="hidden" class="form-control-file" id="product_type_image_delete_id" name="product_type_image_delete_id[' +
                        id_type_image + ']" value="' + id_type_image + '">');
                    $(this).parent(".pip").remove();
                });
            }

        }

        $('#multiple_type').on('change', function() {
            if ($('#multiple_type').is(":checked")) {
                $('#div_multiple_type').removeClass('d-none')
            } else {
                if( {$list_type_product|@count} === 0){
                    $('#div_multiple_type').addClass('d-none')
                    $("#number_type").val('0');
                    $('#detail_type').children('div').remove();
                }else{
                    alert('không thể xóa phân loại');
                    $('#multiple_type').prop('checked', true);
                }
            }
        });
    });

    

    function renderInputType(){      
        if( {$list_type_product|@count} === 0){
            $('#detail_type').children('div').remove();
            var number_input = $('#number_type').val();
            for (x=1;x <= number_input;x++) {
                $('#detail_type').append('<div class="form-group border rounded"><div><label class="ml-2">Thông tin phân loại ' + x + '</label></div>' +
                '<div class="form-group row mx-2">' +
                    '<div class="col-sm-4">' +
                        '<div class="form-group row">' +
                            '<label class="col-sm-4 col-form-label">Màu sắc<span class="text-danger">*</span></label>' +
                            '<div class="col-sm-8">' +
                            '<input type="text" required class="form-control" id="detail_color" name="new_detail_color['+x+']" required maxlength="30" minlength="2">' +
                            '</div>' +
                        '</div>' +
                        '<div class="form-group row">' +
                            '<label class="col-sm-4 col-form-label">Giá<span class="text-danger">*</span></label>' +
                            '<div class="col-sm-8">' +
                            '<input type="number" required class="form-control" id="detail_price" name="new_detail_price['+x+']" required min="0">' +
                            '</div>' +
                        '</div>' +
                        '<div class="form-group row">' +
                            '<label class="col-sm-4 col-form-label">Số lượng<span class="text-danger">*</span></label>' +
                            '<div class="col-sm-8">' +
                            '<input type="number" required class="form-control" id="detail_quantily" name="new_detail_quantily['+x+']" required min="0">' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="col-sm-8">' +
                        '<label>Hình ảnh phân loại</label>' +
                        '<input type="file" onChange=getImage(this) class="form-control-file detail_image" id="'+x+'" name="new_detail_image_'+x+'[]" multiple accept="image/png, image/gif, image/jpeg">' +                      
                        '<div id="filearray_'+x+'"></div>'+
                    '</div>' +
                '</div></div>'
                );
            }
        }else{
            if($('#number_type').val() < {$list_type_product|@count} ){
                $('#number_type').val({$list_type_product|@count});
                alert('không thể xóa phân loại');
               // $('#div_multiple_type').append('<span class="text-danger">không thể xóa phân loại</span>');
            }else{
                var number_input = $('#number_type').val();
                $('#detail_type').children('.add_detail').remove();
                for (x={$list_type_product|@count}+1;x <= number_input;x++) {
                    $('#detail_type').append(
                    '<div class="form-group border rounded add_detail"><div><label class="ml-2">Thông tin phân loại ' + x + '</label></div>' +
                    '<div class="form-group row mx-2">' +
                        '<div class="col-sm-4">' +
                            '<div class="form-group row">' +
                                '<label class="col-sm-4 col-form-label">Màu sắc<span class="text-danger">*</span></label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" required class="form-control" id="detail_color" name="new_detail_color['+x+']" maxlength="30" minlength="2">' +
                                '</div>' +
                            '</div>' +
                            '<div class="form-group row">' +
                                '<label class="col-sm-4 col-form-label">Giá<span class="text-danger">*</span></label>' +
                                '<div class="col-sm-8">' +
                                '<input type="number" required class="form-control" id="detail_price" name="new_detail_price['+x+']" required min="0">' +
                                '</div>' +
                            '</div>' +
                            '<div class="form-group row">' +
                                '<label class="col-sm-4 col-form-label">Số lượng<span class="text-danger">*</span></label>' +
                                '<div class="col-sm-8">' +
                                '<input type="number" required class="form-control" id="detail_quantily" name="new_detail_quantily['+x+']" required min="0">' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="col-sm-8">' +
                            '<label>Hình ảnh phân loại</label>' +
                            '<input type="file" onChange=getImage(this) class="form-control-file detail_image" id="'+x+'" name="new_detail_image_'+x+'[]" multiple accept="image/png, image/gif, image/jpeg">' +                      
                            '<div id="filearray_'+x+'"></div>'+
                        '</div>' +
                    '</div></div>'
                    );
                }
                
            }  
        }
    }

    function getImage(div_input) {
        var id = $(div_input).attr('id');
        var div_show_image = '#filearray_' + id;
        var count_type_image = $(div_show_image).children().length;
        var dlength = $(div_input).prop('files').length;
        if(count_type_image + dlength <= 5){
            $(div_show_image).children('.err_img').remove();
            for (i = 0; i < dlength; i++) {
            var filereader = new FileReader();
            filereader.onload = function(e) {
                $(div_show_image).append('<span class="pip" style="margin-right: 15px"> ' +
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
        }else{
            $(div_show_image).append('<span class="err_input err_img">Chỉ được chọn tối đa 5 hình !!!</span>')
        }
    }
</script>