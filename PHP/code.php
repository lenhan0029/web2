<?php
define('max_page', 12);
// lấy sản phẩm mới nhất
// function getNewestProduct()
// {
//     global $conn;
//     $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 0,8";
//     return $conn->query($sql);
// }
//add
function getNewestProduct()
{
    global $conn;
    $sql = "SELECT * FROM brand,product,sizeshoe WHERE brand.idbr=1 AND brand.idbr=product.idbr AND product.idpr=sizeshoe.idpr AND idsize=1 ORDER BY namepr DESC LIMIT 0,8";
    return $conn->query($sql);
}
//end add
function getSizeProduct($idpr)
{
    global $conn;
    $sql = "SELECT * FROM size,sizeshoe WHERE size.idsize=sizeshoe.idsize AND idpr='$idpr'";
    return $conn->query($sql);
}
function getSizebyid($idsize)
{
    global $conn;
    $sql = "SELECT * FROM size WHERE idsize='$idsize'";
    return $conn->query($sql);
}
//add
function getBrand()
{
    global $conn;
    $sql = "SELECT * FROM brand";
    return $conn->query($sql);
}
function getInfoBrand($idbr)
{
    global $conn;
    $sql = "SELECT * FROM brand WHERE idbr='$idbr'";
    return $conn->query($sql);
}
//end add




//add
function getFourBrand($idbr)
{
    global $conn;
    $sql = "SELECT * FROM product,sizeshoe WHERE idbr ='$idbr' AND product.idpr=sizeshoe.idpr AND idsize=1 LIMIT 0,8";
    return $conn->query($sql);
}
//end add

//add
function getBestSellerShoe()
{
    global $conn;
    $sql = "SELECT * FROM product ORDER BY counting_buy DESC LIMIT 0,8";
    return $conn->query($sql);
}
//end add

//add
function getShoeByIdbr($idbr, $numpage)
{
    global $conn;
    $sql = "SELECT * FROM brand,product,sizeshoe WHERE product.idbr='$idbr' AND product.idbr=brand.idbr AND product.idpr=sizeshoe.idpr AND sizeshoe.idsize=5 LIMIT $numpage,12";
    return $conn->query($sql);
}
//end add

//add
function getAmountByBrand($idbr)
{
    global $conn;
    $sql = "SELECT * FROM product WHERE idbr='$idbr'";
    return $conn->query($sql);
}
//end add
function getProductById($id)
{
    global $conn;
    $sql = "SELECT * FROM product WHERE idpr='$id'";
    return $conn->query($sql);
}
//add
function getProductBySize($id,$idsize)
{
    global $conn;
    $sql = "SELECT * FROM product,sizeshoe WHERE product.idpr=sizeshoe.idpr AND idsize='$idsize' AND sizeshoe.idpr='$id'";
    return $conn->query($sql);
}
//end add
function getOrderByIdUser($idUser)
{
    global $conn;
    $sql = "SELECT * FROM orders WHERE idUser='$idUser'";
    return $conn->query($sql);
}
function getAllProduct($numpage)
{
    global $conn;
    $sql = "SELECT *,SUM(qty) AS 'totalamount' FROM product,sizeshoe WHERE product.idpr=sizeshoe.idpr GROUP BY sizeshoe.idpr LIMIT $numpage,7";
    return $conn->query($sql);
}
function getAllInfoProduct($idpr)
{
    global $conn;
    $sql = "SELECT *,SUM(qty) AS 'totalamount' FROM product,sizeshoe WHERE product.idpr=sizeshoe.idpr AND sizeshoe.idpr='$idpr' GROUP BY sizeshoe.idpr";
    return $conn->query($sql);
}
//fix
function getAllProductNoNumpage()
{
    global $conn;
    $sql = "SELECT *,SUM(qty) AS 'totalamount' FROM product,sizeshoe WHERE product.idpr=sizeshoe.idpr GROUP BY sizeshoe.idpr";
    return $conn->query($sql);
}
//nhan
function getAll(){
    global $conn;
    $sql = "SELECT * FROM product";
    return $conn->query($sql);
}
//add
// function getAmountByBrand($idbr)
// {
//     global $conn;
//     $sql = "SELECT * FROM product WHERE idbr='$idbr'";
//     return $conn->query($sql);
// }

