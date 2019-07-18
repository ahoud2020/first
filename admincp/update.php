<?php
include"adminfile/header.php";
include"admininclude/config.php";
?>

<script type="text/javascript">


  function checkForm(form)
  {
    if(form.username.value == "") {
      alert("Error:اسم المستخدم لايجب ان يكون فارغا!");
      form.username.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.username.value)) {
      alert("Error:اسم المستخدم يجب ان يكون حروف وارقام وعلامة'_'!");
      form.username.focus();
      return false;
    }

    if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
      if(form.pwd1.value.length < 7) {
        alert("Error: كلمة المرور يجب ان تكون على الأقل 7!");
        form.pwd1.focus();
        return false;
      }
      if(form.pwd1.value == form.username.value) {
        alert("Error:كلمة المرور يجب ان تختلف عن اسم المستخدم!");
        form.pwd1.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error:كلمة المرور يجب ان تحتوي على الأقل ارقام (0-9)!");
        form.pwd1.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error:كلمة المرور يجب ان تحتوي على احرف صغيرة (a-z)!");
        form.pwd1.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.pwd1.value)) {
        alert("Error:كلمة المرور يجب ان تحتوي على احرف كبيرة (A-Z)!");
        form.pwd1.focus();
        return false;
      }
    } else {
      alert("Error:تأكد من ان كلمة المرور متطابقة!");
      form.pwd1.focus();
      return false;
    }

  
  }

</script>
<?php
if(level==1){

$bringinfo=mysql_query("SELECT * FROM admin where id = 1")or die(mysql_error());
$fetch=mysql_fetch_assoc($bringinfo);
?>
<form action="update_action.php" method="POST" ... onsubmit="return checkForm(this);">
<table width="100%">
    <tr>
<td>اسم المستخدم</td><td> <input type="text" name="username" value="<?php echo $fetch['username'];?>"></td>
</tr>
<tr>
<td>كلمة المرور</td><td> <input type="password" name="pwd1"></td>
</tr>
<tr>
<td>تأكيد كلمة المرور</td><td> <input type="password" name="pwd2"></td>
<tr>
<td><input type="submit" value="تحديث"></td>
</tr>
</table>
</form>
<?php
echo'</div>';
echo"<br><br><br><br><br><br><br><br><br><br>";
}elseif(level==2){
	
	$bringinfo=mysql_query("SELECT * FROM admin where id = 2")or die(mysql_error());
$fetch=mysql_fetch_assoc($bringinfo);


?>
<form action="update_action.php" method="POST" ... onsubmit="return checkForm(this);">
<table width="100%">
    <tr>
<td>اسم المستخدم</td><td> <input type="text" name="username" value="<?php echo $fetch['username'];?>"></td>
</tr>
<tr>
<td>كلمة المرور</td><td> <input type="password" name="pwd1"></td>
</tr>
<tr>
<td>تأكيد كلمة المرور</td><td> <input type="password" name="pwd2"></td>
</tr>
<tr>
<?php
$sqlquary=mysql_query("SELECT s_email2 FROM configuration");
$fetchsett=mysql_fetch_object($sqlquary);
?>
           <td> بريد المعهد </td>
		   <td><input type="text"name="sitemail" value="<?php echo $fetchsett->s_email2;?>">  </td>
                               </tr>
<td><input type="submit" value="تحديث"></td>
</tr>
</table>
</form>


<?php
echo'</div>';
echo"<br><br><br><br><br><br><br><br><br><br>";
}
include"adminfile/footer.php";
?>