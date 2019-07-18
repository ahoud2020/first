
<?php
include"files/header.php";
include"files/h2.php";
include"files/level1.php";
?>

<div class="testimonials">
<?php 


 $cm_id=intval($_GET['cm_id']);
 $a=mysql_query("select * from comments");
$result=mysql_num_rows($a);
if($result >0){
echo" 
<table border='0' width='100%'>
";

 if($_REQUEST['active']=="cm"){
	 
	    $update=mysql_query("UPDATE  comments SET  cm_active='0' WHERE cm_id='$cm_id' ");
		
		if (isset($update)){
		
		  echo"<p class='success'>تمت الموافقة على التعليق بنجاح </div><br></h3>";
		echo"<meta http-equiv='refresh'content='3; url=comments.php'>";
}
		    
			exit;
		}
 
  if($_REQUEST['delete']=="cm"){
	 
	    $update=mysql_query("DELETE FROM comments  WHERE cm_id='$cm_id' ");

		if (isset($update)){
		
		  echo"<p class='success'>تم حذف التعليق بنجاح </div><br></h3>";
		echo"<meta http-equiv='refresh'content='3; url=comments.php'>";
}
		   
			exit;
 }

while($comm=mysql_fetch_assoc($selectcm)){
echo'<tr >
  <td>'.$comm['comment'].'</td>
   <td> <a href="comments.php?active=cm&cm_id='.$comm['cm_id'].'" >موافقة</a>-
<a href="comments.php?delete=cm&cm_id='.$comm['cm_id'].'" >حذف</a></td>

</tr>';
}


echo"
</table>
";
}
	




?>
</div>