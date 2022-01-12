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

    .err_message {
        color: red;
        font-weight: 400;
        margin-top: 10px;
        font-size: 15px;
    }

    .input_border_error {
        border: 1px solid red !important;
    }

</style>
{if isset($list_detail_error_input) }
    {$list_detail_error_input|@var_dump}
{/if}
<h3 class="title_content">{$this->title}</h3>
<div class="mx-5 form_product">
    <form class="mx-5 my-5" onsubmit="onSubmitForm('{{$this->url(['controller' => 'product', 'action' => 'add'])}}') "
          method="post" id="formAdd" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Sản Phẩm <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mã Sản Phẩm</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="product_code" name="product_code">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Danh Mục <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <select class="form-control" id="category_id" name="category_id" required>
                            {foreach $listCategory as $category}
                                <option value="{$category.id}">{$category.category_name}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Giá <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label ">Loại jack cắm</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="jack" name="jack">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Kích thước</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="size" name="size">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Chiều dài dây</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="length" name="length">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Điều khiển <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="control" name="control" required>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Thương Hiệu <span
                                class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-control" id="brand_id" name="brand_id" required>
                            {foreach $listBrand as $brand}
                                <option value="{$brand.id}">{$brand.brand_name}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Số lượng <span
                                class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="quantily" name="quantily" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Cổng sạc</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="charging_port" name="charging_port">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Khối lượng</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="weight" name="weight">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Tương thích<span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <textarea rows="3" class="form-control" id="compatible" name="compatible" required></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mô tả<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <textarea rows="3" class="form-control" id="description" name="description" required></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hình ảnh</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" id="product_image" name="product_image[]" multiple>
                {if isset($error_image)}
                    {foreach $error_image as $err}
                        <span class="err_input my-3">{$err}</span><br>
                    {/foreach}
                {/if}
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

        <div id="detail_type">
        </div>

        <div class="form-group row">
            <div class="col-sm-10 mt-2">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
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

        {if isset($list_detail_error_input) }
            var number_type_value = $('#number_type').val();
            var list_detail_error_input = {$list_detail_error_input|@json_encode};
            showErrorInputDetail(number_type_value, list_detail_error_input)
        {/if}

        $('#product_image').change(function () {
            var flength = this.files.length;
            for (i = 0; i < flength; i++) {
                var filereader = new FileReader();
                filereader.onload = function (e) {
                    $('.filearray').append('<span class="pip" style="margin-right: 15px"> ' +
                        '<img src=' + e.target.result +
                        ' width=200 height=200/>' +
                        '<br/><span class="remove"><i class="fa fa-remove"></i> </span></span>')
                        .insertAfter(
                            "#files");
                    $(".remove").click(function () {
                        $(this).parent(".pip").remove();
                    });
                };
                filereader.readAsDataURL(this.files[i]);
            }
        });

        $('#multiple_type').on('change', function () {
            if ($('#multiple_type').is(":checked")) {
                $('#div_multiple_type').removeClass('d-none')
            } else {
                $('#div_multiple_type').addClass('d-none')
                $("#number_type").val('0');
                $('#detail_type').children('div').remove();
            }
        });

    });

    $('#div_multiple_type').change(function () {
        $('#detail_type').children('div').remove();
        var number_input = $('#number_type').val();
        for (x = 1; x <= number_input; x++) {
            $('#detail_type').append(
                '<div class="form-group border rounded"> <div><label class="ml-2">Thông tin phân loại ' + x + '</label></div>' +
                '<div class="form-group row mx-2">' +
                '<div class="col-sm-4">' +
                '<div class="form-group row">' +
                '<label class="col-sm-4 col-form-label">Màu sắc<span class="text-danger">*</span></label>' +
                '<div class="col-sm-8">' +
                '<input type="text" required class="form-control" id="detail_color" name="detail_color[' + x + ']" required>' +
                '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                '<label class="col-sm-4 col-form-label">Giá<span class="text-danger">*</span></label>' +
                '<div class="col-sm-8">' +
                '<input type="number" required class="form-control" id="detail_price" name="detail_price[' + x + ']" required>' +
                '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                '<label class="col-sm-4 col-form-label">Số lượng<span class="text-danger">*</span></label>' +
                '<div class="col-sm-8">' +
                '<input type="text" required class="form-control" id="detail_quantily" name="detail_quantily[' + x + ']" required>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-8">' +
                '<label>Hình ảnh phân loại</label>' +
                '<input type="file" onChange=getImage(this) class="form-control-file detail_image" id="' + x + '" name="detail_image_' + x + '[]" multiple>' +
                '<div id="filearray_' + x + '"></div>' +
                '</div>' +
                '</div></div>'
            );
        }
    });

    function getImage(div_input) {
        var id = $(div_input).attr('id');
        var id_div = '#filearray_' + id;
        var dlength = $(div_input).prop('files').length;
        for (i = 0; i < dlength; i++) {
            var filereader = new FileReader();
            filereader.onload = function (e) {
                $(id_div).append('<span class="pip" style="margin-right: 15px"> ' +
                    '<img src=' + e.target.result +
                    ' width=120 height=120 />' +
                    '<br/><span class="remove"><i class="fa fa-remove"></i> </span></span>')
                    .insertAfter(
                        "#files");
                $(".remove").click(function () {
                    $(this).parent(".pip").remove();
                });
            };
            filereader.readAsDataURL($(div_input).prop('files')[i]);
        }
    }


    function showErrorInputDetail(number_type_value, list_detail_error_input){

        $('#multiple_type').prop('checked', true);
        $('#div_multiple_type').removeClass('d-none');
        //for (x = 1; x <= number_type_value; x++)
       /* {
            $('#detail_type').append(
                '<div class="form-group border rounded"> <div><label class="ml-2">Thông tin phân loại ' + x + '</label></div>' +
                '<div class="form-group row mx-2">' +
                '<div class="col-sm-4">' +
                '<div class="form-group row">' +
                '<label class="col-sm-4 col-form-label">Màu sắc<span class="text-danger">*</span></label>' +
                '<div class="col-sm-8">' +
                '<input type="text" required class="form-control" id="detail_color[' + x + ']" name="detail_color[' + x + ']" required>' +
                '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                '<label class="col-sm-4 col-form-label">Giá<span class="text-danger">*</span></label>' +
                '<div class="col-sm-8">' +
                '<input type="number" required class="form-control" id="detail_price[' + x + ']" name="detail_price[' + x + ']" required>' +
                '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                '<label class="col-sm-4 col-form-label">Số lượng<span class="text-danger">*</span></label>' +
                '<div class="col-sm-8">' +
                '<input type="text" required class="form-control" id="detail_quantily[' + x + ']" name="detail_quantily[' + x + ']" required>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-8">' +
                '<label>Hình ảnh phân loại</label>' +
                '<input type="file" onChange=getImage(this) class="form-control-file detail_image" id="' + x + '" name="detail_image_' + x + '[]" multiple>' +
                '<div id="filearray_' + x + '"></div>' +
                '</div>' +
                '</div></div>'
            );

            $.each( list_detail_error_input, function(index, key_error) {
                $('#detail_type').each(function () {
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
        }*/
        //{
            $.each(list_detail_error_input, function(x, list_value) {
                console.log(x);
                $.each(list_value, function(input_id, err_value) {
                    console.log(input_id);
                    $.each(err_value, function(i, err) {
                        console.log(i + ":" + err);
                    });
                });
            })
        //}
    }
</script>