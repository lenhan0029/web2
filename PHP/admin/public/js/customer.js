var sort = 0; // sắp xếp tăng dần
function moreUser(id) {
  $.ajax({
    type: "GET",
    url: "action/ActionUser/getMoreUser.php",
    data: { id: id }
  }).done(function(data) {
    $("#formMoreUser").html(data);
  });
}
function sortUser(option) {
  if (sort == 0) sort = 1;
  else sort = 0;
  $.ajax({
    type: "GET",
    url: "action/sort/user/sortUser.php",
    data: { option: option, sort: sort }
  }).done(function(data) {
    $("#table_customer").html(data);
  });
}
//lấy dữ liệu thông tin bỏ vào modal
function getUpdateUser(idUser) {
  $.ajax({
    type: "GET",
    url: "action/ActionUser/getUpdateUser.php",
    data: { id: idUser }
  }).done(function(data) {
    $("#formUpdateUser").html(data);
  });
}
