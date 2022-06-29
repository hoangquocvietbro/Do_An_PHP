<?php
include("../admin.php");

$id = "";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}
?>
<html lang="en">
<head>
</head>
<body>
        <div class="page-wapper">
            <div class="page-path"><a href="index.php">Hóa đơn</a>/</div>
            <div class="page-title"><h1>Chi tiết hóa đơn</h1></div>
            <div class="row page-table">
                <table border="1" cellspacing ="0" width="100%">
                    <thead>
						<tr>
							<th>Mã HD</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
						</tr>
					</thead>
					<tbody>
               <?php
               $total = 0;
                //Lay danh sach danh muc tu database
                $sql = 'select * from order_detail left join product ON order_detail.product_id = product.id where order_id ='.$id.'';
                $categoryList = executeResult($sql);

                foreach ($categoryList as $item) {
                	echo '<tr>
                				<td>'.$item['order_id'].'</td>
                                <td>'.$item['name'].'</td>
                                <td>'.$item['quantity'].'</td>
                                <td>'.$item['price'].' VND</td>
                				<td>'.$item['quantity']*$item['price'].' VND</td>
                			</tr>';
                            $total += $item['quantity']*$item['price'];
                }
                echo '<tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th class="btn-delete">Tổng tiền: '.$total.'</th>
                </tr>'
                ?>
                
                                    </tbody>
                                </table>
                </ul>
                <br>
                <a href="inhd.php?mahd=<?=$id?>"><button class="btn-add">In hóa đơn</button></a>
            </div>
        </div>
    </div>
</body>
</html>