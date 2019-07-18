
<?php

include"files/header.php";
include"files/h2.php";
include"files/level2.php";



 if(isset($_POST['insert']))
   {
    if(empty($_POST['name']) or empty($_POST['code']) or empty($_POST['hours']) or empty($_POST['term']))
    {
		
	     echo"<p class='error'>تأكد من ادخال البيانات بصورة صحيحة</p>";
	}elseif(!is_numeric($_POST['hours']) or!is_numeric($_POST['term'])) 
{
echo "<p class='error'> عدد الساعات والترم يجب يكونا قيم رقمية  </p><br>"; 

}elseif($_POST['term'] >5){
	
	echo "<p class='error'> الترم يجب ان يكون اقل 5</p><br>"; 
}else{ 
$sql=mysql_query("select * from course where course_code='".$_POST['code']."'");
	$result=mysql_num_rows($sql);
		
		if($result> 0){
			echo"<p class='error'>هذه المادة مسجلة مسبقاً</p><br>";
			
}else {   
	 $select1=mysql_query("insert into course(course_name,course_code,hour,term) values ('".$_POST['name']."','".$_POST['code']."','".$_POST['hours']."','".$_POST['term']."') ")or die(mysql_error());
               echo"<p class='success'>تمت العملية بنجاح</p>";
            echo"<meta http-equiv='refresh'content='3; url=add_subject.php'>";
   }
   }
   }
 ?>


<form method='POST' action='<?php $SERVER['PHP_SELF'] ?>' enctype="multipart/form-data">

<table border=0 cellspacing=10>


<tr><td>إسم المادة</td><td><input name="name" type="text" value=""></td></tr>

<tr><td>رمز المادة</td><td><input name="code" type="text" value=""></td></tr>

<tr><td>عدد الساعات</td><td><input name="hours" type="text" value=""></td></tr>

<tr><td>الترم</td>	<td><input name="term" type="text" value=""></td></tr>

<td> <input   name='insert' type='submit'  value='إدخال'></td>

</tr>
</tr>
</table>



</form>


</div>


