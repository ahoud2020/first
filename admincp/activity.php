
<?php
include"files/header.php";
include"files/h2.php";
include"files/level2.php";

   $p_id=intval($_GET['p_id']);
   if($_REQUEST['delete']=="activity"){
	   $deletq=mysql_query("DELETE FROM activity WHERE p_id='".$p_id."'");
	   
   
  if(isset($deletq))
  {
	   echo"<p class='success'>تم حذف النشاط بنجاح</p>";
	   	echo"<meta http-equiv='refresh'content='3; url=activity.php'>";
				echo"</div>";

 exit;
  }
   }
   if($_REQUEST['edite']=="activity"){
	    $editeq=mysql_query("SELECT * FROM activity WHERE p_id='".$p_id."'")or die (mysql_error());
	  $fetchpost2= mysql_fetch_object($editeq);
	  
 #============[postvalue]==================#
$p_title= strip_tags($_POST['p_title']);
$p_sub= $_POST['p_sub'];
#============[postvalue]==================#
if (isset($_POST['update'])){
	 if(empty($p_title) or empty($p_sub) )
		{
		 echo"<p class='error'>إملاء البيانات</p>";
	   
		}else{
	$up=mysql_query("UPDATE activity SET 
	p_title='$p_title',
	p_sub='$p_sub',
	p_pic='".$_FILES['file']['name']."' WHERE p_id='".$p_id."'
	")or die(mysql_error());
	    $filename = $_FILES['file']['name'];
		$tempname = $_FILES['file']['tmp_name'];
		$folder ='../images/';
		move_uploaded_file($tempname,$folder.$filename);
	if (isset($up)){
		
		  echo"<p class='success'>تم التحديث بنجاح</p><br></h3>";
		  echo"<meta http-equiv='refresh'content='3; url=activity.php'>";
		  
		exit;
	}
}
}

	   echo"
	   
<form method='POST' enctype='multipart/form-data' action='activity.php?edite=activity&p_id=".$fetchpost2->p_id."'>
<table border='0' width='100%'>

<tr>
<td>عنوان النشاط</td>
<td> <input type='text' name='p_title' value='".$fetchpost2->p_title."'></td> 
</tr>
<tr>
<td>صورة النشاط</td>
<td><input name='file' type='file' ></td> 
</tr>
</table>

<table border='0' width='100%'>
<tr>
<td> <textarea name='p_sub'  style= 'height:150px; width:100%;'>".$fetchpost2->p_sub." </textarea></td> 
<script>
            CKEDITOR.replace( 'p_sub' );
        </script>
</tr>
</table>
<table border='0' width='100%'>
<tr>
<td > <input type='submit' name='update' value='تعديل النشاط '></td> 
</tr>
</table>
</form>
";
echo'</div>';
exit;  
	   
   }
   
   ?>
   
   <table width=80% >
		
		<?php
		$selectpost=mysql_query("SELECT * FROM activity");
		while($fetchpost=mysql_fetch_object($selectpost)){
echo'
<tr>
<td>'.$fetchpost->p_id.' </td>
<td><img src="../images/'.$fetchpost->p_pic.'" alt="" height="50" width="50"/></td>
<td>'.$fetchpost->p_title.' </td>
<td><a href="activity.php?delete=activity&p_id='.$fetchpost->p_id.'" >حـذف</a>-
<a href="activity.php?edite=activity&p_id='.$fetchpost->p_id.'" >تعديل</a></td> 
</tr>';
				
   }
		
		
		?>
			 </table>
			 <div>