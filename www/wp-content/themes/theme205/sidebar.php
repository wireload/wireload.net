						<div class="left">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(__('Left sidebar','theme205')) ) : else : ?>								
							<div class="widget_style" id="search">
								<?php include (TEMPLATEPATH . "/searchform.php"); ?>
							</div>
							
							<div class="widget_style" id="categories">
								<h2>About Us</h2>
<div class="text">WireLoad, LLC is a startup geared towards internet products. For a complete listing of products, see the <a href="products/">Products</a> page.</div>
							</div>
							
							<div class="widget_style" id="archives">
								<h2>Contact</h2>
<div>By email:<br/>
<blockquote><a href="&#109;&#97;&#105;&#108;&#116;&#111;:&#105;&#110;&#102;&#111;&#64;&#119;&#105;&#114;&#101;&#108;&#111;&#97;&#100;&#46;&#110;&#101;&#116;">&#105;&#110;&#102;&#111;&#64;&#119;&#105;&#114;&#101;&#108;&#111;&#97;&#100;&#46;&#110;&#101;&#116;</a>
</blockquote>
By mail:<br/>
<blockquote>WireLoad, LLC<br/>
340 S Lemon Ave #3501<br />
Walnut, CA 91789
USA<br/></blockquote>
</div>
							</div>
							
							<div class="widget_style" id="links_with_style">
								<ul>
									<?php get_links_list(); ?>
								</ul>
							</div>
<?php endif; ?>							
						</div>

