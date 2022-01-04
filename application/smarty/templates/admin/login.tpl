<style>
    .container-fluid {
        height: 100%;
        position: relative;
        background-color: rgb(142, 243, 209);
    }


    .vertical-center {
        min-width: 30%;
        border-radius: 15px;
        background-color: white;
        padding: 20px;
        margin: 0;
        position: absolute;
        top: 40%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .vertical-center h3 {
        text-align: center;
        margin: 20px;
    }

    .vertical-center button {
        background-color: mediumaquamarine;
        margin: 20px;
        color: whitesmoke;
    }
</style>
<div class="container-fluid">
    <div class="vertical-center">
        <h3>Đăng Nhập</h3>
        <form  onsubmit="onSubmitForm('{{$this->url(['controller' => 'admin', 'action' => 'login'])}}')" method="post" id="formAdd">
            <div class="form-group">
                <label class="font-weight-bold">Admin name</label>
                <input type="text" class="form-control" id="login_name" name="login_name" placeholder="Admin name">
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-block">Log In</button>
            </div>
        </form>
    </div>
</div>

<script>
    function onSubmitForm(url) {
        document.getElementById("formAdd").action = url;
        document.getElementById("formAdd").submit();
        return true;
    };
</script>