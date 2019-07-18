
<?php

include"files/config.php";
?>
<html lang="ar" dir="rtl">
<head>
	<meta charset="utf-8" />
	<title> الجمعية الخيرية لتحفيظ القرآن الكريم</title>
	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	
	<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->
	<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
	<script src="js/functions.js" type="text/javascript"></script>
</head>
<body>
	<div id="wrapper">
		<!-- header -->
		<header class="header">
			<!-- shell -->
			<div class="shell">
				<h1 id="logo">&nbsp;</h1>
				
				<!-- navigation -->
				<nav id="navigation">
					<ul>
						<li class="active"><a href="chirty.php">الرئيسية</a></li>
				<li><a href="aboutcharity.php">الجمعية الخيرية</a></li>
						<li><a href="contactUs_ch.php">راسلنا</a></li>
						<li><a href="admincp/admincp.php">الدخول للوحة التحكم</a></li>
						
						
					    
					</ul>
				</nav>
				<img src="css/images/pic11.png" width="403" height="120" alt=""/>				<!-- navigation -->
			</div>
			<!-- end of shell -->
		</header>
		<!-- end of header -->
		<!-- shell -->
		<div class="shell">
			<!-- main -->
			<div class="main">
				<!-- slider-holder -->
				<section class="slider-section">
					<h2 class="alignright">&nbsp;</h2>
				
				  <div class="cl">&nbsp;</div>
					<!-- slider -->
					<div class="slider-holder">
						<span class="slider-shadow"></span>
						<div class="flexslider">
					
				
							<ul class="slides">
								<?php
							
						$selectreport=mysql_query("SELECT * FROM post ORDER BY p_id DESC LIMIT 3") ;
					
                           while($fetchpost=mysql_fetch_object($selectreport))
                              {
						?>
								<li>
									<img src='images/<?php echo $fetchpost->p_pic ;?>'alt="" />
									<div class="slide-cnt">
										<h3><?php  mysql_query("set names utf8"); echo $fetchpost->p_title ;?></h3>
										<p><?php mysql_query("set names utf8");  echo mb_substr($fetchpost->p_sub,0,250,'UTF-8') ; echo '....';?></p>
										<?php echo' <a href="post.php?id='.$fetchpost->p_id.'" >إستعرض المزيد </a>';?> 
										
									</div>
									
								</li>
								<?php } ?>
								<?php
							
						$selectreport=mysql_query("SELECT * FROM activity ORDER BY p_id DESC LIMIT 3") ;
					
                           while($fetchpost=mysql_fetch_object($selectreport))
                              {
						?>
								<li>
									<img src='images/<?php echo $fetchpost->p_pic ;?>'alt="" />
									<div class="slide-cnt">
										<h3><?php  mysql_query("set names utf8"); echo $fetchpost->p_title ;?></h3>
										<p><?php mysql_query("set names utf8");  echo mb_substr($fetchpost->p_sub,0,250,'UTF-8') ; echo '....';?></p>
										<?php echo' <a href="activity.php?id='.$fetchpost->p_id.'">المزيد </a>';?> 
										
									</div>
									
								</li>
								<?php } ?>
								</ul>
								
						</div>
						
					</div>	
				<!-- end of slider -->
				</section>
				<!-- slider-holder -->
				<!-- cols -->
				<section class="cols">
					<div class="col">
					  <h3 class="starter-ico"><a href="#"><a href="#">هدفنا</a></h3>
						<p>
غرس خلق القرآن الكريم في الشباب ليتربى التربية الصالحة.<br>
احياء دور المسجد في الاسلام بإقامة تلك الحلقات القرانيه فيه.<br>
تخريج مجموعة من القراء المؤهلين لإمامة الساجد وتديس القرآن الكريم.</p>
					</div>
					<div class="col">
						<h3 class="awesome-ico">رسالتنا</h3>
						<p>ربط المسلم بكتاب الله تعالى علمًا وعملًا.لأفراد المجتمع ذكورًا وإناثًا صغارًا وكبارًا <br><br><br><br><br></p>
					</div>
					<div class="col">
						<h3 class="save-ico">أملنا</h3>
						<p>ألا يبقى مسجد في المحافظة إلا وبه حلقة ولا بيت إلا وبه حافظ<br><br><br><br><br></p>
					</div>

					<div class="cl">&nbsp;</div>
				</section>
				<!-- end of cols -->

				<!-- featured -->
				<section>
					<h3 class="alignright">&nbsp;</h3>
				  <div class="cl">&nbsp;</div>

					<div class="featured">
						<div class="entry">
							<a href="system.php"><em></em>
								<img src="css/images/entry-img1.jpeg" alt="" />
								<span>معهد اعداد معلمات القران الكريم </span>
							</a>
							<strong></strong>
						</div>
						<div class="entry">
							<a href="#"><em></em>
								<img src="css/images/cutt.png" alt="" />
								<span>مشروع استقطاع الخير </span>
							</a>
							<strong></strong>
						</div>
						<div class="entry">
							<a href="#"><em></em>
								<img src="css/images/donate logo.jpg" alt="" />
								<span>تبرع للجمعية </span>
							</a>
							<strong></strong>
						</div>
						<div class="entry">
							<a href="#"><em></em>
								<img src="css/images/entry-img4.png" alt="" />
								<span>يمكنك وضع نص هنا </span>
							</a>
							<strong></strong>
						</div>
						<div class="entry">
							<a href="#"><em></em>
								<img src="css/images/entry-img5.png" alt="" />
								<span>يمكنك وضع نص هنا </span>
							</a>
							<strong></strong>
						</div>
					</div>
				</section>
				<!-- end of featured -->
			</div>
			<!-- end of main -->
		</div>
		<!-- end of shell -->
		<div id="footer-push"></div>
	</div>	
	<!-- footer -->
	<div id="footer">

		<!-- shell -->
		<div class="shell">
			<div class="widgets">
			  <div class="cl">&nbsp;</div>
			</div>
			<!-- end of widgets -->

			<!-- footer-bottom -->
			<div class="footer-bottom">
				<!-- footer-nav -->
				<div class="footer-nav"> </div>
				<!-- end of footer-nav -->
				
			</div>
			<!-- end of footer-bottom -->
		</div>
		<!-- end of shell -->
	</div>
	<!-- end of footer -->
</body>
</html>