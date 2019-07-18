<?php

include"config.php";

?>
<form method='POST' action='<?php  $_SERVER["PHP_SELF"] ;?>' enctype="multipart/form-data">

<table border=0 cellspacing=10>


<tr><td>اسم الكتاب </td>	<td><input name="name" type="text" value=""></td></tr>
<tr><td>رابط الكتاب</td>	<td><input name="book" type="text" value=""></td></tr>

<tr><td>الصورة</td>	<td><input name="file" type="file" value=""><img name="img" src="" width="100" height="100" alt="" border="0"></td></tr>

<td> <input   name='insert' type='submit'  value='إدخال'></td>

</tr>
</tr>
</table>



</form>

<?php



  if(isset($_POST['file']))
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
}

 if(isset($_POST['insert']))
   {
    if(!empty($_POST['book']))
    {

		$select1=mysql_query("insert into add_subject(name,image,url)values('".$_POST['name']."','".$_FILES['file']['name']."','".$_POST['book']."')")or die(mysql_error());
		  $filename = $_FILES['file']['name'];
		$tempname = $_FILES['file']['tmp_name'];
		$folder =dirname(__FILE__ ).'/books_image/';
		  //  echo  $filename." ".$tempname;
		move_uploaded_file($tempname,$folder.$filename);

        //لنقل الصورة لمجلد الصور
	   echo '<script>alert("تمت العملية بنجاح");</script>' ;

	}
	else{
      echo '<script>alert("تأكد من إدخال البيانات بصورة صحيحة");</script>';

   }
   }