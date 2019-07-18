<?php include"files/header.php";
include"files/h2.php";
?>
             
         <div id='cssmenu'>
<ul>
<li><a href='aboutcharity.php'><strong>الجمعية الخيرية</a></li>
<li><a href='hsaad.php'><strong>حصاد الاعمال</a></li>
<li><a href='schools.php'><strong>الدور النسائية</a></li>
<li><a class="current" href='contactus_ch.php'><strong> تواصل مع ادارة الجمعيه</a></li>
<li><a href='how_help_ch.php'><strong>كيف تدعمنا</a></li>
<li><a href='est.php'><strong>استقطاع الخير</a></li>

</ul>
</div>


             </div>
            
			<div id="titleaofc"> صفحة التواصل مع ادارة الجمعيه الخيرية </div>
             <div class="testimonials1">
                
				   <?php

#===========[post]=============#
$name=$_POST['name'];
$email=$_POST['email'];
$title=$_POST['title'];
$post=$_POST['post'];

#===========[post]=============#
if(isset($_POST['add_post'])){
	if(empty($name) or empty ($email) or empty($title) or empty($post))
	{
		echo"<p class='error'>الرجاء تعبئة النموذج بشكل كامل</p><br></h3>";
		
	}else{
	$sqlquary=mysql_query("select s_email from admin where id =1 ");
	$fetchsett=mysql_fetch_array($sqlquary);
	$mail='"'.$fetchsett['s_email'].'"';
		mail($mail,$title,$post);
	echo'<h2 style="color:#3dafea;">  تم الإرسال شكرا لك سيتم الرد عليك بأقرب وقت</h2>';
	
}
}
$server=$_SERVER['PHP_SELF'];

echo " <center>
<form action='".$server."' method='POST'>
<input name='name' class='name1' type='text' placeholder=' الإسم الكامل' /><br><br>
 <input name='email' class='email1' type='email' placeholder='البريد الإلكتروني' /><br><br>
 <input name='title' class='title1'type='text' placeholder=' عنوان الرسالة' /><br><br>
 <textarea name='post' class='area1' placeholder='الرسالة ....'></textarea><br><br>
<input name='add_post' class='submit1' type='submit' value='إرسال  '><br><br>
</form>"
?>
                     
                   
             </div>
         <div class="testbox1">
                   <br>
				 <h3> بيانات الاتصال </h3>
				   <p class="p1"> <center><br><img src="https://cdn0.iconfinder.com/data/icons/basic-ui-elements-plain/543/09_home-20.png"> الافلاج <br> 
				<center><img src="https://cdn3.iconfinder.com/data/icons/communication-1/100/old_phone_numbers-16.png">  011/6822222 <br>
				  <center><img src="https://cdn1.iconfinder.com/data/icons/general-9/500/phone-20.png"> 0533282385 </p>
				  
				   
                    </div>           
        
        
   
        
        <div class="clear">   </div>
        </div>
        
      <?php include"files/footer.php";
	  ?>
      
      
    
    </div>
</div>
</body>
</html>
