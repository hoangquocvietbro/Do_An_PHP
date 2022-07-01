<?php
require_once ('../../db/dbhelper.php');
require_once ('../../session/session.php');
if(!isset($_SESSION['user'])){
    header("location: ../../login.php");
}
$mahd=$_GET['mahd'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body onLoad="window.print()">
<div id="wrapper" style="margin:0 auto; width:500px;">
<table width="100%">
                <!--DWLayoutTable-->
                <tr>
                  <td height="25" valign="top"align="center"><div align="left">
                    <table width="100%">
                      <tbody>
                        <tr>
                          <td width="5" height="95">&nbsp;</td>
                       
                          <td width="343"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                              <tbody>
                                <tr>
                                  <td><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                      <tbody>
                                        <tr>
                                          <td colspan="2"><strong>Cookies & Confections shop</strong></td>
                                        </tr>
                                        <tr>
                                          <td>Địa chỉ</td>
                                          <td>: Xã An Thượng - Huyện Hoài Đức - Thành Phố Hà Nội</td>
                                        </tr>
                                        <tr>
                                          <td width="65">Tel:</td>
                                          <td>: 0424 666888</td>
                                        </tr>
                                        <tr>
                                          <td>Di Động </td>
                                          <td>: 0396433209</td>
                                        </tr>
                                        <tr>
                                          <td>Email</td>
                                          <td>:hoangviet.02112001@gmail.com</td>
                                        </tr>
                                      </tbody>
                                  </table></td>
                                </tr>
                              </tbody>
                          </table></td>
                        </tr>
                      </tbody>
                    </table>
                  </div></td>
                </tr>
  <tr>
                  <td width="562" height="25" valign="top"align="center">  <hr>
                    <strong><font color="#FF0000" size="+2">Hóa Đơn Mua Hàng</font></strong></td>
  </tr>
                <tr>
                  <td height="54"  >                    
                      <div align="left">
                        <?php		
$sql1="select * from tb_order left join customer ON tb_order.customer_id = customer.id where tb_order.id='$mahd' ";
$row1 = executeSingleResult($sql1);
?>
                        <b>Thông tin Khách hàng:</b>                    </div>
              <table width="100%" >
                            <tr>
                              <td width="3%" >&nbsp;</td>
                              <td width="34%" >Họ tên:</td>
                              <td width="63%" >  <?php echo $row1['name'];?>   </td>
                            </tr>
                            <tr>
                              <td >&nbsp;</td>
                              <td >Địa chỉ :</td>
                              <td >   <?php echo $row1['address'];?>      </td>
                            </tr>
                            <tr>
                              <td >&nbsp;</td>
                              <td >Điện thoại :</td>
                              <td >   0<?php echo $row1['phone'];?></td>
                            </tr>
                            <tr>
                              <td >&nbsp;</td>
                              <td >Ngày giao hàng:</td>
                                    
			
                              <td ><?php echo date("d/m/Y");?></td>
                </tr>
                                                    
                    </table>
        <br />
                          <span class="style3"><B>Thông tin về đơn đặt hàng : </B></span>
                          <table width="100%" style="border-collapse:collapse;">
                            <tr>
                              <td width="5%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">STT</div></td>
                              <td width="30%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Tên hàng</div></td>
                              <td width="25%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Giá</div></td>
                              <td width="5%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Số lượng</div></td>
                              <td width="25%" align="right" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Tổng cộng</div></td>
                            </tr>
                          <?php
   $stt=1;
	$tong=0;
	$sql = 'select * from order_detail left join product ON order_detail.product_id = product.id where order_id ='.$mahd.'';
	$rows=executeResult($sql);
	foreach($rows as $row)
	{
		$thanhtien=$row['price']*$row['quantity'];
	$tong+=$thanhtien;
	
	?>
        <tr>
        <td align="left" style="border:1px solid green;"><?php echo  $stt++?></td>
          <td  align="left" style="border:1px solid green;"><div align="center"><?php echo $row['name']?></div></td>
          <td align="center" align="left" style="border:1px solid green;"><?php echo number_format($row['price'],"0",",",".")?> VNĐ</td>
          <td align="center"  align="left" style="border:1px solid green;"><?php echo $row['quantity']?></td>
          <td align="center" align="left" style="border:1px solid green;"><?php echo number_format($thanhtien,"0",",",".")?> VNĐ</td>
        </tr>
		<?php } ?>   
        <tr style="border:1px solid green;">
          <td colspan="4" align="left"><div align="right">Tổng giá trị đơn hàng:</div></td>
          <td align="right" ><b><?php echo number_format($tong,"0",",",".") ?> VNĐ</b></td>
        </tr>     
		
      </table>
		  
              <table width="452" border="0" align="right">
                            <tr>
                                <br>
                              <td colspan="3"><div align="right"> Ngày <?php echo date("d/m/Y");?></div></td>
                            </tr>
                            <tr>
                              <td><div align="center"><strong>Nhân viên Bán hàng</strong></div></td>
                              <td>&nbsp;</td>
                              <td><div align="center"><strong>Khách hàng</strong></div></td>
                            </tr>
                            <tr>
                              <td height="23"><div align="center">(Ký tên +Đóng dấu Công ty)</div></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="73">&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                           
                          </table>
                    <p>&nbsp;</p>
	                      <p><br>
                                      </p>
                    </td>
                </tr>
              </table>
</div>
</body>
</html>
