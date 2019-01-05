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
สรุปยอดคงเหลือสินค้า</div>
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
$sql="select * from tbl_product as a,tbl_category as b where a.category_id=b.category_id order by category_name asc,product_name asc";
//ทำให้ฐานข้อมูลทำงาน
$qry=mysql_query($sql);
$numrow=mysql_num_rows($qry);

?>

 <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="8%" align="center" bgcolor="#FFCC66">ลำดับ</td>
    <td width="41%" align="center" bgcolor="#FFCC66">รายการสินค้า</td>
    <td width="34%" align="center" bgcolor="#FFCC66">หมวดหมู่</td>
    <td width="17%" align="center" bgcolor="#FFCC66">จำนวนคงเหลือ</td>
   </tr>
   
  <?
  if($numrow==0){
  
  ?>
  <tr>
    <td colspan="4">ไม่มีข้อมูล</td>
  </tr>
  <? 
  }else{
  	$i=1;
	//คำสั่งให้วนลูป
	while($db=mysql_fetch_array($qry)){
  $no++;
  ?>
  <tr>
    <td height="23" align="center"><?=$no?></td>
    <td><?=$db['product_name']?></td>
    <td><?=$db['category_name']?>/<?=getsubcatename($db['subcategory_id'])?></td>
    <td align="center"><?=$db['product_unit']?></td>
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
