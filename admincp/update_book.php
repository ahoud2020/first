<?php
include"files/header.php";
include"files/h2.php";
include"files/level2.php";

   $id=intval($_GET['id']);
   if($_REQUEST['delete']=="book"){
	
	
	   $select1=mysql_query("delete from books where id='".$id."'")or die(mysql_error());
      echo"<p class='success'>تم الحذف بنجاح</p>";
    	

   
 exit;
  }
   
   if($_REQUEST['edite']=="book"){
    $select1=mysql_query("SELECT * FROM books  where id='".$id."'")or die(mysql_error());
    	$row = mysql_fetch_array($select1);
	  if(isset($_POST['save']))
  {
	  if (empty($_POST['name']) or empty($_POST['book']) )
	  {
		  
		echo"<p class='error'>تأكد من ادخال البيانات بشكل صحيح</p><br></h3>";  
	  }else{
	   $update=mysql_query("update books set name='".$_POST['name']."',url='".$_POST['book']."',image='".$_FILES['file']['name']."' where id='".$id."'")or die(mysql_error());

	  

	   $filename = $_FILES['file']['name'];
		$tempname = $_FILES['file']['tmp_name'];
		$folder ='../books_image/';
		  
		move_uploaded_file($tempname,$folder.$filename);
		
		if (isset($update)){
		
		  echo"<p class='success'>تم تحديث بيانات الطالب بنجاح</p><br></h3>";
		  echo"<meta http-equiv='refresh'content='3; url=update_book.php'>";
	}  
	
	   }
  }
  
		

	

   

  

	?>  
	<form method='POST' action='<?php  $_SERVER["PHP_SELF"] ;?>' enctype="multipart/form-data">

<table border=0 cellspacing=10>



<tr><td>اسم الكتاب </td>	<td><input name="name" type="text" value="<?php echo $row['name'] ; ?>"></td></tr>

<tr><td>رابط الكتاب</td>	<td><input name="book" type="text" value="<?php echo $row['url'] ; ?>"></td></tr>

<tr><td>الصورة </td><td><input name="file" type="file" value=""></td></tr>

<td> <input  name='save' type='submit' value='حفظ' > </td>
</tr>
</tr>
</table>



</form>

   <?php  } ?> 
      
		<table border='4'>
		<tr>
		
         <td>اسم الكتاب </td>
		 <td>صورة الكتاب </td>
		 <td>نوع الإجراء</td>
		 </tr>
<?php
		$select1=mysql_query("SELECT * FROM books")or die(mysql_error());
    	while($fetch= mysql_fetch_array($select1)){
echo'
<tr>
<td>'.$fetch['name'].'</td>
<td><img src="../books_image/'.$fetch['image'].'"  width="200" height="100"/></td>
<td><a href="update_book.php?delete=book&id='.$fetch['id'].'">حـذف</a>-
<a href="update_book.php?edite=book&id='.$fetch['id'].'" >تعديل</a></td> 
</tr>';
				
		}
		
   
		?>
			 </table>
			 </div>