<?php
include_once('autoloader.php');
function get_feed($url){
	$feed = new SimplePie();
	$feed->set_feed_url($url);
	$feed->set_item_limit(3);
	$feed->enable_cache(false);
	$feed->init();
	$feed->handle_content_type();
	return $feed;
}

$blog_feed = get_feed('http://cyberasylum.wordpress.com/feed/');
$twitter_feed = get_feed('http://api.twitter.com/1/statuses/user_timeline.rss?screen_name=janithw');

?>

<html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Janith Weerasinghe's Cyber Space</title>
	
	<meta name="title" content="Janith Weerasinghe's Cyber Space">
	<meta name="description" content="Hi, I'm Janith Weerasinghe and I'm mad about computers.">
	
	<meta name="google-site-verification" content="">
	<!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
	
	<meta name="author" content="Janith Weerasinghe">
	<meta name="Copyright" content="Copyright Janith Weerasignhe 2012. All Rights Reserved.">


	<link rel="shortcut icon" href="_/img/favicon.ico">
	<!-- This is the traditional favicon.
		 - size: 16x16 or 32x32
		 - transparency is OK
		 - see wikipedia for info on browser support: http://mky.be/favicon/ -->
	
	<link rel="stylesheet" href="_/css/style.css">
	<script src="_/js/modernizr-1.7.min.js"></script>
</head>

<body>

<div class="wrapper"><!-- not needed? up to you: http://camendesign.com/code/developpeurs_sans_frontieres -->

	<header>
		<div class="top-line">Hi, I'm <span class="name">Janith</span></div>
		<div class="bottom-line"><span class="name">Weerasinghe</span> and I'm mad about computers!</div>
	</header>
	<?php /*
	<!--nav>
		<ul>
			<li class="magenta"><a href="#home">home</a></li>
			<li class="orange"><a href="#about">about Me</a></li>
			<li class="green"><a href="#dots">my dots</a></li>
			<li class="yellow"><a href="#contact">contact</a></li>
		</ul>
	</nav-->*/
	?>
	<div class="content">
		<article class="left half magenta" id="home">
			<div class="article-line"></div>
			<div class="article-content" style="display:none">
				<h1>latest from by Blog: <a>cyberasylum</a></h1>
				<?php	foreach ($blog_feed->get_items(0,3) as $item):?>
					<div class="item">
						<h2><a href="<?php echo $item->get_permalink(); ?>" target="_blank"><?php echo $item->get_title(); ?></a></h2>
						<p><?php echo $item->get_description(); ?></p>
						<p><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></p>
					</div>
				<?php endforeach; ?>
			</div>
		</article>
		<article class="right half blue" >
			<div class="article-line"></div>
			<div class="article-content" style="display:none">
				<h1>recent Tweets: <a href="https://twitter.com/janithW" target="_blank">@janithw</a></h1>
				<?php	foreach ($twitter_feed->get_items(0,5) as $item):?>
					<div class="item">
						<p><?php echo $item->get_description(); ?></p>
						<p><a href="<?php echo $item->get_permalink();?>" target="_blank"><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></a></p>
					</div>
				<?php endforeach; ?>
			</div>
		</article>
		<article class="left full green" id="about">
			<div class="article-line"></div>
			<div class="article-content" style="display:none">
				<div class="text-heading"><h1>about me:</h1></div>
				<div class="text-content">
					<p>
						I’m Janith, currently an undergraduate of the <a href="">Department of Computer Science and Engineering</a>, <a href="">University of Moratuwa</a>.
						 I’ve worked at <a href="">99X Technology</a> as an intern. I love software design and architecture. I also work at <a href="">CST Labs</a>, a startup company with a couple of my friends. 
						 I have taken an interest in JavaScript web applications after I co-authored <a href="">BoilerplateJS</a>.
					</p>
				</div>
			</div>
		</article>

		<article class="left full yellow" id="contact" >
			<div class="article-line"></div>
			<div class="article-content" id="social" display:none">
				<h1>connect with me on:</h1>
				<div class="social-icons">
					<a href="https://twitter.com/janithW" target="_blank"><div class="twitter"></div></a>
					<a href="https://www.facebook.com/janith.weerasinghe" target="_blank"><div class="facebook"></div></a>
					<a href="http://www.linkedin.com/in/janithw" target="_blank"><div class="linkedin"></div></a>
					<a href="https://github.com/slayerjay" target="_blank"><div class="github"></div></a>
				</div>
			</div>
		</article>
		
	</div>
	
	<footer>
		<p><small>&copy; Copyright Janith Weerasignhe 2012. All Rights Reserved.</small></p>
	</footer>

</div>

<!-- here comes the javascript -->

<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='_/js/jquery-1.5.1.min.js'>\x3C/script>")</script>

<!-- this is where we put our custom functions -->
<script src="_/js/functions.js"></script>

<!-- Asynchronous google analytics; this is the official snippet.
	 Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.
	 
<script>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXXX-XX']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
-->
  
</body>
</html>