<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
include"files/header2.php";
      include"files/ago.php";
?>

        
         
        <div class="center_content_pages">
        <p class="p"><strong>قال الله تعالى: (إن هذا القرآن يهدي للتي هي أقوم ويبشر المؤمنين الذين يعملون الصالحات أن لهم أجرا كبيرا)</strong></p>
              <div class="financial-application-form">
             
          
             



             </div>
            
                 <div class="testimonials">
			 
     <?php           
 
$id=intval($_GET['id']);
#=====================[get data]=========================#
$selectreport=mysql_query("SELECT * FROM activity WHERE p_id ='".$id."'") or die(mysql_error()) ;
$fetchnews=mysql_fetch_assoc($selectreport);
#=======================================================#
if(mysql_num_rows($selectreport)>0){

echo' <div style=" border:1px solid #f9f9f9; padding:5px;border-radius:2px ;margin-left:200px;">

<style="padding:6px;border-bottom:1px solid #fcfcfc;margin-bottom:6px;"><h3>'.$fetchnews['p_title'].'</h3></>
تم نشره في  :
'.date("d / m / Y").'
<br>
<br>
<style="margin-bottom:10px;"><img  width="400" height="400" src="images/'.$fetchnews['p_pic'].'" alt=""/></div>


<p>'.$fetchnews['p_sub'].'</p>


</div> <br> <center>';
	
			 echo'</center>';
		
		
$selectcm=mysql_query("SELECT * FROM activity_cm WHERE activity ='$id' AND cm_active = '0'") ;
echo"
<span style='margin-top:150px;background:#F2F2F2;padding:10px ;color:#000; margin-left:900px; 
display:inline-block; width:98%; text-align:center; height:18px; padding-bottom:10px;
box-shadow: 5px 5px 30px 0px rgba(184,173,184,1) ;'>

التعليقات'".mysql_num_rows($selectcm)."'</span></style>

<div style='background-color:#F2F2F2; margin: 10px 0px 14px 10px;
box-shadow:0px 0px 10px 0px rgba(50, 50, 50, 1);'>
<table border='0' width='100%'>
";

while($fetchcm=mysql_fetch_assoc($selectcm)){
echo"<tr >
  <td style='border-bottom:1px solid #fcfcfc; padding:5px;'> ".$fetchcm['comment']." </td>

</tr>";
}
echo"
</table>
</div>
";


#================================#
$cm_id= strip_tags($_POST['cm_id']);
$comment=strip_tags($_POST['comment']);
$cm_active= strip_tags($_POST['cm_active']);
$post= strip_tags($_POST['post']);
#================================#
 if(isset($_POST['addcm'])){
		 
	    if(empty($comment))
		{
		echo'<script>alert("الرجاء كتابة التعليق");</script>';
	    }
		else{
		$q=mysql_query("INSERT INTO activity_cm (comment,cm_active,activity) VALUES('".$comment."','1','$id')")or(mysql_error());
		}
		if(isset($q))
		{
			echo'<script>alert("تم اضافة التعليق بنجاح");</script>';
	   	echo"<meta http-equiv='refresh'content='10; url='post.php?id=".$id."'>";
		}
 }	
echo"
<form method='POST' action='activity.php?id=".$id."'>
<span style='margin-top:47px;background:#F2F2F2;padding:9px ;color:#000 ; height:20px; float:right; 
display:inline-block; width:98%; text-align:center ;line-height:30px;box-shadow: 0px 5px 30px 0px rgba(184,173,184,1);'>
<strong>إضافة تعليق</strong></span>

<div style='background:#fff; border:1px solid #f9f9f9; padding:5px;border-radius:2px ;'></div>
<table border='0' width='100%'>
<tr>
<textarea name='comment' style='height:140px; width:99%; background-color:#F2F2F2; margin:10px 0 14px 0;
box-shadow:0px 0px 10px 0px rgba(50, 50, 50, 1);float:right;'></textarea>
</tr>
<tr>
<input type='submit' name='addcm' value='اضافة' style=' font-weight: bolder; font-size: 17px; 
margin-bottom:6px;background:#E0E6F8;padding:8px 26px;color:#000; float:right; width:11%;'> 
</tr>
</table>
</form>
";
}else{
 echo"<div class='error'>لاتملك صلاحيات لدخول خذة الصفحة</div>";
	
}
    ?>                
             </div>
			
        
        
        
   
        
        <div class="clear">   </div>
        </div>
        
        <?php include"files/footer2.php"?>
      
      
    
    </div>
</div>
</body>
</html>
