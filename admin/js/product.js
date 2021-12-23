function toolProduct() {
  let brand = $("#brand").val();
  let sort = $("#sort").val();
  console.log(brand + " " + sort);
  $.ajax({
    type: "GET",
    url: "action/toolProduct.php",
    data: { brand: brand, sort: sort, numpage: 0 }
  }).done(function(data) {
    $.ajax({
      type: "GET",
      url: "action/getPageToolProduct.php",
      data: { brand: brand, sort: sort }
    }).done(function(data) {
      $("#pagination").html(data);
    });
    $("#table_product").html(data);
  });
}
function getToolProductByNumpage(pos, i) {
  let brand = $("#brand").val();
  let sort = $("#sort").val();
  $.ajax({
    type: "GET",
    url: "action/toolProduct.php",
    data: { brand: brand, sort: sort, numpage: pos }
  }).done(function(data) {
    $("#table_product").html(data);
    document.querySelectorAll("#pagination li.active")[0].className =
      "page-item";
    document.querySelectorAll("#pagination li.page-item")[i - 1].className +=
      " active";
  });
}
function getProduct(numpage, i) {
  $.ajax({
    type: "POST",
    url: "action/getProduct.php",
    data: { num: numpage }
  }).done(function(data) {
    $("#table_product").html(data);
  });
  document.querySelectorAll("#pagination li.active")[0].className = "page-item";
  document.querySelectorAll("#pagination li")[i - 1].className ="page-item active";
}
function addNewProduct() {
  console.log("123");
  $("#formAddNewProduct").ajaxSubmit({
    type: "POST",
    url: "action/addNewProduct.php",
    success: function(data) {
      //xem lại vị trí trang hiện tại
      var x = document.querySelectorAll("#pagination li.active")[0];
      getPaginationProduct(parseInt(x.textContent));
      // bỏ dữ liệu vào trong bảng mới thôi
      
      if (data == 1) {
        // alert("yes");
        resetForm();
        callSnackbar("Thêm vào thành công", 1);
        document.getElementById("close").click();
        if (document.getElementsByClassName("productlist").length != 8) {
          $.ajax({
            type: "GET",
            url: "action/updateNewProduct.php"
          }).done(function(data) {
            // alert(data);
            $("#table_product").append(data);
          });
        }
      }else if(data==2){
        alert("đã tồn tại sản phẩm");
      }else if(data==3){
        alert("bị trùng lặp thuộc tính");
      }
       else {
        //alert("no");
        callSnackbar("Thêm vào không thành công", 2);
      }
    }
  });
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
function resetForm() {
  $("#namepr").val("");
  $("#img").val("");
  $("#price").val("");
  document.getElementById("brand").value = "1";
  document.getElementsByTagName("input").hidden;
}
function callSnackbar(s, color) {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.innerHTML = s;
  x.className = "show";
  if (color === 1) x.style.backgroundColor = "#28a745";
  if (color === 2) x.style.backgroundColor = "#dc3545";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function() {
    x.className = x.className.replace("show", "");
  }, 3000);
}
function deleteProduct(id) {
  if (confirm("Bạn có chắc chắn muốn xóa sản phẩm"))
    $.ajax({
      type: "POST",
      url: "action/deleteProduct.php",
      data: { id: id }
    }).done(function(data) {
      if (data == 1) {
        callSnackbar("Xóa thành công", 1);
        // document.getElementById("tr" + id).style.display = "none";
        $("#tr" + id).remove();
        if (document.getElementsByTagName("tr").length == 1)
          getPaginationProduct(1);
        else {
          let x = document.querySelectorAll("#pagination li.active")[0];
          getPaginationProduct(parseInt(x.textContent));
        }
      }else{
        callSnackbar("không thể xóa sản phẩm có liên kết khóa ngoại",2)
      }
      // console.log("123");
    });
}
function getPaginationProduct(cur_numpage) {
  $.ajax({
    type: "GET",
    url: "action/getPaginationProduct.php",
    data: { cur_numpage: cur_numpage }
  }).done(function(data) {
    $("#pagination").html(data);
    //console.log(data);
  });
}
// lấy dữ liệu bỏ vào modal
function updateProduct(id) {
  $.ajax({
    type: "GET",
    url: "action/updateProduct.php",
    data: { id: id }
  }).done(function(data) {
    $("#formUpdateProduct").html(data);
  });
  //alert("123");
}
//cập nhật lại dữ liệu trên database
function updateProductInDatabase() {
  let id = document.forms.formUpdateProduct.id.value;
  $("#formUpdateProduct").ajaxSubmit({
    type: "POST",
    url: "action/updateProductInDatabase.php",
    success: function(data) {
      if (data == 1) {
        $.ajax({
          type: "GET",
          url: "action/getOneRowAfterUpdateProduct.php",
          data: {
            id: id
          }
        }).done(function(data) {
          $("#tr" + id).html(data);
          // document.querySelectorAll("#tr" + 1 + " td")[0].style.animation =
          //   "example 4s";
          // document.querySelectorAll("#tr" + 1 + " td")[1].style.animation =
          //   "example 4s";
          // document.querySelectorAll("#tr" + 1 + " td")[2].style.animation =
          //   "example 4s";
          // document.querySelectorAll("#tr" + 1 + " td")[3].style.animation =
          //   "example 4s";
          // document.querySelectorAll("#tr" + 1 + " td")[4].style.animation =
          //   "example 4s";
          // document.querySelectorAll("#tr" + 1 + " td")[5].style.animation =
          //   "example 4s";
          // document.querySelectorAll("#tr" + 1 + " td")[6].style.animation =
          //   "example 4s";
          // document.querySelectorAll("#tr" + 1 + " td")[7].style.animation =
          //   "example 4s";
          // document.getElementById("myDIV").style.animation = "mynewmove 4s 2";
        });
        callSnackbar("Chỉnh sửa thành công", 1);
        $("#updateProduct").modal("toggle");
      } else {
        console.log(data);
        callSnackbar("Chỉnh sửa không thành công", 2);
      }
    }
  });
}
function moreProduct(id) {
  $.ajax({
    type: "POST",
    url: "action/moreProduct.php",
    data: { "id": id },
  }).done(function(data) {
    $("#formProduct").html(data);
  });
}
function SearchProduct() {
  document.getElementById("numpage").value = "0";
  $.ajax({
    type: "POST",
    url: "action/searchProduct.php",
    data: $("#filter_price").serialize()
  }).done(function(data) {
    $("#content_grid").html(data);
  });

  $.ajax({
    type: "POST",
    url: "action/searchList.php",
    data: $("#filter_price").serialize()
  }).done(function(data) {
    $("#content_list").html(data);
  });

  $.ajax({
    type: "POST",
    url: "action/getPaginationSearch.php",
    data: $("#filter_price").serialize()
  }).done(function(data) {
    $("#pagination").html(data);
  });
}
function displayqty($size)
{
  if(document.getElementById("size"+$size).style.display=="block"){
    document.getElementById("size"+$size).style.display="none";
  }else{
    document.getElementById("size"+$size).style.display="block";
  }
}