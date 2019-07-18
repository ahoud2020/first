
<?php
include"config.php";
?>
<form method='POST' action='' dir="rtl">
<table border=0 cellspacing=10 >
<tr><td>
<!--<select size="1"  name="subjects" >
<option>-- حدد السنة الدراسية--</option>
 <option></option>
</select>-->
 </td>
</tr>

<tr>
<td>
<?php
$select1=mysql_query("SELECT * FROM information")or die(mysql_error()); ?>
<select size="1"  name="std"   >
<option>-- حدد إسم الطالب--</option>
  <?php
     	 while($row = mysql_fetch_row($select1))  {
		echo '<option value='.$row[0].'>'. $row[1]." ".$row[2]." ".$row[3].'</option> ';
		 } ?>
</select>
 </td>
</tr>

<tr>
<td>
<select size="1"  name="term" >
<option>--حدد الترم--</option>
 <option value="1">الترم الأول </option>
 <option value="2">الترم الثاني</option>
 <option value="3">الترم الثالث</option>
 <option value="4">الترم الرابع</option>
</select>
 </td>
</tr>


<td> <input style="border:1px solid #E9E4E4; padding:8px 5px;"  name='vw' type='SUBMIT'  value='عرض النتيجة'> </td>
</tr>
</tr>
</table>

<?php
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
//*******************************************************************
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
//************************************************************************
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
 //**************************************************************************
function std_name($id)  //دالة تعيد الاسم الاول و الاوسط و الاخيرحسب رقم الطالب المرسل اليها
{$select1=mysql_query("SELECT f_name,m_name,l_name from information where student_id=$id ")or die(mysql_error());

return mysql_result($select1,0,0)." ".mysql_result($select1,0,1)." ".mysql_result($select1,0,2);
}
 //**************************************************************************
function std_level($id)
{
$select1=mysql_query("SELECT level from information where student_id=$id ")or die("حدد إسم الطالب");

return mysql_result($select1,0);
}
 //**************************************************************************
 function course_name($id)  //دالة تعيد اسم المادة بناء على رقم المادة
{
$select1=mysql_query("SELECT course_name from course where course_id=$id ")or die(mysql_error());

return mysql_result($select1,0);
}
 //**************************************************************************
function p($id)  //دالة تعيد رقم السجل للطالب بناء على رقمه
{
$select1=mysql_query("SELECT p_id from information where student_id=$id ")or die("حدد إسم الطالب");

return mysql_result($select1,0,0);
}

//*********************************************************************
function print_ev($num)       //دالة تعيد رمز التقدير على حسب الدرجة المرسله اليها
{
 if($num>=95)
 return "A+";
 elseIF($num>90 and $num<95)
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
// ************************************************************"*******
?>
</form>

<?php
if(isset($_POST['vw']))  //في حالة النقر على الزر عرض النتيجة يتم عرض تقرير بدرجات الطالب على شكل جدول
{
?>
<table width="100%" dir="rtl" style="font-weight:bold" >
<tr><td>إسم الطالب :<?php echo std_name($_POST['std']) ; ?></td>	<td>رقم الهوية الوطنية : <?php echo p($_POST['std']) ;  ?></td></tr>
<tr><td>البرنامج الدراسي : دبلوم عالي</td>	<td >المستوى :<?php echo std_level($_POST['std']); ?></td>	</tr>
</table>

<table border=1 width="100%" dir="rtl">
<tr bgcolor="#FDEEFD"><td>المقرر الدراسي</td>	<td>رمز المقرر</td>	<td>الأعمال</td>	<td>الإختبار</td>	<td>المجموع</td>	<td>رمز التقدير</td></tr>
<?php
 $select1=mysql_query("SELECT course_id,course_code,hour from course where term='".$_POST['term']."'  ")or die(mysql_error());
 while($row = mysql_fetch_row($select1)){
    $select=mysql_query("SELECT mark,homework from mark where course_id='".$row[0]."' and student_id='".$_POST['std']."' ")or die(error_reporting()); 	$r=mysql_fetch_row($select);
 	$sum=$r[0]+$r[1];
 	echo '<tr><td>'.course_name($row[0]).'</td><td>'.$row[1].'</td><td>'.$r[1].'</td><td>'.$r[0].'</td><td>'.$sum.'</td><td>'.print_ev($sum).'</td</tr>';
    $points+=average($sum)*$row[2]  ;
 	$hours+=$row[2];
    }

} ?>
</table>


<table border=1 dir="rtl">
<tr><td>مجموع عدد الساعات :</td>	<td><?php echo $hours; ?></td></tr>
<tr><td>المعدل الفصلي :</td>	<td><?php echo ROUND($points/$hours,2); ?></td></tr>
<tr><td>التقدير الفصلي :</td>	<td><?php echo ev(ROUND($points/$hours,2)); ?></td></tr>
</table>



