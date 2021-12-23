function getSearch(pos) {
  $("#numpage").val(pos);
  $.ajax({
    type: "POST",
    url: "action/searchGrid.php",
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

  document.querySelectorAll("#pagination li.active")[0].className = "";
  document.getElementById("li" + pos).className = "active";
}
//add
function checksearchpricefrom(){
  let test = document.getElementById("pricefrom");
  let re = /[0-9]/;
  let rs = re.test(test.value);
  if(!rs){
    test.value = "";
  }
}
function checksearchpriceto(){
  let test = document.getElementById("priceto");
  let re = /[0-9]/;
  let rs = re.test(test.value);
  if(!rs){
    test.value = "";
  }
}
function SearchPopup()
{
  // $("#numpage1").val(pos);
  let namepr = document.getElementById("search_input").value;
  $.ajax({
    type: "POST",
    url: "action/searchNormal.php",
    data: { namepr: namepr }
  }).done(function(data) {
    $("#content_search").html(data);
  });

  // document.querySelectorAll("#pagination li.active")[0].className = "";
  // document.getElementById("li" + pos).className = "active";
}
