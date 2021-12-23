function processOrder(id,index) {
  if (confirm("Bạn có chắc chắn muốn xử lý đơn hàng"))
    if (confirm("Đơn hàng được xử lí sẽ không thể hủy"))
      $.ajax({
        type: "GET",
        url: "action/processOrder.php",
        data: { id: id }
      }).done(function() {
        document.getElementsByClassName("circle")[index].classList.toggle("left", true)
        document.getElementsByClassName("circle")[index].classList.toggle("left", false)
            callSnackbar("Đơn hàng đã được xử lý", "1");
      });
}
function getOrder(numpage, cur_numpage) {
  $.ajax({
    type: "GET",
    url: "action/getOrder.php",
    data: { numpage: numpage }
  }).done(function(data) {
    document.querySelectorAll("#pagination li.active")[0].className =
      "page-item";
    document.querySelectorAll("#pagination li")[cur_numpage - 1].className +=
      " active";
    $("#table_order").html(data);
  });
}
function moreOrder(id, idUser) {
  $.ajax({
    type: "GET",
    url: "action/getMoreOrder.php",
    data: { id: id, idUser: idUser }
  }).done(function(data) {
    $("#formMoreOrder").html(data);
    console.log(data);
  });
}
$('.order-row').click(function(e) {
  let currentTarget = e.currentTarget;
  let id = currentTarget.dataset.id;
  let index=currentTarget.dataset.index;
  processOrder(id,index);

});
//nhi
$('#ToolOrder').click(function() {
  let min = $("#search-order-min-date-created")[0].value;
  let max = $("#search-order-max-date-created")[0].value;
  // let status = document.getElementById("status").value;
  $.ajax({
    type: "GET",
    url: "action/toolOrder.php",
    data: {min:min,max:max}
  }).done(function(data){
    $("#table_order").html(data);
  })
});
