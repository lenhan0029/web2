function resetInput(){
  $('#AddBrand').val("");
}

function getBrand(idbr){
  $.ajax({
    type: "POST",
    url:"action/EditbuttonBrand.php",
    data:{idbr:idbr}
  }).done(function(data){
    document.getElementById("model-brand").innerHTML=data;
}
  )}


  $('#buttonAddBrand').click(function(){
    let brand=$('#AddBrand').val();
    if(brand!=""){
    $.ajax({
      type: "POST",
      url: "action/addNewBrand.php",
      data: { brand: brand }
    }).done(function(data){
      if (data == 1) {
        //alert("yes");
        if(document.getElementById!=0){
        $.ajax({
          type: "GET",
          url: "action/UpdatenewBrand.php"
        }).done(function(data) {
          console.log(data);
          $("#table_product").append(data);
        });
        callSnackbar("Thêm vào thành công", 1);
        resetInput();
            window.location.assign("?page=category");
      } else {
        //alert("no");

        callSnackbar("Thêm vào không thành công", 2);
        window.location.assign("?page=category");

      }
    }
      });}
      else callSnackbar("Không để tên thương hiệu rỗng", 1);
});
function deletebrand(brand){
    //let brand=$('#delete').val();
    if(confirm("bạn muốn xóa thương hiệu này?")){
    console.log(brand);
    $.ajax({
      type: "POST",
      url: "action/deletebrand.php",
      data: { brand: brand }
    }).done(function(data){
      //xem lại vị trí trang hiện tại
      if (data == 1) {
        //alert("yes");
        callSnackbar("Xóa thành công", 1);
	$("#"+brand).remove();
        window.location.assign("?page=category");
    }
      });
    }
};
function UpdateBrand(id){
  console.log("123");
    let brand=$('#AddBrand').val();
    console.log(brand);
    console.log(id);
    if(brand!=""){
            $.ajax({
              type: "POST",
              url: "action/EditBrand.php",
              data: {brand:brand,id:id}
            }).done(function(data){
              document.getElementById(id).innerHTML=data;
            console.log(data);
            resetInput();
            document.getElementById("buttonAddBrand").innerHTML='<i class="zmdi zmdi-plus"></i>Thêm thương hiệu</button>';
            });

    }
}