// function getOrderByIdUser($idUser)
// {
//     global $conn;
//     $sql = "SELECT * FROM orders WHERE idUser='$idUser'";
//     return $conn->query($sql);
// }
// function getAllProduct($numpage)
// {
//     global $conn;
//     $sql = "SELECT * FROM product LIMIT $numpage,7";
//     return $conn->query($sql);
// }
function getSumProduct($idpr){
    global $conn;
    $sql = "SELECT (COUNT(z2.qty)) AS soluong 
    FROM sizeshoe z1,sizeshoe z2,product 
    WHERE z1.idpr=z2.idpr AND product.idpr=z1.idpr AND z1.idpr=$idpr GROUP BY z1.idpr";
    return $conn->query($sql);
}
function getCLProduct($idpr){
    global $conn;
    $sql = "SELECT (COUNT(z2.qty)-product.counting_buy) AS soluong 
    FROM sizeshoe z1,sizeshoe z2,product 
    WHERE z1.idpr=z2.idpr AND product.idpr=z1.idpr AND z1.idpr=$idpr GROUP BY z1.idpr";
    return $conn->query($sql);
}
//end add
function getAllUser($numpage)
{
    global $conn;
    $sql = "SELECT * FROM users LIMIT $numpage,7";
    return $conn->query($sql);
}
function getAllUserNoNumpage()
{
    global $conn;
    $sql = "SELECT * FROM users";
    return $conn->query($sql);
}
function getOrder($numpage)
{
    global $conn;
    $sql = "SELECT * FROM orders LIMIT $numpage,7";
    return $conn->query($sql);
}
function getOrderdxl($numpage)
{
    global $conn;
    $sql = "SELECT * FROM orders WHERE delivery=1 LIMIT $numpage,7";
    return $conn->query($sql);
}
function getOrderById($id)
{
    global $conn;
    $sql = "SELECT * FROM orders WHERE id = '$id'";
    return $conn->query($sql);
}
function getOrderNoNumpage()
{
    global $conn;
    $sql = "SELECT * FROM orders";
    return $conn->query($sql);
}
function getUserByIdUser($id)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE id='$id'";
    return $conn->query($sql);
}
function getInformationOrder($idPackage)
{
    global $conn;
    $sql = "SELECT * FROM informationorder WHERE idPackage = '$idPackage'";
    return $conn->query($sql);
}
function getAllInformationOrder()
{
    global $conn;
    $sql = "SELECT *,SUM(qty) AS soluong, SUM(price) AS tongtien FROM informationorder GROUP BY idpr";
    return $conn->query($sql);
}
//nhan
function getInformationOrderDiscounting($idPackage){
    global $conn;
    $sql = "SELECT * FROM informationorder_discounting WHERE idOrder = '$idPackage'";
    return $conn->query($sql);
}
function getAllInformationOrderDiscounting()
{
    global $conn;
    $sql = "SELECT *,SUM(qty) AS soluong, SUM(price) AS tongtien FROM informationorder_discounting GROUP BY idpr";
    return $conn->query($sql);
}
function getProductBySearch($value, $numpage)
{
    global $conn;
    $sql = "SELECT * FROM products WHERE title LIKE '%$value%' OR author LIKE '%$value%' OR casebook LIKE '%$value%' LIMIT $numpage,7";
    return $conn->query($sql);
}
// function sortProduct($option,$numpage,$sort){
//     global $conn;
//     $sql = "SELECT * FROM products ORDER BY $option "
function getProductBySearchNoNumpage($value)
{
    global $conn;
    $sql = "SELECT * FROM products WHERE title LIKE '%$value%' OR author LIKE '%$value%' OR casebook LIKE '%$value%'";
    return $conn->query($sql);
}
function updateDiscoutingProduct($id, $discounting)
{
    global $conn;
    $sql = "UPDATE products SET discounting='$discounting' WHERE id ='$id'";
    return $conn->query($sql);
}
function getDiscounting()
{
    global $conn;
    $sql = "SELECT * FROM discounting";
    return $conn->query($sql);
}
function getInformationProductDiscountingById($id) // lấy hết tất cả sản phẩm theo giảm giá
{
    global $conn;
    $sql = "SELECT * FROM products_discounting WHERE idDiscounting='$id'";
    return $conn->query($sql);
}
function getDiscountingById($id) //lấy thông tin giảm giá theo id
{
    global $conn;
    $sql = "SELECT * FROM   discounting WHERE id='$id'";
    return $conn->query($sql);
}
function getProductsWithoutDiscounting($idDiscounting) //lấy sản phẩm không có giảm giá
{
    global $conn;
    $sql = "SELECT * FROM products WHERE not EXISTS (SELECT * FROM products_discounting WHERE products_discounting.idProduct=products.id AND products_discounting.idDiscounting='$idDiscounting')";
    return $conn->query($sql);
}
function getDiscountingToday() //lấy giảm giá ngày hôm nay
{
    global $conn;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = new DateTime();
    //echo date_format($date, "Y-m-d");
    $date_format = date_format($date, "Y-m-d");
    $sql = "SELECT * FROM discounting WHERE time_start <= '$date_format' AND '$date_format' <= time_end ";
    return $conn->query($sql);
}
function getProductByIdDiscounting($id) //cùng line147
{
    global $conn;
    $sql = "SELECT * FROM products_discounting WHERE idDiscounting = '$id' ";
    return $conn->query($sql);
}
function checkProductIsDiscounting($idProduct)
{
    global $conn;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = new DateTime();
    //echo date_format($date, "Y-m-d");
    $date_format = date_format($date, "Y-m-d");
    $sql = "SELECT * FROM discounting WHERE time_start <= '$date_format' AND '$date_format' <= time_end ";
    $result = $conn->query($sql);
    // print_r($result->fetch_assoc());
    $bool = null;
    if ($result->num_rows != 0) {
        $discounting = $result->fetch_assoc();
        $sql = "select * from products_discounting where idpr='$idProduct' AND idDiscounting ='{$discounting['id']}'";
        $bool = $conn->query($sql);
        //echo $sql;
    } else {
        $bool = null;
    }
    return $bool->num_rows;
}
function getdiscountingInformationOrder($idOrder)
{
    global $conn;
    $sql = "SELECT * FROM informationorder_discounting WHERE idOrder='$idOrder'";
    return $conn->query($sql);
}
//add
function getqty($idpr, $idsize)
{
    global $conn;
    $sql = "SELECT * FROM sizeshoe WHERE idpr='$idpr' AND idsize='$idsize'";
    return $conn->query($sql);
}
//end add
//nhi
function findBrandbyId($idbr){
    global $conn;
    $sql= "SELECT namebr FROM brand WHERE brand.idbr='$idbr'";
    return $conn->query($sql);

}
function getSize(){
    global $conn;
    $sql="SELECT * FROM size";
    return $conn->query($sql);
}
//nhan
function getidprbyname($name)
{
    global $conn;
    $sql="SELECT idpr FROM product WHERE namepr='$name'";
    return $conn->query($sql);
}
function getProducio($idpr)
{
    global $conn;
    $sql="SELECT * FROM informationorder WHERE idpr='$idpr'";
    return $conn->query($sql);
}
function getProduciod($idpr)
{
    global $conn;
    $sql="SELECT * FROM informationorder_discounting WHERE idpr='$idpr'";
    return $conn->query($sql);
}
function getProductpd($idpr)
{
    global $conn;
    $sql="SELECT * FROM products_discounting WHERE idpr='$idpr'";
    return $conn->query($sql);
}
//
function getallqty($idpr)
{
    global $conn;
    $sql="SELECT SUM(qty) AS sl FROM sizeshoe WHERE idpr='$idpr'";
    return $conn->query($sql);
}