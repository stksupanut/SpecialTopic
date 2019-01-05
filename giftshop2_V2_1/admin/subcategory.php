<script language="javascript">
function fncSubmit()
{
if(document.form1.subcategory_name.value == "")
{
alert('กรุณากรอกชื่อหมวดหมู่สินค้าย่อย');
document.form1.subcategory_name.focus();
return false;
}

}
</script>

<?
/*
SELECT * FROM `tbl_category` WHERE `category_id`, `category_name`, `deleted`, `isenable`, `datecreated`
*/
$subcategory_name=$_REQUEST['subcategory_name'];
$category_id=$_REQUEST['category_id'];
$subcategory_id=$_REQUEST['subcategory_id'];
$keyword=$_REQUEST['keyword'];
?>

<?
switch($mode){
	case insert :
	
	if($action=="yes"){
		
		$sql="select * from tbl_subcategory where category_id=$category_id and subcategory_name='$subcategory_name' ";
		$qry=mysql_query($sql);
		$check=mysql_num_rows($qry);
	
		if($check>0){
			echo "<script language=\"javascript\">alert('มีข้อมูลหมวดสินค้าย่อยนี้อยู่ในฐานข้อมูลแล้ว');</script>";
			echo "<meta http-equiv='refresh' content='1;URL=main.php?module=$module&mode=insert'>";
			exit;
			
		}		
		
	
	    $sql="INSERT INTO tbl_subcategory (`category_id`,`subcategory_name`,`subcategory_status`)values ('$category_id','$subcategory_name',1)";
		//ไว้ให้ database ทำงาน
	
		mysql_query($sql);
		
		/*echo "<script language=\"javascript\">alert('INSERT SUCCESS');</script>";*/
		echo "<meta http-equiv='refresh' content='1;URL=main.php?module=subcategory&mode=alert&c=1'>";
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
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">เพิ่มหมวดหมวดหมู่ย่อย</span></td>
    </tr>
    <tr>
      <td width="152"><span class="sizemain1">ชื่อหมวดหมู่ย่อย</span></td>
      <td width="1086" bgcolor="#FFFFFF">
        <span class="sizemain1">
      <select name="category_id" id="category_id">
        <option value="">กรุณาเลือกหมวดสินค้า</option>
        <?
        $sql="select * from tbl_category where category_status='1'";
		$qry=mysql_query($sql);
		while($db=mysql_fetch_array($qry)){
		?>
        <option value="<?=$db['category_id']?>">
          <?=$db['category_name']?>
          </option>
        <?
		}
		?>
        
      </select>
      
      
      <input type="text" name="subcategory_name" id="subcategory_name">
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
  <br />
</form>
<?
break;
	case update :
	if($action=="yes"){
	//$sql="select * from tbl_subcategory where categoryid=$category_id and subcategory_name='$subcategory_name' ";
	$sql="update tbl_subcategory set subcategory_name='$subcategory_name',subcategory_status='1' where subcategory_id='$subcategory_id' ";
	mysql_query($sql);
	
		/*echo "<script language=\"javascript\">alert('UPDATE SUCCESS');</script>";*/
		echo "<meta http-equiv='refresh' content='1;URL=main.php?module=subcategory&mode=alert&c=2'>";
		exit;
	}
	
	
	
	$sql="select * from tbl_subcategory where subcategory_id='$subcategory_id'";
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
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">แก้ไขหมวดหมู่ย่อย</span></td>
    </tr>
    <tr>
      <td width="150"><span class="sizemain1">ชื่อหมวดหมู่ย่อย</span></td>
      <td width="1088" bgcolor="#FFFFFF">
        <span class="sizemain1">
        <input type="text" name="subcategory_name" id="subcategory_name" value="<?=$db['subcategory_name']?>">
      </span></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">
        <input type="submit" name="button" id="button" value="แก้ไข"> 
      <input type="hidden" name="action" value="yes"/>
      <input type="hidden" name="mode" value="update"/>
      <input type="hidden" name="subcategory_id" value="<?=$db['subcategory_id']?>"/>
      </span></td>
    </tr>
  </table>
</form>

<?
break;
	case delete :
	
	$sql="update tbl_subcategory set subcategory_status=2 where subcategory_id='$subcategory_id'";
	$qry=mysql_query($sql);
	/*echo "<script language=\"javascript\">alert('DELETE SUCCESS');</script>";*/
		echo "<meta http-equiv='refresh' content='1;URL=main.php?module=subcategory&mode=alert&c=3'>";
		exit;
	
?>

<?
break;
default:
?><br>
<?
if($keyword !=''){
	 $searchnamecate="and b.subcategory_name like '%$keyword%'";
}else{
	 $searchnamecate="";
}

$sql="select * from tbl_category as a,tbl_subcategory as b where a.category_id=b.category_id $searchnamecate";
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
<form action="main.php?module=<?=$module?>" method="post">
  <table width="449" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td width="439" align="center"><span class="sizemain1">ค้นหาหมวดหมู่:</span>
      <input name="keyword" type="text" />
      <input type="submit" name="button2" id="button2" value="ค้นหา" /></td>
  </tr>
</table>
</form>
<table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr>
    <td width="11%" align="center" bgcolor="#FFCC66"><span class="sizemain1">ลำดับ</span></td>
    <td width="25%" align="center" bgcolor="#FFCC66"><span class="sizemain1">ชื่อหมวดหมู่</span></td>
    <td width="57%" align="center" bgcolor="#FFCC66"><span class="sizemain1">ชื่อหมวดหมู่ย่อย</span></td>
    <td width="4%" align="center" bgcolor="#FFCC66"><span class="sizemain1">แก้ไข</span></td>
    <td width="3%" align="center" bgcolor="#FFCC66"><span class="sizemain1">ลบ</span></td>
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
    <td bgcolor="#FFFFFF"><span class="sizemain1">
      <?=$db['category_name']?>
    </span></td>
    <td bgcolor="#FFFFFF"><span class="sizemain1">
    
    
        <? if ($db['subcategory_status']!=2){ ?>
	
	<?=$db['subcategory_name']?>
    <?
	}else{
		?>
		<S>
		<?=$db['subcategory_name']?>
		</S></span> 
	   <?
		}
		?>
    
    
    
    
    </span></td>
    <td bgcolor="#FFFFFF"><span class="sizemain1"><a href="main.php?module=<?=$module?>&mode=update&subcategory_id=<?=$db['subcategory_id']?>"><img src="../images/edit.png" width="32" height="32" /></a></span></td>
    <td bgcolor="#FFFFFF">
    
    
    <span class="sizemain1">
     <? if ($db['subcategory_status']!=2){ ?>
    
    <a href="main.php?module=<?=$module?>&mode=delete&subcategory_id=<?=$db['subcategory_id']?>" onClick="javascript:return confirm('คุณต้องการลบหมวดหมู่ย่อย <?=$db['subcategory_name']?> หรือไม่')"><img src="../images/delete.png" width="32" height="32" /></a>
    <? } ?>
    </span></td>
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
		<? if($c ==1){?>ได้ทำการ <strong>เพิ่ม</strong> หมวดหมู่ย่อยแล้ว
		<? }else if($c ==2){?>ได้ทำการ <strong>แก้ไข</strong> หมวดหมู่ย่อยแล้ว
		<? }else{?>ได้ทำการ <strong>ลบ</strong> หมวดหมู่ย่อยแล้ว<? }?>
        </span></td>
      </tr>
      <tr>
        <td align="right"><meta http-equiv=refresh content=5;URL=main.php?module=subcategory>
          <span class="sizemain1"><a href="main.php?module=subcategory">คลิกที่นี้ถ้าไม่เปลี่ยนหน้าให้อัตโนมัติ</a>&nbsp;</span></td>
      </tr>
    </table></td>
  </tr>
</table>
<br />

<?
	}
?>





