<? 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

    error_reporting( error_reporting() & ~E_NOTICE ); 
	
	// $qry=mysql_query($sql);
    $product_id = $_REQUEST['product_id']; 
	$act = $_REQUEST['act'];

	if($act=='add' && !empty($product_id))
	{
		 
		$_SESSION['cart'][] = $product_id;
		
		/*if(isset($_SESSION['shopping_cart'][$product_id]))
		{
			$_SESSION['shopping_cart'][$product_id]++;
		}
		else
		{
			$_SESSION['shopping_cart'][$product_id]=1;
		}*/
	}

	if($act=='remove' && !empty($product_id))  //ยกเลิกการสั่งซื้อ
	{
		foreach ($_SESSION['cart'] as $key => $idshop) {
			# code...
			if($idshop==$product_id){
				unset($_SESSION['cart'][$key]);
			}
			//unset($_SESSION['shopping_cart'][$product_id]);
		}
		$cart2 = array_unique($_SESSION['cart']);
		
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $product_id=>$amount)
		{
			$_SESSION['shopping_cart'][$product_id]=$amount;
		}
	}
	?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<body>
<form action="main.php?module=<?=$module?>" method="post" enctype="multipart/form-data" name="form1" onSubmit="JavaScript:return fncSubmit();">
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-7">
      <form id="frmcart" name="frmcart" method="post" action="?act=update">
        <table width="100%" border="0" align="center" class="table table-hover">
        <tr>
          <td height="40" colspan="8" align="center" bgcolor="#CCCCCC"><strong><b>ตะกร้าสินค้า</span></strong></td>
        </tr>
        <tr>
        
          <td align="center" bgcolor="#EAEAEA"><strong>ลำดับ</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>รหัสสินค้า</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>รายการสินค้า</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>หมวดหมู่</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>ราคา</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>จำนวน</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>รูปภาพ</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>ลบ</strong></td>
        </tr>
        <?php

if(!empty($_SESSION['cart']))
{
require_once('../includes/connectdb.in.php');
connect_db();
$number = 0;


$cart2 = array_unique($_SESSION['cart']);
$check = array_count_values($_SESSION['cart']);
//print_r($cart2);
//print_r($_SESSION['cart']);
	foreach($cart2 as $product_id=>$p_qty)
	{
		$sql = "select * from tbl_product AS a INNER JOIN tbl_category AS b ON a.category_id = b.category_id where product_id = '$p_qty'";
		
		$query = mysql_db_query($db_database, $sql);
		
		while($row = mysql_fetch_array($query))
		{
		$number++;
		
		//$total += $row['product_price'];
		
		$total = $total + ($check[$row['product_id']]*$row['product_price']);
		?>
		<tr>
			<td><?=$number; ?></td>
            <td><?=$row['product_id'];?></td>
            <td><?=$row['product_name'];?></td>
            <td><?=$row['category_name']; ?></td>
            <td><?=$row['product_price']; ?></td>
            <td><?echo $check[$row['product_id']];?></td>
           <!--  <td><input type="text" name="numproduct[]" value="1" style="width: 25px;"></td> -->
            <td><img src="../images/product/<?=$row['product_pic']; ?> " style="width:100px;height:100px;" /></td>
          <td><input type="button"  name="btnDelete" id="btnDelete" value="ลบ" onclick="window.location='cart.php?product_id=<?=$row['product_id']; ?>&act=remove';" />
            
		</td>
        <?
		}
		/*echo "<tr>";
		echo "<td>";
        echo $i += 1;
        echo ".";
		echo "</td>";
		echo "<td width='100'>"."<img src='img/$row[p_img]'  width='50'/>"."</td>";
		echo "<td width='334'>"." " . $row["product_name"] . "</td>";
		echo "<td width='100' align='right'>" . number_format($row["p_price"],2) . "</td>";
		
		echo "<td width='57' align='right'>";  
		echo "<input type='text' name='amount[$p_id]' value='$p_qty' size='2'/></td>";
		
		echo "<td width='100' align='right'>" .number_format($sum,2)."</td>";
		echo "<td width='100' align='center'><a href='cart.php?p_id=$p_id&act=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";
		
		echo "</tr>";*/
		//}
 
	}
	
	/*echo "<tr>";
  	echo "<td colspan='5' bgcolor='#CEE7FF' align='right'>Total</td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>";
  	echo "<b>";
  	echo  number_format($total,2);
  	echo "</b>";
  	echo "</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";*/
}
?>
		<tr>
        <td colspan="5" bgcolor="#CEE7FF" align="right" >Total</td>
        <td><?=$total; ?></td>
        </tr>
        <tr>
          <td></td>
          <td colspan="5" align="right">
          	<input type="hidden" name="ntotal" id="ntotal" value="<? echo $total;?>">
          <button type="button" name="button" id="button" class="btn btn-warning" onclick="window.location='destroysession.php';"> ยกเลิกการสั่งซื้อ </button>
            <button type="button" name="Submit2"  onclick="window.location='confirm.php';" class="btn btn-primary"> 
            <span class="glyphicon glyphicon-shopping-cart"> </span> สั่งซื้อ </button>  <a href="bill.php?order_id=00002=<?=$db['product_id'];?>&act=add">
          </td>
        </tr>
      </form>
<p align="center"> <a href="main.php?module=product" class="btn btn-primary">กลับไปเลือกสินค้า</a> </p>
</body>
</html>