<div class="modal fade" id="addnewUser" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Thêm tài khoản</h5>
                <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAddNewUser" action="action/AddUser.php" method="post" class="" enctype='multipart/form-data'>
                <div class="form-group">
                <label for="title" class=" form-control-label">Username</label>
                        <input type="text" name="username" id="username" placeholder="Vui lòng nhập tên" class="form-control" onkeyup="checkuser();" onblur="checkuser();">
                        <div id ="warning_name"></div>
                    </div>
                    <div class="form-group">
                    <label for="title" class=" form-control-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Vui lòng nhập passwd" class="form-control" onkeyup="checkpassword();" onblur="checkpassword();">
                        <div id="warning_pass"></div>
                    </div>
                    <div class="form-group">
                    <label for="price" class=" form-control-label">Password</label>
                        <input type="password" name="pre_password" id="pre_password" placeholder="Vui lòng nhập lại passwd" class="form-control" onkeyup="checkprepassword();" onblur="checkprepassword();">
                        <div id="warning_repass"></div>
                    </div>
                    <div class="form-group">
                    <label for="price" class=" form-control-label">@email</label>
                        <input type="text" name="email" id="email" placeholder="Vui lòng email" class="form-control" onblur="checkemail();" onkeyup="checkemail();">
                        <div id="warning_email"></div>
                    </div>
                    <div class="form-group">
                        <label for="sex" class=" form-control-label" name="sex" id="sex">Sex:</label>
                        <input type="radio" name="gender" id="gender" value="male" checked>Nam
                        <input type="radio" name="gender" id="gender" value="female">Nữ
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="btnThem" onclick="addNewUser()">Thêm</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 