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