<?php

include"files/header.php";
include"files/h2.php";
include"files/level2.php";

$select=mysql_query("SELECT * FROM ads")or die(mysql_error());
mysql_query("set names utf8");
$fetchasd=mysql_fetch_assoc($select)or die(mysql_error());


$active1 =$_POST['active1'];
$active2 =$_POST['active2'];
$msg1=$_POST['code1'];
$msg2=$_POST['code2'];
if (isset($_POST['submitt'])){
	
	
	$adsup=mysql_query("UPDATE ads SET 
	active1='$active1',
	active2='$active2',
	code1='$msg1',
	code2='$msg2'")or die(mysql_error());
		
	if (isset($adsup)){
			  echo"<p class='success'>تم التحديث بنجاح </p><br></h3>";
		  	echo"<meta http-equiv='refresh'content='3; url=ads.php'>";
		
}}
?>
<form method='POST' action='ads.php'>
<table border='0' width='100%'>

<tr>
<td>التسجيل</td>
<td> <select name ="active1">
<?php
if($fetchasd['active1']==1){
 echo' 
<option value="1">مفعل</option>
<option value="0">غير مفعل</option>';
}else{
echo' 
<option value="0">غير مفعل</option>
<option value="1">مفعل</option>
';
}
?>

</select>
</td> 
</tr>
<tr>
<td>رسالة الغلق</td>
<td> <textarea name='code1'  style= 'height:150px; width:100%;'><?php echo $fetchasd['code1'];?></textarea></td> 
</tr>
<tr>
<td>النتائج</td>
<td> <select name="active2"><?php
if($fetchasd['active2']==1){
 echo' 
<option value="1">مفعل</option>
<option value="0">غير مفعل</option>';
}else{
echo' 
<option value="0">غير مفعل</option>
<option value="1">مفعل</option>
';
}
?>
</select>
</td> 
</tr>
<tr>
<td>رسالة الغلق</td>
<td> <textarea name='code2'  style= 'height:150px; width:100%;'><?php echo $fetchasd['code2'];?></textarea></td> 
</tr>
<tr>
<td colspan="?"><input type="submit" name="submitt" value="تحديث"> </td>
</tr>
</table>
</form>

</div>