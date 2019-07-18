<?php

include"adminfile/header.php";
include"admininclude/config.php";
$username= strip_tags($_POST['username']);
$password=$_POST['pwd1'];
$sitemail =strip_tags($_POST['sitemail']);
if(level==1){


echo"admin1";

$sql=mysql_query("UPDATE admin SET username='$username',password='$password' WHERE id=1 ")or die(mysql_error());
if (isset($sql)){
		
		  echo"<div class='success'>تم تحديث البيانات بنجاح</div><br></h3>";
		  echo"<meta http-equiv='refresh'content='3; url=admincp.php?type=post.php'>";
		  echo'</div>';
		exit;
	}
	
echo'</div>';
}
elseif(level==2){
	
	
echo"admin2";
$sql=mysql_query("UPDATE admin SET username='$username',password='$password' WHERE id=2 ")or die(mysql_error());
$settup=mysql_query("UPDATE configuration SET s_email2='$sitemail'")or die (mysql_error());

if (isset($sql) and isset($settup)){
		
		  echo"<div class='success'>تم تحديث البيانات بنجاح</div><br></h3>";
		  echo"<meta http-equiv='refresh'content='3; url=admincp.php?type=post.php'>";
		  echo'</div>';
		exit;
	}
	
echo'</div>';
	
	
}

include"adminfile/footer.php";
?>
