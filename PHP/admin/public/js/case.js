var sort = 0; // tăng dần
function sortCase(option) {
  if (sort == 0) sort = 1;
  else sort = 0;
  $.ajax({
    type: "GET",
    url: "action/sort/case/sortCase.php",
    data: { option: option, sort: sort }
  }).done(function(data) {
    $("#table_case").html(data);
  });
}
// gọi dữ liệu bỏ vào modal update
function getUpdateCasebook(casebook, pos) {
  //pos là vị trí cái row
  $.ajax({
    type: "GET",
    url: "action/ActionCasebook/getUpdateCasebook.php",
    data: { casebook: casebook, pos: pos }
  }).done(function(data) {
    $("#formUpdateCasebook").html(data);
  });
}
// gửi cái post lên server

function updateCasebook(pos) {
  if (confirm("Bạn có chắc chắc muốn cập nhật dữ liệu ?"))
    $("#formUpdateCasebook").ajaxSubmit({
      type: "POST",
      url: "action/ActionCasebook/updateCasebook.php",
      success: function(data) {
        console.log(document.forms.formUpdateCasebook.casebook.value);
        $.ajax({
          type: "GET",
          url: "action/ActionCasebook/getOneRowAfterUpdateProduct.php",
          data: {
            casebook: document.forms.formUpdateCasebook.casebook.value,
            pos: pos
          } //pos là vị trí cái row
        }).done(function(data) {
          $("#tr" + pos).html(data);
        });
        if (data) {
          callSnackbar("Cập nhật thành công ", 1);
          $("#updateCasebook").modal("hide");
        } else callSnackbar("Cập nhật không thành công", 2);
        console.log(data);
      }
    });
}
