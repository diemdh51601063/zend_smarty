<style>
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

<h3 style="text-align: center;">{$this->title}</h3>

<div class="mx-5" style="background-color: white; padding: 10px; border-radius: 10px;">
    <form class="mx-5 my-3" onsubmit="onSubmitForm('{{$this->url(['controller' => 'brand', 'action' => 'add'])}}')"
        method="post" id="formAdd" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Thương Hiệu</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="brand_name" name="brand_name" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mô Tả</label>
            <div class="col-sm-10">
                <textarea rows="3" class="form-control" id="description" name="description"> </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hình ảnh</label>
            <div class="col-sm-10 upload_image">
                <input type="file" class="form-control-file" id="brand_image" name="brand_image" accept="image/png, image/gif, image/jpeg">
                {if isset($error_image)}
                    {foreach $error_image as $err}
                        <span class="err_input my-3">{$err}</span><br>
                    {/foreach}
                {/if}
            </div>
            <div class="row">
                <div class="col-md-12 filearray"></div>
            </div>
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
        {if isset($error_value) }
            {if !empty($error_value.image) }
                var filereader = new FileReader();
                $('.filearray').append('<span class="pip" >' +
                    '<img id="myimg" src="../../asset/images/brands/{{$error_value.image}}"' +
                    ' width=150 height=150/>' +
                    '<br/><span class="remove"><i class="fa fa-remove"></i> </span></span>').insertAfter(
                    "#files");
                $(".remove").click(function () {
                    $(this).parent(".pip").remove();
                });
            {/if}
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

        $('#brand_image').change(function() {
            var flength = this.files.length;
            if (flength === 1) {
                $('.filearray').children("span").remove();
                $('.upload_image').children("span").remove();
                var filereader = new FileReader();
                filereader.onload = function(e) {
                    $('.filearray').append('<span class="pip" >' +
                            '<img src=' + e.target.result +
                            ' width=150 height=150 />' +
                            '<br/><span class="remove"><i class="fa fa-remove"></i> </span></span>')
                        .insertAfter(
                            "#files");
                    $(".remove").click(function() {
                        $(this).parent(".pip").remove();
                    });
                };
                filereader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>