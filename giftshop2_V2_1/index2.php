<?
session_start();
//include คือการเรียกใช้งานไฟล์
include('includes/connectdb.in.php');
include('includes/function.ini.php');
connect_db();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" href="css/styles.css" type="text/css"/>	
<title>-----------giftshop-----------</title>

<style type="text/css">
a:link {
	text-decoration: none;
	color: #000;
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

</style>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th bgcolor="#FFFFCC" scope="row"><? include('header.php');?></th>
  </tr>
  <tr>
    <th scope="row"><? include('menubar.php');?></th>
  </tr>
  <tr>
    <td scope="row"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="div-frm">
  <tr>
    <td width="200" valign="top"><br />
<? include('menuleft.php');?></td>
    <td width="642" align="center" valign="top">
    
     <br />
<table width="95%" border="0" cellpadding="0" cellspacing="0">
  <tr>
          <td align="center" bgcolor="#FFCC66" class="div-frm" scope="row">หน้าแรก</td>
        </tr>
    </table>
      <?
		if($module !=""){
		echo "<br />";
			require("".$module.".php");
		echo "<br />";
		}else{
			
			?>
			
			 <!--<img src="images/promotion.jpg" width="544" height="340" />--><br />
      <br />
      <img src="images/promotion2.jpg" width="544" height="340" /><br />
    <br />
			
			
			<?
			
			
			
			require("mainp.php");
		}
?>
   
    </td>
    <td width="158" align="center" valign="top"><br />
<? include('menuright.php');?>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <th scope="row"><? include('footer.php');?></th>
  </tr>
</table>
</body>
</html>