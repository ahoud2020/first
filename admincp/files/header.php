<?php ob_start(); ?>
<?php
include"files/config.php";
define("login",$_COOKIE['login']);
define("admin",$_COOKIE['admin']);


$level=mysql_query("select * from admin where id='".admin."'");
$fetchlevel=mysql_fetch_object($level);

define("level",$fetchlevel->level);

?>

<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />	
<title>الجمعية الخيرية لتحفيظ القرآن الكريم</title>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<script src="//cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
 <script type="text/javascript" src="jquery-1.3.2.js"></script>
 <script src="htttp://code.jquery.com/jquery-1.9.1.js"></script>

</head>

<body>
<div id="wrap">
    <div class="top_corner"></div>
    <div id="main_container">
    
        <div id="header">
             <div id="logo"><a href="admincp.php"><img src="css/images/pic11.png" width="460px" height="130px"></div>
			 
            <a href="make-a-donation.html" class="make_donation"></a>
            
            <div id="menu">
			<?php	 if(login==1)
			{
				?>
                <ul>                                                                                            
                    <li><a href="update.php" title=""><img src="css/images/update2.png">  تحديث البيانات</a></li>
                    <li><a href="logout.php" title=""><img src="https://cdn4.iconfinder.com/data/icons/proglyphs-computers-and-development/512/Logout-24.png"> تسجيل الخروج</a></li>
                   
                </ul>
				<?php } ?>
            </div>
            
        
        </div>