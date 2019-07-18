<?php include"config.php";
   $id=intval($_GET['id']);
   if($_REQUEST['delete']=="student"){
	   $deletq=mysql_query("DELETE FROM information WHERE student_id='".$id."'");


  if(isset($deletq))
  {
	   echo"<div class='success'>تم حذف الطالب بنجاح</div>";
	   	echo"<meta http-equiv='refresh'content='3; url=admincp.php?type=update_student.php'>";
				echo"</div>";
 include"adminfile//block.php";
 include"adminfile//footer.php";
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

		$update=mysql_query("UPDATE  information SET
	f_name ='$f_name',
	m_name ='$m_name',
	l_name ='$l_name',
	p_id ='$p_id',
	email ='$email',
	number ='$number'
	WHERE student_id = '".$id."'")or die (mysql_error());





	if (isset($update)){

		  echo"<div class='success'>تم تحديث بيانات الطالب بنجاح</div><br></h3>";
		  echo"<meta http-equiv='refresh'content='3; url=admincp.php?type=update_student.php'>";
	}else{

			  echo"error";

		  echo'</div>';
		exit;
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
<tr>
<td>
<input  name='updatestudent' type='submit' value='حفظ' >
</td>
</tr>
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
<td><a href="admincp.php?type=update_student&delete=student&id='.$fetch['student_id'].'">حـذف</a>-
<a href="admincp.php?type=update_student&edite=student&id='.$fetch['student_id'].'" >تعديل</a></td>
</tr>';

		}


		?>
			 </table>