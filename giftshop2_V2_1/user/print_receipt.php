<?
session_start();
//include คือการเรียกใช้งานไฟล์
include('../includes/connectdb.in.php');
include('../includes/function.ini.php');
connect_db();
$order_id=$_REQUEST['order_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.fontsize1 {	font-size: 12px;
}
</style>
<style type="text/css" media="print">
input{
	display:none;
}
</style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th width="632" height="57" align="center" scope="row"><table width="70%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <th width="21" scope="row">&nbsp;</th>
        <td width="276">&nbsp;</td>
        <td width="342" align="center"><p>ใบเสร็จรับเงิน</p>
          <p>www.giftshop.in.th<br />
14/106 ม.2 ต.ลำผักกูด อ.ธัญบุรี จ.ปทุมธานี<br />
0826574298</p></td>
        <td width="282" align="center"><p>&nbsp;</p>
          <h5>วันที่พิมพ์รายงาน 
            <?=shotdate($today);?>
            
            <br />
           เวลาที่พิมพ์ <? echo date("H:i:s")?> น.</h5></td>
      </tr>
    </table></th>
  </tr>
  <tr>
    <th align="center" scope="row">
    
     <br />
     <table width="70%" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
        <tr>
          <th colspan="3" align="left" bgcolor="#FFFF99" scope="row">
		  <?
if($order_tc==1){
		$sql="select * from tbl_payment as a,tbl_order as b, tbl_r_prefecture as c, tbl_r_province as d, tbl_r_district as e, tbl_order_lists as g, tbl_r_postcode as h where a.order_id=$order_id and b.order_tc=1 and a.order_id=b.order_id and b.order_id=g.order_id and b.prefecture_id=c.prefecture_id and b.province_id=d.province_id and b.district_id=e.district_id and b.postcode=h.prefecture_id";
		$qry=mysql_query($sql);
		$db=mysql_fetch_array($qry);
		}else{
		$sql1="select * from tbl_credit as a, tbl_order as b, tbl_r_prefecture as c, tbl_r_province as d, tbl_r_district as e, tbl_order_lists as g, tbl_r_postcode as h where a.order_id=$order_id and b.order_tc=2 and a.order_id=b.order_id and b.order_id=g.order_id and b.prefecture_id=c.prefecture_id and b.province_id=d.province_id and b.district_id=e.district_id and b.postcode=h.prefecture_id";
		$qry=mysql_query($sql1);
		$db=mysql_fetch_array($qry);
	}
	$names=$db['newname'];
	$add=$db['address_send'];
	$district_id=$db['district_name'];
	$prefecture=$db['prefecture_name'];
	$province=$db['province_name'];
	$postcode=$db['postcode'];
	$tel=$db['telephone_send'];
	$mail=$db['mail_send'];
	$orderid=$db['order_id'];
	$tranfersdate=$db['payment_date'];
	$teanfers_money=$db['payment_money'];
	$teanfers_time=$db['payment_time'];
	$tran_id=$db['payment_id'];
	$order_tc=$db['order_tc'];
	$customer=$db['customer_id'];
	
