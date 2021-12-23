<?php
require "component/public/bradcaumpaccount.php";
?>
<section class="my_account_area pt--80 pb--55 bg--white">
    <div class="container">
        <div class="row">
            <div id="jump"></div>
            <div style="width:80%;margin:auto">
                <div class="my__account__wrapper">
                    <h3 class="account__title">Đăng kí</h3>
                    <form id="form" name="form">

                        <div id="alert"></div>
                        <div class="account__form">
                            <div class="input__box">
                                <label>Họ:<span>*</span></label>
                                <input type="text" id="lastname" name="lastname" onblur="checklastname();" onkeyup="checklastname();">
                                <div id="warning_lastname"></div>
                            </div>
                            <div class="input__box">
                                <label>Tên:<span>*</span></label>
                                <input type="text" name="firstname" onblur="checkfirstname();" onkeyup="checkfirstname();">
                                <div id="warning_firstname"></div>
                            </div>
                            <div class="input__box">
                                <label>Email<span>*</span></label>
                                <input type="text" name="email" onblur="checkemail();" onkeyup="checkemail();">
                                <div id="warning_email"></div>
                            </div>
                            <div class="input__box">
                                <label>Số điện thoại<span>*</span></label>
                                <input type="text" name="phone_number" onblur="checkphonenumber();" onkeyup="checkphonenumber();">
                                <div id="warning_phone_number"></div>
                            </div>
                            <div class="input__box">
                                <label>Địa chỉ<span>*</span></label>
                                <input type="text" name="address">
                                <div id="warning_address"></div>
                            </div>
                            <div class="input__box">
                                <label>Tài khoản:<span>*</span></label>
                                <input type="text" name="username" onkeyup="checkuser();" onblur="checkuser();">
                                <div id="warning_username"></div>
                            </div>
                            <div class="input__box">
                                <label>Mật khẩu:<span>*</span></label>
                                <input type="password" name="password" onkeyup="checkpassword();" onblur="checkpassword();">
                                <div id="warning_password"></div>
                            </div>
                            <div class="input__box">
                                <label>Nhập lại mật khẩu:<span>*</span></label>
                                <input type="password" name="pre_password" onkeyup="checkprepassword();" onblur="checkprepassword();">
                                <div id="warning_pre_password"></div>
                            </div>
                            <div style>
                                <label>Giới tính:<span></span></label>
                                <input checked type="radio" name="gender" value="1">Nam
                                <input type="radio" name="gender" value="0">Nữ
                            </div>
                            <div>
                                <label>Ngày sinh<span>*</span></label>
                                <input type="date" name="date">
                                <div id="warning_date"></div>
                            </div>
                            <div style="overflow:hidden">
                                <button class="btn btn-primary" style="float:right" type="button" onclick="checknewaccount()">Đăng kí</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>