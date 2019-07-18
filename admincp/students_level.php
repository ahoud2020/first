<?php
include"files/header.php";
include"files/h2.php";
include"files/level2.php";


  

//************************************************************************
function ispass($fetch1)
{
$lastyear=mysql_result(mysql_query("select max(id) from years"),0,0);
  $s=mysql_query("SELECT mark,homework from mark where  student_id='".$fetch1."' and year='".$lastyear."' ")or die(mysql_error());

  if(mysql_num_rows($s)>0){
	  while($fetch2=mysql_fetch_row($s)){
	   if(($fetch2[0]+$fetch2[1])<50)
	   $flag+=1;
	  }
  }else{
	return false;
  }
  if($flag==0)
    return true;
  else
    return false;
}

if(isset($_POST['upgrade'])){

$selectstudent1=mysql_query("select student_id,level from information" )or die (mysql_error());
	while($fetch1=mysql_fetch_row($selectstudent1)){
       if(ispass($fetch1[0]) ){
       	switch($fetch1[1]) {
         case 0: $newlevel=0;break;
         case 1: $newlevel=$fetch1[1]+1;break;
         case 2: $newlevel=0;break; }

         $selectstudent=mysql_query("update information set level='".$newlevel."' where student_id='".$fetch1[0]."'")or die (mysql_error());
         $newlevel=0;
        }

	}
		echo"<p class='success'>تمت العملية بنجاح</p>";
	   	echo"<meta http-equiv='refresh'content='3; url=students_level.php'>";
}

//******************************************************************
if(isset($_POST['downgrade'])){

$selectstudent1=mysql_query("select student_id,level from information")or die (mysql_error());
	while($fetch1=mysql_fetch_row($selectstudent1)){
       if(ispass($fetch1[0]) ){
         switch($fetch1[1]) {
         case 0: $newlevel=2;break;
         case 1: $newlevel=1;break;
         case 2: $newlevel=$fetch1[1]-1;break; }

         $selectstudent=mysql_query("update information set level='".$newlevel."' where student_id='".$fetch1[0]."'")or die (mysql_error());
         $newlevel=0;
        }

	}

		 echo"<p class='success'>تمت العملية بنجاح</p>";
	   	echo"<meta http-equiv='refresh'content='3; url=students_level.php'>";
}
$select=mysql_query("select student_id,level from information")or die (mysql_error());
while($fetch=mysql_fetch_row($select)){
if($fetch[1]==0)
$deletinfo=mysql_query("delete from mark where student_id='".$fetch[0]."'")or die (mysql_error());		

}
?>
<form name="" action="<?php $_SERVER['PHP_SELF'] ;?>"  method="post">
	<table border='2'>
			<tr>
			<td> رقم الطالب</td>
	         <td>اسم الطالب</td>
			 <td>المستوى</td>
			 </tr>
			<?php
			$selectstudent=mysql_query("SELECT * FROM information where level >0")or die (mysql_error());
			while($fetch=mysql_fetch_array($selectstudent)){
				echo'
				<tr>
				<td>'.$fetch['student_id'].'</td>
				<td>'.$fetch['f_name'].', '.$fetch['m_name'].', '.$fetch['l_name'].'</td>
				<td>'.$fetch['level'].'</td>
				</tr>';
			}
			?>
			</table>
			<table>
			<tr><td colspan="2"><input name="upgrade" type="submit" value="نقل الطالب للمستوى الثاني">
			</tr>
	</table>
</form>
