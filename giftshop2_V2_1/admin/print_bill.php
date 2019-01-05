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
a:link {
	color: #000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000;
}
a:hover {
	text-decoration: underline;
	color: #999;
}
a:active {
	text-decoration: none;
}
.fontsize1 {
	font-size: 12px;
}
</style>
<style type="text/css" media="print">
input{
	display:none;
}
</style>
</head>

<body>
<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th height="134" scope="row">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <th width="276" scope="row"><br />            <img src="../images/g1.png" width="105" height="93" /></th>
          <th width="368" scope="row">www.giftshop.in.th<br />
14/106 ม.2 ต.ลำผักกูด อ.ธัญบุรี จ.ปทุมธานี<br />
0826574298</th>
          <th width="277" scope="row"><br /></th>
        </tr>
      </table>
    <p>ใบสั่งซื้อสินค้า</p></th>
  </tr>
  <tr>
    <th scope="row">
    
    <?
      
	 
	   $sql="select * from tbl_order as a,tbl_order_lists as b,tbl_product as c where a.order_id=b.order_id and b.product_id=c.product_id and a.order_id='$order_id'";
	 
	 
		$qry=mysql_query($sql);
		$numrow=mysql_num_rows($qry);
	  
	  ?>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" scope="row">วันที่พิมพ์รายงาน
          <?=shotdate($today);?></td>
        <td align="right">เวลาที่พิมพ์ <? echo date("H:i:s")?> น.</td>
      </tr>
    </table>
<br />
      <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
        <tr>
          <th width="422" bgcolor="#FFCC66" scope="row"><span class="fontsize1">ข้อมูลการสั่งซื้อ</span></th>
        </tr>
      </table>
      <br />
      
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
          <tr>
            <td height="20" colspan="6" align="right" bgcolor="#FFCC66"><span class="fontsize1">รหัสการสั่งซื้อ:
            <?=$order_id?>
            </span></td>
          </tr>
          <tr>
            <td width="93" align="center" bgcolor="#FFCC66" class="fontsize1">ลำดับ</td>
            <td width="234" align="center" bgcolor="#FFCC66"><span class="fontsize1">รหัสสินค้า</span></td>
            <td width="234" align="center" bgcolor="#FFCC66"><span class="fontsize1">รายการสินค้า</span></td>
            <td width="56" align="center" bgcolor="#FFCC66"><span class="fontsize1">จำนวน:ชิ้น</span></td>
            <td width="137" align="center" bgcolor="#FFCC66"><span class="fontsize1">ราคา:หน่วย(บาท)</span></td>
            <td width="89" align="center" bgcolor="#FFCC66"><span class="fontsize1">ราคารวม(บาท)</span></td>
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
          <?
		}
	?>
    
      
                 <?  $sqla="select * from tbl_order as a,tbl_paper as b where a.paper_id = b.paper_id and order_id=$order_id ";	
			$qrya=mysql_query($sqla);
			$dba=mysql_fetch_array($qrya);
			$paper_pic=$dba['paper_pic'];
			$paper_id=$dba['paper_id'];?>
              
                 <? if($paper_id==0){} else {
					?> 
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
                     
                     
                     
                     
                     
                        <? if($ribbon_id==0){} else {
					?> 
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
            <td colspan="5" align="right" bgcolor="#FFFFFF"><span class="fontsize1">รวมราคาสินค้า</span></td>
            <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=number_format($sumtotal)?>
            </span></td>
          </tr>
        
          <tr class="fontsize1">
            <td colspan="5" align="right" bgcolor="#FFFFFF">ภาษี</td>
            <td align="center" bgcolor="#FFFFFF">-</td>
          </tr>
          <tr class="fontsize1">
        <td colspan="5" align="right" bgcolor="#FFFFFF">ค่าจัดส่ง</td>
        
        
        <td align="center" bgcolor="#FFFFFF"><?  if($sumtotal<300){  echo "50"; ?>
          <? }else{echo "-";}    ?></td>
      
        
      </tr>
        
          <td colspan="5" align="right" bgcolor="#FFFFFF"><span class="fontsize1">ราคาสุทธิ</span></td>
            <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
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
      <?
 $sqla="select * from tbl_order as a, tbl_r_prefecture as b, tbl_r_province as c, tbl_r_district as d  , tbl_r_postcode as e where a.order_id=$order_id and a.prefecture_id=b.prefecture_id and a.province_id=c.province_id and a.district_id=d.district_id and a.district_id=d.district_id ";
	$qrya=mysql_query($sqla);
	$dba=mysql_fetch_array($qrya);
	$add=$dba['address_send'];
	$tel=$dba['telephone_send'];
	$mail=$dba['mail_send'];
	$names=$dba['newname'];
	$prefecture=$dba['prefecture_name'];
	$district=$dba['district_name'];
	$province=$dba['province_name'];
	$postcode=$dba['postcode'];
	$paper_pic=$dba['paper_pic'];
	$ribbon_pic=$dba['ribbon_pic'];
	

	
	?>
      <br />
      
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
          <tr>
            <td colspan="2" align="center" bgcolor="#FFCC66"><span class="fontsize1">ข้อมูลการจัดส่งสินค้า</span></td>
          </tr>
          <tr>
            <td width="166" align="right" bgcolor="#FFFFFF"><span class="fontsize1">ชื่อ - นามสกุล</span></td>
            <td width="713" align="left" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=$names?>            
            </span></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#FFFFFF"><span class="fontsize1">เบอร์โทร</span></td>
            <td align="left" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=$tel?>            
            </span></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#FFFFFF"><span class="fontsize1">อีเมล์</span></td>
            <td align="left" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=$mail?>            
            </span></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#FFFFFF"><span class="fontsize1">ที่อยู่การจัดส่ง</span></td>
            <td align="left" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=$add?>            
            <?=$district?>
            <?=$prefecture?>
            <?=$province?>
            <?=$postcode?>
            </span></td>
          </tr>
        </table>
        <p><span class="fontsize1">
          <input type="button" name="button" id="button2" value="พิมพ์" onclick="javascript:window.print()" />
    </span><input name="Submit" type="button"  onclick="javascript:window.close()" value="ปิด" align="middle" /></p></th>
  </tr>
</table>
</body>
</html>