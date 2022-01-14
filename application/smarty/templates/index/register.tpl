<style>
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

</style>

<div class="container">
    <h3 class="text-center">{$content}</h3>
    <form class="registration-container" method="post" id="formRegister"
          onsubmit="register(event)">
        <div class="form-group">
            <label>Họ:</label>
            <input class="input" type="text" id="first_name" name="first_name" placeholder="Họ" required>
        </div>
        <div class="form-group">
            <label>Tên:</label>
            <input class="input" type="text" id="last_name" name="last_name" placeholder="Tên" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input class="input" type="email" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <label>Mã vùng điện thoại:</label>
                <input class="input" type="tel" name="country_code" id="country_code" placeholder="Mã vùng" value="84" required>
            </div>
            <div class="col-sm-8">
                <label>Số điện thoại:</label>
                <input class="input" type="tel" name="phone" id="phone" placeholder="Số điện thoại" required>
            </div>

        </div>
        <div class="form-group">
            <label>Quốc gia:</label>
            <input class="input" type="text" name="country" id="country" placeholder="Country" value="Việt Nam" required>
        </div>
        <div class="form-group">
            <label>Thành phố:</label>
            <select class="input" id="city_code" name="city_code" required>
                <option value="">Chọn thành phố</option>
            </select>
        </div>
        <div class="form-group">
            <label>Quận/Huyện:</label>
            <select class="input" id="district_code" name="district_code" required>
                <option value="">Chọn quận/huyện</option>
            </select>
        </div>
        <div class="form-group">
            <label>Phường/xã:</label>
            <select class="input" id="ward_code" name="ward_code" required>
            </select>
        </div>
        <div class="form-group">
            <label>Địa chỉ:</label>
            <input class="input" type="text" id="address" name="address" placeholder="Địa chỉ" required>
        </div>
        <div class="form-group">
            <label>Nhập mật khẩu:</label>
            <input class="input" type="password" name="password" id="password" placeholder="Mật khẩu" required>
        </div>
        <div class="form-group">
            <label>Nhập lại mật khẩu:</label>
            <input class="input" type="password" id="confirm_password" name="confirm_password"
                   placeholder="Nhập lại mật khẩu" required>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-registration">Đăng ký</button>
        </div>
    </form>
</div>
<div id="show"></div>

<script>
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
            $('#district_code').children().remove();
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
            $('#ward_code').children().remove();
            $.getJSON(link_ward, function (data) {
                $.each(data.results, function (key, val) {
                    $('#ward_code').append(new Option(val.name, val.code))
                });
            });
        });
    });


    /* submit formmmmm
    function onSubmitFormRegister(url) {
        var pw = $("#password").val();
        var cf_pw = $("#confirm_password").val();
        if (pw == cf_pw) {
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

            document.getElementById("formRegister").action = url;
            document.getElementById("formRegister").submit();
            return true;
        } else {
            alert('sai mk');
            return false;
        }
    }
end submit formmmmmm*/


    $('#confirm_password').change(function () {
        var pw = $('#password').val();
        $('#confirm_password').next('span').remove();
        if ($('#confirm_password').val() !== pw) {
            $('#confirm_password').after('<span class="text-danger">Mật khẩu không trùng khớp</span>');
        }else{
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
                if (data.result == false) {
                    $('#email').next('span').remove();
                    $('#email').focus();
                    $('#email').after('<span class="text-danger font-weight-bold">' + data.message + '</span>')
                } else {
                    if (data.result.status === undefined) {
                        $.each(data.result, function (key, value) {
                            $('.input').next('span').remove();
                            $('.input').each(function () {
                                if ($(this).prop('id') == key) {
                                    var id_div_input = '#' + key;
                                    $.each(value, function (k, v) {
                                        $(id_div_input).addClass('input_error');
                                        $(id_div_input).after('<span class="text-danger font-weight-bold"">' + v + '</span><br>');
                                    })
                                }
                            });
                        });
                    }
                }
            },
            error: function (status) {
                console.log(status);
            }
        });
    }
</script>