<?
	ob_start();
	session_start();
	include('../includes/config.ini.php');
	include('../includes/connectdb.in.php');
	include('../includes/function.ini.php');
	connect_db();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>พิมพ์รายงาน</title>
<style type="text/css" media="print">
input{
	display:none;
}
</style>

<style type="text/css">
.doubleUnderline{
border-bottom: 3px double ;
color:#F00;
}
.fontsmallred{
	color:#F00;
	font-size:11px;
}
.size {	font-size: 12px;
}
</style>
</head>

<body>

<br />
<table width="67%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td align="center" valign="top"><strong>ร้านขายของขวัญออนไลน์</strong></td>
  </tr>
  <tr>
    <td align="center" valign="top"><strong>รายงานยอดขายสินค้า 
    <? if($fdate !=''){ ?>วันที่ <?=shotdate($fdate)?><? }else{ }
if($month !='' && $year !=''){ ?>เดือน <?=$thaimonth[$month-1]." ";?> <?=$year+543?> <? }else{ }
if($year !='' && $month==''){ echo "ปี "; echo $year+543; }else{ $isyear="";}
?></strong></td>
  </tr>
</table>
<table width="90%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="50%" valign="bottom">&nbsp;<strong>ออกรายงาน วันที่</strong> <?=shotdate($today);?></td>
    <td width="50%" align="right" valign="bottom"><strong>เวลาที่พิมพ์</strong>&nbsp;<? echo date("H:i:s")?>&nbsp;น.&nbsp;&nbsp;</td>
  </tr>
</table>
<br />
<hr width="90%" size="1" color="#000000" />

<?
	switch($mode){
		case day :
		if ($fdate !=''){
	$txtDate=explode("-",$fdate);
	$Day=$txtDate[2];
	$Month=$txtDate[1]."";
	$Years=$txtDate[0] ."";
	$redate=$Years."-".$Month."-".$Day;}
		$sqld="SELECT * FROM tbl_order WHERE order_status=4 AND order_date='$redate' group by order_id asc";
		$qryd=mysql_query($sqld);
		$numrow=mysql_num_rows($qryd);
?>
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF">
    
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFCC66">
  <tr>
    <td width="25%" align="center" bgcolor="#FFCC66">ลำดับ</td>
    <td width="25%" align="center" bgcolor="#FFCC66">รหัสใบสั่งซื้อ</td>
    <td width="25%" align="center" bgcolor="#FFCC66">ราคา(บาท)</td>
    <!--<td width="25%" align="center" bgcolor="#0a9df2">รายละเอียด</td>-->
  </tr>
  <? if ($numrow==0){?>
  <tr>
    <td colspan="3" align="center" bgcolor="#FFFFFF">ไม่มีข้อมูล</td>
    </tr>
  <? }else{$i=1;
		while($dbd=mysql_fetch_array($qryd)){
		$no++;
			$sum=$dbd['order_unit']*$dbd['product_price'];
			$sumall=$sumall+$sum;
			
  ?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><?=$no?></td>
    <td align="center" bgcolor="#FFFFFF"><?=$dbd['order_id']?></td>
    <td align="center" bgcolor="#FFFFFF">
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
			
		?></td>
    <!--<td align="center" bgcolor="#FFFFFF"><a href="main.php?module=report_sales_detail2&order_id=<?=$dbd['order_id']?>"><img src="../images/search.jpg" width="40" height="40" title="รายละเอียด" /></a></td>-->
  </tr>
  <? 
	}
  ?>
  <tr>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFCC">รวมทั้งหมด</td>
    <td align="center" bgcolor="#FFFFFF"><?=number_format($sumall,2)?></td>
    <!--<td align="center" bgcolor="#FFFFFF">&nbsp;</td>-->
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

<?  break;
		case month :
		$sqly="SELECT count(order_id) as coid, order_id, order_date FROM tbl_order WHERE order_status=4 AND (month(order_date) )='$month' AND year(order_date)='$year' group by order_date desc";
		$qryy=mysql_query($sqly);
		$numrow=mysql_num_rows($qryy);
?>
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFCC66">
  <tr bgcolor="#FFFFCC">
    <td width="25%" align="center" bgcolor="#FFCC66">ลำดับ</td>
    <td width="25%" align="center" bgcolor="#FFCC66">วันที่</td>
    <td width="25%" align="center" bgcolor="#FFCC66">จำนวนใบสั่งซื้อ(รายการ)</td>
    <td width="25%" align="center" bgcolor="#FFCC66">ราคา(บาท)</td>
  </tr>
  <? if ($numrow==0){?>
  <tr>
    <td colspan="4" align="center" bgcolor="#FFFFFF">ไม่มีข้อมูล</td>
    </tr>
  <tr>
  <?
	}else{$i=1;
		while($dby=mysql_fetch_array($qryy)){
			$no++;
	?>
    <td align="center" bgcolor="#FFFFFF"><?=$no?></td>
    <td align="center" bgcolor="#FFFFFF"><?=shotdate($dby['order_date'])?></td>
    <td align="center" bgcolor="#FFFFFF"><?=$dby['coid']?></td>
    <td align="center" bgcolor="#FFFFFF">
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
    </td>
  </tr>
  <? $i++;}?>
  <tr>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFCC">รวมทั้งหมด</td>
    <td align="center" bgcolor="#FFFFFF"><?=$sumall?></td>
    <td align="center" bgcolor="#FFFFFF"><?=number_format($sumall2,2)?></td>
  </tr>
  <? }?>
</table>
    
    </td>
  </tr>
</table>

<?  break;
		case year :
		$sqly="SELECT count(order_id) as aaa, order_id, order_date FROM tbl_order  WHERE order_status=4 AND year(order_date)='$year' group by month(order_date) asc";
		$qryy=mysql_query($sqly);
		$numrow=mysql_num_rows($qryy);
?>
<br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFCC66">
  <tr>
    <td width="25%" align="center" bgcolor="#FFCC66">ลำดับ</td>
    <td width="25%" align="center" bgcolor="#FFCC66">เดือน</td>
    <td width="25%" align="center" bgcolor="#FFCC66">จำนวนใบสั่งซื้อ</td>
    <td width="25%" align="center" bgcolor="#FFCC66">ราคา(บาท)</td>
    </tr>
  <? if ($numrow==0){?>
  <tr>
    <td colspan="4" align="center" bgcolor="#FFFFFF">ไม่มีข้อมูล</td>
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
    <td align="center" bgcolor="#FFFFFF"><?=$no?></td>
    <td align="center" bgcolor="#FFFFFF"><?=$textredate;?></td>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=$dby['aaa']?></span></td>
    <td align="center" bgcolor="#FFFFFF">
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
    </td>
    </tr>
  <? $i++;}?>
  <tr>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="center" bgcolor="#FFFFCC">รวมทั้งหมด</td>
    <td align="center" bgcolor="#FFFFFF"><span class="size">
      <?=$sumall2?></span></td>
    <td align="center" bgcolor="#FFFFFF"><?=number_format($sumall,2)?></td>
    </tr>
  <? }?>
</table>
    
    </td>
  </tr>
</table>

<? }?>
<br />
<hr width="90%" size="1" color="#000000" />
<br />
<table width="95%" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td align="center">
    <input type="button" name="print" id="button" value="พิมพ์เอกสาร" onclick="javascript:window.print()" />
	<input name="Submit" type="button"  onclick="javascript:window.close()" value="ปิดหน้าต่าง" align="middle" />
    </td>
  </tr>
</table>
</body>
</html>