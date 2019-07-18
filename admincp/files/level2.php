         <div id='cssmenu'>
<ul>
<li><a href='addactivity.php'><strong><img src="css/images/file.png"> اضافة نشاط</a></li>
<li><a href='activity.php'><strong><img src="css/images/file.png"> الانشطه</a></li>
<?php
 $selectcm=mysql_query("SELECT * FROM activity_cm WHERE cm_active='1' ") ;
?>
<li><a href='activity_cm.php'><strong><img src="css/images/alarm.png"> تعليقات تنتظر الموافقة <span class="num"><?php echo mysql_num_rows($selectcm) ; ?></span></a></li>
<li><a href='ads.php'><strong><img src="css/images/folder.png"> حالة التسجيل والنتائج</a></li>
<li><a href='add_book.php'><strong><img src="css/images/plus.png">إضافة كتب</a></li>
<li><a href='update_book.php'><strong><img src="css/images/update2.png"> تحديث الكتب</a></li>
<li><a href='regesterstu.php'><strong><img src="css/images/plus.png"> اضافة طالب</a></li>
<li><a href='update_student.php'><strong><img src="css/images/update2.png"> تحديث بيانات الطلاب</a></li>
<li><a href='add_subject.php'><strong><img src="css/images/plus.png">اضافة منهج دراسي</a></li>
<li><a href='update_subject.php'><strong><img src="css/images/update2.png"> تحديث منهج دراسي</a></li>
<li><a href='adddgree.php'><strong><img src="css/images/file.png">اضافة درجات</a></li>
<li><a href='rpt.php'><strong><img src="css/images/file.png">تقرير شامل للطلاب</a></li>
<li><a href='students_level.php'><strong><img src="css/images/file.png">نقل الطالب للمستوى التالي</a></li>


</ul>
</div>
 </div>
 <div class="testimonials">