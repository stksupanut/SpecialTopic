<?
//ประกาศตัวแปร

$db_server="localhost";
$db_username="root";
$db_password="1234";
$db_database="db_shop";

//ฟังชั่นติดต่อฐานข้อมูล
function connect_db()
{
	
	global $db_server;	
	global $db_username;	
	global $db_password;	
	global $db_database;	
	global $conn;
	//ติดต่อ localhost
	$conn=mysql_connect($db_server,$db_username,$db_password) or die("connect server Failed");
	
	//ติดต่อ ฐานข้อมูล
	mysql_select_db($db_database,$conn) or die("connect DB Failed");
	
	//ทำให้ซัพพอท fort utf-8
	//mysql_query("SET NAMES UTF8");
	mysql_query("SET character_set_results=utf8");
	mysql_query("SET character_set_client=utf8");
	mysql_query("SET character_set_connection=utf8");
	mysql_query("set character set utf8");
	
}
	
//ฟังชั่น ปิดการติดต่อกับฐานข้อมูล
function CloseDB()
{
	global $conn;
	mysql_close($conn);
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	function get_type(){
		$dblink = connect_db();
		$id=$_GET['id'];
		$strSQL = "SELECT tp.id,tp.tName,p.ptName
		FROM tbl_producttype tp , product p WHERE   p.ProductID='$id'
		";
		$resultSQL = mysqli_query($dblink,$strSQL);
		$i=1;
		while($rows = mysqli_fetch_array($resultSQL)){
			
		$id=$rows['id'];
	    $tName=$rows['tName'];
		echo "<option value=$id> $tName</option>";
		$i=1;	//¨º echo
		}//¨º while loop
	}
	
function get_clame(){
		$dblink = connect_db();
		$numrow = 0;//µÑÇá»Ã¹Ñºá¶Ç
		$strSQL = "SELECT cl.id,r.rName,cl.clProduct,cl.clDetail,cl.clReport,cl.clSerail,tcl.clStatus
						FROM tbl_claim cl,tbl_regis r,tbl_claim_status tcl
						WHERE  tcl.clID=cl.clStatus AND r.id=cl.id ";
		$resultSQL = mysqli_query($dblink,$strSQL);
		while($rows = mysqli_fetch_array($resultSQL)){
			$numrow++;//à¾ÔèÁ¤èÒµÑÇá»Ã·ÕÅÐ 1
		echo"
		<tr>
			<td>".$numrow."</td>
			<td>".$rows['id']."</td>
			<td>".$rows['rName']."</td>
			<td>".$rows['clSerail']."</td>
			<td>".$rows['clProduct']."</td>
			<td>".$rows['clDetail']."</td>
			<td>".$rows['clReport']."</td>
			<td>".$rows['clStatus']."</td>
					</tr>
		";
		}
	}
	function get_sendmail(){
		$dblink = connect_db();
		$numrow = 0;//µÑÇá»Ã¹Ñºá¶Ç
		$strSQL = "SELECT *
						FROM tbl_claim cl,tbl_regis r,tbl_claim_status tcl
						WHERE  tcl.clID=cl.clStatus AND r.id=cl.clID ";
		$resultSQL = mysqli_query($dblink,$strSQL);
		while($rows = mysqli_fetch_array($resultSQL)){
			$numrow++;//à¾ÔèÁ¤èÒµÑÇá»Ã·ÕÅÐ 1
		echo"
		<tr>
			<td>".$numrow."</td>
			<td>".$rows['id']."</td>
			<td>".$rows['rName']."</td>
			<td>".$rows['clSerail']."</td>
			<td>".$rows['clProduct']."</td>
			<td>".$rows['clDetail']."</td>
			<td>".$rows['clReport']."</td>
			<td>".$rows['clStatus']."</td>
		</tr>
		";
		}
	}
	function get_Order(){
	$member=$_SESSION['MEMBER'];
		$dblink = connect_db();
		$strSQL = "SELECT c.cust_id
FROM    customer c
WHERE   name='$member' AND submitstatus=0;
		";
		$resultSQL = mysqli_query($dblink,$strSQL);
		$sum= mysqli_num_rows($resultSQL);
		$i=1;
		if($sum==0){
			echo "<option >ไม่มีข้อมูล</option>";
		}else{}
		while($rows = mysqli_fetch_array($resultSQL)){
		$sum= mysqli_num_rows($resultSQL);

		$id=$rows['id'];
	    $OrderID=$rows['cust_id'];
	    echo "<option value=$OrderID> $OrderID</option>";
		$i=1;	//¨º echo
		}
	}
	
	//¨º while loop
	
	
	function get_Showclaim(){
	$member=$_SESSION['MEMBER'];
		$dblink = connect_db();
		$strSQL = "SELECT clID,clStatus
		FROM tbl_claim_status
		WHERE  id='$member';
		";
		$resultSQL = mysqli_query($dblink,$strSQL);
		$i=1;
		while($rows = mysqli_fetch_array($resultSQL)){
			
		$clID=$rows['clID'];
	    $clStatus=$rows['clStatus'];
		
		echo "<option value=$clID> $OrderID</option>";
		$i=1;	//¨º echo
		}//¨º while loop
	}
	function get_status_claim(){
		$dblink = connect_db();

		$strSQL = "SELECT *
		FROM  tbl_claim_status tcs
		
		";
		$resultSQL = mysqli_query($dblink,$strSQL);
		$i=1;
		while($rows = mysqli_fetch_array($resultSQL)){
			
		$clID=$rows['clID'];
	    $clStatus=$rows['clStatus'];
		
		echo "<option value=$clID> $clStatus</option>";
		$i=1;	//¨º echo
		}//¨º while loop
	}
	function get_type2(){
		$dblink = connect_db();
		$id=$_GET['id'];
		$strSQL = "SELECT *
		FROM tbl_producttype 
		";
		$resultSQL = mysqli_query($dblink,$strSQL);
		$i=1;
		while($rows = mysqli_fetch_array($resultSQL)){
			
		$id=$rows['id'];
	    $tName=$rows['tName'];
		echo "<option value=$id> $tName</option>";
		$i=1;	//¨º echo
		}//¨º while loop
	}
	function get_customer(){
	
		$dblink = connect_db();
		$strSQL = "SELECT *
		FROM tbl_regis ";
		$resultSQL = mysqli_query($dblink,$strSQL);
		
		while($rows = mysqli_fetch_array($resultSQL)){
			
		$id=$rows['id'];
	    $rName=$rows['rName'];
		
		echo "<option value=$id> $rName</option>";
		;	//¨º echo
		}//¨º while loop
	}
	//========= Function Insert Data ========= 
	function Insert($Table,$Field,$Value){
		$Insert=mysql_query("INSERT INTO $Table ($Field) VALUES ($Value)") or die (mysql_error());
		return $Insert;
	}
	
	//========= Function Select Data (WHERE) ========= 
	function Select($Table,$Condition){
		$Select=mysql_query("SELECT * FROM $Table $Condition ") or die (mysql_error());
		return $Select;
	}
	
		//========= Function Delete Data (WHERE) ========= 
	function Delete($Table,$Condition){
		$Delete=mysql_query("DELETE FROM $Table $Condition ") or die (mysql_error());
		return $Delete;
	}
	
		//========= Function Update Data (WHERE) ========= 
	function Update($Table,$Condition){
		$Updaate=mysql_query("UPDATE $Table SET $Condition") or die (mysql_error());
		return $Updaate;
	}

	//========= Function Num_Rows (WHERE) =========
	function Num_Rows($Condition){
		$Num_Rows=mysql_num_rows($Condition);
		return $Num_Rows;	
	}
	
	//========= Function ResizePicture) =========
	function ResizePicture($Picture_Tmp,$Rename,$Height,$Path){
		$Size=getimagesize($Picture_Tmp);
		$SizeX=$Size[0];
		$SizeY=$Size[1];
		$Weight=ceil($SizeX*$Height)/$SizeY;
		$Image_Fin=imagecreatetruecolor($Weight,$Height);
		
		$Image_Ori=imagecreatefrompng($Picture_Tmp);
		$ImageX=imagesx($Image_Ori);
		$ImageY=imagesy($Image_Ori);
		
		imagecopyresampled($Image_Fin,$Image_Ori,0,0,0,0,$Weight,$Height,$ImageX,$ImageY);
		imagepng($Image_Fin,$Path.$Rename);
		
		imagedestroy($Image_Fin);
		imagedestroy($Image_Ori);
		
		$Complate="Complate";
		return $Complate;
	}	
	
function get_clame_print(){
		$dblink = connect_db();
		$numrow = 0;//µÑÇá»Ã¹Ñºá¶Ç
		$strSQL = "SELECT cl.id,r.rName,cl.clProduct,cl.clDetail,cl.clReport,cl.clSerail,tcl.clStatus
						FROM tbl_claim cl,tbl_regis r,tbl_claim_status tcl
						WHERE  tcl.clID=cl.clStatus AND r.id=cl.id ";
		$resultSQL = mysqli_query($dblink,$strSQL);
		while($rows = mysqli_fetch_array($resultSQL)){
			$numrow++;//à¾ÔèÁ¤èÒµÑÇá»Ã·ÕÅÐ 1
		echo"
		<tr>
			<td>".$numrow."</td>
			<td>".$rows['id']."</td>
			<td>".$rows['rName']."</td>
			<td>".$rows['clSerail']."</td>
			<td>".$rows['clProduct']."</td>
			<td>".$rows['clDetail']."</td>
			<td>".$rows['clReport']."</td>
			<td>".$rows['clStatus']."</td>
			
					
					
					</tr>
		";
		}
}

	
	
	
	
?>