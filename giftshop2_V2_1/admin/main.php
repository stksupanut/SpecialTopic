<?
//ใช้เมื่อต้องการใช้ seesion
ob_start();
session_start();
include('../includes/connectdb.in.php');
include('../includes/function.ini.php');
include('../includes/config.ini.php');
connect_db();

$module=$_REQUEST['module'];//รับค่าชื่อ page
$mode=$_REQUEST['mode'];//รับค่าตัวแปร mode เพื่อใช้ใน switch case
$action=$_REQUEST['action'];//รับค่าตัวแปร action
$order_id=$_REQUEST['order_id'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script language="JavaScript">
	function chkNumber(ele)
	{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
	}
</script>

<!--ปฏิทินใหม่-->
<link type="text/css" href="../css/jquery-ui-1.8.10.custom.css" rel="stylesheet" />
<style type="text/css">
.sizemain {
	font-size: 12px;
}
.sizebig {
	font-size: 14px;
}
</style>
<script type="text/javascript" src="../js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
<script type="text/javascript">
	$(function () {
	var d = new Date();
	var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);
	$("#datepicker-th").datepicker({ changeMonth: true, changeYear: true,dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay,dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
    dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
    monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
    monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม']});
	});
</script>
<!--ปฏิทินใหม่-->

</head>

<body>

<?
if($_SESSION['adminid']==''){

echo "<script language=\"javascript\">alert('กรุณาเข้าสู่ระบบก่อน');</script>";
echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
exit;

}else{
  $totalexpire = CheckOrderExpire();
  if($totalexpire>0){
    echo "<script>alert('ระบบทำการยกเลิกการสั่งซื้อไป $totalexpire รายการ');</script>";
  }
}

?>

<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th colspan="5" bgcolor="#FFCC66" scope="row">ระบบการจัดการร้านขายของขวัญออนไลน์</th>
  </tr>
  <tr>
    <th width="22%" align="center" valign="top" bgcolor="#CCCCCC" scope="row"><br />
      <table width="210" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
        <tr>
          <th bgcolor="#FFCC66" class="sizebig" scope="row">
          <? if($_SESSION['adminid']!=''){echo "ยินดีต้อนรับคุณ :".$_SESSION['adminname'];}?></th>
        </tr>
        <tr>
          <th scope="row"><span class="sizemain"><a href="main.php?module=logout">ออกจากระบบ</a></span></th>
        </tr>
      </table>
<br />
    <table width="210" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
      <tr>
        <th width="161" bgcolor="#FFCC66" class="sizebig" scope="row">จัดการสินค้า</th>
        </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=product&mode=insert">เพิ่มสินค้า</a></span></th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=product">เรียกดู/แก้ไขสินค้า</a></span></th>
      </tr>
      </table>
    <br />
    <table width="210" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
      <tr>
        <th bgcolor="#FFCC66" class="sizebig" scope="row">จัดการหมวดหมู่หลัก/ย่อย</th>
        </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=category&mode=insert">เพิ่มหมวดหมู่หลัก</a></span></th>
        </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=category">เรียกดู/แก้ไขหมวดหมู่หลัก</a></span></th>
        </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=subcategory&mode=insert">เพิ่มหมวดหมู่ย่อย</a></span></th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=subcategory">เรียกดู/แก้ไขหมวดหมู่ย่อย</a></span></th>
      </tr>
    </table>
    <br />
    <table width="210" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
      <tr>
        <th bgcolor="#FFCC66" class="sizebig" scope="row">จัดการกระดาษห่อของขวัญ/โบว์</th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=paper&mode=insert">เพิ่มลายกระดาษห่อของขวัญ</a></span></th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=paper">เรียกดู/แก้ไขลายกระดาษห่อของขวัญ</a></span></th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=ribbon&mode=insert">เพิ่มลายโบว์</a></span></th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=ribbon">เรียกดู/แก้ไขลายโบว์</a></span></th>
      </tr>
    </table>
    <br />
    <table width="210" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
      <tr>
        <th bgcolor="#FFCC66" class="sizebig" scope="row">จัดการกระดานข่าวสาร</th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=news&mode=add">เพิ่มข่าวสารใหม่</a></span></th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=news">เรียกดู/แก้ไขข่าวสาร</a></span></th>
      </tr>
      </table>
    <br />
    <table width="210" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=order">จัดการการสั่งซื้อ</a></span></th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=order2">เรียกดูข้อมูลการจัดซื้อ</a></span></th>
      </tr>
    </table>
<br />
    <table width="210" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
    <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=add_customer">เพิ่มข้อมูลลูกค้า</a></span></th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=customer">เรียกดูข้อมูลสมาชิก</a></span></th>
      </tr>
      </table>
    <br />
    <table width="210" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
      <tr>
        <th bgcolor="#FFCC66" class="sizebig" scope="row">รายงาน</th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=reportcirculation">รายงานสรุปยอดขาย</a></span></th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=report&amp;mode=reportinventory">รายงานสินค้าคงเหลือ</a></span></th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=report&amp;mode=cancel">รายงานยกเลิกการสั่งซื้อ</a></span></th>
      </tr>
      </table>
    <br>
    <table width="210" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
      <tr>
        <th bgcolor="#FFCC66" class="sizebig" scope="row">จัดส่ง</th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=delivery">ย้ายข้อมูล</a></span></th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=show_delivery">จัดส่งสินค้า</a></span></th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="main.php?module=show_log">ประวัติการสั่งซื้อ</a></span></th>
      </tr>
      </table>

    <p>&nbsp;</p></th>
    <td width="78%" colspan="4" align="center" valign="top" bgcolor="#CCCCCC">
     <?
	//ทำเพื่อให้รับหน้าที่เรากดมา
    if($module !=''){require("".$module.".php");
	}else{
		echo "
<br />
<center><h3>ระบบหลังร้าน</h3></center>
";
	}
	?></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>