<?
date_default_timezone_set("Asia/Bangkok");
$thaimonth=array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม","มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน","ตุลาคม","พฤศจิกายน", "ธันวาคม");	

$thaimonth2=array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม","มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน","ตุลาคม","พฤศจิกายน", "ธันวาคม");
$today=date('Y-m-d');
$today2=date('Y-m-d H:i:s');

function dateThai($date){
	$_month_name = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy+=543;
	$dateT=intval($dd)." ".$_month_name[$mm]." ".$yy." ".$time;
	return $dateT;
	}


function timeThai($date){
	$_month_name = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy+=543;
	$dateT=$time;
	return $dateT;
	}
	
function ChangeDateShot($date){
	
		global $thaimonth;

		$txtDate=explode("-",$date);
		$date=$txtDate[0]." ";
		$date.=$thaimonth[$txtDate[1]-1]." ";
		$date.=$txtDate[2]+0 ." ";
		
		return $date;
	}
	
	function shotdate($date){
	
		global $thaimonth2;

		$txtDate=explode("-",$date);
		$date=$txtDate[2]+0 ." ";
		$date.=$thaimonth2[$txtDate[1]-1]." ";
		$date.=$txtDate[0]+543;
		
		return $date;
	}
	
	
 function ChangeMonthShot($date){
	
		global $thaimonth;

		$txtDate=explode("-",$date);
		$date=$thaimonth[$txtDate[1]-1]." ";
		$date.=$txtDate[0]+543;
		
		return $date;
	}

function getDataProduct($product_id){
	
	$sql="select * from tbl_product where product_id='$product_id'";
	$qry=mysql_query($sql);
	$db=mysql_fetch_array($qry);
	$array['product_name']=$db['product_name'];
	$array['product_pic']=$db['product_pic'];
	$array['product_price']=$db['product_price'];
	$array['product_detail']=$db['product_detail'];
	
	return $array;
	}
	
function getsubcatename($subcategory_id){
	
	$sql="select * from tbl_subcategory where subcategory_id='$subcategory_id'";
	$qry=mysql_query($sql);
	$db=mysql_fetch_array($qry);
	$subcategory_name=$db['subcategory_name'];
	
	return $subcategory_name;
}



function CheckOrderExpire(){
	
	 $sqlC="select *  from tbl_order where now() > DATE_ADD(order_date,INTERVAL 3 DAY) and order_status=0";
	
	 $qryC=mysql_query($sqlC);
	$numC=mysql_num_rows($qryC);
	while($dbC=mysql_fetch_array($qryC)){
		
		// check ว่ารายการที่วันที่หมดอายุน้อยกว่าวันที่ปัจจุบันมีกี่รายการมาวนลูป เพื่อมากำหนดคือจำนวนสินค้า
		$sql="select * from tbl_order_lists where order_id='".$dbC['order_id']."' ";
		$qry=mysql_query($sql);
		while($db=mysql_fetch_array($qry)){
	         /// ส่วนของอัพเดทจำนวนสินค้าคืน 
		$sqlupdate="update tbl_product set product_unit=product_unit+'".$db['order_unit']."' where product_id='".$db['product_id']."'  ";
		mysql_query($sqlupdate);
		}//while($db=mysql_fetch_array($qry)){
		
				
		$sql="update tbl_order set order_status=3  where order_id='".$dbC['order_id']."' ";
		mysql_query($sql);
	
	} //while($dbC=mysql_fetch_array($qryC)){
	
	return $numC;  // return  จำนวนรายการที่หมดอายุ เพื่อไปทำ alert เตื่อนตอนที่ admin login  
	
}

 function ShowNewIcon($DateDB){
	$Today = date("Y-m-d");
	$NewDate = date ("Y-m-d", strtotime("-5 days", strtotime($Today)));
	if($DateDB >= $NewDate){
		$IconNew = "<img src=\"images/newicon.gif\" width=\"25\" height=\"11\" />";
	}else{
		$IconNew = "";
	}
	return $IconNew;	
}



