<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body,td,th {
	color: #333;
}
body {
	background-color: #FF9933;
}
</style>
</head>

<body>
<div style="clear: both;"></div></div><div class="unitShoe"></div></div>
<div id="gadget-25" config_id="25" class="widgetUnit u-section u-section-informpayment"><a name="lnwcontent"></a><div class="unitHat"></div><div class="unitShirt"><div class="titleHeader"><h1 class="headerText">แจ้งชำระเงิน</h1><th colspan="5" bgcolor="#FD9E35" scope="row"><div class="headerImage"></div></div> <!--payinshop-->

<!-- Informpayment without LnwPay-->
<div class="payment_notice"></div>
<div class="LHEADER"><h2 class="headerText">รายละเอียดการโอนเงิน</h2></div><form id="inform_payment_form" onsubmit="return inform_payment_submit(this);">
<table width="500" cellspacing="0" cellpadding="0" align="center" class="paymentForm FORMTABLE">
<tbody>
<tr>
<td class="nameTD">บัญชีที่โอนเงิน* :</td>
<td class="inputTD">
<table cellpadding="0" cellspacing="0" class="bankList">
<tbody>
<tr>
<td width="20" class="checkTD"><input type="radio" name="bank" value="1"></td><td width="24" class="bankTD"><img class="gateway_img " src="http://www.deyongshop.com/images/banks/BBL.jpg" width="24" height="24"/></td><td width="89" class="banknameTD">ธ.กรุงเทพ</td><td width="57" class="numberTD">762-0-17031-1</td><td width="66">&nbsp;</td><td width="116">&nbsp;</td>
</tr>
<tr>
<td class="checkTD"><input type="radio" name="bank" value="2"></td><td class="bankTD"><img class="gateway_img " src="http://www.deyongshop.com/images/banks/SCB.jpg" width="24" height="24"/></td><td class="banknameTD">ธ.ไทยพาณิชย์</td><td class="numberTD">815-259858-3</td><td>&nbsp;</td><td>&nbsp;</td>
</tr>
<tr>
<td class="checkTD"><input type="radio" name="bank" value="3"></td><td class="bankTD"><img class="gateway_img " src="http://www.deyongshop.com/images/banks/KTB.jpg" width="24" height="24"/></td><td class="banknameTD">ธ.กรุงไทย</td><td class="numberTD">983-5-07160-8</td><td>&nbsp;</td><td>&nbsp;</td>
</tr>
<tr>
<td class="checkTD"><input type="radio" name="bank" value="4"></td><td class="bankTD"><img class="gateway_img " src="http://www.deyongshop.com/images/banks/KBANK.jpg" width="24" height="24"/></td><td class="banknameTD">ธ.กสิกรไทย</td><td class="numberTD">530-2-48634-6</td><td>&nbsp;</td><td>&nbsp;</td>
</tr>
<tr>
<td class="checkTD"><input type="radio" name="bank" value="6"></td><td class="bankTD"><img class="gateway_img " src="http://www.deyongshop.com/images/banks/BAY.jpg" width="24" height="24"/></td><td class="banknameTD">ธ.กรุงศรีอยุธยา</td><td class="numberTD">435-1-32130-3</td><td>&nbsp;</td><td>&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr class="paymentDateTR">
<td class="nameTD">วันที่ชำระเงิน* :</td>
<td class="inputTD"><input type="date" name="date" value="2018-01-08"></td>
</tr>
<tr class="paymentTimeTR">
<td class="nameTD">เวลา(โดยประมาณ)* :</td>
<td class="inputTD">
<input type="time" name="time" value="17:13"> น.</td>
</tr>
<tr>
<td class="nameTD">จำนวนเงิน* :</td>
<td class="inputTD"><input type="text" name="amount" value="0"> บาท</td>
</tr>
<tr>
<td class="nameTD">หลักฐานการโอน :</td>
<td class="inputTD"><div id="inform_fileupload_container"><input type="file" name="uploadfile" id="inform_fileupload" ><span class="uploaded_file"></span><input type="hidden" name="file" value="" /><br/><span>[ ไฟล์ jpg,gif,png,pdf ไม่เกิน2MB]</ span> <span>การแนบหลักฐานจะช่วยทำให้ตรวจสอบได้เร็วขึ้น</span><div class="file_progress"></div></div></td>
</tr>
</tbody>
</table>
<div class="LHEADER"><h2 class="headerText">กรอกเลขที่การสั่งซื้อที่ต้องการชำระ</h2></div><div class="informorder-input">เลขที่ใบสั่งซื้อ* : <input type="text" name="order_id" value="" /></div><br /><br />
<div class="LHEADER"><h2 class="headerText">รายละเอียดอื่นๆ</h2></div><div align="center" class="detailLayout">
<div class="layoutLeft">รายละเอียดเพิ่มเติม</div>
<div class="layoutRight"><textarea name="detail"></textarea></div>
</div>

