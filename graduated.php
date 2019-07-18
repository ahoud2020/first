<?php include"files/header2.php";
include"files/h2.php";
?>
             
         <div id='cssmenu'>
<ul>
<li><a href='system.php'><strong>نظام الدراسة </a></li>
<li><a href='download.php'><strong>مناهج الدراسة</a></li>
<li><a  href='register.php'>تقديم طلب تسجيل</a></li>
<li><a href='viwegrade.php'><strong>استعلام عن النتائج</a></li>
<li><a class="current" href='graduated.php'><strong>طلاب المعهد</a></li>
<li><a href='how_help.php'><strong>كيف تدعمنا</a></li>
<li><a href='contactus.php'><strong>تواصل مع ادارة المعهد</a></li>

</ul>
</div>


             </div>
            
             <div class="testimonials">
			 *بيان بالطالبات الآتي تخرجن من المعهد*
                 <form name="" action="<?php $_SERVER['PHP_SELF'] ;?>"  method="post">
				 
	<table  width="40%" border='2'>
			<tr>
			
	         <td> <center>اسم الطالب </center></td>
			 
			 </tr>
			<?php
			$selectstudent=mysql_query("SELECT f_name,m_name,l_name FROM information where level >0")or die (mysql_error());
			while($fetch=mysql_fetch_array($selectstudent)){
				echo'
				<tr>
				
				<td> <center>'.$fetch['f_name'].', '.$fetch['m_name'].', '.$fetch['l_name'].' </center></td>
				
				</tr>';
			}
			?>
			</table>

</form>

 <div class="testbox">
                 
                    </div> 

             </div>
        
        
        
   
        
        <div class="clear">   </div>
        </div>
        
      <?php include"files/footer2.php";
	  ?>
      
      
    
    </div>
</div>
</body>
</html>
