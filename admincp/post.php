<?php
include"files/header.php";
include"files/h2.php";
include"files/level1.php";
?>

<div class="testimonials">
<?php
   $p_id=intval($_GET['p_id']);
   if($_REQUEST['delete']=="post"){
	   $deletq=mysql_query("DELETE FROM post WHERE p_id='".$p_id."'");
	   
   
  if(isset($deletq))
  {
	   echo"<p class='success'>تم حذف الخبر بنجاح</p>";
	   	echo"<meta http-equiv='refresh'content='3; url=post.php'>";
				

 exit;
  }
   }
   if($_REQUEST['edite']=="post"){
	    $editeq=mysql_query("SELECT * FROM post WHERE p_id='".$p_id."'");
	  $fetchpost2= mysql_fetch_object($editeq);
	  
 #============[postvalue]==================#
$p_title= strip_tags($_POST['p_title']);
$p_sub= $_POST['p_sub'];

#============[postvalue]==================#

if (isset($_POST['updatepost'])){
	 if(empty($p_title) or empty($p_sub) )
		{
		 echo"<p class='error'>إملاء البيانات</p>";
	   
		}else{
	$up=mysql_query("UPDATE post SET 
	p_title='$p_title',
	p_sub='$p_sub',
	p_pic='".$_FILES['file']['name']."' WHERE p_id='".$p_id."'
	")or die(mysql_error());
	  $filename = $_FILES['file']['name'];
		$tempname = $_FILES['file']['tmp_name'];
		$folder ='../images/';
		move_uploaded_file($tempname,$folder.$filename);
	
	if (isset($up)){
		
		  echo"<p class='success'>تم تحديث الخبر بنجاح</p><br></h3>";
		  echo"<meta http-equiv='refresh'content='3; url=post.php'>";
		  echo'</div>';
		exit;
	}
}
}

	   echo"
	   
<form method='POST' enctype='multipart/form-data' action='post.php?edite=post&p_id=".$fetchpost2->p_id."'>
<table border='0' width='100%'>

<tr>
<td>عنوان الخبر</td>
<td> <input type='text' name='p_title' value='".$fetchpost2->p_title."'></td> 
</tr>
<tr>
<td>صورة الخبر </td>
<td> <input name='file'type='file'></td> 
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
<td > <input type='submit' name='updatepost' value='تعديل الخبر '></td> 
</tr>
</table>
</form>
";
echo'</div>';
exit;  
	   
   }
   
   ?>
   
   <table width=100% class="tb">
		
		<?php
		$selectpost=mysql_query("SELECT * FROM post");
		while($fetchpost=mysql_fetch_object($selectpost)){
echo'
<tr>
<td>'.$fetchpost->p_id.' </td>
<td><img src="../images/'.$fetchpost->p_pic.'" alt="" height="50" width="50"/></td>
<td>'.$fetchpost->p_title.' </td>
<td><a href="post.php?delete=post&p_id='.$fetchpost->p_id.'" >حـذف</a>-
<a href="post.php?edite=post&p_id='.$fetchpost->p_id.'" >تعديل</a></td> 
</tr>';
				
		}
		
		
		?>
			 </table>
			 </div>