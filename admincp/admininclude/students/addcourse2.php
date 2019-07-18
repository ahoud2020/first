
<?php

include"config.php";

?>
<form method='POST' action='<?php  $_SERVER["PHP_SELF"] ;?>' enctype="multipart/form-data">

<table border=0 cellspacing=10>


<tr><td>رقم الصورة</td>	<td><input name="no" type="text" value=""></td></tr>
<tr><td>اسم الكتاب </td>	<td><input name="name" type="text" value=""></td></tr>

<tr><td>رابط الكتاب</td>	<td><input name="book" type="text" value=""></td></tr>

<tr><td>الصورة</td>	<td><input name="file" type="file" value=""><img name="img" src="" width="100" height="100" alt="" border="0"></td></tr>

<td> <input   name='upd' type='submit'  value='تعديل'>
     <input   name='del' type='submit'  value='حذف'> </td>
</tr>
</tr>
</table>



</form>

<?php


//****************************************************************************
 if(isset($_POST['upd']))
   {
  //  if(!empty($_POST['book']) and !empty($_POST['file']))
//    {
	   $select1=mysql_query("update add_subject set url='".$_POST['book']."',image='".$_FILES['file']['name']."' where id=('".$_POST['no']."')")or die(mysql_error());

	  

	   $filename = $_FILES['file']['name'];
		$tempname = $_FILES['file']['tmp_name'];
		$folder =dirname(__FILE__ ).'/books_image/';
		  
		move_uploaded_file($tempname,$folder.$filename);
		 echo '<script>alert("تمت العملية بنجاح");</script>' ;
	//}else{

		// echo '<script>alert("تأكد من إدخال رقم المادة  بصورة صحيحة");</script>';
	//}
   
   }
 //**********************************************************************
      if(isset($_POST['del']))
   {
	   if(!empty($_POST['no'])){
	   $select1=mysql_query("delete from add_subject where id=('".$_POST['no']."') ")or die(mysql_error());
     	echo '<script>alert("تمت العملية بنجاح");</script>';
    	 }
     else   {
     echo '<script>alert("تأكد من إدخال رقم المادة  بصورة صحيحة");</script>';
     }
   }
//****************************************************************************
 show();

   function show(){

   		?>
   		<table border=1 width=100% style="cursor:pointer" onclick="clickover(event);">
	 	<tr bgcolor="#A4E1FF">
	 		<td>no</td> <td>اسم الكتاب</td><td>رابط الكتاب</td> <td>الصورة</td> 
	 	</tr>
		<?php
   		$select1=mysql_query("SELECT * FROM add_subject")or die(mysql_error());
    	while($row = mysql_fetch_row($select1))  {
        echo '<tr><td>'.$row[0].'</td> <td>'.$row[1].'</td><td>'.$row[3].'</td><td>'.$row[2].'</td></tr>';
  		 }
   }
?>
</table>


<script language="javascript">

function clickover(objeto){

var elem =(objeto.target)? objeto.target: objeto.srcElement;

document.forms[0].no.value=elem.parentNode.cells[0].innerHTML;

document.forms[0].name.value=elem.parentNode.cells[1].innerHTML;

document.forms[0].book.value=elem.parentNode.cells[2].innerHTML;

document.forms[0].img.src=""+elem.parentNode.cells[3].innerHTML;

}

</script>



