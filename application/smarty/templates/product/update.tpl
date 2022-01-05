<style>
    .title_content {
        text-align: center;
    }

    .form_product {
        background-color: white;
        padding: 10px;
        border-radius: 10px;
    }
</style>

<h3 class="title_content">{$this->title}</h3>
<div class="mx-5 form_product">
    <form class="mx-5 my-5" onsubmit="onSubmitForm('{{$this->url(['controller' => 'product', 'action' => 'update'])}}')"
        method="post" id="formAdd" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Sản Phẩm</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="product_name" name="product_name">
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
                        <select class="form-control" id="category_id" name="category_id">
                            {foreach $listCategory as $category}
                                <option value="{$category.id}">{$category.category_name}</option>
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
                            {foreach $listBrand as $brand}
                                <option value="{$brand.id}">{$brand.brand_name}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mô tả</label>
            <div class="col-sm-10">
                <textarea rows="3" class="form-control" id="product_description" name="product_description"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Giá</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="price" name="price">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Số lượng</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="quantily" name="quantily">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Cổng sạc</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="charging_port" name="charging_port">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Kích thước</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="size" name="size">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Khối lượng</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="weight" name="weight">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Loại jack cắm</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="jack" name="jack">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Chiều dài dây</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="length" name="length">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Điều khiển</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="control" name="control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tương thích</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="compatible" name="compatible">
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
                <input type="file" class="form-control-file" id="product_image" name="product_image[]" multiple>
            </div>
        </div>
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
    $(document).ready(function(){
        var detail_product = JSON.parse(sessionStorage.getItem("detail_product"));
        $("#product_name").val(detail_product.name);
        $("#product_code").val(detail_product.product_code);
        $("#category_id").val(detail_product.category_id).change();
        $("#brand_id").val(detail_product.brand_id).change();
        $("#product_description").val(detail_product.description);
        $("#price").val(detail_product.price);
        $("#quantily").val(detail_product.quantily);
        $("#charging_port").val(detail_product.charging_port);
        $("#size").val(detail_product.size);
        $("#weight").val(detail_product.weight);
        $("#jack").val(detail_product.jack);
        $("#length").val(detail_product.length);
        $("#control").val(detail_product.control);
        $("#compatible").val(detail_product.compatible);
        console.log(detail_product);
    });
</script>