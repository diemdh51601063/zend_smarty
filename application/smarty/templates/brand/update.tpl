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
{if isset($error_input) }
    {$error_input|@var_dump}
{/if}
<h3 style="text-align: center;">{$this->title}</h3>
<div class="mx-5" style="background-color: white; padding: 10px; border-radius: 10px;">
    <form class="mx-5 my-5"
          onsubmit="onSubmitForm('{{$this->url(['controller' => 'brand', 'action' => 'update'])}}?id={$detail_brand.id}')"
          method="post" id="formAdd" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Thương Hiệu</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="brand_name" name="brand_name"
                       value="{$detail_brand.brand_name}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputtext3" class="col-sm-2 col-form-label">Mô Tả</label>
            <div class="col-sm-10">
                <textarea rows="3" class="form-control" id="description"
                          name="description">{$detail_brand.description}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hình ảnh</label>
            <div class="col-sm-10 upload_image">
                <input type="file" class="form-control-file" id="brand_image" name="brand_image">
            </div>
            <div class="row">
                <div class="col-md-12 brand_image_file"></div>
            </div>
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
        {if isset($error_value) }
            var err_value = {$error_value|json_encode};
            $.each(err_value, function (key, value) {
                $('.form-control').each(function () {
                    if ($(this).prop('id') == key) {
                        var id_div_input = '#' + key;
                        $(id_div_input).val(value);
                    }
                });
            });
        {/if}

        {if isset($error_input) }
            var err_input = {$error_input|json_encode};
            $.each(err_input, function (key, value) {
                $('.form-control').each(function () {
                    if ($(this).prop('id') == key) {
                        var id_div_input = '#' + key;
                        $.each(value, function (k, v) {
                            console.log(k + ": " + v);
                            $(id_div_input).addClass('input_error');
                            $(id_div_input).after('<span class="err_input">' + v + '</span><br>');
                        })
                    }
                });
            });
        {/if}

        {if !empty($detail_brand.image) }
            var filereader = new FileReader();
            $('.brand_image_file').append('<span class="pip" >' +
                '<img id="myimg" src="../../asset/images/brands/{{$detail_brand.image}}"' +
                ' width=150 height=150/>' +
                '<br/><span class="remove"><i class="fa fa-remove"></i> </span></span>').insertAfter(
                "#files");
            $(".remove").click(function () {
                $('.brand_image_file').append('<input type="hidden" class="form-control" id="delete_brand_image" name="delete_brand_image" value="1" >');
                $(this).parent(".pip").remove();
            });
        {/if}



        $('#brand_image').change(function () {
            $('.brand_image_file').children("span").remove();
            var filereader = new FileReader();
            filereader.onload = function (e) {
                $('.brand_image_file').append('<span class="pip">' +
                    '<img src=' + e.target.result +
                    ' width=150 height=150/>' +
                    '<br/><span class="remove"><i class="fa fa-remove"></i> </span></span>')
                    .insertAfter(
                        "#files");
                $(".remove").click(function () {
                    $(this).parent(".pip").remove();
                });
            };
            filereader.readAsDataURL(this.files[0]);
        });
    });

</script>