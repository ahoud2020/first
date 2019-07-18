<?php include"files/header2.php";
include"files/h2.php";
?>
             
         <div id='cssmenu'>
<ul>
<li><a href='system.php'><strong>نظام الدراسة </a></li>
<li><a href='download.php'><strong>مناهج الدراسة</a></li>
<li><a href='register.php'><strong>تقديم طلب تسجيل</a></li>
<li><a href='viwegrade.php'><strong>استعلام عن النتائج</a></li>
<li><a href='how_help.php'><strong>كيف تدعمنا</a></li>
<li><a class="current" href='contactus.php'><strong>تواصل مع ادارة المعهد</a></li>
</ul>
</div>


             </div>
            
			<div id="titleaofc"> صفحة التواصل مع معهد اعداد معلمات القران الكريم </div>
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
	$sqlquary=mysql_query("select s_email from admin where id =2 ");
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
				  
				   <br><br>
                    </div>           
        
        
   
        
        <div class="clear">   </div>
        </div>
        
      <?php include"files/footer2.php";
	  ?>
      
      
    
    </div>
</div>
</body>
</html>
