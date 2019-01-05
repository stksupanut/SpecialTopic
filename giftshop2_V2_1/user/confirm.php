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
<?
require('../includes/connectdb.in.php');
require('../includes/function.ini.php');
connect_db();
 //$_REQUEST['bank'];
?>
<!-- <script type="text/javascript">
  function sendprovince(){
   var province_id = document.frm.province_id.value;
   window.location = 'confirm.php?province_id='+province_id;
   //console.log(province_id);
  }
  function sendamphur(){
    var province_id = document.frm.province_id.value;
    var amphur_id = document.frm.amphur_id.value;
    window.location = 'confirm.php?province_id='+province_id+'&amphur_id='+amphur_id;
  }
  function senddistrict(){
    var province_id = document.frm.province_id.value;
    var amphur_id = document.frm.amphur_id.value;
    var district_id = document.frm.district_id.value;
    window.location = 'confirm.php?province_id='+province_id+'&amphur_id='+amphur_id+'&district_id='+district_id;
  }
</script> -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript">

//if(<?php // echo $_REQUEST['bank'] == "nr13";?>){
//	window.location.href="javascript:window.print()";
//	}
	                         // Specify a function to execute when the DOM is fully loaded.
$(document).ready(function() {
  var defaultOption = '<option value="">-- โปรดเลือกรายการ --</option>';
                                var AmphurOption = '<option value="">-- โปรดเลือกจังหวัด(ก่อน) --</option>';
                                var DistrictOption = '<option value="">-- โปรดเลือกอำเภอ(ก่อน) --</option>';
                                var loadingImage  = '<label style="color:red;">กำลังโหลดข้อมูล...</label>';
                                // Bind an event handler to the "change" JavaScript event, or trigger that event on an element.
                                $('#selProvince').change(function() {
                                    $("#selAmphur").html(AmphurOption);
                                    $("#selTumbon").html(DistrictOption);
                                    $("#selDistrictCode").html();
                                    // Perform an asynchronous HTTP (Ajax) request.
                                    $.ajax({
                                        // A string containing the URL to which the request is sent.
                                        url: "dropdown_province.php",
                                        // Data to be sent to the server.
                                        data: ({ nextList : 'amphur', provinceID: $('#selProvince').val() }),
                                        // The type of data that you're expecting back from the server.
                                        dataType: "json",
                                        // beforeSend is called before the request is sent
                                        beforeSend: function() {
                                            $("#waitAmphur").html(loadingImage);
                                        },
                                        // success is called if the request succeeds.
                                        success: function(json){
                                            $("#waitAmphur").html("");
                                            // Iterate over a jQuery object, executing a function for each matched element.
                                            $.each(json, function(index, value) {
                                                // Insert content, specified by the parameter, to the end of each element
                                                // in the set of matched elements.
                                                 $("#selAmphur").append('<option value="' + value.prefecture_id + 
                                                                        '">' + value.prefecture_name + '</option>');
                                            });
                                        }
                                    });
                                });

                                $('#selAmphur').change(function() {
                                    $("#selTumbon").html(DistrictOption);
                                    $.ajax({
                                        url: "dropdown_province.php",
                                        data: ({ nextList : 'tumbon', amphurID: $('#selAmphur').val() }),
                                        dataType: "json",
                                        beforeSend: function() {
                                            $("#waitTumbon").html(loadingImage);
                                        },
                                        success: function(json){
                                            $("#waitTumbon").html("");
                                            $.each(json, function(index, value) {
                                                 $("#selTumbon").append('<option value="' + value.district_id + 
                                                                        '">' + value.district_name + '</option>');
                                                 
                                              });
                                        }
                                    });
                                });
                                
                                $('#selTumbon').change(function() {
                                    $("#selDistrictCode").html("");
                                    $.ajax({
                                        url: "dropdown_province.php",
                                        data: ({ nextList : 'districtcode', districtID: $('#selTumbon').val() }),
                                        dataType: "json",
                                        beforeSend: function() {
                                            $("#waitDistrictCode").html(loadingImage);
                                        },
                                        success: function(json){
                                            $("#waitDistrictCode").html("");
                                            $.each(json, function(index, value) {
                                                
                                                $("#selDistrictCode").val(value.postcode) ;
                                            });
                                        }
                                    });
                                });
});
                           
                            </script>
<form id="frm" name="frm" method="post" action="p_addorder.php?">
  

<a href="cart.php">กลับหน้าตะกร้าสินค้า</a> &nbsp;  <button class="btn btn-primary" onClick="window.print()"> print </button></p>


