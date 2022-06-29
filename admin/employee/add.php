<?php
include("../admin.php");

$id = $name = $user_name = $password = $phone = $salary = $role = '';
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
		$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
	}
    if (isset($_POST['phone'])) {
		$phone = $_POST['phone'];
	}
	if (isset($_POST['salary'])) {
		$salary = $_POST['salary'];
	}
    if (isset($_POST['role'])) {
		$role = $_POST['role'];
	}

	if (!empty($name)) {
		$created_at = $updated_at = date('Y-m-d H:s:i');
		//Luu vao database
		if ($id == '') {
			$sql = 'insert into employee(name, user_name, password, phone, salary, role, created_at, updated_at) values ("'.$name.'","'.$user_name.'","'.$password.'","'.$phone.'","'.$salary.'","'.$role.'","'.$created_at.'", "'.$updated_at.'")';
		} else {
			$sql = 'update employee set name = "'.$name.'", user_name = "'.$user_name.'", password = "'.$password.'", phone = "'.$phone.'", salary = "'.$salary.'", role = "'.$role.'", updated_at = "'.$updated_at.'" where id = '.$id;
		}

		execute($sql);

		header('Location: index.php');
		die();
	}
}

if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'select * from employee where id = '.$id;
	$employee = executeSingleResult($sql);
    if ($employee != null) {
		$name = $employee['name'];
		$user_name = $employee['user_name'];
		$password = $employee['password'];
		$phone = $employee['phone'];
		$salary = $employee['salary'];
        $role = $employee['role'];
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
        <div class="page-wapper">
            <div class="page-path"><a href="index.php">Quản lý nhân viên</a>/ <a href=""><?php if($id=='') echo 'Thêm ';else echo "Sửa " ?>nhân viên</a></div>
            <div class="page-title"><h1><?php if($id=='') echo 'Thêm ';else echo "Sửa " ?>nhân viên</h1></div>
            <div class="panel-body">
				<form method="post">
                    <input type="text" name="id" value="<?=$id?>" hidden="true">
					<div class="form-group">
					  <label for="name">Tên nhân viên:</label><br>
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
					  <label for="salary">Lương:</label><br>
					  <input required="true" type="text" class="form-control" id="salary" name="salary" value="<?=$salary?>">
					</div>
                    <div class="form-group">
					  <label for="role">Chức vụ:</label><br>
					  <select class="form-control" name = "role">
					  <option>--lua chon chuc vụ--</option>

					  <?php 
					  if($role==1){
                        echo '<option selected value =1>Nhân viên thu ngân</option>';
                        echo '<option value = 2>Bồi bàn</option>';
                      }
					  
					  else if($role == 2) {
                        echo '<option  value = "1">Nhân viên thu ngân</option>';
                        echo '<option selected value ="2">Bồi bàn</option>';
                        }
                      else{
                        echo '<option value = "1">Nhân viên thu ngân</option>';
                        echo '<option value = "2">Bồi bàn</option>';
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