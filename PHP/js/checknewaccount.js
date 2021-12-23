function checknewaccount() {
  let lastname = document.form.elements.lastname;
  let firstname = document.form.elements.firstname;
  let email = document.form.elements.email;
  let phone_number = document.form.elements.phone_number;
  let username = document.form.elements.username;
  let password = document.form.elements.password;
  let pre_password = document.form.elements.pre_password;
  let gender = document.form.elements.gender;
  let date = document.form.elements.date;
  let address = document.form.address;

  if (lastname.value == "") {
    alert("Mời nhập lại họ");
    lastname.focus();
    lastname.style.backgroundColor = "#ffc107";
  } else if (firstname.value == "") {
    lastname.style.backgroundColor = "#fff";
    alert("Mời nhập tên");
    firstname.focus();
    firstname.style.backgroundColor = "#ffc107";
  } else if (email.value == "") {
    firstname.style.backgroundColor = "#fff";
    alert("Mời nhập email");
    email.focus();
    email.style.backgroundColor = "#ffc107";
  } else if (phone_number.value == "") {
    email.style.backgroundColor = "#fff";
    alert("Mời nhập số điện thoại");
    phone_number.focus();
    phone_number.style.backgroundColor = "#ffc107";
  } else if (username.value == "") {
    phone_number.style.backgroundColor = "#fff";
    alert("Mời nhập tên tài khoản");
    username.focus();
    username.style.backgroundColor = "#ffc107";
  } else if (password.value == "") {
    username.style.backgroundColor = "#fff";
    alert("Mời nhập password");
    password.focus();
    password.style.backgroundColor = "#ffc107";
  } else if (pre_password.value == "") {
    password.style.backgroundColor = "#fff";
    alert("Mời nhập lại password");
    pre_password.focus();
    pre_password.style.backgroundColor = "#ffc107";
  } else if (password.value != pre_password.value) {
    // document.getElementById("jump").scrollIntoView();
    // $("#alert").html(
    //   '<div id="alert" class="alert alert-danger" role="alert">2 Mật khẩu không trùng khớp</div>'
    // );
    pre_password.style.backgroundColor = "#fff";
    alert("2 Mật khẩu không trùng khớp");
    password.style.backgroundColor = "#ffc107";
  } else if (date.value == "") {
    password.style.backgroundColor = "#fff";
    date.focus();
  } else
    $.ajax({
      type: "POST",
      url: "action/checknewaccount.php",
      data: $("#form").serialize()
    }).done(function(data) {
      if (data.indexOf("username") != -1) {
        document.getElementById("jump").scrollIntoView();
        $("#alert").html(
          '<div id="alert" class="alert alert-danger" role="alert">Tên tài khoản đã có người sử dụng</div>'
        );
      } else if (data.indexOf("email") != -1) {
        document.getElementById("jump").scrollIntoView();
        $("#alert").html(
          '<div id="alert" class="alert alert-danger" role="alert">Email đã có người sử dụng</div>'
        );
      } else {
        window.location.assign("?page=homepage");
        console.log(data);
      }
    });
}
function checklastname(){
  let lastname = document.form.elements.lastname;
  if(lastname.value ==""){
    document.getElementById("warning_lastname").innerText="không được để trống";
    lastname.focus();
    lastname.style.backgroundColor = "#ffc107";
  }else{
    document.getElementById("warning_lastname").innerText="";
    lastname.style.backgroundColor = "#fff";
  }
}
function checkfirstname(){
  let firstname = document.form.elements.firstname;
  if(firstname.value == ""){
    document.getElementById("warning_firstname").innerText="không được để trống";
    firstname.focus();
    firstname.style.backgroundColor = "#ffc107";
  }else{
    document.getElementById("warning_firstname").innerText="";
    firstname.style.backgroundColor = "#fff";
  }
}
function checkemail(){
  let email = document.form.elements.email;
  let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/g;
  let rs = re.test(email.value);
  if(email.value ==""){
    document.getElementById("warning_email").innerText="không được để trống";
    email.focus();
    email.style.backgroundColor = "#ffc107";
  }else if(!rs){ 
    document.getElementById("warning_email").innerText="email không hợp lệ";
    email.focus();
    email.style.backgroundColor = "#ffc107";
  }else{
    document.getElementById("warning_email").innerText="";
    email.style.backgroundColor = "#fff";
  }
}
function checkphonenumber(){
  let phone_number = document.form.elements.phone_number;
  let re = /^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/;
  let rs = re.test(phone_number.value);
  if(phone_number.value ==""){
    document.getElementById("warning_phone_number").innerText="không được để trống";
    phone_number.focus();
    phone_number.style.backgroundColor = "#ffc107";
  }else if(!rs){ 
    document.getElementById("warning_phone_number").innerText="số điện thoại không hợp lệ";
    phone_number.focus();
    phone_number.style.backgroundColor = "#ffc107";
  }else{
    document.getElementById("warning_phone_number").innerText="";
    phone_number.style.backgroundColor = "#fff";
  }
}
function checkuser()
{
  let username = document.form.elements.username;
  if(username.value == "")
  {
    document.getElementById("warning_username").innerText="không được để trống";
    username.focus();
    username.style.backgroundColor = "#ffc107";
  }else if(username.value.length < 5)
  {
    document.getElementById("warning_username").innerText="tối thiểu 5 kí tự";
    username.focus();
    username.style.backgroundColor = "#ffc107";
  }else{
    document.getElementById("warning_username").innerText="";
    username.style.backgroundColor = "#fff";
  }

}
function checkpassword()
{
  let password = document.form.elements.password;
  if(password.value == "")
  {
    document.getElementById("warning_password").innerText="không được để trống";
    password.focus();
    password.style.backgroundColor = "#ffc107";
  }else if(password.value.length < 5)
  {
    document.getElementById("warning_password").innerText="tối thiểu 5 kí tự";
    password.focus();
    password.style.backgroundColor = "#ffc107";
  }else{
    document.getElementById("warning_password").innerText="";
    password.style.backgroundColor = "#fff";
  }

}
function checkprepassword()
{
  let pre_password = document.form.elements.pre_password;
  let password = document.form.elements.password;
  if(pre_password.value == "")
  {
    document.getElementById("warning_pre_password").innerText="không được để trống";
    pre_password.focus();
    pre_password.style.backgroundColor = "#ffc107";
  }else if(pre_password.value != password.value)
  {
    document.getElementById("warning_pre_password").innerText="mật khẩu không khớp";
    pre_password.focus();
    pre_password.style.backgroundColor = "#ffc107";
  }else{
    document.getElementById("warning_pre_password").innerText="";
    pre_password.style.backgroundColor = "#fff";
  }
}