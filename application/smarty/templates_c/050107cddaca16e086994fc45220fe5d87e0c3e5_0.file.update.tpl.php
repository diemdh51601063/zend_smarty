<?php
/* Smarty version 4.0.0, created on 2022-01-20 06:41:08
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\brand\update.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61e8a194e9b305_71867286',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '050107cddaca16e086994fc45220fe5d87e0c3e5' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\brand\\update.tpl',
      1 => 1642424473,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e8a194e9b305_71867286 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
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

<h3 style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h3>
<div class="mx-5" style="background-color: white; padding: 10px; border-radius: 10px;">
    <form class="mx-5 my-5"
          onsubmit="onSubmitForm('<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'brand','action'=>'update'));
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
?id=<?php echo $_smarty_tpl->tpl_vars['detail_brand']->value['id'];?>
')"
          method="post" id="formAdd" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Thương Hiệu</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="brand_name" name="brand_name"
                       value="<?php echo $_smarty_tpl->tpl_vars['detail_brand']->value['brand_name'];?>
" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputtext3" class="col-sm-2 col-form-label">Mô Tả</label>
            <div class="col-sm-10">
                <textarea rows="3" class="form-control" id="description"
                          name="description"><?php echo $_smarty_tpl->tpl_vars['detail_brand']->value['description'];?>
</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hình ảnh</label>
            <div class="col-sm-10 upload_image">
                <input type="file" class="form-control-file" id="brand_image" name="brand_image" accept="image/png, image/gif, image/jpeg">
                <?php if ((isset($_smarty_tpl->tpl_vars['error_image']->value))) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['error_image']->value, 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
                        <span class="err_input my-3"><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</span><br>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
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

<?php echo '<script'; ?>
>
    $(document).ready(function () {
        <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value))) {?>
            var err_value = <?php echo json_encode($_smarty_tpl->tpl_vars['error_value']->value);?>
;
            $.each(err_value, function (key, value) {
                $('.form-control').each(function () {
                    if ($(this).prop('id') == key) {
                        var id_div_input = '#' + key;
                        $(id_div_input).val(value);
                    }
                });
            });
        <?php }?>

        <?php if ((isset($_smarty_tpl->tpl_vars['error_input']->value))) {?>
            var err_input = <?php echo json_encode($_smarty_tpl->tpl_vars['error_input']->value);?>
;
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
        <?php }?>

        <?php if (!empty($_smarty_tpl->tpl_vars['detail_brand']->value['image'])) {?>
            var filereader = new FileReader();
            $('.brand_image_file').append('<span class="pip" >' +
                '<img id="myimg" src="../../asset/images/brands/<?php ob_start();
echo $_smarty_tpl->tpl_vars['detail_brand']->value['image'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
"' +
                ' width=150 height=150/>' +
                '<br/><span class="remove"><i class="fa fa-remove"></i> </span></span>').insertAfter(
                "#files");
            $(".remove").click(function () {
                $('.brand_image_file').append('<input type="hidden" class="form-control" id="delete_brand_image" name="delete_brand_image" value="1" >');
                $(this).parent(".pip").remove();
            });
        <?php }?>



        $('#brand_image').change(function () {
            $('.brand_image_file').children("span").remove();
            $('.brand_image_file').append('<input type="hidden" class="form-control" id="delete_brand_image" name="delete_brand_image" value="1" >');
            $('.upload_image').children("span").remove();
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
                    $('#brand_image').val('');
                });
            };
            filereader.readAsDataURL(this.files[0]);
        });
    });

<?php echo '</script'; ?>
><?php }
}
