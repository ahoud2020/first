<?php 

include"files/header.php";
include"files/h2.php";
include"files/level2.php";

 $cm_id=intval($_GET['cm_id']);
 $a=mysql_query("select * from activity_cm");
$result=mysql_num_rows($a);
if($result >0){
echo" <div class='cm'>
<table border='0' width='100%'>
";

 if($_REQUEST['active']=="cm"){
	 
	    $update=mysql_query("UPDATE  activity_cm SET  cm_active='0' WHERE cm_id='$cm_id' ");
		
		if (isset($update)){
		
		  echo"<p class='success'>تم الموافقة على التعليق بنجاح</p><br></h3>";
		echo"<meta http-equiv='refresh'content='3; url=activity_cm.php>";
}
		    
			exit;
		}
 
  if($_REQUEST['delete']=="cm"){
	 
	    $update=mysql_query("DELETE FROM activity_cm  WHERE cm_id='$cm_id' ");

		if (isset($update)){
		
		  echo"<p class='success'>تم حذف التعليق بنجاح </p><br></h3>";
		echo"<meta http-equiv='refresh'content='3; url=activity_cm.php'>";
}
		
			exit;
 }

while($comm=mysql_fetch_assoc($selectcm)){
echo'<tr >
  <td>'.$comm['comment'].'</td>
   <td> <a href="activity_cm.php?active=cm&cm_id='.$comm['cm_id'].'" >موافقة</a>-
<a href="activity_cm.php?delete=cm&cm_id='.$comm['cm_id'].'" >حذف</a></td>

</tr>';
}
echo"
</table>
";
}




?>