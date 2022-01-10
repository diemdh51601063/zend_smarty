<h3 style="text-align: center;">{$this->title}</h3>
<div class= "mx-5" style="background-color: white; padding: 10px; border-radius: 10px;">
    <form class= "mx-5 my-5" nsubmit="onSubmitForm('{{$this->url(['controller' => 'brand', 'action' => 'update'])}}?id={$detail_brand.id}')" method="post" id="formAdd" enctype="multipart/form-data">
        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Tên Thương Hiệu</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="brand_name" name="brand_name" value="{$detail_brand.brand_name}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputtext3" class="col-sm-2 col-form-label">Mô Tả</label>
            <div class="col-sm-10">
                <textarea rows="3" class="form-control" id="description" name="description">{$detail_brand.description}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hình ảnh</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" id="brand_image" name="brand_image">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </form>
</div>