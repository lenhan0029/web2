function moreUser(id) {
  $.ajax({
    type: "GET",
    url: "action/getMoreUser.php",
    data: { id: id }
  }).done(function(data) {
    $("#formMoreUser").html(data);
  });
}
function getUser(numpage, i) {
  $.ajax({
    type: "POST",
    url: "action/getUser.php",
    data: { num: numpage }
  }).done(function(data) {
    $("#table_product").html(data);
  });
  document.querySelectorAll("#pagination li.active")[0].className = "page-item";
  document.querySelectorAll("#pagination li")[i - 1].className ="page-item active";
}

function resetFormUser(){
    $("#name").val("");
    $("#passwd").val("");
    $("#repasswd").val("");
    $("#email").val("");
    $("#sex").val("");
}
function addNewUser() {
  let a=$("#name").val();
  let b= $("#passwd").val();
   let d=$("#email").val();
   let e=$("#gender").val();
  $("#formAddNewUser").ajaxSubmit({
    type: "POST",
    url: "action/AddUser.php",
    data: {name: a, password: b, email: d, gender: e},
    success: function(data) {
      if (data == 1) {
        //alert("yes");
        callSnackbar("Thêm vào thành công", 1);
        window.location.assign("?page=customer")
        document.getElementById("close").click();
        $.ajax({
          type: "GET",
          url: "action/updateNewUser.php"
        }).done(function(data) {
          $("#table_product").append(data);
          console.log(data);
        });
      } 
    }
  });
}
function checkadduser(){
  let name = document.getElementById("name");
  let pass = document.getElementById("passwd");
  let repass = document.getElementById("repasswd");
  let email = document.getElementById("email");
  if(name.value == ""){
    document.getElementById("warning_name").innerText="không được để trống";
    name.focus();
  }
  if(pass.value == ""){
    document.getElementById("warning_pass").innerText="không được để trống";
    pass.focus();
  }else if(pass.value.length < 5){
    document.getElementById("warning_pass").innerText="tối thiểu 5 kí tự";
  }
  if(repass.value == ""){
    document.getElementById("warning_repass").innerText="không được để trống";
    repass.focus();
  }else if(pass.value != repass.value){
    document.getElementById("warning_repass").innerText="không trùng khớp";
  }
  if(email.value == ""){
    document.getElementById("warning_email").innerText="không được để trống";
    email.focus();
  }
}

function checkemail(){
  let email = document.getElementById("email");
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
function checkpassword()
{
  let password = document.getElementById("password");
  if(password.value == "")
  {
    document.getElementById("warning_pass").innerText="không được để trống";
    password.focus();
    password.style.backgroundColor = "#ffc107";
  }else if(password.value.length < 5)
  {
    document.getElementById("warning_pass").innerText="tối thiểu 5 kí tự";
    password.focus();
    password.style.backgroundColor = "#ffc107";
  }else{
    document.getElementById("warning_pass").innerText="";
    password.style.backgroundColor = "#fff";
  }

}
function checkprepassword()
{
  let pre_password = document.getElementById("pre_password");
  let password = document.form.elements.password;
  if(pre_password.value == "")
  {
    document.getElementById("warning_pre_pass").innerText="không được để trống";
    pre_password.focus();
    pre_password.style.backgroundColor = "#ffc107";
  }else if(pre_password.value != password.value)
  {
    document.getElementById("warning_repass").innerText="mật khẩu không khớp";
    pre_password.focus();
    pre_password.style.backgroundColor = "#ffc107";
  }else{
    document.getElementById("warning_repass").innerText="";
    pre_password.style.backgroundColor = "#fff";
  }
}
function checkuser()
{
  let username = document.getElementById("username");
  if(username.value == "")
  {
    document.getElementById("warning_name").innerText="không được để trống";
    username.focus();
    username.style.backgroundColor = "#ffc107";
  }else if(username.value.length < 5)
  {
    document.getElementById("warning_name").innerText="tối thiểu 5 kí tự";
    username.focus();
    username.style.backgroundColor = "#ffc107";
  }else{
    document.getElementById("warning_name").innerText="";
    username.style.backgroundColor = "#fff";
  }

}