<?php
/* Smarty version 4.0.0, created on 2022-01-20 03:00:14
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\index\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61e86dce8fc0a4_45266413',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56c741d2d9b73c0793c508189c870f0bfdbca7cc' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\index\\login.tpl',
      1 => 1642622394,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e86dce8fc0a4_45266413 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    .login-container {
        position: relative;
        width: 600px;
        margin: 10px auto;
    }

    .btn-login {
        font-weight: 700;
        background: #D10024;
        color: #FFF;
    }

    label {
        padding-left: 5px;
    }

    .form_margin {
        margin: 0 40px;
    }

    .form_margin > h4 {
        margin-bottom: 15px;
    }

    .input_error {
        border: 1px solid red;
    }

</style>
<div class="container" >
    <h4 id="titleformLogin" class="text-center"></h4>
    <form class="login-container" onsubmit="onSubmitForm('<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'login'));
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
') " method="post" id="formAdd">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="input" id="email" name="email" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mật khẩu</label>
            <div class="col-sm-10">
                <input type="password" class="input" id="password" name="password">
            </div>
        </div>
        <?php if ((isset($_smarty_tpl->tpl_vars['message_error']->value))) {?>
            <span class="text-danger"><b><?php echo $_smarty_tpl->tpl_vars['message_error']->value;?>
</b></span>
        <?php }?>
        <div class="form-group row text-right">
            <div class="col-sm-12">
                <a id="forgotPass" href="#" class="text-primary font-weight-bold">Quên mật khẩu ?</a>
            </div>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-login">Đăng nhập</button>
        </div>
    </form>
</div>

<div id="forgotPassModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeForgotPassModal">&times;</span>
        <form class="form_margin" method="post" id="formCheckAccount" onsubmit="checkAccount(event)">
            <h4 class="text-center">Nhập Thông Tin Tài Khoản</h4>
            <div class="form-group row">
                <div class="col-sm-3">
                    <label>Email : <span class="text-danger">*</span></label>
                </div>
                <div class="col-sm-9">
                    <input class="input forgot-password" type="email" name="email" id="forgot-password-email"
                           placeholder="Email">
                </div>
            </div>

            <div class="form-group row" id="input_check_phone">
                <div class="col-sm-3">
                    <label>Số điện thoại : <span class="text-danger">*</span></label>
                </div>
                <div class="col-sm-9">
                    <input class="input forgot-password" type="phone" name="phone" id="forgot-password-phone"
                           placeholder="Số điện thoại">
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Xác thực</button>
            </div>
        </form>
    </div>
</div>

<div id="updateNewPassword" class="modal">
    <div class="modal-content">
        <span class="close" id="closeUpdateNewPassword">&times;</span>
        <form class="form_margin" method="post" id="formUpdateNewPassword" onsubmit="updatePassword(event)">
            <h4 class="text-center">Đổi Mật Khẩu</h4>
            <div class="form-group row">
                <div class="col-sm-3">
                    <label>Mật khẩu mới : <span class="text-danger">*</span></label>
                </div>
                <div class="col-sm-9">
                    <input class="input update" type="password" name="password" id="update-password"
                           placeholder="Mật khẩu">
                </div>
            </div>

            <div class="form-group row" id="input_confirm_update_pasword">
                <div class="col-sm-3">
                    <label>Nhập lại mật khẩu : <span class="text-danger">*</span></label>
                </div>
                <div class="col-sm-9">
                    <input class="input update" type="password" name="confirm_pasword" id="update-confirm-pasword"
                           placeholder="Nhập lại mật khẩu">
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>
</div>

<?php echo '<script'; ?>
>

    $('#forgotPass').click(function () {
        $('#forgotPassModal').show();
        $('#formAdd').attr("disabled", true);
        $('#formUpdateNewPassword').attr("disabled", true);
    });
    $('#closeForgotPassModal').click(function () {
        $('#forgotPassModal').toggle();
    });
    $('#closeUpdateNewPassword').click(function () {
        $('#updateNewPassword').toggle();
    });

    <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value))) {?>
    var err_value = <?php echo json_encode($_smarty_tpl->tpl_vars['error_value']->value);?>
;
    $.each( err_value, function(key, value) {
        $('.input').each(function () {
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
    $.each(err_input, function (key, value) {
        $('.input').each(function () {
            if ($(this).prop('id') == key) {
                var id_div_input = '#' + key;
                $.each(value, function (k, v) {
                    $(id_div_input).addClass('input_error');
                    $(id_div_input).after('<span class="err_input my-3">' + v + '</span><br>');
                })
            }
        });
    });
    <?php }?>

    var customer_id = '';

    function checkAccount(e) {
        e.preventDefault();
        var fdata = $('#formCheckAccount').serializeArray();
        $.ajax({
            type: 'post',
            url: '/customer/getexist',
            dataType: 'json',
            data: fdata,
            success: function (data) {
                if (data.result !== undefined) {
                    showErrInput('forgot-password', data.result);
                }
                else if (data.customer_id === null) {
                    $('#input_check_phone').next('span').remove();
                    $('#input_check_phone').after('<span class="text-danger font-weight-bold">Tài khoản không tồn tại !!!!</span>');
                } else {
                    customer_id = data.customer_id;
                    $('#forgotPassModal').toggle();
                    $('#forgotPassModal').attr("disabled", true);
                    $('#updateNewPassword').show();
                }
            },
            error: function (status) {
                console.log(status);
            }
        });
    }

    function updatePassword(e) {
        e.preventDefault();
        var fdata = $('#formUpdateNewPassword').serializeArray();
        $.ajax({
            type: 'post',
            url: "/customer/repass?customer_id=" + customer_id,
            dataType: 'json',
            data: fdata,
            success: function (data) {
                if (data.result === true) {
                    $('#updateNewPassword').toggle();
                    $('#updateNewPassword').attr("disabled", true);
                    $('#forgotPassModal').attr("disabled", true);
                    $('#formAdd').attr("disabled", false);
                    $('#formAdd').find("input[type=email], input[type=password]").val("");
                    $(".form").trigger('reset');
                    $('#titleformLogin').replaceWith('<h4 id="titleformLogin" class="text-info font-weight-bold text-center">Cập nhật pass thành công. Hãy đăng nhập lại !!!</h4>');
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
                        $(id_div_input).after('<br><span class="text-danger font-weight-bold">' + v + '</span>');
                    })
                }
            });
        });
    }
<?php echo '</script'; ?>
><?php }
}
