<?
                $host = "127.0.0.1";
                $user_admin ="root";
                $password = "root";
                $database = "db_shop";
                $link = mysql_connect($host,$user_admin,$password) or die(mysql_error());
                mysql_select_db($database) or die(mysql_error());
//mysql_query("SET CHARACTER SET tis620");
mysql_query("set character set utf8");
?>
