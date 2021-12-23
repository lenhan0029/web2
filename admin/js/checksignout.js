function sign_out1() {
  if (confirm("Bạn có chắc chắn muốn thoát ?"))
    $.ajax({
      type: "GET",
      url: "action/sign_out.php"
    }).done(function() {
      window.location.assign("?page=homepage");
    });
}