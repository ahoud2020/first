<?php
/*
CREATE TABLE `post` (
 `p_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `p_title` VARCHAR( 255 ) NOT NULL ,
 `p_sub` LONGTEXT NOT NULL ,
 `p_time` VARCHAR( 255 ) NOT NULL 
) ENGINE = MYISAM ;
*/
#============[postvalue]==================#
$p_title= strip_tags($_POST['p_title']);
$p_sub= $_POST['p_sub'];
$p_pic=$_FILES['file']['name'];
#============[postvalue]==================#
if (isset($_POST['addreport'])){
	 if(empty($p_title) or empty($p_sub))
		{
		 echo"<div class='error'>إملاء البيانات</div>";
	 
		}else{
			
			$q=mysql_query("INSERT INTO post(p_title,p_sub,p_pic,p_time) VALUES('$p_title','$p_sub','$p_pic','".time()."')")or(mysql_error());
		$filename = $_FILES['file']['name'];
		$tempname = $_FILES['file']['tmp_name'];
		$folder =dirname(__FILE__ ).'/image1/';
		move_uploaded_file($tempname,$folder.$filename); 
		}
			if (isset($q)){
				 echo"<div class='success'>تم إضافة الخبر بنجاح</div>";
			echo"<meta http-equiv='refresh'content='3; url=admincp.php?type=addpost.php'>";
}	else{
					 echo"<div class='error'>حدث خطأ ما</div>";
			}
 }



?>
<html>
<form method='POST' action='admincp.php?type=addpost' enctype="multipart/form-data">
<table border='0' width='100%'>

<tr>
<td>عنوان الخبر</td>
<td> <input type='text' name='p_title'></td> 
</tr>
<td>صورة الخبر </td>
<td><input name="file" type="file" value=""></td> 
</tr>
</table>
<table border='0' width='100%'>
<tr>
<td> <textarea name='p_sub'  style= 'height:150px; width:100%;'> </textarea></td> 
<script>
            CKEDITOR.replace( 'p_sub' );
        </script>
</tr>
</table>
<table border='0' width='100%'>
<tr>
<td > <input type='submit' name='addreport' value='أضف خبر'></td> 
</tr>
</table>
</form>
</html>