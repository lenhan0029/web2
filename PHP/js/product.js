function addProductToCart(id) {
  let quantity = document.getElementById("quantity").value;
  let size = document.getElementById("size").value;
  if(size == 0){
    alert("vui lòng chọn size");
  }else {
    $.ajax({
      type: "POST",
      url: "action/checkquantity.php",
      data: {id: id,quantity: quantity, size: size}
    }).done(function(data){
      if(data == 1){
        alert("không đủ số lượng cần mua");
      }else{
        $.ajax({
          type: "GET",
          url: "action/addProductTocart.php",
          data: { id, quantity, size }
        }).then(function(data) {
          updateModalCart();
          alert("thêm thành công");
        });
      }
    })
  
}
}
