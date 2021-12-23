// function processOrder(id) {
//     if (confirm("Bạn có chắc chắn muốn xử lý đơn hàng"))
//       if (confirm("Đơn hàng được xử lí sẽ không thể hủy"))
//         $.ajax({
//           type: "GET",
//           url: "action/processOrder.php",
//           data: { id: id }
//         }).done(function() {
//           $("#tdcheck" + id).html('<input type="checkbox" checked>Processed');
//           document.getElementById("tdcheck" + id).className = "process";
//           callSnackbar("Đơn hàng đã được xử lý", "1");
//         });
//   }
//   function getOrder(numpage, cur_numpage) {
//     $.ajax({
//       type: "GET",
//       url: "action/getOrder.php",
//       data: { numpage: numpage }
//     }).done(function(data) {
//       document.querySelectorAll("#pagination li.active")[0].className =
//         "page-item";
//       document.querySelectorAll("#pagination li")[cur_numpage - 1].className +=
//         " active";
//       $("#table_order").html(data);
//     });
//   }
//   function moreOrder(id, idUser) {
//     $.ajax({
//       type: "GET",
//       url: "action/getMoreOrder.php",
//       data: { id: id, idUser: idUser }
//     }).done(function(data) {
//       $("#formMoreOrder").html(data);
//     });
//   }
function toolStatiscal() {
    let min = $("#search-statiscal-min-date-created").val();
    let max = $("#search-statiscal-max-date-created").val();
    let top = $("#topsp").val();
    let time = $("#Time").val();
    $.ajax({
      type: "GET",
      url: "action/toolStatiscal.php",
      data: { min: min, max: max, top: top, time: time }
    }).done(function(data){
        $("#table_statiscal").html(data);
        document.getElementById("pagination").style.display="none";
      })
  }
  // function getToolProductByNumpage(pos, i) {
  //   let brand = $("#brand").val();
  //   let sort = $("#sort").val();
  //   $.ajax({
  //     type: "GET",
  //     url: "action/toolProduct.php",
  //     data: { brand: brand, sort: sort, numpage: pos }
  //   }).done(function(data) {
  //     $("#table_product").html(data);
  //     document.querySelectorAll("#pagination li.active")[0].className =
  //       "page-item";
  //     document.querySelectorAll("#pagination li.page-item")[i - 1].className +=
  //       " active";
  //   });
  // }
  function getStatiscal(numpage, i) {
    $.ajax({
      type: "POST",
      url: "action/getStatiscal.php",
      data: { num: numpage }
    }).done(function(data) {
      $("#table_statiscal").html(data);
    });
    document.querySelectorAll("#pagination li.active")[0].className = "page-item";
    document.querySelectorAll("#pagination li")[i - 1].className ="page-item active";
  }
  // $('#btnThem').click(function(){
  //   $.ajax({
  //     type: "POST",
  //     url: "action/addNewProduct.php",
  //     data: $("formAddNewProduct").serialize(),
  //   }).done(function(data){
  //     //xem lại vị trí trang hiện tại
  //     if (data == 1) {
  //       //alert("yes");
  //       // if(document.getElementById!=0){
  //       // $.ajax({
  //       //   type: "GET",
  //       //   url: "action/UpdatenewBrand.php"
  //       // }).done(function(data) {
  //       //   console.log(data);
  //       //   $("#table_product").append(data);
  //       // });
  //       callSnackbar("Thêm vào thành công", 1);
  //       // resetInput();
  //     } else {
  //       //alert("no");
  //       callSnackbar("Thêm vào không thành công", 2);
  //     }
  //   })
  //     });
  // function resetForm() {
  //   $("#namepr").val("");
  //   $("#img").val("");
  //   $("#price").val("");
  //   document.getElementById("brand").value = "1";
  //   document.getElementsByTagName("input").hidden;
  // }
  // function callSnackbar(s, color) {
  //   // Get the snackbar DIV
  //   var x = document.getElementById("snackbar");
  
  //   // Add the "show" class to DIV
  //   x.innerHTML = s;
  //   x.className = "show";
  //   if (color === 1) x.style.backgroundColor = "#28a745";
  //   if (color === 2) x.style.backgroundColor = "#dc3545";
  
  //   // After 3 seconds, remove the show class from DIV
  //   setTimeout(function() {
  //     x.className = x.className.replace("show", "");
  //   }, 3000);
  // }
  // lấy dữ liệu bỏ vào modal
  //cập nhật lại dữ liệu trên database
  
//   function moreProduct(id) {
//     $.ajax({
//       type: "POST",
//       url: "action/moreProduct.php",
//       data: { "id": id },
//     }).done(function(data) {
//       $("#formProduct").html(data);
//     });
//   }
//   function SearchProduct() {
//     document.getElementById("numpage").value = "0";
//     $.ajax({
//       type: "POST",
//       url: "action/searchProduct.php",
//       data: $("#filter_price").serialize()
//     }).done(function(data) {
//       $("#content_grid").html(data);
//     });
  
//     $.ajax({
//       type: "POST",
//       url: "action/searchList.php",
//       data: $("#filter_price").serialize()
//     }).done(function(data) {
//       $("#content_list").html(data);
//     });
  
//     $.ajax({
//       type: "POST",
//       url: "action/getPaginationSearch.php",
//       data: $("#filter_price").serialize()
//     }).done(function(data) {
//       $("#pagination").html(data);
//     });
//   }