</div>
  <div class="blocklift">

<div class="content-block">
<?php

 if(login==0){
	
	 
   
echo'
<div class="title-block">
<h3> الدخول الى لوحة التحكم </h3></div>
<form action="admincp.php"method="POST">
<table width="100%">
    <tr>
           <td>   اسم المستخدم </td>
		   <td>   <input type="text"name="username"></td>
       </tr>
	      <tr>
           <td>  كلمة المرور  </td>
		   <td>   <input type="password"name="password"><br>  </td>
       </tr>
	   </table>

      <table width="100%">
	   <tr>
		   <td>  <input type="submit"name="submit"value="تسجيل الدخول "></td>
       </tr>
			</table>


</form>';
	 }
?>
</div> 

</div>
  <div class="clear"></div>

   
	 




  


  