<?php
$sitename =strip_tags($_POST['sitename']);
$sitemail =strip_tags($_POST['sitemail']);
$sitedec =strip_tags($_POST['sitedec']);
$sitekey=strip_tags($_POST['sitekey']);
$sitecopy =strip_tags($_POST['sitecopy']);
$sqlquary=mysql_query("SELECT * FROM configuration");
$fetchsett=mysql_fetch_object($sqlquary);
#=============================================#
if (isset($_POST['submitting'])){
	
	$settup=mysql_query("UPDATE configuration SET 
	s_name='$sitename',
	s_email='$sitemail',
	s_desc='$sitedec',
	s_key='$sitekey',
	s_copy='$sitecopy'
	")or die (mysql_error());
	if (isset($settup)){
		
		  echo"<div class='success'>تم تحديث البيانات بنجاح</div><br></h3>";
		  	echo"<meta http-equiv='refresh'content='3; url=admincp.php?type=setting'>";
		
	}
}


?>
<html>
<body>
<form action="admincp.php?type=setting"method="POST">
<table width="100%">
    <tr>
           <td> اسم الموقع</td>
		   <td> <input type="text"name="sitename" value="<?php echo $fetchsett->s_name;?>"> </td>
                               </tr>

							       <tr>
           <td> بريد الموقع </td>
		   <td><input type="text"name="sitemail" value="<?php echo $fetchsett->s_email;?>">  </td>
                               </tr>
 <tr>  
           <td>   وصف الموقع </td>
		   <td>   <textarea name="sitedec" style="width:400px;height:100px;"><?php echo $fetchsett->s_desc;?></textarea>  </td>
                               </tr>
							       <tr>
           <td>  كلمات مفتاحية </td>
		   <td><textarea name="sitekey" style="width:400px;height:100px;"><?php echo $fetchsett->s_key;?></textarea>  </td>
                               </tr>
 <tr>  

			<tr>  
           <td>  حقوق الموقع</td>
		  
		   <td>  <input type="text"name="sitecopy" value="<?php echo $fetchsett->s_copy;?>">    </td>
		
                               </tr>
	   </table>
	     

      <table width="100%">
	   <tr>
		   <td>  <input type="submit"name="submitting"value="حفظ البيانات"></td>
       </tr>
			</table>
</form>
</body>
</html>

