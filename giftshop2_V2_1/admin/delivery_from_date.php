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

<?php
    if (isset($_POST['btn_delivery'])) {
        $kw = $_POST['kw'];
    }

    function checkTableDevl(){ // ฟังก์ชันการเช็คฐานข้อมูล ว่ามีพื้นที่ให้จัดเก็บข้อมูลหรือไม่
        $checkTb1 = "select * from tbl_delivery";
        $checkTb2 = "select * from tbl_delivery2";
        $checkTb3 = "select * from tbl_delivery3";
        $qry_checkTb1 = mysql_query($checkTb1);
        $qry_checkTb2 = mysql_query($checkTb2);
        $qry_checkTb3 = mysql_query($checkTb3);
        $no1=mysql_num_rows($qry_checkTb1);
        $no2=mysql_num_rows($qry_checkTb2);
        $no3=mysql_num_rows($qry_checkTb3);
        if ($no1 == 0) { // เช็คเงื่อนไข โดยอ้างอิงจากการนับบรรทัดข้อมูลใน DB แล้วคืนค่ากลับไป
          return "1";
        }else if ($no2 == 0) {
          return "2";
        }else if ($no3 == 0) {
          return "3";
        }else{
          return "0";
        }
    }

    $checkData = 0;

    function moveData($resCheck,$kw) { // ฟังก์ชันการ Copy ข้อมูลจากตารางการสั่งซื้อ ไปตารางการจัดส่งที่สร้างเตรียมไว้
        $sql = "select * from tbl_order where order_date='$kw'"; //คำสั่ง query ข้อมูลทั้งหมดที่มีวันที่ตามที่ส่งค่ามา
        $qry=mysql_query($sql);
        $numrow=mysql_num_rows($qry); // เป็นการนับจำนวนบรรทัด
        if($numrow == 0){
            echo "<script type='text/javascript'>alert('ไม่พบข้อมูล'); window.location.href='main.php?module=delivery'</script>"; // แจ้งเตือนการทำงานและเมื่อปิดจะกลับไป page ก่อนหน้านี้
            $checkData = 1;
            return;
        }
        while($db=mysql_fetch_array($qry)){ //คำสั่งวนลูป เพื่อบันทึกข้อมูลลง DB
            $orderId = $db['order_id'];
            $newname = $db['newname'];
            $address_send = $db['address_send'];
            $telephone_send = $db['telephone_send'];
            $mail_send = $db['mail_send'];
            $order_date = $db['order_date'];
            
            $sql_Insert = "insert into $resCheck (order_id,newname,address_send,telephone_send,mail_send,order_date,status)
                                          value ('$orderId','$newname','$address_send','$telephone_send','$mail_send','$order_date','ยังไม่จัดส่ง')";
            
            $qry1=mysql_query($sql_Insert);
        }
      }
?>

<form action="main.php?module=<?=$module?>&kw=<?$kw?>" method="post" enctype="multipart/form-data" name="form1" onSubmit="JavaScript:return fncSubmit();">
    <center>
    <br>
    <?
        $resCheck = checkTableDevl(); // สั่งทำงานฟังก์ชันเช็คฐานข้อมูล
        if($resCheck == 1){
            $resCheck = "tbl_delivery";
            moveData($resCheck,$kw); // สั่งทำงานฟังก์ชันย้ายข้อมูล โดยส่ง parameter Table ที่จะเก็บข้อมูล และ วันที่ ไปด้วย
          }else if($resCheck == 2){
            $resCheck = "tbl_delivery2";
            moveData($resCheck,$kw); // สั่งทำงานฟังก์ชันย้ายข้อมูล โดยส่ง parameter Table ที่จะเก็บข้อมูล และ วันที่ ไปด้วย
          }else if($resCheck == 3){
            $resCheck = "tbl_delivery3";
            moveData($resCheck,$kw); // สั่งทำงานฟังก์ชันย้ายข้อมูล โดยส่ง parameter Table ที่จะเก็บข้อมูล และ วันที่ ไปด้วย
          }else if($resCheck == 0){
            $resCheck = "ไม่มีพื้นที่ว่าง";
            echo "<script type='text/javascript'>alert('ไม่มีพื้นที่ว่าง');</script>"; // แจ้งเตือนการทำงานและเมื่อปิดจะกลับไป page ก่อนหน้านี้
          }
    ?>

    <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr>
    <td width="14%" align="center" bgcolor="#FFCC66"><span class="sizamain1"><h1>Result</h1></span></td>
  </tr>
<tr>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <p><h2><?
        if ($checkData == 1) {
            echo "ไม่พบข้อมูลในฐานข้อมูล";
        }else if ($resCheck == "ไม่มีพื้นที่ว่าง") {
            echo "ไม่มีพื้นที่เก็บข้อมูล";
        }else {
            echo "บันทึกข้อมูลการจัดส่งวันที่ : $kw   ลงฐานข้อมูล : $resCheck";
        }
      ?></h2></p>
    </span></td>
  </tr>
  
</table>
  </center>
</form>
