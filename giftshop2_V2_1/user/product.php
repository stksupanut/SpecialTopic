<script language="javascript">
function fncSubmit()
{
	
if(document.form1.category_id.value == "")
{
alert('กรุณาเลือกหมวดหมู่สินค้า');
document.form1.category_id.focus();
return false;
}
	
if(document.form1.product_name.value == "")
{
alert('กรุณากรอกชื่อสินค้า');
document.form1.product_name.focus();
return false;
}

if(document.form1.product_price.value == "")
{
alert('กรุณากรอกราคาสินค้า');
document.form1.product_price.focus();
return false;
}

if(document.form1.product_unit.value == "")
{
alert('กรุณากรอกจำนวนสินค้า');
document.form1.product_unit.focus();
return false;
}

if(document.form1.product_detail.value == "")
{
alert('กรุณากรอกรายละเอียดสินค้า');
document.form1.product_detail.focus();
return false;
}


if(document.form1.fileField.value == "")
{
alert('กรุณาเลือกรูปสินค้า');
document.form1.fileField.focus();
return false;
}


}
</script>

<?
/*
SELECT * FROM `tbl_product` WHERE `product_id`, `product_name`, `product_pic`, `product_price`, `product_detail`, `category_id`, `deleted`, `isenable`, `datecreated`
*/
$product_id=$_REQUEST['product_id'];
$product_name=$_REQUEST['product_name'];
$product_price=$_REQUEST['product_price'];
$product_detail=$_REQUEST['product_detail'];
$product_unit=$_REQUEST['product_unit'];
$category_id=$_REQUEST['category_id'];
$category_id2=$_REQUEST['category_id2'];
$subcategory_id=$_REQUEST['subcategory_id'];
$keyword=$_REQUEST['keyword'];
?>

