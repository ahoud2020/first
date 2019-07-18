
<?php 
include"files/header.php";
include"files/h2.php";
include"files/level2.php";
	
$f_name=strip_tags($_POST['f_name']);
$m_name= strip_tags($_POST['m_name']);
$l_name= strip_tags($_POST['l_name']);
$p_id = strip_tags($_POST['p_id']);
$email= strip_tags($_POST['email']);
$number =strip_tags($_POST['number']);








if(isset($_POST['register']))
{
if (empty($f_name)or empty($m_name)or empty($l_name)or empty($p_id)or empty($email)or empty($number)){
	echo"
	<p class='error'>الرجاء ملئ كافة البيانات </p><br>
	
	";
}elseif(!is_numeric($p_id)) 
{
echo "<p class='error'>  السجل يجب ان يحتوي على قيمة رقمية فقط </p><br>"; }	
elseif(strlen($p_id)>10) 
{
echo "<p class='error'> رقم السجل يجب ان يكون 10 ارقام  </p><br>"; }
elseif(strlen($p_id)<10) 
{
echo "<p class='error'> رقم السجل يجب ان يكون 10 ارقام  </p><br>"; }		
elseif(!is_numeric($number)) 
{
echo "<p class='error'> رقم الهاتف يجب ان يحتوي على قيمة رقمية فقط </p><br>";
}elseif(strlen($number)>10) {
	
	echo"<p class='error'> رقم الهاتف يجب ان يكون 10 ارقام </p><br>";
	
}elseif(strlen($number)<10) {
echo"<p class='error'> رقم الهاتف يجب ان يكون 10 ارقام </p><br>";
	
}else{
	$sql=mysql_query("select * from information where p_id='".$p_id."'");
	$result=mysql_num_rows($sql);
		
		if($result> 0){
			echo"<p class='error'>الطالب مسجل مسبقًا</p><br>";
			
}else{
	$q= mysql_query("INSERT INTO information (f_name ,m_name,l_name, p_id , email , number ,level) VALUES 
	('$f_name ', '$m_name ','$l_name ',$p_id ,'$email' , '$number' , 1 )") or die(mysql_error());
	
	if(isset($q)){
	echo"<p class='success'>تم ادراج البيانات بنجاح</p><br>";
	  	echo"<meta http-equiv='refresh'content='3; url='admincp.php'>";
	exit;
	}else{
		
		echo"<p class='error'> رقم السجل المدني موجود سابقاً </p><br>";
	}
}
}
}
	
	


?>
		


<div class="regesterform">
<form action='<?php  $_SERVER["PHP_SELF"] ;?>'method='POST' >

<table width=100%>
<tr>
<td> الأسم الثلاثي</td>
<td><input style="border:1px solid #E9E4E4; padding:8px 5px;" name='f_name' type='text' >
<input style="border:1px solid #E9E4E4; padding:8px 5px;" name='m_name' type='text' >
<input style="border:1px solid #E9E4E4; padding:8px 5px;" name='l_name' type='text' ></td>
</tr>
<tr>
<td> رقم السجل المدني</td>
<td><input style="border:1px solid #E9E4E4; padding:8px 5px;"  name='p_id' type='text' ></td>
</tr>
<tr>
<td> الإيميل </td>
<td><input style="border:1px solid #E9E4E4; padding:8px 5px;"  name='email' type='email' ></td>
</tr>
<tr>
<td> رقم الجوال </td>
<td><input style="border:1px solid #E9E4E4; padding:8px 5px;"  name='number' type='text' ></td>
</tr>
<tr>
<td><center><input style="border:1px solid #E9E4E4; padding:8px 5px;"  name='register' type='SUBMIT'  value='إضافة طالب'></center></td>
</tr>
</table>
</form>
</div>
