<?php 


 $cm_id=intval($_GET['cm_id']);
 $a=mysql_query("select * from comments");
$result=mysql_num_rows($a);
if($result >0){
echo" <div class='cm'>
<table border='0' width='100%'>
";

 if($_REQUEST['active']=="cm"){
	 
	    $update=mysql_query("UPDATE  comments SET  cm_active='0' WHERE cm_id='$cm_id' ");
		
		if (isset($update)){
		
		  echo"<div class='success'>تم الوافقة على الخبر بنجاح </div><br></h3>";
		echo"<meta http-equiv='refresh'content='3; url=admincp.php?type=comments'>";
}
		     echo'</div>';
		    include"adminfile//block.php";
            include"adminfile//footer.php";
			exit;
		}
 
  if($_REQUEST['delete']=="cm"){
	 
	    $update=mysql_query("DELETE FROM comments  WHERE cm_id='$cm_id' ");

		if (isset($update)){
		
		  echo"<div class='success'>تم حذف التعليق بنجاح </div><br></h3>";
		echo"<meta http-equiv='refresh'content='3; url=admincp.php?type=comments'>";
}
		     echo'</div>';
		    include"adminfile//block.php";
            include"adminfile//footer.php";
			exit;
 }

while($comm=mysql_fetch_assoc($selectcm)){
echo'<tr >
  <td>'.$comm['comment'].'</td>
   <td> <a href="admincp.php?type=comments&active=cm&cm_id='.$comm['cm_id'].'" >موافقة</a>-
<a href="admincp.php?type=comments&delete=cm&cm_id='.$comm['cm_id'].'" >حذف</a></td>

</tr>';
}
echo"
</table></div>
";
}else{
	
	echo"no comment to diplay";
}




?>