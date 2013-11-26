					<form method="get" id="searchform" action="<?php bloginfo('home'); ?>" style="padding:0px 0px 0px 0px; margin:0px 0px 0px 0px">
					<span>Search:</span><br/>
					<input type="text"  name="s" id="s" value="<?php echo wp_specialchars($s, 1); ?>"/><input class="input" type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/go.gif" value="submit" style="border:0px"/>
					</form>