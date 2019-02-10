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

<?
    if ($status == 'จัดส่งแล้ว') { // เช็คสถานะที่ถูกส่งมา เพื่อกำหนดคำสั่ง query
        $query_update = "UPDATE $tbl SET status='ยังไม่จัดส่ง' WHERE order_id=$order_id";
        mysql_query($query_update); // update สถานะให้เป็นยังไม่จัดส่ง
        echo "<script type='text/javascript'>alert('ยกเลิกการจัดส่งเรียบร้อยแล้ว'); window.location.href='main.php?module=show_delivery'</script> "; // แจ้งเตือนการทำงานและเมื่อปิดจะกลับไป page ก่อนหน้านี้
    }else if ($status == 'ยังไม่จัดส่ง') {
        $query_update = "UPDATE $tbl SET status='จัดส่งแล้ว' WHERE order_id=$order_id";
        mysql_query($query_update); // update สถานะให้เป็นจัดส่งแล้ว
        echo "<script type='text/javascript'>alert('จัดส่งสินค้าเรียบร้อยแล้ว'); window.location.href='main.php?module=show_delivery'</script>"; // แจ้งเตือนการทำงานและเมื่อปิดจะกลับไป page ก่อนหน้านี้
        
    }
?>

