<?php  include"adminfile/header.php";  ?>
<?php  include"admininclude/config.php";?>
<?php

$myusername=strip_tags($_POST['username']);
$mypassword=$_POST['password'];
 if(isset($_POST['submit'])){

	    if(empty($myusername) OR empty($mypassword))
		{
			echo"<div class='error'>الرجاء ملئ كافة البيانات</div><br></h3>";
			echo"<meta http-equiv='refresh'content='3; url=admincp.php'>";
	    }
		else{


$sql="SELECT * FROM admin WHERE username='".$myusername."' and password='".$mypassword."'";
$result=mysql_query($sql);

$login=mysql_num_rows($result);

$fetch=mysql_fetch_object($result);
	$id_=$fetch->id;

if($login==1){


				 setcookie("login","1",time()+60*60*2);
				 setcookie("admin",$id_,time()+60*60*2);
                echo"<div class='success'>تم تسجيل دخولك بنجاح جاري التحويل للرئيسية </div><br></h3>";
			echo"<meta http-equiv='refresh'content='3; url=admincp.php'>";

}
else{ 	echo"<div class='error'>البيانات المدخلة خاطئة </div><br></h3>";
		echo"<meta-equiv='refresh'content='3 url=admincp.php'>
				";
 }}}
 if(login==1 and level==2){

  echo'
  <a href="admincp.php?type=addactivity"><button class="set">إضافة نشاط</button></a>
   <a href="admincp.php?type=activity"><button class="set">الأنشطة </button></a>';
   $selectcm=mysql_query("SELECT * FROM activity_cm WHERE cm_active='1' ");
echo'
    <a href="admincp.php?type=activity_cm"><button class="set">تعليقات تنتظر الموافقة('.mysql_num_rows($selectcm).')</button></a>
	<a href="admincp.php?type=ads"><button class="set">حالة التسجيل والنتائج</button></a>
	<br><br>
	 <a href="admincp.php?type=regesterstu"><button class="set">إظافة طالب</button></a>
	 <a href="admincp.php?type=update_student"><button class="set">تحديث بيانات الطلاب</button></a>
	<a href="admincp.php?type=rpt"><button class="set"> تقرير الطلاب</button></a>
	<a href="admincp.php?type=adddgree"><button class="set">إضافة درجات</button></a>
	<a href="admincp.php?type=courses"><button class="set">إضافة مادة</button></a>
	<br><br>
	<a href="admincp.php?type=addcourse"><button class="set">اضافة منهج</button></a>
	<a href="admincp.php?type=addcourse2"><button class="set">تحديث المناهج</button></a>





 <div class="admincontant">';
 if(type==""){}
elseif(type=="addactivity"){ include"admininclude/addactivity.php";}
elseif(type=="setting"){ include"admininclude/setting.php";}
elseif(type=="activity"){include"admininclude/activity.php";}
elseif(type=="activity_cm"){ include"admininclude/activity_cm.php";}
elseif(type=="ads"){ include"admininclude/ads.php";}
elseif(type=="rpt"){ include"admininclude/students/rpt.php";}
elseif(type=="regesterstu"){ include"admininclude/students/regesterstu.php";}
elseif(type=="update_student"){ include"admininclude/students/update_student.php";}
elseif(type=="adddgree"){ include"admininclude/students/adddgree.php";}
elseif(type=="courses"){ include"admininclude/students/courses.php";}
elseif(type=="addcourse"){ include"admininclude/students/addcourse.php";}
elseif(type=="addcourse2"){ include"admininclude/students/addcourse2.php";}

 }elseif(login==1 and level ==1){
	 echo'
 <a href="admincp.php?type=setting"><button class="set">إعدادت الموقع</button></a>
  <a href="admincp.php?type=addpost"><button class="set">إضافة خبر</button></a>
   <a href="admincp.php?type=post"><button class="set">الأخـبار</button></a>';
   $selectcm=mysql_query("SELECT * FROM comments WHERE cm_active='1' ") ;
   echo'
    <a href="admincp.php?type=comments"><button class="set">تعليقات تنتظر الموافقة('.mysql_num_rows($selectcm).')</button></a>



 <div class="admincontant">';
 if(type==""){}
elseif(type=="setting"){ include"admininclude/setting.php";}
elseif(type=="addpost"){ include"admininclude/addpost.php";}
elseif(type=="setting"){ include"admininclude/setting.php";}
elseif(type=="post")   { include"admininclude/post.php";      }
elseif(type=="comments"){ include"admininclude/comments.php";}
elseif(type=="block"){ include"admininclude/block.php";}


	 }



 echo'</div>';
?>





<?php include"adminfile/block.php";?>

<?php include"adminfile/footer.php";?>