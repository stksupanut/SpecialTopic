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
    $qry_select = "SELECT * FROM tbl_order WHERE order_date='$kw'"; // ดึงข้อมูลทั้งหมดที่มีวันที่ ตามที่ส่งค่ามาจากหน้าที่แล้ว
    $res = mysql_query($qry_select);
    $numrow=mysql_num_rows($res); // เป็นการนับจำนวนบรรทัด
    if ($numrow == 0) {
        echo "<script type='text/javascript'>alert('ไม่พบข้อมูล'); window.location.href='main.php?module=delivery'</script>"; // แจ้งเตือนการทำงานและเมื่อปิดจะกลับไป page ก่อนหน้านี้
        return;
    }else {
        while($db=mysql_fetch_array($res)){ //คำสั่งวนลูป เพื่อบันทึกข้อมูลลง DB
            $orderId = $db['order_id'];
            $newname = $db['newname'];
            $address_send = $db['address_send'];
            $telephone_send = $db['telephone_send'];
            $mail_send = $db['mail_send'];
            $order_date = $db['order_date'];
            
            $sql_Insert = "insert into tbl_log (order_id,newname,address_send,telephone_send,mail_send,order_date)
                                          value ('$orderId','$newname','$address_send','$telephone_send','$mail_send','$order_date')";
            
            $qry1=mysql_query($sql_Insert);
        }
        $query_delete = "DELETE FROM tbl_order WHERE order_date='$kw'"; // คำสั่ง query ลบข้อมูลตามวันที่ที่ส่งมาจากหน้าที่แล้ว
        $num = mysql_query($query_delete);
        echo "<script type='text/javascript'>alert('ลบข้อมูลเรียบร้อยแล้ว'); window.location.href='main.php?module=delivery'</script> "; // แจ้งเตือนการทำงานและเมื่อปิดจะกลับไป page ก่อนหน้านี้
    }
?>
