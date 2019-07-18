<?php ob_start(); ?>
<?php include"admininclude/config.php";?>
<?php
define("login",$_COOKIE['login']);
define("admin",$_COOKIE['admin']);
define("type",$_GET['type']);

$level=mysql_query("select * from admin where id='".admin."'");
$fetchlevel=mysql_fetch_object($level);

define("level",$fetchlevel->level);

?>
<html>
<head>
<title> <?php echo s_name ; ?></title>
<meta charset="UTF-8" />
<link rel="stylesheet"  href="admincss/style.css" type="text/css" />
<meta content='<?php echo s_desc ; ?>' name='description'/>
<meta content='<?php echo s_key ; ?>' name='keywords'/>
<script src="//cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
 <script type="text/javascript" src="jquery-1.3.2.js"></script>

</head>
<body>

       <!--HEADER-->

   <div class="header-b">
         <div class="navtop">

		 
   <div class="clear"></div>
         </div>
		 <div class="head container">

		   <div class="logo">
		   <a href="#"><img src="adminimges/ddd.png" alt="" width="350"></a>
		 </div>
		 <div class="ads">

		</div>
		 <div class="clear"></div>
        </div>
		<div class="navbar">
		 <div class="container">
		 			 <ul>
			<?php	 if(login==1)
			{
				?>
   <li><a href="admincp.php">الرئيسية</a></li>
   <li><a href="update.php">تحديث البيانات</a></li>
   <li><a href="logout.php">تسجيل الخروج </a></li>
   </ul>
				<?php } ?>
   </ul>

   </div>
		</div>
		</div><br><br>
       <!--//HEADER-->

         <!--CONTENT-->
		  <div class="container">
		  <div style="float:right;width:600px;">