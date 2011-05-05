<?php
/*
Template Name: Company Page
*/
?>

<?php get_header(); ?>

<div id="about">
	<div class="item">
		<h1><b>About</b> WireLoad</h1>
		<p>WireLoad designs software. We search high and low for interesting
problems and then mercilessly work them out with fanciful applications. Our apps are narrowly focused so that we can polish each part to a shine. We'll take one really good feature over a dozen lousy ones any day. We think you'll really enjoy the quality, ease of use and pleasant user experience that results.</p>
	</div>

	<div class="item">
		<img src="<?php echo_images_uri() ?>/a_arr.png" alt="Look at this!" id="a-arr" />
		<h2>Do you need support for a WireLoad product?</h2>

		<div id="icons-links">
			<div>
				<h3>Blotter</h3>
				<ul>
					<li><a href="http://twitter.com/BlotterApp"><img src="<?php echo_images_uri() ?>/a_ico1.png" alt="Follow Blotter on Twitter" />Follow Blotter on Twitter</a></li>
					<li><a href="http://support.wireload.net/forums/356140-frequently-asked-questions"><img src="<?php echo_images_uri() ?>/a_ico2.png" alt="The Blotter FAQ" />The Blotter FAQ</a></li>
					<li><a href="http://support.wireload.net/anonymous_requests/new"><img src="<?php echo_images_uri() ?>/a_ico3.png" alt="Contact Blotter support" />Contact Blotter support</a></li>
				</ul>
			</div>
			<div>
				<h3 style="color:#6c7f23;">Quiet</h3>
				<ul>
					<li><a href="http://twitter.com/QuietApp"><img src="<?php echo_images_uri() ?>/a_ico4.png" alt="Follow Quiet on Twitter" />Follow Quiet on Twitter</a></li>
					<li><a href="http://support.wireload.net/forums/356141-frequently-asked-questions"><img src="<?php echo_images_uri() ?>/a_ico5.png" alt="The Quiet FAQ" />The Quiet FAQ</a></li>
					<li><a href="http://support.wireload.net/anonymous_requests/new"><img src="<?php echo_images_uri() ?>/a_ico6.png" alt="Contact Quiet support" />Contact Quiet support</a></li>
				</ul>
			</div>
			<div>
				<h3 style="color:#4582c7;">YippieMove</h3>
				<ul>
					<li><a href="http://twitter.com/yippiemove"><img src="<?php echo_images_uri() ?>/a_ico7.png" alt="Follow YippieMove on Twitter" />Follow YippieMove on Twitter</a></li>
					<li><a href="http://www.yippiemove.com/help/"><img src="<?php echo_images_uri() ?>/a_ico8.png" alt="YippieMove online Help" />YippieMove online Help</a></li>
					<li><a href="http://support.yippiemove.com/requests/anonymous/new"><img src="<?php echo_images_uri() ?>/a_ico9.png" alt="Contact YippieMove support" />Contact YippieMove support</a></li>
				</ul>
			</div>
		</div>

	</div>

	<div class="item">
		<div class="left">
			<h2 style="color:#2078f2">Is there anything else you’d like to talk to us about?</h2>
			<p>If you have a question or want to get in touch with someone about WireLoad specifically, use the contact form.</p>
			<em>Please remember to use the Product Support for support questions - we will unfortunately not be able to respond to support requests through the general contact form.</em>

			<div class="sep"></div>

			<h2>Corporate Address</h2>
			<br />
			<b>Our mailing address is:</b>
			<br /><br />
			WireLoad Inc.<br />
			340 S Lemon Ave #3501<br />
			Walnut, CA 91789 USA

		</div>
		<!-- for contact form 7 -->
		<?php while (have_posts()) : the_post() ?>
    <?php the_content(__('Read more &raquo;', 'wireload-02')); ?>
    <?php endwhile; ?>

	</div>

</div>


<?php get_footer(); ?>
