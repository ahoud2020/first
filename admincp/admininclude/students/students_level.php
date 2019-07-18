<?php include"config.php";
   $lastyear=mysql_result(mysql_query("select max(id) from years"),0,0);

?>
<form name="" action="<?php $_SERVER['PHP_SELF'] ;?>"  method="post">
	<table border='2'>
			<tr>
			<td> رقم الطالب</td>
	         <td>اسم الطالب</td>
			 <td>المستوى</td>
			 </tr>
			<?php
			$selectstudent=mysql_query("SELECT * FROM information")or die (mysql_error());
			while($fetch=mysql_fetch_array($selectstudent)){
				echo'
				<tr>
				<td>'.$fetch['student_id'].'</td>
				<td>'.$fetch['f_name'].', '.$fetch['m_name'].', '.$fetch['l_name'].'</td>
				<td>'.$fetch['level'].'</td>
				</tr>';
			}
			?>
			<tr><td colspan="2"><input name="upgrade" type="submit" value="ترفيع المستويات">
			<input name="downgrade" type="submit" value="تنزيل المستويات"></td>
			</tr>
	</table>
</form>
<?php
if(isset($_POST['upgrade'])){

$selectstudent1=mysql_query("select student_id,level from information")or die (mysql_error());
	while($fetch1=mysql_fetch_row($selectstudent1)){            $flag=0;		   $s=mysql_query("SELECT mark,homework from mark where  student_id='".$fetch1[0]."' and year='".$lastyear."' ")or die(mysql_error());
            while($fetch2=mysql_fetch_row($s)){
	            if(($fetch2[0]+$fetch2[1])<50)
	            $flag+=1;            }

           if($flag==0){	           $newlevel=$fetch1[1]+1;
	           $selectstudent=mysql_query("update information set level='".$newlevel."' where student_id='".$fetch1[0]."'")or die (mysql_error());
	           $newlevel=0;
           }

           $flag=0;
	}

		echo "تمت عملية الترفيع بنجاح";

}
//***********************************************************
if(isset($_POST['downgrade'])){

$selectstudent1=mysql_query("select student_id,level from information")or die (mysql_error());
	while($fetch1=mysql_fetch_row($selectstudent1)){

		   $s=mysql_query("SELECT mark,homework from mark where  student_id='".$fetch1[0]."' and year='".$lastyear."' ")or die(mysql_error());
            while($fetch2=mysql_fetch_row($s)){
	            if(($fetch2[0]+$fetch2[1])<50)
	            $flag+=1;
            }

           if($flag==0){
	           $newlevel=$fetch1[1]-1;
	           $selectstudent=mysql_query("update information set level='".$newlevel."' where student_id='".$fetch1[0]."'")or die (mysql_error());
	           $newlevel=0;
           }

           $flag=0;

	}

		echo "تمت عملية التنزيل  بنجاح";
}?>