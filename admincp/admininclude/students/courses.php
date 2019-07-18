
<?php

include"config.php";

?>
<form method='POST' action='' enctype="multipart/form-data">

<table border=0 cellspacing=10>

<tr><td>رقم المادة</td>	<td><input name="no" type="text" value=""></td></tr>

<tr><td>إسم المادة</td><td><input name="name" type="text" value=""></td></tr>

<tr><td>رمز المادة</td><td><input name="code" type="text" value=""></td></tr>

<tr><td>عدد الساعات</td><td><input name="hours" type="text" value=""></td></tr>

<tr><td>الترم</td>	<td><input name="term" type="text" value=""></td></tr>

<td> <input   name='insert' type='submit'  value='إدخال'></td>
<td> <input   name='upd' type='submit'  value='تعديل'>
     <input   name='del' type='submit'  value='حذف'> </td>
</tr>
</tr>
</table>



</form>

<?php




 if(isset($_POST['insert']))
   {
    if(!empty($_POST['no']) and !empty($_POST['name']))
    {
	   $select1=mysql_query("insert into course values ('".$_POST['no']."','".$_POST['name']."','".$_POST['code']."','".$_POST['hours']."','".$_POST['term']."') ")or die(mysql_error());

	}
	else
        echo '<script>alert("تأكد من إدخال البيانات بصورة صحيحة");</script>';
   }

  //**********************************************************************
      if(isset($_POST['del']))
   {
	   if(!empty($_POST['no'])){
	   $select1=mysql_query("delete from course where course_id=('".$_POST['no']."') ")or die(mysql_error());
     	echo '<script>alert("تمت العملية بنجاح");</script>';
    	 }
     else   {
     echo '<script>alert("تأكد من إدخال رقم المادة  بصورة صحيحة");</script>';
     }
   }
//****************************************************************************
 if(isset($_POST['upd']))
   {
    if(!empty($_POST['no']) and !empty($_POST['name']))
    {
	   $select1=mysql_query("update course set course_name='".$_POST['name']."' ,course_code='".$_POST['code']."' , hour='".$_POST['hours']."', term='".$_POST['term']."' where course_id='".$_POST['no']."' ")or die(mysql_error());
	   echo '<script>alert("تمت العملية بنجاح");</script>' ;
	}
	else
        echo '<script>alert("تأكد من أن رقم المادة موجود في قاعدة البيانات");</script>';

   }
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

 show();

   function show(){

   		?>
   		<table border=1 width=100% style="cursor:pointer" onclick="clickover(event);">
	 	<tr bgcolor="#A4E1FF">
	 		<td>رقم المادة</td>	<td>اسم المادة</td>	<td>رمز المادة</td>	<td>عدد الساعات</td>	<td>الترم</td>
	 	</tr>
		<?php
   		$select1=mysql_query("SELECT * FROM course")or die(mysql_error());
    	while($row = mysql_fetch_row($select1))  {
        echo '<tr><td>'.$row[0].'</td>		<td>'.$row[1].'</td>	<td>'.$row[2].'</td>	<td>'.$row[3].'</td>	<td>'.$row[4].'</td></tr>';
  		 }
   }
?>
</table>

<script language="javascript">

function clickover(objeto){

var elem =(objeto.target)? objeto.target: objeto.srcElement;

document.forms[0].no.value=elem.parentNode.cells[0].innerHTML;

document.forms[0].name.value=elem.parentNode.cells[1].innerHTML;

document.forms[0].code.value =elem.parentNode.cells[2].innerHTML;

document.forms[0].hours.value=elem.parentNode.cells[3].innerHTML;

document.forms[0].term.value=elem.parentNode.cells[4].innerHTML;


}

</script>



