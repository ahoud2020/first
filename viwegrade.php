<?php include"files/header2.php";
include"files/h2.php";
?>
             
         <div id='cssmenu'>
<ul>
<li><a href='system.php'><strong>نظام الدراسة </a></li>
<li><a href='download.php'><strong>مناهج الدراسة</a></li>
<li><a  href='register.php'>تقديم طلب تسجيل</a></li>
<li><a class="current" href='viwegrade.php'><strong>استعلام عن النتائج</a></li>
<li><a href='how_help.php'><strong>كيف تدعمنا</a></li>
<li><a href='contactus.php'><strong>تواصل مع ادارة المعهد</a></li>
</ul>
</div>


             </div>
            
             <div class="testimonials">
                   <?php
				   
				   

$adsquery=mysql_query("SELECT * FROM ads")or die(mysql_error());
$fetchads=mysql_fetch_assoc($adsquery);	

	if($fetchads['active2']==0){
		echo"<br><br>";
	echo $fetchads['code2'];
	
	}else{
		
		//*********************************************************************
//دالة تعيد إسم الطالب بناء على رقمه الخاص
//*********************************************************************
function std_name($id)
{
$select1=mysql_query("SELECT f_name,m_name,l_name from information where student_id=$id ")or die("حدد إسم الطالب");

return mysql_result($select1,0,0)." ".mysql_result($select1,0,1)." ".mysql_result($select1,0,2);
}
 //**************************************************************************
 //دالة تعيد إسم المادة بناء على رقم المادة
 //*********************************************************************
 function course_name($id)
{
$select1=mysql_query("SELECT course_name from course where course_id=$id ")or die(mysql_error());

return mysql_result($select1,0);
}
//***************************************************************************
//دالة تطبع التقدير على حسب الدرجة
//*********************************************************************
function print_ev($num)
{
 if($num>=95)
 return "A+";
 elseIF($num>=90 and $num<95)
 return "A";
 elseIF($num>=85 and $num<90)
 return "B+";
 elseIF($num>=80 and $num<85)
 return "B";
 elseIF($num>=75 and $num<80)
 return "C+";
 elseIF($num>=70 and $num<75)
 return "C";
 elseIF($num>=65 and $num<70)
 return "D+";
 elseIF($num>=60 and $num<65)
 return "D";
 else
 return "F";
}
//*********************************************************************
function ev($num)
{
 if($num>=5)
 return "ممتاز مرتفع";
 elseIF($num>=4.75 and $num<5)
 return "ممتاز";
 elseIF($num>=4.5 and $num<4.75)
 return "جيد جداً مرتفع";
 elseIF($num>=4 and $num<4.5)
 return "جيد جداً";
 elseIF($num>=3.5 and $num<4)
 return "جيد مرتفع";
 elseIF($num>=3 and $num<3.5)
 return "جيد";
 elseIF($num>=2.5 and $num<3)
 return "مقبول مرتفع";
 elseIF($num>=2 and $num<2.5)
 return "مقبول";
 else
 return "راسب";
}
//*********************************************************************
function get_level($num)
{
 if($num==1)
 return "الأول";
 if($num==2)
 return "الأول";
 if($num==3)
 return "الثاني";
 if($num==4)
 return "الثاني";

}
//**********************************************************************
function average($num)
{
 if($num>=95)
 return 5;
 elseIF($num>=90 and $num<95)
 return 4.75;
 elseIF($num>=85 and $num<90)
 return 4.5;
 elseIF($num>=80 and $num<85)
 return 4;
 elseIF($num>=75 and $num<80)
 return 3.5;
 elseIF($num>=70 and $num<75)
 return 3;
 elseIF($num>=65 and $num<70)
 return 2.5;
 elseIF($num>=60 and $num<65)
 return 2;
 else
 return 1;
}
?>
 <br><br>
<div>
<form name="" action="" method="post">
 <table>
   <tr><td>أدخل رقم الطالب</td><td><input name="std" type="text" value=""></td></tr>
   <tr><td>أدخل رقم السجل المدني</td><td><input name="pid" type="text" value=""></td></tr>
   <tr>
   <td>حدد الفصل الدراسي :</td>
	<td>
	<select size="1"  name="term" >
	<option></option>
	 <option value="1">الترم الأول </option>
	 <option value="2">الترم الثاني</option>
	 <option value="3">الترم الثالث</option>
	 <option value="4">الترم الرابع</option>
	</select>
    </td>
   </tr>
   <tr><td><input name="v" type="submit" value="النتيجة"></td></tr>
  </table>
</form>
</div>
 <!-- ************************************************************************ -->

<?php
$std=strip_tags($_POST['std']);
$pid=strip_tags($_POST['pid']);
if(isset($_POST['v'])){ 
if(empty($std)or empty($pid)or empty($_POST['term'])){
	
	echo"<p class='error'>الرجاء ملئ كافة البيانات</p><br></h3>";
			
	   
}else{
	
$ss=mysql_query("SELECT student_id  from information where student_id='".$_POST['std']."' and p_id='".$_POST['pid']."' and level<>0 ")or die(mysql_error());
  if(mysql_num_rows($ss)>0){ //التأكد من أن رقم الهوية و رقم الطالب موجودين فعلا في قاعدة البيانات
	if(!empty($_POST['std']) and !empty($_POST['pid']) and ($_POST['term']>0)){

?>
<table width="100%" style="font-weight: bold" >
<tr > <td>إسم الطالب :<?php echo std_name($_POST['std']) ; ?></td>	<td>رقم الهوية الوطنية : <?php echo $_POST['pid'] ; ?></td></tr>
<tr>  <td>المستوى : <?php echo get_level($_POST['term']) ; ?></td>	<td>الفصل الدراسي :<?php echo $_POST['term'] ; ?></td></tr>
</table>



<table border=1 width="100%" dir="rtl">
<tr bgcolor="#FDEEFD"><td>المقرر الدراسي</td>	<td>رمز المقرر</td>	<td>الأعمال</td>	<td>الإختبار</td>	<td>المجموع</td>	<td>رمز التقدير</td></tr>
<?php
 $select1=mysql_query("SELECT course_id,course_code,hour from course where term='".$_POST['term']."'  ")or die(mysql_error());
 while($row = mysql_fetch_row($select1)){
    $select=mysql_query("SELECT mark,homework from mark where course_id='".$row[0]."' and student_id='".$_POST['std']."' ")or die(error_reporting());
    if(mysql_num_rows( $select)>0) {
 	$r=mysql_fetch_row($select);
 	$sum=$r[0]+$r[1];
 	echo '<tr><td>'.course_name($row[0]).'</td><td>'.$row[1].'</td><td>'.$r[1].'</td><td>'.$r[0].'</td><td>'.$sum.'</td><td>'.print_ev($sum).'</td</tr>';
    $points+=average($sum)*$row[2]  ;
 	$hours+=$row[2];
 	}

 	else

 	{
 	echo "<h2 style='color:#FF0000'>لا يوجد درجات مسجلة في هذا الترم<h4>";
 	exit();
 	}
    }

 ?>
</table>


<tr><td>المعدل الفصلي :</td>	<td><?php echo ROUND($points/$hours,2); ?> </td></tr><br>
<tr><td>التقدير العام :</td>	<td><?php echo ev(ROUND($points/$hours,2)); ?> </td></tr>
</table>
<?php
}


else{
	echo"<p class='error'>البيانات المدخلة خاطئة </p><br></h3>";
		}
}else{
	
	echo"<p class='error'>هذا الطالب متخرج </p><br></h3>";
	echo"<p class='error'>في حال وجود خطأ في بياناتك او لم تكن خريج الرجاء مراجعة المشرف </p><br></h3>";
	
}
	}}}

?>

 <div class="testbox">
                 
                    </div> 

             </div>
        
        
        
   
        
        <div class="clear">   </div>
        </div>
        
      <?php include"files/footer2.php";
	  ?>
      
      
    
    </div>
</div>
</body>
</html>
