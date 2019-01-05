<?
	require("../mysql2json.class.php");
	$hostname_connection = "localhost";
	$database_connection = "db_shop";
	$username_connection = "root";
	$password_connection = "1234";
	$connection = mysql_connect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
	mysql_query("SET character_set_results=utf8");
	mysql_query("SET character_set_client=utf8");
	mysql_query("SET character_set_connection=utf8");
	mysql_select_db($database_connection, $connection);
	
	$ID=$_GET[ID];
	$type=$_GET[TYPE];
	
	if($type=='Proviance'){
		$query="SELECT * FROM tbl_r_province ";
	}else if($type=='District') {
		$query="SELECT * FROM tbl_r_prefecture WHERE province_id='".$ID."'";
	} else if($type=='Subdistrict'){
		$query="SELECT * FROM tbl_r_district WHERE prefecture_id='".$ID."'";
	} else if($type=='Postcode'){
		$query="SELECT * FROM tbl_r_postcode WHERE prefecture_id='".$ID."'";
	}
	$result=mysql_query($query,$connection);
	$num=mysql_affected_rows();
	
	$json=new mysql2json;
	$data=$json->getJSON($result,$num);
	echo $data;
?>