<? 
	ob_start();
	session_start();
	include('../includes/connectdb.in.php');
	include('../includes/function.ini.php');
	connect_db();
	
	$username=$_REQUEST['username'];
	$password=$_REQUEST['password'];
	$action=$_REQUEST['action'];
?>
<?
/*
SELECT * FROM `tbl_product` WHERE `product_id`, `product_name`, `product_pic`, `product_price`, `product_detail`, `category_id`, `deleted`, `isenable`, `datecreated`
*/
$product_id=$_REQUEST['product_id'];
$product_name=$_REQUEST['product_name'];
$product_price=$_REQUEST['product_price'];
$product_detail=$_REQUEST['product_detail'];
$product_unit=$_REQUEST['product_unit'];
$category_id=$_REQUEST['category_id'];
$category_id2=$_REQUEST['category_id2'];
$subcategory_id=$_REQUEST['subcategory_id'];
$keyword=$_REQUEST['keyword'];
?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>รายงาน</title>

<style type="text/css" media="print">
input{
	display:none;
}
</style>

</head>
<body>
<div align="center">ร้านขายของขวัญออนไลน์</div>
<div align="center">
สรุปยอดยกเลิกรายการสินค้า</div>
<div align="center">
<table width="90%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td scope="row">วันที่พิมพ์รายงาน
      <?=shotdate($today);?></td>
    <td align="right">เวลาที่พิมพ์ <? echo date("H:i:s")?> น.</td>
  </tr>
</table>
</div>

<hr width="90%" size="1" color="#000000" /><br />

<?
$sql="select * from tbl_order where order_status=2 or order_status=3";
//ทำให้ฐานข้อมูลทำงาน
$qry=mysql_query($sql);
$numrow=mysql_num_rows($qry);
?>

 <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="10%" align="center" bgcolor="#FFCC66">ลำดับ</td>
    <td width="11%" align="center" bgcolor="#FFCC66">รหัสใบสั่งซื้อ</td>
    <td align="center" bgcolor="#FFCC66">ชื่อลูกค้า</td>
   </tr>
  <?
  if($numrow==0){
  
  ?>
  <tr>
    <td colspan="3">ไม่มีข้อมูล</td>
  </tr>
  <? 
  }else{
  	$i=1;
	//คำสั่งให้วนลูป
	while($db=mysql_fetch_array($qry)){
		switch($db['order_status']){
		case 0: $textstatus="สั่งซื้อสินค้า"; break;
				case 1: $textstatus="ชำระเงินเรียบร้อยแล้ว"; break;
				case 2: $textstatus="ยกเลิกการสั่งซื้อ"; break;
				case 3: $textstatus="ยกเลิกการสั่งซื้อ"; break;
				case 4: $textstatus="จัดส่งสินค้าเรียบร้อยแล้ว"; break;
				case 5: $textstatus="รอการอนุมัติ"; break;
				case 6: $textstatus="ธนาคารไม่อนุมัติ"; break;}
  $no++;
  ?>
  <tr>
    <td height="23" align="center"><?=$no?></td>
    <td align="center"><?=$db['order_id']?></td>
    <td align="center"><?=$db['newname']?></td>
   </tr>
  <?
  $i++;
  	}	//while
  }	   //if
  ?>
  
  
</table>
<hr width="90%" size="1" color="#000000" />
 <br />
    <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center">
        <input type="button" name="print" id="button" value="พิมพ์" onclick="javascript:window.print()" />
        <input name="Submit" type="button"  onclick="javascript:window.close()" value="ปิด" align="middle" /></td>
      </tr>
    </table>
<br />
