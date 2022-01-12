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
        <div class="form-group text-center">
            <button type="submit" class="btn btn-login">Đăng nhập</button>
        </div>
    </form>
</div>