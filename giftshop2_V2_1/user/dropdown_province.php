<?php
// Set delay 1 second. 
sleep(1);

/* localhost */
// Create connection connect to mysql database
$dbCon = mysql_connect('localhost', 'root', '1234') or die (mysql_error());

// Select database.
mysql_select_db('db_shop', $dbCon) or die (mysql_error());


///* server */
//$dbCon = mysql_connect('localhost', 'chalamla_demo17', 'qwerty@123') or die (mysql_error());
//
//// Select database.
//mysql_select_db('chalamla_limwang', $dbCon) or die (mysql_error());


// Set encoding.
mysql_query('SET NAMES UTF8');

// Next dropdown list.
$nextList = isset($_GET['nextList']) ? $_GET['nextList'] : '';

switch($nextList) {
	case 'amphur':
		$provinceID = isset($_GET['provinceID']) ? $_GET['provinceID'] : '';
		$result = mysql_query("
			SELECT
				prefecture_id,
				prefecture_name
			FROM
				tbl_r_prefecture
			WHERE province_id = '{$provinceID}'
			ORDER BY CONVERT(prefecture_name USING TIS620) ASC;
		");
		break;
	case 'tumbon':
		$amphurID = isset($_GET['amphurID']) ? $_GET['amphurID'] : '';
		$result = mysql_query("
			SELECT
				district_id,
                district_name
            FROM
				tbl_r_district
			WHERE prefecture_id = '{$amphurID}'
			ORDER BY CONVERT(district_name USING TIS620) ASC;
		");
		break;
    case 'districtcode':
		$districtID = isset($_GET['districtID']) ? $_GET['districtID'] : '';
		$result = mysql_query("
			SELECT
				postcode
            FROM
				tbl_r_postcode AS a
            INNER JOIN tbl_r_prefecture AS b ON a.prefecture_id = b.prefecture_id
			WHERE b.prefecture_id = '{$districtID}'");
		break;
}

$data = array();
while($row = mysql_fetch_assoc($result)) {
	$data[] = $row;
}

// Print the JSON representation of a value
echo json_encode($data);
?>