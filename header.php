<!DOCTYPE html>
<html lang="en">
<head>
	<title>sCard</title>
	
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	
	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="stylesheets/base.css" />

	<link rel="stylesheet" type="text/css" href="stylesheets/media.queries.css" />
	<link rel="stylesheet" type="text/css" href="stylesheets/tipsy.css" />
	<link rel="stylesheet" type="text/css" href="javascripts/fancybox/jquery.fancybox-1.3.4.css" />
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Nothing+You+Could+Do|Quicksand:400,700,300">
	
	<!-- Javascripts -->
	<script type="text/javascript" src="javascripts/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="javascripts/html5shiv.js"></script>
	<script type="text/javascript" src="javascripts/jquery.tipsy.js"></script>
	<script type="text/javascript" src="javascripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="javascripts/fancybox/jquery.easing-1.3.pack.js"></script>
	<script type="text/javascript" src="javascripts/jquery.touchSwipe.js"></script>
	<script type="text/javascript" src="javascripts/jquery.mobilemenu.js"></script>
	<script type="text/javascript" src="javascripts/jquery.infieldlabel.js"></script>
	<script type="text/javascript" src="javascripts/jquery.echoslider.js"></script>
	<script type="text/javascript" src="javascripts/fluidapp.js"></script>
	
	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.png" />
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	
	
</head>
<body>
	<!-- Start Wrapper -->
	<div id="page_wrapper">
		
	<!-- Start Header -->
	<header>
		<div class="container">
			<!-- Start Social Icons -->
			<aside>
				<ul class="social">
					<li class="facebook"><a href="https://www.facebook.com/pages/%D7%9B%D7%A8%D7%98%D7%99%D7%A1-%D7%91%D7%99%D7%A7%D7%95%D7%A8-%D7%97%D7%9B%D7%9D-%D7%9C%D7%A7%D7%99%D7%93%D7%95%D7%9D-%D7%90%D7%99%D7%A9%D7%99-%D7%95%D7%A2%D7%A1%D7%A7%D7%99/290761684387909?ref=hl">Facebook</a></li>
					<!--<li class="twitter"><a href="http://twitter.com/two2twelve">Twitter</a></li>-->
					<!--<li class="email"><a href="" title="info@two2twelve.com">Email</a></li>-->
					<!--<li class="rss"><a href="" title="App Updates">RSS</a></li>-->
					<!--<li class="dribbble"><a href="">Dribbble</a></li>-->
					<!--<li class="google"><a href="">Google</a></li>-->
					<!--<li class="flickr"><a href="">Flickr</a></li>-->
				</ul>
			</aside>
			<!-- End Social Icons -->
			
			<!-- Start Navigation -->
			<?php 
			$menu = array();
			$menu['home'] = 'דף הבית';
			$menu['features'] = 'על האפליקציה';
			$menu['screenshots'] = 'דוגמאות';
			$menu['addons'] = 'תוספים';
			$menu['contact'] = 'צור קשר';
			$menu['faq'] = 'שאלות נפוצות';
			
			$url = $_SERVER['PHP_SELF'];
			$page = array_pop(explode('/' , $url));
			?>
			<nav>
				<ul>
				    <?php 
				    if($page == 'index.php'){
				        foreach($menu as $k=>$v){
				            echo '<li><a href="#'. $k .'">' . $v . '</a></li>';
				        }
				    }else{
				        foreach($menu as $k=>$v){
				            echo '<li><a href="index.php?u=' . $k . '">' . $v . '</a></li>';
				        }
				    }
				    ?>
				</ul>
				
				<span class="arrow"></span>
			</nav>
			<!-- End Navigation -->
		</div>
	</header>
	<!-- End Header -->
