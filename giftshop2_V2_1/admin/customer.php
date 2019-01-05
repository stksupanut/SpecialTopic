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
$customer_id=$_REQUEST['customer_id']; //การรับค่าจากหน้า ฟอม
$customer_name=$_REQUEST['customer_name']; //การรับค่าจากหน้า ฟอม
$keyword=$_REQUEST['keyword']; //การรับค่าจากหน้า ฟอม
$keyword_2=$_REQUEST['keyword_2']; //การรับค่าจากหน้า ฟอม
?>
<style type="text/css">
.sizamain1 {
	font-size: 12px;
}
.red {
	color: #F00;
}
.sizemain1 {	font-size: 12px;
}
</style>


<br>
<?
if($keyword !='' or $keyword_2 != ''){ // การเช็ค $keyword หรือ $keyword_2  ไม่เท่ากับค่าว่าง
	 $searchnamecus="and customer_name like '%$keyword%' and customer_name_last like '%$keyword_2%'"; //การประกาศตัวแปรเอาคำสั่งส่วนที่เป็นเงื่อนไข ใส่ไว้ในตัวแปร $searchnamecus 
}else{
	 $searchnamecus=""; // $searchnamecus เท่ากับค่า ว่าง
}
$sql="select * from tbl_customer as a, tbl_r_prefecture as b, tbl_r_province as c, tbl_r_district as d , tbl_r_postcode as e where a.prefecture_id=b.prefecture_id and a.province_id=c.province_id and a.district_id=d.district_id and a.postcode = e.prefecture_id $searchnamecus group by a.customer_id desc";// เป็นการ จอย ตาราง ต่างๆ
//ทำให้ฐานข้อมูลทำงาน

$qry=mysql_query($sql); // คือการประมวลผลคำสั่ง 
$numrow=mysql_num_rows($qry); // คือการ หา จำนวนบรรณทัด
?>
<form action="main.php?module=<?=$module?>" method="post">
  <table width="439" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td width="500" align="center"><p><span class="sizamain1">ค้นหาจากชื่อ:
      </span>
        <input name="keyword" type="text" />
    </p>
      <p>นามสกุล:
        <input name="keyword_2" type="text" />
        <input type="submit" name="button2" id="button2" value="ค้นหา" />
      </p></td>
  </tr>
</table>
</form>
<table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr>
    <td width="14%" align="center" bgcolor="#FFCC66"><span class="sizamain1">รหัสลูกค้า</span></td>
    <td width="16%" align="center" bgcolor="#FFCC66"><span class="sizamain1">ชื่อ</span></td>
    <td width="16%" align="center" bgcolor="#FFCC66"><span class="sizamain1">นามสกุล</span></td>
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
  if($numrow==0){ // เงื่อนไข  $numrow เท่ากับ 0
  
  ?>
  <tr>
    <td colspan="9" bgcolor="#FFFFFF"><span class="sizamain1">ไม่มีข้อมูล</span></td>
  </tr>
  <? 
  }else{
  	$i=1; // การประกาศตัวแปร
	//คำสั่งให้วนลูป
	while($db=mysql_fetch_array($qry)){
  
  ?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_id'] // การดึงค่า customer_id ออกมาแสดง?> 
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_name'] // การดึงค่า customer_name ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_name_last'] // การดึงค่า customer_name_last ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_address'] // การดึงค่า customer_address ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['district_name'] // การดึงค่า district_name ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['prefecture_name'] // การดึงค่า prefecture_name ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['province_name'] // การดึงค่า customer_id ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['postcode'] // การดึงค่า postcode ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_telephone'] // การดึงค่า customer_telephone ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_email'] // การดึงค่า customer_email ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF" class="sizemain1"><a href="main.php?module=update_cus&cus_id=<?php echo $db['customer_id']// การส่งค่า customer_id ?>"><img src="../images/edit.png" width="32" height="32" /></a></td>
  </tr>
  
  <?
  
  $i++; // บวกค่า i เพิ่มขึ้นที่ล่ะ 1
  	}	
  }	   
  ?>
</table>






