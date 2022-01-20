<style>
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
                {if empty($customer) }
                    <li>
                        <a href="{$this->url(['controller' => 'index', 'action' => 'register'])}">
                            <i class="fa fa-user-plus"></i>Đăng Ký</a>
                    </li>
                    <li>
                        <a href="{$this->url(['controller' => 'index', 'action' => 'login'])}">
                            <i class="fa fa-user-o"></i>Đăng Nhập</a>
                    </li>
                {else}
                    <li>
                        <div class="dropdown dropdown-menu-right">
                            <a href="#" class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hello, {$customer.last_name} <i class="fa fa-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mr-5" aria-labelledby="dropdownMenu2">
                                <a href="{{$this->url(['controller' => 'index', 'action' => 'update'])}}?customer_id={$customer.customer_id}"
                                   class="dropdown-item" id="updateInfo">Cập nhật thông tin</a>
                                <div class="divider"></div>
                                <a href="#" class="dropdown-item" id="updatePassword">Đổi mật khẩu</a>
                            </div>

                        </div>
                    </li>
                    <li>
                        <a href="{$this->url(['controller' => 'index', 'action' => 'logout'])}">
                            <i class="fa fa-sign-out"></i>Đăng Xuất</a>
                    </li>
                {/if}

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
                                {foreach $list_category as $category}
                                    <option value="{$category.id}">{$category.category_name}</option>
                                {/foreach}
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
                                    {if empty($cart)}
                                        0
                                    {else}
                                        {$cart|@count}
                                    {/if}
                                </div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    {if empty($cart)}
                                        <div class="product-widget">
                                            <p>Không có sản phẩm !!!!</p>
                                        </div>
                                    {else}
                                        {assign var="total" value="0"}
                                        {foreach from=$cart key=key item=item}
                                            <div class="product-widget cartList" id="{$key}">
                                                <div class="product-img">
                                                    <img src="../../asset/images/products/{$item.image}" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="#">{$item.name}</a></h3>
                                                    <small><b>{$item.type_product_color}</b></small>
                                                    <h4 class="product-price"><small
                                                                style="font-weight: 600">{$item.number_product}
                                                            x </small>{$item.price|number_format:0:".":"."} VNĐ</h4>
                                                </div>
                                                <button onclick="deleteProductCart({$key})" class="delete"><i
                                                            class="fa fa-close" style="font-size: 18px"></i></button>
                                                {$total=$total+($item.price * $item.number_product)}
                                            </div>
                                        {/foreach}
                                    {/if}
                                </div>
                                <div class="cart-summary" id="cart-summary">
                                    {if !empty($cart)}
                                        <small><b>Có {$cart|@count} sản phẩm trong giỏ hàng</b></small>
                                        <h5>Tổng cộng: {$total|number_format:0:".":"."} VNĐ</h5>
                                    {/if}
                                </div>
                                <div class="cart-btns" id="add_cart_btn">
                                    {if !empty($cart)}
                                        {if empty($customer) }
                                            <a href="{$this->url(['controller' => 'index', 'action' => 'login'])}">Đặt
                                                hàng
                                                <i class="fa fa-arrow-circle-right"></i></a>
                                        {else}
                                            <a href="{$this->url(['controller' => 'index', 'action' => 'checkout'])}">Đặt
                                                hàng
                                                <i class="fa fa-arrow-circle-right"></i></a>
                                        {/if}
                                    {/if}
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
                    <a href="{$this->url(['controller' => 'index', 'action' => 'index'])}">Trang chủ</a>
                </li>
                {foreach $list_brand as $brand}
                    {if $brand.id < 10}
                        <li>
                            <a
                                    href="{{$this->url(['controller' => 'index', 'action' => 'view'])}}?brand_id={$brand.id}">{$brand.brand_name}</a>
                        </li>
                    {/if}
                {/foreach}
            </ul>
        </div>
    </div>
</nav>

<div id="updatePasswordModal" class="modal disabled">
    <div class="modal-content">
        <span class="close" id="closeUpdateNewPassword">&times;</span>
        <form id="formUpdatePassword" class="form_margin" method="post" onsubmit="updatePassword(event)">
            <h4 class="text-center">Đổi Mật Khẩu</h4>
            <input class="input" type="hidden" id="customer_id" name="customer_id" value="{$customer.customer_id}">
            <div class="form-group row">
                <div class="col-sm-3">
                    <label>Mật khẩu cũ : <span class="text-danger">*</span></label>
                </div>
                <div class="col-sm-9">
                    <input class="input" type="password" name="old_password" id="old_password" placeholder="Mật khẩu cũ"
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

<script type="text/javascript" charset="UTF-8" src="../../asset/jquery/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#updatePassword').click(function () {
            $('#updatePasswordModal').show();
        });
        $('#closeUpdateNewPassword').click(function () {
            $('#updatePasswordModal').toggle();
        });


        $('#confirm_new_password').change(function () {
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

    {literal}
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    {/literal}

    function searchProduct(e) {
        e.preventDefault();
        var fdata = $('#formSearch').serializeArray();
        $.ajax({
            type: 'post',
            url: "/customer/search",
            dataType: 'json',
            data: fdata,

            success: function (data) {
                $('#resultSearch').empty();
                if (data.length > 0) {
                    $.each(data, function (key, value) {
                        $('#resultSearch').append('<li class="list-group-item">' +
                            '<div class="row">' +
                            '<div class="col-sm-2">' +
                            '<img class="image_search" src="../../asset/images/products/' +
                            value.image + '" alt="" >' +
                            '</div>' +
                            '<div class="col-sm-10  product_name">' +
                            '<a href="{{$this->url(['controller' => 'index', 'action' => 'detail'])}}?id=' + value.id + '" ><span>' + value.name + '</span></a>' +
                            '<br><span>' + numberWithCommas(value.price) + ' VNĐ</span>' +
                            '</div></div></li>');
                    })
                } else {
                    $('#resultSearch').append('<li class="list-group-item">Không tìm thấy sản phẩm</li>')
                }
            },
            error: function (status) {
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
            success: function (data) {
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
                } else if ((data.result.status !== undefined) && data.result.status === true) {
                    $('#formUpdatePassword').find("input[type=email], input[type=password]").val("");
                    $('#updatePasswordModal').toggle();
                    $('#updatePasswordModal').attr("disabled", true);
                    alert('thanh cong !!!!');
                } else {
                    showErrInput('update', data.result);
                }
            },
            error: function (status) {
                console.log(status);
            }
        });
    }

    function showErrInput(class_name, error_input) {
        var class_input = '.' + class_name;
        $(class_input).nextAll('span').remove();
        $(class_input).nextAll('br').remove();
        $(class_input).removeClass('input_error');
        $.each(error_input, function (key, input_error) {
            $(class_input).each(function () {
                if ($(this).prop('id') == class_name + '-' + key) {
                    var id_div_input = '#' + class_name + '-' + key;
                    $(id_div_input).addClass('input_error');
                    $.each(input_error, function (k, v) {
                        $(id_div_input).after(
                            '<br><span class="text-danger font-weight-bold">' + v +
                            '</span>');
                    })
                }
            });
        });
    }
</script>