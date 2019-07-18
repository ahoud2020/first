<?php
 include"config.php";

 $lastyear=mysql_result(mysql_query("select max(id) from years"),0,0);
?>
<form method='POST' action='' dir="rtl">
<table border=0 cellspacing=10>

<tr><td>حدد الترم :</td>
<td>
<div id="leveldiv"  >
<select size="1"  name="levels" id="level" onchange="view(this.value)" >
 <option>--حدد الترم--</option>
 <option value="1">الأول</option>
 <option value="2">الثاني</option>
 <option value="3">الثالث</option>
 <option value="4">الرابع</option>
</select>
</div>
 </td>

 <td>حدد المادة :</td>
	 <td colspan=3>
	 <?php
	 	$select1=mysql_query("SELECT * FROM course ")or die(mysql_error());
	  ?>
	 <select size="1"  name="subjects" id="sub" onchange="view2(this.value)">
	   <option value="0">--حدد المادة--</option>
	         <?php
	     	 while($row = mysql_fetch_row($select1))  {
			echo '<option value='.$row[0].'>'. $row[1].'</option> ';
			 } ?>
	 </select>
	</td>
</tr>

<tr>
<td> <input style="border:1px solid #E9E4E4; padding:8px 5px;"  name='vw' type='SUBMIT'  value='عرض الطلاب'> </td>
</tr>
</table>


 <input name="h_levl" type="hidden" value="<?php echo $_POST['h_levl'] ?>">
 <input name="h_sub"  type="hidden" value="<?php echo $_POST['h_sub'] ?>">

<br><br>
<table border=1>
   <tr bgcolor=#6FB7FF><td> الترم :<input name="lv" type="text" value="<?php echo $_POST['lv']; ?>" style="height:20px"></td>
    <td colspan=2>المادة: <input name="sname"  type="text" value="<?php echo $_POST['sname']; ?>"></td>
	</tr>
<?php
 //*************************************************************
if(isset($_POST['vw']))
{
	if(empty($_POST['h_levl']) or empty($_POST['h_sub'])){
	  echo "حدد الترم و الماد ";
	}
	 else
	{
	?>
		<tr bgcolor=#EFEFEF><td>الإسم</td>	<td>أعمال الفصل</td>	<td>الأختبار النهائي</td></tr>
	<?php
		if($_POST['h_levl'] ==1 or $_POST['h_levl']==2)
		$lv=1;
		else
		$lv=2;
		 $select1=mysql_query("SELECT student_id,f_name,m_name,l_name from information  where level='".$lv."' ")or die(mysql_error());
		 while($row = mysql_fetch_row($select1))  {

		    $selectmark=mysql_query("SELECT mark,homework from mark where student_id='".$row[0]."' and course_id='".$_POST['h_sub']."' and year='".$lastyear."'")or die(mysql_error());

		    $rr = mysql_fetch_row($selectmark);

			echo '<tr><td>'.$row[1].' '.$row[2].'  '.$row[3].'</td><td><input name="hw'.$row[0].'" type="text" value="'.$rr[1].'" style="background-color:#FFFFCE"></td><td><input name="st'.$row[0].'" type="text" value="'.$rr[0].'" style="background-color:#FFFFCE"></td></tr>';
		     }
	     echo '<tr><td><input type="submit" value="حفظ" name="save"></td> </td></tr><table>';
	 }
}

 //*******************************************************************************************
if(isset($_POST['save'])){
   if($_POST['h_levl']==1 or $_POST['h_levl']==2)
   $h_levl1=1;
   else
   $h_levl1=2;
   $select=mysql_query("SELECT student_id from information  where level='".$h_levl1."'")or die(mysql_error());
   while($row = mysql_fetch_row($select))  { // حلقة دوران تدور على جميع الطلاب في مستوى معين
   $select1=mysql_query("SELECT mark from mark where student_id='".$row[0]."' and course_id='".$_POST['h_sub']."'")or die(mysql_error());
   $stdmark=$_POST['st'.$row[0]];
   $stdhw=$_POST['hw'.$row[0]];
	   if(mysql_num_rows($select1)>0) {//اختبار اذا ما كان هناك درجات مسبقه مسجلة في جدول الدرجات لنفس الطالب و لنفس المادة
	   // في حالة وجود بيانات لنفس الطالب و لنفس المادة سيقوم بتعديل الدرجة للدرجة الجديدة التي أدخلت في خانة الدرجات
	     $s=mysql_query("update mark set mark='".$stdmark."',homework='".$stdhw."' where student_id='".$row[0]."' and course_id='".$_POST['h_sub']."' and year='".$lastyear."' ")or die(mysql_error());
	       }else   { //اما اذا لم تدخل درجة الطالب مسبقا في الجدول فسيتم ادخالها  بالاستعلام الموضح
	        $s=mysql_query("insert into mark values ('".$row[0]."','".$_POST['h_sub']."','".$lastyear."','".$stdmark."','".$stdhw."' ) ")or die(mysql_error());
	     }

     }
      echo "تمت العملية بنجاح ";
}
?>
	</table>
</form>


<script language="javascript" type="text/javascript">
$.ajax({async:false});


       function view(Id) {
	var e = document.getElementById('level');
	var selectedText = e.options[e.selectedIndex].text;

	document.forms[0].lv.value=selectedText;
	document.forms[0].h_levl.value=Id;
}


        function view2(Id) {
	var e = document.getElementById('sub');
	var selectedText = e.options[e.selectedIndex].text;

	document.forms[0].sname.value=selectedText;
	document.forms[0].h_sub.value=Id;
}

</script>



