<?php
 session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
require('../includes/connectdb.in.php');
connect_db();
$_SESSION["cus_name_b"] = $_POST['cus_name'];
$_SESSION["cus_name_last_b"] = $_POST['cus_name_last'];
$_SESSION["custel_b"] = $_POST['custel'];
$_SESSION["cusemail_b"] = $_POST['cusemail'];
$_SESSION["selProvince_b"] = $_POST['selProvince'];
$_SESSION["selAmphur_b"] = $_POST['selAmphur'];
$_SESSION["selTumbon_b"] = $_POST['selTumbon'];
$_SESSION["selDistrictCode_b"] = $_POST['selDistrictCode'];
$_SESSION["order_b"] = $_POST['order_id'];
$_SESSION["address_b"] = $_POST['address'];

$cus_name = $_POST['cus_name'];
$cus_name_last = $_POST['cus_name_last'];
$custel = $_POST['custel'];
$cusemail = $_POST['cusemail'];
$province_id = $_POST['selProvince'];
$amphur_id = $_POST['selAmphur'];
$district_id = $_POST['selTumbon'];
$zipcode = $_POST['selDistrictCode'];
$order_id = $_POST['order_id'];
$address = $_POST['address'];
date_default_timezone_set('Bangkok/Asia');
$datenow = date('Y-m-d');
$Item1 = $_SESSION["Item1"];
$Item2 = $_SESSION["Item2"];
$Item3 = $_SESSION["Item3"];
$Item4 = $_SESSION["Item4"];
$Item5 = $_SESSION["Item5"];
$Item6 = $_SESSION["Item6"];
$Item7 = $_SESSION["Item7"];

$sql = "SELECT * FROM tbl_customer WHERE customer_name = '$cus_name'";
$result = mysql_db_query($db_database, $sql);
$numrows = mysql_num_rows($result);
if($numrows<1){
$sqlinsert = "INSERT INTO tbl_customer(customer_name,customer_name_last,customer_address,district_id,prefecture_id,province_id,postcode,customer_telephone,customer_email,Date,item1,item2,item3,item4,item5,item6,item7) VALUES 
	('$cus_name','$cus_name_last','$address','$district_id','$amphur_id','$province_id','$amphur_id','$custel','$cusemail','$datenow','$Item1','$Item2','$Item3','$Item4','$Item5','$Item6','$Item7')";
$result = mysql_db_query($db_database, $sqlinsert);
if($result==true){
	echo "<script>alert('บันทึกข้อมูลลูกค้าเรียบร้อย');</script>";
	$sql2 = "SELECT * FROM tbl_customer WHERE customer_name = '$cus_name'";
	$result2 = mysql_db_query($db_database, $sql2);
	$row = mysql_fetch_array($result2);
	$customer_id = $row['customer_id'];
	$sqlinsert2 = "INSERT INTO tbl_order(order_id,customer_id,newname,address_send,district_id,prefecture_id,province_id,postcode,telephone_send,mail_send,order_date) VALUES ('$order_id','$customer_id','$cus_name','$address','$district_id','$amphur_id','$province_id','$amphur_id','$custel','$cusemail','$datenow') ";
	$result2 = mysql_db_query($db_database, $sqlinsert2);
	if($result2==true){
	$check = array_count_values($_SESSION['cart']);
    foreach (array_unique($_SESSION['cart']) as $key => $idshop) {
      # code...
      $sql = "SELECT * FROM tbl_product WHERE product_id = '$idshop'";
      $result = mysql_query($sql);
      while($db=mysql_fetch_array($result)){
      
    
    	$sumprice=$check[$db['product_id']]*$db['product_price'];      	
      	$order_unit = $check[$db['product_id']];

		$sqlinsert3 = "INSERT INTO tbl_order_lists(order_id,order_unit,product_id,product_price) VALUES(
	'$order_id','$order_unit','$idshop','$sumprice')";
		$resultinsert = mysql_db_query($db_database, $sqlinsert3);
		}
	}
		echo "<script>alert('สั่งซื้อสินค้าเรียบร้อย');window.location='main.php?module=product';</script>";
		//session_unregister($_SESSION['Item1']);
		unset($_SESSION['Item1']);
		unset($_SESSION['Item2']);
		unset($_SESSION['Item3']);
		unset($_SESSION['Item4']);
		unset($_SESSION['Item5']);
		unset($_SESSION['Item6']);
		unset($_SESSION['Item7']);
		unset($_SESSION['cart']);
		//session_destroy();
	}else{
		echo "<script>alert('สั่งซื้อสินค้าไม่สำเร็จ');</script>";
		echo $sqlinsert2;
	}

}else{
	echo "<script>alert('บันทึกข้อมูลลูกค้าไม่สำเร็จ');</script>";
	echo $sqlinsert;
}
}else{
	$row = mysql_fetch_array($result);
	$customer_id = $row['customer_id'];
	$sqlinsert2 = "INSERT INTO tbl_order(order_id,customer_id,newname,address_send,district_id,prefecture_id,province_id,postcode,telephone_send,mail_send,order_date) VALUES ('$order_id','$customer_id','$cus_name','$address','$district_id','$amphur_id','$province_id','$amphur_id','$custel','$cusemail','$datenow') ";
	$result2 = mysql_db_query($db_database, $sqlinsert2);
	if($result2==true){
		$check = array_count_values($_SESSION['cart']);
    foreach (array_unique($_SESSION['cart']) as $key => $idshop) {

      # code...
      $sql = "SELECT * FROM tbl_product WHERE product_id = '$idshop'";
      $result = mysql_query($sql);
      while($db=mysql_fetch_array($result)){
      
    
    	$sumprice=$check[$db['product_id']]*$db['product_price'];      	
      	$order_unit = $check[$db['product_id']];

		$sqlinsert3 = "INSERT INTO tbl_order_lists(order_id,order_unit,product_id,product_price) VALUES(
	'$order_id','$order_unit','$idshop','$sumprice')";
		$resultinsert = mysql_db_query($db_database, $sqlinsert3);
		}
	}
		echo "<script>alert('สั่งซื้อสินค้าเรียบร้อย');window.location='main.php?module=product';</script>";
		unset($_SESSION['Item1']);
		unset($_SESSION['Item2']);
		unset($_SESSION['Item3']);
		unset($_SESSION['Item4']);
		unset($_SESSION['Item5']);
		unset($_SESSION['Item6']);
		unset($_SESSION['Item7']);
		unset($_SESSION['cart']);
		//unset($_SESSION['Item1']);
		//session_unregister($_SESSION['Item1']);
		//session_destroy();
	}else{
		echo "<script>alert('สั่งซื้อสินค้าไม่สำเร็จ');</script>";
		echo $sqlinsert2;
	}
}
echo "<script>alert('สั่งซื้อสินค้าเรียบร้อย');javascript:window.print();</script>";
?>
