          <div id='cssmenu'>
<ul>
<li><a href='addpost.php'><strong><img src="css/images/file.png">إضافة خبر</a></li>
<li><a href='post.php'><strong><img src="css/images/file.png"> الاخبار</a></li>
<?php
 $selectcm=mysql_query("SELECT * FROM comments WHERE cm_active='1' ") ;
?>
<li><a href='comments.php'><strong><img src="css/images/alarm.png"> تعليقات تنتظر الموافقة <span class="num"><?php echo mysql_num_rows($selectcm) ; ?></span></a></li>

</ul>
</div>
  </div>