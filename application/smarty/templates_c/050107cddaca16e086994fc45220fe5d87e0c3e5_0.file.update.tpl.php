<?php
/* Smarty version 4.0.0, created on 2022-01-10 23:16:36
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\brand\update.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61dc5be4e6a6d7_37398677',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '050107cddaca16e086994fc45220fe5d87e0c3e5' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\brand\\update.tpl',
      1 => 1641831393,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61dc5be4e6a6d7_37398677 (Smarty_Internal_Template $_smarty_tpl) {
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
        nsubmit="onSubmitForm('<?php ob_start();
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
">
                <?php if ((isset($_smarty_tpl->tpl_vars['error_input']->value['brand_name']))) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['error_input']->value['brand_name'], 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
                        <span class="err_input">* <?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</span><br>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputtext3" class="col-sm-2 col-form-label">Mô Tả</label>
            <div class="col-sm-10">
                <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value['description']))) {?>
                    <textarea rows="3" class="form-control" id="description" name="description"><?php echo $_smarty_tpl->tpl_vars['error_value']->value['description'];?>
</textarea>
                <?php } else { ?>
                    <textarea rows="3" class="form-control" id="description" name="description"><?php echo $_smarty_tpl->tpl_vars['detail_brand']->value['description'];?>
</textarea>
                <?php }?>
                
                <?php if ((isset($_smarty_tpl->tpl_vars['error_input']->value['brand_name']))) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['error_input']->value['brand_name'], 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
                        <span class="err_input">* <?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</span><br>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hình ảnh</label>
            <div class="col-sm-10 upload_image">
                <input onclick="checkImageExist()" type="file" class="form-control-file" id="brand_image"
                    name="brand_image">
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
    $(document).ready(function() {
        <?php if (!empty($_smarty_tpl->tpl_vars['detail_brand']->value['image'])) {?>;    
            var filereader = new FileReader();
            $('.brand_image_file').append('<span class="pip" ' +
                '<img id="myimg" src=../../asset/images/brands/<?php ob_start();
echo $_smarty_tpl->tpl_vars['detail_brand']->value['image'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
'+
                ' width=150 height=150/>' +
                '<br/><span class="remove"><i class="fa fa-remove"></i> </span></span>').insertAfter(
                "#files");
            $(".remove").click(function() {
                $(this).parent(".pip").remove();
                $('#brand_image').prop('disabled', false);
                $('.upload_image').children('span').remove();
            });
        <?php }?>



        $('#brand_image').change(function() {
            var flength = this.files.length;
            if (flength === 1) {
                var filereader = new FileReader();
                filereader.onload = function(e) {
                    $('.brand_image_file').append('<span class="pip" ' +
                            '<img src=' + e.target.result +
                            ' width=150 height=150/>' +
                            '<br/><span class="remove"><i class="fa fa-remove"></i> </span></span>')
                        .insertAfter(
                            "#files");
                    $(".remove").click(function() {
                        $(this).parent(".pip").remove();
                        $('#brand_image').prop('disabled', false);
                        $('.upload_image').children('span').remove();
                    });
                };
                filereader.readAsDataURL(this.files[0]);
            } else {
                $('.brand_image_file').append(
                    '<span class="err_input">* Chỉ được chọn 1 hình !!!</span>');
            }
        });
    });

    function checkImageExist() {
        if ($('.brand_image_file').is(':empty')) {

        } else {
            $('#brand_image').prop('disabled', true);
            $('.upload_image').append('<span class="err_input">* Chỉ được chọn 1 hình !!!</span>');
        }
    }
<?php echo '</script'; ?>
><?php }
}
