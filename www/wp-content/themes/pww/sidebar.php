<div id="sidebar"> 
	<div id="sidebar2">
		<?php /* If this is a 404 page */ 
		if (is_404()) { ?> 
		<!-- 404 -->

		<?php /* If this is a category archive */ }
		elseif (is_category()) { ?> 
		<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>
<hr/>

		<?php /* If this is a yearly archive */ } elseif (is_day()) { ?> 
		<p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/">
			<?php echo bloginfo('name'); ?></a> weblog archives for the day <?php
			the_time('l, F jS, Y'); ?>.
		</p>
<hr/>
		
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?> 
		<p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/">
			<?php echo bloginfo('name'); ?></a> weblog archives for <?php the_time('F, Y'); ?>.
		</p>
<hr/>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?> 
		<p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/">
			<?php echo bloginfo('name'); ?></a> weblog archives for the year <?php the_time('Y'); ?>.
		</p>
<hr/>

		<?php /* If this is a monthly archive */ } elseif (is_search()) { ?> 
		<p>You have searched the <a href="<?php echo bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives for <strong>'<?php the_search_query(); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.
		</p>
<hr/>

		<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<p>You are currently browsing the <a href="<?php echo bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives.</p>
<hr/>
		<?php } ?>

		<h2>Cuzimatter</h2>
	  <p>Cuzimatter is our social bookmark link generator. It supports digg, reddit, 
		del.icio.us and a bunch of other social bookmark sites.</p>
	  <a href="http://www.playingwithwire.com/cuzimatter/">Cuzimatter</a>
		<hr/>
		
		<h2>WireLoad Stats</h2>
		  Latte count: <b>41</b><br/>
		  Credit Card Offers Rec'd.: <b>4</b><br/>
		  WireLoad.net outages: <b>2</b><br/>
         Slashdots: <b>1</b><br/>
		  Machines: <b>7</b><br/>
		  Forms filed: <b>6</b><br/>
		<hr/>

		<h2>Links</h2>
		<ul><?php wp_list_pages('title_li=' ); ?>
<?php wp_meta(); ?> 
		<li><script type="text/javascript">eval(unescape('d%6fc%75%6de%6e%74%2e%77%72%69%74e%28%27%3Ca%20%68%72ef%3D%22%26%23109%3Ba%26%23105%3B%6c%26%23116%3B%26%23111%3B%3A%26%2398%3B%26%23108%3B%26%23111%3B%26%23103%3B%26%2364%3B%26%23119%3B%26%23105%3B%26%23114%3B%26%23101%3B%26%23108%3B%26%23111%3B%26%2397%3B%26%23100%3B%26%2346%3B%26%23110%3B%26%23101%3B%26%23116%3B%22%3EE%6da%69%6c%20%55%73%3C%2fa%3E%27%29%3B'));</script>
		<noscript>You may email us by concatenating 'blog', '@' and 'wireload.net' into a complete email address.</noscript></li>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		</ul>

		<h2>Search</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		<hr/>

		<h2>Archives</h2> 
		<ul id="recently">
			<?php wp_get_archives('type=monthly'); ?> 
		</ul>

		<h2>Categories</h2>
		<ul><?php wp_list_categories('show_count=1&title_li='); ?></ul>

		<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?> 
		<?php wp_list_bookmarks(); ?>
		

		<?php } ?>


	</div>
</div>
