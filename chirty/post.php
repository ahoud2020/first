<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include "../include/config.php";
include"files/header.php";
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
$selectreport=mysql_query("SELECT * FROM post WHERE p_id ='".$id."'") or die(mysql_error()) ;
$fetchnews=mysql_fetch_assoc($selectreport);
#=======================================================#
if(mysql_num_rows($selectreport)>0){

echo' <div style="background:#fff; border:1px solid #f9f9f9; padding:5px;border-radius:2px ;">

<style="padding:6px;border-bottom:1px solid #fcfcfc;margin-bottom:6px;"><h3>'.$fetchnews['p_title'].'</h3></>
تم نشره في  :
'.date("d / m / Y").'
<br>
مُنذ :'.ago($fetchpost->p_time).'
<br>
<style="margin-bottom:10px;"><img  width-max:650px; src="'.$fetchnews['p_pic'].'" alt=""/></div>


<p>'.$fetchnews['p_sub'].'</p>


</div> <br> <center>';
	
			 echo'</center>';
		
		
$selectcm=mysql_query("SELECT * FROM comments WHERE post ='$id' AND cm_active = '0'") ;
echo"
<style='margin-bottom:6px;background:#013ADF;padding:10px 8px;color:#fff;font-size=13px; display:inline-block;'>التعليقات'".mysql_num_rows($selectcm)."'</style>

<div style='background:#fff; border:1px solid #f9f9f9; padding:5px;border-radius:2px ;'>
<table border='10' width='100%'>
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

/*
CREATE TABLE `comments` (
 `cm_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `comment` TEXT NOT NULL ,
 `cm_active` INT NOT NULL 
) ENGINE = MYISAM ;


*/
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
		$q=mysql_query("INSERT INTO comments(comment,cm_active,post) VALUES('".$comment."','1','$id')")or(mysql_error());
		}
		if(isset($q))
		{
			 echo'<script>alert("الرجاء كتابة التعليق");</script>';
	   	echo"<meta http-equiv='refresh'content='10; url='post.php?id=".$id."'>";
		}
 }	
echo"
<form method='POST' action='post.php?id=".$id."'>
<div style='margin-bottom:6px;background:#013ADF;padding:10px 8px;color:#fff;font-size=13px; display:inline-block;'>إضافة تعليق</div>

<div style='background:#fff; border:1px solid #f9f9f9; padding:5px;border-radius:2px ;'></div>
<table border='0' width='100%'>
<tr>
<textarea name='comment'style= 'height:140px; width:99%;'></textarea>
</tr>
<tr>
<input type='submit' name='addcm' value='إضافة تعليق'> 
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
        
        <?php include"files/footer.php"?>
      
      
    
    </div>
</div>
</body>
</html>
