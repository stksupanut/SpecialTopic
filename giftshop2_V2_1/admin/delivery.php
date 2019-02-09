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



function checkTableDevl(){
  $checkTb1 = "select * from tbl_delivery";
  $checkTb2 = "select * from tbl_delivery2";
  $checkTb3 = "select * from tbl_delivery3";
  $qry_checkTb1 = mysql_query($checkTb1);
  $qry_checkTb2 = mysql_query($checkTb2);
  $qry_checkTb3 = mysql_query($checkTb3);
  $no1=mysql_num_rows($qry_checkTb1);
  $no2=mysql_num_rows($qry_checkTb2);
  $no3=mysql_num_rows($qry_checkTb3);
  if ($no1 == 0) {
    echo "Result : tbl_delivery";
    return "1";
  }else if ($no2 == 0) {
    echo "Result : tbl_delivery2";
    return "2";
  }else if ($no3 == 0) {
    echo "Result : tbl_delivery3";
    return "3";
  }else{
    return "0";
  }
}

function moveData($resCheck) {
  $sql = "select * from tbl_order";
  // คำสั่ง mysql เป็นการจอยตาราง และแสดงข้อมูล
  //ทำให้ฐานข้อมูลทำงาน

  $qry=mysql_query($sql); // เป็นการอ่านคำสั่งให้ทำงาน
  $numrow=mysql_num_rows($qry); // เป็นการนับจำนวนบรรทัด
  if($numrow == 0){
    echo "ไม่มีข้อมูลการขายสินค้า";
    return;
  }
  while($db=mysql_fetch_array($qry)){ //คำสั่งวนลูป
    $orderId = $db['order_id'];
    $newname = $db['newname'];
    $address_send = $db['address_send'];
    $telephone_send = $db['telephone_send'];
    $mail_send = $db['mail_send'];
    $order_date = $db['order_date'];

    $sql_Insert = "insert into $resCheck (order_id,newname,address_send,telephone_send,mail_send,order_date)
                                      value ('$orderId','$newname','$address_send','$telephone_send','$mail_send','$order_date')";
                                            
    // $sql_Delete = "delete from tbl_order where order_id=$orderId";
    // $sql_Delete2 = "delete from tbl_order_list where order_id=$orderId";
    $qry1=mysql_query($sql_Insert);
    // $qry2=mysql_query($sql_Delete);
    // $qry2=mysql_query($sql_Delete2);
  }
}
?>

<?
  if(isset($_POST['transport'])){
  //   $sql_transport = "select * from tbl_order where order_date = '".$db['order_date']."'";
  //   $res=mysql_query($sql_transport);

  //   while($db=mysql_fetch_array($res)){ //คำสั่งวนลูป
  //     $orderId = $db['order_id'];
  //     $newname = $db['newname'];
  //     $address_send = $db['address_send'];
  //     $telephone_send = $db['telephone_send'];
  //     $mail_send = $db['mail_send'];
  //     $order_date = $db['order_date'];
  
  //     $sql_Insert = "insert into tbl_delivery3 (order_id,newname,address_send,telephone_send,mail_send,order_date)
  //                                       value ('$orderId','$newname','$address_send','$telephone_send','$mail_send','$order_date')";
  //   $res_insert=mysql_query($sql_Insert);                                    
  // }
  echo("test");
}
  function transportData($order_date) {
    $sql_transport = "select * from tbl_order where order_date = '".$order_date."'";
  }
?>



<form action="main.php?module=<?=$module?>" method="post" enctype="multipart/form-data" name="form1" onSubmit="JavaScript:return fncSubmit();">
  <center>
    <h2>
    <? 
      // $resCheck = checkTableDevl();
    ?>
    </h2><br>
    <h2>
    <?
    /*
      if($resCheck == 1){
        $resCheck = "tbl_delivery1";
        moveData($resCheck);
      }else if($resCheck == 2){
        $resCheck = "tbl_delivery2";
        moveData($resCheck);
      }else if($resCheck == 3){
        $resCheck = "tbl_delivery3";
        moveData($resCheck);
      }else if($resCheck == 0){
        echo "ไม่มีพื้นที่ว่าง";
      }
      */
    ?>
    </h2>

    <table width="439" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="439" align="center"><span class="sizamain1">ค้นหาตามวันที่:
        </span>
        <input name="keyword" type="date"/>
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
    $kw = $year."-".$month."-".$day;  // จัด string

    $sql;

    if($kw == '1970-01-01') {
      $sql = "select * from tbl_order";
    }else {
      $sql = "select * from tbl_order where order_date = '".$kw."'";
    }
    //$sql = "select * from tbl_order";
    $qry=mysql_query($sql);

    while($db=mysql_fetch_array($qry)){ //คำสั่งวนลูป
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
      } 	//while
    }
  ?>
  <tr>
    <td><input type="submit" name="transport" action="" value="transport"></td>
  </tr>
  <tr>
  <td>
  

  </td>
  </tr>
</table>

