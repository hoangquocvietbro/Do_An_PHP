<?php
include('session/session.php');
$cart = (isset($_SESSION['cart']))? $_SESSION['cart']:[];
?>
<link rel="stylesheet" href="./css/order.css">
<div class="main-heading"><h1>Giỏ hàng</h1></div>
<div class="main-items">
    <div class="item">
           <table >
            <thead>
                <th>Ảnh</th>
                <th>Tên bánh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th></th>
            </thead>
            <tbody>
            <?php
            $tongtien=0;
            foreach($cart as $item){
            $tongtien += $item["price"]*$item["quantity"];
            echo '
                <tr>
                    <td><img src="./admin/img/uploads/products/'.$item["img"].'" alt=""></td>
                    <td>'.$item["name"].'</td>
                    <td>'.$item["price"].'</td>
                    <form action="cart.php">
                    
                    <td><input hidden name="action" value="update"><input hidden name="product_id" value='.$item["id"].'><input name="soluong" type="number" value='.$item["quantity"].' min=1><button>Cập nhật</button></td>
                    </form>
                    <td>'.$item["price"]*$item["quantity"].'</td>
                    <td><a href="cart.php?product_id='.$item["id"].'&action=delete"><button class="btn-delete">Xóa</button></a></td>
                </tr>';
            }
            echo '
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><h3>Tổng tiền: '.$tongtien.'</h3></td>
            ';
            ?>
            </tbody>
           </table> 
           <a href="?menu=home"><button class="btn-buyMore">Mua thêm</button></a>
           <a href="index.php?menu=checkout"><button class="btn-checkOut">Thêm thông tin hanh toán</button></a>

    </div>
</div>