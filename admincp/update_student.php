<?php
include"files/header.php";
include"files/h2.php";
include"files/level2.php";

   $id=intval($_GET['id']);
   if($_REQUEST['delete']=="student"){
	   $deletq=mysql_query("DELETE FROM information WHERE student_id='".$id."'");
	   $deletq=mysql_query("DELETE FROM mark WHERE student_id='".$id."'");
	   
   
  if(isset($deletq))
  {
	   echo"<p class='success'>تم حذف الطالب بنجاح</p>";
	   	echo"<meta http-equiv='refresh'content='3; url=update_student.php'>";

 exit;
  }
   }
   if($_REQUEST['edite']=="student"){
	    $editeq=mysql_query("SELECT * FROM information WHERE student_id='".$id."'");
	  $fetchstu= mysql_fetch_array($editeq);
	  
 #============[postvalue]==================#
		
$f_name=strip_tags($_POST['f_name']);
$m_name= strip_tags($_POST['m_name']);
$l_name= strip_tags($_POST['l_name']);
$p_id = strip_tags($_POST['p_id']);
$email= strip_tags($_POST['email']);
$number =strip_tags($_POST['number']);
#============[postvalue]==================#
if (isset($_POST['updatestudent'])){
	 if(empty($f_name) or empty($m_name) or empty($l_name) or empty($p_id)or empty($email)or empty($number ))
    {
		echo"<p class='error'>تأكد من ادخال البيانات بصورة صحيحة</p>";
	
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
		$update=mysql_query("UPDATE  information SET 
	f_name ='$f_name',
	m_name ='$m_name',
	l_name ='$l_name',
	p_id ='$p_id',
	email ='$email',
	number ='$number'
	WHERE student_id = '".$id."'")or die (mysql_error());

	
	

	
	if (isset($update)){
		
		  echo"<p class='success'>تم تحديث بيانات الطالب بنجاح</p><br></h3>";
		  echo"<meta http-equiv='refresh'content='3; url=update_student.php'>";
	}  
		

	}
}
   

  

	?>  
	<form action='<?php $SERVER['PHP_SELF'] ?>'method='POST'>

<table  border='2'>
<tr>
<td> الأسم الثلاثي</td>
<td><input name='f_name' type='text' value="<?php echo $fetchstu['f_name']  ; ?>" >
<input name='m_name' type='text'  value="<?php echo $fetchstu['m_name'] ; ?>" >
<input  name='l_name' type='text'  value="<?php echo $fetchstu['l_name']  ; ?>" ></td>
</tr>
<tr>
<td> رقم السجل المدني</td>
<td><input  name='p_id' type='text'  value="<?php echo $fetchstu['p_id'] ; ?>" ></td>
</tr>
<tr>
<td> الإيميل </td>
<td><input  name='email' type='email'  value="<?php echo $fetchstu['email'] ; ?>" ></td>
</tr>
<tr>
<td> رقم الجوال </td>
<td><input   name='number' type='text'  value="<?php echo $fetchstu['number']  ; ?>" ></td>
</tr>
</table>
<table>
<tr>
<td>
<input  name='updatestudent' type='submit' value='حفظ' >
</td>
</tr>
</table>
</form>

   <?php  } ?> 
      
		<table border='2'>
		<tr>
		<td> رقم الطالب</td>
         <td>اسم الطالب</td>
		 <td>نوع الإجراء</td>
		 </tr>
<?php
		$selectstudent=mysql_query("SELECT * FROM information")or die (mysql_error());
		while($fetch=mysql_fetch_array($selectstudent)){
echo'
<tr>
<td>'.$fetch['student_id'].'</td>
<td>'.$fetch['f_name'].', '.$fetch['m_name'].', '.$fetch['l_name'].'</td>
<td><a href="update_student.php?delete=student&id='.$fetch['student_id'].'">حـذف</a>-
<a href="update_student.php?edite=student&id='.$fetch['student_id'].'" >تعديل</a></td> 
</tr>';
				
		}
		
   
		?>
			 </table>
			 </div>