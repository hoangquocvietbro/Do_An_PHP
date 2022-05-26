<?php
require_once ('../../db/dbhelper.php');

$id = $name = $description = $price = $img = '';
if (!empty($_POST)) {
    if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
	}
    if (isset($_POST['description'])) {
		$description = $_POST['description'];
	}
    if (isset($_POST['price'])) {
		$price = $_POST['price'];
	}
    if (isset($_POST['img'])) {
		$img = $_POST['img'];
	}
	if(isset($_POST['category_id'])){
		$category_id = $_POST['category_id'];
	}

	if (!empty($name)) {
		$created_at = $updated_at = date('Y-m-d H:s:i');
		//Luu vao database
		if ($id == '') {
			$sql = 'insert into product(name, description, price, img, id_category, created_at, updated_at) values ("'.$name.'","'.$description.'","'.$price.'","'.$img.'","'.$category_id.'", "'.$created_at.'", "'.$updated_at.'")';
		} else {
			$sql = 'update product set name = "'.$name.'", description = "'.$description.'",price = "'.$price.'",img = "'.$img.'", id_category = "'.$category_id.'", updated_at = "'.$updated_at.'" where id = '.$id;
		}

		execute($sql);

		header('Location: index.php');
		die();
	}
}

if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'select * from product where id = '.$id;
	$product = executeSingleResult($sql);
	if ($product != null) {
		$name = $product['name'];
		$category = $product['id_category'];
		$price = $product['price'];
		$img = $product['img'];
		$description = $product['description'];
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
            <div class="page-path"><a href="index.php">Sản phẩm</a>/ <a href=""><?php if($id=='') echo 'Thêm ';else echo "Sửa " ?>sản phẩm</a></div>
            <div class="page-title"><h1><?php if($id=='') echo 'Thêm ';else echo "Sửa " ?>sản phẩm</h1></div>
            <div class="panel-body">
				<form method="post">
					<div class="form-group">
                    <input type="text" name="id" value="<?=$id?>" hidden="true">
					  <label for="name">Tên sản phẩm:</label><br>
					  <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>">
					</div>
                    <div class="form-group">
					  <label for="category_id">Danh mục:</label><br>
					  <select class="form-control" name = "category_id">
					  <option value="">--lua chon danh mục--</option>

					  <?php 
					  $sql = 'select * from category';
					  $categoryList = executeResult($sql);
					  foreach($categoryList as $item){
					  if($item['id']==$category)
					  echo '<option selected value = "'.$item['id'].'">'.$item['name'].'</option>';
					  else echo '<option value = "'.$item['id'].'">'.$item['name'].'</option>';
					  }
					  ?>

					  </select>
					</div>
                    <div class="form-group">
					  <label for="price">Giá bán:</label><br>
					  <input required="true" type="text" class="form-control" id="price" name="price" value="<?=$price?>">
					</div>
                    <div class="form-group">
					  <label for="img">Link ảnh:</label><br>
					  <input onmouseout = "showImg()" required="true" type="text" class="form-control" id="img" name="img" value="<?=$img?>"><br>
					  <img src="" alt="" class="show-img">
					</div>
                    <div class="form-group">
					  <label for="description">Chi tiết sản phẩm:</label><br>
					  <textarea required="true" type="text" class="form-control" id="description" name="description" row="50" ><?=$description?></textarea>
					</div>
					<button class="btn btn-add">Lưu</button>
				</form>
			</div>
        </div>
    </div>
	<script>
		function showImg(){
			document.getElementsByClassName('show-img')[0].src = document.getElementsByName("img")[0].value;
		}
		showImg();
	</script>
</body>
</html>