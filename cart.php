<?php
require_once ('db/dbhelper.php');
include('session/session.php');
$product_id="";
if(isset($_GET["product_id"])){
    $product_id = $_GET["product_id"];
}
$action="";
if(isset($_GET["action"])){
    $action = $_GET["action"];
}

$soluong =1;
if(isset($_GET["soluong"])){
    $soluong = $_GET["soluong"];
}
$sql = 'select id,name,img,price from product where id='.$product_id.'';
$product = executeSingleResult($sql);
$item = [
    'id'=>$product['id'],
    'name'=>$product['name'],
    'img'=>$product['img'],
    'price'=>$product['price'],
    'quantity'=>$soluong
];
switch($action){
    case "":
        $_SESSION['cart'][$product_id] = $item;
        break;
    case "update":
        $_SESSION['cart'][$product_id]["quantity"]= $soluong;
         break;  
    case "delete":
        unset($_SESSION['cart'][$product_id]);
        break;  
}
header("location: index.php?menu=order");
?>