<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th height="134" scope="row">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <th width="276" scope="row"><br />            <img src="../images/g1.png" width="105" height="93" /></th>
          <th width="368" scope="row">www.giftshop.in.th<br />
14/106 ม.2 ต.ลำผักกูด อ.ธัญบุรี จ.ปทุมธานี<br />
0826574298</th>
          <th width="277" scope="row"><br /></th>
        </tr>
      </table>
    <p>ใบสั่งซื้อสินค้า</p>
    <p>&nbsp;</p></th>
  </tr>
  <tr>
    <th height="985" scope="row">

    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" scope="row">วันที่พิมพ์รายงาน
          <?=shotdate($today);?></td>
        <td align="right">เวลาที่พิมพ์ <? echo date("H:i:s")?> น.</td>
      </tr>
    </table>
<br />
      <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
        <tr>
          <th width="422" bgcolor="#FFCC66" scope="row"><span class="fontsize1">ข้อมูลการสั่งซื้อ</span></th>
        </tr>
      </table>
      <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
        <tr>
          <td height="20" colspan="6" align="right" bgcolor="#FFCC66"><span class="fontsize1">รหัสการสั่งซื้อ:
            <?
            $sql = "SELECT * FROM tbl_order ORDER BY order_id DESC";
            $result = mysql_query($sql);
            $number = mysql_num_rows($result);
            //$order_id = mysql_data_seek($result, $number-3);
            $row = mysql_fetch_array($result);
            //$rowid = substr($row['order_id'], -1);
            $rowid = $row['order_id']+1;
            //$rowid = $rowid+1;
            if($rowid<9){
              $runid = "0000$rowid";
            }else if($rowid<99){
              $runid = "000$rowid";
            }else if($rowid<999){
              $runid = "00$rowid";
            }else if($rowid<9999){
              $runid = "0$rowid";
            }else if($rowid<99999){
              $runid = $rowid;
            }
            //echo $row['order_id']+1;
           // echo $order_id;?>
          </span></td>
          <td bgcolor="#FFCC66"><?=$runid; ?></td>
        </tr>
        <tr>
          <input type="hidden" name="order_id" value="<? echo $rowid; ?>" />
          <td width="93" align="center" bgcolor="#FFCC66" class="fontsize1">ลำดับ</td>
          <td width="234" align="center" bgcolor="#FFCC66"><span class="fontsize1">รหัสสินค้า</span></td>
          <td width="234" align="center" bgcolor="#FFCC66"><span class="fontsize1">รายการสินค้า</span></td>
          <td align="center" bgcolor="#FFCC66"><span class="fontsize1">รูปภาพ</span></td>
          <td width="56" align="center" bgcolor="#FFCC66"><span class="fontsize1">จำนวน:ชิ้น</span></td>
          <td width="137" align="center" bgcolor="#FFCC66"><span class="fontsize1">ราคา:หน่วย(บาท)</span></td>
          <td width="89" align="center" bgcolor="#FFCC66"><span class="fontsize1">ราคารวม(บาท)</span></td>
        </tr>
        <?
    $check = array_count_values($_SESSION['cart']);
    foreach (array_unique($_SESSION['cart']) as $key => $idshop) {
      # code...
      $sql = "SELECT * FROM tbl_product WHERE product_id = '$idshop'";
      $result = mysql_query($sql);
      while($db=mysql_fetch_array($result)){
      
    
    $sumprice=$check[$db['product_id']]*$db['product_price'];
      $sumtotal=$sumtotal+$sumprice;
      //$total=$sumtotal+50;
      $no++;
  
	  
		
			
			
		?>
        <tr>
          <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=$no?>
            <?php
			if($no == 1){
				$Item1 = $db['product_name'];
				$_SESSION["Item1"]= $Item1;
			}
			if($no == 2){
				$Item2 = $db['product_name'];
				$_SESSION["Item2"]= $Item2;
			}
            if($no == 3){
				$Item3 = $db['product_name'];
				$_SESSION["Item3"]= $Item3;
			}
            if($no == 4){
				$Item4 = $db['product_name'];
				$_SESSION["Item4"]= $Item4;
			}
            if($no == 5){
				$Item5 = $db['product_name'];
				$_SESSION["Item5"]= $Item5;
			}
            if($no == 6){
				$Item6 = $db['product_name'];
				$_SESSION["Item6"]= $Item6;
			}
            if($no == 7){
				$Item7 = $db['product_name'];
				$_SESSION["Item7"]= $Item7;
			}
            ?>
            
            
            
          </span></td>
          <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=$db['product_id']?>
          </span></td>
          <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=$db['product_name']?>
          </span></td>
          <td><img src="../images/product/<?=$db['product_pic'];?>" style="width: 6em; height: 6em;" /></td>
          <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=$check[$db['product_id']];
            //$db['order_unit'];?>
          </span></td>
          <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=number_format($db['product_price'])?>
          </span></td>
          <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=number_format($sumprice)?>
          </span></td>
        </tr>
        <?
		}
  }
	?>
        <tr>
          <!-- <td><?=$number; ?></td>
            <td><?=$row['product_id'];?></td>
            <td><?=$row['product_name'];?></td>
            <td><?=$row['category_name']; ?></td>
            <td><?=$row['product_price']; ?></td>
            <td><img src="../images/product/<?=$row['product_pic']; ?> " style="width:100px;height:100px;" /></td> -->
          <?  
   //    $sqla="select * from tbl_order as a,tbl_paper as b where a.paper_id = b.paper_id and order_id=$order_id ";	
			// $qrya=mysql_query($sqla);
			// $dba=mysql_fetch_array($qrya);
			// $paper_pic=$dba['paper_pic'];
			// $paper_id=$dba['paper_id'];?>
          <? //if($paper_id==0){} else {
			?>
          <!--   <tr>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">
                ลายกระดาษห่อของขวัญลายที่ <?=$dba['paper_id']?>
                </td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">-</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">-</td>
          </tr> -->
          <? //}?>
          <?
   //         $sqla="select * from tbl_order as a,tbl_ribbon as b where a.ribbon_id = b.ribbon_id and order_id=$order_id ";	
			// $qrya=mysql_query($sqla);
			// $dba=mysql_fetch_array($qrya);
			// $ribbon_pic=$dba['ribbon_pic'];
			// $ribbon_id=$dba['ribbon_id'];
			?>
          <? //if($ribbon_id==0){} else {
					?>
          <!--  <tr>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">
                ลายโบว์ลายที่ <?=$dba['ribbon_id']?>
                </td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">-</td>
                <td align="center" bgcolor="#FFFFFF" class="fontsize1">-</td>
              </tr>
              
					 <? //}?>
              
           <tr> -->
          <td colspan="5" align="right" bgcolor="#FFFFFF"><span class="fontsize1">รวมราคาสินค้า</span></td>
          <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
            <?=number_format($sumtotal)?>
          </span></td>
        </tr>
        <tr class="fontsize1">
          <td colspan="5" align="right" bgcolor="#FFFFFF">ภาษี</td>
          <td align="center" bgcolor="#FFFFFF"><?
            $tax = $sumtotal*1.07;
            $tax2 = $tax-$sumtotal;
            echo $tax2;
            ?></td>
        </tr>
        <tr class="fontsize1">
          <td colspan="5" align="right" bgcolor="#FFFFFF">ค่าจัดส่ง</td>
          <td align="center" bgcolor="#FFFFFF"><?  if($sumtotal<300){ $tax = $tax + 50;
         echo "50"; ?>
            <? }else{echo "-";}    ?></td>
        </tr>
    <td colspan="5" align="right" bgcolor="#FFFFFF"><span class="fontsize1">ราคาสุทธิ</span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="fontsize1">
      <?
        echo number_format($tax,2);
		 // if($sumtotal>=300){
			// 	echo number_format($sumtotal);
			//   }else{
			// 	echo number_format($total); 
			//   } 
		 
		?>
      <input type="hidden" name="total" id="total" value="<?=$tax;?>" />
    </span></td>
  </tr>
      </table>
      <br />
      
 
      <br />
      
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
          <tr>
            <td colspan="2" align="center" bgcolor="#FFCC66"><span class="fontsize1">ข้อมูลการจัดส่งสินค้า</span></td>
          </tr>
          <tr>
            <td width="250px;" align="right" bgcolor="#FFFFFF"><span class="fontsize1">ชื่อ</span></td>
            <td align="left" bgcolor="#FFFFFF"><span class="fontsize1">
            <input type="text" name="cus_name" value="<?php echo $_SESSION["cus_name_b"]; ?>">            
            <?php // echo $_SESSION["selProvince_b"];?></span></td>
          </tr>
          <tr>
            <td width="250px;" align="right" bgcolor="#FFFFFF"><span class="fontsize1">นามสกุล</span></td>
            <td align="left" bgcolor="#FFFFFF"><span class="fontsize1">
            <input type="text" name="cus_name_last" value="<?php echo $_SESSION["cus_name_last_b"]; ?>">            
            <?php // echo $_SESSION["selProvince_b"];?></span></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#FFFFFF"><span class="fontsize1">เบอร์โทร</span></td>
            <td align="left" bgcolor="#FFFFFF"><span class="fontsize1">
            <input type="text" name="custel" value="<?php echo $_SESSION["custel_b"];?>">          
            </span></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#FFFFFF"><span class="fontsize1">อีเมล์</span></td>
            <td align="left" bgcolor="#FFFFFF"><span class="fontsize1">
            <input type="text" name="cusemail" value="<?php echo $_SESSION["cusemail_b"];?>">        
            </span></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#FFFFFF"><span class="fontsize1">ที่อยู่การจัดส่ง</span></td>
            <td align="left" bgcolor="#FFFFFF"><p class="fontsize1">
              <textarea name="address" id="address" cols="50" rows="7" ></textarea>
              <br/>
              เลือกจังหวัด : 
              <?php if($_SESSION["selProvince_b"] != ""){
			  $sql_b = "SELECT * FROM tbl_r_province where province_id = '$_SESSION[selProvince_b]'";
              $result_b = mysql_query($sql_b);
			  $row_b = mysql_fetch_array($result_b);
			  
				  }?>
              <select name="selProvince" id="selProvince">
                <option value="">
                <?php
                if ($row_b != ""){
					echo $row_b['province_name'];
					}else{
				?>
                โปรดเลือกจังหวัด
                <?php }?>
                </option>
                <?
              $sql = "SELECT * FROM tbl_r_province";
              $result = mysql_query($sql);
              while($row = mysql_fetch_array($result)){
              ?>  
                
                
                <option value="<?=$row['province_id'];?>" <?			 if(isset($_GET['province_id'])){
                $province_id = $_GET['province_id'];
                if($province_id==$row['province_id']){
                  echo "selected";
                }
              } ?> >
                  <?=$row['province_name'];?>
                  </option>
                <?
                }
              ?>
                
              </select> 
              <br/>
              เลือกอำเภอ : 
              <select name="selAmphur" id="selAmphur">
                <option>โปรดเลือกอำเภอ</option>
                <? 
              if(isset($_GET['province_id'])){
                $province_id = $_GET['province_id'];
                $sql1 = "SELECT * FROM tbl_r_prefecture WHERE province_id = '$province_id' ";
                
                $result1 = mysql_query($sql1);
                while($row1 = mysql_fetch_array($result1)){
                  ?>
                
                
                <option value="<?=$row1['prefecture_id']?>" <? if(isset($_GET['amphur_id'])){
                $amphur_id = $_GET['amphur_id'];
                if($amphur_id==$row1['prefecture_id']){
                  echo "selected";
                }
              } ?> >
                  <?=$row1['prefecture_name'];?>
                  </option>
                <?
               }
              }
              ?>
              </select>
              <span id="waitAmphur"></span>
              <br/>
              เลือกตำบล : 
              <select name="selTumbon" id="selTumbon">
                <option value="">โปรดเลือกตำบล</option>
                <? 
              if(isset($_GET['amphur_id'])){
                $amphur_id = $_GET['amphur_id'];
                $sql = "SELECT * FROM tbl_r_district WHERE prefecture_id = '$amphur_id'";
                $result = mysql_query($sql);
                while ($row = mysql_fetch_array($result)) {

                  ?>
                <option value="<?=$row['district_id']?>" <? if(isset($_GET['district_id'])){
                  $district_id = $_GET['district_id'];
                  if($district_id==$row['district_id']){
                    echo "selected";
                  }
                 } ?> >
                  <?=$row['district_name'];?>
                  </option>
                
                <?
                }
              }
              ?>
                
              </select>
              <span id="waitTumbon"></span>
              <br />
              <?
            if(isset($_GET['district_id'])){
              $district_id =$_GET['district_id'];
              $sql = "SELECT * FROM tbl_r_postcode WHERE prefecture_id = '$district_id'";
              $result = mysql_query($sql);
              $row = mysql_fetch_array($result);
            }
            ?>
              รหัสไปรษณีย์ :<input type="text" name="selDistrictCode" id="selDistrictCode" value="<?=$row['postcode']?>" readonly>
              <span id="waitDistrictCode"></span>
            </p>
            <p class="fontsize1">  </p>
            <p class="fontsize1">
              
            </p></td>
          </tr>
        </table>
      <p><span class="fontsize1">
         <!-- <input type="button" name="button" id="button2" value="พิมพ์หน้านี้" onclick="javascript:window.print()" /> class="btn btn-primary"-->
         <!--<button  type"submit"onClick="window.print()"> สั่งซื้อสินค้า </button>-->
    <input name="submit" type="submit"  onClick="window.print()" value="สั่งซื้อสินค้า" align="middle" /></th>
  </tr>
</table>
</form>
</body>
</html>
</body>
</html>