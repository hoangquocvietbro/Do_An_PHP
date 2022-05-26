<?php
require_once ('../../db/dbhelper.php');
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
$sql_count = "select count(*) from employee where name like '%$search%'";
$countResult = executeSingleResult($sql_count);
$count = $countResult['count(*)'];
$number = ceil($count/$limit);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="../font/fontawesome-free-6.1.1-web/css/all.css">
</head>
<body>
    <header class="header">
        <div class="header__brand"><b><i>Cookies & Confections shop </i></b>| Admin Panel</div>
        <ul class="header__dropdown">
            <li><div class="name">Discounted Price</div><img src="../default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg" alt="">
                <ul class="header__sub-dropdown">
                    <li><a href=""><i class="fa-solid fa-pen-to-square"></i>Sửa thông tin</a></li>
                     <li><a href=""><i class="fa fa-sign-out fa-fw"></i>  Đăng xuất</a></li>
                </ul>
            </li>  
        </ul>
    </header>
    <div class="container">
        <div class="sidebar">
        <ul class="sidebar__nav">
                <li><a href="../category"><i class="fa fa-barcode fa-fw"></i> Danh mục</a></li>
                <li><a href="../product"><i class="fa-solid fa-cookie-bite"></i> Sản Phẩm</a></li>
                <li><a href="../order"><i class="fa fa-list-alt fa-fw"></i> Hóa đơn</a></li>
                <li><a href="../customer"><i class="fa-solid fa-users"></i> Khách Hàng</a></li>
                <li><a href="../employee"><i class="fa-solid fa-users"></i> Nhân viên</a></li>
                <li><a href="../setting"><i class="fa-solid fa-gear"></i> Cài Đặt</a></li>
                <li><a href="../report"><i class="fa fa-list-alt fa-fw"></i> Báo Cáo</a></li>
            </ul>
        </div>
        <div class="page-wapper">
            <div class="page-path"><a href="">Quản lý nhân viên</a>/</div>
            <div class="page-title"><h1>Quản Lý Nhân Viên</h1></div>
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
            <div class="row">
                <a href="add.php">
                <button class="btn btn-add">Thêm nhân viên</button>
                </a>
            </div>
            <div class="row page-table">
                <table border="1" cellspacing ="0" width="100%">
                    <thead>
						<tr>
							<th width="50px">STT</th>
							<th>Tên nhân viên</th>
                            <th>Tài khoản</th>
                            <th>Mật khẩu</th>
                            <th>Số điện thoại</th>
                            <th>Lương</th>
                            <th>Chức vụ</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>
					<tbody>
                <?php
                //Lay danh sach danh muc tu database
                $andSearch         = "and name like '%$search%'";
                $sql = 'select * from employee where 1 '.$andSearch.'limit '.$firstIndex.','.$limit;
                $categoryList = executeResult($sql);

                foreach ($categoryList as $item) {
                	echo '<tr>
                				<td>'.(($firstIndex++ + 1)).'</td>
                				<td>'.$item['name'].'</td>
                                <td>'.$item['user_name'].'</td>
                                <td>'.$item['password'].'</td>
                                <td>'.$item['phone'].'</td>
                                <td>'.$item['salary'].'</td>
                                <td>'.$item['role'].'</td>
                				<td>
                					<a href="add.php?id='.$item['id'].'"><button class="btn btn-edit">Sửa</button></a>
                				</td>
                				<td>
                                <a href="delete.php?id='.$item['id'].'">
                					<button class="btn btn-delete" onclick="deleteCategory()">Xoá</button></a>
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
            </div>
        </div>
    </div>
    <script type="text/javascript">
		function deleteCategory() {
			var option = confirm('Bạn có chắc chắn muốn xoá danh mục này không?')
		}
	</script>
</body>
</html>