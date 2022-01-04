<h3 style="text-align: center;">{$this->title}</h3>
<div class= "mx-5" style="background-color: white; padding: 10px; border-radius: 10px;">
    <form class= "mx-5 my-5" onsubmit="onSubmitForm('{{$this->url(['controller' => 'brand', 'action' => 'add'])}}')" method="post" id="formAdd">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Thương Hiệu</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="brand_name" name="brand_name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mô Tả</label>
            <div class="col-sm-10">
                <textarea rows="3" class="form-control" id="brand_description" name="brand_description"> </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hình ảnh</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" id="brand_image" name="brand_image">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
    </form>
</div>