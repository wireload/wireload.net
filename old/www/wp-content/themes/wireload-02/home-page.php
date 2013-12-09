<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<div id="slider">
	<div id="s-bgs">
		<div class="sbg" id="s-bg1"></div>
		<div class="sbg" id="s-bg2"></div>
		<div class="sbg" id="s-bg3"></div>
		<div class="border"></div>
	</div>
	<div id="s-wrap">
		<div class="item cur" id="sw-blotter">
		  <a href='/products/blotter/'>
			<img src="http://static.wireload.net/images/blotter_pic.png" alt="Blotter - The future will never look the same." style="bottom: 0px; left: 5px;" />
			</a>
		</div>
		<div class="item" id="si2">
		  <a href="/products/quiet/">
			<img src="http://static.wireload.net/images/Quiet_slogan.png" alt="Preserve your train of thought and be effective with Quiet." style="bottom: 137px; left: 66px;" />
			<img src="http://static.wireload.net/images/Quiet_pic.png" alt="Quiet" style="bottom: 46px; left: 195px;" />
			<p class="s-right" style="top: 276px; right: 64px;">Preserve your train<br />of thought and be effective<br />with <strong>Quiet.</strong></p>
		  </a>
		</div>
		<div class="item">
		  <a href="http://www.yippiemove.com">
			<img src="http://static.wireload.net/images/YippieMove_pic.png" alt="YippieMove - Fast and easy movement of email." style="bottom: 0px; left: -60px;" />
			</a>
		</div>
	</div>
	<ul id="s-controls">
		<li class="active"></li>
		<li></li>
		<li></li>
	</ul>
</div>

<div id="prod-items">
	<div class="item">
		<a href="/products/blotter/">
			<span class="img">
				<img src="http://static.wireload.net/images/img1.png" alt="Blotter" />
				<span class="i-border"></span>
			</span>
		</a>
		<h6>Blotter</h6>
		<p>Unforgettable calendar.</p>
		<a class="button" href="/products/blotter/"><span>Learn more</span></a>
	</div>
	<div class="item">
		<a href="/products/quiet/">
			<span class="img">
				<img src="http://static.wireload.net/images/img2.png" alt="Quiet" />
				<span class="i-border"></span>
			</span>
		</a>
		<h6 style="color: #6c7f23;">Quiet</h6>
		<p>Peace. And Quiet.</p>
		<a class="button" href="/products/quiet/"><span>Learn more</span></a>
	</div>
	<div class="item">
		<a href="http://www.yippiemove.com">
			<span class="img">
				<img src="http://static.wireload.net/images/img3.png" alt="YippieMove" />
				<span class="i-border"></span>
			</span>
		</a>
		<h6 style="color: #0078ff;">YippieMove</h6>
		<p>Easy email transfers.</p>
		<a class="button" href="http://www.yippiemove.com"><span>Learn more</span></a>
	</div>
</div>

<?php get_footer(); ?>