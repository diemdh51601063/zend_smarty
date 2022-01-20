<?php
/* Smarty version 4.0.0, created on 2022-01-20 05:10:47
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\index\detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61e88c67277809_31900992',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1e59b20dcb8be1b9689edb990acac925828a3b5' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\index\\detail.tpl',
      1 => 1642630240,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e88c67277809_31900992 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['image_product']->value, 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
                        <div class="product-preview" id="changeimg">
                            <img src="../../asset/images/products/<?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
" alt="">
                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </div>
            </div>
            <!-- /Product main img -->
            <?php $_smarty_tpl->_assignInScope('type_product', "0");?>
            <?php if ((count($_smarty_tpl->tpl_vars['list_type_product']->value)) > 0) {?>
                <?php $_smarty_tpl->_assignInScope('type_product', count($_smarty_tpl->tpl_vars['list_type_product']->value));?>
            <?php }?>

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs" id="changeimgmain">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['image_product']->value, 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
                        <div class="product-preview">
                            <img src="../../asset/images/products/<?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
" alt="">
                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                    </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name"><?php echo $_smarty_tpl->tpl_vars['detail_product']->value['name'];?>
</h2>
                    <div>
                        <h3  id="productPrice" class="product-price"><?php echo number_format($_smarty_tpl->tpl_vars['detail_product']->value['price'],0,".",".");?>
 VNĐ</h3>
                    </div>

                    <div class="add-to-cart" id="add_number_product">
                        <div class="qty-label">
                            <div class="input-number">
                                <input type="number" value="0" id="number_product" min=0>
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                        <button id="addCart" onclick="addProductToCart(<?php echo $_smarty_tpl->tpl_vars['detail_product']->value['id'];?>
, <?php echo $_smarty_tpl->tpl_vars['type_product']->value;?>
)"
                            class="add-to-cart-btn" value="<?php echo $_smarty_tpl->tpl_vars['detail_product']->value['id'];?>
"><i
                                class="fa fa-shopping-cart"></i></button>
                    </div>

                    <ul class="product-links">
                        <li>Danh mục:</li>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_category']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                            <?php if ($_smarty_tpl->tpl_vars['category']->value['id'] == $_smarty_tpl->tpl_vars['detail_product']->value['category_id']) {?>
                                <li><a href="#"><?php echo $_smarty_tpl->tpl_vars['category']->value['category_name'];?>
</a></li>
                            <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>

                    <?php if ((count($_smarty_tpl->tpl_vars['list_type_product']->value)) > 0) {?>
                        <ul class="product-links" id="listProductType">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_type_product']->value, 'type');
$_smarty_tpl->tpl_vars['type']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->do_else = false;
?>
                                <div class="form-check">
                                    <input class="form-check-input product_type_id" type="radio" name="product_type_id"
                                        id="<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
">
                                    <label class="form-check-label" for="<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
">
                                        <?php echo $_smarty_tpl->tpl_vars['type']->value['color'];?>

                                    </label>
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ul>
                    <?php }?>

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
                        <li><a data-toggle="tab" href="#tab2">Thông tin chi tiết</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p><?php echo $_smarty_tpl->tpl_vars['detail_product']->value['description'];?>
</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <tr>
                                            <th>Tên Sản Phẩm</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['detail_product']->value['name'];?>
</td>
                                        </tr>
                                        <tr>
                                            <th>Danh Mục</th>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_category']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['category']->value['id'] == $_smarty_tpl->tpl_vars['detail_product']->value['category_id']) {?>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['category']->value['category_name'];?>
</td>
                                                <?php }?>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </tr>
                                        <tr>
                                            <th>Thương Hiệu</th>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_brand']->value, 'brand');
$_smarty_tpl->tpl_vars['brand']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->do_else = false;
?>
                                                <?php if ($_smarty_tpl->tpl_vars['brand']->value['id'] == $_smarty_tpl->tpl_vars['detail_product']->value['brand_id']) {?>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_name'];?>
</td>
                                                <?php }?>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </tr>
                                        <tr>
                                            <th>Loại jack cắm</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['detail_product']->value['jack'];?>
</td>
                                        </tr>
                                        <tr>
                                            <th>Cổng sạc</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['detail_product']->value['charging_port'];?>
</td>
                                        </tr>
                                        <tr>
                                            <th>Kích thước</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['detail_product']->value['size'];?>
</td>
                                        </tr>
                                        <tr>
                                            <th>Khối lượng</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['detail_product']->value['weight'];?>
</td>
                                        </tr>
                                        <tr>
                                            <th>Chiều dài dây</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['detail_product']->value['length'];?>
</td>
                                        </tr>
                                        <tr>
                                            <th>Độ tương thích</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['detail_product']->value['compatible'];?>
</td>
                                        </tr>
                                        <tr>
                                            <th>Tương tác/ điều khiển</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['detail_product']->value['control'];?>
</td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- /tab2  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


<?php echo '<script'; ?>
>
    var list_image_type_product = <?php echo json_encode($_smarty_tpl->tpl_vars['list_image_type_product']->value);?>
;
    var  list_type_product = <?php echo json_encode($_smarty_tpl->tpl_vars['list_type_product']->value);?>
;

    var a = '';

    var type_product = <?php echo $_smarty_tpl->tpl_vars['type_product']->value;?>
;

    $(document).ready(function() {
        if ($('#number_product').val() == 0) {
            $('#addCart').attr("disabled", true);
        }
        if (type_product > 0) {
            if ($('input[name="product_type_id"]:checked').val() === undefined) {
                $('#addCart').attr("disabled", true);
            }
            $('.product_type_id').change(function() {
                if (($('input[name="product_type_id"]:checked').val() !== undefined) && ($(
                        '#number_product').val() > 0)) {
                    $('#addCart').attr("disabled", false);
                } else {
                    $('#addCart').attr("disabled", true);
                }
            });

            $('#number_product').change(function() {
                if (($('input[name="product_type_id"]:checked').val() !== undefined) && ($(
                        '#number_product').val() > 0)) {
                    $('#addCart').attr("disabled", false);
                } else {
                    $('#addCart').attr("disabled", true);
                }
            });

        } else {
            $('#number_product').change(function() {
                if ($('#number_product').val() > 0) {
                    $('#addCart').attr("disabled", false);
                } else {
                    $('#addCart').attr("disabled", true);
                }
            });
        }


        $("input[name='product_type_id']").change(function() {
            var val = $("input[type='radio'][name='product_type_id']:checked").val();
            $.each(list_type_product, function(key, value) { 
                if( val == value.id){
                   console.log(value);
                   $('#productPrice').replaceWith('<h3  id="productPrice" class="product-price">'+numberWithCommas(value.price)+' VNĐ</h3>')
                }
                
            })
            
        });
    });




    function changeImage(type_id) {
        var list_image_replace = [];
        $.each(list_image_type_product, function(key, value) {
            if ((value.product_detail_id == type_id) && (value.image !== '')) {
                list_image_replace.push(value.image);
            }
        });
        console.log(list_image_replace)
        if (list_image_replace !== '') {
            $('#product-imgs').children('.product-preview').remove();
            $('#product-main-img').children('.product-preview').remove();
            $.each(list_image_replace, function(k, v) {
                //$('#product-preview').append('<div class="product-preview"><img src="../../asset/images/products/'+v+'" alt=""></div>');
                $('#product-imgs').append(
                    '<div class="product-preview"><img src="../../asset/images/products/' + v +
                    '" alt=""></div>');

                $('#product-main-img').append('<div class="product-preview" id="changeimg">' +
                    '<img src="../../asset/images/products/' + v + '" alt="">' + '</div>');
            });
        }
    }

    
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    
<?php echo '</script'; ?>
><?php }
}
