<?php
include("../admin.php");

//tìm kiếm
$search = '';

if(isset($_GET['search'])){
    $search = $_GET['search'];
}

//phân trang
$limit = 10;
if(isset($_GET['choose'])){
    $limit = $_GET['choose'];
}

$page= 1;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
$firstIndex = ($page-1)*$limit;
if($page<1) $page =1;
$sql_count = "select count(*) from tb_order left join customer ON tb_order.customer_id = customer.id where name like '%$search%'";
$countResult = executeSingleResult($sql_count);
$count = $countResult['count(*)'];
$number = ceil($count/$limit);


?>
<html lang="en">
<head>
</head>
<body>
        <div class="page-wapper">
            <div class="page-path"><a href="">Hóa đơn</a>/</div>
            <div class="page-title"><h1>Quản lý hóa đơn</h1></div>
            <div class="two-column">
                <div class="content-lenght">
                    <form action="index.php" method="get">
                    Xem: <select onchange="this.form.submit()" name="choose" id="">
                        <option <?php if($limit==4) echo "selected";?> value="4">4</option>
                        <option <?php if($limit==6) echo "selected";?> value="6">6</option>
                        <option <?php if($limit==8) echo "selected";?> value="8">8</option>
                        <option <?php if($limit==10) echo "selected";?> value="10">10</option>
                    </select>
                    thông tin
                    </form>
                </div>
            </div>
            <div class="two-column">
                <div class="page-search">
                    <form action="">
                    Tìm kiếm: <input type="search" placeholder="Nhập thông tin cần tìm" name="search" value=<?php echo $search;?>>
                    </form>
                </div>
            </div>
            <div class="row page-table">
            <form action="xulyorder.php" method="post">
            <input class="btn btn-add" name="giaohang" type="submit" value="Xác nhận đã thanh toán">
                <input class="btn btn-edit" name="huy" type="submit" value="Hủy đơn đặt hàng">
                <table border="1" cellspacing ="0" width="100%">
                    <thead>
						<tr>
                        <th width="30"><input type="checkbox" name="check"  class="checkbox" onclick="checkall('item', this)"></th>
							<th>Mã HD</th>
                            <th>Tên khách hàng</th>
                            <th>Điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
							<th width="65px"></th>
						</tr>
					</thead>
					<tbody>
               <?php
                //Lay danh sach danh muc tu database
                $andSearch         = "and name like '%$search%'";
                $sql = 'select *,tb_order.id as idhd from tb_order left join customer ON tb_order.customer_id = customer.id where 1 '.$andSearch.'limit '.$firstIndex.','.$limit;
                $categoryList = executeResult($sql);

                foreach ($categoryList as $item) {
                	echo '<tr>
                                <th><input type="checkbox" name="id[]" class="item" class="checkbox" value="'.$item['idhd'].'"/></th>
                				<td>'.$item['idhd'].'</td>
                                <td>'.$item['name'].'</td>
                                <td>0'.$item['phone'].'</td>
                                <td>'.$item['address'].'</td>
                				<td>'.$item['status'].'</td>
                				<td>
                                <a href="order_detail.php?id='.$item['idhd'].'">
                					Chi tiết</a>
                				</td>
                			</tr>';
                }
                ?>
                                    </tbody>
                                </table>
                                <ul class="pagination">
                                    
                <?php
                    if($page>1) echo '<li class="page-item"><a href="?page='.($page-1).'&search='.$search.'&choose='.$limit.'" class="page-link">Previous</a></li>';
                
                    $avaiablePage=[1,$page,$number];
                    for($i = 0;$i<$number;$i++){
                        if(!in_array($i+1,$avaiablePage)) continue;
                    if($page == $i+1)
                        echo '<li class="page-item page-active"><a href="?page='.($i+1).'&search='.$search.'&choose='.$limit.'" class="page-link">'.($i+1).'</a></li>';
                    else 
                    echo '<li class="page-item"><a href="?page='.($i+1).'&search='.$search.'&choose='.$limit.'" class="page-link">'.($i+1).'</a></li>';
                    }
                
                    if($page<$number) echo '<li class="page-item"><a href="?page='.($page+1).'&search='.$search.'&choose='.$limit.'" class="page-link">Next</a></li>'
                ?>
                </ul>
            </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
		function deleteCategory() {
			var option = confirm('Bạn có chắc chắn muốn xoá danh mục này không?')
		}
    function checkall(class_name, obj) {
	//Duyệt qua các checkbox có class= item
	
	var items=document.getElementsByClassName(class_name);
	if(obj.checked == true)// Đã được chọn
	{
		for(i=0; i<items.length ; i++)
			items[i].checked = true;
	}
	else {
		for(i=0; i < items.length; i++)
			items[i].checked = false;
	}
}
	</script>
</body>
</html>