function sumbuyBystockid($order_id){
	
	$sql="select sum(product_price) as totalnet ,sum(order_unit) as totalpro from tbl_order_lists where order_id=$order_id";
	$qry=mysql_query($sql);
	$db=mysql_fetch_array($qry);
	
	$array['totalnet']=$db['totalnet'];
	$array['totalpro']=$db['totalpro'];
	
	return $array;
}

function sumbuyBystockid3($order_id){
	
	$sql="select * from tbl_order_lists as a,tbl_product as b where a.product_id=b.product_id and a.order_id=$order_id";
	$qry=mysql_query($sql);
	while($db=mysql_fetch_array($qry)){
	$order_unit=$db['order_unit'];
	$product_price=$db['product_price'];
	$sum=$order_unit*$product_price;
	$sumprice=$sumprice+$sum;
	
	if($sumprice>=300){
		$net=$sumprice;
	}else{
		$net=$sumprice+50;
	}
	$net=$sumprice;
	}
	
	return $net;
}

function sumtotalpriceorder_lists($order_id){
		
		$sql="select * from tbl_order_lists where order_id=$order_id" ;
		$qry=mysql_query($sql);
		while($db=mysql_fetch_array($qry)){
			/*`product_price``order_unit`*/
			$sumpricebyproduct=$db['product_price']*$db['order_unit'];
			$sumtotal=$sumtotal+$sumpricebyproduct;
			
			//$sumprice=$db['order_unit']*$db['product_price'];
			//$sumtotal=$sumtotal+$sumprice;
			
			if($sumtotal>=300){
				$sto=$sumtotal;
			}else{
				$sto=$sumtotal+50;
			}
		}
		
		return  $sto;
		
	}
	
function PageNext($totalpage,$setMaxPage,$p,$urlpage){

				($setMaxPage > $totalpage) ? $setMaxPage = $totalpage : "";
				
				(($setMaxPage%2)>0) ? $setMiddle = ((int) ($setMaxPage/2))+1 : $setMiddle = (int) ($setMaxPage/2);
				$pageLess = $totalpage - $p;
				$setLoop = $setMaxPage - $setMiddle;

				if ($p <= $setMaxPage)
					{
						for($i=1 ; $i<$p ; $i++) 
							echo " <a href=\"$urlpage&p=$i\"class=\"txt7\">$i</a>";
							echo " <font color=red><b>$p</b></font> ";

						for($i=($p+1) ; $i<=$setMaxPage ; $i++) 
							echo " <a href=\"$urlpage&p=$i\"class=\"txt7\">$i</a>";

						if ($setMaxPage != $totalpage)
							{
								echo " <a href=\"$urlpage&p=" . ($setMaxPage+1) . "\"class=\"txt7\"><b>&gt;</b></a>";
								echo " <a href=\"$urlpage&p=$totalpage\"class=\"txt6\"><b>&gt;|</b></a>";
							}
					}
				elseif ($pageLess < $setMaxPage)
						{

							$iii =  $setMaxPage - ($pageLess + 1);
							$ii = $p - $iii;
							$iLoop = $ii + $iii;

							if ($setMaxPage != $totalpage)
								{
									$iii = $ii-1;
									echo "<a href=\"$urlpage&p=1\"class=\"txt6\"><b>|&lt;</b></a> ";
									echo " <a href=\"$urlpage&p=" . $iii . "\"class=\"txt7\"><b>&lt;</b></a>";
								}


							for($i=$ii ; $i<$iLoop ; $i++) 
									echo " <a href=\"$urlpage&p=$i\"class=\"txt7\">$i</a>";
									echo " <font color=red><b>$p</b></font> ";

							for($i=1 ; $i<=$pageLess ; $i++) 
									{
										$ii = $p + $i;
										echo " <a href=\"$urlpage&p=$ii\"class=\"txt7\">$ii</a>";
									}
						}else{

						$iii = $p - $setMiddle;

						echo "<a href=\"$urlpage&p=1\"class=\"txt6\"><b>|&lt;</b></a> ";
						echo " <a href=\"$urlpage&p=" . $iii . "\"class=\"txt7\"><b>&lt;</b></a>";

						for($i=1 ; $i<=$setLoop ; $i++)
					{
								$ii = ($p - ($setLoop - $i))-1;
								echo " <a href=\"$urlpage&p=$ii\"class=\"txt7\">$ii</a>";
					}
								echo " <font color=red><b>$p</b></font> ";

						$setLoop = $setMaxPage - ($setLoop + 1);

						for($i=1 ; $i<=$setLoop ; $i++)
					{
								$ii = $p + $i;
								echo " <a href=\"$urlpage&p=$ii\"class=\"txt7\">$ii</a>";
					}
						echo " <a href=\"$urlpage&p=" . ($ii+1) . "\"class=\"txt7\"><b>&gt;</b></a>";
						echo " <a href=\"$urlpage&p=$totalpage\"class=\"txt6\"><b>&gt;|</b></a>";
					}
								
}

