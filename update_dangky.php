<link rel="stylesheet" href="./css/register.css">
<?php 
include('db/dbhelper.php');
function redirect($url, $message="", $delay=0) { 
	/* redirects to a new URL using meta tags */ 
	echo "<meta http-equiv='refresh' content='$delay;URL=$url'>"; 
	if (!empty($message)) echo "<div style='font-family: Arial, Sans-serif;
	font-size: 14pt;' align=center>$message</div>"; 
	exit; 
} 

if(isset($_POST['submit']))
{
	$tennd=$_POST['tennd'];
	$user=$_POST['user'];
	$pass=password_hash($_POST['pass'],PASSWORD_DEFAULT);
	$dienthoai=$_POST['dienthoai'];
	$diachi=$_POST['diachi'];
	
	//Lay gio cua he thong
	$dmyhis= date("Y").date("m").date("d").date("H").date("i").date("s");
	//Lay ngay cua he thong
	$ngay=date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s");
	$sql = "select * from customer where user_name='$user'";
    $data = executeResult($sql);
    if(sizeof($data)<1){

	    $insert="INSERT INTO customer VALUES('','$tennd', '$user','$pass','$dienthoai','$diachi',1,'$ngay', '$ngay')";
		$query=mysqli_query(mysqli_connect("localhost","root","","db_cookies_restaurant"),$insert);
		if($query) {
		redirect("loginCustomer.php", "Bạn đã đăng ký thành công.", 2 );
		}
			else { echo "Thất bại";
			}
	}
	else{
		redirect("register.php", "Tài khoản đã tồn tại.", 2 );
	}
}
?>