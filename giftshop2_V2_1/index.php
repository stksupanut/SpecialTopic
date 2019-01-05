<?
//ใช้เมื่อต้องการใช้ seesion
ob_start();
session_start();
include('includes/connectdb.in.php');
include('includes/function.ini.php');
include('includes/config.ini.php');
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



<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th colspan="5" bgcolor="#FFCC66" scope="row">ระบบการจัดการร้านขายของออนไลน์</th>
  </tr>
  <tr>
    <th width="22%" align="center" valign="top" bgcolor="#CCCCCC" scope="row"><br />
      <table width="210" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
        <tr>
        </tr>
        <tr>
        </tr>
      </table>
<br />
    <table width="210" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
      <tr>
        <th width="161" bgcolor="#FFCC66" class="sizebig" scope="row">รายการ</th>
        </tr>
     
      <tr>
        <th scope="row"><p class="sizemain"><a href="user/main.php?module=product">เลือกซื้อสินค้า</a></p>
          <p class="sizemain"><a href="buy.php">วิธีการสั่งซื้อสินค้า</a></p>
          <p class="sizemain"><a href="money.php">แจ้งชำระเงืน</a></p>
          <p class="sizemain">&nbsp;</p></th>
      </tr>
      </table>
    <br />
    <table width="210" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
      
     
     
    </table>
    <br />
    <table width="210" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
      <tr>
      
      
    </table>
    <br />
    <table width="210" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
      <tr>
        <th bgcolor="#FFCC66" class="sizebig" scope="row">จัดการกระดานข่าวสาร</th>
      </tr>
      <tr>
        <th scope="row"><span class="sizemain"><a href="user/main.php?module=news&mode=add">กระทู้สอบถาม</a></span></th>
      </tr>             
      </table>
    <br />
    <p>&nbsp;</p></th>
    <td width="78%" colspan="4" align="center" valign="top" bgcolor="#CCCCCC">
     <?
	//ทำเพื่อให้รับหน้าที่เรากดมา
    if($module !=''){require("".$module.".php");
	}else{
		echo "
<br />
<center><h3>ระบบหน้าร้าน</h3></center>
";
	}
	?></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>