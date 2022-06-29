<?php
include("../admin.php");

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
	$upload_image="../img/uploads/products/";
		$file_tmp= isset($_FILES['hinhanh']['tmp_name']) ?$_FILES['hinhanh']['tmp_name'] :"";
		$file_name=isset($_FILES['hinhanh']['name']) ?$_FILES['hinhanh']['name'] :"";
		$file_type=isset($_FILES['hinhanh']['type']) ?$_FILES['hinhanh']['type'] :"";
		$file_size=isset($_FILES['hinhanh']['size']) ?$_FILES['hinhanh']['size'] :"";
		$file_error=isset($_FILES['hinhanh']['error']) ?$_FILES['hinhanh']['error'] :"";
		//Lay gio cua he thong
		$dmyhis= date("Y").date("m").date("d").date("H").date("i").date("s");
		//Lay ngay cua he thong
		$ngay=date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s");
		
		$file__name__=$dmyhis.$file_name;
		move_uploaded_file($file_tmp,$upload_image.$file__name__);
		if($file_name==null) $file__name__ = $img;
	if (!empty($name)) {
		$created_at = $updated_at = date('Y-m-d H:s:i');
		//Luu vao database
		if ($id == '') {
			$sql = 'insert into product(name, description, price, img, id_category, created_at, updated_at) values ("'.$name.'","'.$description.'","'.$price.'","'.$file__name__.'","'.$category_id.'", "'.$created_at.'", "'.$updated_at.'")';
		} else {
			$sql = 'update product set name = "'.$name.'", description = "'.$description.'",price = "'.$price.'",img = "'.$file__name__.'", id_category = "'.$category_id.'", updated_at = "'.$updated_at.'" where id = '.$id;
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
</head>
<body>
        <div class="page-wapper">
            <div class="page-path"><a href="index.php">Sản phẩm</a>/ <a href=""><?php if($id=='') echo 'Thêm ';else echo "Sửa " ?>sản phẩm</a></div>
            <div class="page-title"><h1><?php if($id=='') echo 'Thêm ';else echo "Sửa " ?>sản phẩm</h1></div>
            <div class="panel-body">
				<form method="post" enctype="multipart/form-data">
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
					<tr>
					<input hidden type="text" class="form-control" id="img" name="img" value="<?=$img?>"><br>
            	    <td>Hình ảnh </td><td class="img_hienthi_sp"><img src="../img/uploads/products/<?=$img?>"   width="80" height="120"/><br /><br /><input type="file" name="hinhanh" /></td>
                    </tr>
                    <div class="form-group">
					  <label for="description">Chi tiết sản phẩm:</label><br>
					  <textarea required="true" type="text" class="form-control" id="description" name="description" row="50" ><?=$description?></textarea>
					</div>
					<button class="btn btn-add">Lưu</button>
				</form>
			</div>
        </div>
    </div>
</body>
</html>