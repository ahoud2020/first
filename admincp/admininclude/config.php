<?php
$a=@mysql_connect("localhost", "root", "")or die(mysql_error());
$b=@mysql_select_db("system")or die(mysql_error());
mysql_query("set names utf8");

#=================[setting]===========================#
$querysett=mysql_query("SELECT * FROM configuration")or die(mysql_error());
$sqlfetchsett=mysql_fetch_object($querysett);
define("s_name",$sqlfetchsett->s_name);
define("s_desc",$sqlfetchsett->s_desc);
define("s_key",$sqlfetchsett->s_key);
define("s_copy",$sqlfetchsett->s_copy);
#============================================#



?>