function PageNext2($totalpage,$setMaxPage,$p,$urlpage){

				($setMaxPage > $totalpage) ? $setMaxPage = $totalpage : "";
				
				(($setMaxPage%2)>0) ? $setMiddle = ((int) ($setMaxPage/2))+1 : $setMiddle = (int) ($setMaxPage/2);
				$pageLess = $totalpage - $p;
				$setLoop = $setMaxPage - $setMiddle;

				if ($p <= $setMaxPage)
					{
						for($i=1 ; $i<$p ; $i++) 
							echo " <a href=\"$urlpage&p=$i\"class=\"txt7\">$i</a>";
							echo " <font color=red><b>$p</b></font> ";

						for($i=($p+1) ; $i<=$setMaxPage ; $i++) 
							echo " <a href=\"$urlpage&p=$i\"class=\"txt7\">$i</a>";

						if ($setMaxPage != $totalpage)
							{
								echo " <a href=\"$urlpage&p=" . ($setMaxPage+1) . "\"class=\"txt7\"><b>&gt;</b></a>";
								echo " <a href=\"$urlpage&p=$totalpage\"class=\"txt6\"><b>&gt;|</b></a>";
							}
					}
				elseif ($pageLess < $setMaxPage)
						{

							$iii =  $setMaxPage - ($pageLess + 1);
							$ii = $p - $iii;
							$iLoop = $ii + $iii;

							if ($setMaxPage != $totalpage)
								{
									$iii = $ii-1;
									echo "<a href=\"$urlpage&p=1\"class=\"txt6\"><b>|&lt;</b></a> ";
									echo " <a href=\"$urlpage&p=" . $iii . "\"class=\"txt7\"><b>&lt;</b></a>";
								}


							for($i=$ii ; $i<$iLoop ; $i++) 
									echo " <a href=\"$urlpage&p=$i\"class=\"txt7\">$i</a>";
									echo " <font color=red><b>$p</b></font> ";

							for($i=1 ; $i<=$pageLess ; $i++) 
									{
										$ii = $p + $i;
										echo " <a href=\"$urlpage&p=$ii\"class=\"txt7\">$ii</a>";
									}
						}else{

						$iii = $p - $setMiddle;

						echo "<a href=\"$urlpage&p=1\"class=\"txt6\"><b>|&lt;</b></a> ";
						echo " <a href=\"$urlpage&p=" . $iii . "\"class=\"txt7\"><b>&lt;</b></a>";

						for($i=1 ; $i<=$setLoop ; $i++)
					{
								$ii = ($p - ($setLoop - $i))-1;
								echo " <a href=\"$urlpage&p=$ii\"class=\"txt7\">$ii</a>";
					}
								echo " <font color=red><b>$p</b></font> ";

						$setLoop = $setMaxPage - ($setLoop + 1);

						for($i=1 ; $i<=$setLoop ; $i++)
					{
								$ii = $p + $i;
								echo " <a href=\"$urlpage&p=$ii\"class=\"txt7\">$ii</a>";
					}
						echo " <a href=\"$urlpage&p=" . ($ii+1) . "\"class=\"txt7\"><b>&gt;</b></a>";
						echo " <a href=\"$urlpage&p=$totalpage\"class=\"txt6\"><b>&gt;|</b></a>";
					}
								
}

