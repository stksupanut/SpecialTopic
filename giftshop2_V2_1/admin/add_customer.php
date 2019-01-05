<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
require('../includes/connectdb.in.php'); 
require('../includes/function.ini.php');
connect_db();
?>
<script type="text/javascript">
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
<form id="frm" name="frm" method="post" action="main.php?module=customer?">
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
          <tr>
            <td colspan="2" align="center" bgcolor="#FFCC66"><span class="fontsize1">เพิ่มข้อมูลลูกค้า</span></td>
          </tr>
          <tr>
            <td width="250px;" align="right" bgcolor="#FFFFFF"><span class="fontsize1">ชื่อ - นามสกุล</span></td>
            <td align="left" bgcolor="#FFFFFF"><span class="fontsize1">
            <input type="text" name="cus_name">            
            </span></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#FFFFFF"><span class="fontsize1">เบอร์โทร</span></td>
            <td align="left" bgcolor="#FFFFFF"><span class="fontsize1">
            <input type="text" name="custel">          
            </span></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#FFFFFF"><span class="fontsize1">อีเมล์</span></td>
            <td align="left" bgcolor="#FFFFFF"><span class="fontsize1">
            <input type="text" name="cusemail">        
            </span></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#FFFFFF"><span class="fontsize1">ที่อยู่การจัดส่ง</span></td>
            <td align="left" bgcolor="#FFFFFF"><p class="fontsize1">
              <textarea name="address" id="address" cols="50" rows="7"></textarea>
              <br/>
              เลือกจังหวัด : 
              <select name="selProvince" id="selProvince">
                <option value="">โปรดเลือกจังหวัด</option>
                <?
              $sql = "SELECT * FROM tbl_r_province";
              $result = mysql_query($sql);
              while($row = mysql_fetch_array($result)){
              ?>  
                
                
                <option value="<?=$row['province_id'];?>" <? if(isset($_GET['province_id'])){
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
          <input type="button" name="button" id="button2" value="พิมพ์หน้านี้" onclick="javascript:window.print()" />
    </span><input name="submit" type="submit"  value="เพิ่ม" align="middle" /></p></th>
  </tr>
</table>
</form>

</body>
</html>