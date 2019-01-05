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
$customer_id=$_REQUEST['customer_id']; // การรับค่าจากหน้าฟอม
$customer_name=$_REQUEST['customer_name']; // การรับค่าจากหน้าฟอม
$keyword=$_REQUEST['keyword']; // การรับค่าจากหน้าฟอม
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
if($keyword !=''){ // เงื่อนไข $keyword ไม่เท่ากับค่าว่าง
	 $searchnamecus="and Date like '%$keyword%'"; // กำหนดเงือนไข ใส่ในตัวแปร $searchnamecus
}else{
	 $searchnamecus="";// กำหนดตัวแปร $searchnamecus เป็นค่าว่าง
}
/*$sql="select * from tbl_customer as a, tbl_r_prefecture as b, tbl_r_province as c, tbl_r_district as d , tbl_r_postcode as e where a.prefecture_id=b.prefecture_id and a.province_id=c.province_id and a.district_id=d.district_id and a.postcode = e.prefecture_id $searchnamecus group by a.customer_id desc";*/ 

$sql = "select * from tbl_customer";
// คำสั่ง mysql เป็นการจอยตาราง และแสดงข้อมูล
//ทำให้ฐานข้อมูลทำงาน

$qry=mysql_query($sql); // เป็นการอ่านคำสั่งให้ทำงาน
$numrow=mysql_num_rows($qry); // เป็นการนับจำนวนบรรทัด
?>
<form action="main.php?module=<?=$module?>" method="post">
  <table width="439" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td width="439" align="center"><span class="sizamain1">ค้นหาตามวันที่:
      </span>
      <input name="keyword" type="date" />
      <input type="submit" name="button2" id="button2" value="ค้นหา" /></td>
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
    <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">วันที่</span></td>
    <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">item1</span></td>
     <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">item2</span></td>
      <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">item3</span></td>
       <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">item4</span></td>
        <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">item5</span></td>
         <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">item6</span></td>
          <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">item7</span></td>
          
  </tr>
  <?
  if($numrow==0){ // เงื่อนไข $numrow เท่ากับ 0 
  
  ?>
  <tr>
    <td colspan="9" bgcolor="#FFFFFF"><span class="sizamain1">ไม่มีข้อมูล</span></td>
  </tr>
  <? 
  }else{
    $i=1; // กำหนดตัวแปร $i เท่ากับ 1
	//คำสั่งให้วนลูป
	while($db=mysql_fetch_array($qry)){ //คำสั่งวนลูป
  
  ?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_id']// การดึงค่า customer_id ออกมาแสดง?> 
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_name']// การดึงค่า customer_name ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_name_last']// การดึงค่า customer_name ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_address']// การดึงค่า customer_address ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['district_name'] // การดึงค่า district_name ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['prefecture_name']// การดึงค่า prefecture_name ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['province_name']// การดึงค่า province_name ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['postcode']// การดึงค่า postcode ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_telephone']// การดึงค่า customer_telephone ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['customer_email'] // การดึงค่า customer_email ออกมาแสดง?>
    </span></td>
     <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['Date'] // การดึงค่า Date ออกมาแสดง?>
    </span></td>
   
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['item1'] // การดึงค่า item1 ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['item2'] // การดึงค่า item2 ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['item3'] // การดึงค่า item3 ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['item4'] // การดึงค่า item4 ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['item5'] // การดึงค่า item5 ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['item6'] // การดึงค่า item6 ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['item7'] // การดึงค่า item7 ออกมาแสดง?>
    </span></td>
  </tr>
  <?
  $i++; // บวกค่า ตัวแปร $i เพิ่มขึั้นที่ล่ะ 1
  	}	//while
  }	   //if
  ?>
</table>






