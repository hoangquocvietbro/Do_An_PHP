<?php
require_once ('db/dbhelper.php');
$product_id = 1;
if(isset($_GET["product_id"])) $product_id = $_GET["product_id"];
$sql = 'select * from product where id='.$product_id.'';
$item = executeSingleResult($sql);
?>
<link rel="stylesheet" href="./css/product.css">
<div class="main-heading"><h1>Chi tiết sản phẩm</h1></div>
<div class="main-items">
    <?php
        echo '
                    <div class="item">
                        <img src="./admin/img/uploads/products/'.$item["img"].'" alt="">
                    </div>
                    <div class="item">
                        <h3>'.$item["name"].'</h3>
                        <p>'.$item["description"].'</p>
                        <h3>giá: '.$item["price"].' vnd</h3>
                    </div>
                    <div class="item-order">
                        <form action="cart.php">
                            <p></p>
                            <input hidden value="'.$item["id"].'" name="product_id">
                            <input hidden value="order" name="menu">
                            <h3>Số lượng</h3>
                            <br><br><input name="soluong" type="number" value="1" min=1 max=1000><br> 
                            <input value="Đặt hàng" class="btn-order" type="submit">                    
                        </form>
                    </div>
                ';
    ?>
</div>