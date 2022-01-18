<style>
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
</style>
<div class="container">
    <form class="login-container"
        onsubmit="onSubmitForm('{{$this->url(['controller' => 'index', 'action' => 'login'])}}') " method="post"
        id="formAdd">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="input" id="emil" name="email" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mật khẩu</label>
            <div class="col-sm-10">
                <input type="password" class="input" id="password" name="password">
            </div>
        </div>
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

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close" id="closeForgotPassModal">&times;</span>
        <h4 class="text-center">Nhập Thông Tin Tài Khoản</h4>
        <form class="mx-3 mt-2" method="post" id="formRegister" onsubmit="register(event)">
            <div class="form-group row">
                <div class="col-sm-3">
                    <label>Email</label>
                </div>
                <div class="col-sm-9">
                    <input class="input" type="email" name="email" id="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                    <label>Số điện thoại:</label>
                </div>
                <div class="col-sm-9">
                    <input class="input" type="phone" name="phone" id="phone" placeholder="Số điện thoại">
                </div>

            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Xác thực</button>
            </div>
        </form>
    </div>
</div>

<script>
    $('#forgotPass').click(function() {
        $('#forgotPassModal').show();

    });
    $('#closeForgotPassModal').click(function() {
        $('#forgotPassModal').toggle();

    });
</script>