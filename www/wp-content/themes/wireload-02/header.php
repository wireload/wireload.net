<?php get_header('bare'); ?>

<div id="main">

	<div id="header">
		<a href="http://wireload.net" id="logo"><img src="<?php echo_images_uri() ?>/logo.png" alt="WireLoad" /></a>

		<ul id="top-menu">
			<li><a href="<?php echo get_option('home'); ?>" <?php act_if('home') ?>><span>Apps</span></a></li>
			<li><a href="/news" <?php act_if('news') ?>><span>News</span></a></li>
			<li><a href="/company" <?php act_if('company') ?>><span>Company</span></a></li>
			<li><a href="http://support.wireload.net/home" <?php act_if('support') ?>><span>Support</span></a></li>
		</ul>
	</div>

	<div id="body">
