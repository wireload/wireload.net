	</div><!-- #page -->

	<div id="footer">
		<div id="foot">
			<div id="copy">&copy; <strong>2006-2011.</strong> WireLoad, Inc.</div>
			<a href="http://wireload.net" id="bot-logo"><img src="<?php echo_images_uri() ?>/bot_logo.png" alt="Wireload" /></a>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/scripts/jquery.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/scripts/main.js"></script>
  <?php if (is_page('company')): ?>
  <script type='text/javascript' src='<?php echo get_template_directory_uri() ?>/scripts/jquery.form.js?ver=2.52'></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/scripts/cf7-script-modified.js"></script>
  <?php endif ?>
  <?php if (is_page('blotter')): ?>
  <script type='text/javascript' src='<?php echo get_template_directory_uri() ?>/scripts/jquery.ifixpng.js'></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/scripts/blotter.js"></script>
  <?php endif ?>

  <script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
  </script>
  <script type="text/javascript">
  try {
  var pageTracker = _gat._getTracker("UA-16042104-1");
  pageTracker._trackPageview();
  } catch(err) {}</script>
</body>
</html>
