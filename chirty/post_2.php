<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include "../include/config.php";
       include"files/header.php";
      include"files/ago.php";
?>
        
         
        <div class="center_content_pages">
        <p class="p"><strong>قال الله تعالى: (إن هذا القرآن يهدي للتي هي أقوم ويبشر المؤمنين الذين يعملون الصالحات أن لهم أجرا كبيرا)</strong></p>
              <div class="financial-application-form">
             
          
             
 


             </div>
            
                 <div class="testimonials">
			 
                  <?php 
				    $selectreport=mysql_query("SELECT * FROM post ORDER BY p_id DESC ") ;
                    while($fetchpost=mysql_fetch_object($selectreport))
                       {
				      echo'<center><h3>'.$fetchpost->p_title.'</h3></center>';
                      echo'<img src='.$fetchpost->p_pic.' width="600" height="345" />';
				     
					  ?>
                  <h5> <?php echo mb_substr($fetchpost->p_sub,0,250,'UTF-8') ; echo '....';?></h5>
		         <h6> <?php echo' <a href="post.php?id='.$fetchpost->p_id.'">المزيد </a>';?> </h6>
                                  <?php }?>
                      
                    
             </div>
        
        
        
   
        
        <div class="clear">   </div>
        </div>
       <?php  include"files/footer.php";?>
        
      
      
    
    </div>
</div>
</body>
</html>
