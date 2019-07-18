<?php

include"files/header.php";
include"files/h2.php";
include"files/level2.php";

?>
<form method='POST' action='<?php  $_SERVER["PHP_SELF"] ;?>' enctype="multipart/form-data">

<table border=0 cellspacing=10>


<tr><td>اسم الكتاب </td>	<td><input name="name" type="text" value=""></td></tr>
<tr><td>رابط الكتاب</td>	<td><input name="book" type="text" value=""></td></tr>

<tr><td>الصورة</td>	<td><input name="file" type="file" value=""></td></tr>

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
		  
		$select1=mysql_query("insert into books(name,image,url)values('".$_POST['name']."','".$_FILES['file']['name']."','".$_POST['book']."')")or die(mysql_error());
		  $filename = $_FILES['file']['name'];
		$tempname = $_FILES['file']['tmp_name'];
		$folder ='../books_image/';
		    
		move_uploaded_file($tempname,$folder.$filename);
		
        //لنقل الصورة لمجلد الصور
	    echo"<p class='success'>تمت العملية بنجاح</p>";
	     
	}
	else{
      echo"<p class='error'>تأكد من ادخال البيانات بصورة صحيحة</p>";

   }
   }
   ?>
   </div>