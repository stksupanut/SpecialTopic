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
$sql = "select * from tbl_order";
// คำสั่ง mysql เป็นการจอยตาราง และแสดงข้อมูล
//ทำให้ฐานข้อมูลทำงาน

$qry=mysql_query($sql); // เป็นการอ่านคำสั่งให้ทำงาน
$numrow=mysql_num_rows($qry); // เป็นการนับจำนวนบรรทัด

function testShowData() {
  echo "<script language=\"javascript\">alert($orderId);</script>"; 
}

function checkTableDevl(){
  $checkTb1 = "select * from tbl_delivery";
  $checkTb2 = "select * from tbl_delivery2";
  $checkTb3 = "select * from tbl_delivery3";
  $qry_checkTb1 = mysql_query($checkTb1);
  $qry_checkTb2 = mysql_query($checkTb2);
  $qry_checkTb3 = mysql_query($checkTb3);
  if ($qry_checkTb1 == 0) {
    return "tbl_delivery";
  }else if ($qry_checkTb1 == 0) {
    return "tbl_delivery2";
  }else if ($qry_checkTb1 == 0) {
    return "tbl_delivery3";
  }
}
?>
<?
function Delivery() {
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
      $orderId = $db['order_id'];
      $newname = $db['newname'];
      $address_send = $db['address_send'];
      $telephone_send = $db['telephone_send'];
      $mail_send = $db['mail_send'];
      $order_date = $db['order_date'];
      $checkTableDevl = checkTableDevl();

      $sql_Insert = "insert into $checkTableDevl (order_id,newname,address_send,telephone_send,mail_send,order_date)
                                        value ('$orderId','$newname','$address_send','$telephone_send','$mail_send','$order_date')";
                                              
      $sql_Delete = "delete from tbl_order where order_id=$orderId";
      $sql_Delete2 = "delete from tbl_order_list where order_id=$orderId";
      $qry1=mysql_query($sql_Insert);
      $qry2=mysql_query($sql_Delete);
      $qry2=mysql_query($sql_Delete2);
?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <p id="orderId"><?=$orderId// การดึงค่า order_id ออกมาแสดง?></p>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['newname']// การดึงค่า newname ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['address_send']// การดึงค่า address_send ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['telephone_send']// การดึงค่า telephone_send ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['mail_send'] // การดึงค่า mail_send ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <?=$db['order_date']// การดึงค่า order_date ออกมาแสดง?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <a href="main.php?module=<?=$module?>">
      <img src="../images/ic_delivery.png" width="32" height="32" />
      </a>
      <!--
    <button type="button" onclick="testShowData(orderId)">Click !!</button>
    -->
    </span></td>
  </tr>
<?
  $i++; // บวกค่า ตัวแปร $i เพิ่มขึั้นที่ล่ะ 1
  	}	//while
  }	   //if
  // test git office
}
?>




<form action="main.php?module=<?=$module?>" method="post" enctype="multipart/form-data" name="form1" onSubmit="JavaScript:return fncSubmit();">
  <table width="439" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td width="439" align="center"><span class="sizamain1">ค้นหาตามวันที่:
      </span>
      <input name="keyword" type="date" />
      <a href="main.php?module=delivery"><input type="submit" name="button2" id="button2" value="ค้นหา" /></td>
  </tr>
</table>
</form>
    <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
        <tr>
          <td width="14%" align="center" bgcolor="#FFCC66"><span class="sizamain1">รหัสสั่งซื้อ</span></td>
          <td width="16%" align="center" bgcolor="#FFCC66"><span class="sizamain1">ชื่อ</span></td>
          <td width="16%" align="center" bgcolor="#FFCC66"><span class="sizamain1">ที่อยู่จัดส่ง</span></td>
          <td width="12%" align="center" bgcolor="#FFCC66"><span class="sizamain1">เบอร์โทรศัพท์</span></td>
          <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">อีเมล์</span></td>
          <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">วันที่สั่งซื้อ</span></td>
          <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">จัดส่ง</span></td>
        </tr>
        <? ?>
    </table>





