<?
//ใช้เมื่อต้องการใช้ seesion
session_start();
ob_start();

//include คือการเรียกใช้งานไฟล์
include('../includes/connectdb.in.php');
include('../includes/function.ini.php');
connect_db();
//เก็บตัวแปร 
//request ใช้ได้ทั้ง ส่งและรับ
$username=$_POST['username'];
$password=$_POST['password'];
$action=$_REQUEST['action'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ส่วนของผู้ดูแลระบบ</title>
<style type="text/css">
.red {
	color: #F00;
}
.sizemain1 {
	font-size: 12px;
}
</style>
</head>

<body>





<?
/*
SELECT * FROM `tbl_admin` WHERE 1
`admin_id`, `admin_name`, `admin_user`, `admin_pass`, `deleted`, `datecreated`
*/

	
	$sql="select * from tbl_admin where admin_user='$username' and admin_pass='$password' ";	
	
	$qry=mysql_query($sql);
	//ตรวจสอบแถวว่ามีข้อมูลไหม
	$numrow=mysql_num_rows($qry);
	
	if($numrow>0){
		
			// $sql="select * from tbl_admin where admin_user='$username' and admin_pass='$password' ";	
			// $qry=mysql_query($sql);
			$db=mysql_fetch_array($qry);
			$adminid=$db['admin_id'];
			$adminname=$db['admin_name'];
			//เพื่อให้หน้าอื่นๆรู้ว่าเราเป็นแอดมิน
			$_SESSION['adminid']=$adminid;
			$_SESSION['adminname']=$adminname;
		
			//session_register($adminid);
			//session_register($adminname);
			
		//คำสั่ง alert ขึ้นแจ้ง
		// echo "<script language=\"javascript\">alert('เข้าสู่ระบบเรียบร้อยแล้ว');</script>";
		// echo "<meta http-equiv='refresh' content='1;URL=main.php'>";
		echo "<script>alert('เข้าสู่ระบบเรียบร้อยแล้ว');window.location='main.php';</script>";
		// $totalOrderExpire=CheckOrderExpire();
		// 	if($totalOrderExpire>0){
		// 		echo "<script language=\"javascript\">alert('ระบบทำการยกเลิกรายการสั่งซื้อทั้งหมด $totalOrderExpire รายการ');</script>";
		// 	}
			
		// 	echo "<meta http-equiv='refresh' content='1;URL=main.php'> ";
			
		// /*$totalOrderUnit=CheckOrderUnit();
		// 	if($totalOrderUnit>0){
		// 		echo "<script language=\"javascript\">alert('รายการlyj':nhv $totalOrderUnit');</script>";
		// 	}
			
		// 	echo "<meta http-equiv='refresh' content='1;URL=main.php'> ";*/
			
		
		// exit;
	}
	// else{
	// 	echo"False";
	// 	echo "<script language=\"javascript\">alert('ไม่สามารถเข้าสู่ระบบได้ กรุณาตรวจสอบชื่อผู้ใช้และรหัสผ่าน');</script>";
	// 	echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
	// 	exit;
	// }
	
	// exit;
	

?>

<form id="form1" name="form1" method="post" action="index.php">
  <table width="300" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
    <tr>
      <td colspan="2" align="center" bgcolor="#FFCC66"><span class="sizemain1">เข้าสู่ระบบ</span></td>
    </tr>
    <tr>
      <td width="72"><span class="sizemain1">ชื่อผู้ใช้</span></td>
      <td width="212" bgcolor="#FFFFFF">      <span class="sizemain1">
        <input name="username" type="text" id="username" />
      admin</span></td>
    </tr>
    <tr>
      <td><span class="sizemain1">รหัสผ่าน</span></td>
      <td bgcolor="#FFFFFF">      <span class="sizemain1">
        <input type="password" name="password" id="password" />
      1234</span></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><span class="sizemain1">
        <input type="submit" name="button" id="button" value="ตกลง" />
      
      
      <input type="hidden" name="action" value="yes"/>
      </span></td>
    </tr>
  </table>
</form>
</body>
</html>