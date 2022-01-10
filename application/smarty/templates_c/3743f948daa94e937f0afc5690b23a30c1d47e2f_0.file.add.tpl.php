<?php
/* Smarty version 4.0.0, created on 2022-01-10 19:41:24
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\brand\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61dc2974a8a0d3_62742629',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3743f948daa94e937f0afc5690b23a30c1d47e2f' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\brand\\add.tpl',
      1 => 1641818481,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61dc2974a8a0d3_62742629 (Smarty_Internal_Template $_smarty_tpl) {
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
    <form class="mx-5 my-3" onsubmit="onSubmitForm('<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'brand','action'=>'add'));
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
')"
        method="post" id="formAdd" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Thương Hiệu</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="brand_name" name="brand_name" required>
                <?php if ((isset($_smarty_tpl->tpl_vars['error_input']->value['brand_name']))) {?>
                    <span class="err_input">* <?php echo $_smarty_tpl->tpl_vars['error_input']->value['brand_name']['isEmpty'];?>
</span>
                <?php }?>
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
            <div class="col-sm-10">
                <input type="file" class="form-control-file" id="brand_image" name="brand_image">
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

<?php echo '<script'; ?>
>
    $(document).ready(function() {
        $('#brand_image').change(function() {
            var flength = this.files.length;
            if (flength === 1) {
                var filereader = new FileReader();
                filereader.onload = function(e) {
                    $('.filearray').append('<span class="pip" style="margin-right: 15px"> ' +
                            '<img src=' + e.target.result +
                            ' width=150 height=150/>' +
                            '<br/><span class="remove"><i class="fa fa-remove"></i> </span></span>')
                        .insertAfter(
                            "#files");
                    $(".remove").click(function() {
                        $(this).parent(".pip").remove();
                    });
                };
                filereader.readAsDataURL(this.files[0]);
            } else {
                $('.filearray').append('<span class="err_input">* Chỉ được chọn 1 hình !!!</span>');
            }
        });
    });
<?php echo '</script'; ?>
><?php }
}
