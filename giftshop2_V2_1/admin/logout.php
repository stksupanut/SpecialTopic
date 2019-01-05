<?
ob_start();
session_start();
session_destroy();//clear session
echo "<script language=\"javascript\">alert('ออกจากระบบเรียบร้อยแล้ว');</script>";
echo "<meta http-equiv='refresh' content='1;URL=index.php'> ";
exit;
?>