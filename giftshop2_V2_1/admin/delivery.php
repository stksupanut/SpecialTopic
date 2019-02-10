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
function moveData($resCheck) {
  $sql = "select * from tbl_order";
  $qry=mysql_query($sql); // เป็นการอ่านคำสั่งให้ทำงาน
  $numrow=mysql_num_rows($qry); // เป็นการนับจำนวนบรรทัด
  if($numrow == 0){
    echo "ไม่มีข้อมูลการขายสินค้า";
    return;
  }
  while($db=mysql_fetch_array($qry)){ //คำสั่งวนลูป insert ข้อมูลทีละ 1 row
    $orderId = $db['order_id'];
    $newname = $db['newname'];
    $address_send = $db['address_send'];
    $telephone_send = $db['telephone_send'];
    $mail_send = $db['mail_send'];
    $order_date = $db['order_date'];

    $sql_Insert = "insert into $resCheck (order_id,newname,address_send,telephone_send,mail_send,order_date)
                                      value ('$orderId','$newname','$address_send','$telephone_send','$mail_send','$order_date')";
                                            
    $qry1=mysql_query($sql_Insert);
  }
}
?>

<form action="main.php?module=<?=$module?>" method="post" enctype="multipart/form-data" name="form1" onSubmit="JavaScript:return fncSubmit();">
  <center>
    <table width="439" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="439" align="center"><span class="sizamain1">ค้นหาตามวันที่:
        </span>
        <input name="keyword" type="date">
        <a href="main.php?module=delivery"><input type="submit" name="btn_searchdate" id="btn_searchdate" value="ค้นหา" /></td>
      </tr>
    </table>
  </center>
</form>
<table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr>
    <td width="14%" align="center" bgcolor="#FFCC66"><span class="sizamain1">รหัสสั่งซื้อ</span></td>
    <td width="16%" align="center" bgcolor="#FFCC66"><span class="sizamain1">ชื่อ</span></td>
    <td width="16%" align="center" bgcolor="#FFCC66"><span class="sizamain1">ที่อยู่จัดส่ง</span></td>
    <td width="12%" align="center" bgcolor="#FFCC66"><span class="sizamain1">เบอร์โทรศัพท์</span></td>
    <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">อีเมล์</span></td>
    <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">วันที่สั่งซื้อ</span></td>
  </tr>
<?
  if (isset($_POST['btn_searchdate'])) {
    $dt_keyword = strtotime($_REQUEST['keyword']);
    $day = date('d', $dt_keyword); //แสดงวัน มี 0
    $month = date('m', $dt_keyword); // แสดงเดือน มี 0
    $year = date('Y',$dt_keyword); //แสดงปี ค.ศ.
    $kw = $year."-".$month."-".$day;  // จัด string วันที่ เพื่อใช้งานกับ DB

    $sql;

    if($kw == '1970-01-01') { // 1970-01-01 คือวันที่ default หากไม่มีการเลือกวันที่
      ?><script> alert("กรุณาเลือกวันที่"); </script><? // แจ้งเตือนให้ทำการเลือกวันที่
      return;
    }else {
      $sql = "select * from tbl_order where order_date = '".$kw."' order by order_id"; // กำหนดคำสั่ง query ตามวันที่ที่จัดเตรียมไว้ และทำการเรียงข้อมูล
    }
    //$sql = "select * from tbl_order";
    $qry=mysql_query($sql);

    while($db=mysql_fetch_array($qry)){ //คำสั่งวนลูป เพื่อนำข้อมูลมาสร้างตาราง
      $orderId = $db['order_id'];
      $newname = $db['newname'];
      $address_send = $db['address_send'];
      $telephone_send = $db['telephone_send'];
      $mail_send = $db['mail_send'];
      $order_date = $db['order_date'];
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
  </tr>
  <?
      } 	//while?>
<tr>
      <!-- เมื่อกดปุ่มจะเปิดอีก page โดยส่ง parameter ที่ต้องใช้ไปให้ทาง url -->
  <td><a href="main.php?module=delivery_from_date&kw=<?=$kw?>"><input type="submit" name="btn_delivery" id="btn_delivery" value="จัดส่ง" />
      <a href="main.php?module=delete_from_date&kw=<?=$kw?>"><input type="submit" name="btn_delete" id="btn_delete" value="ลบข้อมูล" /></td>
</tr>

  <?
    }
  ?>
</table>