<div class="LHEADER"><h2 class="headerText">รายละเอียดผู้แจ้งชำระเงิน</h2></div><table width="500" cellspacing="0" cellpadding="0" align="center" class="paymentForm FORMTABLE">
<tbody>
<tr class="nameTR">
<td class="nameTD">ชื่อผู้แจ้ง*</td>
<td class="inputTD"><input type="text" name="name" class="width_full" /></td>
</tr>
<tr class="emailTR">
<td class="nameTD">อีเมล</td>
<td class="inputTD"><input type="text" name="email" class="width_full" /></td>
</tr>
<tr class="mobileTR">
<td class="nameTD">เบอร์มือถือ</td>
<td class="inputTD"><input type="text" name="mobile" class="width_full" /></td>
</tr>
</tbody>
</table>
<br />
<div class="note">*กรุณาตรวจทานรายละเอียดให้ถูกต้องอีกครั้ง ก่อนยืนยันการแจ้งชำระเงิน</div><br />
<div class="buttonContainer">
<div class="alignCenter">
  <p><div class="buttonContainer">
<div class="alignCenter">
  <label for="checkbox"></label>
  <input type="submit" name="แจ้งชำระเงิน" id="แจ้งชำระเงิน" value="แจ้งชำระเงิน" />
</div>
</div></p>
</div>
</form>
<script type="text/javascript">
function upload_init(){
$('#inform_fileupload').fileupload({
dataType: 'json',
acceptFileTypes: /(\.|\/)(gif|jpe?g|png|pdf)$/i,
maxFileSize: 4194304,
sequentialUploads: true,
done: function (e, data) {
var jdata = data.result;
if(jdata.status=='error'){
$('#inform_fileupload_container .file_progress').html('Upload Error.');
alert(jdata.error_message);
}else{
$('#inform_fileupload_container .file_progress').html('Upload Done.');
$('#inform_fileupload_container .uploaded_file').html('<a href="'+jdata.url+'" target="_blank">'+jdata.url+'</a>');
$('#inform_fileupload_container input[name="file"]').val(jdata.url);
}
//upload_finish();
},
add: function (e, data) {
var file = data.files[0];
$('#inform_fileupload_container .file_progress').html('Loading...');
data.submit();
//upload_processing();
},
url: file_upload_manage_url(),
progress: function (e, data) {
var progress = parseInt(data.loaded / data.total * 100, 10);
$('#inform_fileupload_container .file_progress').html('Loading...'+progress+'%');
},
formData: function (form) {
var xxxx = new Array();
xxxx.push({name:'ajaxtime',value:new Date().getTime()});
xxxx.push({name:'path',value:'payment'});
xxxx.push({name:'web_id',value:'287794'});
return xxxx;
},
fail: function(e, data){
$('#inform_fileupload_container .file_progress').html('Upload Fail.');
}
});
}
function inform_payment_submit(form){

var ajaxdata = {};
$('textarea,select,input[type="hidden"],input[type="date"],input[type="time"],input[type="email"],input[type="mobile"],input[type="text"],input[type="number"]',form).each(function(){
ajaxdata[$(this).attr('name')] = $(this).val();
})
$(':radio',form).each(function(){
if($(this).prop('checked')){
ajaxdata[$(this).attr('name')] = $(this).val();
}
})
$.lnwajax.run('inform_payment',true,{
type: 'POST',
url: 'http' + '://' + 'www.deyongshop.com/informpayment/submit_guest',
data: ajaxdata,
dataType: 'json',
start: function(){
button_wait($('.b-inform',form));
},
success: function(response){
lnwajax_response(response,function(rdata){
window.location.href = rdata;
},function(rkey,rdata){
button_normal($('.b-inform',form));
switch(rkey){
case 'INFORM-EMPTY_BANK':
alert('กรุณาเลือกบัญชีที่โอนไปด้วยค่ะ');
break;
case 'INFORM-EMPTY_DATE':
alert('กรุณาเลือกวันที่ที่โอนด้วยค่ะ');
break;
case 'INFORM-EMPTY_AMOUNT':
alert('กรุณากรอกจำนวนที่โอนด้วยค่ะ');
break;
case 'INFORM-INVALID_AMOUNT':
alert('กรุณากรอกจำนวนที่โอนให้ถูกต้องด้วยค่ะ');
break;
case 'INFORM-EMPTY_TIME':
case 'INFORM-INVALID_TIME':
alert('กรุณาเลือกเวลาที่โอนด้วยค่ะ');
break;
case 'INFORM-EMPTY_ORDER_ID':
alert('กรุณากรอกเลขที่การสั่งซื้อที่ต้องการชำระด้วยค่ะ');
break;
case 'INFORM-INVALID_ORDER_ID':
alert('กรุณากรอกเลขที่การสั่งซื้อที่ถูกต้องด้วยค่ะ');
break;
case 'INFORM-ORDER_NOT_YOURS':
alert('ใบสั่งซื้อนี้สั่งซื้อ โดยสมาชิก กรุณาลงชื่อเข้าสู่ระบบก่อนแจ้งชำระเงินค่ะ');
break;
case 'INFORM-ORDER_EXPIRED':
alert('รายการสั่งซื้อนี้หมดอายุแล้วค่ะ');
break;
case 'INFORM-ORDER_REMOVED':
alert('รายการสั่งซื้อนี้ถูกลบแล้วค่ะ');
break;
case 'INFORM-ORDER_INACTIVE':
alert('รายการสั่งซื้อนี้ไม่สามารถแจ้งชำระเงินได้ กรุณาตรวจสอบรายการสั่งซื้อก่อนแจ้งชำระเงินค่ะ');
break;
case 'INFORM-LESS_AMOUNT':
alert('จำนวนเงินที่แจ้งชำระน้อยกว่าราคาของรายการสั่งซื้อที่เลือกค่ะ');
break;
case 'INFORM-INVALID_DATE':
alert('รูปแบบของวันที่ผิดพลาดค่ะ กรุณาใส่ให้ถูกต้องด้วยค่ะ YYYY-MM-DD');
break;
default:
alert('ขออภัยค่ะ พบข้อผิดพลาดบางอย่าง ไม่สามารถดำเนินการต่อได้\n'+rkey);
break;
}
});
}
});
return false;
}
$(document).ready(function(){
upload_init();
input_number_format('#inform_payment_form input[name=amount]:text');
var $xxx = $('#inform_payment_form input[name=date]');
var xxx = $xxx.get(0);
if(xxx.type == 'text' || !mobilecheck()){
$xxx.attr('type','text');
gen_calendar($xxx);
}
var $xxx = $('#inform_payment_form input[name=time]');
var xxx = $xxx.get(0);
if(xxx.type == 'text' || !mobilecheck()){
$('#inform_payment_form .paymentTimeTR .inputTD').html('<select name="hour"><option value="">- ชม. -</option><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select>:<select name="min"><option value="">- นาที -</option><option value="0">00</option><option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option></select> น.');
}

$('.adminBar').addClass('hasManagerEdit');
$('#manager_edit').html('');
});
</script>
 <!--payinshop-->
        <div class="LHEADER"><h2 class="headerText">ชำระเงินออนไลน์</h2></div>            <div class="payment_container paypal">
        <div class="img"></div>
        <ul class="desc">
            <li>ค่าธรรมเนียม 3.9% + 11 THB</li>
            <li>การชำระผ่าน PayPal คุณไม่จำเป็นต้องแจ้งชำระเงิน เนื่องจากระบบจะจัดการให้คุณทันที ที่คุณชำระเงินเสร็จสมบูรณ์</li>
        </ul>
        <div class="clearMe"></div>
    </div>
                    <div class="buttonContainer">
    <div class="alignRight"><a href="http://www.deyongshop.com/payment/online" title="ชำระเงินออนไลน์"></a>
    </div>
    </div>
     <!--payinshop--><!-- End Informpayment without LnwPay-->
 <!--payinshop--></div><div class="unitShoe"></div></div>
