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
    $query_delete = "DELETE FROM $tbl WHERE status='จัดส่งแล้ว'"; // คำสั่ง query ให้ลบข้อมูลที่มีสถานะ "จัดส่งแล้ว" ในตารางที่มีการส่งชื่อตารางมาจากหน้าที่แล้ว
    $num = mysql_query($query_delete);
    echo "<script type='text/javascript'>alert('ลบข้อมูลเรียบร้อยแล้ว'); window.location.href='main.php?module=show_delivery'</script> "; // แจ้งเตือนการทำงานและเมื่อปิดจะกลับไป page ก่อนหน้านี้    
?>
