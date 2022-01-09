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
</style>
<h3 class="title_content">{$this->title}</h3>
<div class="mx-5 form_product">
    <form class="mx-5 my-5" onsubmit="onSubmitForm('{{$this->url(['controller' => 'product', 'action' => 'add'])}}') "
        method="post" id="formAdd" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Sản Phẩm</label>
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
                    <label class="col-sm-4 col-form-label">Danh Mục</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="category_id" name="category_id" required>
                            {foreach $listCategory as $category}
                                <option value="{$category.id}">{$category.category_name}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Giá</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label ">Loại jack cắm</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="jack" name="jack" required>
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
                    <label class="col-sm-4 col-form-label">Điều khiển</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="control" name="control">
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Thương Hiệu</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="brand_id" name="brand_id" required>
                            {foreach $listBrand as $brand}
                                <option value="{$brand.id}">{$brand.brand_name}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Số lượng</label>
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
                    <label class="col-sm-3 col-form-label text-right">Tương thích</label>
                    <div class="col-sm-9">
                        <textarea rows="3" class="form-control" id="compatible" name="compatible" required></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mô tả</label>
            <div class="col-sm-10">
                <textarea rows="3" class="form-control" id="description" name="description"></textarea>
            </div>
        </div>

        {*<div class="form-group form-check row ml-1">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
            <label class="form-check-label" for="exampleRadios1">Phân loại theo màu sắc</label>
        </div>
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
                        '<label class="col-sm-4 col-form-label">Màu sắc</label>' +
                        '<div class="col-sm-8">' +
                        '<input type="text" required class="form-control" id="detail_color" name="detail_color['+x+']">' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group row">' +
                        '<label class="col-sm-4 col-form-label">Giá</label>' +
                        '<div class="col-sm-8">' +
                        '<input type="number" required class="form-control" id="detail_price" name="detail_price['+x+']">' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group row">' +
                        '<label class="col-sm-4 col-form-label">Số lượng</label>' +
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