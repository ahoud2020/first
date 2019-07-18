<?php include"files/header2.php";
include"files/h2.php";
?>
       <style> 

#table{float:right;}


label{ float:right;} 
checkbox{float:right;}

h4{
	
	color:red;
}
</style> 
      
         <div id='cssmenu'>
<ul>
<li><a href='system.php'><strong>نظام الدراسة </a></li>
<li><a href='download.php'><strong>مناهج الدراسة</a></li>
<li><a class="current"  href='register.php'><strong>تقديم طلب تسجيل</a></li>
<li><a href='viwegrade.php'><strong>استعلام عن النتائج</a></li>
<li><a href='how_help.php'><strong>كيف تدعمنا</a></li>
<li><a href='contactus.php'><strong>تواصل مع ادارة المعهد</a></li>
</ul>
</div>


             </div>
            
             <div class="testimonials">
			  <h2><center> استمارة التسجيل </h2>
			  <?php
				   
				   

$adsquery=mysql_query("SELECT * FROM ads")or die(mysql_error());
$fetchads=mysql_fetch_assoc($adsquery);	

	if($fetchads['active1']==0){
		echo"<br><br>";
	echo $fetchads['code1'];
	
	}else{
	
			
			 
			
$name=$_POST['textfield1'];
$phone=$_POST['textfield2'];
$from=$_POST['textfield3'];
$address=$_POST['textfield4'];
$age=$_POST['textfield5'];
$number=$_POST['textfield6'];
$m_e=$_POST['textfield7'];
$department=$_POST['textfield8'];
$date=$_POST['textfield19'];
$course1=$_POST['CheckboxGroup1'];
$course2=$_POST['CheckboxGroup2'];
$course3=$_POST['CheckboxGroup3'];
$other=$_POST['textfield10'];
$mt1=$_POST['CheckboxGroup4'];
$mt2=$_POST['CheckboxGroup5'];
$other2=$_POST['textfield11'];
$course_name=$_POST['textarea1'];
$course_place=$_POST['textarea2'];
$course_date=$_POST['textarea3'];
$course_m=$_POST['textarea4'];
$yes=$_POST['CheckboxGroup6'];
$no=$_POST['CheckboxGroup7'];
$school_name=$_POST['textfield12'];
$school_place=$_POST['textfield13'];
$school_year=$_POST['textfield14'];

   if(isset($_POST['add_post'])){
	   if(empty($name)or empty($phone)or empty($address)or empty($age)or empty($number)){
		   echo"<p class='error'>تأكد من ملء البيانات بصورة صحيحة</p><br></h3>";
		   
	   }else{
	 $sqlquary=mysql_query("select s_email from admin where id =2");
	$fetchsett=mysql_fetch_array($sqlquary);
	$mail='"'.$fetchsett['s_email'].'"';
	   $supject="طلب تسجيل";
	   $msg=" الاسم : $name \n الهاتف : $phone \n الجنسية: $from \n موقع السكن:$address \n العمر: $age 
	   \n عدد اجزاء الحفظ:$number \n المؤهل العلمي: $m_e \n التخصص: $department \n تاريخه: $date \n
	   الدورات الحاصله عليها : $course1 \n $course2 \n $course3 \n اخرى : $other \n متون تحفظها في التجويد : $mt1 \n $mt2 \n 
	   اخرى: $other2 \n اسم الدورة: $course_name \n مكانها : $course_place \n تاريخها : $course_date \n مدتها $course_m \n 
	   هل سبق لك التدريس في دور الجمعيه : $yes \n $no \n اذا كانت اجابتك نعم , اسم المدرسة : $school_name \n 
	   مقرها : $school_place \n العام :  $school_year";
	   
	   mail($mail,$supject,$msg) or die("Error!");
	   echo "شكرا لك تم استلام طلبك ";
   }
   }
	
   ?>
   
 

			 <h4>حقول إجبارية *</h4>
 
<form action='' method='post'>
<table  width='645px' border='0px' id='table'>
<tr>

<td width='340'> <label> اسم المرشحه رباعيا</label><br>
 <input type='text' name='textfield1' id='textfield1'><br></td>

 <td width='340'><label> رقم الهاتف </label><br>
<input type='text' name='textfield2' id='textfield2'><br></td>

  <td width='340'><label for='textfield'> الجنسية</label>
<input type='text' name='textfield3' id='textfield3'></td>
  
  </tr>

  
<tr>

<td width='340' > <label> موقع السكن</label>
<input type='text' name='textfield4' id='textfield4'></td>
          
<td width='340'><label> العمر</label><br>
<input type='text' name='textfield5' id='textfield5'></td>
	  
<td width='340'> <label> عدد اجزاء الحفظ</label>
<input type='text' name='textfield6' id='textfield6'><br></td>

</tr>
  


<tr>

<td width='340'><label for='textfield'> المؤهل العلمي</label>
<input type='text' name='textfield7' id='textfield7'></td>

<td width='340'> <label for='textfield'> التخصص</label>
<input type='text' name='textfield8' id='textfield8'><br></td>

<td width='340'> <label for='textfield'> تاريخه</label><br>
<input type='text' name='textfield9' id='textfield9'><br></td>	 
 
  
</tr>


<tr>

	
<td width='340'><br><label>الدورات الحاصله عليها </label><br>
<label><input type='checkbox' name='CheckboxGroup1' value='checkbox' id='CheckboxGroup1_0'>النون الساكنه والتنوين</label>
<br>
<label><input type='checkbox' name='CheckboxGroup2' value='checkbox' id='CheckboxGroup1_1'>المدود</label>
<br>
<label><input type='checkbox' name='CheckboxGroup3' value='checkbox' id='CheckboxGroup1_2'>المخارج</label>
<br></td><br>


</tr>


<tr>
<td width='320'><label for='textfield'> اخرى</label><br>
<input type='text' name='textfield10' id='textfield10'></td>
</tr>

<tr>
<td width='320'><br><label>متون تحفظها في التجويد </label><br>
<label><input type='checkbox' name='CheckboxGroup4' value='checkbox' id='CheckboxGroup1_3'>تحفة الاطفال  </label><br>
<label><input type='checkbox' name='CheckboxGroup5' value='checkbox' id='CheckboxGroup1_'>الجزرية</label><br></td>
</tr>

<tr>
<td width='320'> <label for='textfield'> اخرى</label><br>
<input type='text' name='textfield11' id='textfield11'></td> 
</tr>


  
<tr>
<td><br><label for='textfield'> دورات اخرى حصلت عليها </label></td><td></td>
</tr>

<tr>  

<td><label for='textfield'> مسمى الدورة</label><br>
  <textarea name='textarea1'></textarea></td>
  
<td><label for='textfield'> مقرها </label><br>
<textarea name='textarea2'></textarea></td>

</tr>


<tr>
<td> <label for='textfield'> تاريخها </label><br>
<textarea name='textarea3'></textarea></td>
<td><label for='textfield'> مدتها </label><br>
<textarea name='textarea4'></textarea></td>

</tr>

<tr>
<td><br><label>هل سبق التدريس في دور الجمعية </label><br>
<label><input type='checkbox' name='CheckboxGroup6' value='checkbox' id='CheckboxGroup1_0'>نعم</label>
<label><input type='checkbox' name='CheckboxGroup7' value='checkbox' id='CheckboxGroup1_1'>لا</label></td>
</tr>

<tr>
<td><br><label>اذا كانت الاجابه نعم </label></td>
</tr>

<tr>

<td><label for='textfield'>اسم الدار</label>
<input type='text' name='textfield12' id='textfield12'>
</td>

<td><label for='textfield'> المكان</label><br>
<input type='text' name='textfield13' id='textfield13'></td>
          
<td><label for='textfield'> عام</label><br>
<input type='text' name='textfield14' id='textfield14'></td>	 
 
</tr>


<td><br><input name='add_post' id='asma' type='submit' value='ارسال'>
</table>

</form>

	<?php }?>
        
        <div class="clear">   </div>
        </div>
        
      <?php include"files/footer2.php";
	  ?>
      
      
    
    </div>
</div>
</body>
</html>

  