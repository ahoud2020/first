
<?php
include"files/header.php";
include"files/h2.php";
include"files/level2.php";

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



<td colspan=3>
	 <div id="statediv">

	 </div>
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
   <tr><td> الترم :<input name="lv" type="text" value="<?php echo $_POST['lv']; ?>" style="height:40px"></td>
    <td colspan=2>المادة: <input name="sname"  type="text" value="<?php echo $_POST['sname']; ?>" style="height:40px"></td>
	</tr>
<?php
 //*************************************************************
 
if(isset($_POST['vw']))
{
	
	if(empty($_POST['h_levl']) or empty($_POST['h_sub'])){
	  echo"<p class='error'>أدخل البيانات بصورة صحيحة</p>";
	}else{
	?>
		<tr bgcolor=#EFEFEF><td>الإسم</td>	<td>أعمال الفصل (50)</td>	<td> الأختبار النهائي(50) </td></tr>
	<?php
		if($_POST['h_levl'] ==1 or $_POST['h_levl']==2)
		$lv=1;
		else
		$lv=2;
		 $select1=mysql_query("SELECT student_id,f_name,m_name,l_name from information  where level='".$lv."' ")or die(mysql_error());

		 while($row = mysql_fetch_row($select1))  {

		    $selectmark=mysql_query("SELECT mark,homework from mark where student_id='".$row[0]."' and course_id='".$_POST['h_sub']."' and year='".$lastyear."'")or die(mysql_error());

		    $rr = mysql_fetch_row($selectmark);
              if(empty($rr[1])) //اختبار إذا ماكانت درجة الإختبار فارغة أي غير مسجلة

       //           في هذه الحالة سيقوم بعرض خانة الدرجة بالقيمة صفر كقيمة إفتراضية
       // في السطر التالي لاحظي الفاليو  وضعت قيمته صفر
                echo '<tr><td>'.$row[1].' '.$row[2].'  '.$row[3].'</td><td><input name="hw'.$row[0].'" type="text" value="'.$rr[1].'" style="background-color:#FFFFCE"></td><td><input name="st'.$row[0].'" type="text" value="0" style="background-color:#FFFFCE"></td></tr>';
		      else  //عدا ذلك سيقوم بعرض الدرجة للطالب  على خانة النص
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

   while($row = mysql_fetch_row($select)){ 
   $select1=mysql_query("SELECT mark from mark where student_id='".$row[0]."' and course_id='".$_POST['h_sub']."'")or die(mysql_error());
   $stdmark=$_POST['st'.$row[0]];
   $stdhw=$_POST['hw'.$row[0]];
  if($stdhw>50 or $stdmark>50){
			   
			  echo"<p class='error'>تأكد من ادخال القيمة بشكل صحيح</p>";
			 exit;
		   }else{
			   if(!is_numeric($stdhw)or!is_numeric($stdmark) ){
			   echo "<p class='error'>القيمة المدخلة يجب ان تكون رقمية </p><br>";
			   exit;
   }else{
			   
	   if(mysql_num_rows($select1)>0) {
	     $s=mysql_query("update mark set mark='".$stdmark."',homework='".$stdhw."' where student_id='".$row[0]."' and course_id='".$_POST['h_sub']."' and year='".$lastyear."' ")or die(mysql_error());
	 
		   }else{ 
		  
	        $s=mysql_query("insert into mark values ('".$row[0]."','".$_POST['h_sub']."','".$lastyear."','".$stdmark."','".$stdhw."' ) ")or die(mysql_error());
		  
	     }
		   }

     }
   echo"<p class='success'>تم التحديث بنجاح</p>";
	echo"<meta http-equiv='refresh'content='3; url=adddgree.php'>";
}}



     

?>
	</table>
</form>


<script language="javascript" type="text/javascript">
$.ajax({async:false});
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{
			try{
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}

		return xmlhttp;
    }

//**************************************


       function view(Id) {
	var e = document.getElementById('level');
	var selectedText = e.options[e.selectedIndex].text;

	document.forms[0].lv.value=selectedText;
	document.forms[0].h_levl.value=Id;

//****************************************************
   var strURL="findState.php?c_id="+Id;
   var req = getXMLHTTP();
   if (req)
   {
     req.onreadystatechange = function()
     {
      if (req.readyState == 4)
      {
	 // only if "OK"
	 if (req.status == 200)
         {
	    document.getElementById('statediv').innerHTML=req.responseText;
	 } else {
   	   alert("There was a problem while using XMLHTTP:\n" + req.statusText);
	 }
       }
      }
   req.open("GET", strURL, true);
   req.send(null);
   }

}

 //*****************************************************
        function view2(Id) {
	var e = document.getElementById('sub');
	var selectedText = e.options[e.selectedIndex].text;

	document.forms[0].sname.value=selectedText;
	document.forms[0].h_sub.value=Id;
}

</script>



