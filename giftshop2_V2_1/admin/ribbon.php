<script language="javascript">
function fncSubmit()
{
if(document.form1.ribbon_name.value == "")
{
alert('กรุณากรอกชื่อลายโบว์');
document.form1.ribbon_name.focus();
return false;
}


if(document.form1.fileField.value == "")
{
alert('กรุณาใส่รูปภาพลายโบว์');
document.form1.fileField.focus();
return false;
}


}
</script>

<?
$ribbon_id=$_REQUEST['ribbon_id'];
$ribbon_name=$_REQUEST['ribbon_name'];
$keyword=$_REQUEST['keyword'];
?>

<?
switch($mode){
	case insert :
	
	if($action=="yes"){
		
	
			
			
		
		if($_FILES['fileField']['name']!=''){
		$type=strchr($_FILES['fileField']['name'],".");
		$newnamefiles="".date('ymdhis').$type;
		//ใข้ move_uploaded_file แทน copy ได้
		copy($_FILES['fileField']['tmp_name'],"../images/ribbon/".$newnamefiles."");
			
		}
		
		
		$sql="insert into tbl_ribbon(`ribbon_pic`,`ribbon_status`) values('$newnamefiles',1)";	
	mysql_query($sql,$conn);
		
/*		echo "<script language=\"javascript\">alert('เพิ่มข้อมูลเรียบร้อยแล้ว');</script>";
*/		echo "<meta http-equiv='refresh' content='1;URL=main.php?module=ribbon&mode=alert&c=1'>";
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
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">เพิ่มลายโบว์</span></td>
    </tr>
   
     <tr>
      <td width="123"><span class="sizemain1">รูปภาพ</span></td>
      <td width="1115" bgcolor="#FFFFFF">      <span class="sizemain1">
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
		copy($_FILES['fileField']['tmp_name'],"../images/ribbon/".$newnamefiles."");
		
		$newpic="ribbon_pic='$newnamefiles' ,";
		}else{
			$newpic="";
			
			}
	
	$sql="update tbl_ribbon set $newpic ribbon_status='1' where ribbon_id='$ribbon_id' ";
	mysql_query($sql);
		
		/*echo "<script language=\"javascript\">alert('แก้ไขข้อมูลเรียบร้อยแล้ว');</script>";*/
		echo "<meta http-equiv='refresh' content='1;URL=main.php?module=ribbon&mode=alert&c=2'>";
		exit;
	}
	
	$sql="select * from tbl_ribbon where ribbon_id='$ribbon_id'";
	$qry=mysql_query($sql);
	$db=mysql_fetch_array($qry);
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
  <br>
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
    <tr>
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">แก้ไขลายโบว์</span></td>
    </tr>
    <tr>
      <td width="120"><span class="sizemain1">รูปภาพ</span></td>
      <td width="1118" bgcolor="#FFFFFF">
        <span class="sizemain1">
        <? if($db['ribbon_pic']!=''){?>
        <img src="../images/ribbon/<?=$db['ribbon_pic']?>" width="150"/><br /> 
        <? }else{} ?>
		  
		  
		  
		  
      <input type="file" name="fileField" id="fileField">
      </span></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">
        <input type="submit" name="button" id="button" value="ตกลง">
      <input type="hidden" name="action" value="yes"/>
      <input type="hidden" name="mode" value="update"/>
      <input type="hidden" name="ribbon_id" value="<?=$ribbon_id?>"/>
      </span></td>
    </tr>
  </table>
</form>

<?
break;
	case delete :
	//ใช้ลบรูปทิ้ง
	$sqla="select * from tbl_ribbon where ribbon_id='$ribbon_id'";
	$qrya=mysql_query($sqla);
	$dba=mysql_fetch_array($qrya);
	/*unlink('../images/ribbon/'.$dba['ribbon_pic'].'');*/
	
	//ลบสินค้า
	$sql="update tbl_ribbon set ribbon_status=2 where ribbon_id='$ribbon_id'";
	$qry=mysql_query($sql);
	/*echo "<script language=\"javascript\">alert('ลบข้อมูลเรียบร้อยแล้ว');</script>";*/
		echo "<meta http-equiv='refresh' content='1;URL=main.php?module=ribbon&mode=alert&c=3'>";
		exit;
	
	
?>

<?
break;
default:
?><br/>


<?


$sql="select * from tbl_ribbon where ribbon_status=1 ";
//ทำให้ฐานข้อมูลทำงาน
$qry=mysql_query($sql);
$numrow=mysql_num_rows($qry);
?>
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
    <td width="3%" align="center" bgcolor="#FFCC66"><span class="sizemain1">ลำดับ</span></td>
    <td width="10%" align="center" bgcolor="#FFCC66" class="sizemain1">รหัสลายโบว์</td>
    <td width="79%" align="center" bgcolor="#FFCC66"><span class="sizemain1">รูปภาพ</span></td>
    <td width="4%" align="center" bgcolor="#FFCC66"><span class="sizemain1">แก้ไข</span></td>
    <td width="4%" align="center" bgcolor="#FFCC66"><span class="sizemain1">ลบ</span></td>
  </tr>
  <?
  if($numrow==0){
  
  ?>
  <tr>
    <td colspan="5" bgcolor="#FFFFFF"><span class="sizemain1">ไม่มีข้อมูล</span></td>
  </tr>
  <? 
  }else{
  	$i=1;
	//คำสั่งให้วนลูป
	while($db=mysql_fetch_array($qry)){
  $no++;
  ?>
  <tr>
    <td height="107" align="center" bgcolor="#FFFFFF"><span class="sizemain1">
      <?=$no?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizemain1">
      <?=$db['ribbon_id']?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizemain1">
      <? if($db['ribbon_pic']!=''){?>
      <img src="../images/ribbon/<?=$db['ribbon_pic']?>" width="100"/><? }else{} ?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizemain1"><a href="main.php?module=<?=$module?>&mode=update&ribbon_id=<?=$db['ribbon_id']?>"><img src="../images/edit.png" width="32" height="32" /></a></span></td>
    <td align="center" bgcolor="#FFFFFF">
    
    
      <span class="sizemain1"><a href="main.php?module=<?=$module?>&mode=delete&ribbon_id=<?=$db['ribbon_id']?>" onClick="javascript:return confirm('คุณต้องการลบลายโบว์ที่ <?=$db['ribbon_id']?> หรือไม่')"><img src="../images/delete.png" width="32" height="32" /></a></span></td>
  </tr>
  <?
  $i++;
  	}	//while
  }	   //if
  ?>
  
  
</table>

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
		<? if($c ==1){?>ได้ทำการ <strong>เพิ่ม</strong> ลายโบว์แล้ว
		<? }else if($c ==2){?>ได้ทำการ <strong>แก้ไข</strong> ลายโบว์แล้ว
		<? }else{?>ได้ทำการ <strong>ลบ</strong> ลายโบว์แล้ว<? }?>
        </span></td>
      </tr>
      <tr>
        <td align="right"><meta http-equiv=refresh content=5;URL=main.php?module=ribbon>
          <span class="sizemain1"><a href="main.php?module=ribbon">คลิกที่นี้ถ้าไม่เปลี่ยนหน้าให้อัตโนมัติ</a>&nbsp;</span></td>
      </tr>
    </table></td>
  </tr>
</table>
<br />

<?
	}
?>