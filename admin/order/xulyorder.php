<?php
require_once ('../../db/dbhelper.php');
require_once ('../../session/session.php');
if(!isset($_SESSION['user'])){
    header("location: ../../login.php");
}
	if(isset($_POST['id']))
	{
        $list_id = $_POST['id'];
		if(isset($_POST['giaohang']))
		{
			foreach($list_id as $id)
			{
				$sql="update tb_order set status='Đã thanh toán' where id=$id";
				execute($sql);
				echo "
							<script language='javascript'>
								alert('Đã giao hàng');
								window.open('index.php','_self', 1);
							</script>
						";
			}
		}
		else if(isset($_POST['huy']))
			{ 
				foreach($list_id as $id)
			{
				$sql="update tb_order set status='Đã hủy' where id=$id";
				execute($sql);	
					echo "
							<script language='javascript'>
								alert('Đã huỷ đơn hàng');
								window.open('index.php','_self', 1);
							</script>
						";
			}
			}
			else
					{
						foreach($_SESSION['id'] as $mahd=>$value)
						{
							if ($value==1)
							$sql="delete from hoadon where mahd='$mahd'";
							mysqli_query(mysqli_connect("localhost","root","","dienthoai"),$sql);
							$sql1="delete from chitiethoadon where mahd='$mahd'";
							mysqli_query(mysqli_connect("localhost","root","","dienthoai"),$sql1);
							unset($_SESSION['id']);
							echo "
							<script language='javascript'>
								alert('Xóa thành công');
								window.open('index.php','_self', 1);
							</script>
						";
						}
			
					}

			}		
    else echo "
		<script language='javascript'>
		alert('Bạn chưa chọn hóa đơn cần xử lý');
		window.open('index.php','_self', 1);
		</script>
		";
		
?>