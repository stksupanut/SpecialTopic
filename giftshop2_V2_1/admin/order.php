<?
    switch($mode){
		
	
	case bill :
	$sql="select * from tbl_order as a,tbl_order_lists as b,tbl_product as c where a.order_id=b.order_id and b.product_id=c.product_id and a.order_id='$order_id'";
	 
	 
		$qry=mysql_query($sql);
		$numrow=mysql_num_rows($qry);
	  
	  ?>
      <style type="text/css">
.sizemain1 {
	font-size: 12px;
}
.red {
	color: #F00;
}
.fontsize1 {font-size: 12px;
}
      </style>
       <br />
       <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <th width="639" scope="row">
      <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
        <tr>
        <td height="50" colspan="5" align="right" bgcolor="#FFCC66"><span class="sizemain1">รหัสการสั่งซื้อ:
          <?=$order_id?>        
        </span></td>
        </tr>
      <tr>
        <td width="93" align="center" bgcolor="#FFCC66"><span class="sizemain1">รหัสสินค้า</span></td>
        <td width="234" align="center" bgcolor="#FFCC66"><span class="sizemain1">รายการสินค้า</span></td>
        <td width="56" align="center" bgcolor="#FFCC66"><span class="sizemain1">จำนวน (ชิ้น)</span></td>
        <td width="137" align="center" bgcolor="#FFCC66"><span class="sizemain1">ราคา:หน่วย (บาท)</span></td>
        <td width="89" align="center" bgcolor="#FFCC66"><span class="sizemain1">ราคารวม (บาท)</span></td>
        </tr>
      
    
        <?
	 
		while($db=mysql_fetch_array($qry)){
			
		$sumprice=$db['order_unit']*$db['product_price'];
			$sumtotal=$sumtotal+$sumprice;
			// $total=$sumtotal+50;
		?>
        
      <tr>
        <td align="center" bgcolor="#FFFFFF">          <span class="sizemain1">
          <?=$db['product_id']?>        
          </span></td>
        <td align="center" bgcolor="#FFFFFF">          <span class="sizemain1">
          <?=$db['product_name']?>        
          </span></td>
        <td align="center" bgcolor="#FFFFFF">          <span class="sizemain1">
          <?=$db['order_unit']?>        
          </span></td>
        <td align="center" bgcolor="#FFFFFF">          <span class="sizemain1">
          <?=number_format($db['product_price'])?>        
          </span></td>
        <td align="center" bgcolor="#FFFFFF">          <span class="sizemain1">
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
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">
                ลายโบว์ลายที่ <?=$dba['ribbon_id']?>
                </td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">-</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">-</td>
              </tr>
              
					 <? }?>
    
      <tr>
        <td colspan="4" align="right" bgcolor="#FFCC66"><span class="sizemain1"><span class="fontsize1">รวมราคาสินค้า</span></span></td>
        <td align="center" bgcolor="#FFFFFF">          <span class="sizemain1">
          <?=number_format($sumtotal)?>        
          </span></td>
        </tr>
     
      <tr>
        <td colspan="4" align="right" bgcolor="#FFCC66" class="sizemain1">ภาษี</td>
        <td align="center" bgcolor="#FFFFFF">
          <span class="sizemain1">
            <? 
        $tax = $sumtotal*1.07;
        $tax2 = $tax-$sumtotal;
        echo number_format($tax2,2);
         ?>
          </span></td>
      </tr>
      <tr>
        <td colspan="4" align="right" bgcolor="#FFCC66"><span class="sizemain1">ค่าจัดส่ง</span></td>
        
        
        <td align="center" bgcolor="#FFFFFF" class="sizemain1"><?  if($sumtotal<300){  echo "50"; ?>
          <? }else{echo "-";}    ?></td>
      
        
      </tr>
        
     
        <td colspan="4" align="right" bgcolor="#FFCC66"><span class="sizemain1">ราคาสุทธิ</span></td>
        <td align="center" bgcolor="#FFFFFF">		  <span class="sizemain1">
          <?
		 if($sumtotal>=300){
				echo number_format($tax,2);
			  }else{
				echo number_format($tax+50,2); 
			  } 
		 
		?>		 
          </span></td>
        
        
      </tr>
        
      </table>
		<?
		
		
    $sqla="select * from tbl_order as a, tbl_r_prefecture as b, tbl_r_province as c, tbl_r_district as d, tbl_r_postcode as e where a.order_id=$order_id and a.prefecture_id=b.prefecture_id and a.province_id=c.province_id and a.district_id=d.district_id	and a.postcode=e.prefecture_id";
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
<style type="text/css">
.fontsize1 {
	font-size: 12px;
}
</style>
<br />

          <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
        <tr>
          <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">ข้อมูลการจัดส่งสินค้า</span></td>
        </tr>
        <tr>
          <td width="191" align="left" bgcolor="#FFCC66"><span class="sizemain1">ชื่อ - นามสกุล</span></td>
          <td width="1047" bgcolor="#FFFFFF">            <span class="sizemain1">
            <?=$names?>          
          </span></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#FFCC66"><span class="sizemain1">เบอร์โทร</span></td>
          <td bgcolor="#FFFFFF">            <span class="sizemain1">
            <?=$tel?>          
          </span></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#FFCC66"><span class="sizemain1">อีเมล์</span></td>
          <td bgcolor="#FFFFFF">            <span class="sizemain1">
            <?=$mail?>          
          </span></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#FFCC66"><span class="sizemain1">ที่อยู่การจัดส่ง</span></td>
          <td bgcolor="#FFFFFF">            <span class="sizemain1">
            <?=$add?>          
            <?=$district?>
            <?=$prefecture?>
            <?=$province?>
            <?=$postcode?>
          </span></td>
        </tr>
        <tr>
          <td colspan="5" align="center" bgcolor="#FFCC66"><span class="sizemain1"><a href="print_bill.php?order_id=<?=$order_id?>" target="_blank"><img src="../images/print-icon.png" width="48" height="48" /></a></span></td>
        </tr>
</table>
      </th>
        </tr>
      </table>
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="row"><a href="main.php?module=order" class="button cyan"><img src="../images/back-icon.png" width="48" height="48" /></a></th>
  </tr>
</table>   
    
		<?
		break;
		
		case edit :
		if($action=="yes"){
			 $sql="update tbl_order set delivery_id='$delivery_id' where order_id=$order_id";
			mysql_query($sql);
		
		
				echo "<script language=\"JavaScript\"> alert('บันทึกข้อมูลเรียบร้อยแล้ว') </script>";
				echo "<meta http-equiv='refresh' content='0;URL=main.php?module=$module'>";
				exit;  
		}
		
		$sql="select * from tbl_order where order_id='$order_id'";
		$qry=mysql_query($sql);
		$db=mysql_fetch_array($qry);
		
		?>
		<br />
			<form id="form1" name="form1" method="post" action="">
			<table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr>
    <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">แก้ไขหมายเลขส่งของ</span></td>
    </tr>
  <tr>
    <td width="140"><span class="sizemain1">หมายเลขส่งของ</span></td>
    <td width="1098" bgcolor="#FFFFFF"><span class="sizemain1">
      <input name="delivery_id" type="text" id="delivery_id" maxlength="13" value="<?=$db['delivery_id']?>"/>
    </span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><span class="sizemain1">
      <input type="submit" name="button" id="button" value="ตกลง"/>
     <input type="hidden" name="action" value="yes"/>
    </span></td>
    </tr>
        </table>
			</form>
			
			<?
		break;
		
		
		case update :
			if($action=="yes"){
			$sql="update tbl_order set delivery_id='$delivery_id',order_status=4 where order_id=$order_id";
			mysql_query($sql);
		
		
				echo "<script language=\"JavaScript\"> alert('บันทึกข้อมูลเรียบร้อยแล้ว') </script>";
				echo "<meta http-equiv='refresh' content='0;URL=main.php?module=$module'>";
				exit;  
		}
		
		$sql="select * from tbl_order where order_id='$order_id'";
		
		?>
        <style type="text/css">
.sizemain1 {
	font-size: 12px;
}
.red {
	color: #F00;
}
</style>
        <form id="form1" name="form1" method="post" action="">
          <br />
        <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr>
    <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">ใส่หมายเลขส่งของ</span></td>
    </tr>
  <tr>
    <td width="140"><span class="sizemain1">หมายเลขส่งของ</span></td>
    <td width="1098" bgcolor="#FFFFFF"><span class="sizemain1">
      <input name="delivery_id" type="text" id="delivery_id" maxlength="13" />
    </span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><span class="sizemain1">
      <input type="submit" name="button" id="button" value="ตกลง"/>
     <input type="hidden" name="action" value="yes"/>
    </span></td>
    </tr>
        </table>

</form>

    
<?
break;
default;
    $sql="select * from tbl_order as a,tbl_customer as b where a.customer_id=b.customer_id order by order_id desc";
	$qry=mysql_query($sql);
	$numrow=mysql_num_rows($qry);
	
	?>
    
    
    <? $datexpire = date ("Y-m-d", strtotime("+3 day", strtotime($db['order_date']))); ?>
    
    
 <style type="text/css">
.sizemain1 {
	font-size: 12px;
}
.red {
	color: #F00;
}
</style>
 <br />
<table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
      <tr>
        <td width="40" align="center" bgcolor="#FFCC66" class="sizemain1">ลำดับ</td>
        <td width="82" align="center" bgcolor="#FFCC66"><span class="sizemain1">รหัสการสั่งซื้อ</span></td>
        <td width="108" align="center" bgcolor="#FFCC66" class="sizemain1">ชื่อผู้สั่งซื้อ</td>
        <td width="94" align="center" bgcolor="#FFCC66"><span class="sizemain1">วันที่สั่งซื้อ</span></td>
        <td width="208" align="center" bgcolor="#FFCC66"><span class="sizemain1">สถานะ</span></td>
        <td width="75" align="center" bgcolor="#FFCC66" class="sizemain1">ตรวจสอบ</td>
        <td width="114" align="center" bgcolor="#FFCC66"><span class="sizemain1">หมายเลขส่งของ</span></td>
        <td width="136" align="center" bgcolor="#FFCC66"><span class="sizemain1">จัดการ</span></td>
        <td width="97" align="center" bgcolor="#FFCC66"> <span class="sizemain1">พิมพ์ใบเสร็จรับเงิน</span></td>
  </tr>
      
      <? if($numrow==0){
      ?>
      
      <tr>
        <td colspan="9" bgcolor="#FFFFFF"><span class="sizemain1">ไม่มีรายการสั่งซื้อ</span></td>
  </tr>
        
        <?
	  }else{
		  
		  while($db=mysql_fetch_array($qry)){
			    switch($db['order_status']){
				case 0: $textstatus="ได้รับข้อมูลสั่งซื้อแล้ว"; break;
				case 1: $textstatus="ชำระเงินเรียบร้อยแล้ว"; break;
				case 2: $textstatus="ยากลิกรายการสั่งซื้อ"; break;
				case 3: $textstatus="ยกเลิกรายการสั่งซื้อ"; break;
				case 4: $textstatus="จัดส่งสินค้าเรียบร้อยแล้ว"; break;
				case 5: $textstatus="รอการตรวจสอบจากธนาคาร"; break;
				case 6: $textstatus="ธนาคารไม่อนุมัติ"; break;
				}
				$no++;
		?>
      <tr>
        <td align="center" bgcolor="#FFFFFF"><span class="sizemain1">
          <?=$no?>
        </span></td>
        <td align="center" bgcolor="#FFFFFF"><span class="sizemain1">
        <?=$db['order_id']?>
        </span></td>
        <td align="center" bgcolor="#FFFFFF"><span class="sizemain1">
          <?=$db['customer_name']?>
        </span></td>
        <td align="center" bgcolor="#FFFFFF"><span class="sizemain1">
        <?=shotdate($db['order_date'])?>
        </span></td>
        <td align="center" bgcolor="#FFFFFF"><span class="sizemain1">
        <?=$textstatus?>
        </span></td>
        <td align="center" bgcolor="#FFFFFF">
        
          <span class="sizemain1"><a href="main.php?module=order&mode=bill&order_id=<?=$db['order_id']?>">ดูข้อมูล</a>
        
        </span></td>
        <td align="center" bgcolor="#FFFFFF"><span class="sizemain1">
        <?=$db['delivery_id']?>
        </span></td>
       <td align="center" bgcolor="#FFFFFF">
       
         <span class="sizemain1">
         <?
		if($db['order_status']==1){?>
         <a href="main.php?module=order&mode=update&order_id=<?=$db['order_id']?>">เพิ่ม หมายเลขส่งของ</a>
		<? }elseif ($db['order_status']==4){?>
       		<a href="main.php?module=order&mode=edit&order_id=<?=$db['order_id']?>">แก้ไข หมายเลขส่งของ</a>
        <? }else{echo "-";}?>
        </span></td>
       <td align="center" bgcolor="#FFFFFF">
       
       <?
		if($db['order_status']==1 || $db['order_status']==4) {
			?>
			<a href="print_receipt.php?order_id=<?=$db['order_id']?>&order_tc=<?=$db['order_tc']?>" target="_blank"><img src="../images/print-icon.png" width="35" height="35" /></a>			<?
			
				}else{echo "-";}
		?>
       
       </td>
      </tr>
      
      <?
		  }
	  }
	  ?>
      
    </table>
    <?
	}
	?>
