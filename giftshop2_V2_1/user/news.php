<?
$news_id=$_REQUEST['news_id'];
$news_title=$_REQUEST['news_title'];
$news_details=$_REQUEST['news_details'];
$keyword=$_REQUEST['keyword'];
/*
SELECT * FROM `tbl_news` WHERE 1`news_id`, `news_title`, `news_details`, `news_pic`, `datecreated`, `deleted`
*/
?>
<style type="text/css">
.sizemain1 {
	font-size: 12px;
}
.red {
	color: #F00;
}
</style>

<br>
<script language="javascript">
function checkData(theForm)
{

		if(theForm.title.value=='')
				{
					alert('กรุณากรอกหัวข้อข่าว');
					theForm.title.focus();
					return false;
				}
		if(theForm.fileField.value=='')
				{
					alert('กรุณาใส่รูปภาพประกอบ');
					theForm.details.focus();
					return false;
				}
		if(theForm.fileField.value=='')
				{
					alert('กรุณากรอกรายละเอียดข่าว');
					theForm.details.focus();
					return false;
				}

  return (true);
}

</script>
<?
switch($mode){
		case add :
		
				if($action=="yes"){
				
				$sql1="select * from tbl_news where news_title like '$news_title'";
				$qry=mysql_query($sql1);
				$num=mysql_num_rows($qry);
				if($num >0){
				echo "<script language=\"JavaScript\"> alert('มีหัวข้อข่าวนี้อยู่ในฐานข้อมูลแล้ว') </script>";
				echo "<meta http-equiv='refresh' content='0;URL=main.php?module=$module&mode=add'>";
				exit;  
					
				}
				
				
				if($_FILES['fileField']['name']!=''){
		$type=strchr($_FILES['fileField']['name'],".");
		$newnamefiles="".date('ymdhis').$type;
		//ใข้ move_uploaded_file แทน copy ได้
		copy($_FILES['fileField']['tmp_name'],"../images/news/".$newnamefiles."");
			
		}
			

			    $sql="insert into `tbl_news`(`news_title`, `news_details`, `news_pic`, `news_date`) values ('$news_title','$news_details','$newnamefiles',now())";
				mysql_query($sql);
		///	exit;
				echo "<script language=\"JavaScript\"> alert('บันทึกข้อมูลเรียบร้อยแล้ว') </script>";
				echo "<meta http-equiv='refresh' content='0;URL=main.php?module=$module'>";
				exit;  
				}
?>

<form action="main.php?module=<?=$module?>" method="post" enctype="multipart/form-data" name="form1" onSubmit="return checkData(this)">
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
    <tr>
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">เพิ่มข่าวสาร</span></td>
    </tr>
   <!-- <tr>
      <td width="152" class="txt_black">รหัสสินค้า</td>
      <td width="327"><input name="proname" type="text" id="proname" size="40"></td>
    </tr>-->
    <tr>
      <td width="155" class="txt_black"><span class="sizemain1">หัวข้อข่าว</span></td>
      <td width="1083" bgcolor="#FFFFFF">        <span class="sizemain1">
        <input name="news_title" type="text" id="news_title" size="40" />      
      </span></td>
    </tr>
    <tr>
      <td class="txt_black"><span class="sizemain1">รูปภาพประกอบ</span></td>
      <td bgcolor="#FFFFFF">        <span class="sizemain1">
        <input type="file" name="fileField" id="fileField" />      
      </span></td>
    </tr>
    <tr>
      <td align="left" valign="top"><span class="sizemain1">รายละเอียด</span></td>
      <td bgcolor="#FFFFFF">
        <span class="sizemain1">
        <textarea name="news_details" id="news_details" cols="50" rows="9"></textarea>
        </span></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFCC66">
        <span class="sizemain1">
        <input type="submit" name="button" id="button" value="ตกลง" >
        &nbsp;
	        <input type="button" name="button4" id="button5" value="ยกเลิก" onClick="parent.location='main.php?module=news'"/>
            <!-- <input type="button" name="button4" id="button5" value="ยกเลิก" onClick="parent.location='main.php?module=<?=$module?>'"/>-->
      <input type="hidden" name="mode" value="add">      
      <input type="hidden" name="action" value="yes">      
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
		copy($_FILES['fileField']['tmp_name'],"../images/news/".$newnamefiles."");
		
		$newpic="news_pic='$newnamefiles' ,";
		}else{
			$newpic="";
			
			}
			
			
			
	$sql="update tbl_news set $newpic news_title='$news_title',news_details='$news_details' where news_id=$news_id";
			    mysql_query($sql);
				//exit;
				echo "<script language=\"JavaScript\"> alert('แก้ไขข้อมูลเรียบร้อยแล้ว') </script>";
				echo "<meta http-equiv='refresh' content='0;URL=main.php?module=$module'>";
				exit;  
		}
		$sql="select * from tbl_news where news_id=$news_id";
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
<form name="form1" method="post" action="main.php?module=<?=$module?>" enctype="multipart/form-data" onSubmit="return checkData(this)">
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
    <tr>
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">แก้ไขข่าวสาร</span></td>
    </tr>
    <tr>
      <td width="151" class="txt_black"><span class="sizemain1">หัวข้อข่าว</span></td>
      <td width="1087" bgcolor="#FFFFFF"><span class="sizemain1">
        <input name="news_title" type="text" id="news_title" value="<?=$db['news_title']?>" size="40" />
      </span></td>
    </tr>
    <tr>
      <td class="txt_black"><span class="sizemain1">รูปภาพประกอบ</span></td>
      <td bgcolor="#FFFFFF"><span class="sizemain1">
        <? if($db['news_pic'] !=''){?>
        <img src="../images/news/<?=$db['news_pic']?>" width="80" border="1"/><? }?>
      <input type="file" name="fileField" id="fileField" />
      </span></td>
    </tr>
    <tr>
      <td><span class="sizemain1">รายละเอียด</span></td>
      <td bgcolor="#FFFFFF"><span class="sizemain1">
        <textarea name="news_details" id="news_details" cols="50" rows="9"><?=$db['news_details']?>
        </textarea>
      </span></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFCC66">
			
        <input type="submit" name="button" id="button" value="แก้ไข">
         <input type="hidden" name="mode" value="update" />
        <input type="hidden" name="action" value="yes" />
        <input type="hidden" name="news_id" value="<?=$news_id?>" />
        &nbsp;
	        <input type="button" name="button4" id="button5" value="ยกเลิก" onClick="parent.location='main.php?module=news'"/>
            
            <!-- <input type="button" name="button4" id="button5" value="ยกเลิก" onClick="parent.location='main.php?module=<?=$module?>'"/>-->
       
		</td>
    </tr>
  </table>