function cunit($order_id){
	$sql="select * from tbl_order_lists where order_id=$order_id" ;
	$qry=mysql_query($sql);
	while($db=mysql_fetch_array($qry)){
			/*`product_price``order_unit`*/
	$sumpricebyproduct=$db['product_price']*$db['order_unit'];
	$sumtotal=$sumtotal+$sumpricebyproduct;
			//$sumprice=$db['order_unit']*$db['product_price'];
			//$sumtotal=$sumtotal+$sumprice;
	if($sumtotal>=300){$sto=$sumtotal;}else{$sto=$sumtotal+50;}
	}
	return $sto;
}

function CheckOrderUnit($order_id){
	
	 $sqlC="select *  from tbl_order where order_status=1 and order_id=$order_id ";
	
	 $qryC=mysql_query($sqlC);
	$numC=mysql_num_rows($qryC);
	while($dbC=mysql_fetch_array($qryC)){
		
		// check ว่ารายการที่วันที่หมดอายุน้อยกว่าวันที่ปัจจุบันมีกี่รายการมาวนลูป เพื่อมากำหนดคือจำนวนสินค้า
	$sql="select * from tbl_order_lists where order_id='".$dbC['order_id']."' ";
		$qry=mysql_query($sql);
		while($db=mysql_fetch_array($qry)){
	         /// ส่วนของอัพเดทจำนวนสินค้าคืน 
	 $sqlupdate="update tbl_product set product_unit=product_unit-'".$db['order_unit']."' where product_id='".$db['product_id']."'  ";
		mysql_query($sqlupdate);
		}//while($db=mysql_fetch_array($qry)){
		
				
		/*$sql="update tbl_order set order_status=3  where order_id='".$dbC['order_id']."' ";
		mysql_query($sql);*/
	
	} //while($dbC=mysql_fetch_array($qryC)){
	
	return $numC;  // return  จำนวนรายการที่หมดอายุ เพื่อไปทำ alert เตื่อนตอนที่ admin login  
	
	
}

function sumtotalprice(){
	$sqltotalz="SELECT * FROM tbl_order_lists AS a, tbl_product AS b, tbl_order as d WHERE a.product_id=b.product_id AND a.order_id=d.order_id AND d.order_status=4";
	$totalz = mysql_query($sqltotalz);
	while($dbtotalz=mysql_fetch_array($totalz)){ 
		$sumtotalprice=$dbtotalz['product_price']*$dbtotalz['order_unit'];
		$zz=$zz+$sumtotalprice;
	}
	return $zz;
}

function sumtotalprice2(){
	echo $sqltotalz="SELECT * FROM tbl_order_lists AS a, tbl_product AS b, tbl_order as d WHERE a.product_id=b.product_id AND a.order_id=d.order_id AND d.order_status=4";
	$totalz = mysql_query($sqltotalz);
	while($dbtotalz=mysql_fetch_array($totalz)){ 
		$sumtotalprice=$dbtotalz['product_price']*$dbtotalz['order_unit'];
		$zz=$zz+$sumtotalprice;
	}
	return $zz;
}
// Delivery Function
/*
function testShowData() {
	$orderId = $db['order_id'];
    echo "<script language=\"javascript\">alert($orderId);</script>"; 
}
*/
?>



