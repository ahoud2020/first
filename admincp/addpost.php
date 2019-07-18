<?php
include"files/header.php";
include"files/h2.php";
include"files/level1.php";
?>

<div class="testimonials">
<?php

#============[postvalue]==================#
$p_title= strip_tags($_POST['p_title']);
$p_sub= $_POST['p_sub'];
$p_pic=$_FILES['file']['name'];
#============[postvalue]==================#
if (isset($_POST['addreport'])){
	 if(empty($p_title) or empty($p_sub))
		{
		 echo"<p class='error'>إملاء البيانات</p>";
	 
		}else{
			
			$q=mysql_query("INSERT INTO post(p_title,p_sub,p_pic,p_time) VALUES('$p_title','$p_sub','$p_pic','".time()."')")or(mysql_error());
		$filename = $_FILES['file']['name'];
		$tempname = $_FILES['file']['tmp_name'];
		$folder ='../images/';
		move_uploaded_file($tempname,$folder.$filename); 
		}
			if (isset($q)){
				 echo"<p class='success'>تم إضافة الخبر بنجاح</p>";
			echo"<meta http-equiv='refresh'content='3; url=addpost.php'>";
}	else{
					 echo"<p class='error'>حدث خطأ ما</p>";
			}
 }



?>
<html>
<form method='POST' action='addpost.php' enctype="multipart/form-data">
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
</div>