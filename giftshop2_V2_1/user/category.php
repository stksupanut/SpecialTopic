<script language="javascript">
function fncSubmit()
{
if(document.form1.category_name.value == "")
{
alert('กรุณากรอกชื่อหมวดหมู่สินค้า');
document.form1.category_name.focus();
return false;
}

}
</script>

<?
/*
SELECT * FROM `tbl_category` WHERE `category_id`, `category_name`, `deleted`, `isenable`, `datecreated`
*/
$category_name=$_REQUEST['category_name'];
$category_id=$_REQUEST['category_id'];
$keyword=$_REQUEST['keyword'];
?>

<?
switch($mode){
	case insert :
	
	if($action=="yes"){
		
		$sql="select * from tbl_category where category_name='$category_name' ";
		$qry=mysql_query($sql);
		$check=mysql_num_rows($qry);
		
		if($check>0){
			echo "<script language=\"javascript\">alert('มีข้อมูลหมวดสินค้านี้อยู่ในฐานข้อมูลแล้ว');</script>";
			echo "<meta http-equiv='refresh' content='1;URL=main.php?module=$module&mode=insert'>";
			exit;
			
		}		
		
	
	$sql="INSERT INTO tbl_category (category_name,category_status)values ('$category_name',1)"	;
		//ไว้ให้ database ทำงาน
		mysql_query($sql);
		
		/*echo "<script language=\"javascript\">alert('เพิ่มข้อมูลเรียบร้อยแล้ว');</script>";*/
		echo "<meta http-equiv='refresh' content='1;URL=main.php?module=category&mode=alert&c=1'>";
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
<form action="main.php?module=<?=$module?>&mode=insert" method="post" enctype="multipart/form-data" name="form1" onSubmit="JavaScript:return fncSubmit();">
  <br />
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
    <tr>
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">เพิ่มหมวดหมู่สินค้า</span></td>
    </tr>
    <tr>
      <td width="137"><span class="sizemain1">ชื่อหมวดหมู่สินค้า</span></td>
      <td width="1117" bgcolor="#FFFFFF">
        <span class="sizemain1">
        <input type="text" name="category_name" id="category_name">
      </span></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1"><strong>
        <input type="submit" name="button" id="button" value="ตกลง">
       <input type="hidden" name="action" value="yes"/>
       <input type="hidden" name="mode" value="insert"/>

      </strong></span></td>
    </tr>
  </table>
</form>
<?
break;
	case update :
	if($action=="yes"){
	
	$sql="update tbl_category set category_name='$category_name',category_status='1' where category_id='$category_id' ";
	mysql_query($sql);
	
		/*echo "<script language=\"javascript\">alert('แก้ไขข้อมูลเรียบร้อยแล้ว');</script>"*/;
		echo "<meta http-equiv='refresh' content='1;URL=main.php?module=category&mode=alert&c=2'>";
		exit;
	}
	
	
	
	$sql="select * from tbl_category where category_id='$category_id'";
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
<form action="main.php?module=<?=$module?>&mode=update" method="post" enctype="multipart/form-data" name="form1">
  <br />
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
    <tr>
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">แก้ไขหมวดหมู่สินค้า</span></td>
    </tr>
    <tr>
      <td width="132"><span class="sizemain1">ชื่อหมวดหมู่สินค้า</span></td>
      <td width="1122" bgcolor="#FFFFFF">
        <span class="sizemain1">
        <input type="text" name="category_name" id="category_name" value="<?=$db['category_name']?>">
      </span></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">
        <input type="submit" name="button" id="button" value="แก้ไข"> 
      <input type="hidden" name="action" value="yes"/>
      <input type="hidden" name="mode" value="update"/>
      <input type="hidden" name="category_id" value="<?=$db['category_id']?>"/>
      </span></td>
    </tr>
  </table>
</form>

<?
break;
	case delete :
	
	$sql="update tbl_category set category_status=2 where category_id='$category_id'";
	$qry=mysql_query($sql);
	/*echo "<script language=\"javascript\">alert('ลบข้อมูลเรียบร้อยแล้ว');</script>";*/
		echo "<meta http-equiv='refresh' content='1;URL=main.php?module=category&mode=alert&c=3'>";
		exit;
	?>
<?
break;
default:
?><?
if($keyword !=''){
	 $searchnamecate="where category_name like '%$keyword%'";
}else{
	 $searchnamecate="";
}
$sql="select * from tbl_category $searchnamecate";
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
<br />
<form action="main.php?module=<?=$module?>" method="post">
  <table width="375" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td width="365" align="center"><span class="sizemain1">ค้นหาหมวดหมู่:</span>
      <input name="keyword" type="text" />
      <input type="submit" name="button2" id="button2" value="ค้นหา" /></td>
  </tr>
</table>
</form>

<table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr>
    <td width="5%" align="center" bgcolor="#FFCC66"><span class="sizemain1">ลำดับ</span></td>
    <td width="13%" align="center" bgcolor="#FFCC66" class="sizemain1">รหัสหมวดหมู่</td>
    <td width="74%" align="center" bgcolor="#FFCC66"><span class="sizemain1">ชื่อหมวดหมู่</span></td>
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
    <td align="center" bgcolor="#FFFFFF"><span class="sizemain1">
      <?=$no?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizemain1">
      <?=$db['category_id']?>
    </span></td>
    <td bgcolor="#FFFFFF"><span class="sizemain1">
    
      <? if ($db['category_status']!=2){ ?>
	
	<?=$db['category_name']?>
    <?
	}else{
		?>
		<S>
		<?=$db['category_name']?>
		</S></span> 
	   <?
		}
		?>
    
    
    </span></td>
    <td bgcolor="#FFFFFF"><span class="sizemain1"><a href="main.php?module=<?=$module?>&mode=update&category_id=<?=$db['category_id']?>"><img src="../images/edit.png" width="32" height="32" /></a></span></td>
    <td bgcolor="#FFFFFF">
    
    
    <span class="sizemain1">
    
     <? if ($db['category_status']!=2){ ?>
    
    <a href="main.php?module=<?=$module?>&mode=delete&category_id=<?=$db['category_id']?>" onClick="javascript:return confirm('คุณต้องการลบหมวดหมู่ <?=$db['category_name']?> หรือไม่')"><img src="../images/delete.png" width="32" height="32" /></a>
    
    <? } ?>
    
    </span></td>
  </tr>
  <?
  $i++;
  	}	//while
  }	   //if
  ?>
  
  
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
		<? if($c ==1){?>ได้ทำการ <strong>เพิ่ม</strong> หมวดหมู่ของขวัญแล้ว
		<? }else if($c ==2){?>ได้ทำการ <strong>แก้ไข</strong> หมวดหมู่ของขวัญแล้ว
		<? }else{?>ได้ทำการ <strong>ลบ</strong> หมวดหมู่ของขวัญแล้ว<? }?>
        </span></td>
      </tr>
      <tr>
        <td align="right"><meta http-equiv=refresh content=5;URL=main.php?module=category>
          <span class="sizemain1"><a href="main.php?module=category">คลิกที่นี้ถ้าไม่เปลี่ยนหน้าให้อัตโนมัติ</a>&nbsp;</span></td>
      </tr>
    </table></td>
  </tr>
</table>
<br />

<?
	}
?>