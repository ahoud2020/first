<?php include"files/header.php";
include"files/h2.php";
?>
             
         <div id='cssmenu'>
<ul>
<li><a href='system.php'><strong>نظام الدراسة </a></li>
<li><a class="current" href='download.php'><strong>مناهج الدراسة</a></li>
<li><a href='register.php'><strong>تقديم طلب تسجيل</a></li>
<li><a href='viwegrade.php'><strong>استعلام عن النتائج</a></li>
<li><a href='how_help.php'><strong>كيف تدعمنا</a></li>
<li><a href='contactus.php'><strong>تواصل مع ادارة المعهد</a></li>
</ul>
</div>


             </div>
            
             <div class="testimonials">
                   <center>
<table width="499" height="386" border="1px">
  <tbody>
    <tr>
	
			<?php
   		$select1=mysql_query("SELECT * FROM add_subject")or die(mysql_error());
    	while($row = mysql_fetch_row($select1))  {
     ?>
       <td width="158" height="198">
	   اسم المادة:<?php echo $row[1] ;?>
	   <center><img src="new/admincp/admininclude/students/iamge/<?php $row[2] ;?>" width="151" height="165" alt=""/> <p> 
        <strong><a href="<?php echo $row[3] ;?>" target="blank"><center>قراءة و تحميل</center></a></strong>
      </p></center></td>
	  

  <?php } ?>

     
     
      
      
    </tr>
    
  </body>
</table>
</center>

						 
        
        
        
   
        
        <div class="clear">   </div>
        </div>
        
      <?php include"files/footer.php";
	  ?>
      
      
    
    </div>
</div>
</body>
</html>
