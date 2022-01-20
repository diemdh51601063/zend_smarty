<?php
/* Smarty version 4.0.0, created on 2022-01-19 23:06:42
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\index\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61e83712761513_47296676',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22aaabf71f66c1cdde4eca166548e9e544d3c9e3' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\index\\register.tpl',
      1 => 1642505827,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e83712761513_47296676 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    .registration-container {
        position: relative;
        width: 600px;
        margin: 10px auto;
    }

    .btn-registration {
        font-weight: 700;
        background: #D10024;
        color: #FFF;
    }

    label {
        padding-left: 5px;
    }

    .input_error {
        border: 1px solid red;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

</style>

<div class="container">
    <h3 class="text-center"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</h3>
    <form class="registration-container" method="post" id="formRegister" onsubmit="register(event)">
        <div class="form-group">
            <label>Họ:</label>
            <input class="input" type="text" id="first_name" name="first_name" placeholder="Họ" maxlength="50"
                   minlength="2">
        </div>
        <div class="form-group">
            <label>Tên:</label>
            <input class="input" type="text" id="last_name" name="last_name" placeholder="Tên" maxlength="50"
                   minlength="2">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input class="input" type="email" name="email" id="email" placeholder="Email">
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <label>Mã vùng điện thoại:</label>
                <input class="input" type="tel" name="country_code" id="country_code" placeholder="Mã vùng" value="84">
            </div>
            <div class="col-sm-8">
                <label>Số điện thoại:</label>
                <input class="input" type="phone" name="phone" id="phone" placeholder="Số điện thoại">
            </div>

        </div>
        <div class="form-group">
            <label>Quốc gia:</label>
            <input class="input" type="text" name="country" id="country" placeholder="Country" value="Việt Nam"
                   readonly>
        </div>
        <div class="form-group">
            <label>Thành phố:</label>
            <select class="input" id="city_code" name="city_code">
                <option value="">Chọn thành phố</option>
            </select>
        </div>
        <div class="form-group">
            <label>Quận/Huyện:</label>
            <select class="input" id="district_code" name="district_code">
                <option value="">Chọn quận/huyện</option>
            </select>
        </div>
        <div class="form-group">
            <label>Phường/xã:</label>
            <select class="input" id="ward_code" name="ward_code">
                <option value="">Chọn phường/xã</option>
            </select>
        </div>
        <div class="form-group">
            <label>Địa chỉ:</label>
            <input class="input" type="text" id="address" name="address" placeholder="Địa chỉ">
        </div>
        <div class="form-group">
            <label>Nhập mật khẩu:</label>
            <input class="input" type="password" name="password" id="password" placeholder="Mật khẩu">
        </div>
        <div class="form-group">
            <label>Nhập lại mật khẩu:</label>
            <input class="input" type="password" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu">
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-registration">Đăng ký</button>
        </div>
    </form>
</div>

<div id="registerModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <p>Dang ky thanh cong</p>
        <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'index'));?>
"><button type="button" class="btn btn-primary">OK</button></a>
    </div>

</div>
<?php echo '<script'; ?>
>
    $(document).ready(function () {
        var link_city = 'https://api.mysupership.vn/v1/partner/areas/province';
        $.getJSON(link_city, function (data) {
            $.each(data.results, function (key, val) {
                $('#city_code').append(new Option(val.name, val.code))
            });
        });


        $('#city_code').change(function () {
            var city_code = $(this).children("option:selected").val();
            var link_district = 'https://api.mysupership.vn/v1/partner/areas/district?province=' +
                city_code;
            $('#district_code').find('option').not(':first').remove();
            $.getJSON(link_district, function (data) {
                $.each(data.results, function (key, val) {
                    $('#district_code').append(new Option(val.name, val.code))
                });
            });
        });

        $('#district_code').change(function () {
            var district_code = $(this).children("option:selected").val();
            var link_ward = 'https://api.mysupership.vn/v1/partner/areas/commune?district=' +
                district_code;
            $('#ward_code').find('option').not(':first').remove();
            $.getJSON(link_ward, function (data) {
                $.each(data.results, function (key, val) {
                    $('#ward_code').append(new Option(val.name, val.code))
                });
            });
        });

        $('.input').each(function () {
            $(this).change(function (){
                console.log($(this).next('span'));
                $(this).next('br').remove();
                $(this).next('span').remove();
                $(this).removeClass('input_error');
            })
        });


    });


    $('#confirm_password').change(function () {
        var pw = $('#password').val();
        $('#confirm_password').next('span').remove();
        if ($('#confirm_password').val() !== pw) {
            $('#confirm_password').after(
                '<span class="text-danger font-weight-bold">* Mật khẩu không trùng khớp</span>');
        } else {
            $('#confirm_password').next('span').remove();
        }
    });

    function register(e) {
        e.preventDefault();
        $("<input />").attr("type", "hidden")
            .attr("name", "city_name")
            .attr("value", $("#city_code option:selected").text())
            .appendTo("#formRegister");

        $("<input />").attr("type", "hidden")
            .attr("name", "district_name")
            .attr("value", $("#district_code option:selected").text())
            .appendTo("#formRegister");

        $("<input />").attr("type", "hidden")
            .attr("name", "ward_name")
            .attr("value", $("#ward_code option:selected").text())
            .appendTo("#formRegister");
        var fdata = $('#formRegister').serializeArray();
        $.ajax({
            type: 'post',
            url: "/customer/register",
            dataType: 'json',
            data: fdata,

            success: function (data) {
                if (data.status == false) {
                    if (data.message_pw != undefined) {
                        $('#password').nextAll('span').remove();
                        $('#password').focus();
                        $('#password').after('<span class="text-danger font-weight-bold">' + data
                            .message_pw + '</span>');
                    }
                } else if (data.result.status === undefined) {
                    $('.input').nextAll('span').remove();
                    $('.input').nextAll('br').remove();
                    $('.input').removeClass('input_error');
                    $.each(data.result, function (key, input_error) {
                        $('.input').each(function () {
                            if ($(this).prop('id') == key) {
                                var id_div_input = '#' + key;
                                $(id_div_input).addClass('input_error');
                                $.each(input_error, function (k, v) {
                                    $(id_div_input).after(
                                        '<br><span class="text-danger font-weight-bold">' +
                                        v + '</span>');
                                })
                            }
                        });
                    });
                } else {
                    $('#registerModal').show();
                    $('#closeModal').click(function () {
                        $('#registerModal').toggle();

                    });
                }
            },
            error: function (status) {
                console.log(status);
            }
        });
    }
<?php echo '</script'; ?>
><?php }
}