$credit_number=$db['credit_number'];
$credit_code=$db['credit_code'];
$credit_expm=$db['credit_expm'];
$credit_expy=$db['credit_expy'];
$credit_name=$db['credit_name'];
$credit_bank=$db['credit_bank'];
$credit_money=$db['credit_money'];
$credit_type=$db['credit_type'];
$credit_date=$db['credit_date'];

	
	?>
          
          
          
          
          <table width="424" border="0" align="left" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="60" align="left"><span class="fontsize1">รหัสลูกค้า</span></td>
                    <td width="346" align="left"><span class="fontsize1">
                      : <?=$customer?>
                    </span></td>
                  </tr>
                  <tr>
                    <td align="left"><span class="fontsize1">ชื่อลูกค้า</span></td>
                    <td align="left"><span class="fontsize1">
                      : <?=$names?>
                    </span></td>
                  </tr>
                  <tr>
                    <td align="left"><span class="fontsize1">ที่อยู่</span></td>
                    <td align="left"><span class="fontsize1">
                      : <?=$add?>
                      ต.
                      <?=$district?>
                      อ.
                      <?=$prefecture?>
                      จ.
                      <?=$province?>
                      
                      <?=$postcode?>
                      </span></td>
                  </tr>
            </table>
          
          </th>
          <td width="199" colspan="2" align="right" bgcolor="#FFFF99">
          
          <table width="184" border="0" align="right" cellpadding="0" cellspacing="0" class="fontsize1">
                  <tr align="left">
                    <th width="77" scope="row">รหัสการสั่งซื้อ</th>
                    <th width="107" scope="row"> : <?=$order_id?>                      </th>
                  </tr>
                  <tr>
                    <th align="left" scope="row">วันที่สั่งซื้อ</th>
                    <th align="left" scope="row">:
                    <? if($order_tc ==1){?><?=shotdate($tranfersdate)?>
		  <? }else{?><?=shotdate($credit_date)?><? }?></th>
                  </tr>
            </table>
          
          </td>
        </tr>
      </table>
     <br />
      <?
      	$sql="select * from tbl_order as a, tbl_order_lists as b, tbl_product as c where a.order_id=b.order_id and b.product_id=c.product_id and a.order_id='$order_id'";
		$qry=mysql_query($sql);
		$numrow=mysql_num_rows($qry);
	  ?>
      
      
        <table width="70%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
          <tr>
            <td width="93" align="center" bgcolor="#FFFF99" class="fontsize1">ลำดับ</td>
            <td width="93" align="center" bgcolor="#FFFF99"><span class="fontsize1">รหัสสินค้า</span></td>
            <td width="234" align="center" bgcolor="#FFFF99"><span class="fontsize1">รายการสินค้า</span></td>
            <td width="56" align="center" bgcolor="#FFFF99"><span class="fontsize1">จำนวน:ชิ้น</span></td>
            <td width="137" align="center" bgcolor="#FFFF99"><span class="fontsize1">ราคา:หน่วย(บาท)</span></td>
            <td width="89" align="center" bgcolor="#FFFF99"><span class="fontsize1">ราคารวม(บาท)</span></td>
          </tr>
         
          <?
	  
		while($db=mysql_fetch_array($qry)){
			
			
			$sumprice=$db['order_unit']*$db['product_price'];
			$sumtotal=$sumtotal+$sumprice;
			$total=$sumtotal+50;
			$no++;
			?>
          <tr>
            <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
              <?=$no?>
            </span></td>
            <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=$db['product_id']?>
            </span></td>
            <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=$db['product_name']?>
            </span></td>
            <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=$db['order_unit']?>
            </span></td>
            <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=number_format($db['product_price'])?>
            </span></td>
            <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=number_format($sumprice)?>
            </span></td>
          </tr>
          
           <? }?>
           
            <?  $sqla="select * from tbl_order as a,tbl_paper as b where a.paper_id = b.paper_id and order_id=$order_id ";	
			$qrya=mysql_query($sqla);
			$dba=mysql_fetch_array($qrya);
			$paper_pic=$dba['paper_pic'];
			$paper_id=$dba['paper_id'];?>
              
                 <? if($paper_id==0){} else {?> 
					 <tr>
					   <td align="center" bgcolor="#FFFFFF" class="fontsize1">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">
                ลายกระดาษห่อของขวัญลายที่ <?=$dba['paper_id']?>
                </td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">-</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">-</td>
        </tr>
              
					 <? }?>
                     
                     
                      <?
           $sqla="select * from tbl_order as a,tbl_ribbon as b where a.ribbon_id = b.ribbon_id and order_id=$order_id ";	
			$qrya=mysql_query($sqla);
			$dba=mysql_fetch_array($qrya);
			$ribbon_pic=$dba['ribbon_pic'];
			$ribbon_id=$dba['ribbon_id'];
			?>
                     
                     
                     
                     
                     
                        <? if($ribbon_id==0){} else {?> 
					 <tr>
					   <td align="center" bgcolor="#FFFFFF" class="fontsize1">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">
                ลายโบว์ลายที่ <?=$dba['ribbon_id']?>
                </td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">-</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">-</td>
        </tr>
              
					 <? }?>
          
          <tr>
            <td colspan="5" align="right" bgcolor="#FFFF99"><span class="fontsize1">รวมราคาสินค้า</span></td>
            <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=number_format($sumtotal)?>
            </span></td>
          </tr>
          
          
          
          
          
       
          <tr>
            <td colspan="5" align="right" bgcolor="#FFFF99" class="fontsize1">ภาษี</td>
            <td align="center" bgcolor="#FFFFFF" class="fontsize1">-</td>
          </tr>
          <tr>
            <td colspan="5" align="right" bgcolor="#FFFF99" class="fontsize1">ค่าจัดส่ง</td>
            
            
            <td align="center" bgcolor="#FFFFFF" class="fontsize1"><?  if($sumtotal<300){  echo "50"; ?> <? }else{echo "-";}    ?></td>
            
            
          </tr>
        
	 
          <td colspan="5" align="right" bgcolor="#FFFF99"><span class="fontsize1">ราคาสุทธิ</span></td>
            <td align="center" bgcolor="#FFFF99"><span class="fontsize1">
          <?
		 if($sumtotal>=300){
				echo number_format($sumtotal);
			  }else{
				echo number_format($total); 
			  } 
		 
		?>
		
            </span></td>
          </tr>
      </table>
        <br />    
      <table width="70%" border="0" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
        <tr>
        <th width="296" align="center" scope="row"><table width="250" border="0" cellpadding="0" cellspacing="0">
            <tr class="fontsize1">
              <th width="106" scope="row">วิธีชำระเงิน :</th>
              <td><? if ($dba['order_tc'] ==1){echo "ชำระเงินผ่านการโอนเงิน";}else{echo "ชำระเงินผ่าน บัตรเครดิต";}?></td>
              </tr>
          </table></th>
        <td width="305" align="center"><table width="253" border="0" cellpadding="0" cellspacing="0">
          <tr class="fontsize1">
            <th width="65" scope="row">ผู้รับเงิน</th>
            <td width="22">&nbsp;</td>
            <td width="115">จักรกฤช เอี่ยมสอาด</td>
            <td width="39">&nbsp;</td>
            <td width="12">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
  </table>
    <br /></th>
  </tr>
</table>
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="row"><input type="button" name="button" id="button2" value="พิมพ์" onclick="javascript:window.print()" />
    <input name="Submit" type="button"  onclick="javascript:window.close()" value="ปิด" align="middle" /></th>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
