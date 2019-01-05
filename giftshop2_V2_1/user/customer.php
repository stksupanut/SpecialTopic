<script language="javascript">
function fncSubmit()
{
if(document.form1.category_name.value == "")
{
alert('กรุณากรอกชื่อหมวดหมู่สินค้า');
document.form1.category_name.focus();
return false;
}

}
</script>

<?

/*
SELECT * FROM `tbl_category` WHERE `category_id`, `category_name`, `deleted`, `isenable`, `datecreated`
*/
$customer_id=$_REQUEST['customer_id'];
$customer_name=$_REQUEST['customer_name'];
$keyword=$_REQUEST['keyword'];
?>
<style type="text/css">
.sizamain1 {
	font-size: 12px;
}
.red {
	color: #F00;
}
</style>


<br>
<?
if($keyword !=''){
	 $searchnamecus="and customer_name like '%$keyword%'";
}else{
	 $searchnamecus="";
}
$sql="select * from tbl_customer as a, tbl_r_prefecture as b, tbl_r_province as c, tbl_r_district as d , tbl_r_postcode as e where a.prefecture_id=b.prefecture_id and a.province_id=c.province_id and a.district_id=d.district_id and a.postcode = e.prefecture_id $searchnamecus group by a.customer_id desc";
//ทำให้ฐานข้อมูลทำงาน

$qry=mysql_query($sql);
$numrow=mysql_num_rows($qry);
?>
<form action="main.php?module=<?=$module?>" method="post">
  <table width="439" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td width="439" align="center"><span class="sizamain1">ค้นหาจากชื่อสมาชิก:
      </span>
      <input name="keyword" type="text" />
      <input type="submit" name="button2" id="button2" value="ค้นหา" /></td>
  </tr>
</table>
</form>
<table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr>
    <td width="14%" align="center" bgcolor="#FFCC66"><span class="sizamain1">รหัสลูกค้า</span></td>
    <td width="16%" align="center" bgcolor="#FFCC66"><span class="sizamain1">ชื่อ - นามสกุล</span></td>
    <td width="12%" align="center" bgcolor="#FFCC66"><span class="sizamain1">ที่อยู่</span></td>
    <td width="9%" align="center" bgcolor="#FFCC66"><span class="sizamain1">ตำบล</span></td>
    <td width="9%" align="center" bgcolor="#FFCC66"><span class="sizamain1">อำเภอ</span></td>
    <td width="10%" align="center" bgcolor="#FFCC66"><span class="sizamain1">จังหวัด</span></td>
    <td width="10%" align="center" bgcolor="#FFCC66"><span class="sizamain1">รหัสไปรษณีย์</span></td>
    <td width="9%" align="center" bgcolor="#FFCC66"><span class="sizamain1">เบอร์โทร</span></td>
    <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">อีเมล์</span></td>
    <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">แก้ไข</span></td>
  </tr>
  <?
  if($numrow==0){
  
  ?>
  <tr>
    <td colspan="9" bgcolor="#FFFFFF"><span class="sizamain1">ไม่มีข้อมูล</span></td>
  </tr>
  <? 
  }else{
  	$i=1;
	//คำสั่งให้วนลูป
	while($db=mysql_fetch_array($qry)){
  
  ?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_id']?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_name']?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_address']?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['district_name']?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['prefecture_name']?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['province_name']?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['postcode']?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_telephone']?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_email']?>
    </span></td>
     <td align="center" bgcolor="#FFFFFF" class="sizemain1"><a href="main.php?module=<?=$module?>&mode=update&product_id=<?=$db['customer_id']?>"><img src="../images/edit.png" width="32" height="32" /></a></td>
    
  </tr>
  <?
  $i++;
  	}	//while
  }	   //if
  ?>
  
  
</table>



