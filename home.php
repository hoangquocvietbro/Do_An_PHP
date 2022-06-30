<?php
require_once ('db/dbhelper.php');
$andSearch         = "and name like '%$search%'";
$sql = 'select id,name,img from product where id_category='.$category_id.' '.$andSearch.' limit '.$startIndex.',8';
$items = executeResult($sql);
?>
<div class="main-heading"><h1>Sản phẩm nổi bật</h1></div>
<div class="main-items">
    <?php
    foreach($items as $item){
        echo '  
                    <div class="item">
                    <a href="index.php?menu=product&product_id='.$item["id"].'">
                        <img src="./admin/img/uploads/products/'.$item["img"].'" alt="">
                        <h3>'.$item["name"].'</h3>
                    </a>
                    </div>
                ';
    }
    ?>
</div>