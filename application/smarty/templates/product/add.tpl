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
    <form class="mx-5 my-5" onsubmit="onSubmitForm('{{$this->url(['controller' => 'product', 'action' => 'add'])}}')"
          method="post" id="formAdd" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Sản Phẩm</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
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
                <textarea rows="3" class="form-control" id="description" name="description"></textarea>
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
        <div class="row my-3">
            <div class="col-md-12 filearray"></div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </div>
    </form>
</div>

<script>
    /*$(document).on('ready', () => {
        $("#product_image").on('change', function () {
            //var filereader = new FileReader();
            //var $img=jQuery.parseHTML("<img src=''>");
            //filereader.onload = function(){
            //      $img[0].src=this.result;
            //  };
            //   filereader.readAsDataURL(this.files[0]);
            // $(".filearray").append($img);
            arlert('dgdg');
        });
    });*/


    $(document).ready(function () {
        $('#product_image').change(function () {
            var leng=this.files.length;
            for(i=0; i<leng;i++) {
                var filereader = new FileReader();
                filereader.onload = function (e) {
                    $('.filearray').append('<img src=' + e.target.result + ' width=200 height=200 style="margin-right: 15px"/>');
                };
                filereader.readAsDataURL(this.files[i]);
            }
        });
    });
</script>