</div>
</div></div></div><script language="JavaScript" type="text/javascript" src="http://www.deyongshop.com/external/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script language="JavaScript" type="text/javascript" src="http://www.deyongshop.com/external/fileupload/jquery.fileupload.js"></script>
<script language="JavaScript" type="text/javascript" src="http://www.deyongshop.com/external/fileupload/jquery.fileupload-process.js"></script>
<script language="JavaScript" type="text/javascript" src="http://www.deyongshop.com/external/fileupload/jquery.fileupload-image.js"></script>
<script language="JavaScript" type="text/javascript" src="http://www.deyongshop.com/external/fileupload/jquery.fileupload-validate.js"></script>
<script language="JavaScript" type="text/javascript" src="http://www.deyongshop.com/external/fileupload/jquery.fileupload-ui.js"></script>
<script language="JavaScript" type="text/javascript" src="http://www.deyongshop.com/external/fileupload/jquery.iframe-transport.js"></script>
<script language="JavaScript" type="text/javascript" src="http://www.deyongshop.com/external/vue.min.js"></script>
<script language="JavaScript" type="text/javascript" src="http://www.deyongshop.com/system/application/modules/lnwshop/_js/many.min.js?t=20170215000000"></script>
<script language="JavaScript" type="text/javascript" src="http://www.deyongshop.com/system/application/js/jquery.easing.1.3.js"></script>
<script language="JavaScript" type="text/javascript" src="http://www.deyongshop.com/system/application/js/slide/jquery.bxslider.4.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
var LNWACCOUNTS_COOKIE_DATA = 'Bi9ZP1F2BWBYZAI2VjlcKgUiUTQOZQU_VGUCbgQsUQkDJVU1UWJeUlVtVTYCcVBoVywHblZvCDIHNVRrATJXJl0lXn5cYwRvU2tcPFFuUHcGCFktUWUFdFhyAjBWOFw_BV9RPg5tBXRUOgIiBD5RMgMzVWNRZl5rVT1VMAJjUDZXbwc9VjMINQcxVGYBY1dnXTBealxkBDBTYVw9UWFQZwZlWWdRMAViWDgCaFZ1XH0FIlE2DmoFNVRvAnUENlEiAw1VOVFkXi9VPlViAn9QcFdRBylWJwhhB2NUJgFjV2BdVl4oXGkEblNnXHtROlBtBiJZMlFsBStYIwItVj5cPAVlUSUOKwVsVDECNQRpUWMDZlVgUTZeOVU2VWQCf1BwV2sHJFYjCHcHY1RwATxXal18XjBcbAR-';
</script><script language="JavaScript" type="text/javascript">var LNWFILE_JSONP = 'lnwfile_jsonp';
function file_upload_url () {return "https://dc-up.lnwfile.com/lnwshop/upload/";}
function file_upload_flash_url () {return "https://dc-up.lnwfile.com/lnwshop/upload_flash/";}
function file_upload_icon_url () {return "https://dc-up.lnwfile.com/lnwshop/upload_icon/";}
function file_upload_document_url () {return "https://dc-up.lnwfile.com/lnwshop/upload_document/";}
function file_upload_manage_url () {return "https://dc-up.lnwfile.com/lnwshop/upload_manage/";}
function file_flash_url () {return "https://dc-up.lnwfile.com/swf/swfupload.swf";}
function file_uploadify_url () {return "https://dc-up.lnwfile.com/swf/uploadify.swf";}
function file_jsonp_url (uri) {return "https://dc-up.lnwfile.com/lnwshop/jsonp/"+(uri===undefined?"":uri)+"?"+LNWFILE_JSONP+"=?";}
function base_url (uri) {return "http://www.deyongshop.com/"+(uri===undefined?"":uri);}
function site_url (uri) {return "http://www.deyongshop.com/"+(uri===undefined?"":uri);}
var css_files = ['http://www.deyongshop.com/system/application/templates/lnwshop/default/_css/basic.min.css?t=20171225203349','http://www.deyongshop.com/cache/lnwshop/287/794/css/20171103154941/style.css'];
function css_url () {return css_files.join(',');}
var WEBID = 287794;
var WEBDATA = {};
WEBDATA.id = 287794;
WEBDATA.webname = 'deyongshop';
WEBDATA.name = 'ทุเรียนทอด';
WEBDATA.image = 'http://dc.lnwfile.com/t0r36l.jpg';
WEBDATA.avatar = function(w,h){
	return img_src(this.image,'shop',w,h);
}
WEBDATA.share_url = 'http://www.deyongshop.com/informpayment';
WEBDATA.join_num = 8;
var lnw_project = 'lnwshop';
var lowerIE8 = false;
var mobileSiteEnabled = true;
	function _add_settings_data(settings, name, value) {
		if(typeof settings.data == 'undefined' || settings.data == null || settings.data == '') {
			settings.data = name + '=' + value;
		} else if(typeof settings.data=='string') {
			settings.data += '&' + name + '=' + value;
		} else if($.isArray(settings.data)) {
			settings.data.push({name: name, value: value});
		} else if(typeof FormData !== 'undefined') {
			settings.data.append(name, value);
		}
	}
	$(document).ready(function() {
		//if(window.top.location.href != window.location.href)
			//window.top.location.href = window.location.href;
		if(window.top != window)
			$('body').html("<h1 style='margin: 200px;'><a href='" + window.location.href + "' target='_top'>Click here to enter</a></h1>");

		$.ajaxSetup({
			dataType: "html",
			cache: false
		});
		$(this).ajaxSend(function(e, xhr, settings) {
			if(!settings.data){
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			}
			_add_settings_data(settings, 'ajaxxxx', true);
			_add_settings_data(settings, 'ajaxxxx_dataType', settings.dataType);
		});
	});

