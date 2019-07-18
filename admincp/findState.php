
<?php

include"files/config.php";
$id=intval($_GET['c_id']);

$select1=mysql_query("SELECT * FROM course where term='".$id."'")or die(mysql_error());
?>
حدد المادة
<select size="1"  name="subjects" id="sub" onchange="view2(this.value)">
  <option value="0">----</option>
        <?php
  while($row = mysql_fetch_row($select1))  {
	echo '<option value='.$row[0].'>'. $row[1].'</option> ';
	 } ?>
</select>