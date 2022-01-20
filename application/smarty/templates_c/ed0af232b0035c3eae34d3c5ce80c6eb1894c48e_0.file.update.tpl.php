<?php
/* Smarty version 4.0.0, created on 2022-01-20 06:54:02
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\product\update.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61e8a49aa39a10_00053044',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed0af232b0035c3eae34d3c5ce80c6eb1894c48e' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\product\\update.tpl',
      1 => 1642636439,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e8a49aa39a10_00053044 (Smarty_Internal_Template $_smarty_tpl) {
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

    label {
        font-weight: 600;
    }

</style>

<h3 class="title_content"><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h3>

<div class="mx-5 form_product">
    <form class="mx-5 my-3" onsubmit="onSubmitForm('<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'product','action'=>'update'));
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
?id=<?php echo $_smarty_tpl->tpl_vars['detail_product']->value['id'];?>
')"
        method="post" id="formAdd" enctype="multipart/form-data">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Sản Phẩm<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['detail_product']->value['name'];?>
" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mã Sản Phẩm</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="product_code" name="product_code" value="<?php echo $_smarty_tpl->tpl_vars['detail_product']->value['product_code'];?>
">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Danh Mục<span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <select class="form-control" id="category_id" name="category_id" required>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_category']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                                <?php if ($_smarty_tpl->tpl_vars['detail_product']->value['category_id'] == $_smarty_tpl->tpl_vars['category']->value['id']) {?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['category']->value['category_name'];?>
</option>
                                <?php } else { ?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['category_name'];?>
</option>
                                <?php }?>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Giá<span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="price" name="price" value="<?php echo $_smarty_tpl->tpl_vars['detail_product']->value['price'];?>
" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label ">Loại jack cắm</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="jack" name="jack" value="<?php echo $_smarty_tpl->tpl_vars['detail_product']->value['jack'];?>
">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Kích thước</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="size" name="size" value="<?php echo $_smarty_tpl->tpl_vars['detail_product']->value['size'];?>
">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Chiều dài dây</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="length" name="length" value="<?php echo $_smarty_tpl->tpl_vars['detail_product']->value['length'];?>
">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Điều khiển <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="control" name="control" value="<?php echo $_smarty_tpl->tpl_vars['detail_product']->value['control'];?>
">
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Thương Hiệu <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-control" id="brand_id" name="brand_id" required>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_brand']->value, 'brand');
$_smarty_tpl->tpl_vars['brand']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->do_else = false;
?>
                                <?php if ($_smarty_tpl->tpl_vars['detail_product']->value['brand_id'] == $_smarty_tpl->tpl_vars['brand']->value['id']) {?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['brand']->value['id'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_name'];?>
</option>
                                <?php } else { ?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['brand']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_name'];?>
</option>
                                <?php }?>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Số lượng <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="quantily" name="quantily" value="<?php echo $_smarty_tpl->tpl_vars['detail_product']->value['quantily'];?>
" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Cổng sạc</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="charging_port" name="charging_port" value="<?php echo $_smarty_tpl->tpl_vars['detail_product']->value['charging_port'];?>
">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Khối lượng</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="weight" name="weight" value="<?php echo $_smarty_tpl->tpl_vars['detail_product']->value['weight'];?>
">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label text-right">Tương thích</label>
                    <div class="col-sm-9">
                        <textarea rows="3" class="form-control" id="compatible" name="compatible"><?php echo $_smarty_tpl->tpl_vars['detail_product']->value['compatible'];?>
</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mô tả <span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <textarea rows="3" class="form-control" id="description" name="description"><?php echo $_smarty_tpl->tpl_vars['detail_product']->value['description'];?>
</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Hình ảnh</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" id="product_image" name="product_image[]" multiple accept="image/png, image/gif, image/jpeg">
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
        </div>

        <div class="row">
            <div class="col-md-12 filearray"></div>
        </div>


        <div class="form-group row custom-control custom-checkbox ml-1 mt-4">
            <?php if (count($_smarty_tpl->tpl_vars['list_type_product']->value) > 0) {?>
                <input type="checkbox" class="custom-control-input" id="multiple_type" name="multiple_type" checked>
            <?php } else { ?>
                <input type="checkbox" class="custom-control-input" id="multiple_type" name="multiple_type">
            <?php }?>
            <label class="custom-control-label" for="multiple_type">Sản phẩm có nhiều màu sắc</label>
        </div>

        
        <div id="div_multiple_type" onchange="renderInputType()">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Số phân loại màu sắc</label>
                <div class="col-sm-1">
                    <input type="number" class="form-control" id="number_type" name="number_type" min="0"
                        value="<?php echo count($_smarty_tpl->tpl_vars['list_type_product']->value);?>
">
                </div>
            </div>
        </div>

        <div id="detail_type">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_type_product']->value, 'type_product', false, 'key');
$_smarty_tpl->tpl_vars['type_product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['type_product']->value) {
$_smarty_tpl->tpl_vars['type_product']->do_else = false;
?>
                <div class="form-group border rounded"  data="<?php echo $_smarty_tpl->tpl_vars['type_product']->value['id'];?>
">
                    <div>
                        <label class="ml-2 mt-3">Thông tin phân loại <?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</label>
                    </div>
                    <div class="form-group row mx-2">
                        <div class="col-sm-4">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Màu sắc <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="detail_color" name="detail_color[<?php echo $_smarty_tpl->tpl_vars['type_product']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['type_product']->value['color'];?>
" maxlength="30" minlength="2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Giá <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="detail_price" name="detail_price[<?php echo $_smarty_tpl->tpl_vars['type_product']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['type_product']->value['price'];?>
" required min="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Số lượng <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="detail_quantily" name="detail_quantily[<?php echo $_smarty_tpl->tpl_vars['type_product']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['type_product']->value['quantily'];?>
" required min="0">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <label>Hình ảnh phân loại</label>
                            <input type="file" onChange=getImage(this) class="form-control-file detail_image"
                                id="<?php echo $_smarty_tpl->tpl_vars['type_product']->value['id'];?>
" name="detail_image_<?php echo $_smarty_tpl->tpl_vars['type_product']->value['id'];?>
[]" multiple accept="image/png, image/gif, image/jpeg">
                            <div id="filearray_<?php echo $_smarty_tpl->tpl_vars['type_product']->value['id'];?>
"></div>
                        </div>
                    </div>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
        if($('#number_type').val() == 0){
            $('#div_multiple_type').addClass('d-none');
        }
        <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value))) {?>
            var err_value = <?php echo json_encode($_smarty_tpl->tpl_vars['error_value']->value);?>
;
            $.each( err_value, function(key, value) {
                $('.form-control').each(function () {
                    if($(this).prop('id') == key){
                        var id_div_input = '#'+key;
                        $(id_div_input).val(value);
                    }
                });
            });
        <?php }?>

        <?php if ((isset($_smarty_tpl->tpl_vars['error_input']->value))) {?>
            var err_input = <?php echo json_encode($_smarty_tpl->tpl_vars['error_input']->value);?>
;
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
        <?php }?>
        
        var list_image = <?php echo json_encode($_smarty_tpl->tpl_vars['image_product']->value);?>
;
        var list_image_length = <?php echo count($_smarty_tpl->tpl_vars['image_product']->value);?>
;
        if (list_image_length > 0) {
            for (i = 0; i < list_image_length; i++) {
                var filereader = new FileReader();
                $('.filearray').append('<span class="pip" style="margin-right: 15px"> ' +
                    '<img id="myimg" src=../../asset/images/products/' + list_image[i].image +
                    ' width=200 height=200/>' +
                    '<br/><span class="remove" data="' + list_image[i].id +
                    '" ><i class="fa fa-remove"></i> </span></span>').insertAfter(
                    "#files");
                $(".remove").click(function() {
                    var id_image = $(this).attr("data");
                    $('.filearray').append(
                        '<input type="hidden" class="form-control-file" id="product_image_delete_id" name="product_image_delete_id[' +
                        id_image + ']" value="' + id_image + '">');
                    $(this).parent(".pip").remove();
                });
            }

        }

        $('#product_image').change(function() {
            var current_count_image = $('.filearray').children().length;
            var flength = this.files.length;
            if (current_count_image + flength <= 5)
            {
                $('.filearray').children('.err_img').remove();
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
            }else{
                $('.filearray').append('<span class="err_input err_img">Chỉ được chọn tối đa 5 hình !!!</span>')
            }
        });


        var list_type_image = <?php echo json_encode($_smarty_tpl->tpl_vars['list_image_type_product']->value);?>
;
        var list_type_image_length = <?php echo count($_smarty_tpl->tpl_vars['list_image_type_product']->value);?>
;
        if (list_type_image_length > 0) {
            for (k = 0; k < list_type_image_length; k++) {
                var filereader = new FileReader();
                $('#filearray_' + list_type_image[k].product_detail_id).append(
                    '<span class="pip" style="margin-right: 15px"> ' +
                    '<img id="myimg" src=../../asset/images/products/' + list_type_image[k].image +
                    ' width=120 height=120/>' +
                    '<br/><span class="remove" data="' + list_type_image[k].id +
                    '" ><i class="fa fa-remove"></i> </span></span>').insertAfter(
                    "#files");
                $(".remove").click(function() {
                    var id_type_image = $(this).attr("data");
                    $('.filearray').append(
                        '<input type="hidden" class="form-control-file" id="product_type_image_delete_id" name="product_type_image_delete_id[' +
                        id_type_image + ']" value="' + id_type_image + '">');
                    $(this).parent(".pip").remove();
                });
            }

        }

        $('#multiple_type').on('change', function() {
            if ($('#multiple_type').is(":checked")) {
                $('#div_multiple_type').removeClass('d-none')
            } else {
                if( <?php echo count($_smarty_tpl->tpl_vars['list_type_product']->value);?>
 === 0){
                    $('#div_multiple_type').addClass('d-none')
                    $("#number_type").val('0');
                    $('#detail_type').children('div').remove();
                }else{
                    alert('không thể xóa phân loại');
                    $('#multiple_type').prop('checked', true);
                }
            }
        });
    });

    

    function renderInputType(){      
        if( <?php echo count($_smarty_tpl->tpl_vars['list_type_product']->value);?>
 === 0){
            $('#detail_type').children('div').remove();
            var number_input = $('#number_type').val();
            for (x=1;x <= number_input;x++) {
                $('#detail_type').append('<div class="form-group border rounded"><div><label class="ml-2">Thông tin phân loại ' + x + '</label></div>' +
                '<div class="form-group row mx-2">' +
                    '<div class="col-sm-4">' +
                        '<div class="form-group row">' +
                            '<label class="col-sm-4 col-form-label">Màu sắc<span class="text-danger">*</span></label>' +
                            '<div class="col-sm-8">' +
                            '<input type="text" required class="form-control" id="detail_color" name="new_detail_color['+x+']" required maxlength="30" minlength="2">' +
                            '</div>' +
                        '</div>' +
                        '<div class="form-group row">' +
                            '<label class="col-sm-4 col-form-label">Giá<span class="text-danger">*</span></label>' +
                            '<div class="col-sm-8">' +
                            '<input type="number" required class="form-control" id="detail_price" name="new_detail_price['+x+']" required min="0">' +
                            '</div>' +
                        '</div>' +
                        '<div class="form-group row">' +
                            '<label class="col-sm-4 col-form-label">Số lượng<span class="text-danger">*</span></label>' +
                            '<div class="col-sm-8">' +
                            '<input type="number" required class="form-control" id="detail_quantily" name="new_detail_quantily['+x+']" required min="0">' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="col-sm-8">' +
                        '<label>Hình ảnh phân loại</label>' +
                        '<input type="file" onChange=getImage(this) class="form-control-file detail_image" id="'+x+'" name="new_detail_image_'+x+'[]" multiple accept="image/png, image/gif, image/jpeg">' +                      
                        '<div id="filearray_'+x+'"></div>'+
                    '</div>' +
                '</div></div>'
                );
            }
        }else{
            if($('#number_type').val() < <?php echo count($_smarty_tpl->tpl_vars['list_type_product']->value);?>
 ){
                $('#number_type').val(<?php echo count($_smarty_tpl->tpl_vars['list_type_product']->value);?>
);
                alert('không thể xóa phân loại');
               // $('#div_multiple_type').append('<span class="text-danger">không thể xóa phân loại</span>');
            }else{
                var number_input = $('#number_type').val();
                $('#detail_type').children('.add_detail').remove();
                for (x=<?php echo count($_smarty_tpl->tpl_vars['list_type_product']->value);?>
+1;x <= number_input;x++) {
                    $('#detail_type').append(
                    '<div class="form-group border rounded add_detail"><div><label class="ml-2">Thông tin phân loại ' + x + '</label></div>' +
                    '<div class="form-group row mx-2">' +
                        '<div class="col-sm-4">' +
                            '<div class="form-group row">' +
                                '<label class="col-sm-4 col-form-label">Màu sắc<span class="text-danger">*</span></label>' +
                                '<div class="col-sm-8">' +
                                '<input type="text" required class="form-control" id="detail_color" name="new_detail_color['+x+']" maxlength="30" minlength="2">' +
                                '</div>' +
                            '</div>' +
                            '<div class="form-group row">' +
                                '<label class="col-sm-4 col-form-label">Giá<span class="text-danger">*</span></label>' +
                                '<div class="col-sm-8">' +
                                '<input type="number" required class="form-control" id="detail_price" name="new_detail_price['+x+']" required min="0">' +
                                '</div>' +
                            '</div>' +
                            '<div class="form-group row">' +
                                '<label class="col-sm-4 col-form-label">Số lượng<span class="text-danger">*</span></label>' +
                                '<div class="col-sm-8">' +
                                '<input type="number" required class="form-control" id="detail_quantily" name="new_detail_quantily['+x+']" required min="0">' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="col-sm-8">' +
                            '<label>Hình ảnh phân loại</label>' +
                            '<input type="file" onChange=getImage(this) class="form-control-file detail_image" id="'+x+'" name="new_detail_image_'+x+'[]" multiple accept="image/png, image/gif, image/jpeg">' +                      
                            '<div id="filearray_'+x+'"></div>'+
                        '</div>' +
                    '</div></div>'
                    );
                }
                
            }  
        }
    }

    function getImage(div_input) {
        var id = $(div_input).attr('id');
        var div_show_image = '#filearray_' + id;
        var count_type_image = $(div_show_image).children().length;
        var dlength = $(div_input).prop('files').length;
        if(count_type_image + dlength <= 5){
            $(div_show_image).children('.err_img').remove();
            for (i = 0; i < dlength; i++) {
            var filereader = new FileReader();
            filereader.onload = function(e) {
                $(div_show_image).append('<span class="pip" style="margin-right: 15px"> ' +
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
        }else{
            $(div_show_image).append('<span class="err_input err_img">Chỉ được chọn tối đa 5 hình !!!</span>')
        }
    }
<?php echo '</script'; ?>
><?php }
}
