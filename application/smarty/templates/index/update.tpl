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
    {if !empty($customer_info)}
        <h3 class="text-center">Cập Nhật Thông Tin</h3>
        <form class="registration-container" method="post" id="formUpdateInfo" onsubmit="updateInfo(event)">
            <input class="input" type="hidden" id="customer_id" name="customer_id" value="{$customer_info.id}">
            <div class="form-group">
                <label>Họ:</label>
                <input class="input" type="text" id="first_name" name="first_name" placeholder="Họ" maxlength="50"
                    minlength="2" value="{$customer_info.first_name}" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Tên:</label>
                <input class="input" type="text" id="last_name" name="last_name" placeholder="Tên" maxlength="50"
                    minlength="2" value="{$customer_info.last_name}" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input class="input" type="email" name="email" id="email" placeholder="Email" value="{$customer_info.email}"
                    autocomplete="off">
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label>Mã vùng điện thoại:</label>
                    <input class="input" type="tel" name="country_code" id="country_code" placeholder="Mã vùng" value="84">
                </div>
                <div class="col-sm-8">
                    <label>Số điện thoại:</label>
                    <input class="input" type="phone" name="phone" id="phone" placeholder="Số điện thoại"
                        value="{$customer_info.phone}" autocomplete="off">
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
                <input class="input" type="text" id="address" name="address" placeholder="Địa chỉ"
                    value="{$customer_info.address}" autocomplete="off">
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-registration">Cập nhật</button>
            </div>
        </form>
    {/if}
</div>

<script>
    var city_code_input = {$customer_info.city_code};
    var district_code_input = {$customer_info.district_code};
    var ward_code_input = {$customer_info.ward_code};

    $(document).ready(function() {
        var link_city = 'https://api.mysupership.vn/v1/partner/areas/province';
        $.getJSON(link_city, function(data) {
            $.each(data.results, function(k, v) {
                $('#city_code').append(new Option(v.name, v.code));
                $('#city_code').val(city_code_input);
            });
        });

        var link_district = 'https://api.mysupership.vn/v1/partner/areas/district?province=' + city_code_input;
        $('#district_code').not(':first').remove();
        $.getJSON(link_district, function(data) {
            $.each(data.results, function(k, v) {
                $('#district_code').append(new Option(v.name, v.code));
                $('#district_code').val(district_code_input);
            });
        });

        var link_ward = 'https://api.mysupership.vn/v1/partner/areas/commune?district=' + district_code_input;
        $('#ward_code').not(':first').remove();
        $.getJSON(link_ward, function(data) {
            $.each(data.results, function(k, v) {
                $('#ward_code').append(new Option(v.name, v.code));
                $('#ward_code').val(ward_code_input);
            });
        });


        $('#city_code').change(function() {
            var city_code = $(this).children("option:selected").val();
            if (city_code !== '') {
                var link_district = 'https://api.mysupership.vn/v1/partner/areas/district?province=' +
                    city_code;
                $('#district_code').find('option').not(':first').remove();
                $.getJSON(link_district, function(data) {
                    $.each(data.results, function(key, val) {
                        $('#district_code').append(new Option(val.name, val.code));
                    });
                });
            } else {
                $('#district_code').find('option').not(':first').remove();
                $('#ward_code').find('option').not(':first').remove();
            }
        });

        $('#district_code').change(function() {
            var district_code = $(this).children("option:selected").val();
            if (district_code !== '') {
                var link_ward = 'https://api.mysupership.vn/v1/partner/areas/commune?district=' +
                    district_code;
                $('#ward_code').find('option').not(':first').remove();
                $.getJSON(link_ward, function(data) {
                    $.each(data.results, function(key, val) {
                        $('#ward_code').append(new Option(val.name, val.code))
                    });
                });
            } else {
                $('#ward_code').find('option').not(':first').remove();
            }
        });

        $('.input').each(function() {
            $(this).change(function() {
                console.log($(this).next('span'));
                $(this).next('br').remove();
                $(this).next('span').remove();
                $(this).removeClass('input_error');
            })
        });


    });


    function updateInfo(e) {
        e.preventDefault();
        $("<input />").attr("type", "hidden")
            .attr("name", "city_name")
            .attr("value", $("#city_code option:selected").text())
            .appendTo("#formUpdateInfo");

        $("<input />").attr("type", "hidden")
            .attr("name", "district_name")
            .attr("value", $("#district_code option:selected").text())
            .appendTo("#formUpdateInfo");

        $("<input />").attr("type", "hidden")
            .attr("name", "ward_name")
            .attr("value", $("#ward_code option:selected").text())
            .appendTo("#formUpdateInfo");
        var fdata = $('#formUpdateInfo').serializeArray();
        $.ajax({
            type: 'post',
            url: "/customer/update",
            dataType: 'json',
            data: fdata,

            success: function(data) {
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
                    $.each(data.result, function(key, input_error) {
                        $('.input').each(function() {
                            if ($(this).prop('id') == key) {
                                var id_div_input = '#' + key;
                                $(id_div_input).addClass('input_error');
                                $.each(input_error, function(k, v) {
                                    $(id_div_input).after(
                                        '<br><span class="text-danger font-weight-bold">' +
                                        v + '</span>');
                                })
                            }
                        });
                    });
                } else {
                    $('#registerModal').show();
                    $('#closeModal').click(function() {
                        $('#registerModal').toggle();

                    });
                    window.location.href = '/index';
                }
            },
            error: function(status) {
                console.log(status);
            }
        });
    }
</script>