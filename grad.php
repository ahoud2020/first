<?php include"files/header2.php";
include"files/h2.php";
?>
             
         <div id='cssmenu'>
<ul>
<li><a href='system.php'><strong>نظام الدراسة </a></li>
<li><a href='download.php'><strong>مناهج الدراسة</a></li>
<li><a  href='register.php'>تقديم طلب تسجيل</a></li>
<li><a class="current" href='viwegrade.php'><strong>استعلام عن النتائج</a></li>
<li><a  href='graduated.php'><strong>الطلاب المتخرجون من المعهد</a></li>
<li><a href='how_help.php'><strong>كيف تدعمنا</a></li>
<li><a href='contactus.php'><strong>تواصل مع ادارة المعهد</a></li>
</ul>
</div>


             </div>
            
             <div class="testimonials">
                 <?php
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
function point_ev($num)
{
 if($num>=5)
 return "A+";
 elseIF($num>=4.75 and $num<5)
 return "A";
 elseIF($num>=4.5 and $num<4.75)
 return "B+";
 elseIF($num>=4 and $num<4.5)
 return "B";
 elseIF($num>=3.5 and $num<4)
 return "C+";
 elseIF($num>=3 and $num<3.5)
 return "C";
 elseIF($num>=2.5 and $num<3)
 return "D+";
 elseIF($num>=2 and $num<2.5)
 return "D";
 else
 return "F";
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
	 if(isset($_POST['v'])){

if(empty($_POST['std']) or empty($POST['pid'])){
	
	 echo '<script>alert("تأكد من إدخال البيانات بصورة صحيحة");</script>';
	 
}else{
	// في حالة النقر على زر النتيجة سيتم طباعة تقرير بدرجات الطالب في هيئة جدول
?>
<table width="100%" style="font-weight: bold" >
<tr > <td>إسم الطالب :<?php echo std_name($_POST['std']) ; ?></td>	<td>رقم الهوية الوطنية : <?php echo $_POST['pid'] ; ?></td></tr>
<tr>  <td>المستوى : <?php echo get_level($_POST['term']) ; ?></td>	<td>الفصل الدراسي :<?php echo $_POST['term'] ; ?></td></tr>
</table>


<table border=1 width="100%">
<tr style="font-weight: bold;background-color:#97D29E" ><td>المقرر الدراسي</td>		<td>المجموع</td>	<td>رمز التقدير</td></tr>
<?php
$select1=mysql_query("SELECT course_id,hour from course where term='".$_POST['term']."'")or die(mysql_error());
while($row = mysql_fetch_row($select1)){
    $select=mysql_query("SELECT m.mark,f.p_id from mark m,information f where m.course_id='".$row[0]."' and m.student_id='".$_POST['std']."' and  m.student_id=f.student_id and f.p_id='".$_POST['pid']."'")or die(mysql_error());
 	$r=mysql_fetch_row($select);
 	//if(mysql_num_rows($select)>0){
 	echo '<tr><td>'.course_name($row[0]).'</td><td>'.$r[0].'</td><td>'.print_ev($r[0]).'</td</tr>';
 	 $points+=average($r[0])*$row[1]  ;    //متغير لجمع النقاط التي حصل عليها الطالب في كل مادة
 	 $hours+=$row[1];             //متغير لجمع عدد الساعات لجميع المواد
 	 }

    echo "</table>
	
	<table>
<tr><td>المعدل الفصلي :</td>	<td><?php echo ROUND($points/$hours,2); ?></td></tr>
<tr><td>التقدير الفصلي :</td>	<td><?php echo point_ev(ROUND($points/$hours,2)); ?></td></tr>
</table>
	";

}
}
   ?>   
      			 
				 
				 
				 
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
