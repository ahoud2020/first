<?php include"files/header2.php";
include"files/h2.php";
?>
       <style> 
#testimonials{ 
    width:660px; 
	
	float:left;	
} 
table{ 
    float:left; 
	
    } 
</style> 
      
         <div id='cssmenu'>
<ul>
<li><a href='system.php'><strong>نظام الدراسة </a></li>
<li><a class="current" href='download.php'><strong>مناهج الدراسة</a></li>
<li><a href='register.php'><strong>تقديم طلب تسجيل</a></li>
<li><a href='viwegrade.php'><strong>استعلام عن النتائج</a></li>
<li><a  href='graduated.php'><strong>الطلاب المتخرجون من المعهد</a></li>
<li><a href='how_help.php'><strong>كيف تدعمنا</a></li>
<li><a href='contactus.php'><strong>تواصل مع ادارة المعهد</a></li>
</ul>
</div>


             </div>
            
             <div class="testimonials">
                   <?php
   		$select1=mysql_query("SELECT * FROM books")or die(mysql_error());
    	while($row = mysql_fetch_row($select1))  {
     ?>
				   
				   <center>
<table width="200px" border="1"> 
  <tbody>
    <tr>
	
			
       <td width="158" height="198">
	   <center><?php echo $row[1] ;?></center>
	   <center><img src="books_image/<?php echo $row[2];?>" width="151" height="165" alt=""/> <p> 
        <strong><a href="<?php echo $row[3] ;?>" target="blank"><center>قراءة و تحميل</center></a></strong>
      </p></center></td>
	  

  <?php } ?>

     
     
      
      
    </tr>
    
  </body>
</table>
</center>

						 
        
        
        
   
        
        <div class="clear">   </div>
        </div>
        
      <?php include"files/footer2.php";
	  ?>
      
      
    
    </div>
</div>
</body>
</html>