<?
switch($mode){
	case insert :
	
	if($action=="yes"){
		
		$sql="select * from tbl_product where product_name='$product_name' ";
		$qry=mysql_query($sql);
		$check=mysql_num_rows($qry);
		
		if($check>0){
			echo "<script language=\"javascript\">alert('มีข้อมูลชื่อสินค้านี้อยู่ในฐานข้อมูลแล้ว');</script>";
			echo "<meta http-equiv='refresh' content='1;URL=main.php?module=$module&mode=insert'>";
			exit;
			
		}		
		
		if($_FILES['fileField']['name']!=''){
		$type=strchr($_FILES['fileField']['name'],".");
		$newnamefiles="".date('ymdhis').$type;
		//ใข้ move_uploaded_file แทน copy ได้
		copy($_FILES['fileField']['tmp_name'],"../images/product/".$newnamefiles."");
			
		}
		
		
		$sql="insert into tbl_product(`product_name`,`product_pic`,`product_price`,`product_unit`,`product_detail`,`category_id`,`subcategory_id`,`product_date`,`product_status` ) values('$product_name','$newnamefiles','$product_price','$product_unit','$product_detail','$category_id','$subcategory_id',now(),1)";
	mysql_query($sql,$conn);
		
		/*echo "<script language=\"javascript\">alert('เพิ่มข้อมูลเรียบร้อยแล้ว');</script>";*/
		echo "<meta http-equiv='refresh' content='1;URL=main.php?module=product&mode=alert&c=1'>";
		exit;
		
	}
	
	
?>
<style type="text/css">
.red {
	color: #F00;
}
.sizemain1 {
	font-size: 12px;
}
</style>



<form action="main.php?module=<?=$module?>" method="post" enctype="multipart/form-data" name="form1" onSubmit="JavaScript:return fncSubmit();">
  <br />
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
    <tr>
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">เพิ่มสินค้า</span></td>
    </tr>
   
    <tr>
      <td><span class="sizemain1">หมวดหมู่</span></td>
      <td bgcolor="#FFFFFF">
         <span class="sizemain1">
         <select name="category_id" id="category_id" onchange="window.location.href='main.php?module=<?=$module?>&mode=<?=$mode?>&category_id='+this.value">
           <!-- window.location.href='index.php?category_id='+this.value  ส่วนตรงนี้แหระครับที่ เมื่อเลือกแล้วมันจะส่งค่าให้โดยไม่ต้องกด  submit -->
           <option value="">เลือกประเภทสินค้า</option>
           <?
        $sqla="select * from  tbl_category where category_status=1 ";
		$qrya=mysql_query($sqla);
		while($dba=mysql_fetch_array($qrya)){
		if($category_id==$dba['category_id']) 
		{ $selected="selected"; }else{ $selected=""; }
		?>
           <option <?=$selected?> value="<?=$dba['category_id']?>">
           <?=$dba['category_name']?>
           </option>
           <?
		}
		?>
         </select>
    
         <select name="subcategory_id" id="subcategory_id">
           <option value="">หมวดสินค้าย่อย</option>
           <?
		if($category_id !=''){
			$cate="where category_id=$category_id";
		}else{
			$cate="";	
		}
        $sqla="select * from  tbl_subcategory $cate ";
		$qrya=mysql_query($sqla);
		while($dba=mysql_fetch_array($qrya)){
		if($subcategory_id==$dba['subcategory_id']) 
		{ $selected="selected"; }else{ $selected=""; }
		?>
           <option <?=$selected?> value="<?=$dba['subcategory_id']?>">
           <?=$dba['subcategory_name']?>
           </option>
           <?
		}
		?>
         </select>
      </span></td>
    </tr>
     <tr>
      <td width="140"><span class="sizemain1">ชื่อสินค้า</span></td>
      <td width="1098" bgcolor="#FFFFFF">
        <span class="sizemain1">
        <input type="text" name="product_name" id="product_name">
       </span></td>
    </tr>
    <tr>
      <td><span class="sizemain1">ราคาสินค้า</span></td>
      <td bgcolor="#FFFFFF">
        <span class="sizemain1">
        <input type="text" name="product_price" id="product_price" OnKeyPress="return chkNumber(this)"> 
      </span></td>
    </tr>
    <tr>
      <td><span class="sizemain1">จำนวนสินค้า</span></td>
      <td bgcolor="#FFFFFF"><span class="sizemain1">
        <input type="text" name="product_unit" id="product_unit" OnKeyPress="return chkNumber(this)" />
      </span></td>
    </tr>
    <tr>
      <td><span class="sizemain1">รายละเอียดสินค้า</span></td>
      <td bgcolor="#FFFFFF">
        <span class="sizemain1">
        <textarea name="product_detail" id="product_detail" cols="45" rows="5"></textarea>
      </span></td>
    </tr>
    <tr>
      <td><span class="sizemain1">รูปภาพ</span></td>
      <td bgcolor="#FFFFFF">      <span class="sizemain1">
        <input type="file" name="fileField" id="fileField">
      </span></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">
        <input type="submit" name="button" id="button" value="ตกลง">
      <input type="hidden" name="action" value="yes"/>
      <input type="hidden" name="mode" value="insert"/>
      </span></td>
    </tr>
  </table>
</form>
<?
break;
	case update :
	
	if($action=="yes"){
		
		if($_FILES['fileField']['name']!=''){
		$type=strchr($_FILES['fileField']['name'],".");
		$newnamefiles="".date('ymdhis').$type;
		//ใข้ move_uploaded_file แทน copy ได้
		copy($_FILES['fileField']['tmp_name'],"../images/product/".$newnamefiles."");
		
		$newpic=",product_pic='$newnamefiles'";
		}else{
			$newpic="";
			
			}
	
	if($product_unit==0){
			$sqlunit="update tbl_product set product_name='$product_name',category_id='$category_id',product_price='$product_price',product_detail='$product_detail',product_unit='$product_unit',subcategory_id='$subcategory_id',product_status='2' $newpic where product_id='$product_id' ";
	mysql_query($sqlunit);
		}else{
	
	$sql="update tbl_product set product_name='$product_name',category_id='$category_id',product_price='$product_price',product_detail='$product_detail',product_unit='$product_unit',subcategory_id='$subcategory_id',product_status='1' $newpic where product_id='$product_id' ";
	mysql_query($sql);
		}
	/*	echo "<script language=\"javascript\">alert('แก้ไขข้อมูลเรียบร้อยแล้ว');</script>";*/
		echo "<meta http-equiv='refresh' content='1;URL=main.php?module=product&mode=alert&c=2'>";
		exit;
	}
	
	$sql="select * from tbl_product where product_id='$product_id'";
	$qry=mysql_query($sql);
	$db=mysql_fetch_array($qry);
	
	$subcategory_id=$db['subcategory_id'];
	$category_id=$db['category_id'];
	
	       if($category_id2 !=''){
			$scate=$category_id2;
			 }else{
			$scate=$category_id;	 
				 }
?>
<style type="text/css">
.red {
	color: #F00;
}
.sizemain1 {
	font-size: 12px;
}
</style>
<form action="main.php?module=<?=$module?>" method="post" enctype="multipart/form-data" name="form1">
  <br />
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
    <tr>
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">แก้ไขสินค้า</span></td>
    </tr>
    <tr>
      <td width="138"><span class="sizemain1">ชื่อสินค้า</span></td>
      <td width="1100" bgcolor="#FFFFFF">
        <span class="sizemain1">
        <input type="text" name="product_name" id="product_name" value="<?=$db['product_name']?>">
      </span></td>
    </tr>
    <tr>
      <td><span class="sizemain1">หมวดหมู่</span></td>
      <td bgcolor="#FFFFFF">
         <span class="sizemain1">
         <select name="category_id" id="category_id" onchange="window.location.href='main.php?module=<?=$module?>&mode=<?=$mode?>&product_id=<?=$db['product_id']?>&category_id2='+this.value">
           <!-- window.location.href='index.php?category_id='+this.value  ส่วนตรงนี้แหระครับที่ เมื่อเลือกแล้วมันจะส่งค่าให้โดยไม่ต้องกด  submit -->
           <option value="">เลือกประเภทสินค้า</option>
           <?
        
		$sqla="select * from  tbl_category where category_status=1 ";
		$qrya=mysql_query($sqla);
		while($dba=mysql_fetch_array($qrya)){
		
		if($scate==$dba['category_id']) 
		{ $selected="selected"; }else{ $selected=""; }
		?>
           <option <?=$selected?> value="<?=$dba['category_id']?>">
           <?=$dba['category_name']?>
           </option>
           <?
		}
		?>
         </select>
    
         <select name="subcategory_id" id="subcategory_id" onchange="window.location.href='main.php?module=<?=$module?>&mode=<?=$mode?>&product_id=<?=$db['product_id']?>&category_id2=<?=$category_id?>&subcategory_id='+this.value">
           <option value="">หมวดสินค้าย่อย</option>
           <?
		if($scate !=''){
			$cate="where category_id=$scate";
		}else{
			$cate="";	
		}
        $sqla="select * from  tbl_subcategory $cate ";
		$qrya=mysql_query($sqla);
		while($dba=mysql_fetch_array($qrya)){
		if($subcategory_id==$dba['subcategory_id']) 
		{ $selected="selected"; }else{ $selected=""; }
		?>
           <option <?=$selected?> value="<?=$dba['subcategory_id']?>">
           <?=$dba['subcategory_name']?>
           </option>
           <?
		}
		?>
         </select>
      </span></td>
    </tr>
    <tr>
      <td><span class="sizemain1">ราคาสินค้า</span></td>
      <td bgcolor="#FFFFFF">
        <span class="sizemain1">
        <input type="text" name="product_price" id="product_price" OnKeyPress="return chkNumber(this)" value="<?=$db['product_price']?>">
      </span></td>
    </tr>
    <tr>
      <td><span class="sizemain1">จำนวนสินค้า</span></td>
      <td bgcolor="#FFFFFF"><span class="sizemain1">
        <input type="text" name="product_unit" id="product_unit" OnKeyPress="return chkNumber(this)" value="<?=$db['product_unit']?>">
      </span></td>
    </tr>
    <tr>
      <td><span class="sizemain1">รายละเอียดสินค้า</span></td>
      <td bgcolor="#FFFFFF">
        <span class="sizemain1">
        <textarea name="product_detail" id="product_detail" cols="45" rows="5"><?=$db['product_detail']?>
        </textarea>
      </span></td>
    </tr>
    <tr>
      <td><span class="sizemain1">รูปภาพ</span></td>
      <td bgcolor="#FFFFFF">
        <span class="sizemain1">
        <? if($db['product_pic']!=''){?>
        <img src="../images/product/<?=$db['product_pic']?>" width="150"/><br /> 
        <? }else{} ?>
		  
		  
		  
		  
      <input type="file" name="fileField" id="fileField">
      </span></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">
        <input type="submit" name="button" id="button" value="แก้ไข">
      <input type="hidden" name="action" value="yes"/>
      <input type="hidden" name="mode" value="update"/>
      <input type="hidden" name="product_id" value="<?=$product_id?>"/>
      </span></td>
    </tr>
  </table>
</form>

<p>



<?
	break;
		case addunit :
		if($action=="yes"){
			$sql="select * from tbl_product where product_id=$product_id";
			$qry=mysql_query($sql);
			
	         /// ส่วนของอัพเดทจำนวนสินค้าคืน 
	$sqlupdate="update tbl_product set product_unit=product_unit+'".$unit."' where product_id='$product_id' ";
			mysql_query($sqlupdate);
								
				echo "<meta http-equiv='refresh' content='1;URL=main.php?module=product&mode=alert&c=3'>";
				exit;
			}	
?>




  <?
break;
	case add :
?>
</p>
<style type="text/css">
.red {
	color: #F00;
}
.sizemain1 {
	font-size: 12px;
}
</style>
<form action="main.php?module=<?=$module?>" method="post" enctype="multipart/form-data" name="form2">
<table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr>
    <th colspan="2" bgcolor="#FFCC66" scope="row"><span class="sizemain1">ซื้อสินค้า</span></th>
  </tr>
  <tr>
    <th width="134" align="left" scope="row"><span class="sizemain1">ชื่อสินค้า</span></th>
    <td width="1104" bgcolor="#FFFFFF"><span class="sizemain1">
      <? 
	
	$sql="select * from tbl_product where product_id=$product_id";
	$qry=mysql_query($sql);
	$db=mysql_fetch_array($qry)
	?>
    <?=$db['product_name']?>
    
    
	</span></td>
  </tr>
  <tr>
    <th align="left" scope="row"><span class="sizemain1">จำนวนที่ซื้อ</span></th>
    <td bgcolor="#FFFFFF"><span class="sizemain1">
      <input name="unit" type="text" id="unit" OnKeyPress="return chkNumber(this)" size="20" maxlength="5"/>
    
    </span></td>
  </tr>
  <tr>
    <th colspan="2" bgcolor="#FFCC66" scope="row">
      <span class="sizemain1">
    <input type="button" name="button3" id="button3" value="ตกลง" />
    <input type="hidden" name="action" value="yes" />
    <input type="hidden" name="mode" value="addunit" />
    <input type="hidden" name="product_id" value="<?=$product_id?>" /><a href="main.php?module=product">
      <input type="button" name="button4" id="button4" value="ยกเลิก" /></a>
      </span></th>
  </tr>
</table></form>

<p>
  <?
break;
	case delete :
	
	
	//ลบสินค้า
	$sql="update tbl_product set product_status=2 where product_id='$product_id'";
	$qry=mysql_query($sql);
	/*echo "<script language=\"javascript\">alert('ลบช้อมูลเรียบร้อยแล้ว');</script>";*/
		echo "<meta http-equiv='refresh' content='1;URL=main.php?module=product&mode=alert&c=4'>";
		exit;
	
	
?>
  
  <?
break;
default:
?>
  <?
if($keyword !=''){
	 $searchname="and a.product_name like '%$keyword%'";
}else{
	 $searchname="";
}

if($category_id !=''){
	$searchcate="and a.category_id='$category_id'";
	}else{
	$searchcate="";	
	}

$sql="select * from tbl_product as a,tbl_category as b where a.category_id=b.category_id $searchname $searchcate order by product_id desc ";
//ทำให้ฐานข้อมูลทำงาน
$qry=mysql_query($sql);
$numrow=mysql_num_rows($qry);
?>
  <br />
<style type="text/css">
.red {
	color: #F00;
}
.sizemain1 {
	font-size: 12px;
}
</style>
<form action="main.php?module=<?=$module?>" method="post">
  <table width="472" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <th width="412" scope="row"><span class="sizemain1">ค้นหา:
        <select name="category_id" id="category_id">
          <option value="">กรุณาเลือกหมวดสินค้า</option>
          <?
        $sqlA="select * from tbl_category where category_status=1";
		$qryA=mysql_query($sqlA);
		while($dbA=mysql_fetch_array($qryA)){
		?>
          <option value="<?=$dbA['category_id']?>">
          <?=$dbA['category_name']?>
          </option>
          <?
		}
		?>
        </select>
    </span>
    
    
    
    
    
<input name="keyword" type="text" />
      <input type="submit" name="button2" id="button2" value="ค้นหา" /></th>
  </tr>
</table>
</form>
<style type="text/css">
.red {
	color: #F00;
}
.sizemain1 {
	font-size: 12px;
}
</style>
<table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
<tr>
  <td colspan="10" bgcolor="#FFFFFF" class="sizemain1"><table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
    <tr class="sizemain1">
      <td width="3%" align="center" bgcolor="#FFCC66"> ลำดับ</td>
      <td width="7%" align="center" bgcolor="#FFCC66">รหัสสินค้า</td>
      <td width="23%" align="center" bgcolor="#FFCC66">รายการสินค้า</td>
      <td width="13%" align="center" bgcolor="#FFCC66">หมวดหมู่</td>
      <td width="4%" align="center" bgcolor="#FFCC66">ราคา</td>
      <td width="13%" align="center" bgcolor="#FFCC66">รูปภาพ</td>
      <td width="10%" align="center" bgcolor="#FFCC66">รายละเอียดสินค้า</td>
      <td width="14%" align="center" bgcolor="#FFCC66">	เลือกซื้อสินค้า</td>
    </tr>
    <?
  if($numrow==0){
  
  ?>
    <tr>
      <td colspan="10" bgcolor="#FFFFFF" class="sizemain1">ไม่มีข้อมูล</td>
    </tr>
    <? 
  }else{
  	$i=1;
	//คำสั่งให้วนลูป
	while($db=mysql_fetch_array($qry)){
  $no++;
  ?>
    <tr>
      <td height="107" align="center" bgcolor="#FFFFFF" class="sizemain1"><?=$no?></td>
      <td align="center" bgcolor="#FFFFFF"><?=$db['product_id']?></td>
      <td align="center" bgcolor="#FFFFFF"><? if ($db['product_status']!=2){ ?>
        <?=$db['product_name']?>
        <?
	}else{
		?>
        <S>
          <?=$db['product_name']?>
          </S> *<span class="red">สินค้าหมด</span>
        <?
		
		}
		?></td>
      <td align="center" bgcolor="#FFFFFF" class="sizemain1"><?=$db['category_name']?>
        /
        <?=getsubcatename($db['subcategory_id'])?></td>
      <td align="center" bgcolor="#FFFFFF" class="sizemain1"><?=number_format($db['product_price'],2)?></td>
      <td align="center" bgcolor="#FFFFFF" class="sizemain1"><? if($db['product_pic']!=''){?>
        <img src="../images/product/<?=$db['product_pic']?>" width="100"/>
        <? }else{} ?>&nbsp;</td>
      <td align="center" bgcolor="#FFFFFF" class="sizemain1"><?=$db['product_detail']?>
      /
       <?=getsubcatename($db['product_detail'])?></td>
      <td align="center" bgcolor="#FFFFFF"><? if ($db['product_status']!=2){ ?>
        <a href="cart.php?product_id=<?=$db['product_id'];?>&act=add">
		สั่งซื้อสินค้า
        
        </a>
        </td>
        
      <?
	}else{}
		?>
      
    <?
  $i++;
  	}	//while
  }	   //if
  ?>
  </table>    <span class="sizemain1"></span></td>
</tr>
</table>
<br />

<?
	break;
	case  alert :
?>

<style type="text/css">
.red {
	color: #F00;
}
.sizemain1 {
	font-size: 12px;
}
</style>
<br />
<table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td align="center" bgcolor="#FFCC66"><span class="sizemain1">&nbsp;
		<? if($c ==1){?>ได้ทำการ <strong>เพิ่ม</strong> สินค้าแล้ว
		<? }else if($c ==2){?>ได้ทำการ <strong>แก้ไข</strong> สินค้าแล้ว
        <? }else if($c ==3){?>ได้ทำการ <strong>เพิ่มจำนวน</strong> สินค้าแล้ว
		<? }else{?>ได้ทำการ <strong>ลบ</strong> สินค้าแล้ว<? }?>
        </span></td>
      </tr>
      <tr>
        <td align="right"><meta http-equiv=refresh content=5;URL=main.php?module=product>
          <span class="sizemain1"><a href="main.php?module=product">คลิกที่นี้ถ้าไม่เปลี่ยนหน้าให้อัตโนมัติ</a>&nbsp;</span></td>
      </tr>
    </table></td>
  </tr>
</table>
<br />

<?
	}
?>