var __lnwconfig = {"slideshow":{"is_enabled":1},"gointer":{"is_enabled":0},"addon_selecttext":true}
</script>
<script language="JavaScript" type="text/javascript" src="http://www.deyongshop.com/system/application/modules/lnwshop/_js/lang_th.js?t=20161208000000"></script>

<script language="JavaScript" type="text/javascript" src="http://www.deyongshop.com/system/application/modules/lnwshop/_js/default.min.js?t=20171115161449"></script>

<script language="JavaScript" type="text/javascript" src="http://www.deyongshop.com/system/application/modules/lnwbar/_js/white2_script.min.js?t=20171018171534"></script>
<script type="text/javascript">		var first_sync_accounts_time = true;
		function accounts_update__hook_after_check_account() {
			if(first_sync_accounts_time){
								first_sync_accounts_time = false;
			}
		} var accountsTime = null;
function accounts_update() {
	var data = {
		data: '032e9b1a9980f14f2177.=ej6u9m6dfT-BGwX3bZTiWua_sBlPbHqDCevHBVVweg8HyswknragelqVUpMKrkPLdKH9UXSDBlNw_uaVXN=SNbf=hX2SPOf-lNKIAyCpPS6D3pGj0N=Z8ssdbHXndhAmtzyLiL==PfV52Bh-RDzG7D7BGtNcjKQzhOnJaP16pkaZojL2Q7Z2nTXOKhX-JCsSc5Scwuf-qozZSwDpINz0kZ6HN1GPh2dubExsFK1Nu8BmFU_LS9=gNf68MoKiuqfhdChd7aMfsaHGUcivhiz.0edd831097c2c715ea18',
		revision_id: 1662
	};
	$.getJSON("https://static.lnwaccounts.com/jsonp/heartbeat?lnwaccounts_jsonp=?", data, function(response) {
		if(response.success) {
			$.cookie('_lnwacct_287794_www_deyongshop_com___tk', response._lnwacct, {path: '/'});
			if(response.state_change != undefined && response.state_change) {
				//alert('reload');
				window.location.href = window.location.href;
				return;
			}
			if(typeof accounts_update__hook_after_check_account == 'function') {
				accounts_update__hook_after_check_account();
			}
		}
		if(accountsTime != null) {
			clearTimeout(accountsTime);
		}
		accountsTime = setTimeout("accounts_update();", 15 * 60 * 1000);
	});
	$.ajax({
		type: 'GET',
		data: {},
		url: 'http://www.deyongshop.com/lnwbar/action/session'
	});
}
$(document).ready(function() {
	accounts_update();
});

	var USERDATA = {};
	USERDATA.name = '0';
	USERDATA.is_login = 0;
	USERDATA.avatar = 'http://www.deyongshop.com/images/noAvatar.png';
	USERDATA.is_join = 0;
	USERDATA.cart_quantity = 0;
	var LNWACCOUNTS_LOGIN_URL = 'https://lnwaccounts.com/3/login?lnw_service=lnwshop&request_token_data=95c5084c68645ed1680d.Ldtr9gbBtRdum=4M4PMyBTAZYmuLAywUuvam7bhOFgdHeBd-bybDYq_eNhO_uHRrUTD-_GeJYKzE7_Z1gUUPzmeqK_G-Z2coWGVNe=BOwjJf299YlHCNJrh3stSLQjiDAXHMGDkDc-_lJLGbHs88nJ6SVF0hicxp6fevx8UMePtJ7xJ9aF7KxsLcR9gP5RfZG0_qmvLWdcMDQOMelDCDPu8hcsxYhNrrV5ZJ0yP2t-UGPdSKCi7ceUJ0YU4-derIaiveb7T7la=Fzlq2CUkqbVihPpTdb-uIG_QVPGAECqaboPDQPScvTJqy3bhPfaWCMqP4Tye5y6PKCxLekKoPYuGGJ7lfWzomeKRLB=RdFe1_cJ27MPeA2vTOMZZNJf_DL7dJ2V8OIOk=NNNaU6Ts4STjmcqflb5ttFTPsD8uq9ZcLActbgdK.1bca8c711efeb4008f34';
	var LNWACCOUNTS_REGISTER_URL = 'https://lnwaccounts.com/register?lnw_service=lnwshop&request_token_data=71165dccb11f285539e7.Ldtr9gbQtRdue=4M4PMyFTAZYtuLAyhUuvamIbhOFNdHeBq-bybDYq_eNhOauHRrUTD-_GeJDKzE7_Z1gUUP1meqK_G-Z2coWKXNe=BOwjJf299IVHCNJrh3stSGQriDYXHMGDkDU-flJ7GbHs88nP6EVFihicxp6fevx8UtePtJ7xJcaF7KxsLcR9gPYRfZG0_qmvLWdcYDQOMekDCDPu8ZcsxYj6rrV5ZJlyP2tbiGPdSKCb=ceUV0YU4-deLIaivrb7T7la=Nzlq2FUkqbVihPpTdb-uIG_UVPGAECqaboPDEPScPTJqy3bhPfaWCcqP40ye5yCPKCaLekKoPYuLGJ7lgWzomeKRLB1RdFe1_cJi7MPqA2vTOMZZNJf_1L7dJ2V6OIOk=NNNaU6Ts4STjmcqflb5ttFTPsD8uq9ZcLActdgdK.9e88175b2a1ae05ee1dc';
$(document).ready(function(){var lnwbar_data = {"webtype":"lnwshop","wdata":[],"is_mobile":0};lnwbar.init(lnwbar_data);
});</script></body>
</html>

</body>
</html>