</form>
<p>
  <?
break;
case delete :
	//ใช้ลบรูปทิ้ง
	$sqla="select * from tbl_news where news_id='$news_id'";
	$qrya=mysql_query($sqla);
	$dba=mysql_fetch_array($qrya);
	unlink('../images/news/'.$dba['news_pic'].'');
	
	//ลบสินค้า
	$sql="delete from tbl_news where news_id='$news_id'";
	$qry=mysql_query($sql);
	echo "<script language=\"javascript\">alert('ลบข้อมูลเรียบร้อยแล้ว');</script>";
	echo "<meta http-equiv='refresh' content='1;URL=main.php?module=$module'>";
	exit;
break;
default :
?>
<?
if (empty($p)) $p=1;
									
									if($keyword !=''){		
										$search="WHERE news_title like '%$keyword%'";
									}else{
										$search="";
									}
								
									
										$sql = "SELECT news_id FROM tbl_news $search";
										$result = mysql_query($sql,$conn);
										$NRow = mysql_num_rows($result);
										$rt = $NRow%$list_page;
									
										if($rt!=0)
													$totalpage = floor($NRow/$list_page)+1; 
										else 
													$totalpage = floor($NRow/$list_page); 
									
										$goto = ($p-1)*$list_page;
										($p > $totalpage) ? $p=1 : "";
										mysql_free_result($result);		
									
								   $sql = "SELECT * FROM tbl_news $search ORDER BY news_id DESC LIMIT $goto,$list_page";
									$rs = mysql_query($sql,$conn);
?>
<style type="text/css">
.red {
	color: #F00;
}
.sizemain1 {
	font-size: 12px;
}
</style>
<form id="form2" name="form2" method="post" action="">
  <table width="504" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="494" align="center"><span class="sizemain1">ค้นหาข่าวสาร :
        </span>
        <input name="keyword" type="text" id="keyword" size="30" />
        <input type="submit" name="button2" id="button2" value="ค้นหา" />
      <input name="mode2" type="hidden" id="mode" value="check" /></td>
    </tr>
  </table>
</form>
<table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
            <tr align="center" bgcolor="#3399FF" class="title">
                <td width="43" height="23" bgcolor="#FFCC66" class="txt_black"><span class="sizemain1">ลำดับ</span></td>
                <td width="668" bgcolor="#FFCC66" class="txt_black"><span class="sizemain1">รายการข่าว</span></td>
                <td width="435" bgcolor="#FFCC66" class="txt_black"><span class="sizemain1">วันที่บันทึก</span></td>
                <td width="32" bgcolor="#FFCC66" class="txt_black"><span class="sizemain1">แก้ไข</span></td>
                <td width="33" bgcolor="#FFCC66" class="txt_black"><span class="sizemain1"> ลบ</span></td>
  </tr>
              <?
			if (mysql_num_rows($rs)==0)
				{
		?>
              <tr valign="middle" bgcolor="#CCCCCC">
                <td colspan="5" bgcolor="#FFFFFF" class="txt_black"><span class="sizemain1">ไม่มีข้อมูล</span></td>
              </tr>
              <?
				}else{
				$data_count=$goto+1;
						
					while($db=mysql_fetch_array($rs))
						{
							$row_color = (($data_count % 2) == 0)?"#E6E6E6":"#FFFFFF";
							$per=$db['status'];
 		?>
              <tr class="normal">
                <td height="55" align="center" bgcolor="#FFFFFF" class="txt_black"><span class="sizemain1">
                <?=$data_count?>
                </span></td>
                <td align="left" bgcolor="#FFFFFF" class="txt_black"><span class="sizemain1">
                <?=$db['news_title']?>
                </span></td>
                <td align="center" bgcolor="#FFFFFF" class="tred"><span class="sizemain1">
                <?=shotdate($db['news_date']);?>
                </span></td>
                <td align="center" bgcolor="#FFFFFF" class="txt_black">    
                  <span class="sizemain1"><a href="main.php?module=<?=$module?>&mode=update&news_id=<?=$db['news_id']?>"><img src="../images/edit.png" width="32" height="32" /></a>
                </span></td>
                <td align="center" bgcolor="#FFFFFF" class="txt_black">
                
                  <span class="sizemain1"><a href="main.php?module=<?=$module?>&mode=delete&news_id=<?=$db['news_id']?>" onClick="javascript:return confirm('คุณต้องการลบข่าวสาร <?=$db['news_title']?> หรือไม่')"><img src="../images/delete.png" width="32" height="32" /></a></span></td>
              </tr>
              <?php
								$data_count++;
										}
									}
			$row_color = (($data_count % 2) == 0)?"#E6E6E6":"#FFFFFF";
		?>
</table>
<br />
<?
ิbreak;
}
?>
