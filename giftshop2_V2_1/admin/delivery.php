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
                                            
    $sql_Delete = "delete from tbl_order where order_id=$orderId";
    $sql_Delete2 = "delete from tbl_order_list where order_id=$orderId";
    $qry1=mysql_query($sql_Insert);
    $qry2=mysql_query($sql_Delete);
    $qry2=mysql_query($sql_Delete2);
  }
}
?>




<form action="main.php?module=<?=$module?>" method="post" enctype="multipart/form-data" name="form1" onSubmit="JavaScript:return fncSubmit();">
  <center>
    <h2>
    <? 
      $resCheck = checkTableDevl();
    ?>
    </h2><br>
    <h2>
    <?
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
    ?>
    </h2>
  </center>
</form>





