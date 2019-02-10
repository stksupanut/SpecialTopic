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


<form action="main.php?module=<?=$module?>" method="post" enctype="multipart/form-data" name="form1" onSubmit="JavaScript:return fncSubmit();">
    <label>ตรวจสอบข้อมูล</label><br>
<select name="gettable">
    <option>-----โปรดเลือก------</option>
    <option value="tbl_delivery1">tbl_delivery1</option>
    <option value="tbl_delivery2">tbl_delivery2</option>
    <option value="tbl_delivery3">tbl_delivery3</option>
</select>
<a href="main.php?module=show_delivery&tbl=''"><button name="buttonq" value="ค้นหา">ค้นหา</button></a>
</form>
    <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
        <tr>
          <td width="14%" align="center" bgcolor="#FFCC66"><span class="sizamain1">รหัสสั่งซื้อ</span></td>
          <td width="16%" align="center" bgcolor="#FFCC66"><span class="sizamain1">ชื่อ</span></td>
          <td width="16%" align="center" bgcolor="#FFCC66"><span class="sizamain1">ที่อยู่จัดส่ง</span></td>
          <td width="12%" align="center" bgcolor="#FFCC66"><span class="sizamain1">เบอร์โทรศัพท์</span></td>
          <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">อีเมล์</span></td>
          <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">วันที่สั่งซื้อ</span></td>
          <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">สถานะ</span></td>
          <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizamain1">จัดส่ง</span></td>
        </tr>
        <?
      if(isset($_POST['buttonq'])){
        $table = $_POST['gettable']; // รับค่าจาก Dropdown
        $tbl = "";
        
        if($table == "tbl_delivery1"){ // เช็คเงื่อนไข เพื่อกำหนดคำสั่ง query
            $tableq = "select * from tbl_delivery order by order_id";
            $tbl = "tbl_delivery";
        }else if($table == "tbl_delivery2"){
            $tableq = "select * from tbl_delivery2 order by order_id";
            $tbl = "tbl_delivery2";
        }else if($table == "tbl_delivery3"){
            $tableq = "select * from tbl_delivery3 order by order_id";
            $tbl = "tbl_delivery3";
        }else{
          ?><script> alert("กรุณาเลือกฐานข้อมูล"); </script><?
          return;
        }
        $qry_table = mysql_query($tableq);

        while($row = mysql_fetch_assoc($qry_table)){ // คำสั่งวนลูป เพื่อนำข้อมูลมาแสดงในตาราง
            ?>
            <tr>
              <td align="center" bgcolor="#FFFFFF"><span class="sizamain1"><?=$row['order_id']?>
              <td align="center" bgcolor="#FFFFFF"><span class="sizamain1"><?=$row['newname']?>
              <td align="center" bgcolor="#FFFFFF"><span class="sizamain1"><?=$row['address_send']?>
              <td align="center" bgcolor="#FFFFFF"><span class="sizamain1"><?=$row['telephone_send']?>
              <td align="center" bgcolor="#FFFFFF"><span class="sizamain1"><?=$row['mail_send']?>
              <td align="center" bgcolor="#FFFFFF"><span class="sizamain1"><?=$row['order_date']?>
              <?
                $status = $row['status']; // รับค่าสถานะการจัดส่งจาก DB
                if ($status == 'จัดส่งแล้ว') { // เช็คสถานะ เพื่อสร้าง Checkbox ให้ตรงตามเงื่อนไข
                  ?>
                  <td align="center" bgcolor="#FFFFFF"><span class="sizamain1"><input type="checkbox" name="cb_delivery" checked disabled value="จัดส่งแล้ว">
                  <?
                }else if ($status == 'ยังไม่จัดส่ง') {
                  ?>
                  <td align="center" bgcolor="#FFFFFF"><span class="sizamain1"><input type="checkbox" name="cb_delivery" disabled value="ยังไม่จัดส่ง">
                  <?
                }
              ?>
              <td align="center" bgcolor="#FFFFFF"><span class="sizamain1"><a href="main.php?module=delivered&tbl=<?=$tbl?>&order_id=<?=$row['order_id']?>&status=<?=$row['status']?>">
              <img src="../images/ic_delivery.png" width="32" height="32" name="pic"></a> <!-- เมื่อกดที่รูปจะเปิดอีก page โดยส่งข้อมูลที่ต้องใช้งานไปทาง url -->
            </tr>
            <?
        }
        ?>
        <tr>
          <!-- เมื่อกดที่ปุ่มจะเปิดอีก page โดยส่งข้อมูลที่ต้องใช้งานไปทาง url -->
          <td align="center"><a href="main.php?module=delete_from_table&tbl=<?=$tbl?>"><input type="submit" name="btn_delete" id="btn_delete" value="ล้างข้อมูล" /></td>
        </tr><?
      }
    ?>
    </table>
