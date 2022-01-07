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
    <form class="mx-5 my-5"
          onsubmit="onSubmitForm('{{$this->url(['controller' => 'product', 'action' => 'update'])}}?id={$detail_product.id}')"
          method="post" id="formAdd" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Sản Phẩm</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{$detail_product.name}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mã Sản Phẩm</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="product_code" name="product_code"
                       value="{$detail_product.product_code}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Danh Mục</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="category_id" name="category_id">
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
            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Thương Hiệu</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="brand_id" name="brand_id">
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
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mô tả</label>
            <div class="col-sm-10">
                <textarea rows="3" class="form-control" id="description" name="description"
                          value="{$detail_product.description}"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Giá</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="price" name="price" value="{$detail_product.price}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Số lượng</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="quantily" name="quantily"
                       value="{$detail_product.quantily}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Cổng sạc</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="charging_port" name="charging_port"
                       value="{$detail_product.charging_port}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kích thước</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="size" name="size" value="{$detail_product.size}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Khối lượng</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="weight" name="weight" value="{$detail_product.weight}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Loại jack cắm</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="jack" name="jack" value="{$detail_product.jack}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Chiều dài dây</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="length" name="length" value="{$detail_product.length}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Điều khiển</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="control" name="control" value="{$detail_product.control}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tương thích</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="compatible" name="compatible"
                       value="{$detail_product.compatible}">
            </div>
        </div>
        {* <div class="form-group row">
            <label for="inputtext3" class="col-sm-2 col-form-label">Chế độ bảo hành</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputtext3">
            </div>
        </div> *}

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hình ảnh</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" id="product_image" name="product_image[]"  multiple>
            </div>
        </div>
        <input type="hidden" class="form-control-file" name="product_image_delete_id" id="product_image_delete_id">
        <div class="row">
            <div class="col-md-12 filearray"></div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </form>
</div>


<script>

    $(document).ready(function () {
        var list_image = {$image_product|json_encode};
        var list_image_length = {$image_product|@count};
        if (list_image_length > 0) {
            for (i = 0; i < list_image_length; i++) {
                var filereader = new FileReader();
                $('.filearray').append('<span class="pip"> ' + '<input type="hidden" class="form-control-file" id="product_image_id" name="product_image_id['+i+']" value="'+i+'">'+
                    '<img id="myimg" src=../../asset/images/products/' + list_image[i].image +
                    ' width=200 height=200 style="margin-right: 15px"/>' +
                    '<br/><span class="remove" ><i class="fa fa-remove"></i> </span></span>').insertAfter(
                    "#files");
                $(".remove").click(function () {
                    $(this).parent(".pip").remove();
                    //setStorage(list_image[i].id, list_image[i].image);
                });
            }

        }

        $('#product_image').change(function () {
            var flength = this.files.length;
            for (i = 0; i < flength; i++) {
                var filereader = new FileReader();
                filereader.onload = function (e) {
                    $('.filearray').append('<span class="pip"> ' +
                        '<img src=' + e.target.result +
                        ' width=200 height=200 style="margin-right: 15px"/>' +
                        '<br/><span class="remove"><i class="fa fa-remove"></i> </span></span>').insertAfter(
                        "#files");
                    $(".remove").click(function () {
                        $(this).parent(".pip").remove();
                    });
                };
                filereader.readAsDataURL(this.files[i]);
            }
        });
    });

    function removeImgExist(){
        //var obj_id = $(this).getAttribute('data-id');
        //var obj_img = $(this).getAttribute('data-img');
        $(this).parent(".pip").remove();
        //setStorage(obj_id, obj_img);
    }

    function setStorage(id, image) {
        sessionStorage.setItem(id, JSON.stringify(image));
    }
</script>