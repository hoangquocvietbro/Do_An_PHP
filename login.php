<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="login-page">
      <div class="form" style="margin-bottom: 10px;border: 1px blue;"><b>ĐĂNG NHẬP ADMIN PANEL</b></div>
        <div class="form" >
          <form class="login-form" method="POST">
            <input type="text" placeholder="Tên tài khoản " name = "email"/>
            <input type="password" placeholder="Mật khẩu" name ="password"/>
            <button>login</button>
          </form>
        </div>
      </div>
</body>
</html>
<?php
include_once("./session/session.php");
include_once("./db/dbhelper.php");

if(isset($_POST['email'])){
    $email =$_POST['email'];
    $password = $_POST['password'];
    $sql = "select * from employee where user_name='$email'";
    $data = executeResult($sql);
    if(sizeof($data)== 1)
    {
      $checkPass = password_verify($password,$data[0]['password']);

      if($checkPass){
      $_SESSION['user'] = $data;
      echo "Chào bạn";
      header('location: ./admin/category');
      }
      else{
        echo "<h1 class='error'>! Mật khẩu sai</h1>";
      }
    }
    else{
      echo "<h1 class='error'>! Tài Khoản không tồn tại</h1>";
    }
}
?>
