<style type="text/css">
.size {
	font-size: 12px;
}
</style>
<br />
<table width="30%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td align="center" bgcolor="#FFCC66"><strong class="size">รายงานยอดขายสินค้า</strong></td>
  </tr>
</table>
<br />
<table width="688" border="0" align="center" cellpadding="0" cellspacing="1">
    <tr>
      <td width="686">
      
      <table width="404" border="0" align="center" cellpadding="4" cellspacing="1">
        <!--<tr>
          <td class="size">
          รายวัน   
            <input name="fdate" type="text" id="datepicker-th" size="10" maxlength="10" readonly="readonly"/>
         <input type="submit" name="button" id="button" value="ค้นหา" />
		<input type="hidden" name="action" value="yes" />
          &nbsp;<br />
          รายเดือน          &nbsp;
              <select name="month" size="1">
                <option value="">เลือกเดือน</option>
                <option value="1">มกราคม</option>
                <option value="2">กุมภาพันธ์</option>
                <option value="3">มีนาคม</option>
                <option value="4">เมษายน</option>
                <option value="5">พฤษภาคม</option>
                <option value="6">มิถุนายน</option>
                <option value="7">กรกฎาคม</option>
                <option value="8">สิงหาคม</option>
                <option value="9">กันยายน</option>
                <option value="10">ตุลาคม</option>
                <option value="11">พฤศจิกายน</option>
                <option value="12">ธันวาคม</option>
              </select> 
              <select name="year" size="1" >
  				<option value="">เลือกปี</option>
  				<? $day =2013; for($i=$day+543;$i<=$day+1+543;$i++){?>
  				<option value="<?=$i-543?>">
  				<?=$i?>
  				</option>
  				<? }?>
			  </select> 
		<input type="submit" name="button" id="button" value="ค้นหา" />
		<input type="hidden" name="action" value="yes" />
		<br />
			  รายปี
<select name="year" size="1" >
  				<option value="">เลือกปี</option>
  				<? $day =2013; for($i=$day+543;$i<=$day+1+543;$i++){?>
  				<option value="<?=$i-543?>">
  				<?=$i?>
  				</option>
  				<? }?>
			  </select> 
		<input type="submit" name="button" id="button" value="ค้นหา" />
		<input type="hidden" name="action" value="yes" />
          </td>
        </tr>-->
        <tr>
          <td class="size">
          <form id="form2" name="form2" method="post" action="main.php?module=reportcirculation">
           <span class="size">รายวัน</span>
           <input name="fdate" type="text" id="datepicker-th" size="10" maxlength="10" readonly="readonly"/>
         <input type="submit" name="button" id="button" value="ค้นหา" />
		<input type="hidden" name="action" value="yes" />
          </form>
          </td>
        </tr>
        <tr>
          <td class="size">
          <form id="form2" name="form2" method="post" action="main.php?module=reportcirculation">
           <span class="size">รายเดือน</span> &nbsp;
              <select name="month" size="1">
                <option value="">เลือกเดือน</option>
                <option value="1">มกราคม</option>
                <option value="2">กุมภาพันธ์</option>
                <option value="3">มีนาคม</option>
                <option value="4">เมษายน</option>
                <option value="5">พฤษภาคม</option>
                <option value="6">มิถุนายน</option>
                <option value="7">กรกฎาคม</option>
                <option value="8">สิงหาคม</option>
                <option value="9">กันยายน</option>
                <option value="10">ตุลาคม</option>
                <option value="11">พฤศจิกายน</option>
                <option value="12">ธันวาคม</option>
              </select> 
              <select name="year" size="1" >
  				<option value="">เลือกปี</option>
  				<? $day =2013; for($i=$day+543;$i<=$day+1+543;$i++){?>
  				<option value="<?=$i-543?>">
  				<?=$i?>
  				</option>
  				<? }?>
			  </select> 
		<input type="submit" name="button" id="button" value="ค้นหา" />
		<input type="hidden" name="action" value="yes" />
          </form>
          </td>
        </tr>
        <tr>
          <td class="size">
          <form id="form2" name="form2" method="post" action="main.php?module=reportcirculation">
          <span class="size">รายปี</span>
