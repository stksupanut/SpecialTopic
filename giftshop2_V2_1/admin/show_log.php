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



<form action="main.php?module=checkdata" method="post" enctype="multipart/form-data" name="form1" onSubmit="JavaScript:return fncSubmit();">
    <label>ข้อมูลทั้งหมด</label><br>

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
        $tableq = "select * from tbl_log order by order_id";
        $qry_table = mysql_query($tableq); // อ่านข้อมูลจากฐานข้อมูล

        while($row = mysql_fetch_assoc($qry_table)){ // คำสั่งวนลูป เพื่อนำข้อมูลมาแสดงในตาราง
            ?>
            <tr>
             <td align="center" bgcolor="#FFFFFF"><span class="sizamain1"><?=$row['order_id']?>
             <td align="center" bgcolor="#FFFFFF"><span class="sizamain1"><?=$row['newname']?>
             <td align="center" bgcolor="#FFFFFF"><span class="sizamain1"><?=$row['address_send']?>
             <td align="center" bgcolor="#FFFFFF"><span class="sizamain1"><?=$row['telephone_send']?>
             <td align="center" bgcolor="#FFFFFF"><span class="sizamain1"><?=$row['mail_send']?>
             <td align="center" bgcolor="#FFFFFF"><span class="sizamain1"><?=$row['order_date']?>

            </tr>
            <?
        }

    

?>
    </table>
</form>
