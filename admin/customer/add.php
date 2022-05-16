<?php
require_once ('../../db/dbhelper.php');

$id = $name = $user_name = $password = $phone = $address = $sale_level = '';
if (!empty($_POST)) {
    if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
	}
    if (isset($_POST['user_name'])) {
		$user_name = $_POST['user_name'];
	}
	if (isset($_POST['password'])) {
		$password = $_POST['password'];
	}
    if (isset($_POST['phone'])) {
		$phone = $_POST['phone'];
	}
	if (isset($_POST['address'])) {
		$address = $_POST['address'];
	}
    if (isset($_POST['sale_level'])) {
		$sale_level = $_POST['sale_level'];
	}

	if (!empty($name)) {
		$created_at = $updated_at = date('Y-m-d H:s:i');
		//Luu vao database
		if ($id == '') {
			$sql = 'insert into customer(name, user_name, password, phone, address, sale_level, created_at, updated_at) values ("'.$name.'","'.$user_name.'","'.$password.'","'.$phone.'","'.$address.'","'.$sale_level.'","'.$created_at.'", "'.$updated_at.'")';
		} else {
			$sql = 'update customer set name = "'.$name.'", user_name = "'.$user_name.'", password = "'.$password.'", phone = "'.$phone.'", address = "'.$address.'", sale_level = "'.$sale_level.'", updated_at = "'.$updated_at.'" where id = '.$id;
		}

		execute($sql);

		header('Location: index.php');
		die();
	}
}

if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'select * from customer where id = '.$id;
	$customer = executeSingleResult($sql);
    if ($customer != null) {
		$name = $customer['name'];
		$user_name = $customer['user_name'];
		$password = $customer['password'];
		$phone = $customer['phone'];
		$address = $customer['address'];
        $sale_level = $customer['sale_level'];
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/add.css">
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
                <li><a href="../category"><i class="fa fa-barcode fa-fw"></i> Danh mục sản phẩm</a></li>
                <li><a href="../order"><i class="fa fa-list-alt fa-fw"></i> Hóa đơn</a></li>
                <li><a href="../product"><i class="fa-solid fa-cookie-bite"></i> Sản Phẩm</a></li>
                <li><a href="../customer"><i class="fa-solid fa-users"></i> Người Dùng</a></li>
                <li><a href="../setting"><i class="fa-solid fa-gear"></i> Cài Đặt</a></li>
                <li><a href="../report"><i class="fa fa-list-alt fa-fw"></i> Báo Cáo</a></li>
            </ul>
        </div>
        <div class="page-wapper">
            <div class="page-path"><a href="index.php">Quản lý khách hàng</a>/ <a href=""><?php if($id=='') echo 'Thêm ';else echo "Sửa " ?>khách hàng</a></div>
            <div class="page-title"><h1><?php if($id=='') echo 'Thêm ';else echo "Sửa " ?>khách hàng</h1></div>
            <div class="panel-body">
				<form method="post">
                    <input type="text" name="id" value="<?=$id?>" hidden="true">
					<div class="form-group">
					  <label for="name">Tên khách hàng:</label><br>
					  <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>">
					</div>
                    <div class="form-group">
					  <label for="user_name">Tài khoản:</label><br>
					  <input required="true" type="text" class="form-control" id="user_name" name="user_name" value="<?=$user_name?>">
					</div>
                    <div class="form-group">
					  <label for="password">Mật khẩu:</label><br>
					  <input required="true" type="text" class="form-control" id="password" name="password" value="<?=$password?>">
					</div>
                    <div class="form-group">
					  <label for="phone">Số điện thoại:</label><br>
					  <input required="true" type="text" class="form-control" id="phone" name="phone" value="<?=$phone?>">
					</div>
                    <div class="form-group">
					  <label for="address">Địa chỉ:</label><br>
					  <input required="true" type="text" class="form-control" id="address" name="address" value="<?=$address?>">
					</div>
                    <div class="form-group">
					  <label for="sale_level">Cấp độ kuyến mãi:</label><br>
					  <select class="form-control" name = "sale_level">
					  <option>--lua chon sale_level--</option>

					  <?php 
					  if($sale_level==1){
                        echo '<option selected value =1>3%</option>';
                        echo '<option value = 2>5%</option>';
                      }
					  
					  else if($sale_level == 2) {
                        echo '<option  value = "1">3%</option>';
                        echo '<option selected value ="2">5%</option>';
                        }
                      else{
                        echo '<option value = "1">3%</option>';
                        echo '<option value = "2">5%</option>';
                      }
					  ?>

					  </select>
					</div>
					<button class="btn btn-add">Lưu</button>
				</form>
			</div>
        </div>
    </div>
</body>
</html>