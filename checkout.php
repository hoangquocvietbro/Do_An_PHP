<?php
$conn = mysqli_connect('localhost','root','','db_cookies_restaurant');
mysqli_set_charset($conn,'utf8');
require_once ('db/dbhelper.php');
require_once ('session/session.php');
if(!isset($_SESSION['user'])){
    header("location: loginCustomer.php");
}
$user = $_SESSION['user'][0];
$cart = (isset($_SESSION['cart']))? $_SESSION['cart']:[];
if(isset($_POST["name"])){
    $name= $_POST["name"];
}
if(isset($_POST["phone"])){
    $phone= $_POST["phone"];
}
if(isset($_POST["address"])){
    $address= $_POST["address"];
}

if(isset($_POST["customer_id"])){
    $customer_id= $_POST["customer_id"];
    $sql = 'update customer set name = "'.$name.'",phone = "'.$phone.'", address = "'.$address.'" where id = '.$customer_id;
    execute($sql);

    $sql = 'insert into tb_order(customer_id,status) values ("'.$customer_id.'","Đang xử lý")';
    $query= mysqli_query($conn,$sql);
    if($query){
        $order_id = mysqli_insert_id($conn);
        foreach($cart as $value){
            $sql = 'insert into order_detail(order_id,product_id,quantity,price) values ("'.$order_id.'","'.$value["id"].'","'.$value["quantity"].'","'.$value["price"].'")';
            mysqli_query($conn,$sql);
        }
        unset($_SESSION['cart']);
        header("Location: index.php");
    }
}

?>
<link rel="stylesheet" href="./css/checkout.css">
<form action="index.php?menu=checkout" method="POST">
<div class="main-heading"><h1>Giỏ hàng</h1></div>
<div class="main-items">
<div class="item">
<div class="main-heading"><h2>Thông tin khách hàng</h2></div>
    <table>
        <tbody>
            <tr>
                <td>Tên: </td>
                <input hidden name="customer_id" type = "text" value="<?=$user["id"]?>">
                <td><input name="name" type = "text" value="<?=$user["name"]?>"></td>
            </tr>
            <tr>
                <td>Số điện thoại: </td>
                <td><input name="phone" type = "text" value="0<?=$user["phone"]?>"></td>
            </tr>
            <tr>
                <td>Đia chỉ: </td>
                <td><input name="address" type = "text" value="<?=$user["address"]?>"></td>
            </tr>
            <tr>
                <td>Chiết Khấu: </td>
                <?php 
                if($user["sale_level"]==1){
                    echo '<td><input disabled type = "text" value="3%"></td>';
                }
                if($user["sale_level"]==2){
                    echo '<td><input disabled type = "text" value="5%"></td>';
                }
                ?>   
            </tr>
            <tr>
                <td>Phương thức thanh toán: </td>
                <td><input disabled type = "radio" checked value=""> Tiền mặt</td>
            </tr>
        </tbody>
    </table>
</div>
    <div class="item">
    <div class="main-heading"><h2>Hóa đơn</h2></div>
           <table >
            <thead>
                <th>Tên bánh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </thead>
            <tbody>
            <?php
            $tongtien=0;
            foreach($cart as $item){
            $tongtien += $item["price"]*$item["quantity"];
            echo '
                <tr>
                    <td>'.$item["name"].'</td>
                    <td>'.$item["price"].'</td>
                    <td>'.$item["quantity"].'</td>
                    <td>'.$item["price"]*$item["quantity"].'</td>
                </tr>';
            }
            if($user["sale_level"]==1){
                $tongtien = $tongtien- $tongtien*0.03;
            }
            if($user["sale_level"]==2){
                $tongtien = $tongtien- $tongtien*0.05;
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
           <button class="btn-checkOut">Mua</button>

    </div>
</div>
</form>