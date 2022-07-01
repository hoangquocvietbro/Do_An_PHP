<?php 
require_once ('db/dbhelper.php');

$menu="home";
if(isset($_GET['menu'])){
    $menu=$_GET['menu'];
}

$startIndex = 0;
if(isset($_GET['startIndex'])){
    $startIndex=$_GET['startIndex'];
}
$search = '';
if(isset($_GET['search'])){
    $search = $_GET['search'];
}

$sql = 'select * from category';
$CategoryItems = executeResult($sql);
$category_id =$CategoryItems[0]['id'];
if(isset($_GET['category_id'])){
    $category_id = $_GET['category_id'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies & Confections Shop</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="admin/font/fontawesome-free-6.1.1-web/css/all.css">
</head>
<body>
    <header class="header">
        <div class="header-top"></div>
        <img class="header-banner" src="./src/img/cookie-spread.jpg" alt="">
        <img class="header-logo" src="./src/img/logo1.png" alt="">
        <div class="login-btn"><a href="loginCustomer.php"><i class="fa fa-sign-in fa-fw"></i>Login</a></div>
        <div class="logout-btn"><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a></div>
    </header>
    <div class="container">
        <div class="sidebar">
            <ul class="sidebar__nav">
                    <li><a href="?menu=home"><i class="fa-solid fa-house-user"></i> Home</a></li>
                    <li><a href="?menu=product"><i class="fa-solid fa-cookie-bite"></i> Sản phẩm</a></li>
                    <li><a href="?menu=order"><i class="fa fa-shopping-cart fa-fw"> </i> Giỏ hàng</a></li>
                    <li><a href="?menu=contact"><i class="fa-solid fa-square-phone"></i> Liên Hệ</a></li>
            </ul>
            <div class="search">
                    <form action="">
                        <input hidden value="<?php echo $category_id;?>" type="search" class="search-input" name="category_id" placeholder="Search for...">
                        <input value="<?php echo $search;?>" type="search" class="search-input" name="search" placeholder="Search for...">
                        <button class="btnsearch" id="btnsearch" type="submit">
                    </form>
                   <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <div class="content">
            <div class="content-main">
                <?php 
                if($menu=="home")include("home.php");
                if($menu=="product")include("product.php");
                if($menu=="order")include("order.php");
                if($menu=="contact")include("contact.php");
                if($menu=="checkout")include("checkout.php");
                
                ?>
            </div>
            <div class="content-sidebar">
                <div class="main-heading"><h1>Danh mục sản phẩm</h1></div>
                <ul class="list-category">
                <?php
                    foreach($CategoryItems as $CategoryItem){
                        echo '<a href="?category_id='.$CategoryItem["id"].'&search='.$search.'"><li>'.$CategoryItem["name"].'</li></a>';
                    }
                ?>
                </ul>
                <?php 
                if($menu=="home"){
                    $startIndex +=8;
                    echo '<a href="?category_id='.$category_id.'&search='.$search.'&startIndex='.$startIndex.'"><button class="btn-viewMore">Xem thêm sản phẩm</button></a>';
                } 
                
                ?>
            </div>
        </div>
    </div>
    <footer class="footer"></footer>

</body>
</html>