<select name="year" size="1" >
  				<option value="">เลือกปี</option>
  				<? $day =2013; for($i=$day+543;$i<=$day+1+543;$i++){?>
  				<option value="<?=$i-543?>">
  				<?=$i?>
  				</option>
  				<? }?>
			  </select> 
		<input type="submit" name="button" id="button" value="ค้นหา" />
		<input type="hidden" name="action" value="yes" />
          </form>
          </td>
        </tr>
      </table>
      
      </td>
    </tr>
</table>

<? if($action=="yes"){?>
<?
if($fdate !='' && $month =='' && $year ==''){
	if ($fdate !=''){
	$txtDate=explode("-",$fdate);
	$Day=$txtDate[2]-543;
	$Month=$txtDate[1]."";
	$Years=$txtDate[0]."";
	$redate=$Day."-".$Month."-".$Years;}
		$sqld="SELECT * FROM tbl_order WHERE order_status=4 AND order_date='$redate' group by order_id asc";
		$qryd=mysql_query($sqld);
		$numrow=mysql_num_rows($qryd);
?>
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" >
  <tr>
    <td>
    
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFCC66">
  <tr>
    <td colspan="4" align="center" bgcolor="#FFCC66"><span class="size">รายงานยอดขายสินค้า รายวันที่      
      <?=ChangeDateShot($fdate);?>&nbsp;</span></td>
    </tr>
  <tr>
    <td width="19%" align="center" bgcolor="#FFFFCC"><span class="size">ลำดับ</span></td>
    <td width="31%" align="center" bgcolor="#FFFFCC"><span class="size">รหัสใบสั่งซื้อ</span></td>
    <td width="25%" align="center" bgcolor="#FFFFCC"><span class="size">ราคา(บาท)</span></td>
    <td width="25%" align="center" bgcolor="#FFFFCC"><span class="size">รายละเอียด</span></td>
  </tr>
  <? if ($numrow==0){?>
  <tr>
    <td colspan="4" align="center" bgcolor="#FFFFFF"><span class="size">ไม่มีข้อมูล</span></td>
    </tr>
  <? }else{$i=1;
		while($dbd=mysql_fetch_array($qryd)){
		$no++;
			$sum=$dbd['order_unit']*$dbd['product_price'];
			$sumall=$sumall+$sum;
			
  ?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=$no?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=$dbd['order_id']?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF">
		<span class="size">
		<?
			$sqld2="select * from tbl_order_lists where order_id='".$dbd['order_id']."'";
			$qryd2=mysql_query($sqld2);
			$sum2=0;
			while($dbd2=mysql_fetch_array($qryd2)){
			$sum1=$dbd2['order_unit']*$dbd2['product_price'];
			$sum2=$sum2+$sum1;
			}
			$sumall=$sumall+$sum2;
			echo number_format($sum2,2)
			
		?>
        </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size"><a href="main.php?module=reportcirculation_detail&order_id=<?=$dbd['order_id']?>&fdate=<?=$fdate?>"><img src="../images/file.gif" width="16" height="16" title="รายละเอียด" /></a></span></td>
  </tr>
  <? 
	}
  ?>
  <tr>
    <td colspan="2" align="right" bgcolor="#FFFFCC"><span class="size">รวมทั้งหมด</span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=number_format($sumall,2)?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <?
  $i++; 
	//while($db=mysql_fetch_array($qry)){
 }//if ($numrow==0){
  ?>
</table>
    
    </td>
  </tr>
</table>
<br>
<div align="center"><a href="print_sales.php?mode=day&fdate=<?=$redate?>" target="_blank" title="พิมพ์รายงาน"><img src="../images/print-icon.png" width="48" height="48" title="รายงานยอดขายนาฬิกาข้อมือ" /></a></div>
<?
}elseif($fdate =='' && $month !='' && $year !=''){
//echo "ค่าทุกค่าว่างหมดหรือมีค่า cateid";
		$sqly="SELECT count(order_id) as coid, order_id, order_date FROM tbl_order WHERE order_status=4 AND (month(order_date) )='$month' AND year(order_date)='$year' group by order_date desc";
		$qryy=mysql_query($sqly);
		$numrow=mysql_num_rows($qryy);
?>
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFCC66">
  <tr>
    <td>
    
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">

  <tr>
    <td colspan="4" align="center" bgcolor="#FFCC66"><span class="size">รายงานยอดขายสินค้า รายเดือน 
      <?=$thaimonth[$month-1]." ";?> 
      <?=$year+543?>
    &nbsp;</span></td>
    </tr>
  <tr>
    <td width="19%" align="center" bgcolor="#FFFFCC"><span class="size">ลำดับ</span></td>
    <td width="31%" align="center" bgcolor="#FFFFCC"><span class="size">วันที่</span></td>
    <td width="25%" align="center" bgcolor="#FFFFCC"><span class="size">จำนวนใบสั่งซื้อ</span></td>
    <td width="25%" align="center" bgcolor="#FFFFCC"><span class="size">ราคา(บาท)</span></td>
  </tr>
  <? if ($numrow==0){?>
  <tr>
    <td colspan="4" align="center" bgcolor="#FFFFFF"><span class="size">ไม่มีข้อมูล</span></td>
    </tr>
  <tr>
  <?
	}else{$i=1;
		while($dby=mysql_fetch_array($qryy)){
			$no++;
	?>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=$no?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=shotdate($dby['order_date'])?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=$dby['coid']?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF">
      <span class="size">
      <?
    	$sqly2="select * from tbl_order_lists as a, tbl_order as b where a.order_id=b.order_id and b.order_date='".$dby['order_date']."' and b.order_status=4";
		$qryy2=mysql_query($sqly2);
		$sum2=0;
		while($dby2=mysql_fetch_array($qryy2)){
			$sum1=$dby2['order_unit']*$dby2['product_price'];
			$sum2=$sum2+$sum1;
		}
			$sumall=$sumall+$dby['coid'];
			$sumall2=$sumall2+$sum2;
			echo number_format($sum2,2)
	?>
      </span></td>
  </tr>
  <? $i++;}?>
  <tr>
    <td colspan="2" align="right" bgcolor="#FFFFCC"><span class="size">รวมทั้งหมด</span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=$sumall?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=number_format($sumall2,2)?></span></td>
  </tr>
  <? }?>
</table>
    
    </td>
  </tr>
</table><br>
<div align="center"><a href="print_sales.php?mode=month&month=<?=$month?>&year=<?=$year?>" target="_blank" title="พิมพ์รายงาน"><img src="../images/print-icon.png" width="48" height="48" title="รายงานยอดขายนาฬิกาข้อมือ" /></a></div>
<?
}elseif($fdate =='' && $month =='' && $year !=''){
//echo "ค่าทุกค่าว่างหมดหรือมีค่า cateid";
		$sqly="SELECT count(order_id) as aaa, order_id, order_date FROM tbl_order  WHERE order_status=4 AND year(order_date)='$year' group by month(order_date) asc";
		$qryy=mysql_query($sqly);
		$numrow=mysql_num_rows($qryy);		
?>
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFCC66">
  <tr>
    <td>
    
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
  <tr>
    <td colspan="4" align="center" bgcolor="#FFCC66"><span class="size">รายงานยอดขายสินค้า รายปี 
      <?=$year+543?> 
    &nbsp;</span></td>
    </tr>
  <tr>
    <td width="25%" align="center" bgcolor="#FFFFCC"><span class="size">ลำดับ</span></td>
    <td width="25%" align="center" bgcolor="#FFFFCC"><span class="size">เดือน</span></td>
    <td width="25%" align="center" bgcolor="#FFFFCC"><span class="size">จำนวนใบสั่งซื้อ</span></td>
    <td width="25%" align="center" bgcolor="#FFFFCC"><span class="size">ราคา(บาท)</span></td>
    </tr>
  <? if ($numrow==0){?>
  <tr>
    <td colspan="4" align="center" bgcolor="#FFFFFF"><span class="size">ไม่มีข้อมูล</span></td>
  </tr>
  	<?
	}else{$i=1;
		while($dby=mysql_fetch_array($qryy)){
			$no++;
			$date=$dby['order_date'];
			if ($date !=''){
				$txtDate=explode("-",$date);
				$Day=$txtDate[2]-543;
				$Month=$txtDate[1]."";
				$Years=$txtDate[0]."";
				$redate=$Month;}
			switch($redate){
				case 1: $textredate="มกราคม"; break;
				case 2: $textredate="กุมภาพันธ์"; break;
				case 3: $textredate="มีนาคม"; break;
				case 4: $textredate="เมษายน"; break;
				case 5: $textredate="พฤษภาคม"; break;
				case 6: $textredate="มิถุนายน"; break;
				case 7: $textredate="กรกฎาคม"; break;
				case 8: $textredate="สิงหาคม"; break;
				case 9: $textredate="กันยายน"; break;
				case 10: $textredate="ตุลาคม"; break;
				case 11: $textredate="พฤศจิกายน"; break;
				case 12: $textredate="ธันวาคม"; break;}
			
	?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=$no?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=$textredate;?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF" class="size"><?=$dby['aaa']?></td>
    <td align="center" bgcolor="#FFFFFF">
      	<span class="size">
      	<?
			$sqly2="select * from tbl_order_lists as a, tbl_order as b where a.order_id=b.order_id and b.order_status=4  and month(b.order_date)=$redate";
			$qryy2=mysql_query($sqly2);
			$sum2=0;
			
			while($dby2=mysql_fetch_array($qryy2)){
			$sum1=$dby2['order_unit']*$dby2['product_price'];
			$sum2=$sum2+$sum1;
			}
			$sumall=$sumall+$sum2;
			$sumall2=$sumall2+$dby['aaa'];
			echo number_format($sum2,2)
			
		?>
        </span></td>
    </tr>
  <? $i++;}?>
  <tr>
    <td colspan="2" align="right" bgcolor="#FFFFCC"><span class="size">รวมทั้งหมด</span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size"><?=$sumall2?></span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=number_format($sumall,2)?>
    </span></td>
    </tr>
  <? }?>
</table>
    
    </td>
  </tr>
</table><br>
<div align="center"><a href="print_sales.php?mode=year&year=<?=$year?>" target="_blank" title="พิมพ์รายงาน"><img src="../images/print-icon.png" width="48" height="48" title="รายงานยอดขายนาฬิกาข้อมือ" /></a>
<br />
</div>
<?
 }elseif(($txttypeid!='' || $txttypeid=='') && $fdate =='' && $month ==''&& $year ==''){?>
<? }
if ($fdate !=''){
$txtDate=explode("-",$fdate);
	$Day=$txtDate[2];
	$Month=$txtDate[1]."";
	$Years=$txtDate[0] ."";
	$redate=$Years."-".$Month."-".$Day;}
?>

<!--<br>
<div align="center"><a href="print_sales.php?fdate=<?=$redate?>&month=<?=$month?>&year=<?=$year?>&p=<?=$p?>" target="_blank" title="พิมพ์รายงาน"><img src="../images/print-icon.png" width="48" height="48" title="รายงานยอดขายนาฬิกาข้อมือ" /></a></div>
<br />-->

<? }?>
  <?php /*?><?
function sumarybuytype($fdate,$month,$year,$txttypeid){
	if ($fdate !=''){
	$txtDate=explode("-",$fdate);
	$Day=$txtDate[2]-543;
	$Month=$txtDate[1]."";
	$Years=$txtDate[0]."";
	$redate=$Day."-".$Month."-".$Years;}
	
	if ($month !=''){
	$txtDate=explode("-",$fdate);
	$Day=$txtDate[2];
	$Month=$txtDate[1]."";
	$Years=$txtDate[0] ."";
	$redate=$Years."-".$Month."-".$Day;}
										
		if($txttypeid !=''){	$istype="AND  b.brand_id=$txttypeid";	}else{ $istype="";}
									
		if($fdate !=''){ $dates="AND d.order_date='$redate' "; }else{ $dates="";}
									
		if($month !=''){ $ismonth="AND (month(d.order_date) )='$month'"; }else{ $ismonth="";}
										
		if($year !=''){ $isyear="AND (year(d.order_date) )='$year' "; }else{ $isyear="";}
										
		$sql="SELECT  sum(a.order_unit) as btotal ,sum(a.product_price) as btotalprice
FROM tbl_order_lists AS a, tbl_product AS b, tbl_order as d
WHERE a.product_id = b.product_id
AND a.order_id=d.order_id
AND d.order_status=3
$dates
$ismonth
$isyear
";
	
									$rs = mysql_query($sql);
									$db=mysql_fetch_array($rs);
								    $array['btotal']=$db['btotal'];
									$array['btotalprice']=$db['btotalprice'];
	
	return $array;
}
?><?php */?>