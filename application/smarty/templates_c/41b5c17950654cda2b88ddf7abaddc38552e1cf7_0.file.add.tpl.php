<?php
/* Smarty version 4.0.0, created on 2022-01-11 06:54:00
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\product\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61dcc718eb9c10_57989847',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41b5c17950654cda2b88ddf7abaddc38552e1cf7' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\product\\add.tpl',
      1 => 1641858838,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61dcc718eb9c10_57989847 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
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

    .err_input {
        color: red;
        font-weight: 400;
        margin-top: 10px;
        font-size: 15px;
    }
    .input_error{
        border: 1px solid red; !important;
    }

</style>

<h3 class="title_content"><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h3>
<div class="mx-5 form_product">
    <form class="mx-5 my-5" onsubmit="onSubmitForm('<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'product','action'=>'add'));
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
') "
        method="post" id="formAdd" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Sản Phẩm <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value['name']))) {?>
                    <input type="text" class="form-control input_error" id="name" name="name" required value="<?php echo $_smarty_tpl->tpl_vars['error_value']->value['name'];?>
">
                <?php } else { ?>
                    <input type="text" class="form-control" id="name" name="name" required>
                <?php }?>
                <?php if ((isset($_smarty_tpl->tpl_vars['error_input']->value['name']))) {?>
                    <span class="err_input my-3"><?php echo $_smarty_tpl->tpl_vars['error_input']->value['name']['isEmpty'];?>
</span>
                <?php }?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mã Sản Phẩm</label>
            <div class="col-sm-10">
                <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value['product_code']))) {?>
                    <input type="text" class="form-control" id="product_code" name="product_code" value="<?php echo $_smarty_tpl->tpl_vars['error_value']->value['product_code'];?>
">
                <?php } else { ?>
                    <input type="text" class="form-control" id="product_code" name="product_code">
                <?php }?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Danh Mục <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <select class="form-control" id="category_id" name="category_id" required>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listCategory']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['category_name'];?>
</option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                        <?php if ((isset($_smarty_tpl->tpl_vars['error_input']->value['category_id']))) {?>
                            <span class="err_input my-3"><?php echo $_smarty_tpl->tpl_vars['error_input']->value['category_id']['noRecordFound'];?>
</span>
                        <?php }?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Giá <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value['price']))) {?>
                            <input type="number" class="form-control" id="price" name="price" value="<?php echo $_smarty_tpl->tpl_vars['error_value']->value['price'];?>
" required>
                        <?php } else { ?>
                            <input type="number" class="form-control" id="price" name="price" required>
                        <?php }?>
                        <?php if ((isset($_smarty_tpl->tpl_vars['error_input']->value['price']))) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['error_input']->value['price'], 'err');
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
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label ">Loại jack cắm</label>
                    <div class="col-sm-8">
                        <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value['jack']))) {?>
                            <input type="text" class="form-control" id="jack" name="jack" required value="<?php echo $_smarty_tpl->tpl_vars['error_value']->value['jack'];?>
">
                        <?php } else { ?>
                            <input type="text" class="form-control" id="jack" name="jack">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Kích thước</label>
                    <div class="col-sm-8">
                        <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value['size']))) {?>
                            <input type="text" class="form-control" id="size" name="size" value="<?php echo $_smarty_tpl->tpl_vars['error_value']->value['size'];?>
">
                        <?php } else { ?>
                            <input type="text" class="form-control" id="size" name="size">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Chiều dài dây</label>
                    <div class="col-sm-8">
                        <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value['length']))) {?>
                            <input type="text" class="form-control" id="length" name="length" value="<?php echo $_smarty_tpl->tpl_vars['error_value']->value['length'];?>
">
                        <?php } else { ?>
                            <input type="text" class="form-control" id="length" name="length">
                        <?php }?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Điều khiển <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value['control']))) {?>
                            <input type="text" class="form-control" id="control" name="control" value="<?php echo $_smarty_tpl->tpl_vars['error_value']->value['control'];?>
">
                        <?php } else { ?>
                            <input type="text" class="form-control" id="control" name="control">
                        <?php }?>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Thương Hiệu <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-control" id="brand_id" name="brand_id" required>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listBrand']->value, 'brand');
$_smarty_tpl->tpl_vars['brand']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['brand']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_name'];?>
</option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                        <?php if ((isset($_smarty_tpl->tpl_vars['error_input']->value['brand_id']))) {?>
                            <span class="err_input my-3"><?php echo $_smarty_tpl->tpl_vars['error_input']->value['brand_id']['noRecordFound'];?>
</span>
                        <?php }?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Số lượng <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value['quantily']))) {?>
                            <input type="number" class="form-control" id="quantily" name="quantily" value="<?php echo $_smarty_tpl->tpl_vars['error_value']->value['quantily'];?>
" required>
                        <?php } else { ?>
                            <input type="number" class="form-control" id="quantily" name="quantily" required>
                        <?php }?>

                        <?php if ((isset($_smarty_tpl->tpl_vars['error_input']->value['quantily']))) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['error_input']->value['quantily'], 'err_quantily');
$_smarty_tpl->tpl_vars['err_quantily']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err_quantily']->value) {
$_smarty_tpl->tpl_vars['err_quantily']->do_else = false;
?>
                                <span class="err_input my-3"><?php echo $_smarty_tpl->tpl_vars['err_quantily']->value;?>
</span><br>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Cổng sạc</label>
                    <div class="col-sm-9">
                        <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value['charging_port']))) {?>
                            <input type="text" class="form-control" id="charging_port" name="charging_port" value="<?php echo $_smarty_tpl->tpl_vars['error_value']->value['charging_port'];?>
">
                        <?php } else { ?>
                            <input type="text" class="form-control" id="charging_port" name="charging_port">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Khối lượng</label>
                    <div class="col-sm-9">
                        <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value['weight']))) {?>
                            <input type="text" class="form-control" id="weight" name="weight" value="<?php echo $_smarty_tpl->tpl_vars['error_value']->value['weight'];?>
">
                        <?php } else { ?>
                            <input type="text" class="form-control" id="weight" name="weight">
                        <?php }?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Tương thích</label>
                    <div class="col-sm-9">
                        <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value['compatible']))) {?>
                            <textarea rows="3" class="form-control" id="compatible" name="compatible"><?php echo $_smarty_tpl->tpl_vars['error_value']->value['compatible'];?>
</textarea>
                        <?php } else { ?>
                            <textarea rows="3" class="form-control" id="compatible" name="compatible"></textarea>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mô tả<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value['description']))) {?>
                    <textarea rows="3" class="form-control" id="description" name="description" required><?php echo $_smarty_tpl->tpl_vars['error_value']->value['description'];?>
</textarea>
                <?php } else { ?>
                    <textarea rows="3" class="form-control" id="description" name="description" required></textarea>
                <?php }?>
                <?php if ((isset($_smarty_tpl->tpl_vars['error_input']->value['description']))) {?>
                    <span class="err_input my-3"><?php echo $_smarty_tpl->tpl_vars['error_input']->value['description']['isEmpty'];?>
</span>
                <?php }?>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hình ảnh</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" id="product_image" name="product_image[]" multiple>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12 filearray"></div>
        </div>
        <div class="form-group row custom-control custom-checkbox ml-1">
            <input type="checkbox" class="custom-control-input" id="multiple_type" name="multiple_type">
            <label class="custom-control-label" for="multiple_type">Sản phẩm có nhiều màu sắc</label>
        </div>

        <div class="d-none" id="div_multiple_type">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nhập số phân loại màu sắc</label>
                <div class="col-sm-1">
                    <input type="number" class="form-control" id="number_type" name="number_type" min="0">
                </div>
            </div>
        </div>

        <div id="detail_type">
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

<?php if ((isset($_smarty_tpl->tpl_vars['error_input']->value))) {?>
var err_input = <?php echo json_encode($_smarty_tpl->tpl_vars['error_input']->value);?>
;
console.log(err_input);
$(document).ready(function() {
    $('input').each(function () {
    var i = $(this).prop('id');
    console.log(i);
    });
});
<?php }?>

    $(document).ready(function() {

        <?php if ((isset($_smarty_tpl->tpl_vars['error_input']->value))) {?>
            var err_input = <?php echo json_encode($_smarty_tpl->tpl_vars['error_input']->value);?>
;

           // console.log(err_input.category_id);
           
            $('input').each(function () {
                var i = $(this).prop('id');
                console.log(i);
                if(err_input.i !== undefined){
                    console.log(err_input.i);
                }
            });
        <?php }?>

        $('#product_image').change(function() {
            var flength = this.files.length;
            for (i = 0; i < flength; i++) {
                var filereader = new FileReader();
                filereader.onload = function(e) {
                    $('.filearray').append('<span class="pip" style="margin-right: 15px"> ' +
                            '<img src=' + e.target.result +
                            ' width=200 height=200/>' +
                            '<br/><span class="remove"><i class="fa fa-remove"></i> </span></span>')
                        .insertAfter(
                            "#files");
                    $(".remove").click(function() {
                        $(this).parent(".pip").remove();
                    });
                };
                filereader.readAsDataURL(this.files[i]);
            }
        });

        $('#multiple_type').on('change', function() {
            if ($('#multiple_type').is(":checked")) {
                $('#div_multiple_type').removeClass('d-none')
            } else {
                $('#div_multiple_type').addClass('d-none')
                $("#number_type").val('0');
                $('#detail_type').children('div').remove();
            }
        });

    });

    $('#div_multiple_type').change(function() {
        $('#detail_type').children('div').remove();
        var number_input = $('#number_type').val();
        for (x=1;x <= number_input;x++) {
            $('#detail_type').append(
            '<div class="form-group border rounded"> <div><label class="ml-2">Thông tin phân loại ' + x + '</label></div>' +
            '<div class="form-group row mx-2">' +
                '<div class="col-sm-4">' +
                    '<div class="form-group row">' +
                        '<label class="col-sm-4 col-form-label">Màu sắc<span class="text-danger">*</span></label>' +
                        '<div class="col-sm-8">' +
                        '<input type="text" required class="form-control" id="detail_color" name="detail_color['+x+']" required>' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group row">' +
                        '<label class="col-sm-4 col-form-label">Giá<span class="text-danger">*</span></label>' +
                        '<div class="col-sm-8">' +
                        '<input type="number" required class="form-control" id="detail_price" name="detail_price['+x+']" required>' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group row">' +
                        '<label class="col-sm-4 col-form-label">Số lượng<span class="text-danger">*</span></label>' +
                        '<div class="col-sm-8">' +
                        '<input type="text" required class="form-control" id="detail_quantily" name="detail_quantily['+x+']" required>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
                '<div class="col-sm-8">' +
                    '<label>Hình ảnh phân loại</label>' +
                    '<input type="file" onChange=getImage(this) class="form-control-file detail_image" id="'+x+'" name="detail_image_'+x+'[]" multiple>' +                      
                    '<div id="filearray_'+x+'"></div>'+
                '</div>' +
            '</div></div>'
            );
        }
    }); 
    function getImage(div_input){
        var id= $(div_input).attr('id');
        var id_div= '#filearray_'+id;
        var dlength = $(div_input).prop('files').length;
        for (i = 0; i < dlength; i++) {
            var filereader = new FileReader();
            filereader.onload = function(e) {
                $(id_div).append('<span class="pip" style="margin-right: 15px"> ' +
                        '<img src=' + e.target.result +
                        ' width=120 height=120 />' +
                        '<br/><span class="remove"><i class="fa fa-remove"></i> </span></span>')
                    .insertAfter(
                        "#files");
                $(".remove").click(function() {
                    $(this).parent(".pip").remove();
                });
            };
            filereader.readAsDataURL($(div_input).prop('files')[i]);
        }
    }   
<?php echo '</script'; ?>
><?php }
}
