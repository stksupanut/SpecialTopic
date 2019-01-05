<?
	ob_start();
	session_start();
	include('../includes/connectdb.in.php');
	include('../includes/function.ini.php');
	connect_db();
	//$module=$_REQUEST['module'];//รับค่าชื่อเพจ
	$mode=$_REQUEST['mode'];//รับค่าตัวแนร mode เพื่อใช้ใน switch case
	$action=$_REQUEST['action'];//รับค่าตัวแปร action
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบธนาคาร</title>
<style type="text/css">
body {
	background-color: #F0F0F0;
}
.doubleUnderline{
border-bottom: 3px double;
color:#F00;
}
.text_for_radio{  
    cursor:pointer;   
}  
</style>
<link href="../css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<br />

<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50" colspan="2" align="center" bgcolor="#6699FF">&nbsp;&nbsp;&nbsp;&nbsp;ระบบจำลองการชำระเงินผ่านบัตรเครดิต</td>
  </tr>
  <tr>
    <td width="20%" height="400" valign="top" bgcolor="#FFFFFF"><br />
      <table width="100%" border="0" align="center">
      <tr>
        <td align="center" bgcolor="#6699FF"><div id="title_box2">ระบบจัดการ</div></td>
      </tr>
      <tr>
        <td align="center"><a href="../index.php"><br />
          หน้าแรกเว็บไซต์</a></td>
      </tr>
      <tr>
        <td align="center"><a href="index.php">บัตรเครดิต</a></td>
      </tr>
    </table></td>
    <td width="80%" align="center" valign="top" bgcolor="#FFFFFF">
    
    <?
    	switch($mode){
			default :
			$sql="select * from tbl_credit as a, tbl_order_lists as b where a.order_id=b.order_id group by a.order_id asc";
			$qry=mysql_query($sql);
			$numrow=mysql_num_rows($qry);
	?>
    <br />
    <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center" valign="top" bgcolor="#6699FF"><div id="title_box">บัตรเครดิต</div></td>
  </tr>
</table>
<br />
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#656565">
  <tr>
    <td bgcolor="#FFFFFF">
    
    <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td align="center" bgcolor="#e1e1e1">ลำดับ&nbsp;</td>
    <td align="center" bgcolor="#e1e1e1">หมายเลขบัตรเครดิต&nbsp;</td>
    <td align="center" bgcolor="#e1e1e1">ราคาสินค้า&nbsp;</td>
    <td align="center" bgcolor="#e1e1e1">สถานะ&nbsp;</td>
    <td align="center" bgcolor="#e1e1e1">ตรวจสอบ&nbsp;</td>
  </tr>
  <? if ($numrow==0){?>
  <tr>
    <td colspan="5" align="center">ไม่มีข้อมูล การชำระเงินผ่านบัตรเครดิต</td>
    </tr>
  <? }else{
		while($db=mysql_fetch_array($qry)){
		$no++;
		$sum=cunit($db['order_id']);
  ?>
  <tr>
    <td align="center"><?=$no?>&nbsp;</td>
    <td align="center"><? if($db['credit_type'] ==1){?>4<? }else{?>5<? }?><?=$db['credit_number1']?> - <?=$db['credit_number2']?> - <?=$db['credit_number3']?> - <?=$db['credit_number4']?>&nbsp;</td>
    <td align="center"><?=number_format($sum,2);?>&nbsp;</td>
    <td align="center"><? if($db['credit_status']==0 ){echo "รอการตรวจสอบ";}elseif($db['credit_status']==1){echo "อนุมัติ";}else{echo "ไม่อนุมัติ"; }?></td>
    <td align="center"><? if($db['credit_status']!=0 ){echo "-";}else{ ?>
    
    <a href="index.php?module=<?=$module?>&mode=check&credit_id=<?=$db['credit_id']?>&customer_id=<?=$db['customer_id']?>&credit_type=<?=$db['credit_type']?>">ตรวจสอบ</a>
    
<? } 
?>
    </td>
  </tr>
  <? } //while($db=mysql_fetch_array($qry)){
	}//if ($numrow==0){ ?>
</table>

    
    </td>
  </tr>
</table>
<br />
<?
	break;
	case check :
		/*$sqlch="select tbl_bank.*, tbl_credit.* from tbl_bank, tbl_credit where tbl_bank.customer_id=$customer_id and tbl_credit.customer_id=$customer_id group by tbl_bank.customer_id";*/
	$s="select * from tbl_credit where customer_id=$customer_id and credit_id=$credit_id group by customer_id";
	$q=mysql_query($s);
	$dba=mysql_fetch_array($q);
	$bnumber1=$dba['credit_number1'];
	$bnumber2=$dba['credit_number2'];
	$bnumber3=$dba['credit_number3'];
	$bnumber4=$dba['credit_number4'];
	$expm=$dba['credit_expm'];
	$expy=$dba['credit_expy'];
	
		 $sqlcheck="select tbl_bank.*, tbl_credit.* from tbl_bank, tbl_credit where tbl_bank.customer_id=$customer_id and tbl_credit.credit_id=$credit_id and tbl_credit.customer_id=$customer_id and tbl_bank.bank_type=$credit_type and tbl_bank.bank_number1=$bnumber1 and tbl_bank.bank_number2=$bnumber2 and tbl_bank.bank_number3=$bnumber3 and tbl_bank.bank_number4=$bnumber4 and tbl_bank.bank_expm=$expm and tbl_bank.bank_expy=$expy and tbl_credit.credit_status=0 group by tbl_bank.customer_id";
		$qrycheck=mysql_query($sqlcheck);
		$check=mysql_num_rows($qrycheck);
		
		if($check!=''){
			echo"<meta http-equiv='refresh' content='0;URL=index.php?mode=credit&credit_id=$credit_id&c=1'>";
		}else{
			echo"<meta http-equiv='refresh' content='0;URL=index.php?mode=credit&credit_id=$credit_id&c=2'>";
		}
		
	break;	
	case cs :
	if($action=="yes"){
			if($credit_status==1){
				$sql="update tbl_credit set credit_status='$credit_status', credit_money='$cd', credit_time=now() where credit_id='$credit_id'";
				mysql_query($sql);
				$sql2="update tbl_order set order_status=1 where order_id='$order_id'";
				mysql_query($sql2);
				$sql3="update tbl_bank set bank_balance=bank_balance-'".$cd."' where customer_id='$customer_id'";
				mysql_query($sql3);
				
				$totalOrderUnit=CheckOrderUnit($order_id);
				
			}else{
				$sql4="update tbl_credit set credit_status='$credit_status' where credit_id='$credit_id'";
				mysql_query($sql4);
			$sql5="update tbl_order set order_status=6 where order_id='$order_id'";
				mysql_query($sql5);
				
			}
				echo "<meta http-equiv='refresh' content='0;URL=index.php'> ";	
				exit;
					
		}

	break;	
	case credit :
		
	if($c==1){
	$sqlcs1="select * from tbl_credit as a, tbl_order_lists as b, tbl_bank as c where a.credit_status=0 and a.order_id=b.order_id and a.customer_id=c.customer_id and credit_id=$credit_id";
		$qry=mysql_query($sqlcs1);
		$db=mysql_fetch_array($qry);
	}else{
	$sqlcs2="select * from tbl_credit as a, tbl_order_lists as b where a.credit_status=0 and a.order_id=b.order_id and credit_id=$credit_id";
		$qry=mysql_query($sqlcs2);
		$db=mysql_fetch_array($qry);
	}
	
	$sumprice=$db['order_unit']*$db['product_price'];
	$sumtotal=$sumtotal+$sumprice;
	if($sumtotal>500){$sto=$sumtotal;}else{$sto=$sumtotal+50;}
	$cd=($sto*4)/100;
	$cd=$sto+$cd;
	
	switch($db['credit_expm']){
		case 1: $textstatus="มกราคม"; break;
		case 2: $textstatus="กุมภาพันธ์"; break;
		case 3: $textstatus="มีนาคม"; break;
		case 4: $textstatus="เมษายน"; break;
		case 5: $textstatus="พฤษภาคม"; break;
		case 6: $textstatus="มิถุนายน"; break;
		case 7: $textstatus="กรกฎาคม"; break;
		case 8: $textstatus="สิงหาคม"; break;
		case 9: $textstatus="กันยายน"; break;
		case 10: $textstatus="ตุลาคม"; break;
		case 11: $textstatus="พฤศจิกายน"; break;
		case 12: $textstatus="ธันวาคม"; break;
	}
	
	$credit_expy=$db['credit_expy']+543;
	
	$sum=cunit($db['order_id']);
	
?>
<br />
<table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center" valign="top" bgcolor="#6699FF"><div id="title_box">บัตรเครดิต : ตรวจสอบ</div></td>
  </tr>
</table>
<br />
<? if ($c==1){echo"";}else{echo '<font color="#FF0000">ข้อมูลบัตรไม่ถูกต้อง</font>'; }?>
<br />
<form action="index.php?mode=credit" method="post" enctype="multipart/form-data" name="credit">
  <table width="60%" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#656565">
  <tr>
    <td bgcolor="#FFFFFF">
    
    <table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td width="30%" bgcolor="#F0F0F0">&nbsp;&nbsp;ชื่อผู้ถือบัตร :</td>
      <td width="70%" bgcolor="#F0F0F0">&nbsp;<? if($c==1){?><?=$db['credit_name']?><? }else{?><font color="#FF0000">-</font><? }?></td>
    </tr>
    <tr>
      <td bgcolor="#E1E1E1">&nbsp;&nbsp;หมายเลขบัตร :</td>
      <td bgcolor="#E1E1E1">&nbsp;<? if($c==1){?><? if($db['credit_type'] ==1){?>4<? }else{?>5<? }?><?=$db['credit_number1']?> - <?=$db['credit_number2']?> - <?=$db['credit_number3']?> - <?=$db['credit_number4']?>&nbsp;<? }else{?><font color="#FF0000">-</font><? }?></td>
    </tr>
    <tr>
      <td bgcolor="#F0F0F0">&nbsp;&nbsp;ชนิดของบัตร :</td>
      <td bgcolor="#F0F0F0">&nbsp;<? if($c==1){?><? if($db['credit_type'] ==1){echo "บัตรเครดิต VISA";}else{echo "บัตรเครดิต MasterCard";}?><? }else{?><font color="#FF0000">-</font><? }?>&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#E1E1E1">&nbsp;&nbsp;วันสิ้นสุดการใช้งาน :</td>
      <td bgcolor="#E1E1E1">&nbsp;<? if($c==1){?><?=$textstatus?>&nbsp;<?=$credit_expy?><? }else{?><font color="#FF0000">-</font><? }?>&nbsp;</td>
    </tr>
    <!--<tr>
      <td bgcolor="#F0F0F0">&nbsp;ธนาคารที่ออกบัตร :</td>
      <td bgcolor="#F0F0F0"><?=$db['credit_bank']?>&nbsp;</td>
    </tr>-->
    <tr>
      <td bgcolor="#F0F0F0">&nbsp;&nbsp;ยอดวงเงินสูงสุด :</td>
      <td bgcolor="#F0F0F0">&nbsp;<? if($c==1){?><?=number_format($db['bank_maximum'],2)?><? }else{?><font color="#FF0000">-</font><? }?>&nbsp;บาท</td>
    </tr>
    <tr>
      <td bgcolor="#E1E1E1">&nbsp;&nbsp;ยอดวงเงินคงเหลือ :</td>
      <td bgcolor="#E1E1E1">&nbsp;<? if($c==1){?><?=number_format($db['bank_balance'],2)?><? }else{?><font color="#FF0000">-</font><? }?>&nbsp;บาท</td>
    </tr>
    <tr>
      <td bgcolor="#F0F0F0">&nbsp;&nbsp;ราคาสินค้า :</td>
      <td bgcolor="#F0F0F0">&nbsp;<? if($c==1){?><span class="doubleUnderline"><?=number_format($sum,2)?></span><? }else{?><font color="#FF0000">-</font><? }?>&nbsp;บาท</td>
    </tr>
    <tr>
      <td bgcolor="#E1E1E1">&nbsp;&nbsp;ตรวจสอบ :</td>
      <td bgcolor="#E1E1E1">&nbsp;<? if($c==1){?>
      <input type="radio" name="credit_status" value="1" id="rad1"/><label for=rad1><font color="#00FF00" size="3"><strong>อนุมัติ</strong></font></label>
      <input type="radio" name="credit_status" value="2" id="rad2"/><label for=rad2><font color="#FF0000" size="3"><strong>ไม่อนุมัติ</strong></font></label>
      <? }else{?>
      <input type="radio" name="credit_status" value="2" id="rad2"/><label for=rad2><font color="#FF0000" size="3"><strong>ไม่อนุมัติ</strong></font></label>
      <? }?>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#F0F0F0"><input type="submit" name="button" id="button" value="ตกลง" />
    	<input type="hidden" name="action" value="yes" />
    	<input type="hidden" name="mode" value="cs" />
        <input type="hidden" name="cd" value="<?=$sto?>" />
        <input type="hidden" name="credit_id" value="<?=$db['credit_id']?>" />
        <input type="hidden" name="customer_id" value="<?=$db['customer_id']?>" />
        <input type="hidden" name="order_id" value="<?=$db['order_id']?>" />
    	<!--<input type="reset" name="button2" id="button2" value="คืนค่า" />--></td>
      </tr>
  </table>
    
    </td>
  </tr>
</table>

</form>
<br />

<?
	}
?>
    
    </td>
  </tr>
</table>

</body>
</html>