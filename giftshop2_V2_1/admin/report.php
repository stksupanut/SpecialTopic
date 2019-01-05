<?
/*
SELECT * FROM `tbl_product` WHERE `product_id`, `product_name`, `product_pic`, `product_price`, `product_detail`, `category_id`, `deleted`, `isenable`, `datecreated`
*/
$product_id=$_REQUEST['product_id'];
$product_name=$_REQUEST['product_name'];
$product_price=$_REQUEST['product_price'];
$product_detail=$_REQUEST['product_detail'];
$product_unit=$_REQUEST['product_unit'];
$category_id=$_REQUEST['category_id'];
$category_id2=$_REQUEST['category_id2'];
$subcategory_id=$_REQUEST['subcategory_id'];
$keyword=$_REQUEST['keyword'];


$list_page=50;
$setMaxPage=10;
$fdate=$_REQUEST['fdate'];
$month=$_REQUEST['month'];
$year=$_REQUEST['year'];
?>

<style type="text/css">
.red {
	color: #F00;
}
.sizemain1 {
	font-size: 12px;
}
</style>


<?
switch($mode){
	
case reportcirculation :
?>









			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

			<script language=JavaScript>

		var datePickerDivID = "datepicker";
			var iFrameDivID = "datepickeriframe";

			var dayArrayShort = new Array('อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.');
			var dayArrayMed = new Array('อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.');
			var dayArrayLong = new Array('วันอาทิตย์', 'วันจันทร์', 'วันอังคาร', 'วันพุธ', 'วันพฤหัสบดี', 'วันศุกร์', 'วันเสาร์');
			var monthArrayShort = new Array('ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.');
			var monthArrayMed = new Array('ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.');
			var monthArrayLong = new Array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
 
			var defaultDateSeparator = "/";        // รูปแบบตัวคั่นระหว่าง วัน เดือน ปี (มี "/" or ".")
			var defaultDateFormat = "ymd"    // ใส่รูปแบบการเรียงลำดับของ วัน เดือน ปี ครับ (มี "mdy", "dmy", and "ymd")
			var dateSeparator = defaultDateSeparator;
			var dateFormat = defaultDateFormat;


			function displayDatePicker(dateFieldName, displayBelowThisObject, dtFormat, dtSep)
			{
 			 var targetDateField = document.getElementsByName (dateFieldName).item(0);
 
  // if we weren't told what node to display the datepicker beneath, just display it
  // beneath the date field we're updating
 			 if (!displayBelowThisObject)
 			   displayBelowThisObject = targetDateField;
 
  // if a date separator character was given, update the dateSeparator variable
			  if (dtSep)
			    dateSeparator = dtSep;
			 else
 			   dateSeparator = defaultDateSeparator;
 
  // if a date format was given, update the dateFormat variable
  			if (dtFormat)
 			   dateFormat = dtFormat;
			  else
 			   dateFormat = defaultDateFormat;
 
 			 var x = displayBelowThisObject.offsetLeft;
 			 var y = displayBelowThisObject.offsetTop + displayBelowThisObject.offsetHeight ;
 
  // deal with elements inside tables and such
 			 var parent = displayBelowThisObject;
 			 while (parent.offsetParent) {
  			  parent = parent.offsetParent;
  			  x += parent.offsetLeft;
  			  y += parent.offsetTop ;
			  }
 			
  			drawDatePicker(targetDateField, x, y);
			}


/**
Draw the datepicker object (which is just a table with calendar elements) at the
specified x and y coordinates, using the targetDateField object as the input tag
that will ultimately be populated with a date.

This function will normally be called by the displayDatePicker function.
*/
			function drawDatePicker(targetDateField, x, y)
			{
 			 var dt = getFieldDate(targetDateField.value );
 
  // the datepicker table will be drawn inside of a <div> with an ID defined by the
  // global datePickerDivID variable. If such a div doesn't yet exist on the HTML
  // document we're working with, add one.
  if (!document.getElementById(datePickerDivID)) {
    // don't use innerHTML to update the body, because it can cause global variables
    // that are currently pointing to objects on the page to have bad references
    //document.body.innerHTML += "<div id='" + datePickerDivID + "' class='dpDiv'></div>";
    var newNode = document.createElement("div");
    newNode.setAttribute("id", datePickerDivID);
    newNode.setAttribute("class", "dpDiv");
    newNode.setAttribute("style", "visibility: hidden;");
    document.body.appendChild(newNode);
  }
 
  // move the datepicker div to the proper x,y coordinate and toggle the visiblity
  var pickerDiv = document.getElementById(datePickerDivID);
  pickerDiv.style.position = "absolute";
  pickerDiv.style.left = x + "px";
  pickerDiv.style.top = y + "px";
  pickerDiv.style.visibility = (pickerDiv.style.visibility == "visible" ? "hidden" : "visible");
  pickerDiv.style.display = (pickerDiv.style.display == "block" ? "none" : "block");
  pickerDiv.style.zIndex = 10000;
 
  // draw the datepicker table
  refreshDatePicker(targetDateField.name, dt.getFullYear(), dt.getMonth(), dt.getDate());
}


/**
This is the function that actually draws the datepicker calendar.
*/
function refreshDatePicker(dateFieldName, year, month, day)

{
  // if no arguments are passed, use today's date; otherwise, month and year
  // are required (if a day is passed, it will be highlighted later)
  var thisDay = new Date();
 
  if ((month >= 0) && (year > 0)) {
    thisDay = new Date(year, month, 1);
  } else {
    day = thisDay.getDate();
    thisDay.setDate(1);
  }
 
  // the calendar will be drawn as a table
  // you can customize the table elements with a global CSS style sheet,
  // or by hardcoding style and formatting elements below
  var crlf = "\r\n";
  var TABLE = "<table cols=7 class='dpTable'>" + crlf;
  var xTABLE = "</table>" + crlf;
  var TR = "<tr class='dpTR'>";
  var TR_title = "<tr class='dpTitleTR'>";
  var TR_days = "<tr class='dpDayTR'>";
  var TR_todaybutton = "<tr class='dpTodayButtonTR'>";
  var xTR = "</tr>" + crlf;
  var TD = "<td class='dpTD' onMouseOut='this.className=\"dpTD\";' onMouseOver=' this.className=\"dpTDHover\";' ";    // leave this tag open, because we'll be adding an onClick event
  var TD_title = "<td colspan=5 class='dpTitleTD'>";
  var TD_buttons = "<td class='dpButtonTD'>";
  var TD_todaybutton = "<td colspan=7 class='dpTodayButtonTD'>";
  var TD_days = "<td class='dpDayTD'>";
  var TD_selected = "<td class='dpDayHighlightTD' onMouseOut='this.className=\"dpDayHighlightTD\";' onMouseOver='this.className=\"dpTDHover\";' ";    // leave this tag open, because we'll be adding an onClick event
  var xTD = "</td>" + crlf;
  var DIV_title = "<div class='dpTitleText'>";
  var DIV_selected = "<div class='dpDayHighlight'>";
  var xDIV = "</div>";
 
  // start generating the code for the calendar table
  var html = TABLE;
 
  // this is the title bar, which displays the month and the buttons to
  // go back to a previous month or forward to the next month
  html += TR_title;
  html += TD_buttons + getButtonCode(dateFieldName, thisDay, -1, "<") + xTD;
  html += TD_title + DIV_title + monthArrayLong[ thisDay.getMonth()] + " " + thisDay.getFullYear() + xDIV + xTD;
  html += TD_buttons + getButtonCode(dateFieldName, thisDay, 1, ">") + xTD;
  html += xTR;
 
  // this is the row that indicates which day of the week we're on
  html += TR_days;
  for(i = 0; i < dayArrayShort.length; i++)
    html += TD_days + dayArrayShort[i] + xTD;
  html += xTR;
 
  // now we'll start populating the table with days of the month
  html += TR;
 
  // first, the leading blanks
  for (i = 0; i < thisDay.getDay(); i++)
    html += TD + " " + xTD;
 
  // now, the days of the month
  do {
    dayNum = thisDay.getDate();
    TD_onclick = " onclick=\"updateDateField('" + dateFieldName + "', '" + getDateString(thisDay) + "');\">";
    
    if (dayNum == day)
      html += TD_selected + TD_onclick + DIV_selected + dayNum + xDIV + xTD;
    else
      html += TD + TD_onclick + dayNum + xTD;
    
    // if this is a Saturday, start a new row
    if (thisDay.getDay() == 6)
      html += xTR + TR;
    
    // increment the day
    thisDay.setDate(thisDay.getDate() + 1);
  } while (thisDay.getDate() > 1)
 
  // fill in any trailing blanks
  if (thisDay.getDay() > 0) {
    for (i = 6; i > thisDay.getDay(); i--)
      html += TD + " " + xTD;
  }
  html += xTR;
 
  // add a button to allow the user to easily return to today, or close the calendar
  var today = new Date();
  var todayString = "Today is " + dayArrayMed[today.getDay()] + ", " + monthArrayMed[ today.getMonth()] + " " + today.getDate();
  html += TR_todaybutton + TD_todaybutton;
 
  html += "<button class='dpTodayButton' onClick='updateDateField(\"" + dateFieldName + "\");'>close</button>";
  html += xTD + xTR;
 
  // and finally, close the table
  html += xTABLE;
 
  document.getElementById(datePickerDivID).innerHTML = html;
  // add an "iFrame shim" to allow the datepicker to display above selection lists
  adjustiFrame();
}


/**
Convenience function for writing the code for the buttons that bring us back or forward
a month.
*/
function getButtonCode(dateFieldName, dateVal, adjust, label)
{
  var newMonth = (dateVal.getMonth () + adjust) % 12;
  var newYear = dateVal.getFullYear() + parseInt((dateVal.getMonth() + adjust) / 12);
  if (newMonth < 0) {
    newMonth += 12;
    newYear += -1;
  }
 
  return "<button class='dpButton' onClick='refreshDatePicker(\"" + dateFieldName + "\", " + newYear + ", " + newMonth + ");'>" + label + "</button>";
}


/**
Convert a JavaScript Date object to a string, based on the dateFormat and dateSeparator
variables at the beginning of this script library.
*/
function getDateString(dateVal)
{
  var dayString = "00" + dateVal.getDate();
  var monthString = "00" + (dateVal.getMonth()+1);
  dayString = dayString.substring(dayString.length - 2);
  monthString = monthString.substring(monthString.length - 2);
 
  switch (dateFormat) {
    case "dmy" :
      return dayString + dateSeparator + monthString + dateSeparator + dateVal.getFullYear();
    case "ymd" :
      return dateVal.getFullYear() + dateSeparator + monthString + dateSeparator + dayString;
    case "mdy" :
    default :
      return monthString + dateSeparator + dayString + dateSeparator + dateVal.getFullYear();
  }
}


/**
Convert a string to a JavaScript Date object.
*/
function getFieldDate(dateString)
{
  var dateVal;
  var dArray;
  var d, m, y;
 
  try {
    dArray = splitDateString(dateString);
    if (dArray) {
      switch (dateFormat) {
        case "dmy" :
          d = parseInt(dArray[0], 10);
          m = parseInt(dArray[1], 10) - 1;
          y = parseInt(dArray[2], 10);
          break;
        case "ymd" :
          d = parseInt(dArray[2], 10);
          m = parseInt(dArray[1], 10) - 1;
          y = parseInt(dArray[0], 10);
          break;
        case "mdy" :
        default :
          d = parseInt(dArray[1], 10);
          m = parseInt(dArray[0], 10) - 1;
          y = parseInt(dArray[2], 10);
          break;
      }
      dateVal = new Date(y, m, d);
    } else if (dateString) {
      dateVal = new Date(dateString);
    } else {
      dateVal = new Date();
    }
  } catch(e) {
    dateVal = new Date();
  }
 
  return dateVal;
}


/**
Try to split a date string into an array of elements, using common date separators.
If the date is split, an array is returned; otherwise, we just return false.
*/
function splitDateString(dateString)
{
  var dArray;
  if (dateString.indexOf("/") >= 0)
    dArray = dateString.split("/");
  else if (dateString.indexOf(".") >= 0)
    dArray = dateString.split(".");
  else if (dateString.indexOf("-") >= 0)
    dArray = dateString.split("-");
  else if (dateString.indexOf("\\") >= 0)
    dArray = dateString.split("\\");
  else
    dArray = false;
 
  return dArray;
}

/**
Update the field with the given dateFieldName with the dateString that has been passed,
and hide the datepicker. If no dateString is passed, just close the datepicker without
changing the field value.

Also, if the page developer has defined a function called datePickerClosed anywhere on
the page or in an imported library, we will attempt to run that function with the updated
field as a parameter. This can be used for such things as date validation, setting default
values for related fields, etc. For example, you might have a function like this to validate
a start date field:

function datePickerClosed(dateField)
{
  var dateObj = getFieldDate(dateField.value);
  var today = new Date();
  today = new Date(today.getFullYear(), today.getMonth(), today.getDate());
 
  if (dateField.name == "StartDate") {
    if (dateObj < today) {
      // if the date is before today, alert the user and display the datepicker again
      alert("Please enter a date that is today or later");
      dateField.value = "";
      document.getElementById(datePickerDivID).style.visibility = "visible";
      adjustiFrame();
    } else {
      // if the date is okay, set the EndDate field to 7 days after the StartDate
      dateObj.setTime(dateObj.getTime() + (7 * 24 * 60 * 60 * 1000));
      var endDateField = document.getElementsByName ("EndDate").item(0);
      endDateField.value = getDateString(dateObj);
    }
  }
}

*/
function updateDateField(dateFieldName, dateString)
{
  var targetDateField = document.getElementsByName (dateFieldName).item(0);
  if (dateString)
    targetDateField.value = dateString;
 
  var pickerDiv = document.getElementById(datePickerDivID);
  pickerDiv.style.visibility = "hidden";
  pickerDiv.style.display = "none";
 
  adjustiFrame();
  targetDateField.focus();
 
  // after the datepicker has closed, optionally run a user-defined function called
  // datePickerClosed, passing the field that was just updated as a parameter
  // (note that this will only run if the user actually selected a date from the datepicker)
  if ((dateString) && (typeof(datePickerClosed) == "function"))
    datePickerClosed(targetDateField);
}


/**
Use an "iFrame shim" to deal with problems where the datepicker shows up behind
selection list elements, if they're below the datepicker. The problem and solution are
described at:

http://dotnetjunkies.com/WebLog/jking/archive/2003/07/21/488.aspx
http://dotnetjunkies.com/WebLog/jking/archive/2003/10/30/2975.aspx
*/
function adjustiFrame(pickerDiv, iFrameDiv)
{
  // we know that Opera doesn't like something about this, so if we
  // think we're using Opera, don't even try
  var is_opera = (navigator.userAgent.toLowerCase().indexOf("opera") != -1);
  if (is_opera)
    return;
  
  // put a try/catch block around the whole thing, just in case
  try {
    if (!document.getElementById(iFrameDivID)) {
      // don't use innerHTML to update the body, because it can cause global variables
      // that are currently pointing to objects on the page to have bad references
      //document.body.innerHTML += "<iframe id='" + iFrameDivID + "' src='javascript:false;' scrolling='no' frameborder='0'>";
      var newNode = document.createElement("iFrame");
      newNode.setAttribute("id", iFrameDivID);
      newNode.setAttribute("src", "javascript:false;");
      newNode.setAttribute("scrolling", "no");
      newNode.setAttribute ("frameborder", "0");
      document.body.appendChild(newNode);
    }
    
    if (!pickerDiv)
      pickerDiv = document.getElementById(datePickerDivID);
    if (!iFrameDiv)
      iFrameDiv = document.getElementById(iFrameDivID);
    
    try {
      iFrameDiv.style.position = "absolute";
      iFrameDiv.style.width = pickerDiv.offsetWidth;
      iFrameDiv.style.height = pickerDiv.offsetHeight ;
      iFrameDiv.style.top = pickerDiv.style.top;
      iFrameDiv.style.left = pickerDiv.style.left;
      iFrameDiv.style.zIndex = pickerDiv.style.zIndex - 1;
      iFrameDiv.style.visibility = pickerDiv.style.visibility ;
      iFrameDiv.style.display = pickerDiv.style.display;
    } catch(e) {
    }
 
  } catch (ee) {
  }
 
}

</script>


  
  <?
break;
case reportinventory :
?>
  
<br />


<table width="200" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr>
    <td align="center" bgcolor="#FFFFFF" class="sizemain1">สรุปสินค้าคงเหลือ</td>
  </tr>
</table>
<br />
<?
$sql="select * from tbl_product as a,tbl_category as b where a.category_id=b.category_id order by category_name asc,product_name asc";
//ทำให้ฐานข้อมูลทำงาน
$qry=mysql_query($sql);
$numrow=mysql_num_rows($qry);
?>

 <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr>
    <td width="5%" align="center" bgcolor="#FFCC66"><span class="sizemain1">ลำดับ</span></td>
    <td width="7%" align="center" bgcolor="#FFCC66" class="sizemain1">รหัสสินค้า</td>
    <td width="59%" align="center" bgcolor="#FFCC66"><span class="sizemain1">รายการสินค้า</span></td>
    <td width="17%" align="center" bgcolor="#FFCC66"><span class="sizemain1">หมวดหมู่</span></td>
    <td width="12%" align="center" bgcolor="#FFCC66"><span class="sizemain1">จำนวนคงเหลือ</span></td>
   </tr>
  <?
  if($numrow==0){
  
  ?>
  <tr>
    <td colspan="5" bgcolor="#FFFFFF"><span class="sizemain1">ไม่มีข้อมูล</span></td>
  </tr>
  <? 
  }else{
  	$i=1;
	//คำสั่งให้วนลูป
	while($db=mysql_fetch_array($qry)){
  $no++;
  ?>
  <tr>
    <td height="23" align="center" bgcolor="#FFFFFF"><span class="sizemain1">
      <?=$no?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizemain1">
      <?=$db['product_id']?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <th width="14%" scope="row">&nbsp;</th>
          <td width="14%">&nbsp;</td>
          <td width="5%">&nbsp;</td>
          <td width="49%"><span class="sizemain1">
            <?=$db['product_name']?>
          </span></td>
          <td width="3%">&nbsp;</td>
          <td width="15%">&nbsp;</td>
        </tr>
    </table></td>
    <td align="center" bgcolor="#FFFFFF"><table width="200" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" scope="row"><span class="sizemain1">
            <?=$db['category_name']?>
/
<?=getsubcatename($db['subcategory_id'])?>
          </span></td>
        </tr>
    </table></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizemain1">
      <?=$db['product_unit']?>
    </span></td>
   </tr>
  <?
  $i++;
  	}	//while
  }	   //if
  
  
  ?>
  
  
  
  
  
  
  
</table>
    <br />
    <table width="650" border="0" align="center" cellpadding="1" cellspacing="1">
      <tr>
        <td align="center"><a href="print_reportinventory" target="_blank" class="sizemain1"><img src="../images/print-icon.png" width="35" height="35" /></a></td>
      </tr>
</table>
<br />







<?
break;
case update :
?>




<?
break;
case cancel :
?><br />





<table width="200" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr>
    <td align="center" bgcolor="#FFFFFF" class="sizemain1">สรุปยกเลิกการสั่งซื้อ</td>
  </tr>
</table><br />

<?
$sql="select * from tbl_order where order_status=2 or order_status=3";
//ทำให้ฐานข้อมูลทำงาน
$qry=mysql_query($sql);
$numrow=mysql_num_rows($qry);
?>

 <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr class="sizemain1">
    <td width="8%" align="center" bgcolor="#FFCC66">ลำดับ</td>
    <td width="18%" align="center" bgcolor="#FFCC66">รหัสใบสั่งซื้อ</td>
    <td align="center" bgcolor="#FFCC66">ชื่อลูกค้า</td>
   </tr>
  <?
  if($numrow==0){
  
  ?>
  <tr>
    <td colspan="3" bgcolor="#FFFFFF"><span class="sizemain1">ไม่มีข้อมูล</span></td>
  </tr>
  <? 
  }else{
  	$i=1;
	//คำสั่งให้วนลูป
	while($db=mysql_fetch_array($qry)){
		switch($db['order_status']){
		case 0: $textstatus="สั่งซื้อสินค้า"; break;
				case 1: $textstatus="ชำระเงินเรียบร้อยแล้ว"; break;
				case 2: $textstatus="ยกเลิกการสั่งซื้อ"; break;
				case 3: $textstatus="ยกเลิกการสั่งซื้อ"; break;
				case 4: $textstatus="จัดส่งสินค้าเรียบร้อยแล้ว"; break;
				case 5: $textstatus="รอการอนุมัติ"; break;
				case 6: $textstatus="ธนาคารไม่อนุมัติ"; break;}
  $no++;
  ?>
  <tr class="sizemain1">
    <td height="23" align="center" bgcolor="#FFFFFF"><?=$no?></td>
    <td align="center" bgcolor="#FFFFFF"><?=$db['order_id']?></td>
    <td align="center" bgcolor="#FFFFFF"><?=$db['newname']?></td>
   </tr>
  <?
  $i++;
  	}	//while
  }	   //if
  ?>
  
  
</table>
<br />
    <table width="650" border="0" align="center" cellpadding="1" cellspacing="1">
      <tr>
        <td align="center"><a href="print_cancel" target="_blank"><img src="../images/print-icon.png" width="35" height="35" /></a></td>
      </tr>
</table>


<?
break;
case receipt :
?>


<br />


<table width="200" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr>
    <td align="center" bgcolor="#FFFFFF" class="sizemain1">พิมพ์ใบเสร็จรับเงิน</td>
  </tr>
</table>
<br />
<?
$sql="select * from tbl_order where order_status=1 or order_status=4";
//ทำให้ฐานข้อมูลทำงาน
$qry=mysql_query($sql);
$numrow=mysql_num_rows($qry);
?>

 <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FFFF99">
  <tr>
    <td width="16%" align="center" bgcolor="#FFCC66" class="sizemain1">ลำดับ</td>
    <td width="16%" align="center" bgcolor="#FFCC66"><span class="sizemain1">รหัสใบสั่งซื้อ</span></td>
    <td width="79%" align="center" bgcolor="#FFCC66"><span class="sizemain1">ชื่อลูกค้า</span></td>
    <td width="5%" align="center" bgcolor="#FFCC66"><span class="sizemain1">พิมพ์</span></td>
   </tr>
  <?
  if($numrow==0){
  
  ?>
  <tr>
    <td colspan="4" bgcolor="#FFFFFF"><span class="sizemain1">ไม่มีข้อมูล</span></td>
  </tr>
  <? 
  }else{
  	$i=1;
	//คำสั่งให้วนลูป
	while($db=mysql_fetch_array($qry)){
  $no++;
  ?>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><span class="sizemain1">
      <?=$no?>
    </span></td>
    <td height="23" align="center" bgcolor="#FFFFFF"><span class="sizemain1">
      <?=$db['order_id']?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizemain1">
      <?=$db['newname']?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><span class="sizemain1"><a href="print_receipt.php?order_id=<?=$db['order_id']?>" target="_blank"><img src="../images/print-icon.png" width="35" height="35" /></td>
   </tr>
  <?
  $i++;
  	}	//while
  }	   //if
  ?>
  
  
</table>
<?
break;



 }?>			