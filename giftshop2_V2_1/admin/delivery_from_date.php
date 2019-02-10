<style type="text/css">
.sizamain1 {
	font-size: 12px;
}
.red {
	color: #F00;
}
.sizemain1 {	font-size: 12px;
}
</style>

<?php
    // $sql_Insert = "insert into tbl_delivery2 (order_id,newname,address_send,telephone_send,mail_send,order_date)
    //                               value ('00100','lplpp','ooopp','081232132','ioiuuyyyt','2019-02-10')";
    // mysql_query($sql_Insert);      
    if (isset($_POST['btn_delivery'])) {
        $kw = $_POST['kw'];
    }
?>

<form action="main.php?module=<?=$module?>" method="post" enctype="multipart/form-data" name="form1" onSubmit="JavaScript:return fncSubmit();">
  <center>
    <h2>
    <? 
      // $resCheck = checkTableDevl();
    ?>
    </h2><br>
    <h2>
    <?
    /*
      if($resCheck == 1){
        $resCheck = "tbl_delivery1";
        moveData($resCheck);
      }else if($resCheck == 2){
        $resCheck = "tbl_delivery2";
        moveData($resCheck);
      }else if($resCheck == 3){
        $resCheck = "tbl_delivery3";
        moveData($resCheck);
      }else if($resCheck == 0){
        echo "ไม่มีพื้นที่ว่าง";
      }
      */
    ?>
    </h2>

    <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr>
    <td width="14%" align="center" bgcolor="#FFCC66"><span class="sizamain1">Test</span></td>
  </tr>
<tr>
    <td align="center" bgcolor="#FFFFFF"><span class="sizamain1">
      <p id="orderId"><?=$kw// การดึงค่า order_id ออกมาแสดง?></p>
    </span></td>
  </tr>
</table>
  </center>
</form>
