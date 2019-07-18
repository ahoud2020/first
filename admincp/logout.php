<?php include"adminfile/header.php";?>
<?php
setcookie("login",null,time()+60*60*6);
 echo"<div class='success'>تم تسجيل الخروج بنجاح </div><br></h3>";
				echo"<meta http-equiv='refresh'content='3; url=admincp.php'>";
?>
<?php include"adminfile//block.php";?>

<?php include"adminfile//footer.php";?>
