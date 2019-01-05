<?		 $sql="select * from tbl_order as a, tbl_order_lists as b ,tbl_product as c where b.product_id=c.product_id and a.order_id=b.order_id  and a.order_status=4 and a.order_id=$order_id ";
		$qry=mysql_query($sql);
		$numrow=mysql_num_rows($qry);
?>
<style type="text/css">
.size {
	font-size: 12px;
}
</style>

<br />
<table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" bgcolor="#FFCC66"><strong class="size">รายละเอียดยอดขายสินค้า</strong></td>
  </tr>
</table>
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td bgcolor="#FFFFFF">
    
<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFCC66">
  <tr>
    <td width="12%" align="center" bgcolor="#FFCC66"><span class="size">ลำดับ&nbsp;</span></td>
    <td width="17%" align="center" bgcolor="#FFCC66"><span class="size">รหัสสินค้า&nbsp;</span></td>
    <td width="17%" align="center" bgcolor="#FFCC66" class="size">ชื่อสินค้า</td>
    <td width="16%" align="center" bgcolor="#FFCC66"><span class="size">จำนวน&nbsp;</span></td>
    <td width="19%" align="center" bgcolor="#FFCC66"><span class="size">ราคา:หน่วย&nbsp;</span></td>
    <td width="19%" align="center" bgcolor="#FFCC66"><span class="size">ราคารวม(บาท)&nbsp;</span></td>
  </tr>
  <? if ($numrow==0){?>
  <tr>
    <td colspan="6" align="center" bgcolor="#FFFFFF"><span class="size">ไม่มีข้อมูล รายละเอียดยอดขายนาฬิกาข้อมือ</span></td>
  </tr>
  <? }else{$i=1;
		while($db=mysql_fetch_array($qry)){
		$no++;
			$sum=$db['order_unit']*$db['product_price'];
			$sumall=$sumall+$sum;
			$sumunit=$sumunit+$db['order_unit'];
			$sumprice=$sumprice+$db['product_price'];
  ?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=$no?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=$db['product_id'];?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size"><?=$db['product_name'];?></span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=$db['order_unit'];?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=number_format($db['product_price'],2);?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=number_format($sum,2)?>
    </span></td>
  </tr>
  <? }//while($db=mysql_fetch_array($qry)){?>
  <tr>
    <td colspan="4" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFCC"><span class="size">รวมทั้งหมด</span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=number_format($sumall,2)?>
    </span></td>
  </tr>
  <?
  $i++; }//if ($numrow==0){
  ?>
</table>

    
    </td>
  </tr>
</table>
<br />
<div align="center">
<a href="main.php?module=reportcirculation&fdate=<?=$fdate?>&action=yes"><img src="../images/back-icon.png" title="ย้อนกลับ" width="48" height="48" /></a>
<br />
</div>
