<?php
/* Smarty version 4.0.0, created on 2022-01-20 04:33:10
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\static\header_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61e883963ab980_51388214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a88290c5edc2487a26b7474d11be34f178e173b5' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\static\\header_user.tpl',
      1 => 1642627986,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e883963ab980_51388214 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    .list-group-item {
        margin: 0 10px;

    }

    .list-result-search {
        margin: 10px 65px 10px 30px;
    }

    .list-group {
        margin: 10px;
        max-height: 150px;
        overflow-y: scroll;
        overflow-x: hidden;
        -webkit-overflow-scrolling: touch;
    }

    .image_search {
        margin: 5px;
        height: 30px;
        width: 30px;
    }

    .product_name {
        max-width: 90%;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    #top-header .container ul li .dropdown-menu-right .dropdown-item {
        color: #525252;
    }

    .dropdown-item {
        margin: 10px;
    }

    .dropdown-menu-right {
        margin-right: 10px;
    }

    #top-header .container ul li .dropdown-menu-right a:focus {
        color: white;
    }

    .form_margin {
        margin: 0 30px;
    }

    #updatePasswordModal .modal-content {
        width: 60%;
    }
</style>



<header>
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">
                <?php if (empty($_smarty_tpl->tpl_vars['customer']->value)) {?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'register'));?>
">
                            <i class="fa fa-user-plus"></i>Đăng Ký</a>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'login'));?>
">
                            <i class="fa fa-user-o"></i>Đăng Nhập</a>
                    </li>
                <?php } else { ?>
                    <li>
                        <div class="dropdown dropdown-menu-right">
                            <a href="#" class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hello, <?php echo $_smarty_tpl->tpl_vars['customer']->value['last_name'];?>
 <i class="fa fa-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mr-5" aria-labelledby="dropdownMenu2">
                                <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'update'));
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
?customer_id=<?php echo $_smarty_tpl->tpl_vars['customer']->value['customer_id'];?>
"
                                    class="dropdown-item" id="updateInfo">Cập nhật thông tin</a>
                                <div class="divider"></div>
                                <a href="#" class="dropdown-item" id="updatePassword">Đổi mật khẩu</a>
                            </div>

                        </div>
                    </li>

                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'logout'));?>
">
                            <i class="fa fa-sign-out"></i>Đăng Xuất</a>
                    </li>
                <?php }?>

            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="../../asset/user/img/logo.png" alt="">
                        </a>
                    </div>
                </div>

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form method="post" id="formSearch" onsubmit="searchProduct(event)">
                            <select class="input-select" name="category_id" style="max-width: 200px;
                            text-overflow: ellipsis;
                            white-space: nowrap;
                            overflow: hidden;">
                                <option value="">Tất cả danh mục</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_category']->value, 'category');
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
                            <input type="text" class="input" placeholder="Tìm kiếm" name="name" autocomplete="off">
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                        <div class="list-result-search">
                            <ul id="resultSearch" class="list-group">

                            </ul>
                        </div>

                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">

                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Giỏ hàng</span>
                                <div class="qty" id="card_quantily">
                                    <?php if (empty($_smarty_tpl->tpl_vars['cart']->value)) {?>
                                        0
                                    <?php } else { ?>
                                        <?php echo count($_smarty_tpl->tpl_vars['cart']->value);?>

                                    <?php }?>
                                </div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <?php if (empty($_smarty_tpl->tpl_vars['cart']->value)) {?>
                                        <div class="product-widget">
                                            <p>Không có sản phẩm !!!!</p>
                                        </div>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->_assignInScope('total', "0");?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value, 'item', false, 'key');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                                            <div class="product-widget cartList" id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                                                <div class="product-img">
                                                    <img src="../../asset/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h3>
                                                    <small><b><?php echo $_smarty_tpl->tpl_vars['item']->value['type_product_color'];?>
</b></small>
                                                    <h4 class="product-price"><small
                                                            style="font-weight: 600"><?php echo $_smarty_tpl->tpl_vars['item']->value['number_product'];?>

                                                            x </small><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],0,".",".");?>
 VNĐ</h4>
                                                </div>
                                                <button onclick="deleteProductCart(<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
)" class="delete"><i
                                                        class="fa fa-close" style="font-size: 18px"></i></button>
                                                <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value+($_smarty_tpl->tpl_vars['item']->value['price']*$_smarty_tpl->tpl_vars['item']->value['number_product']));?>
                                            </div>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    <?php }?>
                                </div>
                                <div class="cart-summary" id="cart-summary">
                                    <?php if (!empty($_smarty_tpl->tpl_vars['cart']->value)) {?>
                                        <small><b>Có <?php echo count($_smarty_tpl->tpl_vars['cart']->value);?>
 sản phẩm trong giỏ hàng</b></small>
                                        <h5>Tổng cộng: <?php echo number_format($_smarty_tpl->tpl_vars['total']->value,0,".",".");?>
 VNĐ</h5>
                                    <?php }?>
                                </div>
                                <div class="cart-btns">
                                    <?php if (empty($_smarty_tpl->tpl_vars['customer']->value)) {?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'login'));?>
">Đặt hàng
                                            <i class="fa fa-arrow-circle-right"></i></a>
                                    <?php } else { ?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'checkout'));?>
">Đặt hàng
                                            <i class="fa fa-arrow-circle-right"></i></a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'index'));?>
">Trang chủ</a>
                </li>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_brand']->value, 'brand');
$_smarty_tpl->tpl_vars['brand']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->do_else = false;
?>
                    <?php if ($_smarty_tpl->tpl_vars['brand']->value['id'] < 10) {?>
                        <li>
                            <a
                                href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'view'));
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
?brand_id=<?php echo $_smarty_tpl->tpl_vars['brand']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_name'];?>
</a>
                        </li>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
    </div>
</nav>

<div id="updatePasswordModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeUpdateNewPassword">&times;</span>
        <form id="formUpdatePassword" class="form_margin" method="post" onsubmit="updatePassword(event)">
            <h4 class="text-center">Đổi Mật Khẩu</h4>
            <input class="input" type="hidden" id="customer_id" name="customer_id" value="<?php echo $_smarty_tpl->tpl_vars['customer']->value['customer_id'];?>
">
            <div class="form-group row">
                <div class="col-sm-3">
                    <label>Mật khẩu cũ : <span class="text-danger">*</span></label>
                </div>
                <div class="col-sm-9">
                    <input class="input" type="password" name="password" id="password" placeholder="Mật khẩu cũ"
                        required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3">
                    <label>Mật khẩu mới : <span class="text-danger">*</span></label>
                </div>
                <div class="col-sm-9">
                    <input class="input update" type="password" name="new_password" id="new_password"
                        placeholder="Mật khẩu mới" required>
                </div>
            </div>

            <div class="form-group row" id="input_confirm_update_pasword">
                <div class="col-sm-3">
                    <label>Nhập lại mật khẩu mới : <span class="text-danger">*</span></label>
                </div>
                <div class="col-sm-9">
                    <input class="input update" type="password" name="confirm_new_password" id="confirm_new_password"
                        placeholder="Nhập lại mật khẩu mới" required>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>
</div>

<?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/jquery/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(document).ready(function() {
        $('#updatePassword').click(function() {
            $('#updatePasswordModal').show();
        });
        $('#closeUpdateNewPassword').click(function() {
            $('#updatePasswordModal').toggle();
        });


        $('#confirm_new_password').change(function() {
            var new_pw = $('#new_password').val();
            if ($('#confirm_new_password').val() != new_pw) {
                $('#confirm_new_password').next('span').remove();
                $('#confirm_new_password').after(
                    '<span class="text-danger font-weight-bold">* Mật khẩu không trùng khớp</span>');
            } else {
                $('#confirm_new_password').next('span').remove();
            }
        });
    });

    
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    

    function searchProduct(e) {
        e.preventDefault();
        var fdata = $('#formSearch').serializeArray();
        $.ajax({
            type: 'post',
            url: "/customer/search",
            dataType: 'json',
            data: fdata,

            success: function(data) {
                $('#resultSearch').empty();
                if (data.length > 0) {
                    $.each(data, function(key, value) {
                        $('#resultSearch').append('<li class="list-group-item">' +
                            '<div class="row">' +
                            '<div class="col-sm-2">' +
                            '<img class="image_search" src="../../asset/images/products/' +
                            value.image + '" alt="" >' +
                            '</div>' +
                            '<div class="col-sm-10  product_name">' +
                            '<a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'detail'));
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
?id=' + value.id + '" ><span>' + value.name + '</span></a>' +
                            '<br><span>' + numberWithCommas(value.price) + ' VNĐ</span>' +
                            '</div></div></li>');
                    })
                } else {
                    $('#resultSearch').append('<li class="list-group-item">Không tìm thấy sản phẩm</li>')
                }
            },
            error: function(status) {
                console.log(status);
            }
        });
    }

    function updatePassword(e) {
        e.preventDefault();
        var fdata = $('#formUpdatePassword').serializeArray();
        $.ajax({
            type: 'post',
            url: "/customer/uppass",
            dataType: 'json',
            data: fdata,
            success: function(data) {
                if (data.status !== undefined) {
                    if (data.message_pw_not_match !== undefined) {
                        $('#password').next('span').remove();
                        $('#password').after(
                            '<span class="text-danger font-weight-bold">' + data.message_pw_not_match +
                            '</span>');
                    } else if (data.message_pw !== undefined) {
                        $('#confirm_new_password').next('span').remove();
                        $('#confirm_new_password').after('<span class="text-danger font-weight-bold">' +
                            data.message_pw + '</span>');
                    }
                } else if ((data.result.status !== undefined)&&data.result.status === true) {
                    $('#updatePasswordModal').toggle();
                    $('#updatePasswordModal').attr("disabled", true);
                    alert('thanh cong !!!!');
                } else {
                    showErrInput('update', data.result);
                }
            },
            error: function(status) {
                console.log(status);
            }
        });
    }

    function showErrInput(class_name, error_input) {
        var class_input = '.' + class_name;
        $(class_input).nextAll('span').remove();
        $(class_input).nextAll('br').remove();
        $(class_input).removeClass('input_error');
        $.each(error_input, function(key, input_error) {
            $(class_input).each(function() {
                if ($(this).prop('id') == class_name + '-' + key) {
                    var id_div_input = '#' + class_name + '-' + key;
                    $(id_div_input).addClass('input_error');
                    $.each(input_error, function(k, v) {
                        $(id_div_input).after(
                            '<br><span class="text-danger font-weight-bold">' + v +
                            '</span>');
                    })
                }
            });
        });
    }
<?php echo '</script'; ?>
><?php }
}
