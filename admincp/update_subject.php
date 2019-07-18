

<?php
include"files/header.php";
include"files/h2.php";
include"files/level2.php";

   $id=intval($_GET['id']);
   if($_REQUEST['delete']=="subject"){
	
	
	   $select1=mysql_query("delete from course where course_id='".$id."'")or die(mysql_error());
      echo"<p class='success'>تم الحذف بنجاح</p>";
    	 echo"<meta http-equiv='refresh'content='4; url=update_subject.php'>";

   
 exit;
  }
   
   if($_REQUEST['edite']=="subject"){
    $select1=mysql_query("SELECT * FROM course where course_id='".$id."'")or die(mysql_error());
    	$row = mysql_fetch_array($select1);
	  if(isset($_POST['upd']))
   {
    if(empty($_POST['code']) or empty($_POST['name']) or empty($_POST['hours']) or empty($_POST['term']))
    {
		echo"<p class='error'>تأكد من ادخال البيانات بصورة صحيحة</p>";
	
	}elseif(!is_numeric($_POST['hours']) or!is_numeric($_POST['term'])) 
{
echo "<p class='error'> عدد الساعات والترم يجب يكونا قيم رقمية  </p><br>"; 

}elseif($_POST['term'] >5){
	
	echo "<p class='error'> الترم يجب ان يكون اقل 5</p><br>"; 
}
   else{
         
   $update=mysql_query("update course set course_name='".$_POST['name']."' ,course_code='".$_POST['code']."' , hour='".$_POST['hours']."', term='".$_POST['term']."' where course_id='".$id."' ")or die(mysql_error());

   
		if (isset($update)){
		
			    echo"<p class='success'>تمت العملية بنجاح</p>";
            echo"<meta http-equiv='refresh'content='4; url=update_subject.php'>";
	}
   }	
	
   }

	?>  
	<form method='POST' action='' enctype="multipart/form-data">

<table border=0 cellspacing=10>


<tr><td>إسم المادة</td><td><input name="name" type="text" value="<?php echo $row['course_name'] ; ?>"></td></tr>

<tr><td>رمز المادة</td><td><input name="code" type="text" value="<?php echo $row['course_code'] ; ?>"></td></tr>

<tr><td>عدد الساعات</td><td><input name="hours" type="text" value="<?php echo $row['hour'] ; ?>"></td></tr>

<tr><td>الترم</td>	<td><input name="term" type="text" value="<?php echo $row['term'] ; ?>"></td></tr>

<td> <input   name='upd' type='submit'  value='تعديل'></td>
</tr>
</tr>
</table>



</form>

   <?php  } ?> 
      
	<table border=1 width=100% style="cursor:pointer" ">
	 	<tr bgcolor="#A4E1FF">
	 		<td>اسم المادة</td>	<td>رمز المادة</td>	<td>عدد الساعات</td>	<td>الترم</td><td>الإجراء</td>
	 	</tr>
		<?php
   		$select1=mysql_query("SELECT * FROM course")or die(mysql_error());
    	while($row = mysql_fetch_row($select1))  {
        echo '<tr><td>'.$row[1].'</td>	<td>'.$row[2].'</td>	<td>'.$row[3].'</td>	<td>'.$row[4].'</td>';
  		 
   
echo'
<td><a href="update_subject.php?delete=subject&id='.$row[0].'">حـذف</a>-
<a href="update_subject.php?edite=subject&id='.$row[0].'" >تعديل</a></td> 
</tr>';
				
		}
		
   
		?>
			 </table>
			 </div>
