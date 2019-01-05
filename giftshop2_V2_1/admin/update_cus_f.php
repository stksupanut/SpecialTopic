<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 


require('../includes/connectdb.in.php');
connect_db();
echo $id = $_GET['cus_id'];
echo $name = $_POST['cus_name'];
echo $tel = $_POST['custel'];
echo $mail = $_POST['cusemail'];
echo $address = $_POST['address'];
$sql = "UPDATE tbl_customer SET customer_name ='$name',customer_address='$address'
,customer_telephone='$tel'
,customer_email='$mail'
WHERE customer_id='$id'";
$query = mysql_query($sql) or die(mysql_error());
echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');window.location='main.php?module=customer';</script>";

?>
</body>
</html>