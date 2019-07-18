
<?php 

		
		
$f_name=strip_tags($_POST['f_name']);
$m_name= strip_tags($_POST['m_name']);
$l_name= strip_tags($_POST['l_name']);
$id = strip_tags($_POST['id']);
$email= strip_tags($_POST['email']);
$number =strip_tags($_POST['number']);


if(isset($_POST['register']))
{
if (empty($f_name)or empty($m_name)or empty($l_name)or empty($id)or empty($email)or empty($number)){
	echo"
	<div class='error'>الرجاء ملئ كافة البيانات </div><br>
	
	";
}if(!is_numeric($id)) 
{
echo "<div class='error'>  السجل يجب ان يحتوي على قيمة رقمية فقط </div><br>"; }	
if(!is_numeric($number)) 
{
echo "<div class='error'> رقم الهاتف يجب ان يحتوي على قيمة رقمية فقط </div><br>"; }	
		
else{
	
	$q= mysql_query("INSERT INTO information (p_id ,f_name ,m_name,l_name, email ,number) VALUES 
	($id , '$f_name ', '$m_name ','$l_name ','$email' , $number)") or die(mysql_error());
	}
	if(isset($q)){
	echo"<div class='success'>تم ادراج البيانات بنجاح</div><br>";
	  	echo"<meta http-equiv='refresh'content='3; url=admincp2.php?type=regesterstu'>";
	exit;
	}else{
		echo"<div class='error'>حدث خطأ غير متوقع حاول مرة أخرى</div><br>";
	  	echo"<meta http-equiv='refresh'content='3; url=admincp2.php?type=regesterstu'>";
	}
	

	
}

?>
		


<div class="regesterform">
<form action='admincp2.php?type=regesterstu'method='POST'   ... onsubmit="return checkForm(this);">

<table width=100%>
<tr>
<td> الأسم الثلاثي</td>
<td><input style="border:1px solid #E9E4E4; padding:8px 5px;" name='f_name' type='text' ></td>
<td><input style="border:1px solid #E9E4E4; padding:8px 5px;" name='m_name' type='text' ></td>
<td><input style="border:1px solid #E9E4E4; padding:8px 5px;" name='l_name' type='text' ></td>
</tr>
<tr>
<td> رقم السجل المدني</td>
<td><input style="border:1px solid #E9E4E4; padding:8px 5px;"  name='id' type='text' ></td>
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
<td><center><input style="border:1px solid #E9E4E4; padding:8px 5px;"  name='register' type='SUBMIT'  value='تسجيل'></center></td>
</tr>
</table>
</form>
</div>
