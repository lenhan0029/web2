function getProductBrand(brand, numpage) {
  $.ajax({
    type: "POST",
    url: "action/getProductBrand1.php",
    data: { brand: brand, numpage: numpage }
  }).done(function(data) {
    $("#content_grid").html(data);
    // console.log(data);
    document.querySelectorAll("li.active")[0].className = "";
    document.getElementById("li" + numpage).className = "active";
  });
  $.ajax({
    type: "POST",
    url: "action/getProductBrand2.php",
    data: { brand: brand, numpage: numpage }
  }).done(function(data) {
    $("#content_list").html(data);
  });
}
