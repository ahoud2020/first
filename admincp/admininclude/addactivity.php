<?php

#============[postvalue]==================#
$p_title= strip_tags($_POST['p_title']);
$p_sub= $_POST['p_sub'];
$p_pic=$_FILES['file']['name'];
#============[postvalue]==================#

  if(isset($_POST['file']))
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
}
if (isset($_POST['addactivity'])){
	 if(empty($p_title) or empty($p_sub) )
		{
		 echo"<div class='error'>إملاء البيانات</div>";

		}else{

			$q=mysql_query("INSERT INTO activity (p_title,p_sub,p_pic,p_time) VALUES('$p_title','$p_sub','$p_pic','".time()."')")or(mysql_error());
		$filename = $_FILES['file']['name'];
		$tempname = $_FILES['file']['tmp_name'];
		$folder =dirname(__FILE__ ).'/image/';
		move_uploaded_file($tempname,$folder.$filename); 
		}


if (isset($q)){
			 echo"<div class='success'>تم إضافة النشاط بنجاح</div>";
echo"<meta http-equiv='refresh'content='100; url=admincp.php?type=addactivity.php'>";


}	else{
					 echo"<div class='error'>حدث خطأ ما</div>";
			}

 }



?>
<html>
<form method='POST' action='admincp.php?type=addactivity' enctype="multipart/form-data">
<table border='0' width='100%'>

<tr>
<td>عنوان النشاط</td>
<td> <input type='text' name='p_title'></td>
</tr>
<td>صورة النشاط</td>
<td><input name="file" type="file" value=""></td> 
</tr>
</table>
<table border='0' width='100%'>
<tr>
<td> <textarea name='p_sub'  style= 'height:150px; width:100%;'></textarea></td>
<script>
            CKEDITOR.replace( 'p_sub' );
        </script>
</tr>
</table>
<table border='0' width='100%'>
<tr>
<td > <input type='submit' name='addactivity' value='أضف نشاط' /></td>
</tr>
</table>
</form>
</html>