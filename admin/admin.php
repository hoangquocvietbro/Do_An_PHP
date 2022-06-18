<?php
require_once ('../../db/dbhelper.php');
require_once ('../../session/session.php');
if(!isset($_SESSION['user'])){
    header("location: ../../login.php");
}
$user = $_SESSION['user'];
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
        <?php if(isset($user[0]['name'])){?>
        <ul class="header__dropdown">
            <li><div class="name"><?php echo $user[0]['name'];?></div><img src="../default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg" alt="">
                <ul class="header__sub-dropdown">
                    <li><a href=""><i class="fa-solid fa-pen-to-square"></i>Sửa thông tin</a></li>
                     <li><a href="../../logout.php"><i class="fa fa-sign-out fa-fw"></i>  Đăng xuất</a></li>
                </ul>
            </li>  
        </ul>
        <?php } else{?> 
            <ul class="header__dropdown">
            <li><div class="name">Tài khoản</div><img src="../default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg" alt="">
                <ul class="header__sub-dropdown">
                    <li><a href=""><i class="fa-solid fa-pen-to-square"></i>Sửa thông tin</a></li>
                     <li><a href="../../login.php"><i class="fa fa-sign-out fa-fw"></i>  Đăng Nhập</a></li>
                </ul>
            </li>  
        </ul>
        <?php } ?>
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
</body>
</html>